<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\heroBanner;

class heroController extends Controller
{
    // public function addHeroBanner(Request $request){
    //     $data = $request->all();
    //     $imageFlle = $request->file('imageFile');
    //     $path = $imageFlle->store('images', 'public');

    //     heroBanner::create([
    //         'title'=>$request->input('title'),
    //         'caption'=>$request->input('caption'),
    //         'btn-text'=>$request->input('btn-text'),
    //         'btn-url'=>$request->input('btn-url'),
    //         'file-path'=>$path
    //     ]);

    //     return redirect()->route('heroBanner')->with('status','Hero Banner Added Successfully');
    // }

    public function heroBanner(){
        $heros = heroBanner::get();

        return view('heroBanner');
    }

    // public function deleteHeroBanner(Request $request){
    //     $id = $request->input('id');
    //     heroBanner::where('id', $id)->delete();
        
    //     return redirect()->route('heroBanner')->with('status','Hero Banner Deleted Successfully');
    // }
    
    public function updateHeroBanner(Request $request){
        $id = $request->input('id');
        
        if($request->hasFile('imageFile')){
            $imageFlle = $request->file('imageFile');
            $path = $imageFlle->store('images','public');
        }else{
            $hero = heroBanner::where('id', $id)->first();
            $path = $hero['file-path'];
        }

        heroBanner::where('id', $id)->update([
            'title'=>$request->input('title'),
            'caption'=>$request->input('caption'),
            'btn-text'=>$request->input('btn-text'),
            'btn-url'=>$request->input('btn-url'),
            'file-path'=>$path
        ]);;
        
        return redirect()->route('heroBanner')->with('status','Hero Banner Updated Successfully');
        
        //return ['path'=>$path];
    }

    public function features(){
            return view('features');
    }
    
    public function portfolio(){
            return view('portfolio');
    }

    public function heroData(){
        return view('heroData');
    }

    public function pages(){
        return view('pages');
    }
}