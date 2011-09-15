#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
function str_between($string, $start, $end){ 
	$string = " ".$string; $ini = strpos($string,$start); 
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini; 
	return substr($string,$ini,$len); 
}
function str_prep($string){
  $string = str_replace(' ','%20',$string);
  $string = str_replace('[','%5B',$string);
  $string = str_replace(']','%5D',$string);
  $string = str_replace('%3A',':',$string);
  $string = str_replace('%2F','/',$string);
  $string = str_replace('#038;','',$string);
  $string = str_replace('&amp;','&',$string);
  return $string;
}
function youtube($file) {
if(preg_match('/youtube\.com\/(v\/|watch\?v=|embed\/)([\w\-]+)/', $file, $match)) {;
  $l ="http://www.youtube.com/watch?v=".$match[2];
  $r=file_get_contents("http://127.0.0.1/cgi-bin/scripts/util/yt.php?file=".$l);
}
return $r;
}
$l = $_GET["file"];
$l=urldecode($l);
$l=str_prep($l);
$html = file_get_contents($l);
if(preg_match_all("/(http\b.*?)(\"|\')+/i",$html,$matches)) {
$links=$matches[1];
}
$s="/youtube\.c|videa\.hu\/flvplayer|kiwi\.kz|sapo\.pt/i";
for ($i=0;$i<count($links);$i++) {
  $cur_link=$links[$i];
  if (preg_match($s,$cur_link)) {
   if (strpos($cur_link, 'youtube.com/watch') !== false){
     //echo $cur_link;
     $link=youtube($cur_link);
   } elseif (strpos($cur_link,'kiwi.kz') !==false){
     $file = get_headers($cur_link);
     foreach ($file as $key => $value) {
       if (strstr($value,"Location")) {
         $link = urldecode(ltrim($value,"Location:"));
         $link = str_between($link,"file=","&");
       } // end if
     } // end foreach
  } elseif (strpos($cur_link,'videa.hu') !==false){
      preg_match('/(v=)([A-Za-z0-9_]+)/', $cur_link, $m);
      $id=$m[2];
      $cur_link="http://videa.hu/videok/sport/".$id;
      $html = file_get_contents($cur_link);
      $id=str_between($html,"flvplayer.swf?f=",".0&");
      $link="http://videa.hu/static/video/".$id;
  } elseif (strpos($cur_link,'videos.sapo.pt') !==false){
      $v_id = substr(strrchr($cur_link, "/"), 1);
      $link = "http://rd3.videos.sapo.pt/".$v_id."/mov/1" ;
  }
}
}
print $link;
?>
