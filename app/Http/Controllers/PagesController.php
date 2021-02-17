<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
        $title = "this is the home page";
        return view('pages.index')->with('some', $title);
    }
    
    public function about() {
        return view('pages.about_me');
    }    
    
    public function contact() {
        $data = [
          
            "title" => "this is the conatct page",
            "skills" => ["html","css","javascript"] 
            
        ];
        return view('pages.contact')->with($data);
    }    
    
}
