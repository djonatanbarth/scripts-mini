#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
$link = $_GET["file"];
function str_between($string, $start, $end){ 
	$string = " ".$string; $ini = strpos($string,$start); 
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini; 
	return substr($string,$ini,$len); 
}
$link="http://www.youfreetv.net/index.php?section=channel&value=".$link;
$html=file_get_contents($link);
$rtmp=str_between($html,"streamer: '","'");
$y=str_between($html,"file: '","'");
$w=str_between($html,"flash', src: '","'");
$l="Rtmp-options:-a live -W ".$w." -y ".$y.",".$rtmp;
$l=str_replace(" ","%20",$l);
print $l;
?>
