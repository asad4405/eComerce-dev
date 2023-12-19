<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\Inventory;
use App\Models\Product;
use App\Models\Size;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProductStockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inventories = Inventory::where('user_id', auth()->id())->latest()->get();
        return view('backend.product_stock.index', compact('inventories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::where('user_id', auth()->id())->get();
        $sizes = Size::where('added_by', auth()->id())->get();
        $colors = Color::where('added_by', auth()->id())->get();
        return view('backend.product_stock.create', compact('products', 'sizes', 'colors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            '*' => 'required',
        ]);

        if ($request->regular_price < $request->discount_price) {
            return back()->with('product-price-error', 'Regular Price can not be less then discount price!');
        }

        if (Inventory::where([
            'user_id' => auth()->id(),
            'product_id' => $request->product_id,
            'size_id' => $request->size_id,
            'color_id' => $request->color_id,
        ])->exists()) {
            return back()->with('product-stock-error', 'Product Stock Already Added!');
        } else {
            Inventory::insert([
                'user_id' => auth()->id(),
                'product_id' => $request->product_id,
                'size_id' => $request->size_id,
                'color_id' => $request->color_id,
                'product_quantity' => $request->product_quantity,
                'regular_price' => $request->regular_price,
                'discount_price' => $request->discount_price,
                'created_at' => Carbon::now(),
            ]);

            return back()->with('product-stock-success', 'Product Stack Added Successfull!');
        };
    }

    /**
     * Display the specified resource.
     */
    public function show(Inventory $inventory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Inventory $inventory)
    {
        // $products = Product::where('user_id', auth()->id())->get();
        // $sizes = Size::where('added_by', auth()->id())->get();
        // $colors = Color::where('added_by', auth()->id())->get();
        // return view('backend.product_stock.edit', compact('inventory', 'products', 'sizes', 'colors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Inventory $inventory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Inventory $inventory)
    {
        //
    }
}
