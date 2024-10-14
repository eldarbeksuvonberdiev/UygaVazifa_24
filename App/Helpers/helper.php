<?php

use App\Helpers\Auth;
use App\Helpers\Views;

if(!function_exists('dd')){
    function dd(... $data){
        echo "<body bgcolor='grey'>";
        echo "<pre style='background-color:black;color:#0dbb2a;font-family:monospace'>";
        print_r($data);
        echo '</pre>';
        exit;
    }
}

if(!function_exists('view')){

    function view($view,$title,$models = []){
        Views::make($view,$title,$models);
    }
}

if(!function_exists('layout')){

    function layout($views){
        Views::$view = $views;
    }
}

if(!function_exists('check')){

    function check(){
        Auth::check();
    }
}

if(!function_exists('auth')){

    function auth(){
        Auth::user();
    }
}


?>