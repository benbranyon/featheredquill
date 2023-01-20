<div class="ts-nominees ts-nominees-featured row">
	<?php
		// Posts are found
		if ( $posts->have_posts() ) {
			$i = 1;
			while ( $posts->have_posts() ) :
				$posts->the_post();
				global $post;
				?>
                
                <div class="col-md-7">
                    <div class="award-image entry">
                        <a href="<?php the_permalink(); ?>" title="">
                        	<?php if(has_post_thumbnail()): ?>
                            <img src="<?php the_post_thumbnail_url(array(652, 480)); ?>" alt="" class="img-responsive">
							<?php
							else: ?>
                            <img src="http://placehold.it/700x500" alt="" class="img-responsive">
							<?php endif;
							?>
                            
                            <div class="magnifier">
                                <div class="magni-desc">
                                    <h4><?php echo esc_html__('Site of the Day', 'themestall'); ?></h4>
                                    <p><?php echo get_the_date('F d, Y'); ?></p>
                                </div>
                            </div><!-- end magnifier -->
                        </a>
                    </div><!-- end image -->
                </div><!-- end col -->
                
                <div class="col-md-5">
                    <div class="award-details awards-wrapper">
                        <div class="site-publisher clearfix">
                            <div class="corner-ribbon top-right"><a href="<?php the_permalink(); ?>"><i class="flaticon-heart"></i></a></div>
                            <?php echo get_avatar( get_the_author_meta( 'user_email' ), 60 ); ?>
                            <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title=""><h4><?php echo get_the_author(); ?> 
                            <?php if(get_the_author_meta('country') != ''): ?>
                            <small><?php echo esc_html__('from', 'themestall'); ?></small> <span><?php echo get_the_author_meta('country'); ?></span>
                            <?php endif; ?>
                            </h4></a>
                            <small><?php echo get_the_author_meta('designation' ); ?></small>
                        </div><!-- end publisher -->

                        <div class="site-progress clearfix">
                           <div class="site-desc clearfix">
                                <div class="row">
                                	<?php 
									$author_details_info = get_post_meta( get_the_ID(), 'author_details_info', true );
									if(!empty($author_details_info)):
									foreach( $author_details_info as $value ):
									?>
									<div class="col-md-6">
                                        <div class="site-vote">
                                            <p><?php echo esc_html($value['title']); ?> <small><?php echo esc_html($value['details_number'] . '%'); ?></small></p>
                                        </div><!-- end vote -->
                                    </div>
									<?php
									endforeach;
									endif;
									?>
                                </div>
                            </div><!-- end row -->
                        </div>

                        <div class="site-publisher clearfix">
                            <h4><a href="<?php the_permalink(); ?>" title=""><?php the_title(); ?> &nbsp;&nbsp;<small><?php echo esc_html__('Visit site', 'themestall'); ?></small></a></h4>
                            <?php the_excerpt(); ?>
                        </div><!-- end publisher -->
                    </div><!-- end details -->
                </div><!-- end col -->
				<?php
			endwhile;
		}
		// Posts not found
		else { ?>
        <h4><?php echo esc_html__( 'Nominees not found', 'themestall' ); ?></h4>
		<?php }
	?>
</div>