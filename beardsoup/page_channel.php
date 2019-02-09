<?php
/*
Template Name: Beardsoup Channel
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

<!-- Beskrivning av Beardsoup-Channel -->
<div id="channel-info">
    <p>Vi har en YouTube-kanal där vi lägger upp våra egna produktioner.</p>
    <p>Ibland gör vi musik av saker vi hittar, andra gånger blir det mer rendodlade musikvideos.</p>
    <p>Klicka på en spellista, njuta dig tillbaka och lut!</p>
</div>

<!-- Div som listar de poster som skrivs med kategorin beardsoup-channel -->
<div class="list-posts">
    <h2>Lista med poster</h2>

    <?php
        // Skapar array med argument för att ladda poster med kategorin beardsoup-channel
        $args = array( 'category_name' => 'beardsoup-channel' );

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

<!-- Div med knapp för att prenumerera på youtubekanal -->
<div id="channel-subscribe">
    <p><a href="https://www.youtube.com/channel/UCkuCl25XH_atr0c32UfpjAQ"><img src="<?php echo get_template_directory_uri() ?>/img/icons/youtube-subscribe.png" width="411" height="84" alt="En röd knapp med Youtubes logotyp och texten Prenumerera" /></a></p>
    <p>Håll dig uppdaterad och missa aldrig en video från oss!</p>
</div>

<!-- Div med information om sociala medier -->
<div id="channel-social">
    <p>Vi lägger även upp videos på <span class="facebook-span"><a href="https://www.facebook.com/beardsoup/">Facebook</a></span> och <a href="https://www.instagram.com/beardsouprecords/">Instagram</a>.</p>
    <p>Följ oss för mer videos och annat småplock!</p>
</div>

<?php get_footer(); ?>