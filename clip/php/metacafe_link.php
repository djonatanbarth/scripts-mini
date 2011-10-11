#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
$link = $_GET["file"];
function str_between($string, $start, $end){
	$string = " ".$string; $ini = strpos($string,$start);
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini;
	return substr($string,$ini,$len);
}
$html = file_get_contents($link);
$link = urldecode(str_between($html, '<object classid="', '</object>'));
$link1 = str_between($link,'"mediaURL":"','"');
$key = str_between($link,'"key":"','"');
$link1= str_replace('\/','/',$link1);
$link1= str_replace('\/','/',$link1);
$link1 = str_replace(' ','%20',$link1);
$link1 = str_replace('[','%5B',$link1);
$link1 = str_replace(']','%5D',$link1);
$link2 = $link1."?__gda__=".$key;
print $link2;
?>
