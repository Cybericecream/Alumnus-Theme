<?php
/**
 * The template for displaying the header
 *
 * This is the template that displays all of the <head> section
 *
 */
?>

<!doctype html>

  <html class="no-js"  <?php language_attributes(); ?>>

	<head>
		<meta charset="utf-8">
		
		<!-- Force IE to use the latest rendering engine available -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<!-- Mobile Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta class="foundation-mq">
		
		<!-- If Site Icon isn't set in customizer -->
		<?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) { ?>
			<!-- Icons & Favicons -->
			<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
			<link href="<?php echo get_template_directory_uri(); ?>/assets/images/apple-icon-touch.png" rel="apple-touch-icon" />	
	    <?php } ?>

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<?php wp_head(); ?>

	</head>
    
    <body <?php body_class(); ?>>
        <div id="mobileMenu" class="mobileNavMenu" data-off-canvas data-transition="overlap">
            <div class="mobileNavMenu-inner">
            <button class="mobileNavMenu-close" aria-label="Close menu" type="button" data-close>
                <span aria-hidden="true">&times;</span>
            </button>

            <ul class="mobileNavMenu-menu">
                    <?php wp_nav_menu(
                                array(
                                    'menu' => 'primary',
                                    'link_before' => '<span class="screen-reader-text">',
                                    'link_after' => '</span>',
                                )
                            );?>
            </ul>
            </div>
        </div>
        <header>
            <div class="grid-x">
                <div class="top-bar cell medium-12 small-12 grid-x">
                    <div class="cell small-6">
                        <h1><?php echo get_bloginfo( 'name' ); ?></h1>
                    </div>
                    <div class="desktopNav menu-hover cell small-6">
                        <ul class="menu text-right">
                            <?php wp_nav_menu(
                                array(
                                    'menu' => 'primary',
                                    'link_before' => '<span class="screen-reader-text">',
                                    'link_after' => '</span>',
                                )
                                );?>
                        </ul>
                    </div>
                    <div class="mobileNav cell small-6">
                        <button class="menu-icon dark" type="button" data-toggle="mobileMenu"></button>
                    </div>
                </div>
            </div>
        </header>
