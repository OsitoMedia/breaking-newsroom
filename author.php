<?php get_header(); ?>
   
   <div id="ad-space">
        <?php if(wp_is_mobile()) { ?>
            <?php global $nacionelectrica; echo $nacionelectrica['mobile_archive_header_ad']; ?>
        <?php } else { ?>
            <?php global $nacionelectrica; echo $nacionelectrica['archive_header_ad']; ?>
        <?php } ?>
    </div>
    
    <section id="content">
        
        <div id="author-box">
            <div class="center">
                <?php echo get_avatar( get_the_author_meta( 'ID' ) ); ?>
                <h1><?php the_author(); ?></h1>
                <p class="description"><?php the_author_meta( 'description' ); ?></p>
                <ul class="social">
                    <?php if(get_the_author_meta('linkedin_url')) { ?>
                        <li class="linkedin"><a href="<?php echo get_the_author_meta( 'linkedin_url' ); ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                    <?php } ?>
                    <?php if(get_the_author_meta('twitter_url')) { ?>
                        <li class="twitter"><a href="<?php echo get_the_author_meta( 'twitter_url' ); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                    <?php } ?>
                    <?php if(get_the_author_meta('google_url')) { ?>
                        <li class="google-plus"><a href="<?php echo get_the_author_meta( 'google_url' ); ?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                    <?php } ?>
                    <?php if(get_the_author_meta('instagram_url')) { ?>
                        <li class="instagram"><a href="<?php echo get_the_author_meta( 'instagram_url' ); ?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        
        <span class="section-title">
            <span>Artículos del autor</span>
        </span>
       <div class="row">
            <div id="infinite">
                <?php $paged = get_query_var('paged') ? get_query_var('paged') : 1;
                get_template_part('content/loop'); ?>
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
            <?php global $nacionelectrica; echo $nacionelectrica['mobile_archive_loop_ad']; ?>
        <?php } else { ?>
            <?php global $nacionelectrica; echo $nacionelectrica['archive_loop_ad']; ?>
        <?php } ?>
    </div>

<?php get_footer(); ?>