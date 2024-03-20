<?php

Namespace App\Controllers;

use App\Route;

Class PostController extends Controller {

    /**
     * Test page 1
     */
    public static function Index() {


        $posts = [];

        return new PostController(
            'post/index', 
            [ 
                'posts' => $posts
            ]
        );

    }

}