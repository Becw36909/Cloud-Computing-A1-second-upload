<?php

Namespace App\Controllers;

use App\Route;
use App\Models\Auth;
use App\Storage;

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
    public static function RegisterUser($request)
    {

        if (empty($request['id']) || empty($request['username']) || empty($request['password'])) {
            // If Validation fails, return user to registration page with errors.
            $_SESSION['errors'] = ['All fields must be filled out.'];
            Route::Redirect('/register');
        }

        if (Auth::CheckID($request['id'])) {
            // If Validation fails, return user to registration page with errors.
            $_SESSION['errors'] = ['Invalid ID' => 'User ID is already in use.'];
            Route::Redirect('/register');
        }

        if (Auth::CheckUsername($request['username'])) {
            // If Validation fails, return user to registration page with errors.
            $_SESSION['errors'] = ['Invalid Username' => 'User Name is already in use.'];
            Route::Redirect('/register');
        }

        // Check if the image is uploaded
        if (!empty($_FILES['image']['tmp_name'])) {
            // Get the file name provided by the user
            $fileName = $_FILES['image']['name'];

            // Handle image upload and store it in Google Cloud Storage
            $uploadedImagePath = Storage::UploadImageToCloudStorage($_FILES['image'], $fileName);

            // Add the path to the uploaded image to the request
            $request['image_path'] = $uploadedImagePath;
        } else {
            // If image is empty, return an error message
            $_SESSION['errors'] = ['Image is required.'];
            Route::Redirect('/register');
        }


        // Register the user including the image path
        Auth::Register($request['id'], $request['username'], $request['password'], $request['image_path']);

        // Return user to login page with success message.
        $_SESSION['success'] = 'Registration Successful!';
        Route::Redirect('/');
    }
    
    
}