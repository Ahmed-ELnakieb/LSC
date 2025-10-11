<?php

function eergx_body_class($classes){

        if (is_page()) {
            global $post;
            $pid = $post->ID;
            $meta = get_post_meta($pid, '_orixy_meta', 'true');
            $style_class = isset($meta['style']) && $meta['style'] ? $meta['style'] : '';
            $classes[] = $style_class;
        } else {
            $classes[] = 'ori-inner-page';
        }
        return $classes;
}
add_filter('body_class', 'eergx_body_class');


function get_wp_image($source){
  if (isset($source)){
      $image =  wp_get_attachment_image( $source['id'], 'full' );
  }
  return $image;

}

function king_menu_select_choices() {
  $menus = wp_get_nav_menus();
  $items = array();
  $i     = 0;
  foreach ( $menus as $menu ) {
      if ( $i == 0 ) {
          $default = $menu->slug;
          $i ++;
      }
      $items[ $menu->slug ] = $menu->name;
  }

  return $items;
}


function client_ratings($count){
  $out = '';
  for ($i=0; $i<$count; $i++) {
      $out.= '<li><i class="fas fa-star"></i></li>';
  }
  return $out;
}

function get_that_link($link){

  $url = $link['url'] ? 'href='.esc_url($link['url']). '' : '';
  $ext = $link['is_external'] ? 'target= _blank' : '';
  $nofollow = $link['nofollow'] ? 'rel="nofollow"' : '';
  $link = $url.' '.$ext.' '.$nofollow;
  return $link;
}

function get_that_image($source){
  if ($source){
      $image = '<img src="'. esc_url( $source['url'] ).'" alt="'.get_bloginfo( 'name' ).'">';
  }
  return $image;
}

/**
 * All Category List
 */
function eergx_blog_category (){
  $terms = get_terms( array(
      'taxonomy'    => 'category',
      'hide_empty'  => true
  ) );

  $cat_list = [];
  foreach($terms as $post) {
  $cat_list[$post->slug]  = [$post->name];
  }
  return $cat_list;
}

/**
 * All Category List
 */
function eergx_service_category (){
  $terms = get_terms( array(
      'taxonomy'    => 'services_cate',
      'hide_empty'  => true
  ) );

  $cat_list = [];
  foreach($terms as $post) {
  $cat_list[$post->slug]  = [$post->name];
  }
  return $cat_list;
}

function eergx_post_category (){
  $terms = get_terms( array(
      'taxonomy'    => 'projects_cate',
      'hide_empty'  => true
  ) );

  $cat_list = [];
  foreach($terms as $post) {
  $cat_list[$post->slug]  = [$post->name];
  }
  return $cat_list;
}

function eergx_project_slug (){
  $terms = get_terms( array(
      'taxonomy'    => 'projects_cate',
      'hide_empty'  => true
  ) );

  $cat_list = [];
  foreach($terms as $post) {
  $cat_list[$post->term_id]  = [$post->name];
  }
  return $cat_list;
}

/**
 * Tag List
 */
if ( ! function_exists( 'eergx_item_tag_lists' ) ) {
  function eergx_item_tag_lists(  $type = '', $query_args = array() ) {

    $options = array();

    switch( $type ) {

      case 'pages':
      case 'page':
      $pages = get_pages( $query_args );

      if ( !empty($pages) ) {
        foreach ( $pages as $page ) {
          $options[$page->post_title] = $page->ID;
        }
      }
      break;

      case 'posts':
      case 'post':
      $posts = get_posts( $query_args );

      if ( !empty($posts) ) {
        foreach ( $posts as $post ) {
          $options[$post->post_title] = lcfirst($post->ID);
        }
      }
      break;

      case 'tags':
      case 'tag':

      if (isset($query_args['taxonomies']) && taxonomy_exists($query_args['taxonomies'])) {
        $tags = get_terms( $query_args['taxonomies'] );
          if ( !is_wp_error($tags) && !empty($tags) ) {
            foreach ( $tags as $tag ) {
              $options[$tag->name] = $tag->term_id;
          }
        }
      }
      break;
    }

    return $options;

  }
}
function eergx_reading_time() {	
	global $post;	
	$content = get_post_field( 'post_content', $post->ID );
	$word_count = str_word_count( strip_tags( $content ) );
	$readingtime = ceil($word_count / 200);
	if ($readingtime == 1) {
	$timer = esc_html(" min");
	} else {
	$timer = esc_html(" min");
	}
	$totalreadingtime = $readingtime . $timer;
	return $totalreadingtime;
}

/**
 * Post Time Ago
 */
function eergx_ready_time_ago(){
  return human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) );
}

function eergx_category_pl(){
  $catgorys = get_the_category();
  foreach( $catgorys as $key => $category):
      ?>
      <a class="cat" href="<?php echo esc_url(get_category_link($category->term_id)); ?>">
        <?php echo esc_html($category->cat_name); ?>
      </a>
  <?php endforeach;
}

/**
 * Post Social Share
 *
 * @return void
 */
function eergx_post_share() {

  $permalink = get_permalink( get_the_ID() );
  $title     = get_the_title();
?>

<div class="share-wrap">
  <h5 class="egx-heading-1 title"><?php esc_html_e( 'Share:', 'eergx-tools' );?></h5>
  <div class="social-media">
    <a class="facebook" onClick="window.open('http://www.facebook.com/sharer.php?u=<?php echo esc_url( $permalink ); ?>','Facebook','width=600,height=300,left='+(screen.availWidth/2-300)+',top='+(screen.availHeight/2-150)+''); return false;" href="http://www.facebook.com/sharer.php?u=<?php echo esc_url( $permalink ); ?>"><i class="fa-brands fa-facebook-f"></i></a>

      <a class="twitter" onClick="window.open('http://twitter.com/share?url=<?php echo esc_url( $permalink ); ?>&amp;text=<?php echo esc_attr( $title ); ?>','Twitter share','width=600,height=300,left='+(screen.availWidth/2-300)+',top='+(screen.availHeight/2-150)+''); return false;" href="http://twitter.com/share?url=<?php echo esc_url( $permalink ); ?>&amp;text=<?php echo str_replace( " ", "%20", $title ); ?>"><i class="fa-brands fa-x-twitter"></i></a>

      <a class="linkedin" onClick="window.open('https://www.linkedin.com/cws/share?url=<?php echo esc_url( $permalink ); ?>&amp;text=<?php echo esc_attr( $title ); ?>','Linkedin share','width=600,height=300,left='+(screen.availWidth/2-300)+',top='+(screen.availHeight/2-150)+''); return false;" href="http://twitter.com/share?url=<?php echo esc_url( $permalink ); ?>&amp;text=<?php echo str_replace( " ", "%20", $title ); ?>"><i class="fa-brands fa-linkedin"></i></a>

      <a href="#" aria-label="name" class="share">
        <i class="fa-solid fa-link"></i>              
      </a>
  </div>
</div>

  
<?php 
}

/**
 * Get Menu List
 *
 * @return void
 */
function eergx_get_nav_menu(){

  $menus = array(
      '' => esc_html__('Default', 'eergx')
  );

  $obj_menus = wp_get_nav_menus();

  foreach ($obj_menus as $obj_menu){
      $menus[$obj_menu->term_id] = $obj_menu->name;
  }

  return $menus;
}


/**
 * Add Contact Method User
 */
function eergx_user_social_link( $methode ) {
    $methode['facebook']  = esc_html__( 'Facebook', 'eergx-tools' );
    $methode['twitter']   = esc_html__( 'Twitter', 'eergx-tools' );
    $methode['linkedin']  = esc_html__( 'Linkedin', 'eergx-tools' );
    $methode['instagram'] = esc_html__( 'Instagram', 'eergx-tools' );
    $methode['pinterest'] = esc_html__( 'Pinterest', 'eergx-tools' );
    $methode['youtube']   = esc_html__( 'YouTube', 'eergx-tools' );
  return $methode;
}
add_filter('user_contactmethods', 'eergx_user_social_link');



/**
 * Authore Avater
 */
function eergx_post_author_avatars($size) {
  echo get_avatar(get_the_author_meta('email'), $size);
}

add_action('genesis_entry_header', 'eergx_post_author_avatars');


function eergx_menu_selector() {
  $menus = wp_get_nav_menus();
  $items = array();
  $i     = 0;
  foreach ( $menus as $menu ) {
      if ( $i == 0 ) {
          $default = $menu->slug;
          $i ++;
      }
      $items[ $menu->slug ] = $menu->name;
  }
  return $items;
}
function eergx_portfolio_category(){
  $terms = get_terms( array(
    'taxonomy'    => 'portfolio_cat',
    'hide_empty'  => true,
  ) );

  $cat_list = [];
  foreach($terms as $post) {
  $cat_list[$post->slug]  = [$post->name];
  }
  return $cat_list;
}
function eergx_careero_category(){
  $terms = get_terms( array(
    'taxonomy'    => 'career_cat',
    'hide_empty'  => true,
  ) );

  $cat_list = [];
  foreach($terms as $post) {
  $cat_list[$post->slug]  = [$post->name];
  }
  return $cat_list;
}

/**
 * Image Size Render
 */
function eergx_img_size_control(){
    $image_sizes = get_intermediate_image_sizes(); 

    $addsizes = [
        'full' => 'Full size'
    ];
    $newsizes = array_merge($image_sizes, $addsizes);

    return array_combine($newsizes, $newsizes);
}

/**
 * 
 */
function eergx_select_cat($tax) {

  $categories_obj = get_categories('taxonomy='.$tax.'');
  $categories = array();

  foreach ($categories_obj as $pn_cat) {
      $categories[$pn_cat->cat_ID] = $pn_cat->cat_name;
  }
  return $categories;         
}

/**
 * directory category
 */
function get_data_form_director($tax,$label,$name){
    $terms = get_terms($tax);
    $x = '<select name="'.$name.'">';
    $x .= '<option value="">' . $label . '</option>';
    foreach ($terms as $term) {
        $x .= '<option value="' . $term->term_id . '">' . $term->name . '</option>';
    }
    $x .= '</select>';
    return $x;
}

/**
 * 
 */
function eergx_load_elementor_template(){
	$page_templates = get_posts( [
		'post_type'         => 'elementor_library',
		'posts_per_page'    => -1
	] );

	$options = [];

	if ( ! empty( $page_templates ) && ! is_wp_error( $page_templates ) ){
		foreach ( $page_templates as $template ) {
			$options[ $template->ID ] = $template->post_title;
		}
	}
	return $options;
}

function eergx_elemento_display() {
	return \Elementor\Plugin::instance();
}

class Custom_Walker_Nav_Menu extends Walker_Nav_Menu {
  function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
      $classes = empty($item->classes) ? array() : (array) $item->classes;
      $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item));

      !empty($class_names) and $class_names = ' class="' . esc_attr($class_names) . '"';
      
      // Add data-menuanchor attribute
      $data_menuanchor = !empty($item->attr_title) ? ' data-menuanchor="' . esc_attr($item->attr_title) . '"' : '';

      $output .= '<li' . $class_names . $data_menuanchor .'>';

      $attributes  = !empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) .'"' : '';
      $attributes .= !empty($item->target)     ? ' target="' . esc_attr($item->target)     .'"' : '';
      $attributes .= !empty($item->xfn)        ? ' rel="'    . esc_attr($item->xfn)        .'"' : '';
      $attributes .= !empty($item->url)        ? ' href="'   . esc_attr($item->url)        .'"' : '';

      $item_output = $args->before;
      $item_output .= '<a'. $attributes .'>';
      $item_output .= $args->link_before .apply_filters('the_title', $item->title, $item->ID) .$args->link_after;
      $item_output .= '</a>';
      $item_output .= $args->after;

      $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
  }
}

// Enable SVG uploads
function themex_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'themex_mime_types');

// Sanitize SVG files
function themex_sanitize_svg($file) {
  if ($file['type'] == 'image/svg+xml') {
    $svg = simplexml_load_file($file['tmp_name']);

    if ($svg === false) {
      $file['error'] = 'Invalid SVG file';
      return $file;
    }

    // Remove any potentially dangerous elements or attributes
    $sanitized_svg = themex_sanitize_svg_content($svg);

    // Save the sanitized SVG back to the file
    file_put_contents($file['tmp_name'], $sanitized_svg->asXML());
  }

  return $file;
}
add_filter('wp_handle_upload_prefilter', 'themex_sanitize_svg');

// Sanitize SVG content
function themex_sanitize_svg_content($svg) {
  $dangerous_elements = ['script', 'iframe', 'object', 'embed'];
  foreach ($dangerous_elements as $element) {
    foreach ($svg->xpath('//' . $element) as $dangerous) {
      unset($dangerous[0]);
    }
  }

  return $svg;
}