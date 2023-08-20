<?php
    $title = get_sub_field('title');
?>

<section class="categories-component">
    <div class="container">
        <h2 class="categories-component__title">
            <?php echo $title; ?>
        </h2>
    <?php echo do_shortcode('[product_categories]'); ?>
    </div>
</section>
