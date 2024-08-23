<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
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
        return view('admin.category.list', compact('categories'));
    }

    //direct category create page
    public function createPage(){
        return view('admin.category.create');
    }

    //create category
    public function create(Request $request){
        // dd($request->all());
        $this->categoryValidationCheck($request);
        $data = $this->requestCategoryData($request);
        Category::create($data);
        return redirect()->route('category#list')->with(['createSuccess'=>'Category Created...']);
    }

    public function edit($id)
    {
        $category = Category::where('id', $id)->findOrFail($id);
        return view('admin.category.edit', compact('category'));
    }

    public function categoryUpdate(Request $request, $id)
    {
        $category = Category::where('id', $id)->findOrFail($id);
        $category->update($request->all());

        return redirect()->route('category#list')->with('success', 'Updated');
    }

    public function showDetails($id)
    {
        $detail = Category::where('id', $id)->findOrFail($id);
        return view('admin.category.details', compact('detail'));
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
