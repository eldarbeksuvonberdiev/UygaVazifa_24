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
}
