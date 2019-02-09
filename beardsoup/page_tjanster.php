<?php
/*
Template Name: Tjänster
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

<!-- Div som innehåller information om företagets olika tjänster, varje tjänst består av en bild och en tillhörande text -->   
<div class="services">

    <div class="services-img">
        <img src="<?php echo get_template_directory_uri() ?>/img/service/video.jpg" width="1200" height="265" alt="En avlång bild med en siluett av en videokamera, på ena sidan av kameran är bakgrunde röd på den andra vit" />
        <a href="<?php echo get_permalink( get_page_by_path( 'Productions' ) ) ?>">
        <div class="services-text"  id="services-video">
            <h3>Video</h3>
            <p>Vi kan hjälpa dig att skapa allt från reklamfilmer och musikvideos till dokumentärer. Klicka för att se tidigare saker vi har gjort!</p>
        </div> 
        </a> 
    </div>

    <div class="services-img">
        <img src="<?php echo get_template_directory_uri() ?>/img/service/sound.jpg" width="1200" height="265" alt="En avlång bild med en siluett av en mikrofon, på ena sidan av mikrofonen är bakgrunde blå på den andra vit" />
        <a href="<?php echo get_permalink( get_page_by_path( 'Records' ) ) ?>">
        <div class="services-text"  id="services-sound">
            <h3>Ljud</h3>
            <p>Tillsammans har vi många års erfarenhet att skapa musik, vi kan hjälpa dig med ditt musikprojekt om det så är en reklamjingel som att skapa en låt. I vår podcast Beardsoup Records skapar vi låtar från ljud våra lyssnare skickar in, klicka för att läsa mer och lyssna!</p>
        </div>
        </a>       
    </div>

    <div class="services-img">
        <img src="<?php echo get_template_directory_uri() ?>/img/service/picture.jpg" width="1200" height="265" alt="En avlång bild med en siluett av en kamera på ett stativ, på ena sidan av kameran är bakgrunde grön på den andra vit" />
        <a href="<?php echo get_permalink( get_page_by_path( 'Productions' ) ) ?>">
        <div class="services-text"  id="services-picture">
            <h3>Bild</h3>
            <p>Bra bilder och en tydlig grafisk profil är viktigt för alla företag eller föreningar, vi kan hjälpa dig med fotografering eller skapa en grafisk profil, klicka för att se vad vi tidigare har gjort och läsa mer!</p>
        </div>
        </a>          
    </div>
</div>

<?php get_footer(); ?>