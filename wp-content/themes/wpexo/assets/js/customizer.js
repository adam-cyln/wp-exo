( function( $ ) {
    wp.customize( 'setting_id', function( value ) {
      value.bind( function( to ) {
        $( '#custom-theme-css' ).html( to );
      } );
    } );
    wp.customize( 'custom_plugin_css', function( value ) {
      value.bind( function( to ) {
        $( '#custom-plugin-css' ).html( to );
      } );
    } );
  } )( jQuery );
  