<?php
/**
 * Theme Customizer
 */

add_action( 'customize_register', 'tokopress_customize_reposition', 20 );
function tokopress_customize_reposition( $wp_customize ) {
	$wp_customize->get_section( 'background_image' )->priority = 140;
	$wp_customize->get_section( 'background_image' )->title = __( 'Background', 'tokopress' );
	$wp_customize->get_control( 'background_color' )->section = 'background_image';

	$wp_customize->get_section( 'header_image' )->priority = 160;
	$wp_customize->get_section( 'header_image' )->title = __( 'Header Image', 'tokopress' );
	$wp_customize->remove_control('header_textcolor');
	
}

/**
 * Panel Header
 */
add_filter( 'tokopress_customizer_panels', 'tokopress_customize_header_panel' );
function tokopress_customize_header_panel( $tk_panels ) {
	$tk_panels[] = array(
			'ID'			=> 'tokopress_header_panel',
			'priority'		=> 170,
			'title'			=> __( 'Header', 'tokopress' ),
			'description'	=> __( 'Customize your header sections', 'tokopress' )
		);

	return $tk_panels;
}

/**
 * Header (Top)
 */
add_filter( 'tokopress_customizer_sections', 'tokopress_customize_headertop_section' );
function tokopress_customize_headertop_section( $tk_sections ) {
	$tk_sections[] = array(
			'slug'		=> 'tokopress_headertop_section',
			'label'		=> __( 'Header (Top)', 'tokopress' ),
			'priority'	=> 1,
			'panel_id'	=> 'tokopress_header_panel'
		);

	return $tk_sections;
}

add_filter( 'tokopress_customizer_data', 'tokopress_customize_headertop_colors' );
function tokopress_customize_headertop_colors( $tk_colors ) {
	$tk_colors[] = array( 
		'slug'		=> 'tokopress_headertop_bg', 
		'default'	=> '#ffffff', 
		'label'		=> __( 'Background Color', 'tokopress' ),
		'section'	=> 'tokopress_headertop_section',
		'transport'	=> 'postMessage',
		'type' 		=> 'color',
		'selector'	=> '.topnav',
		'property'	=> 'background-color'
	);
	$tk_colors[] = array( 
		'slug'		=> 'tokopress_headertop_text', 
		'default'	=> '#716a62', 
		'label'		=> __( 'Text Color', 'tokopress' ),
		'section'	=> 'tokopress_headertop_section',
		'transport'	=> 'postMessage',
		'type' 		=> 'color',
		'selector'	=> '.topnav',
		'selector2'	=> '.topnav .topnav-left span, .topnav .topnav-right .topnav-menu + .topnav-social',
		'property'	=> 'color',
		'property2'	=> 'border-color'
	);
	$tk_colors[] = array( 
		'slug'		=> 'tokopress_headertop_link', 
		'default'	=> '#716a62', 
		'label'		=> __( 'Link Color', 'tokopress' ),
		'section'	=> 'tokopress_headertop_section',
		'transport'	=> 'postMessage',
		'type' 		=> 'color',
		'selector'	=> '.topnav .topnav-right .topnav-menu li a, .topnav .topnav-right .topnav-social a',
		'property'	=> 'color'
	);
	$tk_colors[] = array( 
		'slug'		=> 'tokopress_headertop_link_hover', 
		'default'	=> '#DAA520', 
		'label'		=> __( 'Link Hover Color', 'tokopress' ),
		'section'	=> 'tokopress_headertop_section',
		'transport'	=> 'postMessage',
		'type' 		=> 'color',
		'selector'	=> '.topnav .topnav-right .topnav-menu li a:hover, .topnav .topnav-right .topnav-social a:hover, .topnav .topnav-left span i',
		'property'	=> 'color'
	);

	return $tk_colors;

}

/**
 * Header (Block)
 */
add_filter( 'tokopress_customizer_sections', 'tokopress_customize_headerblock_section' );
function tokopress_customize_headerblock_section( $tk_sections ) {
	$tk_sections[] = array(
			'slug'		=> 'tokopress_header_section',
			'label'		=> __( 'Header (Block)', 'tokopress' ),
			'priority'	=> 2,
			'panel_id'	=> 'tokopress_header_panel'
		);

	return $tk_sections;
}

add_filter( 'tokopress_customizer_data', 'tokopress_customize_headerblock_colors' );
function tokopress_customize_headerblock_colors( $tk_colors ) {
	$tk_colors[] = array( 
		'slug'		=> 'tokopress_header_bg', 
		'default'	=> '#efeeea', 
		'label'		=> __( 'Background Color', 'tokopress' ),
		'section'	=> 'tokopress_header_section',
		'transport'	=> 'postMessage',
		'type' 		=> 'color',
		'selector'	=> '.site-header',
		'property'	=> 'background-color'
	);
	$tk_colors[] = array( 
		'slug'		=> 'tokopress_header_text', 
		'default'	=> '#d68024', 
		'label'		=> __( 'Text Color', 'tokopress' ),
		'section'	=> 'tokopress_header_section',
		'transport'	=> 'postMessage',
		'type' 		=> 'color',
		'selector'	=> '.site-header, .site-header .header-links ul li .link-icon',
		'property'	=> 'color'
	);
	$tk_colors[] = array( 
		'slug'		=> 'tokopress_header_link', 
		'default'	=> '#716a62', 
		'label'		=> __( 'Link Color', 'tokopress' ),
		'section'	=> 'tokopress_header_section',
		'transport'	=> 'postMessage',
		'type' 		=> 'color',
		'selector'	=> '.site-header a, .site-header .header-links ul li .link-text',
		'property'	=> 'color'
	);
	$tk_colors[] = array( 
		'slug'		=> 'tokopress_header_link_hover', 
		'default'	=> '#DAA520', 
		'label'		=> __( 'Link Hover Color', 'tokopress' ),
		'section'	=> 'tokopress_header_section',
		'transport'	=> 'postMessage',
		'type' 		=> 'color',
		'selector'	=> '.site-header a:hover, .site-header .header-links ul li a:hover, .site-header .header-links ul li a:hover .link-text, .site-header .header-links ul li a:hover .link-icon',
		'property'	=> 'color'
	);
	$tk_colors[] = array( 
		'slug'		=> 'tokopress_header_sublink_bg', 
		'default'	=> '#ffffff', 
		'label'		=> __( 'Sub Link Background Color', 'tokopress' ),
		'section'	=> 'tokopress_header_section',
		'transport'	=> 'postMessage',
		'type' 		=> 'color',
		'selector'	=> '.site-header .header-links ul li ul.sub-menu',
		'property'	=> 'background-color'
	);
	$tk_colors[] = array( 
		'slug'		=> 'tokopress_header_sublink_text', 
		'default'	=> '#716a62', 
		'label'		=> __( 'Sub Link Color', 'tokopress' ),
		'section'	=> 'tokopress_header_section',
		'transport'	=> 'postMessage',
		'type' 		=> 'color',
		'selector'	=> '.site-header .header-links ul li ul.sub-menu li a',
		'property'	=> 'color'
	);
	$tk_colors[] = array( 
		'slug'		=> 'tokopress_header_sublink_text_hover', 
		'default'	=> '#716a62', 
		'label'		=> __( 'Sub Link Hover Color', 'tokopress' ),
		'section'	=> 'tokopress_header_section',
		'transport'	=> 'postMessage',
		'type' 		=> 'color',
		'selector'	=> '.site-header .header-links ul li ul.sub-menu li a:hover',
		'property'	=> 'color'
	);

	return $tk_colors;
}

/**
 * Header (Main Menu)
 */
add_filter( 'tokopress_customizer_sections', 'tokopress_customize_headermenu_section' );
function tokopress_customize_headermenu_section( $tk_sections ) {
	$tk_sections[] = array(
			'slug'		=> 'tokopress_headermenu_section',
			'label'		=> __( 'Header (Main Menu)', 'tokopress' ),
			'priority'	=> 3,
			'panel_id'	=> 'tokopress_header_panel'
		);

	return $tk_sections;
}

add_filter( 'tokopress_customizer_data', 'tokopress_customize_headermenu_colors' );
function tokopress_customize_headermenu_colors( $tk_colors ) {
	$tk_colors[] = array( 
		'slug'		=> 'tokopress_headermenu_bg', 
		'default'	=> '#ffffff', 
		'label'		=> __( 'Background Color', 'tokopress' ),
		'section'	=> 'tokopress_headermenu_section',
		'transport'	=> 'postMessage',
		'type' 		=> 'color',
		'selector'	=> '.site-menu',
		'property'	=> 'background-color'
	);
	$tk_colors[] = array( 
		'slug'		=> 'tokopress_headermenu_text', 
		'default'	=> '#716a62', 
		'label'		=> __( 'Menu Color', 'tokopress' ),
		'section'	=> 'tokopress_headermenu_section',
		'transport'	=> 'postMessage',
		'type' 		=> 'color',
		'selector'	=> '.site-menu ul.header-menu li > a',
		'property'	=> 'color'
	);
	$tk_colors[] = array( 
		'slug'		=> 'tokopress_headermenu_text_hover', 
		'default'	=> '#c8beb2', 
		'label'		=> __( 'Menu Hover Color', 'tokopress' ),
		'section'	=> 'tokopress_headermenu_section',
		'transport'	=> 'postMessage',
		'type' 		=> 'color',
		'selector'	=> '.site-menu ul.header-menu li > a:hover, .site-menu ul.header-menu li.current-menu-item > a',
		'selector2'	=> '.site-menu ul.header-menu li > a:hover, .site-menu ul.header-menu li.current-menu-item > a',
		'property'	=> 'color',
		'property2'	=> 'border-color'
	);
	$tk_colors[] = array( 
		'slug'		=> 'tokopress_headermenu_sub_bg', 
		'default'	=> '#ffffff', 
		'label'		=> __( 'Sub Menu Background Color', 'tokopress' ),
		'section'	=> 'tokopress_headermenu_section',
		'transport'	=> 'postMessage',
		'type' 		=> 'color',
		'selector'	=> '.site-menu ul.header-menu ul.sub-menu',
		'property'	=> 'background-color'
	);
	$tk_colors[] = array( 
		'slug'		=> 'tokopress_headermenu_sub_text', 
		'default'	=> '#716a62', 
		'label'		=> __( 'Sub Menu Color', 'tokopress' ),
		'section'	=> 'tokopress_headermenu_section',
		'transport'	=> 'postMessage',
		'type' 		=> 'color',
		'selector'	=> '.site-menu ul.header-menu ul.sub-menu li a',
		'property'	=> 'color'
	);
	$tk_colors[] = array( 
		'slug'		=> 'tokopress_headermenu_sub_text_hover', 
		'default'	=> '#DAA520',
		'label'		=> __( 'Sub Menu Hover Color', 'tokopress' ),
		'section'	=> 'tokopress_headermenu_section',
		'transport'	=> 'postMessage',
		'type' 		=> 'color',
		'selector'	=> '.site-menu ul.header-menu ul.sub-menu li a:hover',
		'property'	=> 'color'
	);

	$tk_colors[] = array( 
		'slug'		=> 'tokopress_headermenu_form', 
		'default'	=> '#ffffff',
		'label'		=> __( 'Search Form Background Color', 'tokopress' ),
		'section'	=> 'tokopress_headermenu_section',
		'transport'	=> 'postMessage',
		'type' 		=> 'color',
		'selector'	=> '.site-menu .header-search-form .search-field',
		'property'	=> 'background-color'
	);
	$tk_colors[] = array( 
		'slug'		=> 'tokopress_headermenu_form_border', 
		'default'	=> '#dddddd',
		'label'		=> __( 'Search Form Border Color', 'tokopress' ),
		'section'	=> 'tokopress_headermenu_section',
		'transport'	=> 'postMessage',
		'type' 		=> 'color',
		'selector'	=> '.site-menu .header-search-form .search-field',
		'property'	=> 'border-color'
	);
	$tk_colors[] = array( 
		'slug'		=> 'tokopress_headermenu_form_text', 
		'default'	=> '#716a62',
		'label'		=> __( 'Search Form Color', 'tokopress' ),
		'section'	=> 'tokopress_headermenu_section',
		'transport'	=> 'postMessage',
		'type' 		=> 'color',
		'selector'	=> '.site-menu .header-search-form .search-field, .site-menu .header-search-form .search-submit',
		'property'	=> 'color'
	);

	return $tk_colors;
}

/**
 * Panel Footer
 */
add_filter( 'tokopress_customizer_panels', 'tokopress_customize_footer_panel' );
function tokopress_customize_footer_panel( $tk_panels ) {
	$tk_panels[] = array(
			'ID'			=> 'tokopress_footer_panel',
			'priority'		=> 171,
			'title'			=> __( 'Footer', 'tokopress' ),
			'description'	=> __( 'Customize your footer sections', 'tokopress' )
		);

	return $tk_panels;
}

/**
 * Footer (Top)
 */
add_filter( 'tokopress_customizer_sections', 'tokopress_customize_footertop_section' );
function tokopress_customize_footertop_section( $tk_sections ) {
	$tk_sections[] = array(
			'slug'		=> 'tokopress_footertop_section',
			'label'		=> __( 'Footer (Top)', 'tokopress' ),
			'priority'	=> 1,
			'panel_id'	=> 'tokopress_footer_panel'
		);

	return $tk_sections;
}

add_filter( 'tokopress_customizer_data', 'tokopress_customize_footertop_colors' );
function tokopress_customize_footertop_colors( $tk_colors ) {
	$tk_colors[] = array( 
		'slug'		=> 'tokopress_footertop_bg', 
		'default'	=> '#efeeea', 
		'label'		=> __( 'Background Color', 'tokopress' ),
		'section'	=> 'tokopress_footertop_section',
		'transport'	=> 'postMessage',
		'type' 		=> 'color',
		'selector'	=> '.footer-widgets-top',
		'property'	=> 'background-color'
	);

	return $tk_colors;
}

/**
 * Footer (Middle)
 */
add_filter( 'tokopress_customizer_sections', 'tokopress_customize_footermiddle_section' );
function tokopress_customize_footermiddle_section( $tk_sections ) {
	$tk_sections[] = array(
			'slug'		=> 'tokopress_footermiddle_section',
			'label'		=> __( 'Footer (Middle)', 'tokopress' ),
			'priority'	=> 2,
			'panel_id'	=> 'tokopress_footer_panel'
		);

	return $tk_sections;
}

add_filter( 'tokopress_customizer_data', 'tokopress_customize_footermiddle_colors' );
function tokopress_customize_footermiddle_colors( $tk_colors ) {
	$tk_colors[] = array( 
		'slug'		=> 'tokopress_footermiddle_bg', 
		'default'	=> '#ffffff', 
		'label'		=> __( 'Background Color', 'tokopress' ),
		'section'	=> 'tokopress_footermiddle_section',
		'transport'	=> 'postMessage',
		'type' 		=> 'color',
		'selector'	=> '.footer-widgets-bottom',
		'property'	=> 'background-color'
	);

	return $tk_colors;
}

/**
 * Footer (Bottom)
 */
add_filter( 'tokopress_customizer_sections', 'tokopress_customize_footerbottom_section' );
function tokopress_customize_footerbottom_section( $tk_sections ) {
	$tk_sections[] = array(
			'slug'		=> 'tokopress_footerbottom_section',
			'label'		=> __( 'Footer (Bottom)', 'tokopress' ),
			'priority'	=> 3,
			'panel_id'	=> 'tokopress_footer_panel'
		);

	return $tk_sections;
}

add_filter( 'tokopress_customizer_data', 'tokopress_customize_footerbottom_colors' );
function tokopress_customize_footerbottom_colors( $tk_colors ) {
	$tk_colors[] = array( 
		'slug'		=> 'tokopress_footerbottom_bg', 
		'default'	=> '#ffffff', 
		'label'		=> __( 'Background Color', 'tokopress' ),
		'section'	=> 'tokopress_footerbottom_section',
		'transport'	=> 'postMessage',
		'type' 		=> 'color',
		'selector'	=> '.site-footer',
		'property'	=> 'background-color'
	);

	return $tk_colors;
}