<?php
/*
Template Name: Startsida
*/
get_header(); ?>

    <!-- Div som håller videobakgrund -->
    <div id="background-video">
        <video autoplay muted loop>
            <!-- Laddar video i första hand som mp4, sedan ogg och sist en stillbild som fallback -->
            <source src="<?php echo get_template_directory_uri() ?>/video/background.mp4" type="video/mp4">
            <source src="<?php echo get_template_directory_uri() ?>/video/background.ogg" type="video/ogg">
            <img src="<?php echo get_template_directory_uri() ?>/img/fallback/fallback.jpg" title="Your browser does not support the video tag." width="1200" height="720" alt="En blå bakgrund med Beardsoup-Productions logotyp framför" />
        </video>        
    </div>
    <a href="#index-container" id="index-arrow">&darr;</a>
    
    <!-- Information som skrivs ut på startsidan, bestäms av användarna -->
    <div id="index-container">
        <!-- The loop -->
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <?php the_content(); ?>
        <?php endwhile; else: ?>
        <p>
            <?php _e('Ledsen, inga poster matchade din kriterier.'); ?>
        </p>
        <?php endif; ?>
    </div>

    <!-- Div med de tre senaste nyheterna -->
    <div id="index-latest-news">
        <h3>Senaste nyheter</h3>
        <?php
        /* WP-Query som hämtar alla publicerade poster  */
        $query = new WP_Query(array('post_type'=>'post', 'post_status'=>'publish', 'posts_per_page' => 3));?>

        <!-- The loop som skriver ut kortversion av alla publicerade poster med datum och länk till den fullständiga texten -->
        <?php while ( $query->have_posts() ) : $query->the_post(); ?>
            <div class="index-news-div">

                <!-- Hämtar postens ID och använder det för att läsa ut postens kategori, utifrån kategori visas tillhörande logotyp -->
                <?php
                    $post_id = get_the_ID();
                    $category_object = get_the_category($post_id);
                    $category_name = $category_object[0]->name;

                    if ($category_name == 'Channel'):
                        echo "<img src='" . get_template_directory_uri() ."/img/icons/channel-mini.png' width='50' height='50' alt='Logotyp för Beardsoup-Channel' />";
                    elseif ($category_name == 'Productions'):
                        echo "<img src='" . get_template_directory_uri() ."/img/icons/productions-mini.png' width='50' height='50' alt='Logotyp för Beardsoup-Productions' />";
                    elseif ($category_name == 'Records'):
                        echo "<img src='" . get_template_directory_uri() ."/img/icons/records-mini.png' width='50' height='50' alt='Logotyp för Beardsoup-Records' />";
                    else:
                        echo "<img src='" . get_template_directory_uri() ."/img/icons/beardsoup-mini.png' width='50' height='50' alt='Logotyp för Beardsoup' />";
                    endif;
                ?>
                
                <?php echo "<p>" . get_the_date('Y-m-d') . "</p>"; ?>
                <h4><?php the_title(); ?></h4>
                <?php the_excerpt(); ?>
                <a href="<?php the_permalink(); ?>">Läs mer!</a>
                <?php 
                    // Kollar om posten har en featured image och skriver ut den i så fall.
                    if ( has_post_thumbnail() ) {
                        the_post_thumbnail('thumbnail');
                    } 
                ?>
                
                
            </div>
    
        <?php endwhile; ?>

        <!-- Reset av postdata -->
        <?php wp_reset_postdata(); ?>

    </div>

    <!-- Div med loggor som länkar till de olika produktionerna, använder permalink och get_page_by_path för att länka till sida med motsvarande sidnamn -->
    <div class="index-productions">
            <p><a href="<?php echo get_permalink( get_page_by_path( 'Channel' ) ) ?>"><img src="<?php echo get_template_directory_uri() ?>/img/logo/channel.png" width="450" height="439" alt="Logotyp för Beardsoup-Channel" /></a></p>
            <p><a href="<?php echo get_permalink( get_page_by_path( 'Productions' ) ) ?>"><img src="<?php echo get_template_directory_uri() ?>/img/logo/productions.png" width="450" height="439" alt="Logotyp för Beardsoup-Productions" /></a></p>
            <p><a href="<?php echo get_permalink( get_page_by_path( 'Records' ) ) ?>"><img src="<?php echo get_template_directory_uri() ?>/img/logo/records.png" width="450" height="439" alt="Logotyp för Beardsoup-Records" /></a></p>
    </div>

<?php get_footer(); ?>