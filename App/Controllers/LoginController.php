<?php

namespace App\Controllers;
use App\Models\User;
use App\Helpers\Auth;

class LoginController
{

    public function __construct()
    {
        layout('loginMain');
    }

    public function loginPage()
    {
        return view('Authentication/login', 'Admin menu');
    }

    public function registerPage()
    {
        return view('Authentication/register', 'login');
    }

    public function login()
    {
        if (isset($_POST['ok'])) {
            $data = [
                "email" => htmlspecialchars(strip_tags($_POST['email'])),
                "password" => htmlspecialchars(strip_tags($_POST['password']))
            ];
            Auth::attach($data);
        }
    }

    public function logout(){
        unset($_SESSION['auth']);
        header("location: /login");
    }

    public function register()
    {
        if (isset($_POST['ok'])) {
            $email = $_POST['email'];
            $user = User::getOne($email);
            if(!$user){
                if($_POST['password'] == $_POST['cpassword']){
                    $password = md5(htmlspecialchars(strip_tags($_POST['password'])));
                    $data = [
                        "name" => htmlspecialchars(strip_tags($_POST['name'])),
                        "email" => htmlspecialchars(strip_tags($_POST['email'])),
                        "password" => $password
                    ];
                    $user = User::create($data);
                    $id = User::lastInsert();
                    $user = User::show($id);
                    dd($user,$id);
                    // if($user){
                    //     $_SESSION['auth'] = $user;
                    //     header("location: /");
                    // }
                    
                }else{
                    $_SESSION['msg'] = "Parollar bir xil emas";
                    header("location: /register");
                }
            }else{
                $_SESSION['msg'] = "Bu email orqali oldin ro'yxatdan o'tilgan";
                header("location: /register");
            }
        }
    }

}
