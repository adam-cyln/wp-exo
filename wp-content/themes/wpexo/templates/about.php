<?php 
/*
  Template Name: A propos
*/
?>

<?php get_header(); ?>
  <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
    
    <article class="page page--about">

    <div class="page__img page__img--single" style="background-image:url(<?php the_post_thumbnail_url() ?>);"></div>

      <h1 class="page__title"><?php the_title(); ?></h1>

      <div class="page__content">
        <?php the_content(); ?>
      </div>
    </article>


  <?php endwhile; endif; ?>
<?php get_footer(); ?>
