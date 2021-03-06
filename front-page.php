<?php
/**
 * Template part for displaying the static front page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package spg
 */

get_header(); ?>

<div class="container-fluid">
  <div id="about-panel" class="row justify-content-center">
    <div class="col">
      <div class="row">
        <div class="col-lg-4">
          <div class="row">
            <div class="col">
              <?php
                $mypages = get_pages( array( 'child_of' => $post->ID ) );
                //get's pages that are children of the home page
                foreach( $mypages as $page ) {
                  $content = $page->post_content;
                    if ( ! $content ) // Check for empty page
                      continue;
                    $content = apply_filters( 'the_content', $content );
              ?>

              <h2><a href="<?php echo get_page_link( $page->ID ); ?>"><?php echo $page->post_title; ?></a></h2>
            </div>
          </div>
         <div class="row">
           <div class="col about-image">
             <?php echo get_the_post_thumbnail( $page->ID, 'full', ['class' => 'img-fluid about-image']); ?>
           </div>
         </div>
     </div>
        <div class="col-lg-8 text-columns">
          <?php echo $content; ?>
        </div>
            <?php } ?>
      </div>
    </div>
  </div>
<!-- need to change image on this before deployment-->
  <div id="shows-panel" class="row">
      <div id="shows-panel-image">
          <?php the_custom_header_markup(); ?>
      </div>

    <div id="shows-content" class="row">
      <div class="col-md-6">
      </div>
      <div class="col-md-6">
        <h1>Show Dates</h1>
        <?php
              $num = 1;
              $showposts = get_posts( array(
                'post_type' => 'show',
                'posts_per_page' => 10,
          	     'offset' => 0,
                'orderby' => 'date',
                'order' => 'ASC'));
              foreach( $showposts as $show ) {
                setup_postdata( $show );
                ?>
                <div class="row">
                  <div class="col">
                <?php
                echo $show->post_title;
                ?>
                 -
                <?php
                echo get_post_meta($show->ID, 'location_meta', true);

              ?>
            </div>
            </div>
            <?php

                $num++;
              }
              wp_reset_postdata();
          ?>
      </div>
    </div>
  <div id="merch-panel" class="row">
    <div class="col">
    </div>
  </div>
</div>
<?php
get_footer();
?>
