<?php
ob_start();
class themestall_author_email{
	// form properties
	function __construct(){
		add_shortcode('author_email', array($this, 'shortcode_2'));
	}
	public function author_email_send($currentuseremail, $authoremail){ 
	?>
    <div class="col-md-7 m30" id="author-email-form">
        <div class="section-ab-title">
            <h4><?php esc_html_e('Contact Agency', 'awards'); ?></h4>
        </div>

        <div class="content">
            <form class="contact-form search-top" method="post" name="submit-agency-form" id="emailcontactform" action="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" name="submit_name" placeholder="<?php esc_attr_e('Full Name', 'awards'); ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <?php 
                            $email = '';
                            if(is_user_logged_in()): ?>
                                <?php $email = $currentuseremail; ?>
                            <?php endif; ?>
                            <input type="email" value="<?php echo esc_attr($email); ?>" class="form-control" name="submit_email" placeholder="<?php esc_attr_e('Email', 'awards'); ?>">
                            
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" name="submit_phone" placeholder="<?php esc_attr_e('Phone', 'awards'); ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" name="submit_website" placeholder="<?php esc_attr_e('Website', 'awards'); ?>">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <select name="topic" class="selectpicker form-control" data-size="8" multiple title="<?php esc_attr_e('How may I help?', 'awards'); ?>">
                            <option value="website-design"><?php esc_html_e('Website Design', 'awards'); ?></option>
                            <option value="graphic-design"><?php esc_html_e('Graphic Design', 'awards'); ?></option>
                            <option value="installation"><?php esc_html_e('Installation Service', 'awards'); ?></option>
                            <option value="offtopic"><?php esc_html_e('Off Topic', 'awards'); ?></option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" name="budget" placeholder="<?php esc_attr_e('What is max budget?', 'awards'); ?>">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <textarea name="comment" placeholder="<?php esc_attr_e('Add full review here..', 'awards'); ?>" class="form-control"></textarea>
                        <button name="submit_email_submit" class="btn btn-primary" type="submit"><?php esc_html_e('Submit Review', 'awards'); ?></button>
                    </div>
                </div>
                <input type="hidden" value="<?php echo esc_attr($authoremail); ?>" name="email_to" id="email_to" />
            </form>
        </div><!-- end content -->
    </div><!-- end col -->
    <?php
    }
	
	function email_wp_send(){
		
		echo 'test';
		$name = $this->submit_name;
		$email = $this->submit_email;
		$phone = $this->submit_phone;
		$website = $this->submit_website;
		$topic = $this->topic;
		$budget = $this->budget;
		$comment = $this->comment;
		$email_to = $this->email_to;
			
		$site_title = get_bloginfo();
	
		$headers[] = "From: {$site_title} <{$email}>";
		$headers[] = "Content-Type: text/html";
		$headers[] = "MIME-Version: 1.0\r\n";
	
		$suject = esc_html__('From Author ', 'themestall');
		
		$message .= esc_html__('Name: ', 'awards') . $name;
		$message .= esc_html__('\n\n Phone: ', 'awards') . $phone;
		$message .= esc_html__('\n\n Website: ', 'awards') . $website;
		$message .= esc_html__('\n\n Budget: ', 'awards') . $budget;
		$message .= esc_html__('\n\n Topic: ', 'awards') . $topic;
		$message .= esc_html__('\n\n Message: ', 'awards') .$comment;

	if(wp_mail($email_to, $suject, $message, $headers)){		
		echo '<div style="margin-bottom: 6px" class="btn-block btn btn-primary">';
		echo '<strong>Successfully Sent Email!</strong>';
		echo '</div>';
	}else{
		echo '<div style="margin-bottom: 6px" class="btn-block btn btn-primary">';
		echo '<strong>Email not sent, please contact site admin.</strong>';
		echo '</div>';
		
	}
}
function shortcode_2($atts = null){
	$atts = shortcode_atts( array(
		'current_email'   => '',
		'author_email'   => '',
	), $atts, 'shortcode' );
	ob_start(); 
        if (isset($_POST['submit_email_submit']) && $_REQUEST['submit_email_submit']) {
            /*$this->submit_name = $_REQUEST['submit_name'];
            $this->submit_email = $_REQUEST['submit_email'];
            $this->submit_phone = $_REQUEST['submit_phone'];
			$this->submit_website = $_REQUEST['submit_website'];
			$this->topic = $_REQUEST['topic'];
			$this->budget = $_REQUEST['budget'];
			$this->comment = $_REQUEST['comment'];
			$this->email_to = $_REQUEST['email_to'];*/
			
			$name = $_REQUEST['submit_name'];
			$email = $_REQUEST['submit_email'];
			$phone = $_REQUEST['submit_phone'];
			$website = $_REQUEST['submit_website'];
			$topic = $_REQUEST['topic'];
			$budget = $_REQUEST['budget'];
			$comment = $_REQUEST['comment'];
			$email_to = $_REQUEST['email_to'];
				
			$site_title = get_bloginfo();
		
			$headers[] = "From: {$site_title} <{$email}>";
			$headers[] = "Content-Type: text/html";
			$headers[] = "MIME-Version: 1.0\r\n";
		
			$suject = esc_html__('From Author ', 'themestall');
			
			$message .= esc_html__('Name: ', 'awards') . $name;
			$message .= esc_html__('\n\n Phone: ', 'awards') . $phone;
			$message .= esc_html__('\n\n Website: ', 'awards') . $website;
			$message .= esc_html__('\n\n Budget: ', 'awards') . $budget;
			$message .= esc_html__('\n\n Topic: ', 'awards') . $topic;
			$message .= esc_html__('\n\n Message: ', 'awards') .$comment;
			
            if(wp_mail($email_to, $suject, $message, $headers)){		
				echo '<div style="margin-bottom: 6px" class="btn-block btn btn-primary">';
				echo '<strong>Successfully Sent Email!</strong>';
				echo '</div>';
			}else{
				echo '<div style="margin-bottom: 6px" class="btn-block btn btn-primary">';
				echo '<strong>Email not sent, please contact site admin.</strong>';
				echo '</div>';
				
			}
        } 
        $this->author_email_send($atts['current_email'], $atts['author_email']);
        return ob_get_clean();
    }
}
new themestall_author_email;
?>