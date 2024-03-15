<?php

namespace App\Models;
use App\Models\User;
use App\Route;

class Auth 
{
    public static function validate($userID, $password) {

        if(empty($userID) || empty($password)){
            return false;
        }
    
        $user = User::find($userID);

        if(!$user || $user['password'] != $password){
            return false;
        }
        else {
            return new User($user);
        }
    }

    public static function Login($user){
        // Begin session and set user.
        $_SESSION['logged in'] = true;
        $_SESSION['user'] = [
        'userID' => $user->userID,
        ];
    }

    public static function logout(){
        // Destroy session to log user out.
        session_unset();
        session_destroy();

        // Reroute user to login.
        Route::Redirect('/');
    }
}