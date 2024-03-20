<?php

Namespace App\Controllers;

use App\Route;
use App\Models\Auth;

Class AuthController extends Controller {

    /**
     * Display main login page.
     */
    public static function index() {
        return new AuthController('auth/login');
    }

        /**
     * Log the user out of the system.
     * @var string
     */
    public static function Login($request) {

    
        $successful_login = Auth::Login($request['id'],$request['password']);

        if(!$successful_login) {
            // If Validation fails, return user to login with errors.
            $_SESSION['errors'] = ['Invalid Login' => 'User ID or password is invalid.'];
            Route::Redirect('/'); 
        }

        // Successful Login - Reroute to Dashboard
        Route::Redirect('/');
    }

    /**
     * Log the user out of the system.
     * @var string
     */
    public static function Logout() {
        Auth::Logout();
    }

        /**
     * Display register page.
     */
    public static function register() {
        return new AuthController('auth/register');
    }

}