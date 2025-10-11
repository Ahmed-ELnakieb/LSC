<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package eergx
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if (post_password_required()) {
	return;
}
?>

<div id="comments" class="blog-details-comments-wrap mb-40">

	<?php
	// You can start editing here -- including this comment!
	if (have_comments()):
		?>
		<div class="post-comments">
			<h5 class="comments-title ftc-heading-1">
				<?php
				$eergx_comment_count = get_comments_number();
				if ('1' === $eergx_comment_count) {
					printf(
						/* translators: 1: title. */
						esc_html__('1 Comment', 'eergx'),
						'<span>' . wp_kses_post(get_the_title()) . '</span>'
					);
				} else {
					printf(
						/* translators: 1: comment count number, 2: title. */
						esc_html(_nx('%1$s Comment', '%1$s Comments', $eergx_comment_count, 'comments title', 'eergx')),
						number_format_i18n($eergx_comment_count), // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						'<span>' . wp_kses_post(get_the_title()) . '</span>'
					);
				}
				?>
			</h5><!-- .comments-title -->
			<?php the_comments_navigation(); ?>
			<div class="comments-box-wrap mb-20">
				<ol class="comment-list list-unstyled mb-0">
					<?php
					wp_list_comments(
						array(
							'callback' => 'eergx_comments'
						)
					);
					?>
				</ol><!-- .comment-list -->
			</div>


		</div>
		<?php
		the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if (!comments_open()):
			?>
			<p class="no-comments">
				<?php esc_html_e('Comments are closed.', 'eergx'); ?>
			</p>
			<?php
		endif;

	endif; // Check for have_comments().
	?>
</div><!-- #comments -->
<?php
$args = array(
	'comment_notes_after' => '<button href="#" class="egx-btn-3 btn" type="submit">
                                <span class="btn-text">' . esc_html('Post Comment') . '</span>
                                <span class="btn-icon">
                                    <svg class="icon" width="32" height="32" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                        <rect x="1" y="1" width="30" height="30" rx="15" stroke="white" stroke-width="2"></rect>
                                        <path d="M11.8333 21C11.5833 21 11.4167 20.9167 11.25 20.75C10.9167 20.4167 10.9167 19.9167 11.25 19.5833L19.5833 11.25C19.9167 10.9167 20.4167 10.9167 20.75 11.25C21.0833 11.5833 21.0833 12.0833 20.75 12.4167L12.4167 20.75C12.25 20.9167 12.0833 21 11.8333 21Z"></path>
                                        <path d="M20.1663 20.1667C19.6663 20.1667 19.333 19.8333 19.333 19.3333V12.6667H12.6663C12.1663 12.6667 11.833 12.3333 11.833 11.8333C11.833 11.3333 12.1663 11 12.6663 11H20.1663C20.6663 11 20.9997 11.3333 20.9997 11.8333V19.3333C20.9997 19.8333 20.6663 20.1667 20.1663 20.1667Z"></path>
                                    </svg>
                                </span>
                            </button>'

);
?>
<div class="fx-form-1">
	<?php comment_form($args);?>
</div>
