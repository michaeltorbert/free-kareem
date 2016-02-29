<?php

function mrt_kareem_guts_widget()
{  ?>

<?php


if (get_option('kareem_opt_alert'))
kareem_alert_widget_element();

if (get_option('kareem_opt_buttons'))
kareem_buttons_widget_element();

if (get_option('kareem_opt_donations'))
kareem_donations_widget_element();

if (get_option('kareem_opt_rotator'))
kareem_rotator_widget_element();

if (get_option('kareem_opt_video'))
kareem_video_widget_element();

if (get_option('kareem_opt_pic'))
kareem_pic_widget_element();

if (get_option('kareem_opt_feed'))
kareem_feed_widget_element();

if (get_option('kareem_opt_countup'))
kareem_countup_widget_element();

if (get_option('kareem_opt_tellfriend'))
kareem_tellfriend_widget_element();

if (get_option('kareem_opt_downloadlink'))
kareem_downloadlink_widget_element();


?>

<form name='mrt_sub_form' id='mrt_sub_form' method='POST' action='<?= "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING'] ?>'>
</form>
<?php } ?>