<!DOCTYPE HTML>
<html <?php language_attributes(); ?> class="no-js">
<head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-109586530-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-109586530-1');
</script>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no">
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_template_directory_uri(); ?>/images/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_template_directory_uri(); ?>/images/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/images/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_template_directory_uri(); ?>/images/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/images/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_template_directory_uri(); ?>/images/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/images/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_template_directory_uri(); ?>/images/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/images/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo get_template_directory_uri(); ?>/images/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo get_template_directory_uri(); ?>/images/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/images/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/images/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <?php wp_head();?>
    <title><?php wp_title(' '); ?></title>
    <style>
    	.displayOff {
    		display: none!important;
    	}
    </style>

</head>
<body <?php body_class(); ?>>
  <?php
  $facebook_link = get_field( 'facebook_link', 'option' );
  $vk_link_header = get_field( 'vk_link_header', 'option' );
  $twitter_link_header = get_field( 'twitter_link_header', 'option' );
  $czat_image_header = get_field( 'czat_image_header', 'option' );
  ?>
  <?php
  $class = null;
  if ( is_front_page() ) {
    $class = 'front-page-menu';
  }  else {
    $class = 'other-page-menu';
  }
  ?>
    <div class="wrapper-header <?php echo $class ?>">
    	<div class="container-fluid">
	        <div class="row">
	        <div class="up-menu clearfix">
            <div class="drawer drawer--left">
                 <button type="button" class="drawer-toggle drawer-hamburger">
                        <span class="sr-only">toggle navigation</span>
                        <span class="drawer-hamburger-icon"></span>
                 </button>
              <div class="menu" >
                <nav class="drawer-nav" role="navigation">
                <ul class="drawer-menu">
                <h6></h6>
                 <?php $defaults = array(
                  'theme_location'  => 'primary-menu',
                  'container'       => false,
                  'menu_class'      => 'drawer-menu nav mobile-menu',
                  'menu_id'         => '',
                  'fallback_cb'     => 'wp_page_menu',
                  'before'          => '',
                  'after'           => '',
                  'link_before'     => '',
                  'link_after'      => '',
                  'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
                );
                wp_nav_menu( $defaults ); ?>
                <div class="czat-online">
                  <a class="czat" href="#"><img src="<?php echo $czat_image_header ?>" alt="czat"><?php echo pll__( 'Czat online' ); ?></a>
                </div>
                <div class="search-container">
                  <?php get_search_form(); ?>
                  <?php   if ( is_front_page() ) { ?>
                      <img class="search-click" src="<?php bloginfo('template_url'); ?>/images/search-white.png" alt="search">
                  <?php }  else { ?>
                    <img class="search-click" src="<?php bloginfo('template_url'); ?>/images/search-red.png" alt="search">
                  <?php }  ?>
                </div>
                <div class="social-container">
                  <?php
                  if ( is_front_page() ) { ?>
                      <a target="_blank" href="<?php echo $facebook_link ?>"><img src="<?php bloginfo('template_url'); ?>/images/social-facebook-white.png" alt="fb"></a>
                  <?php }  else {?>
                      <a target="_blank" href="<?php echo $facebook_link ?>"><img src="<?php bloginfo('template_url'); ?>/images/social-facebook-black.png" alt="fb"></a>
                  <?php }
                  if ( is_front_page() ) { ?>
                      <a target="_blank" href="<?php echo $vk_link_header ?>"><img src="<?php bloginfo('template_url'); ?>/images/social-vk-big-white.png" alt="fb"></a>
                  <?php }  else {?>
                      <a target="_blank" href="<?php echo $vk_link_header ?>"><img src="<?php bloginfo('template_url'); ?>/images/social-vk-black.png" alt="fb"></a>
                  <?php }
                  if ( is_front_page() ) { ?>
                      <a target="_blank" href="<?php echo $twitter_link_header ?>"><img src="<?php bloginfo('template_url'); ?>/images/social-twitter-big-white.png" alt="twitter"></a>
                  <?php }  else {?>
                      <a target="_blank" href="<?php echo $twitter_link_header ?>"><img src="<?php bloginfo('template_url'); ?>/images/social-twitter-black.png" alt="twitter"></a>
                  <?php }
                  ?>
                </div>
               </div>
               <div class="logo_header">
                 <?php
                 $logo_header = get_field( 'logo_header', 'option' );
                 $logo_mobile = get_field( 'logo_mobile', 'option' );
                 ?>
                 <?php
                 $class = null;
                 if ( is_front_page() ) {
                   $class = $logo_header;
                 }  else {
                   $class = $logo_mobile;
                 }
                 ?>
                 <?php
                 if ( !empty( $logo_header ) ) { ?>
                   <a class="logo-1" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <img src="<?php echo esc_url( $class ); ?>" alt="logo">
                  </a>
                  <a class="logo-2" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                   <img src="<?php bloginfo('template_url'); ?>/images/logo.png" alt="logo">
                 </a>
                 <?php }  ?>
               </div>
               <div class="lang-container polylang-mobile">
                   <ul>
	                   <?php pll_the_languages(); ?>
	                   <li class="lang-item"><a href="https://www.worksol.pl/">PL</a></li>
	                   <li class="lang-item"><a href="https://www.worksol.pl/en/">EN</a></li>
	                   <li class="lang-item"><a href="https://www.worksol.pl/ru/">RU</a></li>
                   </ul>
               </div>
                </ul>
          </nav>
          </div>
              <div class="lang-container">
                    <ul>
	                   <?php pll_the_languages(); ?>
	                   <li class="lang-item"><a href="https://www.worksol.pl/">PL</a></li>
	                   <li class="lang-item"><a href="https://www.worksol.pl/en/">EN</a></li>
	                   <li class="lang-item"><a href="https://www.worksol.pl/ru/">RU</a></li>
                    </ul>
              </div>
              <div class="social-container">
                <?php
                if ( is_front_page() ) { ?>
                    <a target="_blank" href="<?php echo $facebook_link ?>"><img src="<?php bloginfo('template_url'); ?>/images/social-facebook-white.png" alt="fb"></a>
                <?php }  else {?>
                    <a target="_blank" href="<?php echo $facebook_link ?>"><img src="<?php bloginfo('template_url'); ?>/images/social-facebook-black.png" alt="fb"></a>
                <?php }
                if ( is_front_page() ) { ?>
                    <a target="_blank" href="<?php echo $vk_link_header ?>"><img src="<?php bloginfo('template_url'); ?>/images/social-vk-big-white.png" alt="fb"></a>
                <?php }  else {?>
                    <a target="_blank" href="<?php echo $vk_link_header ?>"><img src="<?php bloginfo('template_url'); ?>/images/social-vk-black.png" alt="fb"></a>
                <?php }
                if ( is_front_page() ) { ?>
                    <a target="_blank" href="<?php echo $twitter_link_header ?>"><img src="<?php bloginfo('template_url'); ?>/images/social-twitter-big-white.png" alt="twitter"></a>
                <?php }  else {?>
                    <a target="_blank" href="<?php echo $twitter_link_header ?>"><img src="<?php bloginfo('template_url'); ?>/images/social-twitter-black.png" alt="twitter"></a>
                <?php }
                ?>
              </div>
              <div class="czat-online">
                <a class="czat" href="#"><img src="<?php echo $czat_image_header ?>" alt="">Czat online</a>
              </div>
              <div class="search-container">
                <?php get_search_form(); ?>
                <?php   if ( is_front_page() ) { ?>
                    <img class="search-click" src="<?php bloginfo('template_url'); ?>/images/search-white.png" alt="search">
                <?php }  else { ?>
                  <img class="search-click" src="<?php bloginfo('template_url'); ?>/images/search-red.png" alt="search">
                <?php }  ?>
              </div>
			       </div>
           </div>
        </div>
          <div class="navigation-container clearfix">
            <div class="container">
              <div class="row">
            <div class="col-xs-2 logo_header">
              <?php
              $logo_header = get_field( 'logo_header', 'option' );
              $logo_mobile = get_field( 'logo_mobile', 'option' );
              ?>
              <?php
              $class = null;
              if ( is_front_page() ) {
                $class = $logo_header;
              }  else {
                $class = $logo_mobile;
              }
              ?>
              <?php
              if ( !empty( $logo_header ) ) { ?>
                <a class="logo-1" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                 <img src="<?php echo esc_url( $class ); ?>" alt="logo">
               </a>
              <?php }  ?>
              <a class="logo-2" href="<?php echo esc_url( home_url( '/' ) ); ?>">
               <img src="<?php bloginfo('template_url'); ?>/images/logo.png" alt="logo">
             </a>
            </div>
            <div class="col-xs-10">
            <div class="navigation">
              <div class="menu">
               <?php $defaults = array(
                'theme_location'  => 'primary-menu',
                'container'       => false,
                'menu_class'      => 'navigation',
                'menu_id'         => '',
                'fallback_cb'     => 'wp_page_menu',
                'before'          => '',
                'after'           => '',
                'link_before'     => '',
                'link_after'      => '',
                'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
              );
              wp_nav_menu( $defaults ); ?>
             </div>
            </div>
           </div>
          </div>
        </div>
      </div>
    </div>
    <div class="wrapper-header scroll-menu">
    	<div class="container-fluid">
	        <div class="row">
	        <div class="up-menu clearfix">
            <div class="drawer drawer--left">
                 <button type="button" class="drawer-toggle drawer-hamburger">
                        <span class="sr-only">toggle navigation</span>
                        <span class="drawer-hamburger-icon"></span>
                 </button>
              <div class="menu" >
                <nav class="drawer-nav" role="navigation">
                <ul class="drawer-menu">
                <h6></h6>
                 <?php $defaults = array(
                  'theme_location'  => 'primary-menu',
                  'container'       => false,
                  'menu_class'      => 'drawer-menu nav mobile-menu',
                  'menu_id'         => '',
                  'fallback_cb'     => 'wp_page_menu',
                  'before'          => '',
                  'after'           => '',
                  'link_before'     => '',
                  'link_after'      => '',
                  'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
                );
                wp_nav_menu( $defaults ); ?>
                <div class="czat-online">
                  <a class="czat" href="#"><img src="<?php echo $czat_image_header ?>" alt="czat"><?php echo pll__( 'Czat online' ); ?></a>
                </div>
                <div class="search-container">
                  <?php get_search_form(); ?>
                  <?php   if ( is_front_page() ) { ?>
                      <img class="search-click" src="<?php bloginfo('template_url'); ?>/images/search-white.png" alt="search">
                  <?php }  else { ?>
                    <img class="search-click" src="<?php bloginfo('template_url'); ?>/images/search-red.png" alt="search">
                  <?php }  ?>
                </div>
                <div class="social-container">
                  <?php
                  if ( is_front_page() ) { ?>
                      <a target="_blank" href="<?php echo $facebook_link ?>"><img src="<?php bloginfo('template_url'); ?>/images/social-facebook-white.png" alt="fb"></a>
                  <?php }  else {?>
                      <a target="_blank" href="<?php echo $facebook_link ?>"><img src="<?php bloginfo('template_url'); ?>/images/social-facebook-black.png" alt="fb"></a>
                  <?php }
                  if ( is_front_page() ) { ?>
                      <a target="_blank" href="<?php echo $vk_link_header ?>"><img src="<?php bloginfo('template_url'); ?>/images/social-vk-big-white.png" alt="fb"></a>
                  <?php }  else {?>
                      <a target="_blank" href="<?php echo $vk_link_header ?>"><img src="<?php bloginfo('template_url'); ?>/images/social-vk-black.png" alt="fb"></a>
                  <?php }
                  if ( is_front_page() ) { ?>
                      <a target="_blank" href="<?php echo $twitter_link_header ?>"><img src="<?php bloginfo('template_url'); ?>/images/social-twitter-big-white.png" alt="twitter"></a>
                  <?php }  else {?>
                      <a target="_blank" href="<?php echo $twitter_link_header ?>"><img src="<?php bloginfo('template_url'); ?>/images/social-twitter-black.png" alt="twitter"></a>
                  <?php }
                  ?>
                </div>
               </div>
               <div class="logo_header">
                 <?php
                 $logo_header = get_field( 'logo_header', 'option' );
                 $logo_mobile = get_field( 'logo_mobile', 'option' );
                 ?>
                 <?php
                 $class = null;
                 if ( is_front_page() ) {
                   $class = $logo_header;
                 }  else {
                   $class = $logo_mobile;
                 }
                 ?>
                 <?php
                 if ( !empty( $logo_header ) ) { ?>
                   <a class="logo-1" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <img src="<?php echo esc_url( $class ); ?>" alt="logo">
                  </a>
                  <a class="logo-2" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                   <img src="<?php bloginfo('template_url'); ?>/images/logo.png" alt="logo">
                 </a>
                 <?php }  ?>
               </div>
               <div class="lang-container polylang-mobile">
                    <ul>
	                   <?php pll_the_languages(); ?>
	                   <li class="lang-item"><a href="https://www.worksol.pl/">PL</a></li>
	                   <li class="lang-item"><a href="https://www.worksol.pl/en/">EN</a></li>
	                   <li class="lang-item"><a href="https://www.worksol.pl/ru/">RU</a></li>
                   </ul>
               </div>
                </ul>
          </nav>
          </div>
			       </div>
           </div>
        </div>
          <div class="navigation-container clearfix">
            <div class="container">
              <div class="row">
                <div class="col-xs-2 logo_header">
                  <?php
                  $logo_header = get_field( 'logo_header', 'option' );
                  $logo_mobile = get_field( 'logo_mobile', 'option' );
                  ?>
                  <?php
                  $class = null;
                  if ( is_front_page() ) {
                    $class = $logo_header;
                  }  else {
                    $class = $logo_mobile;
                  }
                  ?>
                  <?php
                  if ( !empty( $logo_header ) ) { ?>
                    <a class="logo-1" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                     <img src="<?php echo esc_url( $class ); ?>" alt="logo">
                   </a>
                  <?php }  ?>
                  <a class="logo-2" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                   <img src="<?php bloginfo('template_url'); ?>/images/logo.png" alt="logo">
                 </a>
                </div>
                <div class="col-xs-10">
                  <div class="navigation" >
                    <div class="menu">
                     <?php $defaults = array(
                      'theme_location'  => 'primary-menu',
                      'container'       => false,
                      'menu_class'      => 'navigation',
                      'menu_id'         => '',
                      'fallback_cb'     => 'wp_page_menu',
                      'before'          => '',
                      'after'           => '',
                      'link_before'     => '',
                      'link_after'      => '',
                      'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
                    );
                    wp_nav_menu( $defaults ); ?>
                   </div>
                  </div>
               </div>

          </div>
        </div>
      </div>
    </div>
