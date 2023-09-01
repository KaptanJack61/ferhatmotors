<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home() {
        //return view('front.home');
        return redirect()->route('control-panel');
    }
}
