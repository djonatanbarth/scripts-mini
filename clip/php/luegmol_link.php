#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
function str_between($string, $start, $end){ 
	$string = " ".$string; $ini = strpos($string,$start); 
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini; 
	return substr($string,$ini,$len); 
}
$link = $_GET["file"];
//http://www.luegmol.ch/video/67e3e5949b7a372/
//http://www.luegmol.ch/player/luegmol_player_config.php?vkey=67e3e5949b7a372
//http://www.luegmol.ch/player/playlist.php?vkey=67e3e5949b7a372
$t1=explode("/",$link);
$id=$t1[4];
$link="http://www.luegmol.ch/player/playlist.php?vkey=".$id;
$html=file_get_contents($link);
$f=str_between($html,"<jwplayer:file>","</jwplayer:file>");
$s=str_between($html,"<jwplayer:streamer>","</jwplayer:streamer>");
$link1=$s.$f;
print $link1;
?>
