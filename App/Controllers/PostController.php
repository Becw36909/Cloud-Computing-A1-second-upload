<?php

namespace App\Controllers;

use App\Route;
use App\Models\Post;
use App\Storage;

class PostController extends Controller
{

    /**
     * Shows the logged in dashboard
     */
    public static function Index()
    {
        $posts = Post::FindRecentPosts();

//         // Check if the image path is not null
//         if ($_SESSION['user']['image_path'] !== null) {
//             // Retrieve the user's image data only if the image path is not null
//             $imagePath = Storage::GetImageDataFromBucket($_SESSION['user']['id']);

//             // Add image data to the user session details
//             $_SESSION['user']['image_path'] = $imagePath;
// }

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

        if (empty($request['subject']) || empty($request['message']) ) {
            // If Validation fails, return user to registration page with errors.
            $_SESSION['errors'] = ['Post must have all fields filled out.'];
            Route::Redirect('/');
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
            Route::Redirect('/');
        }
        
        
        Post::Store($_SESSION['user']['id'], $_SESSION['user']['user_name'], 
        $request['subject'], $request['message'], $request['image_path']);
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
        // Validate $request['subject']) and $request['message']
        if (empty($request['key']) || empty($request['subject']) || empty($request['message'])) {
            // If Validation fails, return user to edit page with errors.
            $_SESSION['errors'] = ['Post must have all fields filled out.'];
            Route::Redirect("/post/edit?key=".$request['key']);
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
            Route::Redirect('/');
        }
                
        // Try to get Post from system based off key
        $post = Post::Find($request['key']);

        if (!$post) {
            // If Validation fails, return user to edit page with errors.
            $_SESSION['errors'] = ['Post not found.'];
            Route::Redirect("/post/edit?key=".$request['key']);
        }

        $post->UpdatePost($request['key'], $request['subject'], $request['message'], $request['image_path'] );
        
        // Return user to dashboard page with success message.
        $_SESSION['success'] = 'Post updated!';
            Route::Redirect('/');
    }


}
