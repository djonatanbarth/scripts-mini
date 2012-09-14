#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
function str_between($string, $start, $end){
	$string = " ".$string; $ini = strpos($string,$start); 
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini; 
	return substr($string,$ini,$len); 
}
$link = $_GET["file"];
$html = file_get_contents($link);
$link = str_between($html, 'flvpathValue: "', '"');
$link = str_replace("_@?_nva","&nva",$link);
$link = str_replace("_@?_hash","&hash",$link);
if (!$link) {
$l1=str_between($html,'flvserver: "','"');
$l2=str_between($html,'flv: "/','"');
$link=$l1.$l2;
}
print $link;
?>
