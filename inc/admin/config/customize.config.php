<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// CUSTOMIZE SETTINGS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$options              = array();

// -----------------------------------------
// Customize Core Fields                   -
// -----------------------------------------
$options[]            = array(
  'name'              => 'wp_theme_customizer',
  'title'             => 'Apariencia del tema',
  'settings'          => array(
      
    // color
    array(
      'name'      => 'main_color',
      'default'   => '#27B400',
      'control'   => array(
        'type'    => 'cs_field',
        'options' => array(
          'type'  => 'color_picker',
          'title' => 'Color principal',
        ),
      ),
    ),


  )
);

CSFramework_Customize::instance( $options );
