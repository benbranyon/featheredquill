<?php
/**
 * Template Name: Payment Template
 *
 * Description: A page template that provides a key component of WordPress as a CMS
 * by meeting the need for a carefully crafted introductory page. The front page template
 * in prestige consists of a page content area for adding text, images, video --
 * anything you'd like -- followed by front-page-only widgets in one or two columns.
 *
 * @package WordPress
 * @subpackage Awards
 * @since Awards 1.0
 */
?>
<?php get_header(); ?>

	<?php get_template_part( 'layout/before', '' ); ?>
    
    <div class="submit-site-section payment-page">
        <div class="col-md-10 col-md-offset-1">
        	<?php if(isset($_GET['post_id'])): ?>
        	<?php $posttitle = get_the_title($_GET['post_id']); ?>
            <?php $price = get_post_meta( $_GET['post_id'], 'nominee_site_payment_price', true ); ?>
            <?php if(function_exists('wp_cart_button_handler')):?>
        	<?php echo do_shortcode(wp_kses_post('[wp_cart_button name="'.$posttitle.'" price="'.$price.'"]')); ?>
            <?php else: ?>
            <h3><?php echo esc_html__('Activate your payment method', 'awards'); ?></h3>
            <?php endif; ?>
            <?php else: ?>
            <h3><?php echo esc_html__('No Payment is pending', 'awards'); ?></h3>
            <?php endif; ?>
        </div>
    </div>	
    
    <?php get_template_part( 'layout/after', '' ); ?>
    
<?php get_footer(); ?>