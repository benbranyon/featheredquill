<?php
/**
 * Template Name: Submit Site Template
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
<?php 
if(!is_user_logged_in()):
wp_redirect( home_url('/') );
endif;

$nominee_site_publish_type = (function_exists('ot_get_option'))? ot_get_option( 'nominee_site_publish_type', 'pending' ) : 'pending';

$success_message = '';
$current_user = wp_get_current_user();
$author_link = get_author_posts_url( $current_user->ID );
if( isset ( $_POST['submit_nominee'] ) ) {
	$errors = array();
	$check = true;
	
	$post_title = $_POST['site_name'];
	$post_content = sanitize_text_field($_POST['submit_description']);
	$submit_website = sanitize_text_field($_POST['submit_website']);
	
	if ( $post_title == '' ){
		$errors['site_name'] = '<span class="color">'.esc_html__('Please Type your site name', 'awards').'</span>';
		$check = false;
	}		
	
	if ( $post_content == '' ){
		$errors['submit_description'] = '<span class="color">'.esc_html__('Please Type your site description', 'awards').'</span>';
		$check = false;
	}
	
	if ( $submit_website == '' ){
		$errors['submit_website'] = '<span class="color">'.esc_html__('Please Type your site URL', 'awards').'</span>';
		$check = false;
	}
	
	if ($_FILES['submit_nominees_image']['size'] == 0) {
		$errors['submit_nominees_image'] = '<span class="color">'.esc_html__('Please upload screenshot', 'awards').'</span>';
		$check = false;
	}
	
	if($check){
		$my_post = array(
		'post_title'    => $post_title,
		'post_content'  => $post_content,
		'post_status'   => $nominee_site_publish_type,
		'post_author'   => $current_user->ID,
		'post_type'     => 'nominee',
		);
		
		// Insert the post into the database
		$post_id = wp_insert_post( $my_post );
		
		if(isset($_POST['submit_color'])){
			$terms1 = $_POST['submit_color'];
			wp_set_post_terms( $post_id, $terms1, 'nominee_color' );
		}
		
		if(isset($_POST['submit_software'])){
			$terms2 = $_POST['submit_software'];
			wp_set_post_terms( $post_id, $terms2, 'nominee_software' );
		}
		
		if(isset($_POST['submit_category'])){
			$terms3 = $_POST['submit_category'];
			wp_set_post_terms( $post_id, $terms3, 'nominee_category' );
		}
		
		if(isset($_POST['submit_tags'])){
			$terms4 = $_POST['submit_tags'];
			wp_set_post_terms( $post_id, $terms4, 'nominee_tag' );
		}		
		
		if ($_FILES) {
			array_reverse($_FILES);
			foreach ($_FILES as $file => $array) {
				$set_feature = 1; //if $i ==0 then we are dealing with the first post
				$newupload = awards_insert_attachment($file,$post_id, $set_feature);
			}
		}

		update_post_meta( $post_id, 'nominee_site_url', $submit_website );
		$redirect_url =(function_exists('ot_get_option'))? ot_get_option( 'thank_you_page' ) : '';
		if($redirect_url != ''){
			wp_redirect(esc_url(get_permalink($redirect_url)));
		} else{
			$success_message = esc_html__('Site Submit Successful!', 'awards');
		}		
		
	}
}

//submit nominee for paid option
if( isset ( $_POST['submit_nominee_paid'] ) ) {
	$errors = array();
	$check = true;
	
	$post_title = $_POST['site_name'];
	$post_content = sanitize_text_field($_POST['submit_description']);
	$submit_website = sanitize_text_field($_POST['submit_website']);
	
	$payment_options = $_POST['payment_options'];
	
	if ( $post_title == '' ){
		$errors['site_name'] = '<span class="color">'.esc_html__('Please Type your site name', 'awards').'</span>';
		$check = false;
	}		
	
	if ( $post_content == '' ){
		$errors['submit_description'] = '<span class="color">'.esc_html__('Please Type your site description', 'awards').'</span>';
		$check = false;
	}
	
	if ( $submit_website == '' ){
		$errors['submit_website'] = '<span class="color">'.esc_html__('Please Type your site URL', 'awards').'</span>';
		$check = false;
	}
	
	if ($_FILES['submit_nominees_image']['size'] == 0) {
		$errors['submit_nominees_image'] = '<span class="color">'.esc_html__('Please upload screenshot', 'awards').'</span>';
		$check = false;
	}
	
	if($check){
		$my_post = array(
		'post_title'    => $post_title,
		'post_content'  => $post_content,
		'post_status'   => $nominee_site_publish_type,
		'post_author'   => $current_user->ID,
		'post_type'     => 'nominee',
		);
		
		// Insert the post into the database
		$post_id = wp_insert_post( $my_post );
		if(isset($_POST['submit_color'])){
			$terms1 = $_POST['submit_color'];
			wp_set_post_terms( $post_id, $terms1, 'nominee_color' );
		}
		
		if(isset($_POST['submit_software'])){
			$terms2 = $_POST['submit_software'];
			wp_set_post_terms( $post_id, $terms2, 'nominee_software' );
		}
		
		if(isset($_POST['submit_category'])){
			$terms3 = $_POST['submit_category'];
			wp_set_post_terms( $post_id, $terms3, 'nominee_category' );
		}
		
		if(isset($_POST['submit_tags'])){
			$terms4 = $_POST['submit_tags'];
			wp_set_post_terms( $post_id, $terms4, 'nominee_tag' );
		}
		
		if ($_FILES) {
			array_reverse($_FILES);
			foreach ($_FILES as $file => $array) {
				$set_feature = 1; //if $i ==0 then we are dealing with the first post
				$newupload = awards_insert_attachment($file,$post_id, $set_feature);
			}
		}

		update_post_meta( $post_id, 'nominee_site_url', $submit_website );
		update_post_meta( $post_id, 'nominee_site_payment_price', $payment_options );
		$redirect_url =(function_exists('ot_get_option'))? ot_get_option( 'paid_submit_site_page' ) : '';
		if($redirect_url != ''){
			$new_url = get_permalink($redirect_url);
			$url = add_query_arg( array('post_id' => $post_id), $new_url );
			wp_redirect(esc_url($url));
		}		
		
	}
}

if( isset ( $_POST['submit_nominee_for'] ) &&  isset( $_POST['reg_nominee_for'] ) ) {	
	wp_update_user( array( 'ID' => $current_user->ID, 'role' => 'contributor' ) );	
}
?>
<?php get_header(); ?>

	<?php get_template_part( 'layout/before', '' ); ?>
    <?php 
	if(is_user_logged_in()):
	$user_meta=get_userdata($current_user->ID);
	$user_roles=$user_meta->roles;
	if(in_array("administrator", $user_roles) || in_array("contributor", $user_roles)): ?>
    <div class="submit-site-section">
    	<div class="col-md-10 col-md-offset-1">
            <form class="contact-form search-top form-horizontal" method="post" enctype="multipart/form-data" autocomplete="off">
                <div class="section-ab-title">
                    <h4><?php esc_html_e('Site Details', 'awards'); ?></h4>
                </div>
                <div class="content clearfix">
                	<div class="form-group"><p class="success-message color"><?php echo esc_html($success_message); ?></p></div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label text-left"></label>
                        <div class="col-sm-10">
                            <p class="color"><?php esc_html_e('* Required Fields', 'awards'); ?></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label text-left"><?php esc_html_e('Site name *', 'awards'); ?>
                        <?php if(isset($errors['site_name'])) echo wp_kses($errors['site_name'], array('span'=>array('class'=>array()))); ?>
                        </label>
                        <div class="col-sm-10">
                            <input type="text" value="<?php if(isset($_POST['site_name'])) echo esc_html($_POST['site_name']); ?>" class="form-control" name="site_name">
                        </div>
                    </div>
    
                    <div class="form-group">
                        <label class="col-sm-2 control-label text-left"><?php esc_html_e('Site URL *', 'awards'); ?>
                        <?php if(isset($errors['submit_website'])) echo wp_kses($errors['submit_website'], array('span'=>array('class'=>array()))); ?>
                        </label>
                        <div class="col-sm-10">
                            <input type="text" value="<?php if(isset($_POST['submit_website'])) echo esc_html($_POST['submit_website']); ?>" class="form-control" name="submit_website" placeholder="<?php esc_attr_e('http://', 'awards'); ?>">
                        </div>
                    </div>
    
                    <div class="form-group">
                        <label class="col-sm-2 control-label text-left"><?php esc_html_e('Description *', 'awards'); ?>
                        <?php if(isset($errors['submit_description'])) echo wp_kses($errors['submit_description'], array('span'=>array('class'=>array()))); ?>
                        </label>
                        <div class="col-sm-10">
                            <textarea name="submit_description" class="form-control"><?php if(isset($_POST['submit_description'])) echo esc_html($_POST['submit_description']); ?></textarea>
                        </div>
                    </div>
    
                    <div class="form-group">
                        <?php
                        $terms = get_terms( 'nominee_color', array( 'hide_empty' => false ) );
                        ?>
                        <label class="col-sm-2 control-label text-left"><?php esc_html_e('Colors *', 'awards'); ?></label>
                        <div class="col-sm-10">
                            <select name="submit_color[]" class="selectpicker form-control" multiple="multiple" data-size="8">
                                <?php 
								foreach ( $terms as $term ):
								?>
                                <option value="<?php echo esc_html($term->term_id); ?>"><?php echo esc_html($term->name); ?></option>
                                <?php 
								endforeach; ?>
                            </select>
                        </div>
                    </div>
    
                    <div class="form-group">
                        <?php
                        $terms1 = get_terms( 'nominee_software', array( 'hide_empty' => false ) );
                        ?>
                        <label class="col-sm-2 control-label text-left"><?php esc_html_e('Software *', 'awards'); ?></label>
                        <div class="col-sm-10">
                            <select name="submit_software[]" class="selectpicker form-control" multiple="multiple" data-size="8" data-live-search="false">
                                <?php foreach ( $terms1 as $term ): ?>
                                <option data-tokens="<?php echo esc_html($term->term_id); ?>" value="<?php echo esc_html($term->term_id); ?>"><?php echo esc_html($term->name); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
    
                    <div class="form-group">
                        <?php
                        $terms2 = get_terms( 'nominee_category', array( 'hide_empty' => false ) );
                        ?>
                        <label class="col-sm-2 control-label text-left"><?php esc_html_e('Categories *', 'awards'); ?></label>
                        <div class="col-sm-10">
                            <select name="submit_category[]" class="selectpicker form-control" multiple="multiple" data-size="8">
                                <?php foreach ( $terms2 as $term ): ?>
                                <option data-tokens="<?php echo esc_html($term->term_id); ?>" value="<?php echo esc_html($term->term_id); ?>"><?php echo esc_html($term->name); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
    
                    <div class="form-group">
                        <?php
                        $terms3 = get_terms( 'nominee_tag', array( 'hide_empty' => false ) );
                        ?>
                        <label class="col-sm-2 control-label text-left"><?php esc_html_e('Tags *', 'awards'); ?></label>
                        <div class="col-sm-10">
                            <select name="submit_tags[]" class="selectpicker form-control" multiple="multiple" data-size="8">
                                <?php foreach ( $terms3 as $term ): ?>
                                <option data-tokens="<?php echo esc_html($term->term_id); ?>" value="<?php echo esc_html($term->term_id); ?>"><?php echo esc_html($term->name); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
    
                    <div class="form-group">
                        <label class="col-sm-2 control-label text-left"><?php esc_html_e('Screenshot *', 'awards'); ?> <small><?php esc_html_e('(695px x 496px)', 'awards'); ?>
                        </small>
                        <?php if(isset($errors['submit_nominees_image'])) echo wp_kses($errors['submit_nominees_image'], array('span'=>array('class'=>array()))); ?>
                        </label>
                        <div class="col-sm-10">
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-preview thumbnail"></div>
                                <br>
                                <span class="btn btn-primary btn-file">
                                    <span class="fileupload-new"><?php esc_html_e('Select Screenshot', 'awards'); ?></span>
                                    <span class="fileupload-exists"><?php esc_html_e('Change', 'awards'); ?></span>
                                    <input type="file" name="submit_nominees_image">
                                </span>
                                <a href="#" class="btn btn-primary fileupload-exists" data-dismiss="fileupload"><?php esc_html_e('Remove', 'awards'); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class="section-ab-title">
                    <h4><?php esc_html_e('Payment Details', 'awards'); ?></h4>
                </div>
                <div class="content clearfix">
                    <div class="form-group">
                        <label class="col-sm-2 control-label text-left"><?php esc_html_e('Select Plan', 'awards'); ?></label>
                        <div class="col-sm-10">
                            <select id="payment_options" name="payment_options" class="form-control" data-size="3" title="<?php esc_attr_e('Select your plan', 'awards'); ?>">
                                <option value="free_submission" selected="selected"><?php esc_html_e('Free Submission', 'awards'); ?></option>
                                <?php
								$args = array('post_type' => 'pricing', 'posts_per_page' => -1); 					
								$wp_query = new WP_Query($args);
								if ( $wp_query->have_posts() ) : while ( $wp_query->have_posts() ) : $wp_query->the_post();
								?>
                                <option value="<?php echo get_post_meta( get_the_ID(), 'price_text', true ); ?>"><?php echo get_the_title(). ' (' . get_post_meta( get_the_ID(), 'price_currency', true ) . get_post_meta( get_the_ID(), 'price_text', true ) .') '; ?></option>
                                <?php
								endwhile;
								endif;
								?>
                                <?php wp_reset_query(); ?>                                
                            </select>
                        </div>
                    </div>
                    <div class="product-fields-free-version">
                    <div class="form-group">
                        <label class="col-sm-2 control-label text-left"></label>
                        <div class="col-sm-10">
                            <button class="btn btn-primary" type="submit" name="submit_nominee"><?php esc_html_e('Submit', 'awards'); ?></button>
                        </div>
                    </div>
                    </div>
                    <div class="product-fields-paid-version">
                    <div class="form-group">
                        <label class="col-sm-2 control-label text-left"></label>
                        <div class="col-sm-10">
                            <button class="btn btn-primary" type="submit" name="submit_nominee_paid"><?php esc_html_e('Submit & Pay', 'awards'); ?></button>
                        </div>
                    </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php
	else:
	?>
    <div class="submit-site-section">
    	<div class="login-page content">
    	<form class="contact-form search-top form-horizontal" method="post">
        	<div class="form-group">
        		<label for="reg_as_nominee"><input type="checkbox" class="nominee-text" name="reg_nominee_for" id="reg_nominee_for" value="" />
       			<?php esc_html_e( 'Apply for Agency or Nominee?', 'awards' ); ?></label>
       		</div>
            <div class="form-group">
            	<button class="btn btn-primary" type="submit" name="submit_nominee_for"><?php esc_html_e('Apply', 'awards'); ?></button>
            </div>
        </form>
        </div>
    </div>
    <?php 
	endif;
	
	endif; ?>
    
    <?php get_template_part( 'layout/after', '' ); ?>
    
<?php get_footer(); ?>