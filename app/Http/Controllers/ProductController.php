<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Model
        $products = Product::with('category')->orderBy("created_at", 'desc')->paginate(5);
        // return $products;
        return view('products.index' , compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all();
        return view('products.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $FileSize = 2 * 1024;
        $request->validate([
            'name'=>'required|string|min:3|max:40',
            'description'=>'string|max:200',
            'price'=>"required|numeric|min:0",
            'image'=>"required|file|mimes:png,jpg,jif,jpeg|max:$FileSize"
        ]);
        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        // Image Code
        $image_data = $request->file('image');
        $image_name = rand(0, 255) . rand(0, 255) . $image_data->getClientOriginalName();
        $location = public_path('/upload');
        $image_data->move($location, $image_name);
        $product->image = $image_name;
        $product->save();
        return redirect()->back()->with('success', "Product Created Succssefuly");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::with('category')->find($id);
        return view("products.show")->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::all();
        $product = Product::with('category')->find($id);
        return view("products.edit", compact('product', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd( $request);
        $FileSize = 2 * 1024;
        $request->validate([
            'name'=>'required|string|min:3|max:40',
            'description'=>'required|string|max:200',
            'price'=>"required|numeric|min:0",
            'image'=>"required|file|mimes:png,jpg,jif,jpeg|max:$FileSize"
        ]);
        $product = Product::find($id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        // Image Code
        $image_data = $request->file('image');
        if($request->file("image") == null){
            
        }
        else{
            $oldImage = $product->image;
            $filePath = public_path('upload/') . $oldImage;
            if($oldImage != "fake2.jpg"){
                unlink($filePath);
            }
            $image_name = rand(0, 255) . rand(0, 255) . $image_data->getClientOriginalName();
            $location = public_path('/upload');
            $image_data->move($location, $image_name);
            $product->image = $image_name;
        }
        
        $product->save();
        return redirect()->back()->with('success', "Product Updated Succssefuly");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        $oldImage = $product->image;
        $filePath = public_path('upload/') . $oldImage;
        if($oldImage != "fake2.jpg"){
            unlink($filePath);
        }
        $product->delete();

        return redirect()->route('product.index')->with('success', "Product Deleted Succssefuly");
    }
}
