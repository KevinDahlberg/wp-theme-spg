<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package spg
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'spg' ); ?></a>

	<header id="masthead" class="site-header">

		<?php get_template_part( 'template-parts/header/header', 'image' ); ?>

		<?php get_template_part( 'template-parts/header/', 'site-branding' ); ?>

		<nav id="site-navigation" class="navbar navbar-toggleable-md navbar-light bg-faded">

			<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
			  </button>
			<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
			<?php
				wp_nav_menu( array(
					'container'=> 'div',
					'container_class'=>'collapse navbar-collapse',
					'container_id'=>'navbarNav',
					'menu_class'=> false,
					'theme_location' => 'menu-1'
				) );
			?>
		</nav><!-- #site-navigation -->

	</header><!-- #masthead -->
