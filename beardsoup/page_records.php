<?php
/*
Template Name: Beardsoup Records
*/
get_header(); ?>

<!-- Använder featured image för att kunna ha separata banners för varje sida -->
<div class="banner">
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

<!-- Information om Beardsoup-Records -->
<div id="records-info">
    <p>Två skägg kokar ihop musik av ljud som du skickar in. En rolig musikpodd med öppna spjäll och högt till tak. Nytt avsnitt var och varannan söndag! - Den här podden spelas in i Sundsvall.</p>
</div>

<!-- Div som listar de poster som skrivs med kategorin beardsoup-records -->
<div class="list-posts list-records">
    <h2>Lista med poster</h2>

    <?php
        // Skapar array med argument för att ladda poster med kategorin beardsoup-productions
        $args = array( 'category_name' => 'beardsoup-records' );

        // The query
        $the_query = new WP_Query( $args );
    ?>

    <?php if ( $the_query->have_posts() ) : ?>

        <!-- The loop -->
        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
            <a href="<?php the_permalink(); ?>">
                <div class="post-div">
                    <?php 
                        // Kontrollerar om posten har en thumbnail och skriver ut den
                        if ( has_post_thumbnail() ) {
                            the_post_thumbnail('thumbnail-mini');
                        } 
                    ?>
                    <?php echo "<p>" . get_the_date('Y-m-d') . "</p>"; ?>
                    <h4><?php the_title(); ?></h4>
                    <?php the_excerpt(); ?>
                </div>
            </a>
        <?php endwhile; ?>

        <!-- Reset av postdata -->
        <?php wp_reset_postdata(); ?>

        <?php else:  ?>

        <p><?php _e( 'Tyvärr finns inga poster under den här kategorin än.' ); ?></p>

    <?php endif; ?>

</div>

<!-- Logga och länk till poddens dropbox -->
<p id="dropbox-link"><a href="https://www.dropbox.com/request/IbigUAXx6Jo8UYqzWFO1?oref=e"><img src="<?php echo get_template_directory_uri() ?>/img/icons/dropbox.png" width="175" height="175" alt="Dropbox logotyp" /></a></p>

<!-- Div med information om att det går att skicka in ljud -->
<div id="records-contact">
    <h2>Skicka in ljud till oss</h2>
    <p>Vi skapar musik av ljud som Ni lyssnare skickar in till oss, lägg ett ljud eller en låt i vår Dropbox så kanske det/den kommer med i podden! </p> 
    <p><a href="https://www.dropbox.com/request/IbigUAXx6Jo8UYqzWFO1?oref=e">Skicka in ljud</a></p>      
</div>

<!-- Information och länk till patreon -->
<div id="records-social">
    <p><a hreF="https://www.patreon.com/beardsoup/memberships"><img src="<?php echo get_template_directory_uri() ?>/img/icons/patreon.png"  width="434" height="102" alt="Orange knapp med Patreons logotyp och texten Become a Patreon" /></a></p>
    <p>Stöd podcasten genom att bli en Patreon, där får du tillgång till exklusivt extramaterial. </p>
</div>

<?php get_footer(); ?>