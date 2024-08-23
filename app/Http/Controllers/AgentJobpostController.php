<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Jobpost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgentJobpostController extends Controller
{
    //direct Job Post list page
    public function list(){
        // dd(request('key'));
        $id = Auth::id();
        $jobs = Jobpost::when(request('key'), function($query){
                        $query->where('author_id', $id)->findOrFail($id);
                        })
                        ->orderBy('id', 'desc')
                        ->paginate(5);
        // dd($jobs->toArray());
        $allCategory = Category::all();
        return view('agent.job.list', compact('jobs','allCategory','id'));
    }

    public function search(){
        $id = Auth::id();
        $jobs = Jobpost::when(request('key'), function($query){
                        $query->where('title','like','%'. request('key') .'%');
                        })
                        ->orderBy('id', 'desc')
                        ->paginate(5);
        $allCategory = Category::all();
        return view('agent.job.list', compact('jobs','allCategory','id'));
    }

     //direct job create page
     public function createPage(){
        $category = Category::all();
        return view('agent.job.create', compact('category'));
    }

    //create job
    public function create(Request $request){

        $request->validate([
           'title' => 'required',
            'description' => 'required',
            'location' => 'required',
            'company' => 'required',
            'category' => 'required',
            'visibility' => 'required|in:Public,Private',
        ]);

        $job = Jobpost::create([
            'category_id' => $request->category,
            'author_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
            'location' => $request->location,
            'company' => $request->company,
            'visibility' => $request->visibility,
        ]);

        return redirect()->route('agent#job#list')->with(['createSuccess'=>'job Created...']);
    }

    public function showDetails($id)
    {
        $detail = Jobpost::where('id', $id)->findOrFail($id);
        $category_id = $detail->category_id;
        $category_name = Category::where('id', $category_id)->findOrFail($category_id)->name;
        return view('agent.job.details', compact('detail','category_name'));
    }

    public function edit($id)
    {
        $job = Jobpost::where('id', $id)->findOrFail($id);
        $category_id = $job->category_id;
        $category_name = Category::where('id', $category_id)->findOrFail($category_id)->name;
        $category = Category::all();
        return view('agent.job.edit', compact('job','category_name','category'));
    }

    public function jobUpdate(Request $request, $id)
    {
        $job = Jobpost::where('id', $id)->findOrFail($id);
        $job->update($request->all());

        return redirect()->route('agent#job#list')->with('success', 'Updated');
    }


    //delete job
    public function delete($id){
        $exist_post = DB::table('applyjobs')
            ->where('post_id', $id)
            ->get()->isEmpty();

        if($exist_post == true){
            Jobpost::where('id', $id)->delete();
            return back()->with(['deleteSuccess'=>'job Deleted...']);
        }else{
            return back()->with(['deleteSuccess' => 'This post cannot delete cause of job applied user..']);
        }
    }


}
