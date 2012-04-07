#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
/*
itag=45  codecs="vp8.0, vorbis" quality=hd720
itag=22  codecs="avc1.64001F, mp4a.40.2" quality=hd720
itag=44  codecs="vp8.0, vorbis" quality=large
itag=35  video/x-flv  quality=large
itag=43  codecs="vp8.0, vorbis" quality=medium
itag=34  type=video/x-flv quality=medium
itag=18  codecs="avc1.42001E, mp4a.40.2" quality=medium
itag=5   type=video/x-flv quality=small
*/
$file=$_GET["file"];
$file=urldecode($file);
$cookie="D://vplay_c.txt";
$cookie="/tmp/vplay_c.txt";
$UA1="Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5";
$UA2="Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)";
function get_youtube($id_yotube) {
  $link="http://www.youtube.com/watch?v=".$id_yotube;
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $link);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, $UA2);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch,CURLOPT_REFERER,$link);
  $html = curl_exec($ch);
  curl_close($ch);
  $html = urldecode($html);
  $h=explode('fmt_stream_map',$html);
  $html=urldecode($h[1]);
  $videos = explode('url=', $html);
  for ($i=0;$i<count($videos);$i++) {
    $t1=explode(";", $videos[$i]);
    $link1=$t1[0];
    $t1=explode("itag=",$link1);
    $t2=explode("&",$t1[1]);
    $tip=$t2[0];
    if ($tip=="22") break;
    if ($tip=="18") break;
  }
  $h=get_headers($link1);
  if (strpos($h[2],"Content-Type") !== false)
    return $link1;
  else
    return "";
}

if(preg_match('/youtube\.com\/(v\/|watch\?v=)([\w\-]+)/', $file, $match)) {;
  $id = $match[2];
  for ($i=1;$i<5;$i++) {
   $link3=get_youtube($id);
   if ($link3 <> "") break;
 }
}
if ($link3 <> "") {
print $link3;
} else {
print $link1;
}
?>
