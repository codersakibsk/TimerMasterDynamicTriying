
    <?php get_header(); ?>

    <?php
        
        $category_label = get_post_meta(get_the_ID(), 'category_label', true);
        $tags_label = get_post_meta(get_the_ID(), 'tags_label', true )
    ?>

<!--
==================================================
Global Page Section Start
================================================== -->
<section class="global-page-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block">
                    <h2><?php the_title(); ?></h2>
                    <div class="portfolio-meta">
                        <span>Posted On:<?php the_time('d,m,y'); ?></span> |

                         <span>
                             Category:
                             <?php 
                            $x = 0;
                            if(is_array($category_label)){
                                foreach($category_label as $single_item){ 
                                    $x++;
                                    ?>

                                    <b class="<?php if($x == 1); ?>"><?php echo $single_item; ?></b>
                             
                             <?php   }
                            }
                        ?>
                            </span> |


                          <span>
                              Tags:
                              <?php
                                $x = 0;
                                if(is_array($tags_label)){
                                    foreach($tags_label as $single_item){
                                        $x++;
                                        ?>

                                        <b class="<?php if($x ==1);?>"><?php echo $single_item; ?></b>
                                        
                                   <?php }
                                }
                              ?>
                          </span>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!--/#Page header-->


<section class="single-post">
    <div class="container">
        <div class="row">
            <?php 
            if(have_posts()){
                while(have_posts()): the_post(); ?>

                    <div class="col-md-12">
                        <div class="post-img"> 
                            <?php the_post_thumbnail('full', array('class' => 'img-responsive')); ?>
                        </div>
                        <div class="post-content">
                            <p><?php the_excerpt(); ?></p>
                        </div>
                        
                    </div>

               <?php endwhile;
            }
            
            ?>


        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="comments">
                    <div class="media">
                        <a href="" class="pull-left">
                            <img alt="" src="<?php get_template_directory_uri() ;?>/images/avater.jpg" class="media-object">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">
                            Jonathon Andrew</h4>
                            <p class="text-muted">
                                12 July 2013, 10:20 PM
                            </p>
                            <p>
                                Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
                            </p>
                            <a href="">Reply</a>
                            <hr>
                            <!-- Nested media object -->
                            <div class="media">
                                <a href="" class="pull-left">
                                    <img alt="" src="<?php get_template_directory_uri() ;?>/images/avater-1.jpg" class="media-object">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading">
                                    Tom Cruse </h4>
                                    <p class="text-muted">
                                        12 July 2013, 10:20 PM
                                    </p>
                                    <p>
                                        Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
                                    </p>
                                </div>
                            </div>
                            <!--end media-->
                            <hr>
                            <div class="media">
                                <a href="" class="pull-left">
                                    <img alt="" src="<?php get_template_directory_uri() ;?>/images/avater-1.jpg" class="media-object">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading">
                                    Nicolus Carolus </h4>
                                    <p class="text-muted">
                                        12 July 2013, 10:20 PM
                                    </p>
                                    <p>
                                        Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
                                    </p>
                                </div>
                            </div>
                            <!--end media-->
                        </div>
                    </div>
                    <div class="media">
                        <a href="" class="pull-left">
                            <img alt="" src="<?php get_template_directory_uri() ;?>/images/avater-2.jpg" class="media-object">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">
                            Rob Martin</h4>
                            <p class="text-muted">
                                12 July 2013, 10:20 PM
                            </p>
                            <p>
                                Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
                            </p>
                            <a href="">Reply</a>
                        </div>
                    </div>
                    <div class="media">
                        <a href="" class="pull-left">
                            <img alt="" src="<?php get_template_directory_uri() ;?>/images/avater-2.jpg" class="media-object">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">
                            Mastarello </h4>
                            <p class="text-muted">
                                12 July 2013, 10:20 PM
                            </p>
                            <p>
                                Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
                            </p>
                            <a href="">Reply</a>
                        </div>
                    </div>
                </div>
                <div class="post-comment">
                <?php comments_template(); ?>
                    <h3>Leave a Reply</h3>
                    <form role="form" class="form-horizontal">
                        <div class="form-group">
                            <div class="col-lg-6">
                                <input type="text" class="col-lg-12 form-control" placeholder="Name">
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="col-lg-12 form-control" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-12">
                                <textarea class=" form-control" rows="8" placeholder="Message"></textarea>
                            </div>
                        </div>
                        <p>
                        </p>
                        <p>
                            <button class="btn btn-send" type="submit">Comment</button>
                        </p>
                        
                        <p></p>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
</section>   




            <!--
            ==================================================
            Call To Action Section Start
            ================================================== -->
            <section id="call-to-action">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="block">
                                <h2 class="title wow fadeInDown" data-wow-delay=".3s" data-wow-duration="500ms">SO WHAT YOU THINK ?</h1>
                                <p class="wow fadeInDown" data-wow-delay=".5s" data-wow-duration="500ms">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis,<br>possimus commodi, fugiat magnam temporibus vero magni recusandae? Dolore, maxime praesentium.</p>
                                <a href="contact.html" class="btn btn-default btn-contact wow fadeInDown" data-wow-delay=".7s" data-wow-duration="500ms">Contact With Me</a>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </section>

            <!--
            ==================================================
            Footer Section Start
            ================================================== -->
 
 <?php get_footer(); ?>