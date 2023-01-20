<?php
ob_start();
class themestall_registration_form{
	// form properties
    private $username;
    private $email;
    private $password;
	function __construct(){
		add_shortcode('ts_registration_form', array($this, 'shortcode'));
	}
	public function registration_form(){ ?>
    	<div class="section-ab-title">
            <h4><?php echo esc_html__('Register', 'themestall'); ?></h4>
        </div>
        <div class="login-page content">
            <form method="post" action="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>">
                <div class="login-form">
                <input name="reg_name" type="text" class="form-control login-field" value="<?php echo(isset($_REQUEST['reg_name']) ? $_REQUEST['reg_name'] : null); ?>" placeholder="<?php echo esc_html__('Username*', 'themestall'); ?>" id="reg-name">
                <input name="reg_email" type="email" class="form-control login-field" value="<?php echo(isset($_REQUEST['reg_email']) ? $_REQUEST['reg_email'] : null); ?>" placeholder="<?php echo esc_html__('Email*', 'themestall'); ?>" id="reg-email">
                <input name="reg_password" type="password" class="form-control login-field" value="<?php echo(isset($_REQUEST['reg_password']) ? $_REQUEST['reg_password'] : null); ?>"
         placeholder="<?php echo esc_html__('Password*', 'themestall'); ?>" id="reg-pass">
         <input type="checkbox" class="login-checkbox" name="author_role" value="0" /><?php echo esc_html__(' Apply for Agency or Nominee?', 'themestall'); ?>
         <a href="<?php echo wp_lostpassword_url( get_permalink() ); ?>" class="align-text-right"><?php echo esc_html__(' Forget Password?', 'themestall'); ?></a>
         <br/>
                <input class="btn btn-primary" type="submit" name="reg_submit" value="Register"/>
                </div>
            </form>
        </div>
    <?php
    }
	function validation(){ 
        if (empty($this->username) || empty($this->password) || empty($this->email)) {
            return new WP_Error('field', 'Required form field is missing');
        } 
        if (strlen($this->username) < 4) {
            return new WP_Error('username_length', 'Username too short. At least 4 characters is required');
        } 
        if (strlen($this->password) < 5) {
            return new WP_Error('password', 'Password length must be greater than 5');
        } 
        if (!is_email($this->email)) {
            return new WP_Error('email_invalid', 'Email is not valid');
        } 
        if (email_exists($this->email)) {
            return new WP_Error('email', 'Email Already in use');
        } 
        $details = array('Username' => $this->username); 
        foreach ($details as $field => $detail) {
            if (!validate_username($detail)) {
                return new WP_Error('name_invalid', 'Sorry, the "' . $field . '" you entered is not valid');
            }
        } 
    }
	function registration(){
		$username = esc_attr($this->username);
		$password = esc_attr($this->password);
		$email = esc_attr($this->email);
		$user_role = esc_attr($this->author_role);
    $userdata = array(
        'user_login' => esc_attr($this->username),
        'user_email' => esc_attr($this->email),
        'user_pass' => esc_attr($this->password),
		'role'		=> $user_role
    ); 
    if (is_wp_error($this->validation())) {
        echo '<div style="margin-bottom: 6px" class="btn-block btn btn-primary">';
        echo '<strong>' . $this->validation()->get_error_message() . '</strong>';
        echo '</div>';
    } else {
        $register_user = wp_insert_user($userdata);
        if (!is_wp_error($register_user)) {
			
			$site_title = get_bloginfo();
			$admin_email = get_bloginfo('admin_email');
			
			$headers[] = "From: {$site_title} <{$admin_email}>";
			$headers[] = "Content-Type: text/html";
			$headers[] = "MIME-Version: 1.0\r\n";
			
			//$msg = $this -> get_option('_new_user');
			$suject = esc_html__('New user registration ', 'themestall');			
			
			$msg =  ' /n/n Username: '.$username;
			//$msg = str_replace("%USER_LOGIN%", $nm_email, $msg);
			$msg .= '/n/n Password: '.$password;
			$msg .= '/n/n Site Title: '. $site_title;
			$msg .= '<p><a href="' . wp_login_url() . '" title="Login">Click here to login</a>';

			if(wp_mail($email, $suject, $msg, $headers)){
				
				echo '<div style="margin-bottom: 6px" class="btn-block btn btn-primary">';
            	echo '<strong>Registration complete. Please Check Your Email</strong>';
            	echo '</div>';
			}else{
				echo '<div style="margin-bottom: 6px" class="btn-block btn btn-primary">';
            	echo '<strong>Registration complete.</strong>';
            	echo '</div>';
				
			}
 
            
        } else {
			echo '<div style="margin-bottom: 6px" class="btn-block btn btn-primary">';
            echo '<strong>Registration Not Complete, Please try again later.</strong>';
            echo '</div>';
            
        }
    } 
}
function shortcode(){
	ob_start(); 
        if (isset($_POST['reg_submit']) && $_REQUEST['reg_submit']) {
            $this->username = $_REQUEST['reg_name'];
            $this->email = $_REQUEST['reg_email'];
            $this->password = $_REQUEST['reg_password'];
			
			if(isset($_POST['author_role'])){
			if($_REQUEST['author_role'] == 0){
				$this->author_role = 'contributor';
			} else{
				$this->author_role = 'subscriber';
			}
			} else{
				$this->author_role = 'subscriber';
			}
 
            $this->validation();
            $this->registration();
        } 
        $this->registration_form();
        return ob_get_clean();
    }
}
new themestall_registration_form;

include 'login.php';
include 'email.php';
?>