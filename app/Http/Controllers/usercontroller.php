<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\cats;

class usercontroller extends Controller
{
    public function index()
    {
        $cat=cats::get();
       // return $cat;
        return view('layouts.content',compact('cat'));
    }
    public function trys()
    {
       
        return view('layouts.m2');
    }
    //
}
