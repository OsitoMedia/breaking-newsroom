<?php get_header(); ?>

    <section id="content" class="main-col archive">
        <span class="section-title">
            <h1>Error 404</h1>
        </span>
            <?php get_template_part('content/404');
                    echo '<span class="section-title"><span>Quiza te puedan interesar</span></span>';
                    $paged = get_query_var('paged') ? get_query_var('paged') : 1; 
                    $wp_query = new WP_Query(array('post_type' => 'post','paged' => $paged,'posts_per_page' => 9,'orderby'=>'rand'));
                    get_template_part('content/loop');
                ?>

    </section>

    <?php if(!wp_is_mobile()) { ?>
        <aside id="sidebar" class="right-col">
            <?php if ( is_active_sidebar( 'home-sidebar-right' ) ) : dynamic_sidebar( 'home-sidebar-right' ); endif; ?>
        </aside>
    <?php } ?>

<?php get_footer(); ?>