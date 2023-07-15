<?php get_header(); ?>
<h1>Le blog Capitaine WP</h1>
<p><?php echo get_page_template_slug(); ?></p>


<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <article class="post">
            <h2><?php the_title(); ?></h2>

            <div class="post__img post__img--excerpt" style="background-image:url(<?php the_post_thumbnail_url() ?>);"></div>

            <p class="post__meta">
                Publié le <?php the_time(get_option('date_format')); ?>
                par <?php the_author(); ?> • <?php comments_number(); ?>
            </p>

            <div class="post__excerpt">
                <?php the_excerpt(); ?>
            </div>

                <a href="<?php the_permalink(); ?>" class="post__link">Lire la suite</a>
        </article>


<?php endwhile;
endif; ?>
<?php get_footer(); ?>