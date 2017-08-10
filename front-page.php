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
  <div id="about-panel" class="row justify-content-cente">
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
        <div class="col-lg-6 text-columns">
          <?php echo $content; ?>
        </div>
            <?php } ?>
      </div>
    </div>
  </div>
</div>
<?php
get_footer();
?>
