<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('Home.welcome');
    }

    public function about()
    {

        return view('Home.pages.about');
    }

    public function service()
    {

        return view('Home.pages.service');
    }
    public function project()
    {

        return view('Home.pages.project');
    }
    public function certificates()
    {

        return view('Home.pages.certificates');
    }
     public function contact(){

        return view('Home.pages.contact');
    }
}
