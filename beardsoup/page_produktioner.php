<?php
/*
Template Name: Produktioner
*/
get_header(); ?>

<!-- Använder featured image för att kunna ha separata banners för varje sida -->
<div class="banner">
    <!-- The loop -->
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <?php 
        // Kontrollerar om posten har en thumbnail och skriver ut den
        if ( has_post_thumbnail() ) {
            the_post_thumbnail('banner-image');
        } 
    ?>
    <?php endwhile; else: ?>
    <p>
        <?php _e('Det finns ingen banner inlagd för denna sida.'); ?>
    </p>
    <?php endif; ?>
</div>

<!-- Div med loggor som länkar till de olika produktionerna, använder permalink och get_page_by_path för att länka till sida med motsvarande sidnamn -->
<div class="index-productions productions-site">
    <p><a href="<?php echo get_permalink( get_page_by_path( 'Channel' ) ) ?>"><img src="<?php echo get_template_directory_uri() ?>/img/logo/channel.png" width="450" height="439" alt="Logotyp för Beardsoup-Channel" /></a></p>
    <p><a href="<?php echo get_permalink( get_page_by_path( 'Productions' ) ) ?>"><img src="<?php echo get_template_directory_uri() ?>/img/logo/productions.png" width="450" height="439" alt="Logotyp för Beardsoup-Productions" /></a></p>
    <p><a href="<?php echo get_permalink( get_page_by_path( 'Records' ) ) ?>"><img src="<?php echo get_template_directory_uri() ?>/img/logo/records.png" width="450" height="439" alt="Logotyp för Beardsoup-Records" /></a></p>
</div>

<?php get_footer(); ?>