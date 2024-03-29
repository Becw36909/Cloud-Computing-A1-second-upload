<main class="container mx-auto">
    <div class="row gx-5">
        <div class="col-lg-3 p-3 text-center">
            <?php
            // Retrieve the URL of the user's image from the session
            $imageUrl = $_SESSION['user']['image_path'] ?? null;
            ?>
            <!-- Check if $imageUrl is not null -->
            <?php if ($imageUrl !== null) : ?>
                <!-- Display user's image with correct size -->
                <img src="<?php echo $imageUrl; ?>" style="width: 120px; height: 120px;" />
            <?php else : ?>
                <!-- If $imageUrl is null, display a placeholder image -->
                <img src="https://placehold.co/120" />
            <?php endif; ?>
            <h2 class="fw-normal">
                <a href="/user"><?php echo $_SESSION['user']['user_name']; ?></a>
            </h2>
        </div>

        <div class="col-lg-9">
            <!-- Submit Post Form -->

            <form action="/post/store" method="post" enctype="multipart/form-data">
                <h5>Create a new post</h5>
                <input class="form-control" input type="text" id="subject" name="subject" rows="1" placeholder="Subject"></input>

                <textarea class="form-control" id="message" name="message" rows="3" placeholder="Whats on your mind..."></textarea>
                <!-- File Upload Field -->
                <div class="form-floating mb-3">
                    <input type="file" class="form-control" name="image" id="image" accept="image/*">
                    <label for="image">Upload Image</label>
                </div>
                <!-- Hidden input field for image path -->
                <input type="hidden" name="image_path" id="image_path">

                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="submit" class="btn btn-primary mt-3">Submit New Post</button>
                </div>
            </form>

            <h5>Posts</h5>
            <?php if (empty($page->args['posts'])) : ?>
                <div class="alert alert-info" role="alert">
                    No posts found.
                </div>
            <?php else : ?>

                <?php foreach ($page->args['posts'] as $post) : ?>
                    <div class="row border border-2 rounded-3 shadow-sm p-3 mb-3">
                        <div class="col-lg-4">
                            <img src="<?php echo $post->image_path; ?>" />
                        </div>
                        <div class="col-lg-6 p-3">
                            <?php if ($post->updated_at != $post->created) : ?>
                                <p><strong>Updated At:</strong> <?php echo $post->updated_at->format('d-m-Y H:i'); ?></p>
                            <?php endif; ?>
                            <p><strong>Date and Time Posted:</strong> <?php echo $post->created->format('d-m-Y H:i'); ?></p>
                            <p><strong>Posted By:</strong> <?php echo $post->username; ?></p>
                            <p><strong>Subject:</strong> <?php echo $post->subject; ?></p>
                            <p><strong>Message:</strong> <?php echo $post->message; ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
</main>