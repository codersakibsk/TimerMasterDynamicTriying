<?php

/**
 * Get the bootstrap!
 * (Update path to use cmb2 or CMB2, depending on the name of the folder.
 * Case-sensitive is important on some systems.)
 */
require_once __DIR__ . '/CMB2/init.php';


function custom_fields(){
	$latest_work_metabox   = new_cmb2_box( array(
		'id'            => 'work_metabox',
		'title'         => __( 'Latest Work Metabox', 'TimerMasterSite' ),
		'object_types'  => array( 'latest_work', ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true,
	) );
	// Regular text field
	$latest_work_metabox->add_field( array(
		'name'       => __( 'Demo Field', 'cmb2' ),
		'desc'       => __( 'Input Your Demo Label', 'cmb2' ),
		'id'         => 'demo_label',
		'type'       => 'text',
		'show_on_cb' => 'cmb2_hide_if_no_cats',
	) );
			//datails
	$latest_work_metabox->add_field( array(
		'name'       => __( 'Details Field', 'cmb2' ),
		'desc'       => __( 'Input Your Detail Label', 'cmb2' ),
		'id'         => 'detail_label',
		'type'       => 'text',
		'show_on_cb' => 'cmb2_hide_if_no_cats',
	) );
			//animation
	$latest_work_metabox->add_field( array(
		'name'       => __( 'Animation Field', 'cmb2' ),
		'desc'       => __( 'Input Your Animation Class Name', 'cmb2' ),
		'id'         => 'animation_class_name',
		'type'       => 'text',
		'show_on_cb' => 'cmb2_hide_if_no_cats',
	) );
			//animation delay time
	$latest_work_metabox->add_field( array(
		'name'       => __( 'Animation Delay Field', 'cmb2' ),
		'desc'       => __( 'Input Your Animation Delay Field', 'cmb2' ),
		'id'         => 'animation_delay_time',
		'type'       => 'text',
		'show_on_cb' => 'cmb2_hide_if_no_cats',
	) );
			//categories post
	$latest_work_metabox->add_field( array(
		'name'       => __( 'Category Field', 'cmb2' ),
		'desc'       => __( 'Input Your Category Field', 'cmb2' ),
		'id'         => 'category_label',
		'type'       => 'text',
		'show_on_cb' => 'cmb2_hide_if_no_cats',
		'repeatable' => true
	) );
			//categories post
	$latest_work_metabox->add_field( array(
		'name'       => __( 'Tags Field', 'cmb2' ),
		'desc'       => __( 'Input Your Tags Field', 'cmb2' ),
		'id'         => 'tags_label',
		'type'       => 'text',
		'show_on_cb' => 'cmb2_hide_if_no_cats',
		'repeatable' => true
	) );
	//-------------------------------
	//front-page slider meta box fields
	$front_page_metabox   = new_cmb2_box( array(
		'id'            => 'front_page_metabox',
		'title'         => __( 'Front Page Metabox', 'TimerMasterSite' ),
		'object_types'  => 'page', // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true,
		'show_on' => array(
			'key' => 'id',
			'value' => 88
		)
	) );
	// 
	$front_page_metabox->add_field( array(
		'name'       => __( 'Slider Title', 'cmb2' ),
		'desc'       => __( 'Input Your Slider Title', 'cmb2' ),
		'id'         => 'slider_title',
		'type'       => 'text',
		'show_on_cb' => 'cmb2_hide_if_no_cats',
	) );
	// 
	$front_page_metabox->add_field( array(
		'name'       => __( 'Slider Item', 'cmb2' ),
		'desc'       => __( 'Input Your Slider Item', 'cmb2' ),
		'id'         => 'slider_item',
		'type'       => 'text',
		'show_on_cb' => 'cmb2_hide_if_no_cats',
		'repeatable' => true
	) );
	// 
	$front_page_metabox->add_field( array(
		'name'       => __( 'Slider Description', 'cmb2' ),
		'desc'       => __( 'Input Your Slider Description', 'cmb2' ),
		'id'         => 'slider_desc',
		'type'       => 'textarea',
		'show_on_cb' => 'cmb2_hide_if_no_cats',
	) );
	// 
	$front_page_metabox->add_field( array(
		'name'       => __( 'Slider Button', 'cmb2' ),
		'desc'       => __( 'Input Your Slider Button Label', 'cmb2' ),
		'id'         => 'slider_btn',
		'type'       => 'text',
		'show_on_cb' => 'cmb2_hide_if_no_cats',
	) );
	// 
	$front_page_metabox->add_field( array(
		'name'       => __( 'Slider BG', 'cmb2' ),
		'desc'       => __( 'Upload Your Slider Background Image', 'cmb2' ),
		'id'         => 'slider_background',
		'type'       => 'file',
		'show_on_cb' => 'cmb2_hide_if_no_cats',
	) );
	// 
	
	//-------------------------------
	//Offer
	$Offer_metabox   = new_cmb2_box( array(
		'id'            => 'offer_metabox',
		'title'         => __( 'Offer Metabox', 'TimerMasterSite' ),
		'object_types'  => 'offer', // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true,
	) );
	// 
	$Offer_metabox->add_field( array(
		'name'       => __( 'Offer Icon', 'cmb2' ),
		'desc'       => __( 'Input Your Ion Icon Class Name', 'TimerMasterSite' ),
		'id'         => 'ion_icon_class',
		'type'       => 'text',
		'show_on_cb' => 'cmb2_hide_if_no_cats',
	) ); 
	// 
	$Offer_metabox->add_field( array(
		'name'       => __( 'Offer Description', 'cmb2' ),
		'desc'       => __( 'Input Your Offer Description', 'TimerMasterSite' ),
		'id'         => 'offer_desc',
		'type'       => 'textarea',
		'show_on_cb' => 'cmb2_hide_if_no_cats',
	) );    
	// ---------

	//Team Section --------------------------------
	$team_metabox   = new_cmb2_box( array(
		'id'            => 'team_metabox',
		'title'         => __( 'Team Metabox', 'TimerMasterSite' ),
		'object_types'  => 'team', // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true,
	) );
	// 
	$team_metabox->add_field( array(
		'name'       => __( 'Team Member Image', 'cmb2' ),
		'desc'       => __( 'Input Your Team Member Image', 'TimerMasterSite' ),
		'id'         => 'team_member_img',
		'type'       => 'file',
		'show_on_cb' => 'cmb2_hide_if_no_cats',
	) ); 
	// 
	$team_metabox->add_field( array(
		'name'       => __( 'Team Member Title', 'cmb2' ),
		'desc'       => __( 'Input Your Team Member Title', 'TimerMasterSite' ),
		'id'         => 'team_member_title',
		'type'       => 'text',
		'show_on_cb' => 'cmb2_hide_if_no_cats',
	) ); 
	// 
	$team_metabox->add_field( array(
		'name'       => __( 'Team Member SubTitle', 'cmb2' ),
		'desc'       => __( 'Input Your Team Member SubTitle', 'TimerMasterSite' ),
		'id'         => 'team_member_subtitle',
		'type'       => 'text',
		'show_on_cb' => 'cmb2_hide_if_no_cats',
	) ); 
	// 
	$team_metabox->add_field( array(
		'name'       => __( 'Team Member Description', 'cmb2' ),
		'desc'       => __( 'Input Your Team Member Description', 'TimerMasterSite' ),
		'id'         => 'team_member_desc',
		'type'       => 'textarea',
		'show_on_cb' => 'cmb2_hide_if_no_cats',
	) ); 
	// 
	$team_metabox->add_field( array(
		'name'       => __( 'Team Member Social Link', 'cmb2' ),
		'desc'       => __( 'Input Your Social Account Link', 'TimerMasterSite' ),
		'id'         => 'team_social',
		'type'       => 'text',
		'placeholder' => array(
			'title' => 'Input Your Social Icon Name(ex:facebook)',
			'description' => 'No Need To Input Here',
			'url' => 'Input Your Social link',
		),
		'show_on_cb' => 'cmb2_hide_if_no_cats',
		'repeatable' => true,
	) ); 

}
add_action( 'cmb2_admin_init', 'custom_fields' );






