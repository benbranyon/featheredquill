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

get_header(); ?>

	<?php get_template_part( 'layout/before', '' ); ?>
    <div class="col-md-12 nominee-search-form-content"><?php echo do_shortcode(wp_kses_post('[ts_nominee_search]')); ?></div>
	<div class="ts-nominees ts-nominees-loop list-items">    	
		<?php
		$i = 1;
		if( isset( $_GET['custom_search_nominee']) && ($_GET['custom_search_nominee'] == 'nominee_search')){
		$nominee_tags = $_GET['nominee_tags'];
		$nominee_category = $_GET['nominee_categories'];
		$nominee_software = $_GET['nominee_softwares'];
		$nominee_color = $_GET['nominee_colors'];
		$args = array(
					'post_type' => 'nominee',
					'tax_query' => array(
						'relation' => 'AND',
						array(
							'taxonomy' => 'nominee_tag',
							'field'    => 'slug',
							'terms'    => array( $nominee_tags ),
						),
						array(
							'taxonomy' => 'nominee_category',
							'field'    => 'slug',
							'terms'    => array( $nominee_category ),
						),
						array(
							'taxonomy' => 'nominee_software',
							'field'    => 'slug',
							'terms'    => array( $nominee_software ),
						),
						array(
							'taxonomy' => 'nominee_color',
							'field'    => 'slug',
							'terms'    => array( $nominee_color ),
						),
					),
				);
				$wp_query = new WP_Query( $args );
				
				$i = 1;
			if ( $wp_query->have_posts() ) :
				// Start the Loop.
				while ( $wp_query->have_posts() ) : $wp_query->the_post();

					/*
					 * Include the post format-specific template for the content. If you want to
					 * use this in a child theme, then include a file called called content-___.php
					 * (where ___ is the post format) and that will be used instead.
					 */
					get_template_part( 'content', 'nominee' );
					
					$i++;

				endwhile;
				?>
                <div class="col-md-12"><?php awards_posts_nav(); ?></div>
                <?php

			else :
				// If no content, include the "No posts found" template.
				get_template_part( 'content', 'none' );

			endif;
		} else{
			$i = 1;
			if ( have_posts() ) :
				// Start the Loop.
				while ( have_posts() ) : the_post();

					/*
					 * Include the post format-specific template for the content. If you want to
					 * use this in a child theme, then include a file called called content-___.php
					 * (where ___ is the post format) and that will be used instead.
					 */
					get_template_part( 'content', 'nominee' );
					
					$i++;

				endwhile;
				
				?>
                <div class="col-md-12"><?php awards_posts_nav(); ?></div>
                <?php

			else :
				// If no content, include the "No posts found" template.
				get_template_part( 'content', 'none' );

			endif;
		}
			
		?>
        
        </div>      
            
	<?php get_template_part( 'layout/after', '' ); ?>
    
<?php get_footer(); ?>