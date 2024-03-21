<?php 

namespace App\Models;

use App\Route;

class Auth {

    public static function Login($id, $password) {

        if(empty($id) || empty($password)) {
            return false;
        }
        
        $user = User::Find($id);

        if(!$user || $user->password != $password) {
            return false;
        }

        self::StartSession($user);

        return true;
    }

    private static function StartSession($user) {
        // Begin session and set user.
        $_SESSION['logged_in'] = true;
        $_SESSION['user'] = [
            'id' => $user->id,
            'user_name' => $user->user_name,
        ];
    }

    public static function logout() {
        // Destroy session to log user out.
        session_unset();
        session_destroy();

        // Reroute user to login.
        Route::Redirect('/');
    }

    public static function CheckID($id) {

        if(empty($id)) {
            return false;
        }
        
        $userID = User::Find($id);

        if($userID->id == $id) {
            return false;
        }

        return true;
    }

    public static function CheckUsername($username) {

        if(empty($username)) {
            return false;
        }
        $userName = User::FindByUsername($username);

        if($userName->user_name == $username) {
            return false;
        }

        return true;
    }

    public static function Register($id, $username, $password) {

        User::CreateNewUser($id, $username, $password);

        return true;
    }

}
