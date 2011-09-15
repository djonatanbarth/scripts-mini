#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
function str_between($string, $start, $end){ 
	$string = " ".$string; $ini = strpos($string,$start); 
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini; 
	return substr($string,$ini,$len); 
}
$link = $_GET["file"];
$link = str_replace(' ','%20',$link);
$link = str_replace('[','%5B',$link);
$link = str_replace(']','%5D',$link);
$image = "/usr/local/etc/www/cgi-bin/scripts/clip/image/youclubvideo.png";
$title = "Link";
$html = file_get_contents($link);
$link = str_between($html,'url: "','"');
if ($link == "") {
   $link = str_between($html,"hd.file=","&");
}
if ($link == "") {
   $link = str_between($html,"skin.swf&file=","&");
}
if ($link == "") {
   $link = str_between($html,'skewd.xml&file=','&');
}
if ($link == "") {
   $link = str_between($html,"'file': '","'");
}
if ($link <> "") {
print $link;
}
?>
