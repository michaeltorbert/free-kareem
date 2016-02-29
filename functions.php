<?php

function widget_mrt_kareem($args) {
  extract($args);
  echo "\n <!--Free Kareem WordPress plugin widget by Michael Torbert of http://semperfiwebdesign.com/ \n plugin url: http://semperfiwebdesign.com/plugins/free-kareem/-->\n";
  echo $before_widget;
  echo $before_title . "Free Kareem" . $after_title;
  mrt_kareem_guts_widget();
  //echo "<h6><em>" . "Sponsored by the <a href='http://www.freekareem.org/' title='Free Kareem Coalition''>Free Kareem Coalition</a>" . "</em></h6>";
  echo $after_widget;
  echo "\n <!--End of Free Kareem plugin widget-->";
}

function mrt_kareem_widget_init(){
   register_sidebar_widget(__('Free Kareem'), 'widget_mrt_kareem');
}

function setup_options(){

}


?>