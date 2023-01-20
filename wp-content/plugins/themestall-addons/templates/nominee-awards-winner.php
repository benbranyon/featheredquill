<div class="ts-nominees ts-nominees-loop awards-winner row">
	<?php
		// Posts are found
		if ( $posts->have_posts() ) {
			$i = 8;
			while ( $posts->have_posts() ) :
				$posts->the_post();
				global $post;
				?>
                
                <div class="col-md-6 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.<?php echo esc_attr($i); ?>s">
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
                            <div class="magnifier">
                                <div class="magni-desc">
                                    <h4><?php the_title(); ?></h4>
                                    <p><?php echo esc_html__('By: ', 'themestall'); ?> <?php the_author(); ?></p>
                                </div>
                            </div><!-- end magnifier -->
                        </a>
                    </div><!-- end image -->
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