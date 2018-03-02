<?php get_header(); ?>
    
    <section id="content">
        <span class="section-title">
            <span>
                <h1>Estas buscando: <?php echo get_search_query(); ?></h1>
            </span>
        </span>
       <div class="row">
            <?php if ( have_posts() ) : ?>
                <div id="infinite">
                    <?php $paged = get_query_var('paged') ? get_query_var('paged') : 1;
                    get_template_part('content/loop'); ?>
                </div>
                <?php if(function_exists('pagenavi')) { pagenavi(); }; wp_reset_query(); ?>
            <?php else :
                get_template_part('content/404');
                echo '<span class="section-title"><span>Quiza te puedan interesar</span></span>'; ?>
                <div id="infinite">
                    <?php $wp_query = new WP_Query(array('post_type' => 'post','paged' => $paged,'posts_per_page' => 6,'orderby'=>'rand'));
                    get_template_part('content/loop'); wp_reset_query(); ?>
                </div>
            <?php endif; ?>
       </div>
    </section>

<?php get_footer(); ?>