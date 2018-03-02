<?php get_header();
setPostViews(get_the_ID()); ?>        

    <section id="content" class="single">
        <?php while ( have_posts() ) : the_post(); ?>
            <div class="main-col page">
               <header>
                    <h1 class="entry-title" itemprop="headline"><?php the_title(); ?></h1>
                </header>
                <article id="post-<?php the_ID(); ?>" <?php post_class('article-single'); ?> itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
                    <div class="the-content" itemprop="text">
                        <?php the_content(); ?>
                    </div>
                </article>
            </div>
        <?php endwhile; wp_reset_query(); ?>
    </section>
    
<?php get_footer(); ?>