<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Auth;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    public function getHome(){
        if(Auth::check()){
            return view('home');
        }else{
            return Redirect::to('/login');
        }
        
    }
}
