<?php

Namespace App\Controllers;

use App\Route;

Class UserController extends Controller {

    public static function Show() {

        return new UserController('user/show');
        
    }

}