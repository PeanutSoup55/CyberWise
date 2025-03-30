<?php

namespace App\Http\Controllers\UserControllers;


class HomeController extends Controller
{
    public function index(){
        return view('user.dashboard');
    }
}
