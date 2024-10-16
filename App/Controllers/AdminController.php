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
        if($_SESSION['auth']->role != 'admin'){
            return view('UserTaskControl/index','Admin menu',$models);
        }
        return view('TaskControl/index','Admin menu',$models);
    }

    public function kanban(){
        return view('TaskStatus/index','login');
    }



}


?>