<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactPostRequest;
use App\Models\Contact;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $latest_products = Product::latest()->get();
        return view('index', compact('products','latest_products'));
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
        return view('shop_details', compact('product'));
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
