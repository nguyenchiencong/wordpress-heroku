<?php
/**
 * Adds custom classes to the array of body classes.
 */
function dw_minion_body_classes( $classes ) {
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'dw_minion_body_classes' );

/**
 * Filters wp_title to print a neat <title> tag based on what is being viewed.
 */
function dw_minion_wp_title( $title, $sep ) {
	global $page, $paged;

	if ( is_feed() )
		return $title;

	$title .= get_bloginfo( 'name' );

	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title .= " $sep $site_description";

	if ( $paged >= 2 || $page >= 2 )
		$title .= " $sep " . sprintf( __( 'Page %s', 'dw-minion' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'dw_minion_wp_title', 10, 2 );

/**
 * Display Logo
 */
function dw_minion_logo() {
  $header_display = (dw_minion_get_theme_option( 'header_display', 'site_title') == 'site_title') ? 'display-title' : 'display-logo';
  $logo = dw_minion_get_theme_option( 'logo' );
  $tagline = dw_minion_get_theme_option( 'about', get_bloginfo( 'description' ) );

  echo '<h1 class="site-title '.$header_display.'"><a href="'.esc_url( home_url( '/' ) ).'" title="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'" rel="home">';
  if ($header_display == 'display-logo') {
    echo '<img alt="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'" src="'.$logo.'" />';
  } else {
    echo get_bloginfo( 'name' );
  }
  echo '</a></h1>';

  echo '<h2 class="site-description">'.$tagline.'</h2>';
}

/**
 * Site Actions
 */
add_action('after_navigation', 'dw_minion_site_actions');
function dw_minion_site_actions() {
  $social_links['facebook'] = dw_minion_get_theme_option( 'facebook', '' );
  $social_links['twitter'] = dw_minion_get_theme_option( 'twitter', '' );
  $social_links['google_plus'] = dw_minion_get_theme_option( 'google_plus', '' );
  $social_links['youtube'] = dw_minion_get_theme_option( 'youtube', '' );
  $social_links['linkedin'] = dw_minion_get_theme_option( 'linkedin', '' );
  ?>
        <div id="actions" class="site-actions clearfix">
            <div class="action show-site-nav">
                <i class="icon-reorder"></i>
            </div>

            <div class="clearfix actions">
                <div class="action search">
                    <form onsubmit="doSearch(this.searchTerm.value); return false;" class="action searchform">
                        <input type="text" placeholder="Search" id="s" name="s" class="search-query">
                        <label for="s"></label>
                    </form>
                </div>
                
                <a class="back-top action" href="#page"><i class="icon-chevron-up"></i></a>

                <?php ?>

                <div class="action socials">
                    <i class="icon-link active-socials"></i>
                    <?php if(count($social_links) > 0 ) { ?><ul class="unstyled list-socials clearfix" style="width: <?php echo count($social_links)*40; ?>px;">
                        <?php if($social_links['facebook']!='') { ?><li class="social"><a href="<?php echo $social_links['facebook']; ?>"><i class="icon-facebook"></i></a></li><?php } ?>
                        <?php if($social_links['twitter']!='') { ?><li class="social"><a href="<?php echo $social_links['twitter']; ?>"><i class="icon-twitter"></i></a></li><?php } ?>
                        <?php if($social_links['google_plus']!='') { ?><li class="social"><a href="<?php echo $social_links['google_plus']; ?>"><i class="icon-google-plus"></i></a></li><?php } ?>
                        <?php if($social_links['youtube']!='') { ?><li class="social"><a href="<?php echo $social_links['youtube']; ?>"><i class="icon-youtube"></i></a></li><?php } ?>
                        <?php if($social_links['linkedin']!='') { ?><li class="social"><a href="<?php echo $social_links['linkedin']; ?>"><i class="icon-linkedin"></i></a></li><?php } ?>
                    </ul><?php } ?>
                </div>
            </div>
        </div>
<?php }

/**
 * Filters post_gallery to display gallery as carousel.
 */

add_filter( 'post_gallery', 'dw_minion_post_gallery', 10, 2 );
function dw_minion_post_gallery( $output, $attr) {
  global $post, $wp_locale;

  static $instance = 0;
  $instance++;

  if ( isset( $attr['orderby'] ) ) {
      $attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
      if ( !$attr['orderby'] )
          unset( $attr['orderby'] );
  }

  extract(shortcode_atts(array(
      'order'      => 'ASC',
      'orderby'    => 'menu_order ID',
      'id'         => $post->ID,
      'itemtag'    => 'div',
      'icontag'    => 'div',
      'captiontag' => 'div',
      'columns'    => 3,
      'size'       => array(620,350),
      'include'    => '',
      'exclude'    => ''
  ), $attr));

  $id = intval($id);
  if ( 'RAND' == $order )
      $orderby = 'none';

  if ( !empty($include) ) {
      $include = preg_replace( '/[^0-9,]+/', '', $include );
      $_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );

      $attachments = array();
      foreach ( $_attachments as $key => $val ) {
          $attachments[$val->ID] = $_attachments[$key];
      }
  } elseif ( !empty($exclude) ) {
      $exclude = preg_replace( '/[^0-9,]+/', '', $exclude );
      $attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
  } else {
      $attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
  }

  if ( empty($attachments) )
      return '';

  if ( is_feed() ) {
      $output = "\n";
      foreach ( $attachments as $att_id => $attachment )
          $output .= wp_get_attachment_link($att_id, $size, true) . "\n";
      return $output;
  }

	$itemtag = tag_escape($itemtag);
	$selector = "carousel-{$instance}";
	$captiontag = tag_escape($captiontag);

  $output = "<div class='entry-gallery'>";

	$output .= "<div id='{$selector}' class='carousel slide carousel-{$id}'>";

	$output .= "<ol class='carousel-indicators'>";
	$j = 0;
  foreach ( $attachments as $id => $attachment ) {
  	$itemclass = ($j==0) ? 'active' : '';
  	$output .= "<li class='{$itemclass}' data-slide-to='{$j}' data-target='#{$selector}'></li>";
  	$j++;
  }
  $output .= "</ol>";

	$i = 0;
  $output .= "<div class='carousel-inner'>";
  foreach ( $attachments as $id => $attachment ) {
  	$itemclass = ($i==0) ? 'item active' : 'item';
  	$link = isset($attr['link']) && 'file' == $attr['link'] ? wp_get_attachment_link($id, $size, false, false) : wp_get_attachment_link($id, $size, true, false);

  	$output .= "<{$itemtag} class='{$itemclass}'>";
  	$output .= "
      <{$icontag} class='carousel-icon'>
        $link
      </{$icontag}>";

  	if ( $captiontag && trim($attachment->post_excerpt) ) {
      $output .= "
        <{$captiontag} class='carousel-caption'>
        " . wptexturize($attachment->post_excerpt) . "
        </{$captiontag}>";
    }
  	$output .= "</{$itemtag}>";
  	$i++;
  }
  $output .= "</div>";
  $output .= "<a data-slide='prev' href='#{$selector}' class='carousel-control left'><i class='icon-chevron-left'></i></a>";
  $output .= "<a data-slide='next' href='#{$selector}' class='carousel-control right'><i class='icon-chevron-right'></i></a>";
  
  $output .= "</div>";
  $output .= "</div>";
  return $output;
}

/**
 * Remove #more Anchor from Permalinks
 */
add_filter('the_content_more_link', 'remove_more_jump_link');
function remove_more_jump_link($link) { 
  $offset = strpos($link, '#more-');
  if ($offset) { $end = strpos($link, '"',$offset); }
  if ($end) { $link = substr_replace($link, '', $offset, $end-$offset); }
  return $link;
}