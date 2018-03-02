<?php

if ( ! defined( 'ABSPATH' ) ) exit;

add_action('wp_enqueue_scripts', 'theme_scripts');
add_action('wp_enqueue_scripts', 'theme_css');