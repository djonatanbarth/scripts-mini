#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
$link = $_GET["file"];
function str_between($string, $start, $end){ 
	$string = " ".$string; $ini = strpos($string,$start); 
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini; 
	return substr($string,$ini,$len); 
}
$link="http://vtc.com.vn/XMLFile.aspx?id=".$link."&tp=l&pop=";
$html=file_get_contents($link);
$s=str_between($html,"<connect>","</connect>");
$f=str_between($html,"<play>","</play>");
$server=$s."/".$f;
print $server;
?>
