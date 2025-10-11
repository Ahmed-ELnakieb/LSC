<?php

/**
 * [eergx_breadcrumb description]
 * @return [type] [description]
 */
function eergx_breadcrumb(){

	$wpbreadcrumb_class = '';
	$breadcrumb_show = 1;

	$id = get_the_ID();

	if (is_front_page() && is_home()) {
		$title = get_the_title();
		$wpbreadcrumb_class = 'tx-front-page';
	} elseif (is_front_page()) {
		$title = get_the_title();
		$breadcrumb_show = 0;

	} elseif (is_home()) {
		if (get_option('page_for_posts')) {
			$id = get_option('page_for_posts');
			$title = get_the_title(get_option('page_for_posts'));
		}
	} elseif (is_single() && 'post' == get_post_type()) {
		$title = get_the_title();
	} elseif (is_search()) {
		$title = esc_html__('Search Results for : ', 'eergx') . get_search_query();
	} elseif (is_404()) {
		$title = esc_html__('Page not Found', 'eergx');
	} elseif (function_exists('is_woocommerce') && is_shop()) {
		$title = get_the_title(get_option('woocommerce_shop_page_id'));
	} elseif (function_exists('is_woocommerce') && is_product()) {
		$title = __('Product Details', 'eergx');
	} elseif (function_exists('is_woocommerce') && is_product_tag()) {
		$title = get_the_archive_title();
	} elseif (function_exists('is_woocommerce') && is_product_category()) {
		$title = get_the_archive_title();
	} elseif (is_archive()) {
		$title = get_the_archive_title();
	} else {
		$title = get_the_title();
	}

	// from page meta
	if (get_option('page_for_posts')) {
		$page_for_posts = get_queried_object_id();
		$page_for_posts_meta = get_post_meta($page_for_posts, 'eergx_page_meta', true) ? get_post_meta($page_for_posts, 'eergx_page_meta', true) : [];
	} else {
		$page_meta = get_post_meta($id, 'eergx_page_meta', true) ? get_post_meta($id, 'eergx_page_meta', true) : [];
	}

	if (get_option('page_for_posts')) {
		$enable_page_preadcrumb = array_key_exists('enable_page_preadcrumb', $page_for_posts_meta) ? $page_for_posts_meta['enable_page_preadcrumb'] : true;
	} else {
		$enable_page_preadcrumb = array_key_exists('enable_page_preadcrumb', $page_meta) ? $page_meta['enable_page_preadcrumb'] : true;
	}

	if (get_option('page_for_posts')) {
		$enable_bg_image = array_key_exists('enable_bg_image', $page_for_posts_meta) ? $page_for_posts_meta['enable_bg_image'] : true;
	} else {
		$enable_bg_image = array_key_exists('enable_bg_image', $page_meta) ? $page_meta['enable_bg_image'] : true;
	}

	if ($enable_page_preadcrumb == true && $breadcrumb_show == 1) {

		// from page meta
		if (get_option('page_for_posts')) {
			$bg_img_from_page = array_key_exists('bg_img_from_page', $page_for_posts_meta) ? $page_for_posts_meta['bg_img_from_page'] : '';
			$enable_custom_title = array_key_exists('enable_custom_title', $page_for_posts_meta) ? $page_for_posts_meta['enable_custom_title'] : false;
			$page_custom_title = array_key_exists('page_custom_title', $page_for_posts_meta) ? $page_for_posts_meta['page_custom_title'] : '';

			$page_desc_desc = array_key_exists('page_desc_desc', $page_for_posts_meta) ? $page_for_posts_meta['page_desc_desc'] : '';

			$br_btn_link = array_key_exists('br_btn_link', $page_for_posts_meta) ? $page_for_posts_meta['br_btn_link'] : '';
		} else {
			$bg_img_from_page = array_key_exists('bg_img_from_page', $page_meta) ? $page_meta['bg_img_from_page'] : '';
			$enable_custom_title = array_key_exists('enable_custom_title', $page_meta) ? $page_meta['enable_custom_title'] : false;
			$page_custom_title = array_key_exists('page_custom_title', $page_meta) ? $page_meta['page_custom_title'] : '';

			$page_desc_desc = array_key_exists('page_desc_desc', $page_meta) ? $page_meta['page_desc_desc'] : '';
			$br_btn_link = array_key_exists('br_btn_link', $page_meta) ? $page_meta['br_btn_link'] : '';
		}

		// from theme option
		$breadcrumb_bg = cs_get_option('breadcrumb_bg_img');
		$bg_img = !empty($breadcrumb_bg) ? $breadcrumb_bg['url'] : '';

		if ($enable_bg_image == false) {
			$bg_img = $bg_img;
		} else {
			$bg_img = !empty($bg_img_from_page['url']) ? $bg_img_from_page['url'] : $bg_img;
		}

		$shop_details_breadcrumb = is_single() && 'product' == get_post_type() ? ' no-breadcrumb-ttile' : '';
		$bg_url = !empty($bg_img) ? $bg_img : "";

		$title = $enable_custom_title == true ? $page_custom_title : $title;

		// check if front page
		if (is_front_page()) {
			$title = __('Blog', 'eergx');
		}

		if (has_nav_menu('main-menu')) {
			$no_menu_class = '';
		} else {
			$no_menu_class = ' pt-200';
		}
		?>

		<div class="egx-hero-inner-area bg-default" data-background="<?php echo esc_url($bg_url); ?>">
            <div class="container egx-container-2">
                <div class="egx-hero-inner-wrap">
                    <h1 class="hero-inner-title egx-heading-1 egx-split-text split-in-right"><?php echo wp_kses_post($title); ?></h1>
					<?php if(!empty($page_desc_desc)):?>
                    	<p class="egx-para-1 disc"><?php echo eergx_wp_kses($page_desc_desc);?></p>
					<?php endif;?>

					<?php if(!empty($br_btn_link['text'])):?>
						<div class="btn-wrap">
							<a href="<?php echo esc_url($br_btn_link['url']);?>" class="egx-btn-3">
								<span class="btn-text"><?php echo esc_html($br_btn_link['text']);?></span>
								<span class="btn-icon">
									<svg class="icon" width="32" height="32" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
										<rect x="1" y="1" width="30" height="30" rx="15" stroke="white" stroke-width="2"></rect>
										<path d="M11.8333 21C11.5833 21 11.4167 20.9167 11.25 20.75C10.9167 20.4167 10.9167 19.9167 11.25 19.5833L19.5833 11.25C19.9167 10.9167 20.4167 10.9167 20.75 11.25C21.0833 11.5833 21.0833 12.0833 20.75 12.4167L12.4167 20.75C12.25 20.9167 12.0833 21 11.8333 21Z"></path>
										<path d="M20.1663 20.1667C19.6663 20.1667 19.333 19.8333 19.333 19.3333V12.6667H12.6663C12.1663 12.6667 11.833 12.3333 11.833 11.8333C11.833 11.3333 12.1663 11 12.6663 11H20.1663C20.6663 11 20.9997 11.3333 20.9997 11.8333V19.3333C20.9997 19.8333 20.6663 20.1667 20.1663 20.1667Z"></path>
									</svg>
								</span>
							</a>
						</div>
					<?php endif;?>

                </div>
                <div class="breadcrumb">
					<?php echo eergx_breadcrumb_callback(); ?>
                </div>
            </div>
         </div>
		<?php
	}
}
add_action('eergx_before_main_content', 'eergx_breadcrumb');

function eergx_breadcrumb_callback()
{
	global $wp_query;
	$queried_object = get_queried_object();
	$breadcrumb = '';
	$delimiter = '';
	$before = '';
	$after = '';
	if (!is_front_page()) {
		$breadcrumb .= $before . '<a href="' . home_url('/') . '">' . esc_html__('Home', 'eergx') . ' &nbsp;</a>' . $after;
		/** If category or single post */
		if (is_category()) {
			$cat_obj = $wp_query->get_queried_object();
			$this_category = get_category($cat_obj->term_id);
			if ($this_category->parent != 0) {
				$parent_category = get_category($this_category->parent);
				$breadcrumb .= get_category_parents($parent_category, true, $delimiter);
			}
			$breadcrumb .= $before . '<a href="' . get_category_link(get_query_var('cat')) . '">' . single_cat_title('', false) . '</a>' . $after;
		} elseif ($wp_query->is_posts_page) {
			$breadcrumb .='<span>' . $before . $queried_object->post_title . $after . '</span>';
		} elseif (is_tax()) {
			$breadcrumb .= $before . '<a href="' . get_term_link($queried_object) . '">' . $queried_object->name . '</a>' . $after;
		} elseif (is_page()) /** If WP pages */{
			global $post;
			if ($post->post_parent) {
				$anc = get_post_ancestors($post->ID);
				foreach ($anc as $ancestor) {
					$breadcrumb .= $before . '<a href="' . get_permalink($ancestor) . '">' . get_the_title($ancestor) . ' &nbsp;</a>' . $after;
				}
				$breadcrumb .= '<span>' . $before . '' . get_the_title($post->ID) . '' . $after . '</span>';
			} else {
				$breadcrumb .= '<span>' . $before . get_the_title() . $after . '</span>';
			}
		} elseif (is_singular()) {
			if ($category = wp_get_object_terms(get_the_ID(), array('category', 'location', 'tax_feature'))) {
				if (!is_wp_error($category)) {
					$breadcrumb .= $before . '<a href="' . get_term_link(binsro_set($category, '0')) . '">' . binsro_set(binsro_set($category, '0'), 'name') . '&nbsp;</a>' . $after;
					$breadcrumb .= '<span>' . $before . get_the_title() . $after . '</span>';
				} else {
					$breadcrumb .= '<span>' . $before . get_the_title() . $after . '</span>';
				}
			} else {
				$breadcrumb .= '<span>' . $before . get_the_title() . $after . '</span>';
			}
		} elseif (is_tag()) {
			$breadcrumb .= $before . '<a href="' . get_term_link($queried_object) . '">' . single_tag_title('', false) . '</a>' . $after;
		} /**If tag template*/elseif (is_day()) {
			$breadcrumb .= $before . '<a href="#">' . esc_html__('Archive for ', 'eergx') . get_the_time('F jS, Y') . '</a>' . $after;
		} /** If daily Archives */elseif (is_month()) {
			$breadcrumb .= $before . '<a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . __('Archive for ', 'eergx') . get_the_time('F, Y') . '</a>' . $after;
		} /** If montly Archives */elseif (is_year()) {
			$breadcrumb .= $before . '<a href="' . get_year_link(get_the_time('Y')) . '">' . __('Archive for ', 'eergx') . get_the_time('Y') . '</a>' . $after;
		} /** If year Archives */elseif (is_author()) {
			$breadcrumb .= $before . '<a href="' . esc_url(get_author_posts_url(get_the_author_meta("ID"))) . '">' . __('Archive for ', 'eergx') . get_the_author() . '</a>' . $after;
		} /** If author Archives */elseif (is_search()) {
			$breadcrumb .= '<span>' . $before . '' . esc_html__('Search Results for ', 'eergx') . get_search_query() . '' . $after . '</span>';
		} /** if search template */elseif (is_404()) {
			$breadcrumb .= '<span>' . $before . '' . esc_html__('404 - Not Found', 'eergx') . '' . $after . '</span>';
			/** if search template */
		} elseif (is_post_type_archive('product')) {
			$shop_page_id = wc_get_page_id('shop');
			if (get_option('page_on_front') !== $shop_page_id) {
				$shop_page = get_post($shop_page_id);
				$_name = wc_get_page_id('shop') ? get_the_title(wc_get_page_id('shop')) : '';
				if (!$_name) {
					$product_post_type = get_post_type_object('product');
					$_name = $product_post_type->labels->singular_name;
				}
				if (is_search()) {
					$breadcrumb .= $before . '<a href="' . get_post_type_archive_link('product') . '">' . $_name . '</a>' . $delimiter . esc_html__('Search results for &ldquo;', 'eergx') . get_search_query() . '&rdquo;' . $after;
				} elseif (is_paged()) {
					$breadcrumb .= $before . '<a href="' . get_post_type_archive_link('product') . '">' . $_name . '</a>' . $after;
				} else {
					$breadcrumb .= '<span>' . $before . $_name . $after . '</span>';
				}
			}
		} else {
			$breadcrumb .= $before . '<a href="' . get_permalink() . '">' . get_the_title() . '</a>' . $after;
		}
		/** Default value */
	}

	return $breadcrumb;
}
