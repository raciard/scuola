<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attraction;

class AdminDashController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function view(){


        $attractions = Attraction::all();
        

    

        return view('adminDash')->with("attractions", $attractions);
    }
    
}
