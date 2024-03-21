<main class="form-signin m-auto text-center" style="max-width:400px">
  <form action="/register/store" method="post" >
    <h1 class="h3 mb-3 fw-normal">Register</h1>

    <!-- Registration Form -->
    <div class="form-floating mb-3">
      <input type="id" class="form-control" name="id" id="id"  placeholder="User ID">
      <label >User ID</label>
    </div>
    <div class="form-floating mb-3">
      <input type="text" class="form-control" name="username" id="username"  placeholder="User Name">
      <label >User Name</label>
    </div>
    <div class="form-floating mb-3">
      <input type="password" class="form-control" name="password" id="password" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>
    <button class="w-100 mb-3 btn btn-lg btn-primary" type="submit">Register</button>
    <!-- End Registration Form -->
  </form>
</main>
