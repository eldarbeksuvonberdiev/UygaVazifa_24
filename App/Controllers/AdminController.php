<?php
namespace App\Controllers;

use App\Helpers\Auth;
use App\Models\Task;

class AdminController{

    public function __construct()
    {
        if(!Auth::check()){
            header("location: /login");
        }
    }

    public function index(){
        $models = Task::getAllTask();
        return view('TaskControl/index','Admin menu',$models);
    }

    public function kanban(){
        return view('TaskStatus/index','login');
    }



}


?>