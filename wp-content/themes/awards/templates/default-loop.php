<div class="ts-posts-default-loop row">
    <?php
	// Posts are found
	if ( $posts->have_posts() ) {
		while ( $posts->have_posts() ) :
			$posts->the_post();
			global $post;
			?>
            <div class="col-md-4 col-sm-12">
                <div class="blog-wrapper clearfix">
                    <div class="post-media">
                        <div class="entry">
                            <?php awards_post_thumb( 1000, 650 ); ?>
                            <div class="magnifier">
                                <div class="magni-desc">
                                    <a class="secondicon" href="<?php esc_url(the_permalink()); ?>"> <span class="oi" data-glyph="link-intact" title="<?php esc_attr(the_title()); ?>" aria-hidden="false"></span></a>
                                </div><!-- end team-desc -->
                            </div><!-- end magnifier -->
                        </div>
                    </div><!-- end media -->
                    <div class="blog-title">
                        <div class="blog-meta">
                            <ul class="list-inline">
                                <li><a href="<?php esc_url(the_permalink()); ?>"><i class="fa fa-clock-o"></i><?php echo get_the_date('d F Y'); ?></a></li>
                                <li><a href="<?php esc_url(comments_link()); ?>"><i class="fa fa-comments-o"></i> <?php comments_number( "0", "1", "%" ) ?> <?php echo esc_html__( 'Comments', 'awards' ); ?></a></li>
                                <?php if(function_exists('pvc_get_post_views')): ?>
                                <li><a href="<?php esc_url(the_permalink()); ?>"><i class="fa fa-eye"></i> <?php echo wp_kses(pvc_get_post_views( get_the_ID() ), array('span'=>array())); ?><?php echo esc_html__(' Views', 'awards'); ?></a></li>
                                <?php endif; ?>
                            </ul><!-- end list -->
                        </div><!-- end blog-meta -->
                        <h4><a href="<?php esc_url(the_permalink()); ?>" title=""><?php the_title(); ?></a></h4>
                        <?php the_excerpt(); ?>
                        <a href="<?php esc_url(the_permalink()); ?>" class="readmore" title=""><?php echo esc_html__( 'Read more', 'awards' ); ?></a>
                    </div><!-- end blog-title -->
                </div><!-- end clearfix -->
            </div>
		<?php
		endwhile;
	}
	// Posts not found
	else {
	echo '<h4>' . esc_html__( 'Posts not found', 'awards' ) . '</h4>';
	}
	?>
</div>