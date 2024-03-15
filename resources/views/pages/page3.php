<main class="container mx-auto">

    <h1 class="h1"><?php $page->args['page_text'] ?></h1>

    <ul>
        <?php foreach($page->args['list_test'] as $element ) : ?>
            <li><?php echo $element ?>
        <?php endforeach; ?>
    </ul>
</main>