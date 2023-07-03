<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductsController extends Controller
{
    public function index(){

       return view('products.index',['products' => Product::get()]);
        //return 'welcome';
    }

    public function createProducts(){
        return view('products.create');
    }

    public function storeProducts(Request $request){
        //dd($request->all());
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:png,jpg,gif,jpeg|max:2000',
        ]);


        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('products'), $imageName);

        $product = new Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->images = $imageName;

        $product->save();
        return back()->withSuccess('Product created  !!!');

    }

    public function editProducts($id){
        $product = Product::where('id',$id)->first();

        return view('products.edit', ['product'=>$product]);
    }

    public function updateProducts(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'nullable|mimes:png,jpg,gif,jpeg|max:2000',
        ]);

        $product = Product::where('id', $id)->first();
        $product->name = $request->name;
        $product->description = $request->description;
        if (isset($request->image)) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('products'), $imageName);
            $product->images = $imageName;
        }




        $product->save();
        return back()->withSuccess('Product updated  !!!');
    }

    public function deleteProducts($id){
        $product = Product::where('id', $id)->first();
        $product->delete();

        return back()->withSuccess('Product Deleted  !!!');
    }

}
