#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
error_reporting(0);
function str_between($string, $start, $end){
	$string = " ".$string; $ini = strpos($string,$start);
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini;
	return substr($string,$ini,$len);
}
$link = $_GET["file"];
$html = file_get_contents($link);
$videos = explode('<tr>', $html);
unset($videos[0]);
$videos = array_values($videos);
foreach($videos as $video) {
  $t1=explode('size="2">',$video);
  $t2=explode('<',$t1[1]);
  $ora=$t2[0];
  $t1=explode('size="2">',$video);
  $t2=explode('<',$t1[2]);
  $emisiune=$t2[0];
print($ora." ".$emisiune."\n\r");
}
?>

