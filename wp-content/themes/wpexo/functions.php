<?php


// Ajouter la prise en charge des images mises en avant
add_theme_support('post-thumbnails');


// Ajouter automatiquement le titre du site dans l'en-tête du site
add_theme_support('title-tag');


function wpexo_register_assets()
{

    /*    // Déclarer jQuery
    wp_enqueue_script('jquery' );
    
    // Déclarer le JS
	wp_enqueue_script( 
        'wpexo', 
        get_template_directory_uri() . '/js/script.js', 
        array( 'jquery' ), 
        '1.0', 
        true
    );
   */
    // Déclarer le fichier CSS à un autre emplacement
    wp_enqueue_style(
        'wpexo',
        get_template_directory_uri() . '/assets/css/main.css',
        array(),
        '1.0'
    );

    if (is_page('contact')) {

        wp_enqueue_script('gmap', "https://maps.googleapis.com/maps/api/js?key=" . WPEXO_GMAP_API_KEY, array(), '1.0', true);

        wp_enqueue_script('wpexo-map', get_template_directory_uri() . '/assets/js/map.js', array('gmap', 'jquery'), '1.0', true);
    }
}
add_action('wp_enqueue_scripts', 'wpexo_register_assets');

register_nav_menus(array(
    'main' => 'Menu Principal',
    'footer' => 'Bas de page',
));

// Clé d'API (au début du fichier, important)
define('WPEXO_GMAP_API_KEY', 'AIzaSyCKidCouORBAyZIBAo8roF7r4G3yDPiOnM');

// Clé Google Maps pour le champ ACF (à la suite de votre code existant)
function wpexo_acf_google_map_api($api)
{
    $api['key'] = WPEXO_GMAP_API_KEY;
    return $api;
}
add_filter('acf/fields/google_map/api', 'wpexo_acf_google_map_api');

/***************API CUSTOMIZE********** */

add_action('customize_register', 'my_customize_register');
function my_customize_register($wp_customize)
{

    /*********BG COLOR *************/

    $wp_customize->add_setting('rw_bg', array(
        'type' => 'theme_mod',
        'sanitize_callback' => 'sanitize_hex_color',
        'default' => '#fafafa',
        'transport' => 'refresh'
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'rw_bg', array(
        'section' => 'colors', // Required, core or custom.
        'label' => __('Background color'),
        'description' => __('Edit color.'),
    )));

    /*********MAIN IMAGE*************/

    $wp_customize->add_setting('rw_main_image', array(
        'type' => 'theme_mod',
        'default' => 21,
        'transport' => ''
    ));

    $wp_customize->add_section('rw_main_image_section', array(
        'title' => __('Main image'),
        'priority' => 105, // Before Widgets.
    ));

    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'rw_main_image', array(
        'label' => __('Main image'),
        'section' => 'rw_main_image_section',
        'mime_type' => 'image',
        'active_callback' => 'rw_is_single',
    )));

    function rw_main_image_sel(WP_Customize_Manager $wp_customize)
    {
        $wp_customize->selective_refresh->add_partial('rw_main_image', array(
            'selector' => '.post__image',
            'container_inclusive' => true,
        ));
    }

    /*********TITLE COLOR*************/

    $wp_customize->add_setting('rw_title_color', array(
        'type' => 'theme_mod',
        'default' => '#000000',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_section('rw_title_color_section', array(
        'title' => __('Title'),
        'priority' => 105, // Before Widgets.
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'rw_title_color', array(
        'label' => __('Title color'),
        'section' => 'rw_title_color_section',
        'active_callback' => 'rw_is_single',
    )));


    $wp_customize->selective_refresh->add_partial('rw_title_color', array(
        'selector' => '.post__title',
        'render_callback' => 'rw_title_color_callback'
    ));

    function rw_title_color_callback()
    {
        $title_color = get_theme_mod('rw_title_color');
        if ($title_color != '' && $title_color != '#000000') {
           echo '<h1 class="post__title" style="color:'. $title_color .'">Provident quia assumenda voluptas</h1>';
        }
    }


    /*********MULTIPLE*************/

    function rw_is_single()
    {
        return is_single();
    }
}

function rw_custom_css_output()
{
    $postId = get_the_ID();
    $imageId = get_theme_mod('rw_main_image', '');
    echo '<style type="text/css" id="rw-online-css"> body{background:' .
        get_theme_mod('rw_bg', '') . '} .postid-' . $postId . ' .post__img{background-image: url(' . wp_get_attachment_image_url($imageId) . ') !important;} .post__title{color:' . get_theme_mod('rw_title_color', '') . '
    </style>';
}
add_action('wp_head', 'rw_custom_css_output');


function my_preview_js()
{
    wp_enqueue_script('custom_css_preview', 'assets/js/customizer.js', array('customize-preview', 'jquery'));
}
add_action('customize_preview_init', 'my_preview_js');
