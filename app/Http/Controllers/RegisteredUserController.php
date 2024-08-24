<?php

namespace App\Http\Controllers;

use App\Models\Applyjob;
use App\Models\Jobpost;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class RegisteredUserController extends Controller
{
    public function index() {
        $user_id = Auth::id();
        $exist_user = Applyjob::where('user_id', $user_id)->get()->toArray();

        //Get post id that user applied
        $applied = array_column($exist_user, 'post_id');

        //Get all public posts
        // $posts = Jobpost::where('visibility', 'Public')->get();

        //Get all public posts
        $posts = Jobpost::when(request('key'), function($query){
            $query->where('location','like','%'. request('key') .'%');
            })
            ->orderBy('id', 'desc')
            ->where('visibility', 'Public')
            ->get();

        return view('user.home', compact('posts', 'applied'));
    }

    public function edit($id)
    {
        $user = User::where('id', $id)->findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function userUpdate(Request $request, $id)
    {
        $data = $this->getUserData($request);
        $user = User::where('id', $id)->findOrFail($id);

        //for image
        if($request->hasFile('image')){
            // 1. old image name | check => delete | store
            $dbImage = User::where('id',$id)->first();
            $dbImage = $dbImage->image;

            if($dbImage != null){
                Storage::delete('public/'.$dbImage);
            }

            $fileName = uniqid() . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public',$fileName);
            $data['image'] = $fileName;

        }

        $user->update($data);

        return redirect()->route('user#list')->with('success', 'Updated');
    }

    private function getUserData($request){
        return [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'role' => $request->role,
            'updated_at' => Carbon::now()
        ];
    }

    public function delete($id)
    {
        $user = User::where('id', $id)->findOrFail($id);

        $exist_user = DB::table('applyjobs')
        ->where('user_id', $id)
        ->get()->isEmpty();

        if($exist_user == true){
            $user->delete();
            return back()->with(['message' => 'Blog deleted successfully']);
        }else{
            return back()->with(['message' => 'This user cannot delete cause of job applied user..']);
        }

    }

    public function showDetails($id)
    {
        $detail = User::where('id', $id)->findOrFail($id);
        return view('admin.users.details', compact('detail'));
    }

    // public function userSearch(Request $request)
    // {
    //     $query = User::query();

    //     if ($request->has('keyword')) {
    //         $query->where('name', 'like', '%' . $request->keyword . '%')
    //             ->orWhere('email', 'like', '%' . $request->keyword . '%');
    //     }

    //     if ($request->has('role')) {
    //         $query->where('role', $request->role);
    //     }

    //     if ($request->has('date_from') && $request->has('date_to')) {
    //         $query->whereBetween('created_at', [$request->date_from, $request->date_to]);
    //     }

    //     $data = $query->get();

    //     return view('admin.users.list', compact('data'));
    // }
}
