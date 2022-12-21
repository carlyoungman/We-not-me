<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <title><?php wp_title(); ?></title>
	<meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/dist/assets/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/dist/assets/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/dist/assets/favicons/favicon-16x16.png">
    <link rel="mask-icon" href="<?php echo get_template_directory_uri(); ?>/dist/assets/favicons/safari-pinned-tab.svg" color="#FFFFFF">
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/dist/assets/favicons/favicon.ico">
    <link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/dist/assets/favicons//site.webmanifest">
    <meta name="msapplication-config" content="<?php echo get_template_directory_uri(); ?>/dist/assets/favicons/browserconfig.xml">
	<meta name="theme-color" content="#FFFFFF">
<?php wp_head(); $theme = get_field('page_background_colour'); ?>
</head>
<body <?php body_class($theme); ?>>
  <header>
    <?php
      include(get_template_directory() . '/components/navigation.php');
       include(get_template_directory() . '/components/social-media-panel.php');
       include(get_template_directory() . '/components/contact.php');
       include(get_template_directory() . '/components/video-player.php');
       include(get_template_directory() . '/components/landing-screen.php');
      ?>
  </header>
 <?php include(get_template_directory() . '/components/cursor.php'); ?>
<main id="main" class="site-main" role="main">
