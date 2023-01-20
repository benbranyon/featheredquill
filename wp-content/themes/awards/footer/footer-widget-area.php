<?php
/**
 * footer widget area
 *
 *
 * @package WordPress
 * @subpackage awards
 * @since awards 1.0
 */
?>
<?php
if( function_exists( 'ot_get_option' ) ):
	$footer_widget_area = ot_get_option( 'footer_widget_area', 'on' );	
	if( $footer_widget_area == 'on' ):
		$footer_widget_box = ot_get_option( 'footer_widget_box', 4 );
		$footer_widgets = $footer_widget_box - 1;	
		$col_class = 6/$footer_widgets;		
		?>      
        <div class="row">
			<?php
            for( $i = 1; $i <= $footer_widget_box; $i++ ): ?>                    
				<?php if ( is_active_sidebar( 'footer-'.$i ) ) : ?>
                <?php if($i == 1): ?>
                	<?php $col_class = '6'; ?>
                    <?php else: ?>
                    <?php $col_class = 6/$footer_widgets; ?>
                <?php endif; ?>
                <div class="col-md-<?php echo esc_attr($col_class); ?> col-sm-<?php echo esc_attr($col_class); ?> footer-widget-area">
                <?php dynamic_sidebar( 'footer-'.$i ); ?>
                </div>
                <?php
                endif;
                ?>            
                <?php
            endfor;
             ?>                
        </div>
    <?php endif; ?>
	<?php	
endif;	//if( function_exists( 'ot_get_option' ) ):
?>