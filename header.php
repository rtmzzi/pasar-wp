<!DOCTYPE HTML>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?> ><![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8 ie7" <?php language_attributes(); ?> ><![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9 ie8" <?php language_attributes(); ?> ><![endif]-->
<!--[if gt IE 8]> <html class="no-js ie9" <?php language_attributes(); ?> ><![endif]-->
<html <?php language_attributes(); ?>>
<head>
	<meta charset="utf-8" />
	<title>yumm - comida por encomenda</title>
	
	<meta name="viewport" content="width=device-width, minimum-scale=0.25, maximum-scale=1.6, initial-scale=1.0" /> 
	<meta name="apple-mobile-web-app-capable" content="yes" />
	
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    
	<?php wp_head(); ?>
</head>
<body <?php body_class('cms tokopress-themes sticky-header-yes'); ?> >
	
<div class="site-container sb-site-container">
	<!-- Top Navigation -->	
	<?php if( !of_get_option( 'topnav_disable' ) ) get_template_part( 'block-topnav' ); ?>
	<!-- Header Menu-->	
	<?php if( !of_get_option( 'header_disable' ) ) get_template_part( 'block-header' ); ?>
	<!-- Header Menu-->	
	<?php if( !of_get_option( 'menu_disable' ) ) get_template_part( 'block-header-menu' ); ?>
    <?php get_template_part( 'block-carrossel' ); ?>
