<?php
namespace ElementorAddons\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Scheme_Typography;
use Elementor\Scheme_Color;
use Elementor\Group_Control_Image_Size;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * @since 1.1.0
 */
class TeamMember extends Widget_Base {

	public function get_name() {
		return 'team-member ';
	}

	public function get_title() {
		return __( 'Team Member', 'elementor-addons' );
	}

	public function get_icon() {
		return 'eicon-lock-user';
	}

    public function get_categories()
    {
        return ['custom-addons'];
    }

    protected function _register_controls() {

		$this->start_controls_section(
			'team_member',
			[
				'label' => __( 'Team Member', 'elementor-addons' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
        );
		// 
		$this->add_control(
			'member_per_row',
			[
				'label' => __( 'Member Per Row', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'solid',
				'options' => [
					'3'  => __( '4', 'elementor-addons' ),
					'4' => __( '3', 'elementor-addons' ),
					'6' => __( '2', 'elementor-addons' ),
					'12' => __( '1', 'elementor-addons' ),
				],
			]
		);
		//
        $repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'team_member_image',
			[
				'label' => __( 'Choose Image', 'elementor-addons' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
        );
        $repeater->add_control(
			'team_member_name',
			[
				'label' => __( 'Name', 'elementor-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Jonathon Andrew', 'elementor-addons' ),
                'placeholder' => __( 'Type here', 'elementor-addons' ),
                'label_blog' => true,
			]
		);
        $repeater->add_control(
			'member_designation',
			[
				'label' => __( 'Designation', 'elementor-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'CEO, Main Project Manager', 'elementor-addons' ),
                'placeholder' => __( 'Typehere', 'elementor-addons' ),
                'label_blog' => true,
			]
		);
        $repeater->add_control(
            'member_description',
            [
                'label' => __('Description', 'elementor-addons'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __(' Lorem ipsum dolor, sit amet consectetur adipisicing elit. Corrupti, saepe dolorum', 'elementor-addons'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
			'social_link_heading',
			[
				'label' => __( 'Social Url', 'elementor-addons' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
        );
        $repeater->add_control(
			'member_facebook_link',
			[
				'label' => __( 'Facebook Link', 'elementor-addons' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'elementor-addons' ),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
			]
		);
        $repeater->add_control(
			'member_twitter_link',
			[
				'label' => __( 'Twitter Link', 'elementor-addons' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'elementor-addons' ),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
			]
		);
        $repeater->add_control(
			'member_linkedIn_link',
			[
				'label' => __( 'Linkedin Link', 'elementor-addons' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'elementor-addons' ),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
			]
		);
        $repeater->add_control(
			'member_googlePlus_link',
			[
				'label' => __( 'Google Plus Link', 'elementor-addons' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'elementor-addons' ),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
			]
		);
		
		
        $this->add_control(
            'member_list',
            [
                'label' => __('Repeater List', 'elementor-addons'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'team_member_name' => __('Jonathon Andrew', 'elementor-addons'),
                        'team_member_designation' => __('CEO/Project Manager', 'elementor-addons'),
                        'member_description' => __('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem voluptatibus ea 								accusamus quo tempora', 'elementor-addons'),
                    ],
                    [
                        'team_member_name' => __('Steve Jobs', 'elementor-addons'),
                        'team_member_designation' => __('CEO/Founder', 'elementor-addons'),
                    ],

                ],
                'title_field' => '{{{ team_member_name }}}',
            ]
        );

		$this->end_controls_section();
		
		 //Style Tab-------------
		 $this->start_controls_section(
			'blog_style',
			[
				'label' => __( 'Style', 'elementor-addons' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
        );
        $this->add_control(
			'member_name_style',
			[
				'label' => __( 'Member Name', 'elementor-addons' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);  
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'member_name_typography',
				'label' => __( 'Typography', 'elementor-addons' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .team_name',
			]
		);  
		$this->add_control(
			'member_name_color',
			[
				'label' => __( 'Color', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .team_name' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'member_designation_style',
			[
				'label' => __( 'Member Designation', 'elementor-addons' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);  
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'member_designation_typography',
				'label' => __( 'Typography', 'elementor-addons' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .team_designation',
			]
		);  
		$this->add_control(
			'member_designation_color',
			[
				'label' => __( 'Color', 'elementor-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .team_designation' => 'color: {{VALUE}}',
				],
			]
		);
		
		$this->add_control(
			'member_description_style',
			[
				'label' => __( 'Member Description', 'elementor-addons' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);  
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'member_description_typography',
				'label' => __( 'Typography', 'elementor-addons' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .team_text',
			]
		);  
		$this->add_control(
			'member_description_color',
			[
				'label' => __( 'Color', 'elementor-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .team_text' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'social_icon_style',
			[
				'label' => __( 'Social Icon', 'elementor-addons' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
        );
		$this->add_control(
			'social_icon_size',
			[
				'label' => __( 'Icon Size', 'elementor-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => '%',
					'size' => 50,
				],
				'selectors' => [
					'{{WRAPPER}} .social-icons a' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'social_icon_color',
			[
				'label' => __( 'Color', 'elementor-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .social-icons a' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'social_icon_background_color',
			[
				'label' => __( 'Background Color', 'elementor-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .social-icons a' => 'background-color: {{VALUE}}',
				],
			]
		);
		

			$this->end_controls_tabs();
			////

    }
   
    protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<?php if($settings ['member_list']): ?>
		<?php foreach ($settings['member_list'] as $member) { ?>
			<div class="col-md-<?php echo $settings['member_per_row']; ?>">
                <div class="team-member wow fadeInLeft animated" data-wow-duration="500ms" data-wow-delay=".3s" style="visibility: visible; animation-duration: 500ms; animation-delay: 0.3s; animation-name: fadeInLeft;">
                    <div class="team-img">
                        <img src="<?php echo $member['team_member_image']['url'];?>" class="team-pic" alt="">
                    </div>
                    <h3 class="team_name"><?php echo $member['team_member_name']; ?></h3>

                    <p class="team_designation"><?php echo $member['member_designation']; ?></p>

                    <p class="team_text"><?php echo $member['member_description']; ?></p>
                    <p class="social-icons">
                        <a href="<?php echo $member['member_facebook_link']; ?>" class="facebook" target="_blank"><i class="ion-social-facebook-outline"></i></a>
                        <a href="<?php echo $member['member_twitter_link']; ?>" target="_blank"><i class="ion-social-twitter-outline"></i></a>

                        <a href="<?php echo $member['member_linkedIn_link']; ?>" target="_blank"><i class="ion-social-linkedin-outline"></i></a>
                        <a href="<?php echo $member['member_googlePlus_link']; ?>" target="_blank"><i class="ion-social-googleplus-outline"></i></a>
                    </p>
                </div>
            </div>
		<?php	
			} ?>
        <?php endif ?>

<?php
	}
}
