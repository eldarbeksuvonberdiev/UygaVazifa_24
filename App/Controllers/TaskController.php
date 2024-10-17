<?php
namespace App\Controllers;

use App\Helpers\Auth;
use App\Models\Task;

class TaskController{

    public function __construct()
    {
        if(!Auth::check()){
            header("location: /login");
        }
    }

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

    public function accept(){
        if(isset($_POST['ok'])){
            $id = $_POST['id'];
            $status = $_POST['status'];
            $data = [
                "status" => $status
            ];
            Task::update($data,$id);
            header("location: /");
        }
    }

    public function togiven(){
        if(isset($_POST['ok'])){
            $id = $_POST['id'];
            $status = $_POST['status'];
            $data = [
                "status" => $status
            ];
            Task::update($data,$id);
            header("location: /");
        }
    }

    public function reject(){
        if(isset($_POST['ok'])){
            $id = $_POST['id'];
            $status = $_POST['status'];
            $comment = $_POST['comment'];
            $data = [
                "status" => $status,
                "comment" => $comment
            ];
            Task::update($data,$id);
            header("location: /");
        }
    }
    


    public function getByStatus($status){
        $all = Task::getTaskByStatus($status);
        return $all;
    }

    public function given(){
        $count = Task::getAllCount();
        $given = $this->getByStatus('1');
        $data = [
            0 => $count,
            1 => $given
        ];
        return view('TaskControl/index','Admin menu',$data);
    }

    public function in_progress(){
        $count = Task::getAllCount();
        $in_progress = $this->getByStatus('2');
        $data = [
            0 => $count,
            1 => $in_progress
        ];
        return view('TaskControl/index','Admin menu',$data);
    }

    public function done(){
        $count = Task::getAllCount();
        $done = $this->getByStatus('3');
        $data = [
            0 => $count,
            1 => $done
        ];
        return view('TaskControl/index','Admin menu',$data);
    }

    public function ready(){
        $count = Task::getAllCount();
        $ready = $this->getByStatus('4');
        $data = [
            0 => $count,
            1 => $ready
        ];
        return view('TaskControl/index','Admin menu',$data);
    }

    public function rejected(){
        $count = Task::getAllCount();
        $rejected = $this->getByStatus('0');
        $data = [
            0 => $count,
            1 => $rejected
        ];
        return view('TaskControl/index','Admin menu',$data);
    }
}


?>