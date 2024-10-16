<?php
namespace App\Controllers;

use App\Helpers\Auth;
use App\Models\Task;

class TaskController{

    // public function __construct()
    // {
    //     if(!Auth::check()){
    //         header("location: /login");
    //     }
    // }

    public function index(){
        $users = Task::getUsers();
        return view('TaskControl/create','Create Task',$users);
    }

    public function create(){
        if(isset($_POST['ok'])){
            
        }
    }



}


?>