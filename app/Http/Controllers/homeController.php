<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\heroBanner;
use App\Models\features;
use App\Models\portfolio;
use App\Models\pages;
use App\Mail\contactMail;
use Illuminate\Support\Facades\Mail;

class homeController extends Controller
{
    public function index(){
        $heros = heroBanner::get();
        $features = features::get();
        $portfolios = portfolio::get();
        $pages = pages::get();

        return view('index',['heros'=>$heros, 'portfolios'=>$portfolios, 'features'=>$features, 'pages'=>$pages]);
    }

    public function contact(){
        return view('contact');
    }

    public function sendFeedBack(Request $request){
        $validated = $request->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|email',
            'message' => 'required|min:10',
        ]);

         if(Mail::to('vagheladevang123@gmail.com')->send(new contactMail($validated))){
            return back()->with("success","Thank You For Message!");
         }
    }
}
