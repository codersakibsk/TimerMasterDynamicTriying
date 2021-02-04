<?php global $timermaster; ?>
            <!--
            ==================================================
            Footer Section Start
            ================================================== -->
            <footer id="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <?php dynamic_sidebar('footer_one'); ?>
                    </div>
                    <div class="col-lg-4">
                        <?php dynamic_sidebar('footer_two'); ?>
                    </div>
                    <div class="col-lg-4">
                        <?php dynamic_sidebar('footer_three'); ?>
                    </div>
                </div>
            </div>
                <div class="container">
                    <div class="col-md-8">
                        <p class="copyright">
                        <?php echo $timermaster['copyright']; ?>
                        </p>
                    </div>
                    <div class="col-md-4">
                        <!-- Social Media -->
                        <ul class="social">
                        <?php  
                            $social_account = $timermaster['social_link_icon'];
                                if(is_array($social_account)){
                                    foreach($social_account as $single_account){ ?>
                                        <li>
                                            <a href="<?php echo esc_url($single_account['url']); ?>" class="Facebook">
                                                <i class="ion-social-<?php echo $single_account['title']; ?>"></i>
                                            </a>
                                        </li>                                    
                                <?php }
                                }
                        ?>


                        </ul>
                    </div>
                </div>
            </footer> <!-- /#footer -->

	<!-- Template Javascript Files
	================================================== -->

    <?php wp_footer(); ?>
 	</body>
</html>