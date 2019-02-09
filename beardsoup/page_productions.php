<?php
/*
Template Name: Beardsoup Productions
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

<!-- Information om Beardsoup-Productions -->
<div id="produktioner-info">
    <p>Ibland blir vi anlitade att producera mediaproduktioner till någon eller något.</p>
    <p>Det tycker vi är kul! Här har vi samlat några av våra uppdrag.</p>
</div>

<!-- Div som listar de poster som skrivs med kategorin beardsoup-productions -->
<div class="list-posts">
    <h2>Lista med poster</h2>

    <?php
        // Skapar array med argument för att ladda poster med kategorin beardsoup-productions
        $args = array( 'category_name' => 'beardsoup-productions' );

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

<!-- Div med information om hur man kommer i kontakt med företagate -->
<div id="produktioner-contact">
    <h2>Kontakta oss</h2>
    <p><a href="<?php echo get_permalink( get_page_by_path( 'Kontakt' ) ) ?>">Kontakta oss</a> om du vill att vi ska producera en medieproduktion för dig <br /> så hör vi av oss, spånar idéer och kommer med offert.</p>
</div>

<!-- Länk till tjänstersida som visar vad företaget kan erbjuda -->
<div id="produktioner-social">
    <p>Mer info om vad vi kan göra för dig hittar du under <a href="<?php echo get_permalink( get_page_by_path( 'Tjanster' ) ) ?>">TJÄNSTER</a>.</p>
</div>

<?php get_footer(); ?>