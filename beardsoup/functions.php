<?php
// Läser in JavaScript och lägger i sidfot
function wpb_adding_scripts() {
wp_register_script('main-javascript', get_template_directory_uri() . '/js/script.js','','1', true);
wp_enqueue_script('main-javascript');
}
add_action( 'wp_enqueue_scripts', 'wpb_adding_scripts' );  

// Tar bort type när javascript laddas via wpb_adding_scripts
add_filter('script_loader_tag', 'clean_script_tag');
  function clean_script_tag($input) {
  $input = str_replace("type='text/javascript' ", '', $input);
  return str_replace("'", '"', $input);
}



// Tar bort kod som läggs in i hook för header från WordPress med emojis
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );



// Registrerar menyer
function register_my_menus() {
    register_nav_menus(
        array(
            'main-nav' => __('Meny i header'),
        ) 
    ); 
}
// Anropar funktion för menyer
add_action( 'init', 'register_my_menus' );



// Möjliggör utvald bild för tema
add_theme_support( 'post-thumbnails' );

// Lägger till bildstorlek för utvald bild
add_image_size( 'single-post-top', 9999, 400 );
add_image_size( 'banner-image', 1200, 266);
add_image_size( 'thumbnail-mini', 50, 50);



// Bestämmer längd för the_excerpt
function wpdocs_custom_excerpt_length( $length ) {
    return 15;
}
// Anropar funktion för att bestämma längd på excerpt
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );



// Tar bort <p> taggar från contact form 7
add_filter('wpcf7_autop_or_not', '__return_false');