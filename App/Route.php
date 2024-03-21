<?php 

namespace App;

use App\Controllers\AuthController;
use App\Controllers\PostController;
use App\Controllers\UserController;


class Route {

    public static function getPage() {
        $url = strtok($_SERVER["REQUEST_URI"], '?');
        
        if(isset($_SESSION['user'])) {
            switch($url) {
                case '/' : return PostController::Index(); break;
                // case '/post/store' : return PostController::Store($_POST); break;
                case '/user' : return UserController::Show(); break;
                case '/logout' : return AuthController::Logout(); break;
                default:  self::Redirect('/'); break;
            }
        }
        else {
            switch($url) {
                case '/' : return AuthController::index(); break;
                case '/login' : return AuthController::Login($_POST); break;
                case '/register' : return AuthController::Register(); break;
                case '/register/store' : return AuthController::RegisterUser($_POST); break;

                default:  self::Redirect('/'); break;
            }
        }




    }

    public static function Redirect($location, $success = null, $errors = null) {
            header("Location: $location");
            exit();
    }

}