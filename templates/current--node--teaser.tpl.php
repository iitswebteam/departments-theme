<article id="article-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix teaser"<?php print $attributes; ?>>
  <?php
    print $unpublished;
  ?>

  <?php
    // Display an image teaser (either the landscape one or the portrait if available)
    if( array_key_exists( 'field_summary_image', $content ) ) {
      print render( $content[ 'field_summary_image' ] );
    } else if ( array_key_exists( 'field_list_page_image', $content ) ) {
      print render( $content[ 'field_list_page_image' ] );
    } else if ( array_key_exists( 'field_portrait_image', $content ) ) {
      print render( $content[ 'field_portrait_image' ] );
    } 
  ?>

  <div<?php print $content_attributes; ?>>
  <?php
    if ($title && !$page):
      print render( $title_prefix ); ?>
      <h3<?php print $title_attributes; ?>>
        <a href="<?php print $node_url; ?>" rel="bookmark"><?php print $title; ?></a>
      </h3>
  <?php endif;
    print render( $title_suffix );

    // hide unwanted fields
    hide( $content[ 'comments' ] );
    hide( $content[ 'links' ] );
    hide ($content['node-readmore']);
  if( array_key_exists( 'field_summary_image', $content ) ) {
      hide( $content[ 'field_portrait_image' ] );
      hide( $content[ 'field_list_page_image' ] );
    } else if ( array_key_exists( 'field_portrait_image', $content ) ) {
      hide( $content[ 'field_portrait_image' ] );
    } else if ( array_key_exists( 'field_list_page_image', $content ) ) {
      hide( $content[ 'field_list_page_image' ] );
    } 
    print render( $content );
  ?>
  </div>
</article>