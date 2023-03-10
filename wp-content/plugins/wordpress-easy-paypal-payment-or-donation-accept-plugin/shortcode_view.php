<?php

function wppp_render_paypal_button_with_other_amt($args) {
    extract(shortcode_atts(array(
        'email' => '',
        'description' => '',
        'default_amount' => '',
        'other_amount_label' => 'Amount:',
        'other_amount_placeholder' => '',
        'currency' => 'USD',
        'reference' => '',
        'reference_placeholder' => '',
        'return' => site_url(),
        'cbt' => '',
        'country_code' => '',
        'button_image' => '',
        'button_text' => '',
        'cancel_url' => '',
        'new_window' => '',
        'tax' => '',
        'rm' => '0',
        'validate_ipn' => '',
                    ), $args));

    $email = apply_filters('wppp_widget_any_amt_email', $email);

    $output = "";
    $payment_button_img_src = get_option('payment_button_type');
    if (!empty($button_image)) {
        $payment_button_img_src = $button_image;
    }

    if (empty($email)) {
        $output = '<p style="color: red;">Error! Please enter your PayPal email address for the payment using the "email" parameter in the shortcode</p>';
        return $output;
    }

    if (empty($description)) {
        $output = '<p style="color: red;">Error! Please enter a description for the payment using the "description" parameter in the shortcode</p>';
        return $output;
    }

    $window_target = '';
    if (!empty($new_window)) {
        $window_target = 'target="_blank"';
    }
    $output .= '<div class="wp_paypal_button_widget_any_amt">';
    $output .= '<form name="_xclick" class="wp_accept_pp_button_form_any_amount" action="https://www.paypal.com/cgi-bin/webscr" method="post" ' . esc_attr($window_target) . '>';

    $output .= '<div class="wp_pp_button_amount_section">'.esc_attr($other_amount_label).' <input type="number" min="1" step="any" name="amount" value="' . esc_attr($default_amount) . '" placeholder="'.esc_attr($other_amount_placeholder).'" class="wpapp_other_amt_input" style="max-width:80px;"> ' . esc_attr($currency) . '</div>';

    if (!empty($reference)) {
        $output .= '<div class="wp_pp_button_reference_section">';
        $output .= '<label for="wp_pp_button_reference">' . esc_attr($reference) . '</label>';
        $output .= '<br />';
        $output .= '<input type="hidden" name="on0" value="' . apply_filters('wp_pp_button_reference_name', 'Reference') . '" />';
        $output .= '<input type="text" name="os0" value="' . apply_filters('wp_pp_button_reference_value', '') . '" placeholder="'.esc_attr($reference_placeholder).'" class="wp_pp_button_reference" />';
        $output .= '</div>';
    }

    $output .= '<input type="hidden" name="cmd" value="_xclick"><input type="hidden" name="bn" value="TipsandTricks_SP" />';
    $output .= '<input type="hidden" name="business" value="' . esc_attr($email) . '">';
    $output .= '<input type="hidden" name="currency_code" value="' . esc_attr($currency) . '">';
    $output .= '<input type="hidden" name="item_name" value="' . esc_attr(stripslashes($description)) . '">';
    $output .= '<input type="hidden" name="return" value="' . esc_url($return) . '" />';
    $output .= '<input type="hidden" name="rm" value="' . esc_attr($rm) . '" />';
    if (!empty($cbt)) {
        $output .= '<input type="hidden" name="cbt" value="' . esc_attr($cbt) . '" />';
    }
    if (is_numeric($tax)) {
        $output .= '<input type="hidden" name="tax" value="' . esc_attr($tax) . '" />';
    }
    if (!empty($cancel_url)) {
        $output .= '<input type="hidden" name="cancel_return" value="' . esc_url($cancel_url) . '" />';
    }
    if (!empty($country_code)) {
        $output .= '<input type="hidden" name="lc" value="' . esc_attr($country_code) . '" />';
    }
    if (!empty($validate_ipn)) {
        $notify_url = site_url() . '/?wpapp_paypal_ipn=process';
        $output .= '<input type="hidden" name="notify_url" value="' . esc_url($notify_url) . '" />';
    }

    $output .= '<div class="wp_pp_button_submit_btn">';
    if (!empty($button_text)) {//Use text button
        $button_class = apply_filters('wppp_text_button_class', '');
        $output .= '<input type="submit" name="submit" class="' . esc_attr($button_class) . '" value="' . esc_attr($button_text) . '" />';
    } else {//Use image button
        $output .= '<input type="image" id="buy_now_button" class="buy_now_button_image" src="' . esc_url($payment_button_img_src) . '" border="0" name="submit" alt="Make payments with PayPal">';
    }
    $output .= '</div>';
    $output .= '</form>';
    $output .= '</div>';
    return $output;
}

function wppp_render_paypal_button_form($args) {
    extract(shortcode_atts(array(
        'email' => '',
        'currency' => 'USD',
        'options' => 'Payment for Service 1:15.50|Payment for Service 2:30.00|Payment for Service 3:47.00',
        'return' => site_url(),
        'cbt' => '',
        'reference' => 'Your Email Address',
        'reference_placeholder' => '',
        'other_amount' => '',
        'other_amount_label' => 'Other Amount:',
        'other_amount_placeholder' => '',
        'country_code' => '',
        'payment_subject' => '',
        'button_image' => '',
        'button_text' => '',
        'cancel_url' => '',
        'new_window' => '',
        'tax' => '',
        'rm' => '0',
        'validate_ipn' => '',
                    ), $args));

    $email = apply_filters('wppp_widget_email', $email);
    if (empty($email)) {
        $output = '<p style="color: red;">Error! Please enter your PayPal email address for the payment using the "email" parameter in the shortcode</p>';
        return $output;
    }

    $options = explode('|', $options);
    $html_options = '';
    foreach ($options as $option) {
        $option = explode(':', $option);
        $name = esc_attr($option[0]);
        $price = esc_attr($option[1]);
        $html_options .= "<option data-product_name='{$name}' value='{$price}'>{$name} - {$price}</option>";
    }

    $payment_button_img_src = get_option('payment_button_type');
    if (!empty($button_image)) {
        $payment_button_img_src = $button_image;
    }

    $window_target = '';
    if (!empty($new_window)) {
        $window_target = 'target="_blank"';
    }
    ?>
    <div class="wp_paypal_button_widget">
        <form name="_xclick" class="wp_accept_pp_button_form" action="https://www.paypal.com/cgi-bin/webscr" method="post" <?php echo esc_attr($window_target); ?> >
            <div class="wp_pp_button_selection_section">
                <select class="wp_paypal_button_options">
    <?php echo wp_kses( $html_options, wpapp_allowed_tags() ); ?>
                </select>
            </div>

                    <?php
                    if (!empty($other_amount)) {
                        echo '<div class="wp_pp_button_other_amt_section">';
                        echo esc_attr($other_amount_label).' <input type="number" min="1" step="any" name="other_amount" value="" placeholder="'.esc_attr($other_amount_placeholder).'" class="wpapp_other_amt_input" style="max-width:80px;"> ' . esc_attr($currency);
                        echo '</div>';
                    }

                    if (!empty($reference)) {
                        echo '<div class="wp_pp_button_reference_section">';
                        echo '<label for="wp_pp_button_reference">' . esc_attr($reference) . '</label>';
                        echo '<br />';
                        echo '<input type="hidden" name="on0" value="' . apply_filters('wp_pp_button_reference_name', 'Reference') . '" />';
                        echo '<input type="text" name="os0" value="' . apply_filters('wp_pp_button_reference_value', '') . '" class="wp_pp_button_reference" placeholder="'.esc_attr($reference_placeholder).'" />';
                        echo '</div>';
                    }

                    if (!empty($payment_subject)) {
                        ?>
                <input type="hidden" name="on1" value="Payment Subject" />
                <input type="hidden" name="os1" value="<?php echo esc_attr($payment_subject); ?>" />
            <?php } ?>

            <input type="hidden" name="cmd" value="_xclick">
            <input type="hidden" name="bn" value="TipsandTricks_SP" />
            <input type="hidden" name="business" value="<?php echo esc_attr($email); ?>">
            <input type="hidden" name="currency_code" value="<?php echo esc_attr($currency); ?>">
            <input type="hidden" name="item_name" value="">
            <input type="hidden" name="amount" value="">
            <input type="hidden" name="return" value="<?php echo esc_url($return); ?>" />
            <input type="hidden" name="rm" value="<?php echo esc_attr($rm); ?>" />
            <input type="hidden" name="email" value="" />
    <?php
    if (!empty($cbt)) {
        echo '<input type="hidden" name="cbt" value="' . esc_attr($cbt) . '" />';
    }
    if (is_numeric($tax)) {
        echo '<input type="hidden" name="tax" value="' . esc_attr($tax) . '" />';
    }
    if (!empty($cancel_url)) {
        echo '<input type="hidden" name="cancel_return" value="' . esc_url($cancel_url) . '" />';
    }
    if (!empty($country_code)) {
        echo '<input type="hidden" name="lc" value="' . esc_attr($country_code) . '" />';
    }
    if (!empty($validate_ipn)) {
        $notify_url = site_url() . '/?wpapp_paypal_ipn=process';
        $output .= '<input type="hidden" name="notify_url" value="' . esc_url($notify_url) . '" />';
    }

    echo '<div class="wp_pp_button_submit_btn">';
    if (!empty($button_text)) {//Use text button
        $button_class = apply_filters('wppp_text_button_class', '');
        echo '<input type="submit" name="submit" class="' . esc_attr($button_class) . '" value="' . esc_attr($button_text) . '" />';
    } else {//Use image button
        echo '<input type="image" id="buy_now_button" class="buy_now_button_image" src="' . esc_url($payment_button_img_src) . '" border="0" name="submit" alt="Make payments with PayPal">';
    }
    echo '</div>';
    ?>
        </form>
    </div>

    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $('.wp_accept_pp_button_form').submit(function(e) {
                var form_obj = $(this);
                var options_name = form_obj.find('.wp_paypal_button_options :selected').attr('data-product_name');
                form_obj.find('input[name=item_name]').val(options_name);

                var options_val = form_obj.find('.wp_paypal_button_options').val();
                var other_amt = form_obj.find('input[name=other_amount]').val();
                if (!isNaN(other_amt) && other_amt.length > 0) {
                    options_val = other_amt;
                }
                form_obj.find('input[name=amount]').val(options_val);
                return;
            });
        });
    </script>
    <?php
}
