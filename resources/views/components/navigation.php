<header class="p-3 text-bg-dark mb-3">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <div class="col-md-3 mb-2 mb-md-0">
        


          <span class="fs-4">
            Nav Header
          </span>

      </div>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="/" class="nav-link px-2 mx-2 text-white">Subscriptions</a></li>
          <li><a href="/query" class="nav-link px-2 mx-2 text-white">Query</a></li>
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