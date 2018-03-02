<?php global $wp_query; $loopcounter=0; while ($wp_query->have_posts()) : $wp_query->the_post(); $loopcounter++ ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class('article inf'); ?>>
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
<?php endwhile; ?>