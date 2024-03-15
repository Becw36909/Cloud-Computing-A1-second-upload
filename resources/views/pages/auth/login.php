<main class="form-signin m-auto text-center" style="max-width:400px">
  <form action="/login" method="post" >
    <h1 class="h3 mb-3 fw-normal">Login</h1>

    <!-- Login Form -->
    <div class="form-floating mb-3">
      <input type="id" class="form-control" name="userID" id="userID"  value="" placeholder="Login">
      <label >User ID</label>
      <span>placeholder for invalid messages</span>
    </div>
    <div class="form-floating mb-3">
      <input type="password" class="form-control" name="password" id="password" placeholder="Password">
      <label for="floatingPassword">Password</label>
      <span>placeholder for invalid messages</span>
    </div>
    <button class="w-100 mb-3 btn btn-lg btn-primary" type="submit">Sign in</button>
    <!-- End Login Form -->
    <a href="/register">No Account? Register now!</a>
  </form>
</main>
