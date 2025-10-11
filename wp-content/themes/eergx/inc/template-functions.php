<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package eergx
 */
add_filter('wpcf7_form_elements', function ($content) {
	$content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);

	return $content;
});
/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function eergx_body_classes($classes){
	// Adds a class of hfeed to non-singular pages.
	if (!is_singular()) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if (!is_active_sidebar('sidebar-1')) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter('body_class', 'eergx_body_classes');

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function eergx_pingback_header()
{
	if (is_singular() && pings_open()) {
		printf('<link rel="pingback" href="%s">', esc_url(get_bloginfo('pingback_url')));
	}
}
add_action('wp_head', 'eergx_pingback_header');


function eergx_category_html( $links ) {
    // Use a regular expression to match and replace the default list item structure
    $links = preg_replace_callback(
        '/<a href="([^"]+)"[^>]*>([^<]+)<\/a> \((\d+)\)/',
        function ($matches) {
            $category_link = $matches[1];
            $category_name = $matches[2];
            $category_count = $matches[3];
            
            return '<a class="fd-sidebar-categories-item fd-heading-1" href="' . esc_url($category_link) . '" aria-label="' . esc_attr($category_name) . '" class="fd-sidebar-categories-item fd-heading-1">
                        
                        <span class="text">' . esc_html($category_name) . '</span>
                        <span class="number">' . esc_html($category_count) . '</span>
                    </a>';
        },
        $links
    );
    
    return $links;
}
add_filter( 'wp_list_categories', 'eergx_category_html' );




function eergx_archive_html($links){
	$links = str_replace('</a>&nbsp;(', '<span class="number">', $links);
	$links = str_replace(')', '</span> <span class="icon-1" >
</span></a>', $links);
	return $links;
}

add_filter('get_archives_link', 'eergx_archive_html');


/**
 * Comment Link Class
 *
 * @param [type] $class
 * @return void
 */
function wpdocs_comment_reply_link_class($class)
{
	$class = str_replace("class='comment-reply-link", "class='comment-reply-link reply-btn", $class);
	return $class;
}

add_filter('comment_reply_link', 'wpdocs_comment_reply_link_class');

/**
 * Comment List Modification
 */

function eergx_comments($comment, $args, $depth)
{
	$GLOBALS['comment'] = $comment; ?>

	<div <?php comment_class('comments-box-single wow fadeInUp'); ?> id="comment-<?php comment_ID() ?>">
		<?php if (get_avatar($comment)) { ?>
			<div class="person-img">
				<?php echo get_avatar($comment, 80); ?>
			</div>
		<?php } ?>
		<div class="comments-box-author-content">
			<div class="heading-wrap">
				<div class="title-wrap">
					<span class="name">
						<?php comment_author_link() ?>
					</span>
					<span class="date">
						<?php echo esc_html(get_the_time(get_option('date_format'))); ?>
					</span>
				</div>
				<?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth'], 'reply_text' => wp_kses('Reply', true)))); ?>
			</div>
			<div class="comment-text">
				<?php comment_text(); ?>
			</div>
		</div>
	</div>

	<?php
}


/**
 * Comment Message Box
 */
function eergx_comment_reform($arg)
{

	$arg['title_reply'] = esc_html__('Leave a comment', 'eergx');
	$arg['comment_field'] = '<div class="item mesggage"> <label for="message" class="fx-form-1-label">message</label> <textarea id="comment" class="fx-form-1-input" name="comment" cols="77" rows="3" placeholder="' . esc_attr__("Comment", "eergx") . '" aria-required="true"></textarea></div>';

	return $arg;

}
add_filter('comment_form_defaults', 'eergx_comment_reform');


/**
 * Comment Form Field
 */
function eergx_modify_comment_form_fields($fields)
{
	$commenter = wp_get_current_commenter();
	$req = get_option('require_name_email');

	$fields['author'] = '<div class="item"><label for="fname" class="fx-form-1-label">' . esc_attr__("first name", "eergx") . '</label><input type="text" name="author" id="author" value="' . esc_attr($commenter['comment_author']) . '" placeholder="' . esc_attr__("e.g. Oliver Spiteri", "eergx") . '" size="22" tabindex="1"' . ($req ? 'aria-required="true"' : '') . ' class="form_control" /></div>';

	$fields['email'] = '<div class="item"><label for="fname" class="fx-form-1-label">' . esc_attr__("Email", "eergx") . '</label><input  type="email" name="email" id="email" value="' . esc_attr($commenter['comment_author_email']) . '" placeholder="' . esc_attr__("info@forgexindustry.co.uk", "eergx") . '" size="22" tabindex="2"' . ($req ? 'aria-required="true"' : '') . ' class="form_control"  /></div>';

	$fields['url'] = '<div class="item url"><label for="fname" class="fx-form-1-label">' . esc_attr__("Website URL", "eergx") . '</label><input type="url" name="url" id="url" value="' . esc_attr($commenter['comment_author_url']) . '" placeholder="' . esc_attr__("themexriver.com", "eergx") . '" size="22" tabindex="2"' . ($req ? 'aria-required="false"' : '') . ' class="form_control"  /></div>';

	return $fields;
}
add_filter('comment_form_default_fields', 'eergx_modify_comment_form_fields');

// comment Move Field
function eergx_move_comment_field_to_bottom($fields)
{
	$comment_field = $fields['comment'];
	unset($fields['comment']);
	$fields['comment'] = $comment_field;
	return $fields;
}
add_filter('comment_form_fields', 'eergx_move_comment_field_to_bottom');



/**
 * Product Per Page Count
 *
 * @param [type] $per_page
 * @return void
 */


/**
 * Authore Avater
 */
function eergx_main_author_avatars($size){
	echo get_avatar(get_the_author_meta('email'), $size);
}

add_action('genesis_entry_header', 'eergx_post_author_avatars');




/**
 * pagination
 */
if (!function_exists('eergx_pagination')) {

	function _eergx_pagi_callback($pagination)
	{
		return $pagination;
	}

	//page navegation
	function eergx_pagination($prev, $next, $pages, $args)
	{
		global $wp_query, $wp_rewrite;
		$menu = '';
		$wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;

		if ($pages == '') {
			global $wp_query;
			$pages = $wp_query->max_num_pages;

			if (!$pages) {
				$pages = 1;
			}

		}

		$pagination = [
			'base' => add_query_arg('paged', '%#%'),
			'format' => '',
			'total' => $pages,
			'current' => $current,
			'prev_text' => $prev,
			'next_text' => $next,
			'type' => 'array',
		];

		//rewrite permalinks
		if ($wp_rewrite->using_permalinks()) {
			$pagination['base'] = user_trailingslashit(trailingslashit(remove_query_arg('s', get_pagenum_link(1))) . 'page/%#%/', 'paged');
		}

		if (!empty($wp_query->query_vars['s'])) {
			$pagination['add_args'] = ['s' => get_query_var('s')];
		}

		$pagi = '';
		if (paginate_links($pagination) != '') {
			$paginations = paginate_links($pagination);
			$pagi .= '<ul>';
			foreach ($paginations as $key => $pg) {
				$pagi .= '<li class="fx-pagination-item">' . $pg . '</li>';
			}
			$pagi .= '</ul>';
		}

		print _eergx_pagi_callback($pagi);
	}
}


/**
 * Search Widget
 */
function eergx_search_widgets($form)
{
	$form = '<form method="get" id="searchform" class="sidebar-search-box" action="' . home_url('/') . '" >
    	<input class="search-input" placeholder="' . esc_attr__('Search...', 'eergx') . '" type="text"  value="' . get_search_query() . '" name="s" id="s" />
		<button type="submit" aria-label="search" class="search-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
    </form>';
	return $form;
}
add_filter('get_search_form', 'eergx_search_widgets', 100);


/**
 * Authore
 */
function eergx_authore_info()
{

	global $post;
	if (is_object($post)):

		$theme_author_markup = '';
		// Get author's display name
		$display_name = get_the_author_meta('display_name', $post->post_author);

		// If display name is not available then use nickname as display name
		if (empty($display_name))
			$display_name = get_the_author_meta('nickname', $post->post_author);

		// Get author's biographical information or description
		$user_description = get_the_author_meta('user_description', $post->post_author);

		$user_facebook = get_the_author_meta('facebook', $post->post_author);
		$user_twitter = get_the_author_meta('twitter', $post->post_author);
		$user_linkedin = get_the_author_meta('linkedin', $post->post_author);
		$user_instagram = get_the_author_meta('instagram', $post->post_author);
		$user_pinterest = get_the_author_meta('pinterest', $post->post_author);
		$user_youtube = get_the_author_meta('youtube', $post->post_author);

		// Get link to the author archive page
		$user_posts = get_author_posts_url(get_the_author_meta('ID', $post->post_author));
		if (!empty($display_name))
			// Author avatar - - the number 90 is the px size of the image.
			$theme_author_markup .= '<div class="user-img">' . get_avatar(get_the_author_meta('ID'), 130) . '</div>';
		$theme_author_markup .= '<div class="content">';
		$theme_author_markup .= '<h5 class="egx-heading-1 name">' . $display_name . '</h5>';
		$theme_author_markup .= '<p>' . get_the_author_meta('description') . '</p>';
		
		$theme_author_markup .= '</div>';

		// Pass all this info to post content 
		echo '<div class="comment-wrap bg-default">' . $theme_author_markup . '</div>';
	endif;
}

function eergx_wp_kses( $val ) {
    return wp_kses( $val, array(

        'p'      => array(
            'class' => array(),
            'style' => array(),
        ),

        'img'    => array(
            'src'   => array(),
            'alt'   => array(),
            'class' => array(),
            'style' => array(),
        ),
        'span'   => array(
            'class' => array(),
            'style' => array(),
        ),
        'small'  => array(),
        'div'    => array(
            'style' => array(),
        ),
        'strong' => array(
            'style' => array(),
        ),
        'b'      => array(
            'style' => array(),
        ),
        'br'     => array(),
        'h1'     => array(
            'style' => array(),
        ),
        'i'      => array(
            'class' => array(),
            'style' => array(),
        ),
        'ul'     => array(
            'class' => array(),
            'style' => array(),
        ),
        'ul'     => array(
            'id' => array(),
        ),
        'li'     => array(
            'class' => array(),
            'style' => array(),
        ),
        'li'     => array(
            'id' => array(),
        ),
        'h1'     => array(
            'style' => array(),
        ),
        'h2'     => array(),
        'h3'     => array(
            'style' => array(),
        ),
        'h4'     => array(
            'style' => array(),
        ),
        'h5'     => array(
            'style' => array(),
        ),
        'h6'     => array(
            'style' => array(),
        ),
        'a'      => array( 
            'href' => array(), 
            'target' => array(),
            'style' => array(),
        ),
        'iframe' => array( 'src' => array(), 'height' => array(), 'width' => array() ),

    ), '' );
}


/**
 * Product Per Page Count
 *
 * @param [type] $per_page
 * @return void
 */ 

 function eergx_product_count( $cols ) {
	$product_count = cs_get_option('product_count');
  	$cols = !empty($product_count) ? $product_count : '12';
  	return $cols;
}
add_filter( 'loop_shop_per_page', 'eergx_product_count', 20 );
function eergx_custom_class( $classes ) {
    $page_meta = get_post_meta( get_the_ID(), 'eergx_page_meta', true ) ? get_post_meta( get_the_ID(), 'eergx_page_meta', true ) : [];
    $enable_ovh_layout = array_key_exists( 'enable_ovh_layout', $page_meta ) ? $page_meta['enable_ovh_layout'] : false;
    $box_layout_class = $enable_ovh_layout == true ? 'eergx-ovh' : '';
    $classes[] = '' . esc_attr( $box_layout_class ) . '';
    return $classes;
}
add_filter( 'body_class', 'eergx_custom_class' );