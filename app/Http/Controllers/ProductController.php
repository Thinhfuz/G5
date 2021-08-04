<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Image;
use Illuminate\Http\Request;
use Carbon\Carbon;


class ProductController extends Controller
{
    public $name;
    public $slug;
    public $short_description;
    public $description;
    public $regular_price;
    public $sale_price;
    public $SKU;
    public $stock_status;
    public $featured;
    public $quantity;
    public $image;
    public $category_id;

    // public $imgData = array();

    public function get()
    {

        $products = Product::all();
        //dd($products);
        //json_decode($products->image_path);
        return view('admin.product.view', compact('products'));
    }

    public function add()
    {
        $categories = Category::all();
        //dd($categories);
        return view('admin.product.add', ['categories' => $categories]);
    }
    // add
    public function addproduct(Request $request)
    {
        $product = new Product();
        $product->name = $request->input('name');
        $product->slug = $request->input('slug');
        $product->short_description = $request->input('short_description');
        $product->description = $request->input('description');
        $product->regular_price = $request->input('regular_price');
        $product->sale_price = $request->input('sale_price');
        $product->SKU = $request->input('SKU');
        $product->stock_status = $request->input('stock_status');
        $product->featured = $request->input('featured');
        $product->quantity = $request->input('quantity');
        //image
        $imageName = "";
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();


            if ($extension != 'jpg' && $extension != 'png' && $extension != 'jpeg') {
                return redirect('admin/product/create')->with('Loi', 'Ban chi duoc chon file co duoi jpeg, png, jpg');
            }
            $imageName = $file->getClientOriginalName();
            $file->move("images", $imageName);
        }
        $product->image = $imageName;
        //chạy vào cột image

        //
        $image_path = "";
        $request->validate([
            'imageFile' => 'required',
            'imageFile.*' => 'mimes:jpeg,jpg,png,gif,csv,txt,pdf|max:2048'
        ]);

        if ($request->hasfile('imageFile')) {
            foreach ($request->file('imageFile') as $file) {
                $image_path = $file->getClientOriginalName();
                $file->move(public_path() . '/uploads/', $image_path);
                $imgData[] = $image_path;
            }
        }
        $product->images = json_encode($imgData);
        $product->category_id = $request->input('category_id');
        $product->save();
        session()->flash('message', 'Product has been created successfully!!');

        return redirect('admin/product/view');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        return view('admin.product.edit', ['categories' => $categories], compact('product'));
    }

    public function editPost(Request $request, $id)
    {
        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->slug = $request->input('slug');
        $product->short_description = $request->input('short_description');
        $product->description = $request->input('description');
        $product->regular_price = $request->input('regular_price');
        $product->sale_price = $request->input('sale_price');
        $product->SKU = $request->input('SKU');
        $product->stock_status = $request->input('stock_status');
        $product->featured = $request->input('featured');
        $product->quantity = $request->input('quantity');
        $product->category_id = $request->input('category_id');

        //image
        if ($request->hasFile('image')) { //da img daj
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();

            if ($extension != 'jpg' && $extension != 'png' && $extension != 'jpeg') {
                return redirect('admin/product/edit')->with('Loi', 'Ban chi duoc chon file co duoi jpeg, png, jpg');
            }
            $imageName = $file->getClientOriginalName();
            $file->move("images", $imageName);
        } else {
            $product = Product::find($request->id);
            $imageName = $product->image;
        }
        $product->image = $imageName;
        //gallery
        if ($request->hasfile('imageFile')) {
            foreach ($request->file('imageFile') as $file) {
                $image_path = $file->getClientOriginalName();
                $file->move(public_path() . '/uploads/', $image_path);
                $imgData[] = $image_path;
            }
        }
        $product->images = json_encode($imgData);

        $product->exists = true;
        $product->save();

        return redirect('admin/product/view');
    }

    //delete
    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('admin/product/view');
    }
}
