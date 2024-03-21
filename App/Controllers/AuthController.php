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
     * Log the user into the system.
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
    public static function Register() {


        return new AuthController('auth/register');
    }

    /**
     * Register New User
     */
    public static function RegisterUser() {
        
        if(isset($request)){
            if(!Auth::CheckID($request['id'])) {
                // If Validation fails, return user to registration page with errors.
                $_SESSION['errors'] = ['Invalid ID' => 'User ID is already in use.'];
                Route::Redirect('auth/register'); 
            }
    
            if(!Auth::CheckUsername($request['username'])) {
                // If Validation fails, return user to registration page with errors.
                $_SESSION['errors'] = ['Invalid Username' => 'User Name is already in use.'];
                Route::Redirect('auth/register'); 
            }
    
            else (Auth::Register($request['id'],$request['username'],$request['password']));
            // Return user to login page with success message.
            $_SESSION['success'] = ['Registration Successful!'];
            Route::Redirect('auth/login'); 
        }
    }
    
}