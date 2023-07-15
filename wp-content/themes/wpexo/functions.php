<?php 


// Ajouter la prise en charge des images mises en avant
add_theme_support( 'post-thumbnails' );


// Ajouter automatiquement le titre du site dans l'en-tête du site
add_theme_support( 'title-tag' );


function wpexo_register_assets() {
    
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

    if( is_page( 'contact' ) ) {
      
        wp_enqueue_script( 'gmap', "https://maps.googleapis.com/maps/api/js?key=" . WPEXO_GMAP_API_KEY, array(), '1.0', true );
      
        wp_enqueue_script( 'wpexo-map', get_template_directory_uri() . '/assets/js/map.js', array( 'gmap', 'jquery' ), '1.0', true );
    }
}
add_action( 'wp_enqueue_scripts', 'wpexo_register_assets' );

register_nav_menus( array(
	'main' => 'Menu Principal',
	'footer' => 'Bas de page',
) );

// Clé d'API (au début du fichier, important)
define( 'WPEXO_GMAP_API_KEY', 'AIzaSyCKidCouORBAyZIBAo8roF7r4G3yDPiOnM' );

// Clé Google Maps pour le champ ACF (à la suite de votre code existant)
function wpexo_acf_google_map_api( $api ){
	$api['key'] = WPEXO_GMAP_API_KEY;
	return $api;
}
add_filter( 'acf/fields/google_map/api', 'wpexo_acf_google_map_api' );



    