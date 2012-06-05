#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
$a_itags=array(37,22,18);
//@include('ytqual.inc');

$file=$_GET["file"];
$file=urldecode($file);
if(preg_match('/youtube\.com\/(v\/|watch\?v=)([\w\-]+)/', $file, $match)) {;
  $id = $match[2];
  //$link="http://www.youtube.com/watch?v=".$id;
  $link = 'http://www.youtube.com/get_video_info?&video_id=' . $id . '&el=vevo&ps=default';
  $html=file_get_contents($link);
  $html = urldecode($html);
  $h=explode('fmt_stream_map',$html);
  $html=urldecode($h[1]);
  $videos = explode('url=', $html);
  foreach ($videos as $video) {
  $t1=explode(";", $video);
    $link=$t1[0];
    $t1=explode("itag=",$link);
    $t2=explode("&",$t1[1]);
    $tip=$t2[0];
    if (in_array($tip,$a_itags)) break;
  }
}
# zkusit odstranit z $tip query fexp - pokud se vyskytuje
if (strpos($link, "fexp")) {
	$query = parse_url($link);
	parse_str( $query[query] , $output);
	$path = ($query['scheme']."://".$query['host'].$query['path']."?");
	unset($output[fexp]);
	$link=$path.http_build_query($output);
}
print $link;
die();
?>
