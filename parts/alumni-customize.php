<?php



// Index Text
add_action('customize_register', 'customize_register');
function customize_register($wp_customize){
 //adding section in wordpress customizer   
$wp_customize->add_section('custom_theme_options', array(
  'title'          => 'Custom Theme Options',
  'priority'       => 10
 ));

// Static Index Toggle
$wp_customize->add_setting( 'static_index_toggle',
   array(
      'default' => 1,
      'transport' => 'refresh',
   )
); 
$wp_customize->add_control( 'static_index_toggle',
   array(
      'label' => __( 'Enable Static Index Text', 'ephemeris' ),
      'description' => esc_html__( 'Enable or Disable the Static Text on the Index or Home page.' ),
      'section'  => 'custom_theme_options',
      'type'=> 'checkbox',
      'capability' => 'edit_theme_options', // Optional. Default: 'edit_theme_options'
   )
);
// Static Index Text
$wp_customize->add_setting('index_title', 
  array(
    'default'        => 'This is a Static Index Title',
  )
);
$wp_customize->add_control('index_title', 
  array(
    'section' => 'custom_theme_options',
    'label'   => 'Static Index Title Here',
    'type'    => 'input',
  )
);
$wp_customize->add_setting('index_paragraph', 
  array(
    'default'        => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
    'transport'         => 'postMessage',
    'transport' => 'refresh',
  )
);
 $wp_customize->add_control('index_paragraph', 
  array(
    'section' => 'custom_theme_options',
    'label'   => 'Static Index Paragraph Here',
    'type'    => 'textarea',
  )
);

// Index Post List
$wp_customize->add_setting('index_post_list', 
  array(
    'default'        => '4',
  )
);
$wp_customize->add_control('index_post_list', 
  array(
    'section' => 'custom_theme_options',
    'type' => 'number',
    'label' => __( 'Number of Post' ),
    'description' => __( 'Number of posts displayed on the index page.' ),
  )
);

// Footer Text Area
$wp_customize->add_setting('footer_text', 
  array(
    'default'        => 'Default Text For Footer Section',
  )
);
$wp_customize->add_control('footer_text', 
  array(
    'section' => 'custom_theme_options',
    'label'   => 'Footer Text Here',
    'description' => __( 'Text displayed at the base of each page.' ),
    'type'    => 'textarea',
  )
);

}