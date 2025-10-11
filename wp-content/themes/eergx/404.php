<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package eergx
 */

get_header();
$error_code_img = cs_get_option('error_code_img');
$error_code = cs_get_option('error_code');
$error_title = cs_get_option('error_title');
$error_desc = cs_get_option('error_desc');
$error_button = cs_get_option('error_button');
?>
<div class="egx-oops-hero-area">

	<div class="bg-img">
		<img class="feh-img-plx" data-value="4" src="<?php if (!empty($error_code_img['url'])) {
			echo esc_url($error_code_img['url']);
		} else {
			echo esc_url(get_template_directory_uri() . '/assets/img/oops-bg.png');
		} ?>"
			alt="<?php esc_attr_e('404', 'eergx'); ?>" />
	</div>

	<div class="container egx-container-2">
		<div class="egx-oops-wrap">
			<h3 class="oops-title"><?php if (!empty($error_title)) {
					echo esc_html($error_title);
				} else {
					esc_html_e('Oops!', 'eergx');
				} ?>	</h3>
			<h2 class="oops-title-2 egx-split-text split-in-right"><?php if (!empty($error_code)) {
					echo esc_html($error_code);
				} else {
					esc_html_e('404 Error!', 'eergx');
				} ?>	</h2>
			<p class="egx-para-1 disc">
				<?php if (!empty($error_desc)) {
					echo esc_html($error_desc);
				} else {
					esc_html_e('We cant find the page that youre looking for. Cant find what you need? Take a moment and search below!', 'eergx');
				} ?>
			</p>
			<a href="<?php echo esc_url(home_url('/')); ?>" class="egx-btn-3 btn">
				<span class="btn-text"><?php if (!empty($error_button)) {
							echo esc_html($error_button);
						} else {
							esc_html_e('Go Back Home', 'eergx');
						} ?></span>
				<span class="btn-icon">
					<svg class="icon" width="32" height="32" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
						<rect x="1" y="1" width="30" height="30" rx="15" stroke="white" stroke-width="2"></rect>
						<path d="M11.8333 21C11.5833 21 11.4167 20.9167 11.25 20.75C10.9167 20.4167 10.9167 19.9167 11.25 19.5833L19.5833 11.25C19.9167 10.9167 20.4167 10.9167 20.75 11.25C21.0833 11.5833 21.0833 12.0833 20.75 12.4167L12.4167 20.75C12.25 20.9167 12.0833 21 11.8333 21Z"></path>
						<path d="M20.1663 20.1667C19.6663 20.1667 19.333 19.8333 19.333 19.3333V12.6667H12.6663C12.1663 12.6667 11.833 12.3333 11.833 11.8333C11.833 11.3333 12.1663 11 12.6663 11H20.1663C20.6663 11 20.9997 11.3333 20.9997 11.8333V19.3333C20.9997 19.8333 20.6663 20.1667 20.1663 20.1667Z"></path>
					</svg>
				</span>
			</a>
		</div>
	</div>
</div>


<?php
get_footer();
