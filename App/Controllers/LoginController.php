<?php
namespace App\Controllers;

use App\Helpers\Auth;

class LoginController{

    public function __construct()
    {
        layout('loginMain');
    }

    public function loginPage(){
        return view('Authentication/login','Admin menu');
    }

    public function registerPage(){
        return view('Authentication/register','login');
    }

}


?>