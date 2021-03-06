<?php
/**
 * Display single product reviews (comments)
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product-reviews.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.2.0
 */
if ( ! defined('ABSPATH') ) {
	exit; // Exit if accessed directly
}

global $product;

if ( ! comments_open() ) {
	return;
}

?>
<div id="reviews">
	<div id="comments">

		<?php if ( have_comments() ) : ?>

			<ol class="commentlist">
				<?php wp_list_comments( apply_filters('woocommerce_product_review_list_args', array('callback' => 'woocommerce_comments') ) ); ?>
			</ol>

			<?php if ( get_comment_pages_count() > 1 && get_option('page_comments') ) :
				echo '<nav class="woocommerce-pagination">';
				paginate_comments_links( apply_filters('woocommerce_comment_pagination_args', array(
					'prev_text' => '&lang;',
					'next_text' => '&rang;',
					'type'      => 'list',
				) ) );
				echo '</nav>';
			endif; ?>

		<?php else : ?>

			<p class="woocommerce-noreviews"><?php esc_html_e('There are no reviews yet.', 'exoplanet' ); ?></p>

		<?php endif; ?>
	</div>

	<?php if ( get_option('woocommerce_review_rating_verification_required') === 'no' || wc_customer_bought_product('', get_current_user_id(), $product->id ) ) : ?>

		<div id="review_form_wrapper">
			<div id="review_form">
				<?php
					$commenter = wp_get_current_commenter();

					$comment_form = array(
						'title_reply'          => have_comments() ? esc_html__( 'Add a review', 'exoplanet' ) : sprintf( esc_html__( 'Be the first to review &ldquo;%s&rdquo;', 'exoplanet' ), get_the_title() ),
						'title_reply_to'       => esc_html__( 'Leave a Reply to %s', 'exoplanet' ),
						'comment_notes_before' => '',
						'comment_notes_after'  => '',
						'fields'               => array(
							'author' => '<div class="comment-form-author-email clearfix"><p class="comment-form-author"><input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" aria-required="true" placeholder="'. esc_html__( 'Name*', 'exoplanet' ).'" /></p>',
							'email'  => '<p class="comment-form-email"><input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" aria-required="true" placeholder="'.__('Email*', 'exoplanet' ).'"/></p></div>',
						),
						'label_submit'  => esc_html__( 'Submit', 'exoplanet' ),
						'logged_in_as'  => '',
						'comment_field' => ''
					);

					if ( $account_page_url = wc_get_page_permalink('myaccount') ) {
						$comment_form['must_log_in'] = '<p class="must-log-in">' .  sprintf( esc_html__( 'You must be <a href="%s">logged in</a> to post a review.', 'exoplanet' ), esc_url( $account_page_url ) ) . '</p>';
					}

					if ( get_option('woocommerce_enable_review_rating') === 'yes') {
						$comment_form['comment_field'] = '<p class="comment-form-rating"><label for="rating">' . esc_html__( 'Your Rating', 'exoplanet' ) .'</label><select name="rating" id="rating">
							<option value="">' . esc_html__( 'Rate&hellip;', 'exoplanet' ) . '</option>
							<option value="5">' . esc_html__( 'Perfect', 'exoplanet' ) . '</option>
							<option value="4">' . esc_html__( 'Good', 'exoplanet' ) . '</option>
							<option value="3">' . esc_html__( 'Average', 'exoplanet' ) . '</option>
							<option value="2">' . esc_html__( 'Not that bad', 'exoplanet' ) . '</option>
							<option value="1">' . esc_html__( 'Very Poor', 'exoplanet' ) . '</option>
						</select></p>';
					}

					$comment_form['comment_field'] .= '<p class="comment-form-comment"><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" placeholder="'. esc_html__('Your Review', 'exoplanet' ) .'"></textarea></p>';

					comment_form( apply_filters('woocommerce_product_review_comment_form_args', $comment_form ) );
				?>
			</div>
		</div>

	<?php else : ?>

		<p class="woocommerce-verification-required"><?php esc_html_e('Only logged in customers who have purchased this product may leave a review.', 'exoplanet'); ?></p>

	<?php endif; ?>

	<div class="clear"></div>
</div>
