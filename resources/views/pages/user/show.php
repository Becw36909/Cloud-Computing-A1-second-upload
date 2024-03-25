<main class="container mx-auto">
    <div class="row gx-5">
        <div class="col-lg-3 p-3 text-center">
            <img src="https://placehold.co/120" />
            <h2 class="fw-normal">
                <a href="/user"><?php echo $_SESSION['user']['user_name'] ?></a>
            </h2>
        </div>

        <br>
        <br>

        <div class="col-lg-9">
            <form action="/user/update" method="post">
                <h5>Password Edit Area</h5>
                <div class="mb-3">
                    <label for="oldPassword" class="form-label">Old Password</label>
                    <input type="password" class="form-control" id="oldPassword" name="oldPassword">
                </div>
                <div class="mb-3">
                    <label for="newPassword" class="form-label">New Password</label>
                    <input type="password" class="form-control" id="newPassword" name="newPassword">
                </div>
                <button type="submit" class="btn btn-primary">Change</button>
            </form>

            <h5>User Post Edit Area</h5>
            <?php if (empty($page->args['posts'])) : ?>
                <div class="alert alert-info" role="alert">
                    No posts found.
                </div>
            <?php else : ?>
                <?php foreach ($page->args['posts'] as $post) : ?>
                    <div class="row border border-2 rounded-3 shadow-sm p-3 mb-3">
                        <div class="col-lg-4">
                            <img src="https://placehold.co/200" />
                        </div>
                        <div class="col-lg-6 p-3">
                        <?php if ($post->updated_at != $post->created) : ?>
                                <p><strong>Updated At:</strong> <?php echo $post->updated_at->format('d-m-Y H:i'); ?></p>
                            <?php endif; ?>

                            <p><strong>Date and Time Posted:</strong> <?php echo $post->created->format('d-m-Y H:i'); ?></p>
                            <p><strong>Subject:</strong> <?php echo $post->subject; ?></p>
                            <p><strong>Message:</strong> <?php echo $post->message; ?></p>
                        </div>
                        <div class="col-lg-2">
                            <a href="/post/edit?key=<?php echo $post->key; ?>" class="btn btn-primary">Edit</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</main>
