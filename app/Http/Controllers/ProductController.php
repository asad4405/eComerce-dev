<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductPostRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Product_photo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('backend.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('backend.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductPostRequest $request)
    {
        $product_id = Product::insertGetId([
            'user_id' => auth()->id(),
            'category_id' => $request->category_id,
            'product_name' => $request->product_name,
            'product_name_details' => $request->product_name_details,
            'product_short_details' => $request->product_short_details,
            'product_long_details' => $request->product_long_details,
            'additional_info' => $request->additional_info,
            'created_at' => Carbon::now(),
        ]);

        foreach ($request->file('product_photo') as $photo) {
            $product_img = $product_id.'_'.'Product_' . Str::random(5) . '.' . $photo->getClientOriginalExtension();
            Image::make($photo)->save(base_path('public/uploads/product_photos/' . $product_img));

            Product_photo::insert([
                'product_id' => $product_id,
                'product_photo' => $product_img,
                'created_at' => Carbon::now(),
            ]);
        }

        return back()->with('product-success','New Product Added Successfull!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
