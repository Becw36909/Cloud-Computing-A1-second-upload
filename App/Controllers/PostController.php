<?php

Namespace App\Controllers;

use App\Route;

Class PostController extends Controller {

    /**
     * Shows the logged in dashboard
     */
    public static function Index() {


        $posts = FindRecentPosts($_SESSION['user']['id']);

        return new PostController(
            'post/index', 
            [ 
                'posts' => $posts
            ]
        );

    }

        /**
     * Stores the logged in user post
     */
    public static function Store($request) {

        if (empty($request['subject']) || empty($request['message'])) {
            // If Validation fails, return user to registration page with errors.
            $_SESSION['errors'] = ['Post must have a subject and message.'];
            Route::Redirect('/register');
        }

        else (Post::Store($_SESSION['user']['id'], $request['subject'], $request['message']));
        // Return user to login page with success message.
        $_SESSION['success'] = 'Successfully created new post!';
        Route::Redirect('/');
    }

    }

}