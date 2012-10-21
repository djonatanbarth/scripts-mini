#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
function str_between($string, $start, $end){
	$string = " ".$string; $ini = strpos($string,$start); 
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini; 
	return substr($string,$ini,$len); 
}
$link = $_GET["file"];
$html = file_get_contents($link);
$id=str_between($html,'sharevidArgs: "','"');
$l1="http://vidii.hardsextube.com/video/".$id."/confige.xml";
$html = file_get_contents($l1);
//http://vidii.hardsextube.com/video/1055862/confige.xml
$l2=str_between($html,'FLV" Value="','"');
$l3=str_between($html,'FLVServer" Value="','"');
$link=$l3.$l2;
print $link;
?>
