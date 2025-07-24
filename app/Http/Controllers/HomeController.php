<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\Project;
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
        $project = Project::get();
        return view('Home.project.project',compact('project'));
    }
    public function ShowProject($id){
        $project = Project::findorFail($id);
        return view('Home.project.show-project',compact('project'));
    }
    public function certificates()
    {
        $cert = Certificate::get();
        return view('Home.pages.certificates',compact('cert'));
    }
     public function contact(){

        return view('Home.pages.contact');
    }
}
