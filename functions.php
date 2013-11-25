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

?>
