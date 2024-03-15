<?php 
    // Render navigation
    include 'resources/views/components/header.php';
    include 'resources/views/components/navigation.php';

    // Render page information
    require $page->path;

    // Render footer
    include 'resources/views/components/footer.php';
?>