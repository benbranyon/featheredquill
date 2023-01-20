<?php
/**
 * The template for displaying Comments
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to awards_comments() which is
 * located in the functions.php file.
 *
 * @package WordPress
 * @subpackage Awards
 * @since Awards 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() )
	return;
?>

<?php if ( have_comments() || comments_open() ) : ?>
	
    <?php if ( have_comments() ) : ?>
    <div class="content blog-list clearfix">   
        <div class="comments-list">	
            <ol class="media-list"><?php wp_list_comments( array( 'callback' => 'awards_comments', 'style' => 'ol', 'short_ping'  => true ) ); ?></ol><!-- .commentlist -->
            <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>	
            <nav id="comment-nav-below" class="navigation">	
                <h1 class="assistive-text section-heading"><?php esc_html_e( 'Comment navigation', 'awards' ); ?></h1>		
                <div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'awards' ) ); ?></div>		
                <div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'awards' ) ); ?></div>		
            </nav>	
            <?php endif; // check for comment navigation ?>	
            <?php
            /* If there are no comments and comments are closed, let's leave a note.
             * But we only want the note on posts and pages that had comments in the first place.
             */	 
            if ( ! comments_open() && get_comments_number() ) : ?>	
                <p class="nocomments"><?php esc_html_e( 'Comments are closed.' , 'awards' ); ?></p>	
            <?php endif; ?>	
        </div>
        </div>
        <?php endif; // have_comments() ?>
		

    <?php if ( comments_open() ) : ?>
		<?php awards_comment_form(); ?>	
    <?php endif; ?>
<?php endif; ?>