<?php
namespace App\Controllers;

use App\Models\User;

class UserController{

    public function changeStatus(){
        if(isset($_POST['ok'])){
            $id = $_POST['id'];
            $status = $_POST['status'];
            $data = [
                "status" => $status
            ];
            User::update($data,$id);
            header("location: /users");
        }
    }
}

?>