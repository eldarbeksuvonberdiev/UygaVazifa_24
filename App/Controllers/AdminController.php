<?php
namespace App\Controllers;

use App\Helpers\Auth;
use App\Models\Task;
use App\Models\User;

class AdminController{

    public function __construct()
    {
        if(!Auth::check()){
            header("location: /login");
        }
    }

    public function index(){
        $tasks = Task::getAllTask();
        $count = Task::getAllCount();
        $models = [
            0 => $count,
            1 => $tasks
        ];
        $owntasks = Task::getOwnTasks($_SESSION['auth']->id);
        if($_SESSION['auth']->role != 'admin'){
            return view('UserTaskControl/index','User menu',$owntasks);
        }
        return view('TaskControl/index','Admin menu',$models);
    }

    public function users(){
        $users = User::all();
        return view('TaskStatus/index','Users',$users);
    }

    public function notfound(){
        return view('notfound','NotFound');
    }



}


?>