<?php
namespace App\Controllers;

use App\Helpers\Auth;

class AdminController{

    // public function __construct()
    // {
    //     layout('loginMain');
    // }

    public function index(){
        return view('Authentication/login','login');
    }

}


?>