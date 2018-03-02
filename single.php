<?php get_header();
setPostViews(get_the_ID()); ?>        

    <section id="content" class="single">
        <?php while ( have_posts() ) : the_post(); ?>
            <header>
                <h1 class="entry-title"><?php the_title(); ?></h1>
            </header>
            <figure class="featured-thumb">
                <?php if (has_post_thumbnail()) : the_post_thumbnail(); endif; ?> 
            </figure>
            <aside id="sidebar" class="left-col">
                <?php if(!wp_is_mobile() && get_post_meta($post->ID,'is_sponsored',true)) { ?>
                    <div class="widget sponsored top">
                        <div class="sponsored-ad">
                            <?php echo get_post_meta($post->ID,'sponsor_ad',true); ?>
                        </div>
                    </div>
                <?php } ?>
                <?php global $nacionelectrica; if($nacionelectrica['single_sidebar_ad'] || $nacionelectrica['mobile_single_sidebar_ad']) { ?>
                    <div id="ad-space">
                        <?php if(wp_is_mobile()) { ?>
                            <?php global $nacionelectrica; echo $nacionelectrica['mobile_single_sidebar_ad']; ?>
                        <?php } else { ?>
                            <?php global $nacionelectrica; echo $nacionelectrica['single_sidebar_ad']; ?>
                        <?php } ?>
                    </div>
                <?php } ?>
                <?php global $nacionelectrica;
                if(!wp_is_mobile() && $nacionelectrica['parralax_ad_author']) { ?>
                    <div class="widget">
                        <?php global $nacionelectrica; echo $nacionelectrica['parralax_ad_author']; ?>
                    </div>
                <?php } ?>
                <div class="widget">
                    <span class="section-title">Autor</span>
                    <?php if(get_post_meta($post->ID,'sponsor_name',true)) { ?>
                        <span class="author-name">
                            <?php $get_sponsor_url = get_post_meta($post->ID,'sponsor_url',true); 
                            if($get_sponsor_url) { echo '<a href="'.$get_sponsor_url.'" rel="nofollow" target="_blank">'; } ?>
                                <span><?php echo get_post_meta($post->ID,'sponsor_name',true); ?></span>
                            <?php if($get_sponsor_url) { echo '</a>'; } ?>
                        </span>
                    <?php } else { ?>
                        <span class="author-name"><span><?php the_author_posts_link(); ?></span></span>
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
                <?php if(get_post_meta($post->ID,'is_sponsored',true)) { ?>
                    <div class="sponsored-msg">
                        <div class="label">¿Qué es contenido patrocinado?</div>
                        <p>El contenido de este artículo es brindado por nuestro patrocinador. No es necesariamente escrito por nuestro equipo de editores.</p>
                    </div>
                <?php } ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class('article-single'); ?>>
                    <div class="the-content">
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
                <?php if(wp_is_mobile() && get_post_meta($post->ID,'is_sponsored',true)) { ?>
                    <div class="widget sponsored bottom">
                        <div class="sponsored-ad">
                            <?php echo get_post_meta($post->ID,'sponsor_ad',true); ?>
                        </div>
                    </div>
                <?php } ?>
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
            <?php $paged = get_query_var('paged') ? get_query_var('paged') : 1; $wp_query = new WP_Query(array('post_type' => 'post','paged' => $paged,'posts_per_page' => 9,'orderby' => 'rand')); get_template_part('content/loop'); wp_reset_query(); ?>
        </div>
    </section>
    
<?php get_footer(); ?>