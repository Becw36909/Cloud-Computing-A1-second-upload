<main class="container mx-auto">
    <div class="row gx-5">
        <div class="col-lg-3 p-3  text-center">
            <img src="https://placehold.co/120" />
            <h2 class="fw-normal">
                <a href="/user"><?php echo $_SESSION['user']['user_name']  ?></a>
            </h2>
        </div>

        <div class="col-lg-9">


            <form action="/post/store" method="post">
                <h5>Create a new post</h5>
                <textarea class="form-control" input type="text" id="subject" name="subject" rows="1" placeholder="Subject"></textarea>

                <textarea class="form-control" id="message" name="message" rows="3" placeholder="Whats on your mind..."></textarea>

                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="submit" class="btn btn-primary mt-3">Submit New Post</button>
                </div>
            </form>

            <h5>Posts</h5>
            <?php
            foreach ($posts as $post) :
            ?>
                <div class="row border border-2 rounded-3 shadow-sm p-3 mb-3">
                    <div class="col-lg-4">
                        <img src="https://placehold.co/200" />
                    </div>
                    <div class="col-lg-6 p-3">
                        <p><strong>Date and Time Posted:</strong> <?php echo $post->getDatetime(); ?></p>
                        <p><strong>Subject:</strong> <?php echo $post->getSubject(); ?></p>
                        <p><strong>Message:</strong> <?php echo $post->getMessage(); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>


        </div>


    </div>
</main>