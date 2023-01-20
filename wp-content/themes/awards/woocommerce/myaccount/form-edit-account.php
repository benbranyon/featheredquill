<?php
/**
 * Edit account form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-edit-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$current_user = wp_get_current_user();
if( isset ( $_POST['submit_nominee_for'] ) &&  isset( $_POST['reg_nominee_for'] ) ) {	
	wp_update_user( array( 'ID' => $current_user->ID, 'role' => 'contributor' ) );	
}

do_action( 'woocommerce_before_edit_account_form' ); ?>
<div class="section-ab-title"><h4><?php esc_html_e( 'Edit Account', 'awards' ); ?></h4></div>
<form class="woocommerce-EditAccountForm edit-account login-page content" action="" method="post">

	<?php do_action( 'woocommerce_edit_account_form_start' ); ?>

	<p class="woocommerce-FormRow woocommerce-FormRow--first form-row form-row-first">
		<label for="account_first_name"><?php esc_html_e( 'First name', 'awards' ); ?> <span class="required">*</span></label>
		<input type="text" class="form-control login-field" name="account_first_name" id="account_first_name" value="<?php echo esc_attr( $user->first_name ); ?>" />
	</p>
	<p class="woocommerce-FormRow woocommerce-FormRow--last form-row form-row-last">
		<label for="account_last_name"><?php esc_html_e( 'Last name', 'awards' ); ?> <span class="required">*</span></label>
		<input type="text" class="form-control login-field" name="account_last_name" id="account_last_name" value="<?php echo esc_attr( $user->last_name ); ?>" />
	</p>
	<div class="clear"></div>

	<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
		<label for="account_email"><?php esc_html_e( 'Email address', 'awards' ); ?> <span class="required">*</span></label>
		<input type="email" class="form-control login-field" name="account_email" id="account_email" value="<?php echo esc_attr( $user->user_email ); ?>" />
	</p>

	<fieldset>

		<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
			<label for="password_current"><?php esc_html_e( 'Current Password (leave blank to leave unchanged)', 'awards' ); ?></label>
			<input type="password" class="form-control login-field" name="password_current" id="password_current" />
		</p>
		<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
			<label for="password_1"><?php esc_html_e( 'New Password (leave blank to leave unchanged)', 'awards' ); ?></label>
			<input type="password" class="form-control login-field" name="password_1" id="password_1" />
		</p>
		<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
			<label for="password_2"><?php esc_html_e( 'Confirm New Password', 'awards' ); ?></label>
			<input type="password" class="form-control login-field" name="password_2" id="password_2" />
		</p>
	</fieldset>
	<div class="clear"></div>

	<?php do_action( 'woocommerce_edit_account_form' ); ?>

	<p>
		<?php wp_nonce_field( 'save_account_details' ); ?>
		<input type="submit" class="btn btn-primary" name="save_account_details" value="<?php esc_attr_e( 'Save changes', 'awards' ); ?>" />
		<input type="hidden" name="action" value="save_account_details" />
	</p>

	<?php do_action( 'woocommerce_edit_account_form_end' ); ?>
</form>

<?php do_action( 'woocommerce_after_edit_account_form' ); ?>

<?php 
	$user_meta=get_userdata($current_user->ID);
	$user_roles=$user_meta->roles;
	if(in_array("administrator", $user_roles) || in_array("contributor", $user_roles)): ?>    
    <?php else: ?>
    <div class="section-ab-title agency-info"><h4><?php esc_html_e( 'Edit Account', 'awards' ); ?></h4></div>
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
<?php endif; ?>
