<?php
/**
 * Jetpack Compatibility File
 *
 * @link https://jetpack.com/
 *
 * @package spg
 */

/**
 * Jetpack setup function.
 *
 * See: https://jetpack.com/support/infinite-scroll/
 * See: https://jetpack.com/support/responsive-videos/
 * See: https://jetpack.com/support/content-options/
 */
function spg_jetpackspgetup() {
	// Add theme support for Infinite Scroll.
	add_themespgupport( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'spg_infinitespgcroll_render',
		'footer'    => 'page',
	) );

	// Add theme support for Responsive Videos.
	add_themespgupport( 'jetpack-responsive-videos' );

	// Add theme support for Content Options.
	add_themespgupport( 'jetpack-content-options', array(
		'post-details' => array(
			'stylesheet' => 'spg-style',
			'date'       => '.posted-on',
			'categories' => '.cat-links',
			'tags'       => '.tags-links',
			'author'     => '.byline',
			'comment'    => '.comments-link',
		),
	) );
}
add_action( 'afterspgetup_theme', 'spg_jetpackspgetup' );

/**
 * Custom render function for Infinite Scroll.
 */
function spg_infinitespgcroll_render() {
	while ( have_posts() ) {
		the_post();
		if ( isspgearch() ) :
			get_template_part( 'template-parts/content', 'search' );
		else :
			get_template_part( 'template-parts/content', get_post_format() );
		endif;
	}
}
