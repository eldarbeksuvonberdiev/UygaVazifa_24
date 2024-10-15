<?php

namespace App\Helpers;

use App\Models\User;

class Auth
{

    public static function check()
    {

        if (isset($_SESSION['auth'])) {
            return true;
        }
        return false;
    }

    public static function user()
    {

        if (self::check()) {
            return $_SESSION['auth'];
        }
        return false;
    }

    public static function  attach($data)
    {
        $user = User::attach($data);
        if ($user) {
            $_SESSION['auth'] = $user;
            header('location: /');
        } else {
            $_SESSION['msg'] = "Email yoki login xato";
            header('location: /login');
        }
    }

    public static function logout()
    {
        unset($_SESSION['auth']);
    }
}
