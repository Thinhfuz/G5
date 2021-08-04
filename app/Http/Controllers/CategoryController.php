<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    public $name;
    public $slug;

    public function get() {
        $categories = Category::all();
        return view('admin.category.view', compact('categories'));
    }

    public function add() {
        $categories = Category::all();
        return view('admin.category.add',['categories'=>$categories]);
    }
    //add
    public function addcategory(Request $request) {
        $category = new Category();   
        
        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->save();
        session()->flash('message','Category has been created successfully!!');

        return redirect('admin/category/view');
    }

    //edit
    public function edit($id) {
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }

    public function editPost(Request $request, $id) { //cái edit này sẽ để submit form
        $category = Category::find($id);
        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->save();
        session()->flash('message','Category has been updated successfully!!');

        return redirect('admin/category/view');
    }



    //delete
    public function delete($id) {
        $category = Category::find($id);
        $category->delete();
        return redirect('admin/category/view');
    }

}
