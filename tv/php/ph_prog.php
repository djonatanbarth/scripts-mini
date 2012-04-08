#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
error_reporting(0);
function str_between($string, $start, $end){
	$string = " ".$string; $ini = strpos($string,$start);
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini;
	return substr($string,$ini,$len);
}
$id = $_GET["file"];
$link="http://www.livehd.tv/epg/epg.php";
$html = file_get_contents($link);
$t1=explode('table class="text3"',$html);
$html=$t1[$id];
if ($id > 0) {
$videos = explode('text=', $html);
unset($videos[0]);
$videos = array_values($videos);
foreach($videos as $video) {
  $t1=explode(' ',$video);
  $ora=trim($t1[0]);
  $t1=explode(' ',$video);
  $t2=explode('"',$t1[1]);
  $emisiune=trim($t2[0]);
  $emisiune=str_replace("&nbsp;","",$emisiune);
print($ora." ".$emisiune."\n\r");
}
}
?>

