<?php
// custom frontend login form
function themestall_login_form() { 
?>
<div class="section-ab-title">
    <h4><?php echo esc_html__('Login', 'themestall'); ?></h4>
</div>
<div class="login-page content">
<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
    <div class="login-form">
        <input name="login_name" type="text" class="form-control" value="" placeholder="<?php echo esc_html__('Username*', 'themestall'); ?>" id="login-name" />
        <input  name="login_password" type="password" class="form-control" value="" placeholder="<?php echo esc_html__('Password*', 'themestall'); ?>" id="login-pass" />
        <input class="btn btn-primary" type="submit"  name="login_submit" value="<?php echo esc_html__('Login', 'themestall'); ?>" />
    </div>
</form>
</div>
<?php
}

function login_check( $username, $password ){
	global $user;
	
	$creds = array();
	$creds['user_login'] = $username;
	$creds['user_password'] =  $password;
	$creds['remember'] = true;
	$user = wp_signon( $creds, false );
	
	if ( is_wp_error($user) ) {
		echo esc_html__('Invalid Username or Password', 'themestall');
		}else{
		wp_redirect(home_url('wp-admin'));
	}
}

function login_check_process() {
	if (isset($_POST['login_submit'])) {
		login_check($_POST['login_name'], $_POST['login_password']);
	} 
	themestall_login_form();
}

function themestall_login_shortcode(){
	ob_start();
	login_check_process();
	return ob_get_clean();
}

add_shortcode('ts_custom_login_form', 'themestall_login_shortcode');

function add_theme_caps() {
    // gets the author role
    $role = get_role( 'contributor' );

    // This only works, because it accesses the class instance.
    // would allow the author to edit others' posts for current theme only
    $role->add_cap( 'upload_files' ); 
}
add_action( 'admin_init', 'add_theme_caps');
?>