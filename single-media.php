<?php get_header();
setPostViews(get_the_ID()); ?>        

    <section id="content" class="single">
        <?php while ( have_posts() ) : the_post(); ?>
            <header>
                <h1 class="entry-title" itemprop="headline"><?php the_title(); ?></h1>
            </header>
            <figure class="featured-thumb" itemprop="image">
                <?php $oembed_video_url = get_post_meta( $post->ID, 'video_url', true ); echo wp_oembed_get( $oembed_video_url ); ?> 
            </figure>
            <aside id="sidebar" class="left-col">
                <div id="ad-space">
                    <?php if(wp_is_mobile()) { ?>
                        <?php global $nacionelectrica; echo $nacionelectrica['mobile_single_sidebar_ad']; ?>
                    <?php } else { ?>
                        <?php global $nacionelectrica; echo $nacionelectrica['single_sidebar_ad']; ?>
                    <?php } ?>
                </div>
                <div class="widget">
                    <span class="section-title">Categoria</span>
                    <?php echo get_first_category_link(); ?>
                </div>
                <div class="widget">
                    <span class="section-title">Publicado el</span>
                    <?php echo get_the_date(); ?>
                </div>
                <div class="widget widget-share">
                    <span class="section-title">Compartir</span>
                    <div class="share">
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank" onclick="window.open(this.href, 'windowName', 'width=1000, height=700, left=24, top=24, scrollbars, resizable'); return false;" class="facebook">
                            <i class="fa fa-facebook-official"></i>
                        </a>
                        <a href="https://twitter.com/home?status=<?php echo str_replace('#','No. ', get_the_title())."... - "; the_permalink(); ?>" target="_blank" onclick="window.open(this.href, 'windowName', 'width=1000, height=700, left=24, top=24, scrollbars, resizable'); return false;" class="twitter">
                            <i class="fa fa-twitter"></i>
                        </a>
                        <a href="whatsapp://send?text=<?php the_title(); ?> – <?php urlencode(the_permalink()); ?>" data-action="share/whatsapp/share" class="whatsapp">
                            <i class="fa fa-whatsapp"></i>
                        </a>
                    </div>
                </div>
            </aside>
            <div class="main-col single">
                <article id="post-<?php the_ID(); ?>" <?php post_class('article-single'); ?> itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
                    <div class="the-content" itemprop="text">
                        <?php the_content(); ?>
                        <?php $args = array (
                            'before'            => '<div class="pagination">',
                            'after'             => '</div>',
                            'link_before'       => '<span class="page-link">',
                            'link_after'        => '</span>',
                            'next_or_number'    => 'next',
                            'nextpagelink'      => 'Siguiente <i class="fa fa-chevron-right"></i>',
                            'previouspagelink'  => '<i class="fa fa-chevron-left"></i> Anterior',
                            );

                        wp_link_pages( $args ); ?>
                    </div>
                    <div id="ad-space">
                        <?php if(wp_is_mobile()) { ?>
                            <?php global $nacionelectrica; echo $nacionelectrica['mobile_single_under_post_ad']; ?>
                        <?php } else { ?>
                            <?php global $nacionelectrica; echo $nacionelectrica['single_under_post_ad']; ?>
                        <?php } ?>
                    </div>
                    <div class="share">
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank" onclick="window.open(this.href, 'windowName', 'width=1000, height=700, left=24, top=24, scrollbars, resizable'); return false;" class="facebook">
                            <i class="fa fa-facebook-official"></i> <span>Compartir</span>
                        </a>
                        <a href="https://twitter.com/home?status=<?php echo str_replace('#','No. ', get_the_title())."... - "; the_permalink(); ?>" target="_blank" onclick="window.open(this.href, 'windowName', 'width=1000, height=700, left=24, top=24, scrollbars, resizable'); return false;" class="twitter">
                            <i class="fa fa-twitter"></i> <span>Twittear</span>
                        </a>
                        <a href="whatsapp://send?text=<?php the_title(); ?> – <?php urlencode(the_permalink()); ?>" data-action="share/whatsapp/share" class="whatsapp">
                            <i class="fa fa-whatsapp"></i> <span>Enviar</span>
                        </a>
                    </div>
                </article>
                <div class="comments">
                    <span class="section-title">Discusión</span>
                    <div class="fb-comments" data-href="<?php the_permalink(); ?>" data-width="100%" data-numposts="2"></div>
                </div>
            </div>
        <?php endwhile; wp_reset_query(); ?>
    </section>
    
    <section id="related">
        <div class="related-articles">
            <span class="section-title"><span>Otros artículos de interes</span></span>
            <?php $paged = get_query_var('paged') ? get_query_var('paged') : 1; $wp_query = new WP_Query(array('post_type' => 'post','paged' => $paged,'posts_per_page' => 9,'orderby' => 'rand')); get_template_part('content/loop','temp'); wp_reset_query(); ?>
        </div>
    </section>
    
<?php get_footer(); ?>