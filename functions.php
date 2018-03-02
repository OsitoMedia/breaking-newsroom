<?php
require_once('inc/media.php');
require_once('inc/pagenavi.php');

require_once(TEMPLATEPATH.'/inc/admin/metaboxes/init.php');
require_once(TEMPLATEPATH.'/inc/admin/metaboxes/config.php');
require_once(TEMPLATEPATH.'/inc/admin/redux-framework/framework.php');
require_once(TEMPLATEPATH.'/inc/admin/redux-framework/config/tl-config.php');
require_once('inc/admin/cs-framework.php');

/**
 * Functions and Hooks
 */
require_once('inc/template-functions.php');
require_once('inc/template-hooks.php');

/**
 * Función que desactiva el tamaño de imágenes no empleado en las entradas
 * @param $Sizes
 * @return mixed
 */
function disableImageSizes($Sizes) {
    unset($Sizes['thumbnail']);
    unset($Sizes['medium']);
    return $Sizes;
}

// Theme setup
function nacionelectrica_setup() {
    add_theme_support('post-thumbnails');

    add_image_size( 'loop-thumb', 500, 330, true );
        
    add_theme_support('menus');
    register_nav_menus(array(
        'main' => 'Menu principal',
        'second' => 'Menu utilitario',
        'footer' => 'Menu del footer',
    ));
}
add_action('after_setup_theme', 'nacionelectrica_setup');

/**
 * Devuelve la primer categoria de un articulo con link
 * @return string
 */
function get_first_category_link()
{
    $categories = get_the_category();
    if (!empty($categories)) {
        echo '<a href="' . esc_url(get_category_link($categories[0]->term_id)) . '">' . esc_html($categories[0]->name) . '</a>';
    }
}

function get_first_category()
{
    $categories = get_the_category();
    if (!empty($categories)) {
        echo esc_html($categories[0]->name);
    }
}

//Add class to pagination
add_filter('next_posts_link_attributes', 'posts_link_attributes_1');
add_filter('previous_posts_link_attributes', 'posts_link_attributes_2');

function posts_link_attributes_1() {
    return 'class="next-post"';
}
function posts_link_attributes_2() {
    return 'class="prev-post"';
}

// Post views
function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
    }
    return $count.' ';
}
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

//Custom excerpt lenght
    function excerpt($limit) {
      $excerpt = explode(' ', get_the_excerpt(), $limit);
      if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'...';
      } else {
        $excerpt = implode(" ",$excerpt);
      } 
      $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
      return $excerpt;
    }

    function content($limit) {
      $content = explode(' ', get_the_content(), $limit);
      if (count($content)>=$limit) {
        array_pop($content);
        $content = implode(" ",$content).'...';
      } else {
        $content = implode(" ",$content);
      } 
      $content = preg_replace('/\[.+\]/','', $content);
      $content = apply_filters('the_content', $content); 
      $content = str_replace(']]>', ']]&gt;', $content);
      return $content;
    }

//function theme_sidebars() {
    //register_sidebar( array(
        //'name' => 'Single Sidebar',
        //'id' => 'single-sidebar',
        //'before_widget' => '<div id="%1$s" class="widget %2$s">',
        //'after_widget'  => '</div>',
        //'before_title'  => '<span class="section-title"><span>',
        //'after_title'   => '</span></span>',
    //) );
//}
//add_action( 'widgets_init', 'theme_sidebars' );

//Exclude pages from search
function SearchFilter($query) {
  if ($query->is_search) {
    $query->set('post_type', 'post');
  }
  return $query;
}

add_filter('pre_get_posts','SearchFilter');

//Insert ads after second paragraph of single post content.

add_filter( 'the_content', 'prefix_insert_post_ads' );

function prefix_insert_post_ads( $content ) {
    global $nacionelectrica;
    $adoption = $nacionelectrica['single_post_ad'];
    $ad_code = '<div id="ad-space">'.$adoption.'</div>';
    $adoption_two = $nacionelectrica['mobile_single_post_ad'];
    $ad_code_two = '<div id="ad-space">'.$adoption_two.'</div>';
    $adoption_three = $nacionelectrica['parralax_ad_mobile'];
    $ad_code_three = '<div class="parallax-ad"><div class="jarallax" data-jarallax-element="-300">'.$adoption_three.'</div></div>';
    $adoption_four = $nacionelectrica['parralax_ad'];
    $ad_code_four = '<div class="parallax-ad"><div class="jarallax" data-jarallax-element="-450">'.$adoption_four.'</div></div>';
    
    if(wp_is_mobile()) {
        if ($nacionelectrica['parralax_ad_mobile']) {
            if ( is_single() && ! is_admin() ) {
                return prefix_insert_after_paragraph( $ad_code_three, 2, $content );
            }
        } elseif ($nacionelectrica['mobile_single_post_ad']) {
            if ( is_single() && ! is_admin() ) {
                return prefix_insert_after_paragraph( $ad_code_two, 1, $content );
            }
        }
    } else {
        if ($nacionelectrica['parralax_ad']) {
            if ( is_single() && ! is_admin() ) {
                return prefix_insert_after_paragraph( $ad_code_four, 2, $content );
            }
        } elseif ($nacionelectrica['single_post_ad']) {
            if ( is_single() && ! is_admin() ) {
                return prefix_insert_after_paragraph( $ad_code, 1, $content );
            }
        }
    }
    return $content;
}
 
// Parent Function that makes the magic happen
function prefix_insert_after_paragraph( $insertion, $paragraph_id, $content ) {
    $closing_p = '</p>';
    $paragraphs = explode( $closing_p, $content );
    foreach ($paragraphs as $index => $paragraph) {
        if ( trim( $paragraph ) ) {
            $paragraphs[$index] .= $closing_p;
        }
        if ( $paragraph_id == $index + 1 ) {
            $paragraphs[$index] .= $insertion;
        }
    }
    return implode( '', $paragraphs );
}

function custom_class_to_wordpress_iframe_video( $html ) {
 
if( preg_match('/(youtube.com)/', $html) ){ // if youtube video
return str_replace('<iframe', '<iframe class="video-iframe"', $html); // add my custom class "my-youtube-video"
}
 
elseif( preg_match('/(vimeo.com)/', $html) ){ // if vimeo video
return str_replace('<iframe', '<iframe class="video-iframe"', $html); // add my custom class "my-vimeo-video"
}
 
else{
return $html;
}
 
}
add_filter('embed_oembed_html', 'custom_class_to_wordpress_iframe_video', 99, 4);

function pu_remove_script_version( $src ){
    return remove_query_arg( 'ver', $src );
}

add_filter( 'script_loader_src', 'pu_remove_script_version' );
add_filter( 'style_loader_src', 'pu_remove_script_version' );

/* Add Next Page Button in First Row */
add_filter( 'mce_buttons', 'my_add_next_page_button', 1, 2 ); // 1st row
 
/**
 * Add Next Page/Page Break Button
 * in WordPress Visual Editor
 * 
 * @link https://shellcreeper.com/?p=889
 */
function my_add_next_page_button( $buttons, $id ){
 
    /* only add this for content editor */
    if ( 'content' != $id )
        return $buttons;
 
    /* add next page after more tag button */
    array_splice( $buttons, 13, 0, 'wp_page' );
 
    return $buttons;
}

add_filter('pre_get_posts', 'limit_archive_posts');
function limit_archive_posts($query){
    if ($query->is_archive) {
        $query->set('posts_per_page', 12);
    }
    return $query;
}

if (isset($_GET['activated']) && is_admin()){
        $new_page_title = 'Directorio';
        $new_page_content = '';
        $new_page_template = 'directory.php';
        $page_check = get_page_by_title($new_page_title);
        $new_page = array(
                'post_type' => 'page',
                'post_title' => $new_page_title,
                'post_content' => $new_page_content,
                'post_status' => 'publish',
                'post_author' => 1,
        );
        if(!isset($page_check->ID)){
                $new_page_id = wp_insert_post($new_page);
                if(!empty($new_page_template)){
                        update_post_meta($new_page_id, '_wp_page_template', $new_page_template);
                }
        }
};

// Allow SVG
add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {

  global $wp_version;
  if ( $wp_version !== '4.7.1' ) {
     return $data;
  }

  $filetype = wp_check_filetype( $filename, $mimes );

  return [
      'ext'             => $filetype['ext'],
      'type'            => $filetype['type'],
      'proper_filename' => $data['proper_filename']
  ];

}, 10, 4 );

function cc_mime_types( $mimes ){
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );

function fix_svg() {
  echo '<style type="text/css">
        .attachment-266x266, .thumbnail img {
             width: 100% !important;
             height: auto !important;
        }
        </style>';
}
add_action( 'admin_head', 'fix_svg' );