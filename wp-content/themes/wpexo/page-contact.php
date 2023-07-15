<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <article class="post">

            <div class="post__img post__img--single" style="background-image:url(<?php the_post_thumbnail_url() ?>);"></div>

            <h1 class="post__title"><?php the_title(); ?></h1>

            <div class="post__content">
                <?php the_content(); ?>
            </div>

            <?php
            $location = get_field('location');
            var_dump($location);
            if ($location) : ?>
                <div class="acf-map" data-zoom="16">
                    <div class="marker" data-lat="<?php echo esc_attr($location['lat']); ?>" data-lng="<?php echo esc_attr($location['lng']); ?>"></div>
                </div>
            <?php endif; ?>

        </article>


<?php endwhile;
endif; ?>
<?php get_footer(); ?>