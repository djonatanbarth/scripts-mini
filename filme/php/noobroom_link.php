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
//http://37.128.191.200/?1150&s=6&hd=1
if ($hd =="1") {
  //$h=file_get_contents("http://37.128.191.200/?".$id);
  $h=file_get_contents($noob."/?".$id);
  if (strpos($h,"Watch in 1080p") === false) $hd=0;
}
if ($server == "-1") {
  if ($hd=="1")
    $link=$noob."/?".$id."&hd=".$hd;
  else
    $link=$noob."/?".$id;
} else {
  if ($hd=="1")
    $link=$noob."/?".$id."&s=".$server."&hd=".$hd;
  else
    $link=$noob."/?".$id."&s=".$server;
}
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
//http://96.47.226.90/index.php?file=30&start=0&hd=0&auth=0&type=flv
//http://96.47.226.90
//http://178.159.0.84
//http://178.159.0.82
//http://96.44.147.140/index.php?file=292&start=0&hd=0&auth=0&type=flv
//http://178.159.0.84/index.php?file=292&start=0&hd=0&auth=0&type=flv
//http://96.47.226.90/index.php?file=339&start=0&hd=0&auth=0&type=flv&tv=0
if ($server == "0")
   $movie="http://178.159.0.56/index.php?file=".$id."&start=0&type=flv&hd=0&auth=0&tv=0";
elseif ($server == "3")
   $movie="http://178.159.0.57/index.php?file=".$id."&start=0&type=flv&hd=0&auth=0&tv=0";
elseif ($server == "6")
   $movie="http://96.47.226.90/index.php?file=".$id."&start=0&type=flv&hd=0&auth=0&tv=0";
else
{
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
}
print $movie;
?>