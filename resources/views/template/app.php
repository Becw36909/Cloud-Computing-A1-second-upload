<?php 
    // Render navigation
    include 'resources/views/components/header.php';
    include 'resources/views/components/navigation.php';


    if(isset($_SESSION['errors']) && count($_SESSION['errors'])) {
        include 'resources/views/components/error.php';
    }
    if(isset($_SESSION['success']) && isset($_SESSION['success'])) {
        include 'resources/views/components/success.php';
    }

    // Render page information
    require $page->path;

    // Render footer
    include 'resources/views/components/footer.php';

    // Clear flash messages
    unset($_SESSION['success']);
    unset($_SESSION['errors']);
    $_SESSION['errors'] = [];
?>