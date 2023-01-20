<div class="ts-nominees ts-nominees-loop list-items">
	<?php
		// Posts are found
		if ( $posts->have_posts() ) {
			$i = 1;
			while ( $posts->have_posts() ) :
				$posts->the_post();
				global $post;
				$column = 12/$posts->data['column'];
				?>
                
                <div class="col-md-<?php echo esc_attr($column); ?> col-sm-6 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.<?php echo esc_attr($i); ?>s">
                    <div class="site-wrapper">
                        <div class="award-image entry">
                            <a href="<?php the_permalink(); ?>" title="">
                            	<?php
								if(has_post_thumbnail()): 
								$fullsize = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
								$image = ts_image_resize( $fullsize[0], 700, 500 );
								$img = $image['url'];
								else:
								$img = 'http://placehold.it/700x500';
								endif;
								?>
                                <img src="<?php echo esc_url($img); ?>" alt="" class="img-responsive">
                            </a>
                        </div><!-- end image -->

                        <div class="site-small-desc clearfix">  
                            <div class="pull-left">
                                <a href="<?php the_permalink(); ?>" title=""><h4><?php the_title(); ?></h4></a>
                                <p><?php echo esc_html__('By:', 'themestall'); ?> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title=""><?php the_author(); ?></a></p>
                            </div>
                            <?php if(function_exists('themestall_show_user_likes')): ?>
                            <div class="likebutton pull-right text-center">
                                <?php echo do_shortcode('[jmliker]'); ?>
                            </div><!-- end pull-right -->
                            <?php endif; ?>
                        </div><!-- end desc -->
                    </div><!-- end site-wrapper -->
                </div>

				<?php
				$i++;
			endwhile;
		}
		// Posts not found
		else { ?>
        <h4><?php echo esc_html__( 'Nominees not found', 'themestall' ); ?></h4>
		<?php }
	?>
</div>