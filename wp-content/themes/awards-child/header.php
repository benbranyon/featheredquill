<?php
/**
 * The Header for multipage of theme
 *
 * Displays all of the <head> section and everything up till </header>
 *
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php wp_head(); ?>
<style>
    .header{
        z-index: 99998;
        position: relative;
    }
</style>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <!-- LOADER -->
    <?php $display_preloader = (function_exists('ot_get_option'))? ot_get_option( 'display_preloader', 'on' ) : 'on';
    if($display_preloader != 'off'): ?>
        <div id="preloader">
            <?php $preloader = (function_exists('ot_get_option'))? ot_get_option( 'preloader', AWARDSTHEMEURI. '/images/loader.gif' ) : AWARDSTHEMEURI. '/images/loader.gif'; ?>
            <img class="preloader" src="<?php echo esc_url($preloader); ?>" alt="<?php echo esc_attr__('preloader image', 'awards'); ?>">
        </div><!-- end loader -->
    <?php endif; ?>
    <!-- END LOADER -->
    
    <!-- ******************************************
    START SITE HERE
    ********************************************** -->
	<div id="wrapper">
    	<?php $header_slide_menu = (function_exists('ot_get_option'))? ot_get_option( 'header_slide_menu', 'on' ) : 'off'; ?>
        <?php if($header_slide_menu != 'off'): ?>
    	<nav class="sidenav">
			<?php
			$extra_menu = '<li class="text-right"><a href="#" id="nav-close"><i class="flaticon-error"></i></a></li>';							
            wp_nav_menu(
                array(
                    'theme_location' => 'side-menu',
                    'menu_class' => 'list-unstyled main-menu',
                    'menu_id' => 'awardsSideMenu',
					'items_wrap'      => '<ul id="%1$s" class="%2$s">' .$extra_menu. '%3$s</ul>',
                    'container' => false,
                    'fallback_cb'     => 'awards_default_side_menu',
                )
            );
            ?> 
        </nav>
        <?php endif; ?>
    	
    	<header class="header">
            <nav class="navbar navbar-default">
                <div class="container-header">
                    <div class="navbar-header">
                        <?php $logo = (function_exists('ot_get_option'))? ot_get_option( 'main_logo', AWARDSTHEMEURI. '/images/logo.png' ) : AWARDSTHEMEURI. '/images/logo.png'; ?>
                        <a class="visible-sec navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
                            <?php if($logo != ''): ?>
                            <img src="<?php echo esc_url($logo); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
                            <?php else: ?>
                            <?php echo esc_html( get_bloginfo( 'name', 'display' ) ); ?>
                            <?php endif; ?>
                        </a>
                    </div>
                    <!-- end navbar header -->
                    <div class="hidden-sec slim-wrap" data-image="<?php echo esc_attr($logo); ?>" data-homelink="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <?php							      
                        $args_slim = array(
                        'theme_location'  => 'main-menu',
                        'menu_class'      => 'menu-items',
                        'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        'fallback_cb'     => '',
                        'container'       => '',
                        );											
                        wp_nav_menu( $args_slim );
                        ?>
                    </div>
                    <div id="bs-example-navbar-collapse-1" class="collapse navbar-collapse visible-sec">
                        <?php							
                        wp_nav_menu(
                            array(
                                'theme_location' => 'main-menu',
                                'menu_class' => 'nav navbar-nav navbar-left',
                                'menu_id' => 'awardsMainMenu',
                                'container' => false,
                                'fallback_cb'     => '',
                            )
                        );
                        ?>                            
                        
                        <ul class="nav navbar-nav navbar-right">
                            <?php
                            $search_icon_in_menu = (function_exists('ot_get_option'))? ot_get_option( 'search_icon_in_menu', 'on' ) : 'off';
                            if($search_icon_in_menu != 'off'):
								awards_custom_search_form();                                                      
                            endif; ?>
                            <?php if($header_slide_menu != 'off'): ?>
                            <li id="nav-expander" class="openmenu hidden-sm"><a href="#"><i class="flaticon-bars"></i></a></li>
                            <?php endif; ?>
                            <?php
							$header_submit_site_page = (function_exists('ot_get_option'))? ot_get_option( 'header_submit_site_page' ) : '';
							if($header_submit_site_page != ''):
                            $login_button_in_menu = (function_exists('ot_get_option'))? ot_get_option( 'login_button_in_menu', 'on' ) : 'on';
                            if($login_button_in_menu != 'off'):
								if ( is_user_logged_in() ):
									$header_submit_site_page = (function_exists('ot_get_option'))? ot_get_option( 'header_submit_site_page' ) : '';
									$log_in_url = get_permalink($header_submit_site_page);
								else:
									$header_login_page = (function_exists('ot_get_option'))? ot_get_option( 'header_login_page' ) : '';
									if($header_login_page != ''):
										$log_in_url = get_permalink($header_login_page);
									else:
										$log_in_url = wp_login_url();
									endif;
								endif;						
								
                                ?>
                                <li class="submit"><a title="<?php echo esc_attr__('SUBMIT BOOK', 'awards'); ?>" href="<?php echo esc_url($log_in_url); ?>"><?php echo esc_html__('SUBMIT BOOK', 'awards'); ?></a></li>
                                
                            <?php endif;
							endif;
							 ?>
                            
                        </ul>
                        
                    </div>
                </div>
            </nav>
        </header>
        
        <?php
		$header_banner_style = get_post_meta( get_the_ID(), 'header_banner_style', true );
		if($header_banner_style != 'off'): 
			if(is_page()):
				get_template_part('header/banner');
			endif;
		endif;
		
		if(is_404() || is_post_type_archive('nominee')):
			get_template_part('header/banner');
		endif;
		
		$layout_padding = get_post_meta( get_the_ID(), 'layout_padding', true );
		$class = ' lb';
		if($layout_padding == 'style_2'):
			$class = ' no-padding';
		endif;
		
		if(is_singular('nominee') || is_author()){
			$class = ' single-site';
		}
		?>
        
        <section class="section<?php echo esc_attr($class); ?>">