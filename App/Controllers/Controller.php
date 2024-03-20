<?php

Namespace App\Controllers;


Class Controller {

    public $path, $args, $user, $post;

    function __construct($page, $args = []) {
        $this->path = "resources/views/pages/$page.php";
        $this->args = $args;
        $this->user = $_SESSION['user'] ?? null;
        $this->post = $_POST;
    }

}