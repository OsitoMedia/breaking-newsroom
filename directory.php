<?php 
/* Template name: Directorio */
get_header(); ?>
    
    <section id="content" class="authors">
        <span class="section-title">
            <span>Directorio</span>
        </span>
        <?php 
        $exusers = $nacionelectrica['my_users'];
        $blogusers = get_users('exclude='.$exusers);
        foreach ( $blogusers as $user ) { ?>
            <div id="author-box">
                <div class="center">
                    <?php echo get_avatar( $user->ID, 80 ); ?>
                    <h2><?php echo $user->display_name; ?></h2>
                    <p class="description"><?php echo $user->user_description; ?></p>
                    <ul class="social">
                        <?php if($user->linkedin_url) { ?>
                            <li class="linkedin"><a href="<?php echo $user->linkedin_url; ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                        <?php } ?>
                        <?php if($user->twitter_url) { ?>
                            <li class="twitter"><a href="<?php echo $user->twitter_url; ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                        <?php } ?>
                        <?php if($user->google_url) { ?>
                            <li class="google-plus"><a href="<?php echo $user->google_url; ?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                        <?php } ?>
                        <?php if($user->instagram_url) { ?>
                            <li class="instagram"><a href="<?php echo $user->instagram_url; ?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        <?php } ?>
    </section>

<?php get_footer(); ?>