<div class="ts-posts ts-posts-teaser-loop">
	<?php
		// Posts are found
		if ( $posts->have_posts() ) {
			while ( $posts->have_posts() ) :
				$posts->the_post();
				global $post;
				?>
				<div class="ts-post">
					<?php if ( has_post_thumbnail() ) : ?>
						<a class="ts-post-thumbnail" href="<?php echo esc_url(get_permalink()); ?>"><?php the_post_thumbnail(); ?></a>
					<?php endif; ?>
					<h2 class="ts-post-title"><a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title(); ?></a></h2>
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