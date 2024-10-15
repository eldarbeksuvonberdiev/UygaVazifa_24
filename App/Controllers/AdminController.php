<?php
namespace App\Controllers;

use App\Helpers\Auth;

class AdminController{

    public function __construct()
    {
        if(Auth::check()){
            header("location: /login");
        }
    }

    public function index(){
        return view('TaskControl/index','Admin menu');
    }

    public function kanban(){
        return view('TaskStatus/index','login');
    }



}


?>