<?php 
/*
    Template Name: about page
*/
get_header(); ?>
        
    <?php global $timermaster; ?>

        <!-- 
        ================================================== 
            Global Page Section Start
        ================================================== -->
        <section class="global-page-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="block">
                            <h2>About Company</h2>
                            <ol class="breadcrumb">
                                <li>
                                    <a href="index.html">
                                        <i class="ion-ios-home"></i>
                                        Home
                                    </a>
                                </li>
                                <li class="active">About</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>


<!-- 
================================================== 
    Company Description Section Start
================================================== -->
<section class="company-description">
    <div class="container">
        <div class="row">
            <div class="col-md-6 wow fadeInLeft" data-wow-delay=".3s" >
                <img src="<?php echo $timermaster['comp_image']['url']; ?>" alt="" class="img-responsive">
            </div>
            <div class="col-md-6">
                <div class="block">
                    <h3 class="subtitle wow fadeInUp" data-wow-delay=".3s" data-wow-duration="500ms"><?php echo $timermaster['company_title']; ?></h3>

                    <p  class="wow fadeInUp" data-wow-delay=".5s" data-wow-duration="500ms">
                        <?php echo $timermaster['company_desc']; ?>
                    </p>
                    
                </div>
            </div>
        </div>
    </div>
</section>


<!-- 
================================================== 
    Company Feature Section Start
================================================== -->
<section class="about-feature clearfix">
    <div class="container-fluid">
        <div class="row">
            <div class="block about-feature-1 wow fadeInDown" data-wow-duration="500ms" data-wow-delay=".3s">
                <h2>
                <?php echo $timermaster['feature_title']; ?>
                </h2>
                <p>
                   <?php echo $timermaster['feature_desc']; ?>
                </p>
            </div>
            <div class="block about-feature-2 wow fadeInDown" data-wow-duration="500ms" data-wow-delay=".5s">
                <h2 class="item_title"> <?php echo $timermaster['feature_titleTwo']; ?> </h2>
                <p>
                    <?php echo $timermaster['feature_descTwo']; ?>
                </p>
            </div>
            <div class="block about-feature-3 wow fadeInDown" data-wow-duration="500ms" data-wow-delay=".7s">
                <h2 class="item_title">
                    <?php echo $timermaster['feature_titleThree']; ?>
                </h2>
                <p>
                    <?php echo $timermaster['feature_descThree']; ?>
                </p>
            </div>
        </div>
    </div>
</section>


<!-- 
================================================== 
    Team Section Start
================================================== -->
<section id="team">
    <div class="container">
        <div class="row">
            <h2 class="subtitle text-center">Meet The Team</h2>
                <?php 
                    $query = new WP_Query(array(
                        'post_type' => 'team',
                        'post_per_page' => -1,
                        'order' => 'DSC'
                        ));
                
                    if($query -> have_posts()){
                        while($query -> have_posts()): $query -> the_post(); 
                        $team_mem_image = get_post_meta(get_the_ID(), 'team_member_img', true);
                        $team_mem_title = get_post_meta(get_the_ID(), 'team_member_title', true);
                        $team_mem_subtitle = get_post_meta(get_the_ID(), 'team_member_subtitle', true);
                        $team_mem_desc = get_post_meta(get_the_ID(), 'team_member_desc', true);
                        $team_social = get_post_meta(get_the_ID(), 'team_social', true)
                ?>
            <div class="col-md-3">
                <div class="team-member wow fadeInLeft" data-wow-duration="500ms" data-wow-delay=".3s">
                <div class="team-img">
                            <img src="<?php echo $team_mem_image; ?>" class="team-pic" alt="">
                        </div>
                        <h3 class="team_name"><?php echo $team_mem_title; ?></h3>
                        <p class="team_designation"><?php echo $team_mem_subtitle; ?></p>
                        <p class="team_text"><?php echo $team_mem_desc; ?></p>

                    <p class="social-icons">
                    <?php  
                        $x = 0;
                        if(is_array($team_social)){
                            foreach($team_social as $single_item){
                                $x++;
                                ?>
                        <a href="<?php if($x ==1); ?>" class="facebook" target="_blank">
                        <i class=""><?php echo $single_item; ?></i>
                        </a>                                
                            <?php
                            }
                        }
                    ?>
                        <!-- <a href="#" target="_blank"><i class="ion-social-twitter-outline"></i></a>
                        <a href="#" target="_blank"><i class="ion-social-linkedin-outline"></i></a>
                        <a href="#" target="_blank"><i class="ion-social-googleplus-outline"></i></a> -->
                    </p>
                </div>
            </div>
            
            <?php endwhile;    
                    }
                ?>


        </div>
    </div>
</section>

        <!-- 
        ================================================== 
            Clients Section Start
        ================================================== -->
        <section id="clients">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="subtitle text-center wow fadeInUp animated" data-wow-duration="500ms" data-wow-delay=".3s">Our Happy Clinets</h2>
                        <p class="subtitle-des text-center wow fadeInUp animated" data-wow-duration="500ms" data-wow-delay=".5s">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore, error.</p>
                        <div id="clients-logo" class="owl-carousel">
                            <div>
                                <img src="<?php echo get_template_directory_uri(); ?>/images/clients/logo-2.jpg" alt="">
                            </div>
                            <div>
                                <img src="<?php echo get_template_directory_uri(); ?>/images/clients/logo-2.jpg" alt="">
                            </div>
                            <div>
                                <img src="<?php echo get_template_directory_uri(); ?>/images/clients/logo-3.jpg" alt="">
                            </div>
                            <div>
                                <img src="<?php echo get_template_directory_uri(); ?>/images/clients/logo-4.jpg" alt="">
                            </div>
                            <div>
                                <img src="<?php echo get_template_directory_uri(); ?>/images/clients/logo-5.jpg" alt="">
                            </div>
                             <div>
                                <img src="<?php echo get_template_directory_uri(); ?>/images/clients/logo-1.jpg" alt="">
                            </div>
                            <div>
                                <img src="<?php echo get_template_directory_uri(); ?>/images/clients/logo-2.jpg" alt="">
                            </div>
                            <div>
                                <img src="<?php echo get_template_directory_uri(); ?>/images/clients/logo-3.jpg" alt="">
                            </div>
                            <div>
                                <img src="<?php echo get_template_directory_uri(); ?>/images/clients/logo-4.jpg" alt="">
                            </div>
                            <div>
                                <img src="<?php echo get_template_directory_uri(); ?>/images/clients/logo-5.jpg" alt="">
                            </div>
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