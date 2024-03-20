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
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Whats on your mind..."></textarea>

                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="submit" class="btn btn-primary mt-3" >Submit New Post</button>
                </div>
            </form>

            <h5>Posts</h5>
                <?php for($i = 0; $i < 10; $i++): ?>
                    <div class="row border border-2 rounded-3 shadow-sm p-3 mb-3">
                        <div class="col-lg-4">
                            <img src="https://placehold.co/200" />
                        </div>
                        <div class="col-lg-6 p-3">
                            This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.
                        </div>
                    </div>

                <?php 
                    endfor; 
                ?>
                    
            </div>


    </div>
</main>