<?php
/*
  Plugin Name: WP Thumbnail Slider
  Plugin URI: http://www.e2soft.com/blog/wp-thumbnail-slider/
  Description: WP Thumbnail Slider is a wordpress image slider plugin with thumbnail. Use this shortcode <strong>[WPT-SLIDER]</strong> in the post/page" where you want to display slider.
  Version: 3.8
  Author: S M Hasibul Islam
  Author URI: http://www.e2soft.com
  Copyright: 2018 S M Hasibul Islam http:/`/www.e2soft.com
  License URI: license.txt
  Text Domain: wpts
 */

#######################	WP Thumbnail Slider ###############################

//Register Post Type
function wptPostRegister() {
    $wptLabels = array(
        'name' => 'WPT Slides',
        'singular_name' => 'WPT Slid',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Slide',
        'edit_item' => 'Edit Slide',
        'new_item' => 'New Slide',
        'all_items' => 'All Slides',
        'view_item' => 'View Slide',
        'search_items' => 'Search Slide',
        'not_found' => 'No slides found',
        'not_found_in_trash' => 'No slides found in Trash',
        'parent_item_colon' => '',
        'menu_name' => 'WPT Slider'
    );

    $wptCustomPost = array(
        'labels' => $wptLabels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'wptslider'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title', 'editor', 'thumbnail')
    );
    register_post_type('wptpost', $wptCustomPost);
}
add_action('init', 'wptPostRegister');

// Include All PHP Files
foreach ( glob( plugin_dir_path( __FILE__ )."lib/*.php" ) as $wptfile )
    include_once $wptfile;

// Register Scripts	
function registerWptScript() {
    wp_enqueue_script('wpt-js', plugins_url('/js/wpt-js.js', __FILE__), array('jquery'));
    wp_enqueue_style('wpt-slide', plugins_url('/css/wpt-slide.css', __FILE__));
}
add_action('wp_enqueue_scripts', 'registerWptScript');

// Register Admin Scripts
function WptAdminScript() {
    wp_enqueue_style('wpt-admin', plugins_url('/css/wpt-admin.css', __FILE__));
	wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'iris', admin_url( 'js/iris.min.js' ), array( 'jquery-ui-draggable', 'jquery-ui-slider', 'jquery-touch-punch' ), false, 1 );
	wp_enqueue_script( 'cp-active', plugins_url('/js/cp-active.js', __FILE__), array('jquery'), '', true );
}
add_action('admin_enqueue_scripts', 'WptAdminScript');

// Slider Slide Loop
function wPTPostLoop() {
	//Slider Loop
    echo '<div id="wptSlider"><ul id="image-gallery" class="gallery list-unstyled cS-hidden">';
    $wptArgs = array(
        'post_type' => 'wptpost',
        'showposts' => 20,
        'orderby' => 'date',
        'order' => 'DESC'
    );
    $wptQuery = new WP_Query($wptArgs);
    while ($wptQuery->have_posts()) : $wptQuery->the_post();

        $thumb_id = get_post_thumbnail_id();
        $thumb_url = wp_get_attachment_image_src($thumb_id, 'full', true);
        ?>
        <li data-thumb="<?php echo $thumb_url[0]; ?>">
        	<img src="<?php echo $thumb_url[0]; ?>" />
        </li>
        <?php
    endwhile;
    echo '</ul>
	</div>';
    wp_reset_query(); 
}

// Slider Controller 
function slideScript() {
    ?>
    <script>
    	 jQuery(document).ready(function() {
			jQuery("#content-slider").lightSlider({
                loop:true,
                keyPress:true,
				auto: <?php if( get_option('wpt_auto_play') == 'wpt_play_on'){ echo 'true'; } else {echo 'false';}?>,
				pager: false,
				autoWidth: true,
            });
            jQuery('#image-gallery').lightSlider({
                gallery:true,
                item:1,
                thumbItem:10,
                slideMargin: 0,
                speed:500,
                auto:true,
                loop:true,
                onSliderLoad: function() {
                    jQuery('#image-gallery').removeClass('cS-hidden');
                }  
            });
		});
    </script>
    <?php
}
add_action('wp_footer', 'slideScript');

function imageSlideOption()
{
	echo get_option('slidingSysLarge').get_option('slidingSysThumb');
}
add_action('wp_footer', 'imageSlideOption', 100);

// Shoercode 
function wptThumbnailSlider() {
    return wPTPostLoop();
}
add_shortcode('WPT-SLIDER', 'wPTPostLoop');

// Activation Page Redirect
register_activation_hook(__FILE__, 'wpt_plugin_activate');
add_action('admin_init', 'wpt_plugin_redirect');

function wpt_plugin_activate() {
    add_option('wpt_plugin_do_activation_redirect', true);
}

function wpt_plugin_redirect() {
    if (get_option('wpt_plugin_do_activation_redirect', false)) {
        delete_option('wpt_plugin_do_activation_redirect');
        if(!isset($_GET['activate-multi']))
        {
            wp_redirect("edit.php?post_type=wptpost&page=wptpost");
        }
    }
}