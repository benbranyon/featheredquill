<div class="blog-list-view">
	<?php
    // Posts are found
    if ( $posts->have_posts() ) {
        while ( $posts->have_posts() ) {
            $posts->the_post();
            global $post;
    ?>
    <div class="blog-list course-list normal-list">
    <div class="video-wrapper course-widget clearfix">
        <div class="row">
            <div class="col-md-4">
                <div class="post-media">
                    <div class="entry">
                        <?php awards_post_thumb( 800, 700, true, false ); ?>
                        <div class="magnifier">
                            <div class="magni-desc">
                                <a class="secondicon" href="<?php esc_url(the_permalink()); ?>"> <span class="oi" data-glyph="link-intact" title="<?php esc_attr(the_title()); ?>" aria-hidden="false"></span></a>
                            </div><!-- end team-desc -->
                        </div><!-- end magnifier -->
                    </div>
                </div><!-- end media -->
                <div class="course-meta clearfix">
                    <div class="pull-left">
                        <p><i class="fa fa-clock-o"></i> <?php echo get_the_date('d F Y'); ?></p>
                    </div>
                    <div class="pull-right">
                        <p><a href="<?php esc_url(comments_link()); ?>"><i class="fa fa-comments-o"></i> <?php comments_number( "0", "1", "%" ) ?></a></p>
                    </div>
                </div><!-- end meta -->
            </div><!-- end col-->
        
            <div class="col-md-8">
                <div class="widget-title clearfix">
                    <h3 class="post-title"><a href="<?php esc_url(the_permalink()); ?>"><?php the_title(); ?></a></h3>
                    <hr>
                    <?php the_excerpt(); ?>
                    <hr>
        
                    <div class="bottom-line clearfix">
                        <div class="pull-left">
                            <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" class="readmore"><?php echo get_avatar( get_the_author_meta( 'user_email' ), 25 ); ?><?php echo get_the_author(); ?></a>
                        </div>
                        <div class="pull-right">
                            <a href="<?php esc_url(the_permalink()); ?>" class="btn btn-sm btn-default"><?php echo esc_html__('Read More', 'awards'); ?></a>
                        </div>
                    </div><!-- end bottom -->
                </div><!-- end title -->
            </div><!-- end col -->
            </div>
		</div>
		</div>
		<?php
            }
        }
        // Posts not found
        else {
        ?>
        <h4><?php esc_html_e( 'Posts not found', 'awards' ) ?></h4>
        <?php
        }
        ?>
</div>
