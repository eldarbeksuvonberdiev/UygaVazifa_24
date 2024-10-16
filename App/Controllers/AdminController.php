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
        $tasks = Task::getOwnTasks($_SESSION['auth']->id);
        // dd($tasks);
        if($_SESSION['auth']->role != 'admin'){
            return view('UserTaskControl/index','User menu',$tasks);
        }
        return view('TaskControl/index','Admin menu',$models);
    }

    public function kanban(){
        return view('TaskStatus/index','login');
    }



}


?>