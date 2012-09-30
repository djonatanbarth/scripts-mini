#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
function str_between($string, $start, $end){ 
	$string = " ".$string; $ini = strpos($string,$start); 
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini; 
	return substr($string,$ini,$len); 
}
//http://media.myjizztube.com:8080/videos/5/0/5/0/0/5050070f43a0e.flv?nvb=20120923113035&nva=20120923120035&hash=02eb4ece2f107995bea49&start=0
//http://media.myjizztube.com:8080/videos/5/0/5/0/0/5050070f43a0e.flv?nvb=20120923113716&nva=20120923120716&hash=0573026fdf215c47c0110
//http://:/videos/5/0/5/0/0/5050070f43a0e.flv%26media.myjizztube.com%268080?nvb=20120923113006&nva=20120923120006&hash=04c9f229ecb283fc7e545
//http://media.myjizztube.com:8080/videos/5/0/5/0/0/5050070f43a0e.flv&media.myjizztube.com&8080?nvb=20120923113338&nva=20120923120338&hash=0c7c1e0eb40ebfcf19a04
$link = $_GET["file"];
    $html = file_get_contents($link);
    $link = urldecode(str_between($html, 'file:"', '"'));
    if ($link=="") {
    $link=str_between($html,'"settings=','"');
    $html = file_get_contents($link);
    $link = str_between($html,"defaultVideo:",";");
    }
    $link=str_replace("http://:","http://media.myjizztube.com:8080",$link);
    $link=urldecode($link);
    $link=str_replace("&media.myjizztube.com&8080","",$link)."&start=0";
print $link;
?>
