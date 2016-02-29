<?php
function mrt_kareem_options_page() { 
	

	add_option('kareem_opt_pic_width','150');
	add_option('kareem_opt_pic_height','98');
	add_option('kareem_opt_video_width','150');
	add_option('kareem_opt_video_height','150');
	add_option('kareem_opt_donations','on');
	add_option('kareem_opt_rotator','on');
	add_option('kareem_opt_video','on');
	add_option('kareem_opt_pic','on');
	add_option('kareem_opt_alert','on');
	add_option('kareem_opt_feed','on');
	add_option('kareem_opt_buttons','on');
	add_option('kareem_opt_countup','on');
	add_option('kareem_opt_tellfriend','on');
	add_option('kareem_opt_downloadlink','on');
?>
	<div class="wrap">
	<h2>Free Kareem</h2>

	<form method="post" action="options.php">
	<?php wp_nonce_field('update-options'); ?>

	<table class="form-table">
	<tr valign="top">
	<th scope="row">Donations</th>
	<td><input type="checkbox" name="kareem_opt_donations" <?php if (get_option('kareem_opt_donations')) echo "checked=\"1\""; ?> /></td>
	</tr>

	<tr valign="top">
	<th scope="row">Rotating Image Gallery <br /></th>
	<td><input type="checkbox" name="kareem_opt_rotator" <?php if (get_option('kareem_opt_rotator')) echo "checked=\"1\""; ?> /><em>Coming Soon!</em></td>
	</tr>

	<tr valign="top">
	<th scope="row">Video</th>
	<td><input type="checkbox" name="kareem_opt_video" <?php if (get_option('kareem_opt_video')) echo "checked=\"1\""; ?> />
			Width<input type="text" name="kareem_opt_video_width" value="<?php echo get_option('kareem_opt_video_width'); ?>" />
			Height<input type="text" name="kareem_opt_video_height" value="<?php echo get_option('kareem_opt_video_height'); ?>" /></td>
	</tr>

	<tr valign="top">
	<th scope="row">Picture of Kareem</th>
	<td><input type="checkbox" name="kareem_opt_pic" <?php if (get_option('kareem_opt_pic')) echo "checked=\"1\""; ?> />
		Width<input type="text" name="kareem_opt_pic_width" value="<?php echo get_option('kareem_opt_pic_width'); ?>" />
		Height<input type="text" name="kareem_opt_pic_height" value="<?php echo get_option('kareem_opt_pic_height'); ?>" /></td>
	</tr>
	
	<tr valign="top">
	<th scope="row">Alert Notice</th>
	<td><input type="checkbox" name="kareem_opt_alert" <?php if (get_option('kareem_opt_alert')) echo "checked=\"1\""; ?> /></td>
	</tr>
	
	<tr valign="top">
	<th scope="row">freekareem.org Feed</th>
	<td><input type="checkbox" name="kareem_opt_feed" <?php if (get_option('kareem_opt_feed')) echo "checked=\"1\""; ?> /></td>
	</tr>
	
	<tr valign="top">
	<th scope="row">Social Networking Links</th>
	<td><input type="checkbox" name="kareem_opt_buttons" <?php if (get_option('kareem_opt_buttons')) echo "checked=\"1\""; ?> /></td>
	</tr>
	
	<tr valign="top">
	<th scope="row">Imprisonment Day Count</th>
	<td><input type="checkbox" name="kareem_opt_countup" <?php if (get_option('kareem_opt_countup')) echo "checked=\"1\""; ?> /></td>
	</tr>
	
	<tr valign="top">
	<th scope="row">Tell a Friend Form</th>
	<td><input type="checkbox" name="kareem_opt_tellfriend" <?php if (get_option('kareem_opt_tellfriend')) echo "checked=\"1\""; ?> /></td>
	</tr>
	
	<tr valign="top">
	<th scope="row">Plugin Download Link</th>
	<td><input type="checkbox" name="kareem_opt_downloadlink" <?php if (get_option('kareem_opt_downloadlink')) echo "checked=\"1\""; ?> /></td>
	</tr>

	</table>

	<input type="hidden" name="action" value="update" />
	<input type="hidden" name="page_options" value="kareem_opt_donations, kareem_opt_rotator, kareem_opt_video, kareem_opt_pic, kareem_opt_alert, kareem_opt_feed, kareem_opt_buttons, kareem_opt_countup, kareem_opt_tellfriend, kareem_opt_downloadlink,kareem_opt_pic_width,kareem_opt_pic_height,kareem_opt_video_width,kareem_opt_video_height" />

	<p class="submit">
	<input type="submit" name="Submit" value="<?php _e('Save Changes') ?>" />
	</p>

	</form>
	</div>
	<?php
}
  
?>
