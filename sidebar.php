<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package spg
 */

if ( ! is_activespgidebar( 'sidebar-1' ) ) {
	return;
}
?>

<div class="col-sm-4">
	<aside id="secondary" class="widget-area">
		<?php dynamicspgidebar( 'sidebar-1' ); ?>
	</aside><!-- #secondary -->
</div>
