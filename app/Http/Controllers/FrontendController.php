<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactPostRequest;
use App\Models\Color;
use App\Models\Contact;
use App\Models\Inventory;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $latest_products = Product::latest()->get();
        return view('index', compact('products', 'latest_products'));
    }

    public function about()
    {
        return view('about');
    }

    public function shop()
    {
        return view('shop');
    }

    public function shop_details($id)
    {
        $product = Product::find($id);
        $available_sizes = Inventory::where('product_id', $id)->select('size_id')->distinct()->get();
        $colors = Color::where('added_by', auth()->id())->get();
        return view('shop_details', compact('product', 'available_sizes', 'colors'));
    }

    public function color_list(Request $request)
    {
        $color_dropdown = "<option >" . "- Choose One Color -" . "</option>";
        $colors = Inventory::where([
            'product_id' => $request->product_id,
            'size_id' => $request->size_id,
        ])->get();

        foreach ($colors as $color) {
            $color_dropdown .= "<option value='$color->color_id'>" . Color::find($color->color_id)->color_name . "</option>";
        }
        return $color_dropdown;
    }

    public function price_qunatity(Request $request)
    {
        $inventory = Inventory::where([
            'product_id' => $request->product_id,
            'size_id' => $request->size_id,
            'color_id' => $request->color_id,
        ])->first();

        return $inventory->discount_price.'#'.$inventory->regular_price.'#'.$inventory->product_quantity;;
    }

    public function contact()
    {
        return view('contact');
    }

    public function contact_post(ContactPostRequest $request)
    {
        Contact::insert([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);
        return back()->with('contact-success', 'Message send Successfull!');
    }
}
