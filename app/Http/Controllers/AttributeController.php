<?php

namespace App\Http\Controllers;

use App\Http\Requests\ColorPostRequest;
use App\Http\Requests\SizePostRequest;
use App\Models\Attribute;
use App\Models\Color;
use App\Models\Size;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $colors = Color::where('added_by', auth()->id())->get();
        $sizes = Size::where('added_by', auth()->id())->get();
        return view('backend.attribute.index', compact('colors', 'sizes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.attribute.create');
    }

    /**
     * Store a newly created custome in storage.
     */
    public function size_store(SizePostRequest $request)
    {
        foreach (explode(',', $request->size_name) as $size) {
            if (Size::where('size_name', $size)->exists()) {
                return back()->with('error-size', 'This size Already Added!');
            } else {
                Size::insert([
                    'added_by' => auth()->id(),
                    'size_name' => $size,
                    'created_at' => Carbon::now(),
                ]);
                return back()->with('add-size', 'New Size Added Successfull!');
            };
        }
    }


    /**
     * Store a newly created custome in storage.
     */
    public function color_store(ColorPostRequest $request)
    {
        foreach (explode(',', $request->color_name) as $color) {
            if (Color::where('color_name', $color)->exists()) {
                return back()->with('error-color', 'This color Already Added!');
            } else {
                Color::insert([
                    'added_by' => auth()->id(),
                    'color_name' => $color,
                    'created_at' => Carbon::now(),
                ]);
                return back()->with('add-color', 'New Color Added Successfull!');
            };
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Attribute $attribute)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attribute $attribute)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Attribute $attribute)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attribute $attribute)
    {
        //
    }
}
