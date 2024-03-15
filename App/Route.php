<?php 

namespace App;

use App\Controllers\AuthController;
use App\Controllers\PageController;

class Route {

    public static function getPage() {
        $url = strtok($_SERVER["REQUEST_URI"], '?');
        // var_dump($url);

        switch($url) {
            case '/' : return AuthController::index(); break;
            case '/register' : return AuthController::register(); break;
            case '/dashboard' : return PageController::dashboard(); break;
            case '/page2' : return PageController::page2(); break;
            case '/page3' : return PageController::page3(); break;
            default:  self::Redirect('/'); break;
        }


    }

    public static function Redirect($location, $success = null, $errors = null) {
            header("Location: $location");
            exit();
    }

}