<?php get_header(); ?>
    
    <section id="content">
       <div class="row">
            <div id="infinite">
                <?php global $wp_query; $loopcounter=0; while ($wp_query->have_posts()) : $wp_query->the_post(); $loopcounter++ ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('article'); ?>>
                        <figure class="thumb" style="background-image:url('<?php the_post_thumbnail_url('loop-thumb'); ?>');">
                            <?php if ('media' == get_post_type()) { ?><span class="play"><i class="fa fa-play"></i></span><?php } ?>
                            <span class="post-count"><?php echo $loopcounter; ?></span>
                        </figure>
                        <figcaption class="textpart">
                            <?php if ('post' == get_post_type()) { ?><span class="category"><?php echo get_first_category(); ?></span><?php } ?>
                            <h2><?php the_title(); ?></h2>
                            <?php if ('post' == get_post_type()) { ?><p><?php echo excerpt(25); ?></p><?php } ?>
                        </figcaption>
                        <?php if(get_post_meta($post->ID,'is_sponsored',true)) { ?>
                            <div class="sponsored-meta">
                                <?php $get_sponsor_url = get_post_meta($post->ID,'sponsor_url',true); 
                                if($get_sponsor_url) { echo '<a href="'.$get_sponsor_url.'" rel="nofollow">'; } ?>
                                    <span class="label">Patrocina</span>
                                    <img src="<?php echo get_post_meta($post->ID,'sponsor_logo',true); ?>">
                                <?php if($get_sponsor_url) { echo '</a>'; } ?>
                            </div>
                        <?php } ?>
                        <a href="<?php the_permalink(); ?>" class="permalink"></a>
                    </article>
                    <?php if($loopcounter==4) { echo '<span class="spacer"></span>'; } ?>

                    <?php global $nacionelectrica; if(wp_is_mobile()) { ?>
                        <?php if($loopcounter==2 && $nacionelectrica['parralax_ad_mobile']) { ?>
                            <div class="parallax-ad">
                                <div class="jarallax" data-jarallax-element="-300">
                                    <?php echo $nacionelectrica['parralax_ad_mobile']; ?>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } else { ?>
                        <?php if($loopcounter==6 && $nacionelectrica['parralax_ad']) { ?>
                            <div class="parallax-ad home">
                                <div class="jarallax" data-jarallax-element="-320">
                                    <?php echo $nacionelectrica['parralax_ad']; ?>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } ?>

                <?php endwhile; ?>
            </div>
            <div class="load-more">
                <button class="view-more-button">Cargar más noticias <i class="fa fa-arrow-down"></i></button>
                <div class="page-load-status">
                    <div class="infinite-scroll-request align-center">
                        <span class="loading-spinner"><i class="fa fa-refresh"></i></span>
                    </div>
                </div>
            </div>
            <?php if(function_exists('pagenavi')) { 
                pagenavi();
            } wp_reset_query(); ?>
       </div>
    </section>
    
    <div id="ad-space">
        <?php if(wp_is_mobile()) { ?>
            <?php global $nacionelectrica; echo $nacionelectrica['mobile_home_loop_ad']; ?>
        <?php } else { ?>
            <?php global $nacionelectrica; echo $nacionelectrica['home_loop_ad']; ?>
        <?php } ?>
    </div>

<?php get_footer(); ?>