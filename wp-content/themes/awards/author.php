<?php
/**
 * The template for displaying Archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each specific one. For example, Awards already
 * has tag.php for Tag archives, category.php for Category archives, and
 * author.php for Author archives.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Awards
 * @since Awards 1.0
 */

get_header();
$current_user = wp_get_current_user();
?>
<?php get_template_part( 'layout/before', '' ); ?>
<?php $author = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author)); ?>
<div class="row single-top-content">
	<div class="col-md-6">
        <div class="award-details awards-wrapper">
            <div class="site-publisher clearfix">
            	<div class="user-avatar">
					<?php echo get_avatar( $author->ID, 60 ); ?>
                    <h4><?php echo esc_html($author->display_name ); ?></h4>
                    <small><?php echo get_user_meta( $author->ID, 'designation', true ); ?></small>
                </div>
                <div class="site-desc clearfix">
                    <p><?php echo get_the_author_meta( 'description', $author->ID ); ?></p>

                    <div class="ageny-details">
                        <ul class="list-unstyled">
                        	<?php if(get_user_meta( $author->ID, 'country', true )): ?>
                            <li><i class="flaticon-multimedia"></i> <?php echo get_user_meta( $author->ID, 'country', true ); ?></li>
                            <?php endif; ?>
                            <?php if(get_user_meta( $author->ID, 'designation', true )): ?>
                            <li><i class="flaticon-briefcase"></i> <?php echo get_user_meta( $author->ID, 'designation', true ); ?></li>
                            <?php endif; ?>
                            <?php if(get_user_meta( $author->ID, 'budget', true )): ?>
                            <li><i class="flaticon-price-tag"></i> <?php echo get_user_meta( $author->ID, 'budget', true ); ?></li>
                            <?php endif; ?>
                            <?php if($author->user_url): ?>
                            <li><i class="flaticon-unlink"></i> <a href="<?php echo esc_url($author->user_url); ?>" target="_blank" rel="nofollow">
							<?php echo esc_url($author->user_url); ?></a>
                            </li>
                            <?php endif; ?>
                            <?php if(get_user_meta( $author->ID, 'twitter', true )): ?>
                            <li><i class="flaticon-twitter"></i> <a href="<?php echo esc_url(get_user_meta( $author->ID, 'twitter', true )); ?>" target="_blank" rel="nofollow"><?php echo get_user_meta( $author->ID, 'twitter', true ); ?></a></li>
                            <?php endif; ?>
                        </ul>
                    </div><!-- end details -->
                </div><!-- end row -->
            </div><!-- end publisher -->
        </div><!-- end details -->
    </div>
    
    <?php
	$query = new WP_Query( array( 'post_type' => 'nominee', 'author' => $author->ID, 'posts_per_page' => 1 ) );
	?>
    <?php if ( $query->have_posts() ): ?>
    <div class="col-md-6 m30">
    	<?php while ( $query->have_posts() ) :$query->the_post(); ?>
        <div class="award-image entry">
        	<?php $site_link = get_post_meta(get_the_ID(), 'nominee_site_url', true); ?>
            <a href="<?php echo esc_url($site_link); ?>" target="_blank" rel="nofollow" title="">
                <?php awards_post_thumb( 650, 480, true, false ); ?>
                <div class="magnifier">
                    <div class="magni-desc">
                        <h4><?php the_title(); ?></h4>
                        <p><?php echo esc_html__('By:', 'awards'); ?> <?php the_author(); ?></p>
                    </div>
                </div><!-- end magnifier -->
            </a>
        </div><!-- end image -->
		
        <div class="site-single-share clearfix text-center">
		
			<?php awards_template_single_sharing(); ?>	
            
            <?php awards_next_prev_posts(); ?>
        
        </div>
        
        <?php endwhile; ?>
    </div>
    
	<?php wp_reset_query(); ?>

    <?php endif; ?>    

</div>

<div class="stretch-content">
<div class="section lb review-single">
    <div class="container">
        <div class="row clearfix">
        	<?php awards_submission_nominee($author->ID); ?>

            <?php
			$current_email = $current_user->user_email;
			$author_email = $author->user_email;
			if(class_exists('Ts_Shortcodes')):
			echo do_shortcode(wp_kses_post('[author_email current_email="'.$current_email.'" author_email="'.$author_email.'"]'));
			endif;
			?>
        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end section -->
</div>

<?php get_template_part( 'layout/after', '' ); ?>
    
<?php get_footer(); ?>