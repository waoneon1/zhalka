<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Media_JT
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}

?>

<div id="comments" class="comments-area">
	
	<?php

	$post_id       	= $post->ID;
	$commenter     	= wp_get_current_commenter();
	$user          	= wp_get_current_user();
	$user_identity 	= $user->exists() ? $user->display_name : '';
	$icon_close 		= '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M3 3L13 13M3 13L13 3" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>';


	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );
	$fields =  array(
		'author' => '<div class="comment-not-login flex gap-x-4 mb-6">
			<p class="comment-form-author flex flex-col">' 
				. '<label for="author">' . __( 'Name' ) . '</label> ' 
				. ( $req ? '<span class="required"></span>' : '' ) 
				. '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' placeholder="Your name (required)" />'
				. '<span class="comment-error">Name is required.</span>
			</p>',
		'email'  => 
			'<p class="comment-form-email flex flex-col">
				<label for="email">' . __( 'Email' ) . '</label> ' 
				. ( $req ? '<span class="required"></span>' : '' ) 
				. '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' placeholder="Your email (required)" />'
				. '<span class="comment-error">Email is required.</span>
			</p>
		</div>',
	);

	


	$comments_args = array(
		'fields' 			    =>	$fields,
		'title_reply' 		=> '<div class="flex justify-between items-center">
			<span>Leave a reply</span> 
			<span class="cursor-pointer js-comment-close vtransition hover:opacity-70">'.$icon_close .'</span>
		</div>',
		'comment_field' 	=> 
			'<p class="comment-form-comment flex flex-col">'
				. '<label for="comment">Comment</label>'
				. '<textarea id="comment" name="comment" cols="45" rows="4" maxlength="65525" placeholder="Write your comments here (required)"></textarea>'
				. '<span class="comment-error">Comment is required.</span>
			</p>',
		'label_submit' 		=> __( 'Post Comment' ),
		'submit_button' 	=> '<input name="%1$s" type="submit" id="%2$s" class="%3$s vtransition hover:opacity-70" value="%4$s" />'
                        . '<div class="comment-loading hidden">'
                        . '<svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                          </svg>'
                        . '</div>',
		'submit_field'		=> '<p class="form-submit">%1$s %2$s</p>',

		'logged_in_as'		=> sprintf(
			'<p class="logged-in-as mb-2 text-sm">%s%s</p>',
			sprintf(
				/* translators: 1: User name, 2: Edit user link, 3: Logout URL. */
				__( 'Logged in as %1$s. <a href="%2$s">Edit your profile</a>. <a href="%3$s">Log out?</a>' ),
				$user_identity,
				get_edit_user_link(),
				/** This filter is documented in wp-includes/link-template.php */
				wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ), $post_id ) )
			),
			''
		),
	);
	?>
	<div class="comment-wrapper <?php echo get_comments_number() == 0 ? 'js-comment-wrapper-zero' : '' ?>">
		<?php comment_form($comments_args); ?>
		<div class="comment-new-button my-8 js-comment-new vtransition hover:opacity-70 <?php echo get_comments_number() == 0 ? 'active-hide' : '' ?>">
			Add New Comment
		</div>	
	</div>

	<?php if ( have_comments() ) : ?>
		
		<h2 class="comments-title"></h2>

		<?php the_comments_navigation(); ?>

		<ol class="comment-list">
			<?php
				$args = array(
					'walker'            => null,
					'max_depth'         => 10,
					'style'             => 'ul',
					'callback'          => 'custom_wp_list_comments',
					'end-callback'      => null,
					'type'              => 'all',
					'page'              => '',
					'per_page'          => '',
					'avatar_size'       => 0,
				);
				wp_list_comments($args);
			?>
		</ol>

		<?php the_comments_navigation(); ?>
		<?php if ( ! comments_open() ) : ?> 
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'mjt' ); ?></p>
		<?php endif; ?>

	<?php endif ?>

</div><!-- #comments -->