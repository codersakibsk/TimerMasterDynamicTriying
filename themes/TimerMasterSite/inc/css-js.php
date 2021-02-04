<?php

//calling css and js files
function css_js(){
    wp_enqueue_style( 'bootstrap_style', get_template_directory_uri(). '/plugins/bootstrap/bootstrap.min.css', null, 'v1.0' );

    wp_enqueue_style( 'ionicons', get_template_directory_uri(). '/plugins/ionicons/ionicons.min.css', null, 'v1.0',  );
    wp_enqueue_style('ion-icons', get_template_directory_uri().'/css/fontawesome-all.min.css', null, 'v1.1' );
    wp_enqueue_style( 'animat', get_template_directory_uri(). '/plugins/animate-css/animate.css');

    wp_enqueue_style( 'slider_cs', get_template_directory_uri(). '/plugins/slider/slider.css');

    wp_enqueue_style( 'owl_carosel', get_template_directory_uri(). '/plugins/owl-carousel/owl.carousel.css');

    wp_enqueue_style( 'owl_caro_theme', get_template_directory_uri(). '/plugins/owl-carousel/owl.theme.css');

    wp_enqueue_style( 'fancybox', get_template_directory_uri(). '/plugins/facncybox/jquery.fancybox.css');

    wp_enqueue_style( 'responsive', get_template_directory_uri(). '/css/responsive.css');

    wp_enqueue_style( 'style_css', get_template_directory_uri(). '/css/style.css');
    
    wp_enqueue_style( 'main-stylesheet', get_stylesheet_uri());

  // js files
  wp_enqueue_script('jquery');
  wp_enqueue_script('bootstrap', get_template_directory_uri().'/plugins/bootstrap/bootstrap.min.js', 'jquery', null, 'ture');
  wp_enqueue_script('validate', get_template_directory_uri().'/plugins/form-validation/jquery.validate.min.js', 'jquery', null, 'ture');
  wp_enqueue_script('carousel', get_template_directory_uri().'/plugins/owl-carousel/owl.carousel.min.js', 'jquery', null, 'ture');
  wp_enqueue_script('wow', get_template_directory_uri().'/plugins/wow-js/wow.min.js', 'jquery', null, 'ture');
  wp_enqueue_script('slider', get_template_directory_uri().'/plugins/slider/slider.js', 'jquery', null, 'ture');
  wp_enqueue_script('fancibox', get_template_directory_uri().'/plugins/facncybox/jquery.fancybox.js', 'jquery', null, 'ture');
  wp_enqueue_script('main', get_template_directory_uri().'/js/main.js', 'jquery', null, 'ture'); 
  
}
add_action( 'wp_enqueue_scripts', 'css_js' );
//

function timermaster_menu(){
  register_nav_menus(array(
      'primary_menu' => 'primary menu'
  ));
}
add_action('init', 'timermaster_menu');
////

function fallbackcb(){?>
  <ul class="nav navbar-nav navbar-right">
  <li>
      <a href="<?php echo site_url(); ?>" >Home</a>
  </li>
  <li><a href="about.html">About</a></li>
  <li><a href="service.html">Service</a></li>
  <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages <span class="caret"></span></a>
      <div class="dropdown-menu">
          <ul>
              <li><a href="404.html">404 Page</a></li>
              <li><a href="gallery.html">Gallery</a></li>
          </ul>
      </div>
  </li>
  <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Blog <span class="caret"></span></a>
      <div class="dropdown-menu">
          <ul>
              <li><a href="blog-fullwidth.html">Blog Full</a></li>
              <li><a href="blog-left-sidebar.html">Blog Left sidebar</a></li>
              <li><a href="blog-right-sidebar.html">Blog Right sidebar</a></li>
          </ul>
      </div>
  </li>
  <li><a href="contact.html">Contact</a></li>
</ul>
<?php }