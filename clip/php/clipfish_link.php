#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
$l = $_GET["file"];
//http://video.clipfish.de/media/e9/7cf5bf9c6a3595133356ae3aaf9dc0e9.mp4
//http://www.clipfish.de/special/auto-tv/video/3875567/bmw-neue-3-zylinder-motoren/
$url=$l.".mp4";
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_NOBODY, 1);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
$c = curl_exec($ch);
$info = curl_getinfo($ch);
curl_close($ch);
$header = substr($c, 0, $info['header_size']);
$status = strtok($header, "\r\n");
if (strpos($c,"200 OK") !== false) {
print $url;
} else {
$url=$l.".flv";
print $url;
}
?>
