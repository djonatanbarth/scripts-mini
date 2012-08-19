#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
$query = $_GET["file"];
if($query) {
   $queryArr = explode(',', $query);
   $link = $queryArr[0];
   $serv = $queryArr[1];
}
function str_between($string, $start, $end){ 
	$string = " ".$string; $ini = strpos($string,$start); 
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini; 
	return substr($string,$ini,$len); 
}
$cookie="/tmp/futubox_c.txt";
//$cookie="D://futubox_c.txt";
$link=urldecode($link);
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $link);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
  $html = curl_exec($ch);
  curl_close($ch);
  $sid = str_between($html,'url_key:encodeURIComponent("', '"');
  $y=str_between($html,'setChannel("','"');
  $y=$y.".stream".$sid;
  $rtmp="rtmp://".$serv.".webport.tv:1935/live";
  $a="live".$sid;
  $w="http://futubox.to/donottouch/fpv3.39.swf";
  $p=$link;
$exec = "/usr/local/etc/www/cgi-bin/scripts/rtmpdump -V -v -r rtmp://s01.webport.tv:1935/live -a ".$a." -y ".$y." -W http://futubox.to/donottouch/fpv3.39.swf -p ".$p."  2>/tmp/log.txt";
$ret=exec($exec,$a1);
$h=file_get_contents("/tmp/log.txt");
$t1=explode("redirect, STRING:",$h);
$t2=explode("?",$t1[1]);
$rtmp=trim($t2[0]);
$l="Rtmp-options:-a ".$a." -W ".$w." -p ".$p." -y ".$y.",".$rtmp;
$l=str_replace(" ","%20",$l);
print $l;
?>
