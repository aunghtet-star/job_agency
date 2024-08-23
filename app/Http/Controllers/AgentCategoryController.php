<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;

class AgentCategoryController extends Controller
{
    //direct category list page
    public function list(){
        // dd(request('key'));
        $categories = Category::when(request('key'), function($query){
                        $query->where('name','like','%'. request('key') .'%');
                        })
                        ->orderBy('id', 'desc')
                        ->paginate(5);
        // dd($categories->toArray());
        return view('agent.category.list', compact('categories'));
    }

    //direct category create page
    public function createPage(){
        return view('agent.category.create');
    }

    //create category
    public function create(Request $request){
        // dd($request->all());
        $this->categoryValidationCheck($request);
        $data = $this->requestCategoryData($request);
        Category::create($data);
        return redirect()->route('agent#category#list')->with(['createSuccess'=>'Category Created...']);
    }

    public function edit($id)
    {
        $category = Category::where('id', $id)->findOrFail($id);
        return view('agent.category.edit', compact('category'));
    }

    public function categoryUpdate(Request $request, $id)
    {
        $category = Category::where('id', $id)->findOrFail($id);
        $category->update($request->all());

        return redirect()->route('agent#category#list')->with('success', 'Updated');
    }

    public function showDetails($id)
    {
        $detail = Category::where('id', $id)->findOrFail($id);
        return view('agent.category.details', compact('detail'));
    }

    //delete category
    public function delete($id){
        // dd($id);
        Category::where('id', $id)->delete();
        return back()->with(['deleteSuccess'=>'Category Deleted...']);
    }

    //category validation check
    private function categoryValidationCheck($request){
        Validator::make($request->all(),[
            'categoryName' => 'required|unique:categories,name'
        ])->validate();
    }

    //request category data
    private function requestCategoryData($request){
        return [
            'name' => $request->categoryName
        ];
    }
}
