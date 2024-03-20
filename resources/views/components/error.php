<div class="container mx-auto mb-3">
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Errors:</strong> 

  <ul class="">
    <?php foreach($_SESSION['errors'] as $error) {
      echo "<li> $error </li>";
    }?>
  </ul>
</div>
</div>