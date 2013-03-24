#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
function str_between($string, $start, $end){ 
	$string = " ".$string; $ini = strpos($string,$start); 
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini; 
	return substr($string,$ini,$len); 
}
//http://cdn1.public.spankwire.phncdn.com/201302/03/710331/240P_300K_710331.mp4?nvb=20130313050647&nva=20130313070647&hash=092d1bf49464a25c3681b
//iframe src="http://www.spankwire.com/EmbedPlayer.aspx?ArticleId=710331
$link = $_GET["file"];
    $html = file_get_contents($link);
    $link=str_between($html,"file: '","'");
    if ($link == "") {
    $l1=str_between($html,'iframe src="','"');
    $h=file_get_contents($l1);
    $link=urldecode(str_between($h,'flashvars.video_url = "','"'));
    }
print $link;
?>
