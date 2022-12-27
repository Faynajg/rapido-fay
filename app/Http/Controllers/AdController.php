<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdController extends Controller
{

    public function __construct()
    {
         $this->middleware('auth');
    }


    public function create()
    {
        return view ('ad.create');

    }

    public function show(Ad $ad)
    {
        return view('ad.show',compact('ad'));
    }
}
