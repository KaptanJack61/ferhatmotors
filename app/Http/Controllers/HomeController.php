<?php

namespace App\Http\Controllers;

use App\Models\Advert;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home() {

        $adverts = Advert::where('sold_price',null)->latest()->take(3)->get();
        // dd($adverts);
        return view('front.home', [
            'adverts' => $adverts,
        ]);
        //return redirect()->route('control-panel');
    }

    public function adverts() {
        $adverts = Advert::where('sold_price', null)->orderBy('created_at','desc')->paginate(6);

       // dd($adverts);
        return view('front.adverts', [
            'adverts' => $adverts,
        ]);
    }

    public function advertDetail (Advert $advert){
        return view('front.advert-detail', [
            'advert' => $advert
        ]);
    }
}
