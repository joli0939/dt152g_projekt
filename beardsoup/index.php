<?php get_header(); ?>
<!-- The loop -->
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <h2><?php the_title(); ?></h2>
    <?php the_content(); ?>
<?php endwhile; else: ?>
<p>
    <?php _e('Ledsen, inga poster matchade din kriterier.'); ?>
</p>
<?php endif; ?>
<?php get_footer(); ?>