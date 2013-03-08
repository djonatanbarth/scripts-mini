#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
function str_between($string, $start, $end){ 
	$string = " ".$string; $ini = strpos($string,$start); 
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini; 
	return substr($string,$ini,$len); 
}
//http://37.128.191.200/?292
//http://37.128.191.200/views.php?f=292&_=1348139001110
$l="http://noobroom.com/";
$h=file_get_contents($l);
//http://72.8.190.49
$noob=str_between($h,'value="','"');
$query = $_GET["file"];
$queryArr = explode(',', $query);
$id = $queryArr[0];
$subtitle = $queryArr[1];
$server = $queryArr[2];
$hd = $queryArr[3];

$link=$noob."/?".$id;
//echo $link."<BR>";
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $link);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch,CURLOPT_REFERER,$noob."/azlist.php");
  $html = curl_exec($ch);
  curl_close($ch);
$s=str_between($html,'streamer": "','"');
$f=str_between($html,'file": "','"');
$movie=$s."&file=".$f;
//echo $movie."<BR>";
$l1=$noob."/views.php?f=".$id;
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $l1);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_HEADER, 1);
  curl_setopt($ch, CURLOPT_NOBODY, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch,CURLOPT_REFERER,$link);
  $html = curl_exec($ch);
  curl_close($ch);

  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $movie);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_HEADER, 1);
  curl_setopt($ch, CURLOPT_NOBODY, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch,CURLOPT_REFERER,$movie);
  $html = curl_exec($ch);
  curl_close($ch);
  //echo $html;
  $movie=trim(str_between($html,"Location:","&"))."&start=0&type=flv&hd=0&auth=0&tv=0";

print $movie;
?>
