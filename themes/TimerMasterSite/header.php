<?php global $timermaster; ?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <!-- Basic Page Needs
        ================================================== -->
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link rel="icon" href="favicon.ico">
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="">
        <!-- Mobile Specific Metas
        ================================================== -->
        <meta name="format-detection" content="telephone=no">
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>


        <!--
        ==================================================
        Header Section Start
        ================================================== -->
        <header id="top-bar" class="<?php if(is_user_logged_in()){echo "top30px";} ?> navbar-fixed-top animated-header">
            <div class="container">
                <div class="navbar-header">
                    <!-- responsive nav button -->
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <!-- /responsive nav button -->
                    
                    <!-- logo -->
                    <div class="navbar-brand">
                        <a href="<?php echo esc_url(site_url()); ?>" >
                            <img src="<?php echo $timermaster['logo_image']['url']; ?>" alt="">
                        </a>
                    </div>
                    <!-- /logo -->
                </div>
                <!-- main menu -->
                <nav class="collapse navbar-collapse navbar-right" role="navigation">
                    <div class="main-menu">
                        <?php
                            wp_nav_menu(array(                             
                                'theme_location'    => 'primary_menu',
                                'depth'             => 2,
                                'menu_class'        => 'nav navbar-nav navbar-right',
                                'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                                'walker'            => new WP_Bootstrap_Navwalker(),
                                'fallback_cb' => 'fallbackcb',
                            ));
                        ?>
                    </div>
                </nav>
                <!-- /main nav -->
            </div>
        </header>