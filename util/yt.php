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
$link= "http://127.0.0.1/cgi-bin/scripts/util/youtube.cgi?stream,,".urlencode($file);
print $link;
?>
