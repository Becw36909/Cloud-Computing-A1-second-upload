<main class="container mx-auto">
    <div class="row gx-5">
        <div class="col-lg-3 p-3  text-center">
            <img src="https://placehold.co/120" />
            <h2 class="fw-normal">
                <a href="/user"><?php echo $_SESSION['user']['user_name']  ?></a>
            </h2>
        </div>

        <div class="col-lg-9">


            <form action="/post/update" method="post">
                <h5>Edit Post</h5>
                <textarea class="form-control" input type="text" id="subject" name="subject" rows="1" placeholder="Subject"></textarea>

                <textarea class="form-control" id="message" name="message" rows="3" placeholder="Whats on your mind..."></textarea>

                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="submit" class="btn btn-primary mt-3">Submit New Post</button>
                </div>
            </form>
        </div>

    </div>
</main>