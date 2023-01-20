<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 */
?>

            </section>
            <?php if ( is_active_sidebar( 'footer-top-widget-1' ) ) : ?>
            <div class="section bb">
                <div class="container">
                    <div class="row callout">
                    	<?php dynamic_sidebar( 'footer-top-widget-1' ); ?>
                    </div><!-- end row -->
                </div><!-- end container -->
            </div>
            <?php endif; ?>
            <?php
            $footer_widget_area = (function_exists('ot_get_option'))? ot_get_option('footer_widget_area', 'on') : 'on';
            if($footer_widget_area == 'on'): ?>
            <div class="footer section">
                <div class="container">                    
                    <?php get_template_part('footer/footer-widget-area', ''); ?>                                        
                </div>                
            </div>
            <?php endif; ?>
            <div class="copyrights">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 text-center">
                        	<?php $logo = (function_exists('ot_get_option'))? ot_get_option( 'footer_logo', AWARDSTHEMEURI. '/images/flogo.png' ) : AWARDSTHEMEURI. '/images/flogo.png'; ?>
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
                                <?php if($logo != ''): ?>
                                <img src="<?php echo esc_url($logo); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
                                <?php else: ?>
                                <?php echo esc_html( get_bloginfo( 'name', 'display' ) ); ?>
                                <?php endif; ?>
                            </a>
                            <p><?php                    
                            $copyright_text =  (function_exists('ot_get_option'))? ot_get_option( 'copyright_text', date('Y').'&copy; Copyright, Awards, ThemeStall. All rights reserved.') : date('Y').'&copy; Copyright, Awards, ThemeStall. All rights reserved.';
                            echo wp_kses(do_shortcode($copyright_text), array('div'=>array('class'=>array(), 'id'=>array()), 'a'=>array('class'=>array(), 'title'=>array(), 'href'=>array()), 'p'=>array('class'=>array())));
                            ?></p>
                            <?php
							$social_array = (function_exists('ot_get_option'))? ot_get_option( 'social_links', array() ) : '';
							if( !empty($social_array) ): ?>
							<ul class="list-inline">
							<?php foreach ($social_array as $key => $value): ?>
								<li><a title="<?php echo esc_attr($value['title']); ?>" target="_blank" href="<?php echo esc_url($value['link']); ?>"><?php echo esc_attr($value['title']); ?></a></li>
							<?php endforeach; ?>			
							</ul>
							<?php
							endif;
							?>
                        </div><!-- end col -->
                    </div><!-- end row -->
                </div><!-- end container -->
            </div>       
        </div><!-- end wrapper -->
        <?php wp_footer(); ?>  
        <script type='text/javascript' src='http://featheredquill.com/wp-content/plugins/spotlight/js/smoothDivScroll.js?ver=1.1&#038;nocache=1'></script>
	</body>
</html>