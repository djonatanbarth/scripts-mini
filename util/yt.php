#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
function str_between($string, $start, $end){
	$string = " ".$string; $ini = strpos($string,$start);
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini;
	return substr($string,$ini,$len);
}
function rstrstr($haystack,$needle)
    {
        return substr($haystack, 0,strpos($haystack, $needle));
    }
error_reporting(0);
$a_itags=array(37,22,18);
//@include('ytqual.inc');

$file=$_GET["file"];
$file=urldecode($file);
if(preg_match('/youtube\.com\/(v\/|watch\?v=)([\w\-]+)/', $file, $match)) {
  $id = $match[2];
  //$link="http://www.youtube.com/watch?v=".$id;
  $link = 'http://www.youtube.com/get_video_info?&video_id=' . $id . '&el=vevo&ps=default';
  $html=file_get_contents($link);
  $html = urldecode($html);
  $html = urldecode($html);
  $t1=explode("url=",$html);
  //print_r($t1);

  for ($i=0;$i<count($t1);$i++) {
    $l=$t1[$i];
    $a1=explode(";",$l);
    $part1= $a1[0];
    $a2=explode("sig=",$l);
    $a3=explode("&",$a2[1]);
    $link=$part1."&signature=".$a3[0];
    //$link=str_replace("sig=","signature=",$link);
    //if (strpos($link,"throttle") !== false) {
    $t3=explode("itag=",$link);
    $t4=explode("&",$t3[1]);
    $tip=$t4[0];
    if (in_array($tip,$a_itags)) break;
    //}
    //echo $l1."<BR>";
  }
}
//$link=urldecode($link);
if (strpos($link, "fexp")) {
	$query = parse_url($link);
	parse_str( $query[query] , $output);
	$path = ($query['scheme']."://".$query['host'].$query['path']."?");
	unset($output[fexp]);
	$link=$path.http_build_query($output);
}
$link=urldecode($link);

print $link;
die();
?>
