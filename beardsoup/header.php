<!DOCTYPE html>
<!-- Läser in vilket språk sida använder -->
<html <?php language_attributes(); ?>>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Visar vald tagline som description -->
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Sidans titel samt hook för sidhuvud -->
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
    <!-- CSS -->
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />
    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Permanent+Marker" rel="stylesheet">
</head>
<body>
    
    <header id="header" class="header-class">
        <!-- Länkar sidtitel till startsida -->
        <a href="<?php echo site_url() ?>"><h1>Beardsoup</h1></a>
        <!-- Huvudmeny -->
        <nav id="nav-id">            
            <?php wp_nav_menu(array('theme_location' => 'main-nav')); ?>       
        </nav>
        <!-- Knapp för menyn -->
        <p id="dropdown-menu">Meny</p>
    </header>