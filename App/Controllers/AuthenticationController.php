<?php
namespace App\Controllers;

use App\Helpers\Auth;

class AuthenticationController{

    public function __construct()
    {
        layout('loginMain');
    }

    public function loginPage(){
        return view('Authentication/login','login');
    }
    
    public function registerPage(){
        return view('Authentication/register','Register');
    }

    public function login(){
        $data = [
            'email' => $_POST['email'],
            'password' => $_POST['password']
        ];
        $user = Auth::attach($data);
        // dd($user);
        // if($user){
        //     header("location: /");
        // }else{
        //     header("location: /login");
        // }
        
    }

    public function logout(){
        Auth::logout();
        header('location: /login');
    }
}


?>