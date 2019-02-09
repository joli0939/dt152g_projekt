<?php get_header(); ?>

<!-- Div som visar innehållet i en enskild bloggpost -->
<div id="single-post-div">
    <!-- The loop -->
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div class="single-post-featured-image">
        <?php 
            // Kontrollerar om posten har en thumbnail och skriver ut den
            if ( has_post_thumbnail() ) {
                the_post_thumbnail('single-post-top');
            } 
        ?>
    </div>
        <div class="single-post-content">
            <h2><?php the_title(); ?></h2>
            <?php the_content(); ?>
        </div>
    <?php endwhile; else: ?>
    <p>
        <?php _e('Ledsen, inga poster matchade din kriterier.'); ?>
    </p>
    <?php endif; ?>
</div>

<?php get_footer(); ?>