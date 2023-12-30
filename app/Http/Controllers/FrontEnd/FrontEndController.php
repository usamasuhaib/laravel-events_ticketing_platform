<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function loginSeperator(){
        return view('frontEnd.loginSeperator');    
    }
    public function landingPage(){
        return view('welcome');
    }
}
