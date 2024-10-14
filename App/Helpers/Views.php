<?php

namespace App\Helpers;

class Views{

    public static $view = 'main';
    public static function make($view,$action,$models = []){

        ob_start();
        include dirname(__DIR__) . '/Views/' . $view . '.php';
        $content = ob_get_clean();
        include dirname(__DIR__).'/Views/'.self::$view.'.php';
    }
}

?>