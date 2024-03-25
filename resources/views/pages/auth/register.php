<main class="form-signin m-auto text-center" style="max-width:400px">
  <form action="/register/store" method="post" enctype="multipart/form-data"> <!-- Ensure enctype attribute is set to allow file uploads -->
    <h1 class="h3 mb-3 fw-normal">Register</h1>

    <!-- Registration Form -->
    <div class="form-floating mb-3">
      <input type="id" class="form-control" name="id" id="id" placeholder="User ID">
      <label for="id">User ID</label>
    </div>
    <div class="form-floating mb-3">
      <input type="text" class="form-control" name="username" id="username" placeholder="User Name">
      <label for="username">User Name</label>
    </div>
    <div class="form-floating mb-3">
      <input type="password" class="form-control" name="password" id="password" placeholder="Password">
      <label for="password">Password</label>
    </div>

    <!-- File Upload Field -->
    <div class="form-floating mb-3">
      <input type="file" class="form-control" name="image" id="image" accept="image/*">
      <label for="image">Upload Image</label>
    </div>
    <!-- Hidden input field for image path -->
    <input type="hidden" name="image_path" id="image_path">

    <button class="w-100 mb-3 btn btn-lg btn-primary" type="submit">Register</button>
    <!-- End Registration Form -->
  </form>
</main>