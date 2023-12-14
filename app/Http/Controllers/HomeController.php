<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function dashboard()
    {
        if(auth()->user()->role == 'Admin'){
            return view('dashboard.admin');
        }else{
            return view('dashboard.customer');
        }
    }
}
