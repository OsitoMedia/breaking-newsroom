<?php

if ( ! defined( 'ABSPATH' ) ) exit;



if ( ! function_exists( 'theme_scripts' ) ) {

    function theme_scripts()
    {
        global $is_IE;
        $theme_path = get_template_directory_uri();

        wp_enqueue_script('jquery');

        wp_register_script('font-awesome', '//use.fontawesome.com/69cb7eec58.js', array('jquery'), false);
        wp_enqueue_script('font-awesome');
        
        wp_register_script('vendor', $theme_path . '/vendor/dist/vendor.min.js', array('jquery'), false);
        wp_enqueue_script('vendor');
        
        if(is_front_page()) {
            wp_register_script('tabs', $theme_path . '/vendor/dist/tabs.min.js', array('jquery'), false);
            wp_enqueue_script('tabs');
        }

        if ($is_IE) {
            wp_register_script('html5shiv', "//html5shiv.googlecode.com/svn/trunk/html5.js", false);
            wp_enqueue_script('html5shiv');
        }
    }
}


if ( ! function_exists( 'theme_css' ) ) {
    function theme_css()
    {
        global $redux_demo;
        $theme_path = get_template_directory_uri();
        wp_deregister_style('font-awesome');
        wp_register_style('css', $theme_path . '/style.css', false);
        wp_enqueue_style('css');
        if (cs_get_customize_option('main_color')) {
            wp_enqueue_style( 'custom-style', $theme_path . '/src/css/custom.css' );
        };
        if (cs_get_customize_option('main_color')!='#27b400') {
            $color = cs_get_customize_option( 'main_color' );
            $custom_css = "
                a:hover,
                #header .social a.search span.search-hidden button,
                #media-player .playlist li:hover span.play i,
                #content.single span.category a,
                .article-single .the-content p a { color: {$color}; }
                .section-title span,
                .section-title h1,
                #header .logo,
                #header .social a.search.show,
                #media-player .section-title,
                #subscribe form input[type='submit'] { background-color: {$color}; }
                #header .social a.search span.search-hidden input,
                #media-player { border-color: {$color}; }
                #featured-posts,
                .article .textpart span.category,
                body.home:before { border-bottom-color: {$color}; }
                @media only screen and (max-width: 990px) { #header { background-color: {$color}; } }
            ";
            wp_add_inline_style( 'custom-style', $custom_css );
        };
    }
}