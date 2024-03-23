<main class="container mx-auto">
    <div class="row gx-5">
        <div class="col-lg-3 p-3  text-center">
            <img src="https://placehold.co/120" />
            <h2 class="fw-normal">
                <a href="/user"><?php echo $_SESSION['user']['user_name']  ?></a>
            </h2>
        </div>

        <div class="col-lg-9">
        <?php print_r($page->args['post']) ?>

            <form action="/post/update" method="post">
                abdcddd
            <input input type="text" required id="key" name="key" value="<?php echo $page->args['post']['key']; ?>" />
                <h5>Edit Post</h5>
                <input class="form-control" input type="text" id="subject" name="subject" rows="1" 
                value="<?php echo $page->args['post']['subject']; ?>" placeholder="Subject"></input>

                <textarea class="form-control" id="message" name="message" rows="3" 
                 placeholder="Whats on your mind..."><?php echo $page->args['post']['message']; ?></textarea>

                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="submit" class="btn btn-primary mt-3">Edit Post</button>
                </div>
            </form>
        </div>

    </div>
</main>