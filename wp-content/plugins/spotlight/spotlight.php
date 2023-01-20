<?php

/*
Plugin Name: Spotlight
Plugin URI: herpaytamas@gmail.com
Description: This plugin defines a [spotlight title="Spotlights" items="12322,1122,4333" ] shortcode which shows the images and content of the spotlight type custom posts in three column vies
Version: 1.0
Author: Tamas Herpay
Author URI: herpaytamas@gmail.com
License: GPL2
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}


define( 'SPL_PLUGIN_DIR', plugin_dir_path( __FILE__ ));
define( 'SPL_PLUGIN_URL', plugin_dir_url( __FILE__ ));
define( 'SPL_CSS_URL', SPL_PLUGIN_URL."css/" );
define( 'SPL_JS_URL', SPL_PLUGIN_URL."js/" );

add_action( 'wp_enqueue_scripts', 'spl_styles_js_scripts' );

function spl_styles_js_scripts(){
    wp_register_script( 'spl-smoothdivscroll', SPL_JS_URL . 'smoothDivScroll.js', array("jquery"), "1.1",true);
    wp_enqueue_script('spl-smoothdivscroll');
    //  wp_enqueue_script('jquery-ui', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/jquery-ui.min.js', array('jquery'), '1.8.6');
    wp_enqueue_script('spl-main-script', SPL_JS_URL . 'spotlight.js', array("jquery"), "1.111");
    wp_enqueue_script('jquery-ui-widget');
    wp_enqueue_style('spl-smoothdivscroll-css', SPL_CSS_URL . 'smoothDivScroll.css?ii=123');
    wp_enqueue_style('spl-main-css', SPL_CSS_URL . 'spotlight.css?ii=123');
}


add_action( 'init', 'spl_register_custom_posts');


function spl_register_custom_posts(){

    $args = array('labels' => array(
        'name' => __('Spotlights'),
        'singular_name' => __('Spotlight'),
        'add_new' => __('Add New'),
        'add_new_item' => __('Add New Spotlight'),
        'edit_item' => __('Edit Spotlight'),
        'new_item' => __('New Spotlight'),
        'view_item' => __('View Spotlight'),
        'search_items' => __('Search Spotlight'),
        'not_found' => __('No Spotlights found'),
        'not_found_in_trash' => __('No Spotlights found in Trash')
    ),
        'public' => false,
        'has_archive' => false,
        'supports' => array('title', 'editor', 'thumbnail'),
        'hierarchical' => false,
        'show_ui' => true,
        'publicly_queryable' => false,
        'exclude_from_search' => true
    );

    register_post_type('spotlight', $args);

    $args = array('labels' => array(
        'name' => __('Top Books'),
        'singular_name' => __('Top Book'),
        'add_new' => __('Add New'),
        'add_new_item' => __('Add New Top Book'),
        'edit_item' => __('Edit Top Book'),
        'new_item' => __('New Top Book'),
        'view_item' => __('View Top Book'),
        'search_items' => __('Search Top Book'),
        'not_found' => __('No Top Books found'),
        'not_found_in_trash' => __('No Top Books found in Trash')
    ),
        'public' => false,
        'has_archive' => false,
        'supports' => array('title', 'thumbnail'),
        'hierarchical' => false,
        'show_ui' => true,
        'publicly_queryable' => false,
        'exclude_from_search' => true
    );

    register_post_type('top-book', $args);
}

if ( is_admin() ){
    add_action('admin_menu', 'spl_admin_boxes');
}


function spl_admin_boxes(){
    add_meta_box('spotlight_image_caption', 'Image caption', 'spl_show_image_caption', 'spotlight', 'side');
    add_meta_box('spotlight_read_more', 'Read More Link', 'spl_show_read_more', 'spotlight', 'side');
    //add_meta_box('top_books_subtitle', 'Subtitle of the Book', 'spl_show_top_books_subtitle', 'top-book');
    add_meta_box('top_books_link', 'Link of the Book', 'spl_show_top_books_link', 'top-book');
}


function spl_show_top_books_subtitle($post){
    $top_books_subtitle=get_post_meta($post->ID,'top_books_subtitle',true);
    ?>
    <p>Book subtitle:</p>
    <p>
        <input type="text" name="top_books_subtitle" value="<?php echo $top_books_subtitle; ?>" style="width:80%;">
    </p>
    <?php
}
function spl_show_top_books_link($post){
    $top_books_link=get_post_meta($post->ID,'top_books_link',true);
    ?>
    <p>Book link URL:</p>
    <p>
        <input type="text" name="top_books_link" value="<?php echo $top_books_link; ?>" style="width:80%;">
        <input type="hidden" name="save-top_books" value="yes">
    </p>
    <?php
}


function spl_show_image_caption($post){
    $spotlight_image_caption=get_post_meta($post->ID,'spotlight_image_caption',true);
    ?>
    <p>Image Caption:</p>
    <p>
        <input type="text" name="spotlight_image_caption" value="<?php echo $spotlight_image_caption; ?>">
        <input type="hidden" name="save-spotlight" value="yes">
    </p>
    <?php
}

function spl_show_read_more($post){
    $spotlight_read_more=get_post_meta($post->ID,'spotlight_read_more',true);
    ?>
    <p>Link this spotlight to the URL:</p>
    <p>
        <input type="text" name="spotlight_read_more" value="<?php echo $spotlight_read_more; ?>">

    </p>
    <?php
}


add_action('save_post', 'spl_save_posts', 1, 2);

function spl_save_posts($post_id, $post){
    if (!current_user_can('edit_post', $post->ID)) {
        return $post->ID;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }

    if ($post->post_type == 'spotlight' && $_POST['save-spotlight'] == 'yes') {
        update_post_meta($post_id,"spotlight_image_caption",$_POST['spotlight_image_caption']);
        update_post_meta($post_id,"spotlight_read_more",$_POST['spotlight_read_more']);
    }

    if ($post->post_type == 'top-book' && $_POST['save-top_books'] == 'yes') {
        update_post_meta($post_id,"top_books_link",$_POST['top_books_link']);
        //update_post_meta($post_id,"top_books_subtitle",$_POST['top_books_subtitle']);
    }
    return $post->ID;
}

add_shortcode('spotlights','show_spotlights');

function show_spotlights($atts){
    $test=true;
    $style='<style>
    #pgc-390-spl-0-0 , #pgc-390-spl-0-1 , #pgc-390-spl-0-2 {
        width:33.3333%;
        width:calc(33.3333% - ( 0.66666666666667 * 30px ) );
        float:left;
        margin-right:30px;
    }
    #pgc-390-spl-0-2 {
      margin-right:0px;
    }
    #pg-390-spl-0 , #pl-390-spl .so-panel {
        margin-bottom:30px ;
    }
    #pgc-390-spl-1-0 {
        width:100%;
        width:calc(100% - ( 0 * 30px ) );
    }
    #pl-390-spl .so-panel:last-child {
        margin-bottom:0px
    }
    #pg-390-spl-0.panel-no-style,#pg-390-spl-0.panel-has-style > .panel-row-style ,
    #pg-390-spl-1.panel-no-style, #pg-390-spl-1.panel-has-style > .panel-row-style {
        -webkit-align-items:flex-start;
        align-items:flex-start
    }
    .spl-image-wrapper{
        position:relative;width:100%;
        }
        .spl-wrapper{
        background-color: #fff;
        color:#000000;
        border:solid 1px #aaa;
        }
        .spl-image-wrapper img{
        width:100%;
        }
        .spl-caption{
        display:inline-block;
        position:absolute;
        bottom:-13px;
        height:28px;
        line-height: 28px;
        background-color: #333;
        color:#fff;
        padding-left:12px;
        padding-right:12px;
        left:-6px;
        font-family: "Rubik", sans-serif;
text-transform: uppercase;
font-weight: 500;
        }
.spl-caption:after{
display:block;
position:absolute;
right:-9px;
top:0px;
height: 28px;
width:9px;
content: "";
background-image:url("https://featheredquill.com/wp-content/uploads/2017/06/spotlight-arrow.png");
background-size:cover;
}
.spl-caption:before{
display:block;
position:absolute;
left:0px;
bottom:-6px;
height: 6px;
width:6px;
content: "";
background-image:url("https://featheredquill.com/wp-content/uploads/2017/06/ribbon-shadow-left-black.png");
background-size:cover;
}
        .spl-content{
        padding-left:20px;
        padding-right:20px;
        padding-top:0px;
        padding-bottom:8px;
        text-align:justify;
        }
		.spl_header{
padding-left:30px;
font-size:32px;
background-color:#fff;
border-top: solid 1px #ccc;
border-bottom: solid 1px #ccc;
font-family: "Rubik", sans-serif;
font-weight: 500;
    letter-spacing: 2px;
    height: 52px;
    line-height: 52px;
    font-size: 28px;
    text-transform: uppercase;
position:relative;
margin-bottom:40px;
		}
.spl_header:before{
display:block;
background-image:url("https://featheredquill.com/wp-content/uploads/2017/06/section-wrapper-arrow.png");
content:" ";
position:absolute;
left:calc(50% - 14px);
bottom:-12px;
width:28px;
height:12px;
}
    @media (max-width:780px){
        #pg-390-spl-0.panel-no-style, #pg-390-spl-0.panel-has-style > .panel-row-style ,
        #pg-390-spl-1.panel-no-style, #pg-390-spl-1.panel-has-style > .panel-row-style {
            -webkit-flex-direction:column;
            -ms-flex-direction:column;
            flex-direction:column
        }
        #pg-390-spl-0 .panel-grid-cell , #pg-390-spl-1 .panel-grid-cell {
            margin-right:0
        }
        #pg-390-spl-0 .panel-grid-cell , #pg-390-spl-1 .panel-grid-cell {
            width:100%
        }
        #pgc-390-spl-0-0 , #pgc-390-spl-0-1 {
            margin-bottom:30px
        }
        #pl-390-spl .panel-grid-cell {
            padding:0
        }
        #pl-390-spl .panel-grid .panel-grid-cell-empty {
            display:none
        }
        #pl-390-spl .panel-grid .panel-grid-cell-mobile-last {
            margin-bottom:0px
        }
    }
    .spl-read-more-link{
        font-family: "Rubik", sans-serif;
		font-weight: 500;
font-size: 18px;
    line-height: 37px;
    height: 37px;
    text-align: right;
    padding-right: 10px;
    background-color: #eee;
    color: #999;
    border-top: solid 1px #ccc;
    }
    .spl-read-more-link a{
text-decoration:none;
color:#999
    }
.spl-read-more-link a:hover{
text-decoration:none;
color:#555;
    }
    </style>';

    $html="";
    $atts = shortcode_atts(
        array(
            'title' => "",
            'items' => 'latest'
        ), $atts);
    $items=explode(",",$atts['items']);
    //print_r($items);
    $ids=array();
    if(is_array($items) && count($items)>2){
        $items=array_map(function($v){$v=trim($v);if(intval($v)>0) return $v; else return false;},$items);
    }
    $ids=array_filter($items,function($v){return ($v>0);});
    //print_r($ids);
    //return "OK".print_r($items,true).print_r($ids,true);
    $args=array('post_type'=>'spotlight','post_status'=>'publish');
    $spl_posts=array();
    if(count($ids)>2){
        $args['posts_per_page']=1;
        foreach($ids as $id){
            $args['include']=array($id);
            $posts=get_posts($args);
            if(is_array($posts) && count($posts)==1 && $posts[0]->ID>0){
                $spl_posts[]=$posts[0];
            }
        }
    }
    //return "OK".print_r($ids,true).print_r($spl_posts,true);
    if(count($spl_posts)<3){
        $args=array('post_type'=>'spotlight','post_status'=>'publish','posts_per_page'=>3);
        $spl_posts=get_posts($args);
    }

    if(count($spl_posts)>2 ){
        $html=$style.'<div class="row">';
        if(trim($atts['title'])!=""){
            $html.='<h1 class="spl_header">'.$atts['title']."</h1>";
        }
        $html.='<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <div class="content-page">
                        <div class="post-padding clearfix">
                            <div id="pl-390-spl"  class="panel-layout" >
                                <div id="pg-390-spl-0"  class="panel-grid panel-no-style" >';
        $i=0;
        foreach($spl_posts as $spl){
            $content=$spl->post_content;
            $img=get_the_post_thumbnail($spl->ID);
            $caption=get_post_meta($spl->ID,'spotlight_image_caption',true);
            $read_more=get_post_meta($spl->ID,'spotlight_read_more',true);
            $title=$spl->post_title;
            if($caption && $caption!=""){
                $caption="<span class='spl-caption'>".$caption."</span>";
            }
            if($img && $img!=""){
                $img="<div class='spl-image-wrapper'>".$img.$caption."</div>";
            }
            $rm="";
            if($read_more && $read_more!="" ){
                $rm="<div class='spl-read-more-link'><a href='$read_more'>READ MORE ></a></div>";
            }
            $block=$img."<div class='spl-content'><h1>".$title."</h1>".$content."</div>";
            $html.='<div id="pgc-390-spl-0-'.$i.'"  class="panel-grid-cell" >
                      <div id="panel-390-spl-0-'.$i.'-0" class="so-panel widget widget_text panel-first-child panel-last-child" data-index="'.$i.'" >
                                <div class="spl-wrapper">
                                    '.$block.$rm.'
                                </div>
                      </div>
                    </div>';
            $i++;
        }
        $html.='<div style="clear:both;"></div></div></div></div></div></div></div>';
        return $html;
    }

}


add_shortcode('topbooks','show_topbooks');

function show_topbooks($atts){
    $html="";
    $atts = shortcode_atts(
        array(
            'items' => 'latest'
        ), $atts);
    $items=explode(",",$atts['items']);
    //print_r($items);
    $ids=array();
    if(is_array($items) && count($items)>4){
        $items=array_map(function($v){$v=trim($v);if(intval($v)>0) return $v; else return false;},$items);
    }
    $ids=array_filter($items,function($v){return ($v>0);});
    //print_r($ids);
    //return "OK".print_r($items,true).print_r($ids,true);
    $args=array('post_type'=>'top-book','post_status'=>'publish');
    $spl_posts=array();
    if(count($ids)>4){
        $args['posts_per_page']=1;
        foreach($ids as $id){
            $args['include']=array($id);
            $posts=get_posts($args);
            if(is_array($posts) && count($posts)==1 && $posts[0]->ID>0){
                $spl_posts[]=$posts[0];
            }
        }
    }
    //return "OK".print_r($ids,true).print_r($spl_posts,true);
    if(count($spl_posts)<5){
        $args=array('post_type'=>'top-book','post_status'=>'publish','posts_per_page'=>100);
        $spl_posts=get_posts($args);
    }

    if(count($spl_posts)>4 ){
        $html.='<div class="row">';
        $html.='<div id="dontmiss-bar">';
        $html.='<div class="ribbon-shadow-left">&nbsp;</div>';
        $html.="<div id='dontmiss-header'>Don't Miss</div>";
        $html.='<div id="dontmiss-arrow">&nbsp;</div>';
        $html.='<div class="dontmiss" id="dontmiss">';

        foreach($spl_posts as $spl){
            $img=get_the_post_thumbnail_url($spl->ID);
            $link=get_post_meta($spl->ID,'top_books_link',true);
            $title=$spl->post_title;
            if(!$link || $link==""){
                $link="#";
            }
            ob_start();
            ?>
            <div class="tb-panel">
                <div class="tb-image">
                    <a href="<?php echo $link; ?>"><img height="40" src="<?php echo $img; ?>" class="attachment-footer-thumbnail wp-post-image" alt="" title="" /></a>
                </div>
                <div class="tb-title">
                    <a href="<?php echo $link; ?>"><?php echo $title; ?></a>
                </div>
            </div>
            <?php
            $html.=ob_get_clean();
        }

        $html.='<div class="tb-panel" style="width:320px"></div>';
        $html.="             </div>
                             <div id='dontmiss-header-right'></div>
                        <br class='clearer' style='clear: both;line-height: 0px !important;font-size: 0px !important;height: 0px !important;' />
                    </div>";

        $html.='</div>';
    }
    return $html;
}