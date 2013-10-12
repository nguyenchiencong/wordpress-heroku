<?php
include_once ABSPATH . 'wp-includes/class-wp-customize-control.php';

class DW_Minion_Textarea_Custom_Control extends WP_Customize_Control {

  public $type = 'textarea';

  public $statuses;

  public function __construct( $manager, $id, $args = array() ) {

  $this->statuses = array( '' => __( 'Default', 'dw-minion' ) );
    parent::__construct( $manager, $id, $args );
  }
  public function render_content() {
    ?>
    <label>
      <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
      <textarea class="large-text" cols="20" rows="5" <?php $this->link(); ?>>
        <?php echo esc_textarea( $this->value() ); ?>
      </textarea>
    </label>
    <?php
  }
}

function dw_minion_customize_register( $wp_customize ) {

  $wp_customize->add_setting('dw_minion_theme_options[about]', array(
    'default'        => '',
    'capability'     => 'edit_theme_options',
    'type'           => 'option',
  ));

  $wp_customize->add_control( new DW_Minion_Textarea_Custom_Control($wp_customize, 'about', array(
    'label'      => __('About', 'dw-minion'),
    'section'    => 'title_tagline',
    'settings'   => 'dw_minion_theme_options[about]',
  )));

  $wp_customize->add_setting('dw_minion_theme_options[logo]', array(
    'capability' => 'edit_theme_options',
    'type' => 'option',
  ));

  $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'logo', array(
    'label' => __('Site Logo', 'dw-minion'),
    'section' => 'title_tagline',
    'settings' => 'dw_minion_theme_options[logo]',
  )));

  $wp_customize->add_setting('dw_minion_theme_options[header_display]', array(
    'default'        => 'site_title',
    'capability'     => 'edit_theme_options',
    'type'           => 'option',
  ));

  $wp_customize->add_control( 'header_display', array(
    'settings' => 'dw_minion_theme_options[header_display]',
    'label'   => 'Display as',
    'section' => 'title_tagline',
    'type'    => 'select',
    'choices'    => array(
      'site_title' => 'Site Title',
      'site_logo' => 'Site Logo',
    ),
  ));

  $wp_customize->add_section('dw_minion_social_links', array(
    'title'    => __('Social Links', 'dw-minion'),
    'priority' => 110,
  ));

  $wp_customize->add_setting('dw_minion_theme_options[facebook]', array(
    'default'        => '',
    'capability'     => 'edit_theme_options',
    'type'           => 'option',
  ));

  $wp_customize->add_control('facebook', array(
    'label'      => __('Facebook', 'dw-minion'),
    'section'    => 'dw_minion_social_links',
    'settings'   => 'dw_minion_theme_options[facebook]',
  ));

  $wp_customize->add_setting('dw_minion_theme_options[twitter]', array(
    'default'        => '',
    'capability'     => 'edit_theme_options',
    'type'           => 'option',
  ));

  $wp_customize->add_control('twitter', array(
    'label'      => __('Twitter', 'dw-minion'),
    'section'    => 'dw_minion_social_links',
    'settings'   => 'dw_minion_theme_options[twitter]',
  ));

  $wp_customize->add_setting('dw_minion_theme_options[google_plus]', array(
    'default'        => '',
    'capability'     => 'edit_theme_options',
    'type'           => 'option',
  ));

  $wp_customize->add_control('google_plus', array(
    'label'      => __('Google+', 'dw-minion'),
    'section'    => 'dw_minion_social_links',
    'settings'   => 'dw_minion_theme_options[google_plus]',
  ));

  $wp_customize->add_setting('dw_minion_theme_options[youtube]', array(
    'default'        => '',
    'capability'     => 'edit_theme_options',
    'type'           => 'option',
  ));

  $wp_customize->add_control('youtube', array(
    'label'      => __('YouTube', 'dw-minion'),
    'section'    => 'dw_minion_social_links',
    'settings'   => 'dw_minion_theme_options[youtube]',
  ));

  $wp_customize->add_setting('dw_minion_theme_options[linkedin]', array(
    'default'        => '',
    'capability'     => 'edit_theme_options',
    'type'           => 'option',
  ));

  $wp_customize->add_control('linkedin', array(
    'label'      => __('LinkedIn', 'dw-minion'),
    'section'    => 'dw_minion_social_links',
    'settings'   => 'dw_minion_theme_options[linkedin]',
  ));
}
add_action( 'customize_register', 'dw_minion_customize_register' );

function dw_minion_get_theme_option( $option_name, $default = '' ) {
  $options = get_option( 'dw_minion_theme_options' );
  if( isset($options[$option_name]) ) {
    return $options[$option_name];
  }
  return $default; 
}