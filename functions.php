<?php
/**
 * Knowledge Commons functions and definitions
 *
 * @package WordPress
 * @subpackage Knowledge_Commons
 * @since Knowledge Commons 1.0
 */


function knowledgecommons_theme_customizer( $wp_customize ) {
    $wp_customize->add_section( 'knowledgecommons_logo_section' , array(
        'title'       => __( 'Logo', 'knowledgecommons' ),
        'priority'    => 30,
        'description' => 'Upload a logo to display beside the title',
    ) );
    
    $wp_customize->add_setting( 'knowledgecommons_logo' );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'knowledgecommons_logo', array(
        'label'    => __( 'Logo', 'knowledgecommons' ),
        'section'  => 'knowledgecommons_logo_section',
        'settings' => 'knowledgecommons_logo',
    ) ) );
}
add_action('customize_register', 'knowledgecommons_theme_customizer');

add_action( 'update_option_theme_mods_knowledge-commons-wp', 'twentyfourteen_rebuild_accent_colors' );



// qTranslate hack

// hook

add_action('em_event', em_qtranslate, 0, 3);

// qtranslate

function em_qtranslate($target, $arg1=null, $arg2=null, $arg3=null) {
  $target->event_name = em_qtranslate_string($target->event_name);
  $target->event_owner = em_qtranslate_string($target->event_owner);
  $target->post_content = em_qtranslate_string($target->post_content);
}

function em_qtranslate_string($raw_string) {
  if(function_exists('qtrans_useCurrentLanguageIfNotFoundUseDefaultLanguage'))
    $output = qtrans_useCurrentLanguageIfNotFoundUseDefaultLanguage($raw_string);
  else
    $output = __($raw_string);
  return $output;
}


?>
