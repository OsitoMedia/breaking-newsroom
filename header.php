<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    
    <aside id="aside">
        <ul>
           <li><a href="<?php bloginfo('wpurl'); ?>">Inicio</a></li>
            <?php wp_nav_menu( array('theme_location'  => 'main', 'menu' => 'main', 'container' => '', 'container_class' => '', 'items_wrap' => '%3$s')); ?>
            <?php if (has_nav_menu('second')) { wp_nav_menu( array('theme_location'  => 'second', 'menu' => 'second', 'container' => '', 'container_class' => '', 'items_wrap' => '%3$s')); } ?>
        </ul>
    </aside>
    
    <?php if(is_single() && !wp_is_mobile()) { ?>
       <div class="header-ad">
           <div id="ad-space">
               <?php global $nacionelectrica; echo $nacionelectrica['single_header_ad']; ?>
           </div>
       </div>
    <?php } ?>
    
    <header id="header">
        <div class="container">
            <button class="navicon" data-toggle="body"><i class="fa fa-navicon"></i></button>
            <div class="logo">
                <a href="<?php bloginfo('wpurl'); ?>">
                    <img src="<?php global $nacionelectrica; echo $nacionelectrica['logo']['url']; ?>">
                    <?php if(is_front_page()) { ?><h1 class="site-title"><?php bloginfo('name'); ?></h1><?php } ?>
                </a>
            </div>
            <nav class="menu">
                <ul>
                    <?php wp_nav_menu( array('theme_location'  => 'main', 'menu' => 'main', 'container' => '', 'container_class' => '', 'items_wrap' => '%3$s')); ?>
                </ul>
            </nav>
            <div class="social">
                <?php global $nacionelectrica; if($nacionelectrica['facebook']) { ?>
                    <a target="_blank" rel="nofollow" href="<?php echo $nacionelectrica['facebook']; ?>" class="social facebook"><i class="fa fa-facebook"></i></a>
                <?php }; global $nacionelectrica; if($nacionelectrica['twitter']) { ?>
                    <a target="_blank" rel="nofollow" href="<?php echo $nacionelectrica['twitter']; ?>" class="social twitter"><i class="fa fa-twitter"></i></a>
                <?php }; global $nacionelectrica; if($nacionelectrica['google-plus']) { ?>
                    <a target="_blank" rel="nofollow" href="<?php echo $nacionelectrica['google-plus']; ?>" class="social google-plus"><i class="fa fa-google-plus"></i></a>
                <?php }; global $nacionelectrica; if($nacionelectrica['instagram']) { ?>
                    <a target="_blank" rel="nofollow" href="<?php echo $nacionelectrica['instagram']; ?>" class="social instagram"><i class="fa fa-instagram"></i></a>
                <?php }; global $nacionelectrica; if($nacionelectrica['youtube']) { ?>
                    <a target="_blank" rel="nofollow" href="<?php echo $nacionelectrica['youtube']; ?>" class="social youtube"><i class="fa fa-youtube-play"></i></a>
                <?php } ?>
                <a class="social search">
                    <i class="fa fa-search" data-toggle="#header .search, #header .search-hidden, #search-mask"></i>
                    <span class="search-hidden">
                        <form method="get" class="search-bar" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <input type="text" placeholder="Buscar artículos" name="s" id="search" class="text" />
                            <button type="submit" class="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </span>
                </a>
                <?php if(has_nav_menu('second')) { ?>
                    <div class="dropdown">
                        <a class="social">
                            <i class="fa fa-ellipsis-h"></i>
                        </a>
                        <ul class="sub-menu">
                            <?php wp_nav_menu( array('theme_location'  => 'second', 'menu' => 'second', 'container' => '', 'container_class' => '', 'items_wrap' => '%3$s')); ?>
                        </ul>
                    </div>
                <?php } ?>
            </div>
        </div>
    </header>
    
    <?php get_template_part('featured'); ?>

    <main id="main" class="container wrap">
    