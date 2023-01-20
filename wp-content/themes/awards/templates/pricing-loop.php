<div class="ts-pricing pricing-tables">
	<?php
		// Posts are found
		if ( $posts->have_posts() ) {
			while ( $posts->have_posts() ) :
				$posts->the_post();
				global $post;
				?>
                
                    <?php 
					$featured = get_post_meta( get_the_ID(), 'featured', true );
					$featured_class = ( $featured == 'off' )? 'featured-off' : 'featured-on';
					?>
                    <div class="col-md-6">
                        <div class="content clearfix">
                            <div class="pricing-plan text-widget">
                                <header class="text-center">
                                <?php the_title( sprintf( '<h2>' ), '</h2>' ); ?>
                                <p><?php the_content(); ?></p>
                                <?php
                                $price_currency = get_post_meta( get_the_ID(), 'price_currency', true );
								$price_text = get_post_meta( get_the_ID(), 'price_text', true );
								$price_periode = get_post_meta( get_the_ID(), 'price_periode', true );
								?>
                                <h4><sup><?php echo esc_html($price_currency); ?></sup><?php echo esc_html($price_text); ?></h4>
                                <small><?php echo esc_html($price_periode); ?></small>
                                </header>

                                <div class="pricing-body">
                                    <ul class="list-unstyled">
                                    	<?php 
										$feature_info = get_post_meta( get_the_ID(), 'feature_info', true );
										if(!empty($feature_info)):
										$i = 1;
										foreach( $feature_info as $value ):
										?>
                                        <li><?php echo esc_html($value['title']); ?></li>
                                        <?php
										endforeach;
										endif;
										?>
                                    </ul>
                                </div><!-- end pricing -->

                                <footer>
                                	<?php 
									$button_link = get_post_meta( get_the_ID(), 'button_link', true );
									$button_text = get_post_meta( get_the_ID(), 'button_text', true );
									?>
									<a href="<?php echo esc_url($button_link); ?>" class="btn btn-primary btn-block"><?php echo esc_html($button_text); ?></a>
                                </footer>
                            </div><!-- end pricing-plan -->
                        </div><!-- end content -->
                    </div>
				<?php
			endwhile;
		}
		// Posts not found
		else {
			echo '<h3>' . esc_html__( 'Pricing not found', 'awards' ) . '</h3>';
		}
	?>
</div>