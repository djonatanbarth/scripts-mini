#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
function str_between($string, $start, $end){ 
	$string = " ".$string; $ini = strpos($string,$start); 
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini; 
	return substr($string,$ini,$len); 
}
$id = $_GET["file"];
$exec='/opt/bin/curl -A "Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5" -H "Content-Type: application/x-www-form-urlencoded" -H "X-Requested-With: XMLHttpRequest" -b /tmp/film.txt -d "channel_id='.$id.'&quality=high" http://www.filmon.com/ajax/getChannelInfo -o /tmp/filmon.txt';
exec ($exec);
$h=file_get_contents("/tmp/filmon.txt");
$h=str_replace("\\","",$h);
$rtmp=str_between($h,'serverURL":"','"');
$y=str_between($h,'streamName":"','"');
$link="http://127.0.0.1/cgi-bin/scripts/util/translate.cgi?stream,Rtmp-options:";
$link=$link."-y ".$y." -W http://www.filmon.com/tv/modules/FilmOnTV/files/flashapp/filmon/FilmonPlayer.swf";
$link=$link." -p http://www.filmon.com,".$rtmp;
$link=str_replace(" ","%20",$link);
print $link;
?>
