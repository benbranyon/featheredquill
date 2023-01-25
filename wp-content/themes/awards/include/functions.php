<?php
require AWARDSTHEMEDIR . '/include/custom-menu/custom-menu.php';
require AWARDSTHEMEDIR . '/include/breadcrumbs.php';

function awards_excerpt_more( $more ) {
		return '<a class="read-more" href="' . esc_url(get_permalink( get_the_ID() ) ) . '">' . esc_html__('...', 'awards' ) . '</a>';
} // end awards_excerpt_more function

add_filter( 'excerpt_more', 'awards_excerpt_more' );

function awards_excerpt_length( $length ) {
	$length = (function_exists('ot_get_option'))? ot_get_option("excerpt_length", 20) : 20;
	if( $length!= ''){
		return $length;
	} else{
	return 20;
	}	
} // end awards_excerpt_length function

add_filter( 'excerpt_length', 'awards_excerpt_length', 999 );

if ( ! function_exists( 'awards_comment_form' ) ) :
// awards comments form
function awards_comment_form( $args = array(), $post_id = null ) {
	if ( null === $post_id )
		$post_id = get_the_ID();
	else
		$id = $post_id;

	$commenter = wp_get_current_commenter();
	$user = wp_get_current_user();
	$user_identity = $user->exists() ? $user->display_name : '';

	if ( ! isset( $args['format'] ) )
		$args['format'] = current_theme_supports( 'html5', 'comment-form' ) ? 'html5' : 'xhtml';

	$req      = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );
	$html5    = 'html5' === $args['format'];

	$comments_field = '<div class="col-md-12 col-sm-12"><div class="form-group">
	<textarea id="comment" name="comment" aria-required="true" cols="30" rows="5" class="form-control" placeholder="'.esc_attr__('Comment', 'awards').'"></textarea></div></div>';
	
	$fields   =  array(
		'author' => '<div class="col-md-4 col-sm-12"><div class="form-group">
		<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" ' . $aria_req . ' class="form-control" placeholder="'.esc_attr__('Full Name', 'awards').'" /></div></div>',
		
		'email'  => '<div class="col-md-4 col-sm-12"><div class="form-group">
		<input id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_email'] ) . '" ' . $aria_req . ' class="form-control" placeholder="'.esc_attr__('Email', 'awards').'" /></div></div>',
		
		'url' => '<div class="col-md-4 col-sm-12"><div class="form-group">
		<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .'" class="form-control" placeholder="'.esc_attr__('Website', 'awards').'" /></div></div>',
	);
	
	$defaults = array(
		'fields'               => apply_filters( 'awards_comment_form_default_fields', $fields ),
		
		'comment_field'        => $comments_field,
		
		'must_log_in'          => '<div class="col-md-12"><p class="must-log-in">' . sprintf( wp_kses( __( 'You must be <a href="%s">logged in</a> to post a comment.', 'awards' ), array('a' => array(
					  'href' => array()),)) , wp_login_url( apply_filters( 'awards_the_permalink', esc_url(get_permalink( $post_id ) ) ) ) ) . '</p></div>',
		
		'logged_in_as'         => '<div class="col-md-12"><p class="logged-in-as">' . sprintf( wp_kses( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s">Log out?</a>', 'awards' ), array('a' => array('href' => array()),)) , esc_url(get_edit_user_link()), esc_html($user_identity), wp_logout_url( apply_filters( 'awards_the_permalink', esc_url(get_permalink( $post_id ) ) ) ) ) . '</p></div>',
		
		'id_form'              => 'commentform',
		'id_submit'            => 'submit',
		'title_reply'          => esc_html__( 'Comment Form', 'awards' ),
		'title_reply_to'       => esc_html__( 'Leave a Comment to %s', 'awards' ),
		'cancel_reply_link'    => esc_html__( 'Cancel Reply', 'awards' ),
		'label_submit'         => esc_html__( 'Send Comment', 'awards' ),
		'format'               => 'xhtml',
	);

	$args = wp_parse_args( $args, apply_filters( 'awards_comment_form_defaults', $defaults ) );

	?>
		<?php if ( comments_open( $post_id ) ) : ?>
        
        <div class="content blog-list clearfix">           
				<div class="commentform" id="respond">                
				<?php if ( get_option( 'comment_registration' ) && !is_user_logged_in() ) : ?>
					<?php 
					echo wp_kses($args['must_log_in'],array(
					'a' => array(
					  'title' => array(),
					  'href' => array(),
					  'class' => array()
					),
					'span' => array(
					  'class' => array(),
					),
				  )); ?>
					<?php do_action( 'awards_comment_form_must_log_in_after' ); ?>
				<?php else : ?>
                	<h3 class="custom-title">
                        <?php comment_form_title( $args['title_reply'], $args['title_reply_to'] ); ?>
                        <?php cancel_comment_reply_link( $args['cancel_reply_link'] ); ?>
                    </h3>
					<form action="<?php echo site_url( '/wp-comments-post.php' ); ?>" method="post" id="<?php echo esc_attr( $args['id_form'] ); ?>" class=" contact-form search-top row"<?php echo esc_attr($html5) ? ' novalidate' : ''; ?>>
                    
                    <?php if ( is_user_logged_in() ) : ?>
						<?php echo apply_filters( 'awards_comment_form_logged_in', $args['logged_in_as'], $commenter, $user_identity ); ?>
                    <?php endif; ?>
						
					<?php if ( is_user_logged_in() ) : ?>
                    <?php echo apply_filters( 'awards_comment_form_field_comment', $args['comment_field'] ); ?>
						<?php else : ?>
                            <?php
							foreach ( (array) $args['fields'] as $name => $field ) {
								echo apply_filters( "awards_comment_form_field_{$name}", $field ) . "\n";
							}
							?>
                            <?php echo apply_filters( 'awards_comment_form_field_comment', $args['comment_field'] ); ?>
						<?php endif; ?>                        
						<div class="col-md-12 col-sm-12"><input class="btn btn-primary" type="submit" id="<?php echo esc_attr( $args['id_submit'] ); ?>" value="<?php echo esc_attr( $args['label_submit'] ); ?>" /></div>
                        <?php comment_id_fields( $post_id ); ?>
						<?php do_action( 'awards_comment_form', $post_id ); ?>
					</form>
				<?php endif; ?>
                </div>
				</div><!--.widget-->
		<?php else : ?>
			<?php do_action( 'awards_comment_form_comments_closed' ); ?>
		<?php endif; ?>
	<?php
} // end awards_comment_form function
endif;

function awards_body_class( $classes ) {
	
	if(is_page()){
		$layout = get_post_meta( get_the_ID(), 'page_layout', true );
		$background_layout = get_post_meta( get_the_ID(), 'background_layout', true );
		$classes[] = $background_layout;
		if($layout != ''){
			$layout = $layout;
		} else {
			$layout = 'rs';
		}
	}
	elseif(is_single()){
		$layout = (function_exists('ot_get_option'))? ot_get_option( 'single_layout', 'rs' ) : 'rs';
	}
	else{
		$layout = (function_exists('ot_get_option'))? ot_get_option( 'blog_layout', 'rs' ) : 'rs';
	}
	
	$classes[] = 'layout-'.$layout;

	return $classes;
}
add_filter( 'body_class', 'awards_body_class' );

 if ( ! function_exists( 'awards_comments' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own awards_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 */
function awards_comments( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments.
	?>
    <li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<p><?php esc_html_e( 'Pingback:', 'awards' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( esc_html__( 'Edit', 'awards' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
		// Proceed with normal comments.
		global $post;
	?>
	<li <?php comment_class('media'); ?> id="comment-<?php comment_ID(); ?>">
    	<div class="comment">            
            <div class="media">
            	<p class="pull-right"><small><?php echo human_time_diff( get_comment_time( 'U' ), current_time('timestamp') ) . esc_html__(' ago', 'awards'); ?></small></p>
                <a href="<?php echo esc_url(get_comment_author_link()); ?>" class="pull-left"><?php echo get_avatar( $comment, 80 ); ?></a>
                <div class="media-body">
                	<h4 class="media-heading user_name"><?php comment_author(); ?></h4>
                    <p><?php comment_text(); ?></p>
                    <?php
                    edit_comment_link( esc_html__( 'Edit', 'awards' ), '<span class="btn btn-primary btn-sm">', '</span>' );
                    comment_reply_link( array_merge( $args, array( 'reply_text' => esc_html__( 'Reply', 'awards' ), 'after' => '', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) );
                    ?>
                    <?php if ( '0' == $comment->comment_approved ) : ?>
                    <p class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'awards' ); ?></p>
                    <?php endif; ?> 
                </div>
             </div>
         </div>							
	<?php
		break;
	endswitch; // end comment_type check
} // end awards_comments function
endif;

function awards_default_side_menu(){
	?>
    <ul class="list-unstyled main-menu" id="awardsSideMenu">
    	<li class="text-right"><a href="#" id="nav-close"><i class="flaticon-error"></i></a></li>
     </ul>
  <?php
} // end awards_default_side_menu function


function awards_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'awards_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'awards_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so awards_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so awards_categorized_blog should return false.
		return false;
	}
} // end awards_categorized_blog function

if ( ! function_exists( 'awards_category_transient_flusher' ) ) :
function awards_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'awards_categories' );
} // end awards_category_transient_flusher function
endif;

add_action( 'edit_category', 'awards_category_transient_flusher' );
add_action( 'save_post',     'awards_category_transient_flusher' );

if ( ! function_exists( 'awards_fonts_url' ) ) :
function awards_fonts_url() {
	$fonts_url = '';
	$fonts     = array();

	/* translators: If there are characters in your language that are not supported
	 * by Open Sans, translate this to 'off'. Do not translate into your own language.
	 */
	
	if ( 'off' !== _x( 'on', 'Playfair Display Font: on or off', 'awards' ) ) {
		$fonts[] = 'Playfair Display: 400,400i,700,900';
	}
	
	if ( 'off' !== _x( 'on', 'Rubik font: on or off', 'awards' ) ) {
		$fonts[] = 'Rubik: 300,400,400i,500,700,900';
	}
	
	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) )
		), '//fonts.googleapis.com/css' );
	}

	return $fonts_url;
} // end awards_fonts_url function
endif;

if ( ! function_exists( 'awards_mce_css' ) ) :
function awards_mce_css( $mce_css ) {
	$fonts_url = awards_fonts_url();

	if ( empty( $fonts_url ) )
		return $mce_css;

	if ( ! empty( $mce_css ) )
		$mce_css .= ',';

	$mce_css .= esc_url_raw( str_replace( ',', '%2C', $fonts_url ) );

	return $mce_css;
} // end awards_mce_css function
endif;

add_filter( 'mce_css', 'awards_mce_css' );

function awards_gutenberg_fonts() {
	$fonts_url = '';
	$fonts     = array();
	
   if ( 'off' !== _x( 'on', 'Playfair Display Font: on or off', 'awards' ) ) {
		$fonts[] = 'Playfair Display: 400,400i,700,900';
	}
	
	if ( 'off' !== _x( 'on', 'Rubik font: on or off', 'awards' ) ) {
		$fonts[] = 'Rubik: 300,400,400i,500,700,900';
	}
	
	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) )
		), '//fonts.googleapis.com/css' );
	}
	
    wp_enqueue_style('awards-google-fonts', $fonts_url , array(), false );
}
add_action('enqueue_block_editor_assets', 'awards_gutenberg_fonts');

if ( ! function_exists( 'awards_fix_gallery' ) ) :
function awards_fix_gallery($output, $attr) {
    global $post;

    static $instance = 0;
    $instance++;
    $size_class = '';

    // We're trusting author input, so let's at least make sure it looks like a valid orderby statement
    if ( isset( $attr['orderby'] ) ) {
        $attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
        if ( !$attr['orderby'] )
            unset( $attr['orderby'] );
    }

    extract(shortcode_atts(array(
        'order'      => 'ASC',
        'orderby'    => 'menu_order ID',
        'id'         => $post->ID,
        'itemtag'    => 'div',
        'icontag'    => 'dt',
        'captiontag' => 'dd',
        'columns'    => 3,
        'size'       => '',
        'include'    => '',
        'exclude'    => ''
    ), $attr));

    $id = intval($id);
    if ( 'RAND' == $order )
        $orderby = 'none';

    if ( !empty($include) ) {
        $include = preg_replace( '/[^0-9,]+/', '', $include );
        $_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );

        $attachments = array();
        foreach ( $_attachments as $key => $val ) {
            $attachments[$val->ID] = $_attachments[$key];
        }
    } elseif ( !empty($exclude) ) {
        $exclude = preg_replace( '/[^0-9,]+/', '', $exclude );
        $attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
    } else {
        $attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
    }

    if ( empty($attachments) )
        return '';

    if ( is_feed() ) {
        $output = "\n";
        foreach ( $attachments as $att_id => $attachment )
            $output .= wp_get_attachment_link($att_id, $size, true) . "\n";
        return $output;
    }

    $itemtag = tag_escape($itemtag);
    $captiontag = tag_escape($captiontag);
    $columns = intval($columns);
    $itemwidth = $columns > 0 ? floor(100/$columns) : 100;
    $float = is_rtl() ? 'right' : 'left';

    $selector = "gallery-{$instance}";

    $gallery_style = $gallery_div = '';
    if ( apply_filters( 'use_default_gallery_style', true ) )
        /**
         * this is the css you want to remove
         *  #1 in question
         */
        /*
        */
    $size_class = ($size != '' )?sanitize_html_class( $size ) : 'normal';
    $gallery_div = '<div id="myCarousel" class="carousel slide" data-ride="carousel"><div class="carousel-inner">';
    $output = apply_filters( 'gallery_style', $gallery_style . "\n\t\t" . $gallery_div );

	$width = round(1250/$columns);
	$height = round(1250/$columns);
	
	$col_class = intval(12/$columns);
	
    $i = 1;
	foreach ( $attachments as $id => $attachment ) {
		if($i == 1){
			$class = 'active';
		} else {
			$class = '';
		}

        $link = isset($attr['link']) && 'file' == $attr['link'] ? wp_get_attachment_link($id, $size, false, false) : wp_get_attachment_link($id, $size, true, false);
		 $image_url = wp_get_attachment_url($id, $size, false, false);
		 $attatchement_image = awards_image_resize( $image_url, $width, $height, true, false, false );
        
		$output .= '<div class="item '.esc_attr($class).'"><img src="' . esc_url($image_url) . '" alt="'.esc_attr__('images thumbnail', 'awards').'" /></div>';
		$i++;  
    }
    $output .= '</div>
	<a class="left carousel-control" href="#myCarousel" data-slide="prev">
		<span class="fa fa-angle-left" aria-hidden="true"></span>
		<span class="sr-only">'. esc_html__('Previous', 'awards') .'</span>
	</a>
	<a class="right carousel-control" href="#myCarousel" data-slide="next">
		<span class="fa fa-angle-right" aria-hidden="true"></span>
		<span class="sr-only">'. esc_html__('Next', 'awards') .'</span>
	</a>
	</div>';
    return $output;
} // end awards_fix_gallery function
endif;

add_filter("post_gallery", "awards_fix_gallery",10,2);


if ( ! function_exists( 'awards_posts_nav' ) ) :
function awards_posts_nav() {

	if( is_singular() )
		return;

	global $wp_query;

	/** Stop execution if there's only 1 page */
	if( $wp_query->max_num_pages <= 1 ) {

	} else {
	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max   = intval( $wp_query->max_num_pages );

	/**	Add current page to the array */
	if ( $paged >= 1 )
		$links[] = $paged;

	/**	Add the pages around the current page to the array */
	if ( $paged >= 3 ) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}

	if ( ( $paged + 2 ) <= $max ) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}

	echo '<nav class="clearfix"><ul class="pagination">' . "\n";

	/**	Previous Post Link */
	if ( get_previous_posts_link() )
		printf( '<li>%s</li>' . "\n", get_previous_posts_link( '&laquo;' ) );

	/**	Link to first page, plus ellipses if necessary */
	if ( ! in_array( 1, $links ) ) {
		$class = 1 == $paged ? 'list-nav current' : 'list-nav';

		printf( '<li class="%s"><a href="%s">%s</a></li>' . "\n", esc_attr($class), esc_url( get_pagenum_link( 1 ) ), '1' );

		if ( ! in_array( 2, $links ) )
			echo '<li>&hellip;</li>';
	}

	/**	Link to current page, plus 2 pages in either direction if necessary */
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? 'list-nav current' : 'list-nav';
		printf( '<li class="%s"><a href="%s">%s</a></li>' . "\n", esc_attr($class), esc_url( get_pagenum_link( $link ) ), $link );
	}

	/**	Link to last page, plus ellipses if necessary */
	if ( ! in_array( $max, $links ) ) {
		if ( ! in_array( $max - 1, $links ) )
			echo '<li>&hellip;</li>' . "\n";

		$class = $paged == $max ? 'list-nav current' : 'list-nav';
		printf( '<li class="%s"><a href="%s">%s</a></li>' . "\n", esc_attr($class), esc_url( get_pagenum_link( $max ) ), $max );
	}

	/**	Next Post Link */
	if ( get_next_posts_link() )
		printf( '<li>%s</li>' . "\n", get_next_posts_link( '&raquo;' ) );

	echo '</ul></nav>' . "\n";

} // end awards_posts_nav function
}
endif;

function awards_next_prev_posts() {
	$prev_post = get_previous_post();
	$next_post = get_next_post();
	if (!empty( $prev_post )){
		$title = $prev_post->post_title;
		if($title != ''){
			$title = $prev_post->post_title;
		} else {
			$title = get_the_date( 'd M Y', $prev_post->ID );
		}
	}
	
	if (!empty( $next_post )){
		$title2 = $next_post->post_title;
		if($title2 != ''){
			$title2 = $next_post->post_title;
		} else {
			$title2 = get_the_date( 'd M Y', $next_post->ID );
		}
	}
	?>
    <div class="row">
        <div class="col-md-12">
            <div class="section-button text-center">
                <div class="absolute-pager">
                    <nav>
                        <ul class="pager">
                        	<?php
							if (!empty( $prev_post )){?>					
								<li>
									<a href="<?php echo esc_url(get_permalink( $prev_post->ID )); ?>"><small><?php esc_html_e('Previous', 'awards'); ?></small></a>
								</li>
							<?php } ?>
                            <?php
						if (!empty( $next_post )){?>						
						<li>
							<a href="<?php echo esc_url(get_permalink( $next_post->ID )); ?>"><small><?php esc_html_e('Next', 'awards'); ?></small></a>
						</li>
                        <?php } ?>
                        </ul>
                    </nav>
                </div><!-- end left -->
            </div><!-- end button -->
        </div><!-- end col -->
    </div><!-- end row -->
    <?php
}

function awards_account_login_form(){
	?>
    <form class="defaultform row" method="post">
        <div class="col-md-6 col-md-offset-3">
            <div class="register-widget clearfix">
                <div class="widget-title">
                    <h3><?php echo esc_html__('Sign in Account', 'awards'); ?></h3>
                    <hr>
                </div><!-- end title -->
                <div class="row">
                    <div class="form-group col-lg-12">
                        <label><?php echo esc_html__('Username or Email', 'awards'); ?></label>
                        <input type="text" name="username" id="username" class="form-control" value="<?php if ( ! empty( $_POST['username'] ) ) echo esc_attr( $_POST['username'] ); ?>">
                    </div>
                    <div class="form-group col-lg-12">
                        <label><?php echo esc_html__('Password', 'awards'); ?></label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>        
                    <div class="col-sm-6">
                        <div class="checkbox checkbox-primary">
                            <input type="checkbox" class="styled" name="rememberme" id="rememberme" value="forever">
                            <label><?php echo esc_html__('Remember me', 'awards'); ?></label>
                        </div>                        
                    </div>
                    
                    <div class="col-sm-12">
                    	<input type="submit" class="btn btn-primary" name="login" value="<?php echo esc_attr__( 'Login', 'awards' ); ?>" />
                        <div class="lost-pass-link">
                        	<a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php echo esc_html__( 'Lost your password?', 'awards' ); ?></a>
                        </div>
                    </div>
                </div>          
            </div>
        </div>
    </form>
    <?php
}

function awards_menu_select(){	
	$result = array();
	$menus = get_terms( 'nav_menu', array( 'hide_empty' => false ) ); 

	foreach ( $menus as $value ) {	
		$array1 = array('value' => $value->name, 'label' => $value->name);		
		$result[] = $array1;
	}
    return $result;
}

function awards_template_single_sharing(){
	global $post;
	?>    
    <ul class="list-inline cat_list">
        <li class="facebook"><a href="//www.facebook.com/share.php?u=<?php echo get_permalink($post->ID); ?>"><i class="fa fa-facebook"></i> <?php echo esc_html__('Like', 'awards'); ?></a></li>
        <li class="twitter"><a href="http://twitter.com/home?status=<?php echo urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')); ?>: <?php the_permalink(); ?>"><i class="fa fa-twitter"></i> <?php echo esc_html__('Tweet', 'awards'); ?></a></li>
        <li class="google-plus"><a href="https://plus.google.com/share?url=<?php the_permalink(); ?>"><i class="fa fa-google-plus"></i> <?php echo esc_html__('Share', 'awards'); ?></a></li>
        <li class="pinterest"><a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo get_permalink($post->ID); ?>&title=<?php echo get_the_title($post->ID); ?>&summary=&source="><i class="fa fa-linkedin"></i> <?php echo esc_html__('LinkedIn', 'awards'); ?></a></li>
    </ul>
    <?php
}

function awards_insert_attachment($file_handler,$post_id,$setthumb='false') {
	if ($_FILES[$file_handler]['error'] !== UPLOAD_ERR_OK){ return __return_false();
	}

	$attach_id = media_handle_upload( $file_handler, $post_id );
	//set post thumbnail if setthumb is 1
	if ($setthumb == 1){
		update_post_meta($post_id,'_thumbnail_id',$attach_id);
	}
	return $attach_id;
}

//related sites
function awards_related_nominee() {
	global $post;
	
	$terms =  array();
    $postid = get_the_ID();
	$terms = wp_get_post_terms( $postid, 'nominee_tag' , array('fields' => 'slugs') );
	
	if( !empty($terms) ):
	
	$args = array(
	'post__not_in'	  => array($postid),
	'posts_per_page' => 6,
	'tax_query' => array(
		array(
			'taxonomy' => 'nominee_tag',
			'field' => 'slug',
			'terms' => $terms
		))
	);
	$query = new WP_Query( $args );
	?>
    <?php if ( $query->have_posts() ): ?>
    <div class="section-ab-title">
        <h4><?php esc_html_e('Recent Sites', 'awards'); ?></h4>
    </div>
    <div class="content">
        <div class="row list-items">
        	<?php while ( $query->have_posts() ) :$query->the_post(); ?>
        	<div class="col-md-6 col-sm-6">
                <div class="site-wrapper">
                    <div class="award-image entry">
                        <a href="<?php echo esc_url(get_permalink()); ?>">
                        	<?php awards_post_thumb( 700, 500 ); ?>
                        </a>
                    </div><!-- end image -->

                    <div class="site-small-desc clearfix">  
                        <div class="pull-left">
                            <h4><a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title(); ?></a></h4>
                            <p><?php echo esc_html__('By: ', 'awards'); ?> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo get_the_author(); ?></a></p>
                        </div>
                        <?php if(function_exists('themestall_show_user_likes')): ?>
                        <div class="likebutton pull-right text-center">
                            <?php echo do_shortcode(wp_kses_post('[jmliker]')); ?>
                        </div><!-- end pull-right -->
                        <?php endif; ?>
                    </div><!-- end desc -->
                </div><!-- end site-wrapper -->
            </div>
            <?php endwhile; ?>
        </div><!-- end row -->
    </div>			
    <?php endif; ?>
    <?php
	wp_reset_postdata();
	endif;
}

//submission sites
function awards_submission_nominee($authorid) {
	global $post;
	
	$query = new WP_Query( array( 'post_type' => 'nominee', 'author' => $authorid, 'posts_per_page' => 1 ) );

	?>
    <?php if ( $query->have_posts() ): ?>
    <div class="col-md-5">
        <div class="section-ab-title">
            <h4><?php esc_html_e('Submissions', 'awards'); ?></h4>
        </div>

        <div class="content">
            <div class="row list-items">
            	<?php while ( $query->have_posts() ) :$query->the_post(); ?>
                <div class="col-md-12">
                    <div class="site-wrapper">
                        <div class="award-image entry">
                            <a href="<?php echo esc_url(get_permalink()); ?>">
                            	<?php awards_post_thumb( 700, 500 ); ?>
                            </a>
                        </div><!-- end image -->

                        <div class="site-small-desc clearfix">  
                            <div class="pull-left">
                            	<h4><a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title(); ?></a></h4>
                            	<p><?php echo esc_html__('By: ', 'awards'); ?> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo get_the_author(); ?></a></p>
                            </div>
                            <?php if(function_exists('themestall_show_user_likes')): ?>
                            <div class="likebutton pull-right text-center">
                                <?php echo do_shortcode(wp_kses_post('[jmliker]')); ?>
                            </div><!-- end pull-right -->
                            <?php endif; ?>
                        </div><!-- end desc -->
                    </div><!-- end site-wrapper -->
                </div><!-- end col -->
                <?php endwhile; ?>
            </div><!-- end row -->
        </div><!-- end content -->
    </div><!-- end col -->			
    <?php endif; ?>
    <?php
	wp_reset_postdata();
}

function awards_custom_search_form(){
	?>
     <li class="search-menu hidden-sm">
        <form class="search-form" id="custom-search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
            <div class="form-group has-feedbacks">
                <label for="search" class="sr-only"><?php esc_html_e('Search', 'awards'); ?></label>
                <input type="text" class="form-control" name="s" id="s" placeholder="<?php esc_attr_e('search', 'awards'); ?>" value="<?php echo get_search_query(); ?>">
                <span class="flaticon-magnifying-glass form-control-feedback"></span>
            </div>
        </form>
    </li>
    <?php
}

// woocommerce functions
add_filter( 'woocommerce_page_title', 'awards_custom_woocommerce_title');
function awards_custom_woocommerce_title($page_title){
	?>
    <div class="section-title page-title">
        <h3 class="small-title"><?php echo esc_html($page_title); ?></h3>
    </div>
    <?php
}

function awards_extra_register_fields() {?>
       <p class="form-row form-row-wide">
       
       <label for="reg_as_nominee"><input type="checkbox" class="nominee-text" name="reg_nominee" id="reg_nominee" value="" />
       <?php esc_html_e( 'Apply for Agency or Nominee?', 'awards' ); ?></label>
       </p>
       <div class="clear"></div>
       <?php
 }
 add_action( 'woocommerce_register_form_end', 'awards_extra_register_fields' );
 
 /**
* Below code save extra fields.
*/
function awards_save_extra_register_fields( $customer_id ) {
    if ( isset( $_POST['reg_nominee'] ) ) {
		wp_update_user( array( 'ID' => $customer_id, 'role' => 'contributor' ) );
    }
}
add_action( 'woocommerce_created_customer', 'awards_save_extra_register_fields' );

add_filter('woocommerce_login_redirect', 'awards_login_redirect');
function awards_login_redirect( $redirect_to ) {
	$redirect_to = home_url();
	return $redirect_to;
}