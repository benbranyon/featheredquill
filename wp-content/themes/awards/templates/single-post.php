<div class="ts-posts ts-posts-single-post">
	<?php
		// Prepare marker to show only one post
		$first = true;
		// Posts are found
		if ( $posts->have_posts() ) {
			while ( $posts->have_posts() ) :
				$posts->the_post();
				global $post;

				// Show oly first post
				if ( $first ) {
					$first = false;
					?>
					<div class="ts-post">
						<h1 class="ts-post-title"><?php the_title(); ?></h1>
						<div class="ts-post-meta"><?php esc_html_e( 'Posted', 'awards' ); ?>: <?php the_time( get_option( 'date_format' ) ); ?> | <a href="<?php esc_url(comments_link()); ?>" class="ts-post-comments-link"><?php comments_number( esc_html__( '0 comments', 'awards' ), esc_html__( '1 comment', 'awards' ), esc_html__( '%n comments', 'awards' ) ); ?></a></div>
						<div class="ts-post-content">
							<?php the_content(); ?>
						</div>
					</div>
					<?php
				}
			endwhile;
		}
		// Posts not found
		else {
			echo '<h4>' . esc_html__( 'Posts not found', 'awards' ) . '</h4>';
		}
	?>
</div>