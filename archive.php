<?php get_header(); ?>
   
   <div id="ad-space">
        <?php if(wp_is_mobile()) { ?>
            <?php global $nacionelectrica; echo $nacionelectrica['mobile_archive_header_ad']; ?>
        <?php } else { ?>
            <?php global $nacionelectrica; echo $nacionelectrica['archive_header_ad']; ?>
        <?php } ?>
    </div>
    
    <section id="content">
        <span class="section-title">
            <span>
                <h1>
                    <?php if ( is_category() ) { 
                        printf( __('%s'),single_cat_title( '', false )); 
                    } elseif ( is_tag() ) { 
                        printf( __('%s'),single_tag_title( '', false )); 
                    } else { 
                        _e('Archivos'); } 
                    ?>
                </h1>
            </span>
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