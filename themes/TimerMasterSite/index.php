<?php get_header(); ?>
        

        <!-- 
        ================================================== 
            Global Page Section Start
        ================================================== -->
        <section class="global-page-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="block">
                            <h2><?php wp_title(' '); ?></h2>
                            <ol class="breadcrumb">
                                <li>
                                    <a href="index.html">
                                        <i class="ion-ios-home"></i>
                                        Home
                                    </a>
                                </li>
                                <li class="active">Blog</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>


<!--=============================================
=            Blog With Right Sidebar            =
==============================================-->
<section id="blog-full-width">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <?php  
                    if(have_posts()){
                        while(have_posts()): the_post(); ?>

                            <article class="wow fadeInDown" data-wow-delay=".3s" data-wow-duration="500ms">
                                <div class="blog-post-image">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('full', array('class' => 'img-responsive')); ?>
                                    </a>
                                </div>
                                <div class="blog-content">
                                    <h2 class="blogpost-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h2>
                                    <div class="blog-meta">
                                        <span><?php the_time('D,M,Y'); ?></span>
                                        <span>by <?php the_author_posts_link(); ?></span>
                                        <?php  
                                            if(!empty(get_the_tags())){ ?>
                                                <span><?php the_tags( '', ); ?></span>
                                            <?php 
                                            }   
                                        ?>
                                    </div>
                                    <p>Ultrices posuere cubilia curae curabitur sit amet tortor ut massa commodo. Vestibulum consectetur euismod malesuada tincidunt cum. Sed ullamcorper dignissim consectetur ut tincidunt eros sed sapien consectetur dictum. Pellentesques sed volutpat ante, cursus port. Praesent mi magna, penatibus et magniseget dis parturient montes sed quia consequuntur magni dolores eos qui ratione.
                                    </p>
                                    <a href="single-post.html" class="btn btn-dafault btn-details">Continue Reading</a>
                                </div>
                                
                            </article>
                    <?php endwhile;    
                    }
                ?>


            </div>
            <!-- Sidebar -->
            <div class="col-md-4">
                <div class="sidebar">

                        <?php dynamic_sidebar('b_sidebar_one'); ?>
                        
                        <?php dynamic_sidebar('b_sidebar_two'); ?>
                        
                        <!-- <div class="categories widget">
                            <h3 class="widget-head">Categories</h3>
                            <ul>
                                <li>
                                    <a href="">Audio</a> <span class="badge">1</span>
                                </li>
                                <li>
                                    <a href="">Gallery</a> <span class="badge">2</span>
                                </li>
                                <li>
                                    <a href="">Image</a> <span class="badge">4</span>
                                </li>
                                <li>
                                    <a href="">Standard</a> <span class="badge">2</span>
                                </li>
                                <li>
                                    <a href="">Status</a> <span class="badge">3</span>
                                </li>
                            </ul>
                        </div> -->
                        <?php dynamic_sidebar('b_sidebar_three') ;?>
                        
                        <!-- <div class="recent-post widget">
                            <h3>Recent Posts</h3>
                            
                            <ul>
                                <li>
                                    <a href="#">Corporate meeting turns into a photoshooting.</a><br>
                                    <time>16 May, 2015</time>
                                </li>
                                <li>
                                    <a href="#">Statistics,analysis. The key to succes.</a><br>
                                    <time>15 May, 2015</time>
                                </li>
                                <li>
                                    <a href="#">Blog post without image, only text.</a><br>
                                    <time>14 May, 2015</time>
                                </li>
                                <li>
                                    <a href="#">Blog post with audio player. Share your creations.</a><br>
                                    <time>14 May, 2015</time>
                                </li>
                                <li>
                                    <a href="#">Blog post with classic Youtbube player.</a><br>
                                    <time>12 May, 2015</time>
                                </li>
                            </ul>
                            
                        </div> -->
                        <?php dynamic_sidebar('b_sidebar_four') ;?>
                        
                    </div>
                </div>
            </div>
        </div>
</section>    




            <!--
            ==================================================
            Call To Action Section Start
            ================================================== -->
                    <?php get_template_part('contact-part'); ?>

            <!--
            ==================================================
            Footer Section Start
            ================================================== -->
<?php get_footer(); ?>