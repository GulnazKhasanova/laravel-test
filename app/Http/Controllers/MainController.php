<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller{


    public function home(){
        return view('home');
    }

    public function active(){
        return view('active');
    }

    public function completed(){
        return view('completed');
    }
}
