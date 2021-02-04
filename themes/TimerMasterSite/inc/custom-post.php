<?php

  function custom_post(){               
    register_post_type('latest_work', array(
      'labels' => array(
          'menu_name' => 'Latest Work Menu',
          'name'     => 'Latest Work',
          'add_new'  => 'Add New',
          'all_items' => 'All Latest Works',
          'add_new_item' => 'Add New'
      ), 
      'public' => true,
      'supports' => array('thumbnail', 'custom-fields', 'editor', 'tags', 'category', 'title', 'comments'),
      'menu_icon' => 'dashicons-hammer'
      ));

      register_post_type('offer', array(
        'labels' => array(
          'menu_name' => 'Offer Menu',
          'name' => 'Offer',
          'add_new' => 'Add New',
          'all_items' => 'All Offers',
          'add_new_item' => 'Add New Offer Item'
        ),
        'public' => true,
        'supports' => array( 'title' ),
        'menu_icon' => 'dashicons-hammer'
        ));
//team 
        register_post_type('team', array(
          'labels' => array(
            'menu_name' => 'Team Menu',
            'name' => 'Team',
            'add_new' => 'Add New',
            'all_items' => 'All Team Member',
            'add_new_item' => 'Add New Team Item'
          ),
          'public' => true,
          'supports' => array('title'),
          'menu_icon' => 'dashicons-clock'
        ));

  }
  add_action('init', 'custom_post');

  ?>