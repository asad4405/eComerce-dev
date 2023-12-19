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
        // $sizes = Size::where('added_by', auth()->id())->get();
        $available_sizes = Inventory::where('product_id',$id)->select('size_id')->distinct()->get();
        $colors = Color::where('added_by', auth()->id())->get();
        return view('shop_details', compact('product', 'available_sizes', 'colors'));
    }

    public function color_list(Request $request)
    {
        // 
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
