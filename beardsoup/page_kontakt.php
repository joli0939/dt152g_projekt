<?php
/*
Template Name: Kontakt
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

<!-- Kontaktinformation -->
<div id="contact-form-div">
    <div id="contact-text">
        <h4>Hör av er till oss!</h4>
        <p><a href="mailto:anton.alfredsson@gmail.com">anton.alfredsson@gmail.com</a></p>
        <p><a href="tel:+46722043722">0722 04 37 22</a></p>
        <p>Eller använd vårt kontaktformulär!</p>
        <p class="contact-arrow" id="contact-arrow-right">&rarr;</p>
        <p class="contact-arrow" id="contact-arrow-down">&darr;</p>
    </div>

    <!-- The loop som skriver ut kontaktformulär som skapas i inlägg -->
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
    <?php endwhile; else: ?>
    <p>
        <?php _e('Ledsen, inga poster matchade din kriterier.'); ?>
    </p>
    <?php endif; ?>
</div>

<!-- Information om de som arbetar på företaget -->
<div class="contact-staff">
    <article>
        <img src="<?php echo get_template_directory_uri() ?>/img/portrait/anton.jpg" width="150" height="238" alt="Bild av Anton Alfredsson" />
        <h4>Anton Alfredsson</h4>
        <p>Har studerat rörlig bild på Högskolan Dalarna, duktig på att filma och skapa specialeffekter för video. Har haft ett flertal band där han spelat trummor, gitarr och sång. </p>
    </article>
    <article>
        <img src="<?php echo get_template_directory_uri() ?>/img/portrait/thomas.jpg" width="150" height="238" alt="Bild av Thomas Melin" />
        <h4>Thomas Melin</h4>
        <p>Har studerat kreativt skrivande och är duktig på att författa manus och skriva låtar, har varit med och skapat Ökensagan som är en teatermusikal som spelades i Ånge. Har även han spelat i ett flertal band, just nu i Sundsvallsbandet Domino Majestic.</p>
    </article>
</div>

<?php get_footer(); ?>