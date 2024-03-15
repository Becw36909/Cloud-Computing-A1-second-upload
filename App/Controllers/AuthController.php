<?php

Namespace App\Controllers;

use App\Route;
use App\Models\User;
use App\Models\Auth;

Class AuthController extends Controller {

    /**
     * Display main login page.
     */
    public static function index() {
        return new AuthController('auth/login');
    }

        /**
     * Validates login form and tries to login user.
     * @var array
     */
    public static function login($request){

        $user = Auth::validate($request['userID'], $request['password']);

        if(empty($user)){
            // If validation fails, return user to login with errors.
            Route::Redirect('/', null, ['Invalid Login' => 'ID or password is invalid']);
        }

        // Begin User Session
        Auth::Login($user);
        // Successful Login - Reroute to Dashboard
        Route::Redirect('/');
    }


    /**
     * Display register page.
     */
    public static function register() {
        return new AuthController('auth/register');
    }

    /**
     * Log the user out of the system.
     * @var string
     */
    public static function Logout() {
        Auth::Logout();
    }

}