#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
function str_between($string, $start, $end){
	$string = " ".$string; $ini = strpos($string,$start);
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini;
	return substr($string,$ini,$len);
}
function decodeurl($encodedurl) {
    $tempp9 ="";
    $tempp4="1071045098811121041051095255102103119";
    $strlen = strlen($encodedurl);
    $temp5=substr($encodedurl, -4);
    $encodedurl = substr($encodedurl, 0, -4);
    $strlen = strlen($encodedurl);
    $temp6="";
    $temp7=0;
    $temp8=0;
    while ($temp8 < $strlen) {
        $temp7=$temp7+2;
        //$temp9=$encodedurl[temp8:temp8+4]
        $temp9=substr($encodedurl,$temp8, 4);
        //echo $temp9."<BR>";
        $temp9i=hexdec($temp9);
        $partlen = ($temp8 / 4) % strlen($tempp4);
        $partint=substr($tempp4,$partlen,1);
        $temp9i=(((($temp9i - $temp5) - $partint) - ($temp7 * $temp7)) -16)/3 ;
        $temp9=chr($temp9i);
        $temp6=$temp6.$temp9 ;
        $temp8=$temp8+4;
    }
    return $temp6;
}
$l = $_GET["file"];
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $l);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  //curl_setopt($ch, CURLOPT_REFERER, "http://www.kinox.to/");
  //curl_setopt($ch, CURLOPT_COOKIEFILE, '/tmp/cookies.txt');
  $h = curl_exec($ch);
  curl_close($ch);
  //echo $h;
if (strpos($h,"link_free") !== false) {
$l1=str_between($h,'var link_free = "','"');
//echo $l1;
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $l1);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_REFERER, $l);
  //curl_setopt($ch, CURLOPT_COOKIEFILE, '/tmp/cookies.txt');
  $h = curl_exec($ch);
  curl_close($ch);
}
if (strpos($h,"class='w_now'") !== false) {
$t1=explode("class='w_now'",$h);
$t2=explode('href=',$t1[1]);
$t3=explode(' ',$t2[1]);
$l1=trim($t3[0]);
//$l1=str_between($h,'var link_free = "','"');
//echo $l1;
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $l1);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_REFERER, $l);
  //curl_setopt($ch, CURLOPT_COOKIEFILE, '/tmp/cookies.txt');
  $h = curl_exec($ch);
  curl_close($ch);
}
//echo $l1;
$l1=str_between($h,"proxy.link=",'&');
$t1=explode("*",$l1);
$l=$t1[1];
//echo $l;
$l=decodeurl($l);
//echo $l;
if (strpos($l,"picasaweb") !== false) {
  $ch = curl_init();
	$header[0] = "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8";
	$header[] = "Accept-Language: en-us,en;q=0.5";
	$header[] = "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7";
	$header[] = "Keep-Alive: 115";
	$header[] = "Connection: keep-alive";
  curl_setopt($ch, CURLOPT_URL, $l);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
  curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
  //curl_setopt($ch, CURLOPT_HEADER  ,1);
  //curl_setopt($ch, CURLOPT_NOBODY  ,1);
  $html = curl_exec($ch);
  curl_close($ch);

  //echo $html;
  $l1=urldecode(str_between($html,"if (!'","'"));
  //echo $l1;
  $ch = curl_init();
	$header[0] = "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8";
	$header[] = "Accept-Language: en-us,en;q=0.5";
	$header[] = "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7";
	$header[] = "Keep-Alive: 115";
	$header[] = "Connection: keep-alive";
  curl_setopt($ch, CURLOPT_URL, $l1);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
  curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
  curl_setopt($ch, CURLOPT_HEADER  ,1);
  curl_setopt($ch, CURLOPT_NOBODY  ,1);
  $html = curl_exec($ch);
  curl_close($ch);
  $link=trim(str_between($html,"Location:","Content-Type"));
print $link;
} elseif (strpos($l,"cyworld.vn") !==false) {
  $h1=file_get_contents($l);
  $link=str_between($h1,'og:video" content="','"');
print $link;
} else {
$link="";
print $link;
}

?>
