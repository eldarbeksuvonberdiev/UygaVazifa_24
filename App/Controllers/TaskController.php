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
            if(!empty($_POST['title']) && !empty($_POST['desc'])){
                $title = $_POST['title'];
                $description = $_POST['desc'];
                $user = $_POST['user'];
                $path = "";
                if(isset($_FILES['img']['name'])){
                    $img = explode('.',$_FILES['img']['name']);
                    $path = 'images/' . date("y-m-d_h-i-s.").end($img);
                    $data = [
                        "title" => $title,
                        "description" => $description,
                        "img" => $path,
                        "user_id" => $user
                    ];
                }
                $data = [
                    "title" => $title,
                    "description" => $description,
                    "img" => $path,
                    "user_id" => $user
                ];
                Task::createTask($data);
                header("location: /");
            }
        }
    }



}


?>