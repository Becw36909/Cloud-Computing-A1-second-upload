<?php

Namespace App\Controllers;

use App\Route;

Class PageController extends Controller {

    /**
     * Dashboard
     */
    public static function dashboard() {

        return new PageController(
            'dashboard', // page file name
            [ 
                'page_text' => "dashboard data" 
            ]
        );

    }

    /**
     * Test page 2
     */
    public static function page2() {

        return new PageController(
            'page1', // page file name
            [ 
                'page_text' => "Page 2 data" 
            ]
        );

    }

        /**
     * Test page 3
     */
    public static function page3() {

        return new PageController(
            'page1', // page file name
            [ 
                'page_text' => "Page 3 list test",
                'list_test' => ["Item 1", "Item 2", "Item 3"]
            ]
        );

    }


}