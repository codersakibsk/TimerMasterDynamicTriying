
<?php get_header(); ?>
<?php global $timermaster;  ?>
        
<?php  
    $slider_title = get_post_meta(get_the_ID(), 'slider_title', true);
    $slider_item = get_post_meta(get_the_ID(), 'slider_item', true);
    $slider_desc = get_post_meta(get_the_ID(), 'slider_desc', true);
    $slider_btn = get_post_meta(get_the_ID(), 'slider_btn', true);
    $slider_background = get_post_meta(get_the_ID(), 'slider_background', true)

?>

<!--
==================================================
Slider Section Start
================================================== -->
<section id="hero-area" style="background-image:url('<?php echo $slider_background; ?>');">
<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
            <div class="block wow fadeInUp" data-wow-delay=".3s">
                <!-- Slider -->
                <section class="cd-intro">
                    <h1 class="wow fadeInUp animated cd-headline slide" data-wow-delay=".4s" >
                    <span><?php echo $slider_title; ?></span><br>
                    <span class="cd-words-wrapper">
                        <?php 
                            $x = 0;
                            if(is_array($slider_item)){
                                foreach($slider_item as $single_item){ 
                                    $x++;
                                    ?>

                                    <b class="<?php if($x == 1){ echo "is-visible"; } ?>"><?php echo $single_item; ?></b>
                             
                             <?php   }
                            }
                        ?>
                        
                        <!-- <b>DEVELOPER</b>
                        <b>FATHER</b> -->
                    </span>
                    </h1>
                </section> <!-- cd-intro -->
                    <!-- /.slider -->
                    <h2 class="wow fadeInUp animated" data-wow-delay=".6s" >
                       <?php echo $slider_desc; ?>
                    </h2>
                    <a class="btn-lines dark light wow fadeInUp animated smooth-scroll btn btn-default btn-green" data-wow-delay=".9s" href="#works" data-section="#works"><?php echo $slider_btn ?></a>
            </div>
        </div>
    </div>
</div>
</section><!--/#main-slider-->

<!--
==================================================
About Section Start
================================================== -->
<section id="about">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <div class="block wow fadeInLeft" data-wow-delay=".3s" data-wow-duration="500ms">
                    <h2><?php esc_html_e('About Me'); ?></h2>
                    <p>
                     <?php echo $timermaster['aboutme_desc']; ?>
                    </p>
                </div>
                
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="block wow fadeInRight" data-wow-delay=".3s" data-wow-duration="500ms">
                    <img src="<?php echo $timermaster['aboutme_image']['url']; ?>" alt="">
                </div>
            </div>
        </div>
    </div>
</section> <!-- /#about -->

<!--
==================================================
Works Section Start
================================================== -->
<section id="works" class="works">
    <div class="container">
        <div class="section-heading">
            <h1 class="title wow fadeInDown" data-wow-delay=".3s"><?php echo $timermaster['works_title']; ?></h1>
            <p class="wow fadeInDown" data-wow-delay=".5s">
             <?php echo $timermaster['works_subtitle']; ?>
            </p>
        </div>
        <div class="row">
            <?php 
                $query = new WP_Query(array(
                    'post_type' => 'latest_work',
                    'posts_per_page' => -1,
                    'order' => 'DSC'
                ));
                if($query -> have_posts()){
                    while($query -> have_posts()): $query -> the_post();
                    
                    $post_thumb = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
                        $demo = get_post_meta(get_the_ID(), 'demo_label', true);
                        $details = get_post_meta(get_the_ID(), 'detail_label', true);
                        $animate = get_post_meta(get_the_ID(), 'animation_class_name', true);
                        $animate_delay = get_post_meta(get_the_ID(), 'animation_delay_time', true);
                    ?>
                    <div class="col-sm-4 col-xs-12">
                        <figure class="wow <?php echo $animate; ?> animated portfolio-item" data-wow-duration="500ms" data-wow-delay="<?php echo $animate_delay; ?>">
                            <div class="img-wrapper">

                                <?php the_post_thumbnail('custom-post-type', array('class' => 'img-responsive')); ?>
                                <div class="overlay">
                                    <div class="buttons">
                                        <a rel="gallery" class="fancybox" href="<?php echo $post_thumb[0]; ?>"><?php echo $demo; ?></a>
                                        <a target="_blank" href="<?php the_permalink(); ?>"><?php echo $details; ?></a>
                                    </div>
                                </div>
                            </div>
                            <figcaption>
                            <h4>
                            <a href="<?php the_permalink(); ?>">
                               <?php the_title(); ?>
                            </a>
                            </h4>
                            <p>
                                <?php the_excerpt('20'); ?>
                            </p>
                            </figcaption>
                        </figure>
                    </div>

                   <?php endwhile;
                }
            ?>

        </div>
    </div>
</section> <!-- #works -->
<!--
==================================================
offer Section Start
================================================== -->
<section id="feature">
    <div class="container">
        <div class="section-heading">
            <h1 class="title wow fadeInDown" data-wow-delay=".3s"><?php echo $timermaster['offer_title']; ?></h1>
            <p class="wow fadeInDown" data-wow-delay=".5s">
              <?php echo $timermaster['offer_subtitle']; ?>
            </p> 
        </div>
        <div class="row">
        <?php  
            $query = new WP_Query(array(
                'post_type' => 'offer',
                'post_per_page' => -1,
                'order' => 'DSC'
            ));

        if($query -> have_posts()){
            while($query -> have_posts()): $query -> the_post(); 
                $ion_icon_class =   get_post_meta(get_the_ID(), 'ion_icon_class', true);
                $offer_desc =   get_post_meta(get_the_ID(), 'offer_desc', true);

                ?>
                <div class="col-md-4 col-lg-4 col-xs-12">
                    <div class="media wow fadeInUp animated" data-wow-duration="500ms" data-wow-delay="300ms">
                        <div class="media-left">
                            <div class="icon">
                                <i class="<?php echo $ion_icon_class; ?>"></i>
                            </div>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading"><?php the_title(); ?></h4>
                            <p><?php echo $offer_desc; ?></p>
                        </div>
                    </div>
                </div>

           <?php endwhile;
        }
        
        ?>

        </div>
    </div>
</section> <!-- /#feature -->


     <!--
    ==================================================
    Call To Action Section Start
    ================================================== -->
        <section id="call-to-action">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="block">
                            <h2 class="title wow fadeInDown" data-wow-delay=".3s" data-wow-duration="500ms"><?php echo $timermaster['contact_title']; ?></h1>
                            <p class="wow fadeInDown" data-wow-delay=".5s" data-wow-duration="500ms"><?php echo $timermaster['contact_subtitle']; ?></p>
                            <a href="<?php echo esc_url($timermaster['contact_url']) ?>" class="btn btn-default btn-contact wow fadeInDown" data-wow-delay=".7s" data-wow-duration="500ms"><?php echo $timermaster['contact_Button']; ?></a>
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>

<?php get_footer(); ?>



