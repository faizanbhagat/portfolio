<?php

function register_primary_menu() {
  register_nav_menu( 'primary', 'Primary Menu' );
}
add_action( 'after_setup_theme', 'register_primary_menu' );

/*
*
* Walker for the main menu 
*
*/
function add_arrow( $output, $item, $depth, $args ){
  //Only add class to 'top level' items on the 'primary' menu.
  if('primary' == $args->theme_location && $depth === 0 ){
      if (in_array("menu-item-has-children", $item->classes)) {
          $new_output = '<div class="sub-wrap">' . 
                          $output . 
                        '<i class="nav-icon fas fa-chevron-down down-icon" aria-hidden="true"></i></div>';
          return $new_output;
      }
  }
  return $output;
}
add_filter( 'walker_nav_menu_start_el', 'add_arrow',10,4);

// Example of how to use a repeatable box

function example_repeatable_customizer($wp_customize) {
  require 'section_vars.php';  
  require_once 'controller.php';  
  
  $wp_customize->add_section($example_section, array(
    'title' => 'Example Repeaters',
  ));
  
  $wp_customize->add_setting(
    $example_repeater,
    array(
        'sanitize_callback' => 'onepress_sanitize_repeatable_data_field',
        'transport' => 'refresh',
    ) );

  $wp_customize->add_control(
      new Onepress_Customize_Repeatable_Control(
          $wp_customize,
          $example_repeater,
          array(
              'label' 		=> esc_html__('Example Q & A Repeater'),
              'description'   => '',
              'section'       => $example_section,
              'live_title_id' => 'some_quote',
              'title_format'  => esc_html__('[live_title]'), // [live_title]
              'max_item'      => 10, // Maximum item can add
              'limited_msg' 	=> wp_kses_post( __( 'Max items added' ) ),
              'fields'    => array(
                  'some_quote'  => array(
                      'title' => esc_html__('Text'),
                      'type'  =>'text',
                  ),
                  'some_image' => array(
                    'title' => esc_html__('Image'),
                    'type'  =>'media',
                ),
              ),
          )
      )
  );
}
add_action( 'customize_register', 'example_repeatable_customizer' );

function home_customizer($wp_customize) {
  require 'section_vars.php';
  $wp_customize->add_section($home_section, array(
    'title' => 'Testing Home Page',
  ));

  $wp_customize->add_setting($home_top_vid, array(
    'default' => 'https://www.youtube.com/embed/A0Wyx-OOX4A',
    'sanitize_callback' => 'sanitize_text_field',
  ));

  $wp_customize->add_control($home_top_vid, array(
    'label' => 'Top Video Embed',
    'section' => $home_section,
  ));

  $wp_customize->add_setting($home_top_img);
  $wp_customize->add_control( new WP_Customize_Image_Control( 
      $wp_customize, 
      $home_top_img, 
      array(
          'label' => 'Top Image',
          'section' => $home_section
      )
  ));
  // Top Desc
  $wp_customize->add_setting($home_top_desc);
  $wp_customize->add_control($home_top_desc, array(
      'label' => 'Top Description',
      'section' => $home_section,
      'type' => 'textarea'
  ));
}
add_action( 'customize_register', 'home_customizer' );

function portfolio_customizer($wp_customize){
  $wp_customize->add_section('project_section', array(
    'title' => 'Project Customizer',
  ));

  $wp_customize->add_setting('hero_sentence', array(
    'default' => 'Hero Sentence'
  ));
  $wp_customize->add_control('hero_sentence', array(
    'label' => 'Default text for hero sentence',
    'section' => 'project_section',
  ));

  $wp_customize->add_setting('bio1_desc', array(
    'default' => 'Default text for bio body 1'
  ));
  $wp_customize->add_control('bio1_desc', array(
    'label' => 'Text 1 Bio',
    'section' => 'project_section',
    'type' => 'textarea'
  ));

  $wp_customize->add_setting('bio2_desc', array(
    'default' => 'Default text for bio body 2'
  ));
  $wp_customize->add_control('bio2_desc', array(
    'label' => 'Text 2 Bio',
    'section' => 'project_section',
    'type' => 'textarea'
  ));

  $wp_customize->add_setting('main_image');
  $wp_customize->add_control( new WP_Customize_Image_Control( 
      $wp_customize, 
      'main_image', 
      array(
          'label' => 'Top Image',
          'section' => 'project_section'
      )
  ));

  $wp_customize->add_setting('first_logo');
  $wp_customize->add_control( new WP_Customize_Image_Control( 
      $wp_customize, 
      'first_logo', 
      array(
          'label' => 'First Logo',
          'section' => 'project_section'
      )
  ));

  $wp_customize->add_setting('second_logo');
  $wp_customize->add_control( new WP_Customize_Image_Control( 
      $wp_customize, 
      'second_logo', 
      array(
          'label' => 'Second Logo',
          'section' => 'project_section'
      )
  ));

  $wp_customize->add_setting('third_logo');
  $wp_customize->add_control( new WP_Customize_Image_Control( 
      $wp_customize, 
      'third_logo', 
      array(
          'label' => 'Third Logo',
          'section' => 'project_section'
      )
  ));

  $wp_customize->add_setting('resume_proj');
  $wp_customize->add_control( new WP_Customize_Image_Control( 
      $wp_customize, 
      'resume_proj', 
      array(
          'label' => 'Resume',
          'section' => 'project_section'
      )
  ));
}
add_action('customize_register', 'portfolio_customizer');

function project_repeater($wp_customize){
  $wp_customize->add_section('project_repeater_section', array(
    'title' => 'Project Repeater',
  ));

  $wp_customize->add_setting('project_repeater_setting', array(
    'sanitize_callback' => 'onepress_sanitize_repeatable_data_field',
    'transport' => 'refresh',
  ));

  $wp_customize-> add_control(
    new Onepress_Customize_Repeatable_Control(
      $wp_customize,
      'project_repeater_setting',
      array(
        'label' => 'Project Repeater',
        'descrpition' => '',
        'section' => 'project_repeater_section',
        'live_title_id' => 'project_title',
        'title_format' => esc_html__('[live_title]'),
        'max_item' => 5,
        'limited_msg' => wp_kses_post('Maximum of 5 projects allowed.'),
        'fields' => array(
          'project_title' => array(
            'title' => 'Project Title',
            'type' => 'text',
          ),
          'project_type' => array(
            'title' => 'Project Type',
            'type' => 'text',
          ),
          'project_language' => array(
            'title' => 'Project Language',
            'type' => 'text',
          ),
          'project_descr' => array(
            'title' => 'Project Description',
            'type' => 'textarea',
          ),
          'project_img' => array(
            'title' => 'Project Image',
            'type' => 'media',
          ),
          ),
        ),
      )
    );
}
add_action('customize_register', 'project_repeater');