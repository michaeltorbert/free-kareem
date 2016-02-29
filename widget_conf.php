<?php

function kareem_donations_widget_element(){

echo'<br />
	<form name="_xclick" action="https://www.paypal.com/cgi-bin/webscr" method="post">
							<input type="hidden" name="cmd" value="_xclick">
							<input type="hidden" name="business" value="chrisk@freekareem.org">
							<input type="hidden" name="item_name" value="Donate to Free Kareem">
							<input type="hidden" name="currency_code" value="USD">
							<input type="hidden" name="amount" value="">
							<input type="image" src="http://www.paypal.com/en_US/i/btn/x-click-butcc-donate.gif" border="0" name="submit" alt="Free Kareem Donation">
						</form>
';

}

function kareem_rotator_widget_element(){
	echo "<br />Rotating Image Gallery coming soon!<br />";
}

function kareem_video_widget_element(){

	$kareem_video_width = get_option(kareem_opt_video_width);
	$kareem_video_height = get_option(kareem_opt_video_height);
?><br /><object width="<?php echo $kareem_video_width ?>" height="<?php echo $kareem_video_height ?>"><param name="movie" value="http://www.youtube.com/v/kIsdzNarATs&hl=en&fs=1"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="http://www.youtube.com/v/kIsdzNarATs&hl=en&fs=1" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="<?php echo $kareem_video_width ?>" height="<?php echo $kareem_video_height ?>"></embed></object><br /><?php

}

function kareem_pic_widget_element(){
	
	global $img_path;
	global $plugin_path;
	$kareem_pic_width = get_option(kareem_opt_pic_width);
	$kareem_pic_height = get_option(kareem_opt_pic_height);
	?><br /><img src="<?php echo $img_path ?>kareem_behind_bars.jpg" width="<?php echo $kareem_pic_width ?>" height="<?php echo $kareem_pic_height ?>"/><br /><?php

}

function kareem_alert_widget_element(){
	echo '<br /><strong>ALERT!!</strong> A serious injustice was committed. Please take action now! Kareem Amer, an Egyptian blogger who was imprisoned for exercising his right to freedom of speech, is still in prison and needs YOUR help!<br />
	Find out more information by visiting <a href="http://freekareem.org" title="Kareem Amer">FreeKareem.org</a> or by networking with us.<br />';
}

function kareem_feed_widget_element(){

	require_once (ABSPATH . WPINC . '/rss.php');
	echo "<br /><em>Latest News from freekareem.org</em>";
	$rss = @fetch_rss('http://www.freekareem.org/feed/');
	if ( isset($rss->items) && 0 != count($rss->items) ) {
	?>
	<ul>
	<?php
	$kareem_feed_num = 5; //make this option later?
	$rss->items = array_slice($rss->items, 0, $kareem_feed_num);
	foreach ($rss->items as $item ) {
	?>
	<li>
	<a href='<?php echo wp_filter_kses($item['link']); ?>'>
	<?php echo wp_specialchars($item['title']); ?>
	</a>
	</li>
	<?php } ?>
	</ul>
	<?php } 


}

function kareem_buttons_widget_element(){
global $img_path;
global $plugin_path;

?><br /><a href="http://www.facebook.com/group.php?sid=ad4141412fa7b83f39672b4359fb5531&refurl=http%3A%2F%2Fwww.facebook.com%2Fs.php%3Finit%3Dq%26q%3Dfreekareem.org%26ref%3Dts%26sid%3Dad4141412fa7b83f39672b4359fb5531&gid=10271643891" title="Free Kareem Facebook"><img src="<?php echo $img_path ?>facebook.png" /></a>


	<a href="http://www.myspace.com/abdelkareem" title="Free Kareem MySpace"><img src="<?php echo $img_path; ?>myspace.png" /></a>


	<a href="http://www.youtube.com/profile_favorites?user=freekareem" title="Free Kareem Youtube"><img src="<?php echo $img_path; ?>youtube.png" /></a>

	<a href="http://twitter.com/freekareem" title="Free Kareem Twitter"><img src="<?php echo $img_path; ?>twitter.png" /></a>
<br /><?php
	}

function kareem_countup_widget_element(){

	$start = "November 6, 2006";
	$now = strtotime ("now");
	$then = strtotime ("$start");
	$difference = $now - $then ;
	$num = $difference/86400;
	$days = intval($num);
	
?>	
	<br />
	Kareem has been in prison for: &nbsp;
	<? echo $days ?> days.
<br />
<?php
}

function kareem_tellfriend_widget_element(){
	global $img_path;
	global $plugin_path;
?>	<br /><a href="<?php echo $plugin_path?>reqform.php" target="page" onClick="window.open('','page','toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=0,width=550,height=480,left=50,top=50,titlebar=yes')"><img src="<?php echo $img_path ?>tellfriend.png" /></a><br />
<?php
}

function kareem_downloadlink_widget_element(){
	echo '<br /><a href="http://wordpress.org/extend/plugins/free-kareem/" title="Free Kareem Plugin">Download</a> this plugin!<br />';
}




?>