<header class="p-3 text-bg-dark mb-3">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-between justify-content-lg-start">
        <div class="col-md-3 mb-2 mb-md-0">
          <span class="fs-4">
            Task 1
          </span>

      </div>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <?php if(isset($_SESSION['user'])) : ?>
            <li><a href="/" class="nav-link px-2 mx-2 text-white">Dashboard</a></li>
            <li><a href="/user" class="nav-link px-2 mx-2 text-white">Profile</a></li>
          <?php endif; ?>
        </ul>

        <div class="text-end">
          <?php if(isset($_SESSION['user'])) : ?>
          <a href="/logout" class="btn btn-outline-light me-2">Logout</a>
          <?php else : ?>
          <a href="/" class="btn btn-outline-light me-2">Login</a>
          <a href="/register" class="btn btn-primary">Register</a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </header>