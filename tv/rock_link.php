#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
function str_between($string, $start, $end){ 
	$string = " ".$string; $ini = strpos($string,$start); 
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini; 
	return substr($string,$ini,$len); 
}
$y = $_GET["file"];
$y=urldecode($y);

$out='#!/bin/sh
cat <<EOF
Content-type: video/mp4

EOF
exec /usr/local/etc/www/cgi-bin/scripts/rtmpdump -b 60000 -q -v -r "rtmp://93.114.43.3:1935/vod" -a "vod" -y "mp4:'.$y.'"';
$fp = fopen('/usr/local/etc/www/cgi-bin/scripts/tv/rock.cgi', 'w');
fwrite($fp, $out);
fclose($fp);
exec("chmod +x /usr/local/etc/www/cgi-bin/scripts/tv/rock.cgi");
sleep(1);
print $exec;
?>
