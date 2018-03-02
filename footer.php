    </main><!-- End Main -->
    
    <?php global $nacionelectrica; if($nacionelectrica['subscribe']) { ?>
        <section id="subscribe">
            <div class="container">
                <h3>Recibe nuestras mejores actualizaciones directo a tu email</h3>
                <?php echo do_shortcode('[mc4wp_form]'); ?>
            </div>
        </section>
    <?php } ?>
    <?php global $nacionelectrica; if(is_front_page() && $nacionelectrica['videos']) { ?>
        <div class="container">
            <section id="media-player">
                <span class="section-title">Multimedia <a href="<?php bloginfo('wpurl'); ?>/multimedia">Ver todos <i class="fa fa-arrow-right"></i></a></span>
                <div id="tabs">
                    <div class="player">
                        <?php 
                        $paged = get_query_var('paged') ? get_query_var('paged') : 1; 
                        $wp_query = new WP_Query(array('paged' => $paged,'post_type'=>'media','posts_per_page' => 6));
                        $loopcounter=0; while ($wp_query->have_posts()) : $wp_query->the_post(); $loopcounter++; ?>
                            <div id="tab-<?php echo $loopcounter; ?>">
                               <div class="video-player">
                                  <?php $oembed_video_url = get_post_meta( $post->ID, 'video_url', true ); echo wp_oembed_get( $oembed_video_url ); ?>
                               </div>
                               <div class="textpart">
                                  <a href="<?php the_permalink(); ?>">
                                      <h2><?php the_title(); ?></h2>
                                      <p><?php echo excerpt(20); ?></p>
                                  </a>
                               </div>
                            </div>
                        <?php endwhile; wp_reset_query(); ?>
                    </div>
                    <ul class="playlist">
                       <?php 
                        $paged = get_query_var('paged') ? get_query_var('paged') : 1; 
                        $wp_query = new WP_Query(array('paged' => $paged,'post_type'=>'media','posts_per_page' => 6));
                        $loopcounter=0; while ($wp_query->have_posts()) : $wp_query->the_post(); $loopcounter++; ?>
                            <li class="media-article">
                                <a href="#tab-<?php echo $loopcounter; ?>">
                                   <figure class="thumb" style="background-image:url('<?php the_post_thumbnail_url('loop-thumb'); ?>');"><span class="play"><i class="fa fa-play"></i></span></figure>
                                   <figcaption class="textpart"><?php the_title(); ?></figcaption>
                                </a>
                            </li>
                        <?php endwhile; wp_reset_query(); ?>
                    </ul>
                </div>
            </section>
        </div>
    <?php } ?>

    <footer id="footer">
        <div class="container center">
            <?php if (has_nav_menu('footer')) { ?>
                <ul><?php wp_nav_menu( array('theme_location'  => 'footer', 'menu' => 'footer', 'container' => '', 'container_class' => '', 'items_wrap' => '%3$s')); ?></ul>
            <?php } ?>
            <p><strong>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?></strong><br />Todos los derechos reservados</p>
        </div>
    </footer>
    
    <div id="mask" data-toggle="body"></div>
    <div id="search-mask" data-toggle="#header .search, #header .search-hidden, #search-mask"></div>

<?php wp_footer(); ?>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.8&appId=131248050652230";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

</body>
</html>
