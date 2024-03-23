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
        } else (Post::Store($_SESSION['user']['id'], $_SESSION['user']['user_name'], $request['subject'], $request['message']));
        // Return user to dashboard page with success message.
        $_SESSION['success'] = 'Successfully created new post!';
        Route::Redirect('/');
    }

    /**
     * Edit the logged in user's post
     */
    public static function Edit($request)
    {

        $post = Post::Find($request['key']);

        if (!$post) {
            // If Validation fails, return user to registration page with errors.
            $_SESSION['errors'] = ['Post not found.'];
            Route::Redirect('user/show');

          //  Otherwise return a view for them to edit the post
        } 
        
        return new PostController(
            'post/edit',
            [
                'post' => $post
            ]
        );
    }

        /**
     * Update the logged in user's post
     */
    public static function Update($request)
    {

        $post = Post::Find($request['key']);

        if (!$post) {
            // If Validation fails, return user to registration page with errors.
            $_SESSION['errors'] = ['Post not found.'];
            Route::Redirect('/');
        } 
        if (empty($request['subject']) || empty($request['message'])) {
            // If Validation fails, return user to registration page with errors.
            $_SESSION['errors'] = ['Post must have a subject and message.'];
            Route::Redirect('/');
        }
        else ($post->UpdatePost($request['subject'], $request['message'] ));
        // Return user to login page with success message.
        $_SESSION['success'] = 'Post updated!';
            Route::Redirect('/');
    }


}
