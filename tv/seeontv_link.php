#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
$query = $_GET["file"];
$queryArr = explode(',', $query);
$link = $queryArr[0];
$tit = urldecode($queryArr[1]);
function str_between($string, $start, $end){ 
	$string = " ".$string; $ini = strpos($string,$start); 
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini; 
	return substr($string,$ini,$len); 
}
//streamer=rtmp%3A%2F%2Flive00.seeon.tv%2Fredirect&file=hhzpgreq2jowut3.flv&autostart=true&plugins=http://static.seeon.tv/jwplayer/seeon-plugin.swf
$html = file_get_contents($link);
$server=mt_rand(1,30);
$t1=explode('streamer=',$html);
$t2=explode('"',$t1[1]);
$link=urldecode($t2[0]);
$link=str_replace("redirect&file=","edge/",$link);
$link1=str_replace(".flv&autostart=true","",$link);
$l=explode("&",$link1);
$link1=$l[0];
$host = "http://127.0.0.1/cgi-bin";
if (strpos($link1,"live00") !== false) {
$link=str_replace("rtmp://live00","rtmp://live".$server,$link1);
} else {
$link=str_replace("rtmp://live","rtmp://live".$server,$link1);
}
print $link;
?>
