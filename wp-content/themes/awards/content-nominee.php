<?php if(is_single()): ?>
<div class="row single-top-content">
	<div class="col-md-6 col-sm-12">
        <div class="award-image entry">
        	<?php $site_link = get_post_meta(get_the_ID(), 'nominee_site_url', true); ?>
            <a href="<?php echo esc_url($site_link); ?>" target="_blank" rel="nofollow" title="">
                <?php awards_post_thumb( 700, 500, true, false ); ?>
                <div class="magnifier">
                    <div class="magni-desc">
                        <h4><?php echo esc_html__('Nominees', 'awards'); ?></h4>
                        <p><?php echo get_the_date('d, F Y'); ?></p>
                    </div>
                </div><!-- end magnifier -->
            </a>
        </div><!-- end image -->

        <div class="site-single-share clearfix">
            <div class="pull-left">
                 <ul class="list-inline software_version">
                    <li><?php echo esc_html__('Software', 'awards'); ?> <i class="fa fa-tags"></i></li>
                    <?php $nominee_software = get_the_terms( get_the_ID(), 'nominee_software' );?>
                    <?php
					if ( $nominee_software && ! is_wp_error( $nominee_software ) ) : 
						foreach ( $nominee_software as $term1 ) {
							?>
                            <li><a href="<?php echo esc_url(get_term_link($term1)); ?>"> <?php echo esc_html($term1->name); ?></a></li>
                            <?php
						}		
					endif;
					?>
                </ul>
            </div><!-- end left -->
            <div class="pull-right"><?php awards_template_single_sharing(); ?></div>
        </div><!-- end publisher -->
    </div>
    
    <div class="col-md-3 col-sm-6">
        <div class="award-details awards-wrapper">
            <div class="site-publisher clearfix">
                <h4 class="site-title"><?php the_title(); ?> &nbsp;&nbsp;<a href="<?php echo esc_url($site_link); ?>" target="_blank" rel="nofollow"><i class="fa fa-link"></i></a></h4>
                <?php the_content(); ?>
            </div><!-- end publisher -->

            <div class="site-colors clearfix">
                <ul class="list-inline cat_list">
                	<?php $nominee_color = get_the_terms( get_the_ID(), 'nominee_color' );?>
                    <?php
					if ( $nominee_color && ! is_wp_error( $nominee_color ) ) :
						foreach ( $nominee_color as $term4 ) {
							$t_id = $term4->term_id;
							$background_color = get_option( "taxonomy_term_$t_id" );
							?>
                            <li><a href="<?php echo esc_url(get_term_link($term4)); ?>" data-backgroundcolor="<?php echo esc_attr($background_color['catBG']); ?>"></a></li>
                            <?php
						}		
					endif;
					?>
                </ul>
            </div><!-- end site-colors -->

            <div class="site-tags clearfix">
                <ul class="list-inline cat_list">
                	<?php $nominee_category = get_the_terms( get_the_ID(), 'nominee_category' );?>
                    <?php
					if ( $nominee_category && ! is_wp_error( $nominee_category ) ) : 
						foreach ( $nominee_category as $term2 ) {
							?>
                            <li class="active"><a href="<?php echo esc_url(get_term_link($term2)); ?>"><?php echo esc_html($term2->name); ?></a></li>
                            <?php
						}		
					endif;
					?>
                </ul>
            </div><!-- end site-tags -->

            <div class="site-tags clearfix">
                <ul class="list-inline cat_list">
                	<?php $nominee_tag = get_the_terms( get_the_ID(), 'nominee_tag' );?>
                    <?php
					if ( $nominee_tag && ! is_wp_error( $nominee_tag ) ) : 
						foreach ( $nominee_tag as $term3 ) {
							?>
                            <li><a href="<?php echo esc_url(get_term_link($term3)); ?>"><?php echo esc_html($term3->name); ?></a></li>
                            <?php
						}		
					endif;
					?>
                </ul>
            </div><!-- end site-tags -->
        </div><!-- end details -->
    </div>
    
    <div class="col-md-3 col-sm-6 m30">
        <div class="award-details awards-wrapper">
            <div class="site-publisher clearfix">
            	<div class="single-author-info">
					<?php echo get_avatar( get_the_author_meta( 'user_email' ), 60 ); ?>
                    <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title=""><h4><?php echo get_the_author(); ?></h4></a>
                    <small><?php echo get_user_meta( get_the_author_meta( 'ID' ), 'designation', true ); ?></small>
                </div>
                <div class="site-desc clearfix">
                	<?php 
					$author_details_info = get_post_meta( get_the_ID(), 'author_details_info', true );
					if(!empty($author_details_info)):
					foreach( $author_details_info as $value ):
					?>
                    <div class="site-vote">
                        <p><?php echo esc_html($value['title']); ?> <small><?php echo esc_html($value['details_number'] . '%'); ?></small></p>
                    </div><!-- end vote -->
					<?php
					endforeach;
					endif;
					?>
					<?php if(function_exists('themestall_show_user_likes')): ?>
                    <div class="like-button like-single-nominee">                    
                        <p><?php echo do_shortcode(wp_kses_post('[jmliker]')); ?></p>
                    </div>
                    <?php endif; ?>
                </div><!-- end row -->
            </div><!-- end publisher -->
        </div><!-- end details -->
    </div>
    
    <div class="clearfix"></div>
    <hr class="invis">
    
    <?php awards_next_prev_posts(); ?>
       
</div><!-- end .row -->

<div class="stretch-content">
    <div class="section lb review-single">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-md-6">
                    <?php awards_related_nominee(); ?>
                </div><!-- end col -->
    
                <div class="col-md-6">
                    <div class="section-ab-title">
                        <h4><?php echo esc_html__('Reviews', 'awards'); ?></h4>
                    </div>
                    
                    <?php comments_template( '', true ); ?>
    
                    <!-- end content -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div>
</div>
<?php else: ?>
<div class="col-md-4 col-sm-6 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
    <div class="site-wrapper">
        <div class="award-image entry">
            <a href="<?php the_permalink(); ?>" title="">
               <?php awards_post_thumb( 700, 500, true, false ); ?>
            </a>
        </div><!-- end image -->

        <div class="site-small-desc clearfix">  
            <div class="pull-left">
                <a href="<?php the_permalink(); ?>" title=""><h4><?php the_title(); ?></h4></a>
                <p><?php echo esc_html__('By:', 'awards'); ?> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title=""><?php the_author(); ?></a></p>
            </div>
            <?php if(function_exists('themestall_show_user_likes')): ?>
            <div class="likebutton pull-right text-center">
                <?php echo do_shortcode(wp_kses_post('[jmliker]')); ?>
            </div><!-- end pull-right -->
            <?php endif; ?>
        </div><!-- end desc -->
    </div><!-- end site-wrapper -->
</div>
<?php endif; ?>