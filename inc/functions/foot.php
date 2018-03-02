<?php

if (!defined('ABSPATH')) exit;

if (!function_exists('theme_header_scripts')) {

    function theme_header_scripts()
    { global $nacionelectrica;
     $theme_path = get_template_directory_uri();
     if($nacionelectrica['favicon']['url']!=''){ echo"<link rel=\"shortcut icon\" type=\"image/x-icon\" href=\"".$nacionelectrica['favicon']['url']."\">"."\n"; }
    }
}

if (!function_exists('theme_footer_scripts')) {

    function theme_footer_scripts()
    {
        global $nacionelectrica;
        if($nacionelectrica['footer_code']){echo stripslashes($nacionelectrica['footer_code'])."\r";}
        echo "<script type='text/javascript'>
        WebFontConfig = {
        google: { families: [ 'Source+Sans+Pro:600', 'Roboto:400,500,700' ] }
        };
        (function() {
        var wf = document.createElement('script');
        wf.src = 'https://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
        wf.type = 'text/javascript';
        wf.async = 'true';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(wf, s);
        })(); </script>";

    }
}