#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
$link = $_GET["file"];
$html = file_get_contents($link);
$t1 = explode('"video_url_encoded":"', $html);
$t2 = explode('"', $t1[1]);
$link = urldecode($t2[0]);
if ($link=="") {
  $t1=explode('var videourl="',$html);
  $t2=explode('"',$t1[1]);
  $link=$t2[0];
}
print $link;
?>
