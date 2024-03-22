<?php

Namespace App\Controllers;

use App\Route;
use App\Models\User;
use App\Models\Auth;

Class UserController extends Controller {

    public static function Show() {

        return new UserController('user/show');
        
    }

        /**
     * Update user password
     */
    public static function Update($request)
    {
        $user = User::Find($_SESSION['user']['id']);

        if (empty($request['oldPassword']) || empty($request['newPassword'])) {
            // If Validation fails, return user to registration page with errors.
            $_SESSION['errors'] = ['All fields must be filled out.'];
            Route::Redirect('/user');
        }

        if ($user->password != $request['oldPassword']) {
            // If Validation fails, return user to user admin page with errors.
            $_SESSION['errors'] = ['Invalid Password' => 'The old
            password is incorrect'];
            Route::Redirect('/user');
        }
        
        else ($user->UpdatePassword($request['newPassword']));
        // Return user to login page with success message.
        $_SESSION['success'] = 'Registration Successful!';
        Auth::logout();
    }

}