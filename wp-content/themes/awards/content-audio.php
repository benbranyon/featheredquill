<div id="post-<?php the_ID(); ?>" <?php post_class() ?>>
	<div class="content blog-list">
        <div class="blog-wrapper clearfix">
        	<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>  
                <div class="post-meta sticky-posts">                
                    <?php $sticky_post_text = (function_exists('ot_get_option'))? ot_get_option( 'sticky_post_text', 'Featured' ) : 'Featured'; ?>                
                    <div class="sticky-content"><?php printf( '<span class="sticky-post">%s</span>', $sticky_post_text ); ?></div>                
                </div>                
            <?php endif; ?>
            <div class="blog-meta">
                <small><?php the_category(', '); ?></small>
                <h3><a href="<?php esc_url(the_permalink()); ?>" title=""><?php the_title(); ?></a></h3>
                <ul class="list-inline">
                    <li><?php echo human_time_diff( get_post_time( 'U' ), current_time('timestamp') ) . esc_html__(' ago', 'awards'); ?></li>
                    <li><span><?php echo esc_html__('written by', 'awards'); ?></span> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo get_the_author(); ?></a></li>
                </ul>
            </div><!-- end blog-meta -->

            <div class="blog-media">
            	<?php
				$audio_url = get_post_meta( get_the_ID(), '_format_audio_embed', true );						
				if( $audio_url != '' ):							
					echo do_shortcode(wp_kses_post('[ts_custom_audio url="'.esc_url($audio_url).'"]'));											
				endif;
				?>
                <a href="<?php esc_url(the_permalink()); ?>" title="">
                <?php awards_post_thumb( 1200, 600, true, false ); ?>
                </a>
            </div><!-- end media -->

            <div class="blog-desc">
                <p class="lead">
				<?php $post_subtitle = get_post_meta( get_the_ID(), 'post_subtitle', true ); ?>
				<?php echo esc_html($post_subtitle); ?></p>
                <?php if ( is_search()) : ?>                
                    <p><?php the_excerpt(); ?></p>                        
                <?php else : ?>                    
                    <?php the_content(sprintf(esc_html__( 'Read More', 'awards' ) ) ); ?>                        
                <?php endif; ?>
            </div><!-- end desc -->
            <?php
            if(is_single()):				
                $tags_list = get_the_tag_list('<ul class="list-inline cat_list"><li>','</li><li>','</li></ul>');					
                if ( $tags_list ): ?>					
                    <div class="blog-tags">				
                        <?php echo wp_kses( 							
                          $tags_list,							  
                          // Only allow a tag							  
                          array(
						  'ul' => array(								
                              'class' => array()								  
                            ),
							'li' => array(								
                              'class' => array()							  
                            ),								
                            'a' => array(								
                              'href' => array()								  
                            ),								
                          )							  
                        ); ?>						
                    </div>						
                <?php					 
                endif;				
            endif;
            
            wp_link_pages( array(				
                'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'awards' ) . '</span>',					
                'after'       => '</div>',					
                'link_before' => '<span>',					
                'link_after'  => '</span>',					
                'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'awards' ) . ' </span>%',					
                'separator'   => '<span class="screen-reader-text">, </span>',					
            ) );				
            ?>
        </div><!-- end blog -->
    </div>  
</div><!-- end content -->