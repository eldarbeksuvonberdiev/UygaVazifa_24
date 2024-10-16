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
                    $path = 'App/Images/' . date("y-m-d_h-i-s.").end($img);
                    move_uploaded_file($_FILES['img']['tmp_name'],$path);
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
            }else{
                header("location: /add");
            }
        }
    }

    public function changeStatus(){
        if(isset($_POST['ok'])){
            $task_id = $_POST['task_id'];
            $task_status = $_POST['task_status'];
            $data = [
                "status" => $task_status
            ];

            Task::update($data,$task_id);
            header("location: /");
        }
    }



}


?>