    <?php if(is_single() && !wp_is_mobile() && 'post' == get_post_type()) { ?>
        <div id="single-header">
            <span class="title"><strong>Estas leyendo:</strong> <?php the_title(); ?></span>
            <div class="share">
                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank" onclick="window.open(this.href, 'windowName', 'width=1000, height=700, left=24, top=24, scrollbars, resizable'); return false;" class="facebook"><i class="fa fa-facebook-official"></i></a>
                <a href="https://twitter.com/home?status=<?php echo str_replace('#','No. ', get_the_title())."... - "; the_permalink(); ?>" target="_blank" onclick="window.open(this.href, 'windowName', 'width=1000, height=700, left=24, top=24, scrollbars, resizable'); return false;" class="twitter"><i class="fa fa-twitter"></i></a>
            </div>
            <ul class="related">
                <div class="container">
                   <?php $paged = get_query_var('paged') ? get_query_var('paged') : 1; 
                        $wp_query = new WP_Query(array('post_type' => 'post','paged' => $paged,'posts_per_page' => 3,'orderby' => 'rand'));
                        while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
                        <li>
                            <a href="<?php the_permalink(); ?>">
                                <div class="thumb" style="background-image:url('<?php the_post_thumbnail_url('loop-thumb'); ?>');"></div>
                                <div class="textpart">
                                    <?php the_title(); ?>
                                </div>
                            </a>
                        </li>
                    <?php endwhile; wp_reset_query(); ?>
                </div>
            </ul>
        </div>
    <?php } ?>