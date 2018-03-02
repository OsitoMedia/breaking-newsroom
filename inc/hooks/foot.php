<?php

if (!defined('ABSPATH')) exit;

add_action('wp_head', 'theme_header_scripts');
add_action('wp_footer', 'theme_footer_scripts', '100');