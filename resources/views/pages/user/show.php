<main class="container mx-auto">
<p>This is the User Admin page. You can get any user details from the $_SESSION variable</p>
<ul>
    <li>ID : <?php echo $_SESSION['user']['id'] ?></li>
    <li>Username : <?php echo $_SESSION['user']['user_name'] ?></li>
</ul>
</main>