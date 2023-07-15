<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <?php wp_head(); ?>
</head>


<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <header class="header">
        <div class="header__left">
            <a href="<?php echo home_url('/'); ?>">
                WordPress exo
            </a>
        </div>
        <div class="header__right">
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'main',
                    'container' => 'ul', // afin d'éviter d'avoir une div autour 
                    'menu_class' => 'header__menu', // ma classe personnalisée 
                )
            );
            ?> 
        </div>

    </header>