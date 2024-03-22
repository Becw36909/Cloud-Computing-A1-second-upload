<?php

namespace App\Controllers;

use App\Route;
use App\Models\Post;

class PostController extends Controller
{

    /**
     * Shows the logged in dashboard
     */
    public static function Index()
    {
        $posts = Post::FindRecentPosts();

        return new PostController(
            'post/index',
            [
                'posts' => $posts
            ]
        );
    }


    /**
     * Stores the logged in user's post
     */
    public static function Store($request)
    {

        if (empty($request['subject']) || empty($request['message'])) {
            // If Validation fails, return user to registration page with errors.
            $_SESSION['errors'] = ['Post must have a subject and message.'];
            Route::Redirect('/');
        } else (Post::Store($_SESSION['user']['id'], $request['subject'], $request['message']));
        // Return user to dashboard page with success message.
        $_SESSION['success'] = 'Successfully created new post!';
        Route::Redirect('/');
    }
}
