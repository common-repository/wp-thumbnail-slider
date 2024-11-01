<?php
// Add Functions Page
function registerwptPage() {
	add_submenu_page( 'edit.php?post_type=wptpost', 'WPT Slider Settings', 'Slider Settings', 'manage_options', 'wptpost', 'wptPageFunction' ); 
}
add_action('admin_menu', 'registerwptPage');

function wptPageFunction() {
	
	echo '<div class="newsWrap">';
		echo '<h1>WPT Slider Configurations</h1>';
?>

<div id="nhtLeft">
  <form method="post" action="options.php">
    <?php wp_nonce_field('update-options'); ?>
    <div class="inside">
    <h3>Insert your text & background color</h3>
    <p>WP Thumbnail Slider is a fully responsive wordpress image slider plugin with thumbnail. <strong>"PLEASE DON'T USE VARIOUS SIZE IMAGE ON SLIDER. USE SAME SIZE IMAGE"</strong>. <br />
      Just copy and paste "<strong> if(function_exists('wptThumbnailSlider')){wPTPostLoop(); }</strong> in the template code or <strong>[WPT-SLIDER]</strong> in the post/page" where you want to display imgae slider.</p>
    <hr />
    <table class="form-table">
      <tr>
        <th><label for="wpt_border_radius">Border Radius</label></th>
        <td><input type="text" name="wpt_border_radius" value="<?php $wpt_border_radius = get_option('wpt_border_radius'); if(!empty($wpt_border_radius)) {echo $wpt_border_radius;} else {echo "0";}?>">
          px;</td>
      </tr>
      <tr>
        <th><label for="wpt_border">Slider Border </label></th>
        <td><input type="text" name="wpt_border" value="<?php $wpt_border = get_option('wpt_border'); if(!empty($wpt_border)) {echo $wpt_border;} else {echo "0";}?>">
          px;</td>
      </tr>
      <tr>
        <th><label for="wpt_bg_color">Slider Border Color </label></th>
        <td><input type="text" name="wpt_bg_color" id="wpt_bg_color" value="<?php $wpt_bg_color = get_option('wpt_bg_color'); if(!empty($wpt_bg_color)) {echo $wpt_bg_color;} else {echo "#569625";}?>" class="color-picker nht_bg_color" /></td>
      </tr>
      <tr>
        <th><label for="wpt_thumb_border">Thumbnail Border Color</label></th>
        <td><input type="text" name="wpt_thumb_border" id="wpt_thumb_border" value="<?php $wpt_thumb_border = get_option('wpt_thumb_border'); if(!empty($wpt_thumb_border)) {echo $wpt_thumb_border;} else {echo "#0a0a0a";}?>" class="color-picker wpt_thumb_border" /></td>
      </tr>
      <tr>
        <th><label for="wpt_thumb_hover">Thumbnail Border Hover</label></th>
        <td><input type="text" name="wpt_thumb_hover" id="wpt_thumb_hover" value="<?php $wpt_thumb_hover = get_option('wpt_thumb_hover'); if(!empty($wpt_thumb_hover)) {echo $wpt_thumb_hover;} else {echo "#ae66b0";}?>" class="color-picker wpt_thumb_hover" /></td>
      </tr>
      <tr>
        <th><label for="wpt_auto_play" class="wpt_auto_play">Auto Play</label></th>
        <td><select name="wpt_auto_play" id="wpt_auto_play">
            <option value="wpt_play_on" <?php if( get_option('wpt_auto_play') == 'wpt_play_on'){ echo 'selected="selected"'; } ?>>On</option>
            <option value="wpt_play_off" <?php if( get_option('wpt_auto_play') == 'wpt_play_off'){ echo 'selected="selected"'; } ?>>Off</option>
          </select></td>
      </tr>
    </table>
    <input type="hidden" name="action" value="update" />
    <input type="hidden" name="page_options" value="wpt_border_radius, wpt_border, wpt_thumb_size, wpt_bg_color, wpt_thumb_border, wpt_thumb_hover, wpt_auto_play" />
    <p class="submit">
      <input type="submit" name="Submit" value="<?php _e('Save Changes') ?>" class="button button-primary" />
    </p></div>
  </form>
  <hr />
  <div> </div>
</div>

<div id="nhtRight">
  <div class="nhtWidget">
    <h3>Donate and support the development.</h3>
    <p>With your help I can make Simple Fields even better! $5, $10, $100 – any amount is fine! :)</p>
    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
      <input type="hidden" name="cmd" value="_s-xclick">
      <input type="hidden" name="hosted_button_id" value="82C6LTLMFLUFW">
      <input type="image" src="https://www.paypalobjects.com/en_US/GB/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal – The safer, easier way to pay online.">
      <img alt="" border="0" src="https://www.paypalobjects.com/en_GB/i/scr/pixel.gif" width="1" height="1">
    </form>
  </div>
  <div class="nhtWidget">
    <h3>About the Plugin</h3>
    <p>WP Thumbnail Slider is a fully responsive wordpress image slider plugin with thumbnail. You can also make my day by submitting a positive review on <a href="https://wordpress.org/support/view/plugin-reviews/wp-thumbnail-slider" target="_blank"><strong>WordPress.org!</strong> <img src="<?php bloginfo('url' ); echo"/wp-content/plugins/wp-thumbnail-slider/img/review.png"; ?>" alt="review" class="review"/></a></p>
    <p><strong>View live demo & support of <a href="http://www.e2soft.com/blog/wp-thumbnail-slider/" target="_blank">WP Thumbnail Slider</a> and <a href="https://www.youtube.com/watch?v=4daJ27K3tM0" target="_blank">video tutorial.</a></strong></p>
    <div class="clrFix"></div>
  </div>
  <div class="nhtWidget">
    <div class="clrFix"></div>
    <h3>About the Author</h3>
    <p>My name is <strong><a href="https://www.upwork.com/freelancers/~01bf79370d989b2033" target="_blank">S M Hasibul Islam</a></strong> and I am a <strong><a href="http://www.e2soft.com/" target="_blank">Web Developer, Expert WordPress Developer</a></strong>. I am regularly available for interesting freelance projects. If you ever need my help, do not hesitate to get in touch <a href="https://www.upwork.com/freelancers/~01bf79370d989b2033" target="_blank">me</a>.<br />
      <strong>Skype:</strong> cse.hasib<br />
      <strong>Email:</strong> info@e2soft.com<br />
      <strong>Web:</strong> <a href="http://www.e2soft.com/">www.e2soft.com</a><br />
    <div class="clrFix"></div>
  </div>
  <div class="nhtWidget">
    <hr />
    <h3>Our Services</h3>
    <?php
	//bdonlinebazar.com
	$bdo_url = array("http://www.bdonlinebazar.com/","http://www.bdonlinebazar.com/products/clothing/","http://www.bdonlinebazar.com/products/electronics/","http://www.bdonlinebazar.com/products/watches/","http://www.bdonlinebazar.com/products/home-living");
	$bdo_random_urls = array_rand($bdo_url);
	
	//e2soft.com
	$e2_url = array("http://www.e2soft.com/web-design/","http://www.e2soft.com/web-design/","http://www.e2soft.com/web-design/","http://www.e2soft.com/portfolio","http://www.e2soft.com/");
	$e2_random_urls = array_rand($e2_url);
	
	//bdtrips.com
	$bdtrips_url = array("http://bdtrips.com/","http://bdtrips.com/hotels/","http://bdtrips.com/tour-packages/","http://bdtrips.com/car-rentals/","http://bdtrips.com/tourist-spots/","http://bdtrips.com/contact/");
	$bdtrips_random_urls = array_rand($bdtrips_url);
	?>
    <a href="<?php echo $e2_url["$e2_random_urls"]; ?>" target="_blank">Website Design & Development</a><br />
    <a href="<?php echo $bdtrips_url["$bdtrips_random_urls"]; ?>" target="_blank">Book your Trips Online</a><br />
    <a href="<?php echo $bdo_url["$bdo_random_urls"]; ?>" target="_blank">Online Shopping Bangladesh</a><br />
    <!--<iframe class="border_1" src="<?php echo $bdo_url["$bdo_random_urls"]; ?>" width="320" height="300"> </iframe>-->
    <div class="clrFix"></div>
  </div>
</div>
<div class="clrFix"></div>
</div>
<div class="clrFix"></div>
<?php		
	echo '</div>';
}