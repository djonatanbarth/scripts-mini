#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
function str_between($string, $start, $end){
	$string = " ".$string; $ini = strpos($string,$start);
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini;
	return substr($string,$ini,$len);
}
$id = $_GET["file"];
///?imdb.com/title/tt2084342"
$html=file_get_contents("http://37.128.191.200/?".$id);
$t1=explode("?imdb.com",$html);
$t2=explode('"',$t1[1]);
if ($t2[0])
  $link="http://imdb.com".$t2[0];
else
  $link="http://imdb.com".str_between($html,'http://imdb.com','"');
$html=file_get_contents($link);
$ttxml="";
exec ("rm -f /tmp/movie.dat");
$t1=explode('id="img_primary">',$html);
$t2=explode('src="',$t1[1]);
$t3=explode('"',$t2[1]);
$img=$t3[0];

$t1=explode('<h1 class="header"',$html);
$t2=explode('>',$t1[1]);
$t3=explode('<',$t2[1]);
$tit=trim($t3[0]);
$tit=str_replace("&#x27;","'",$tit);
$tit=str_replace("&nbsp;"," ",$tit);
$tit=str_replace("&raquo;",">>",$tit);
$tit=str_replace("&#xE9;","e",$tit);
$tit=str_replace("&#xCE;","I",$tit);
$tit=str_replace("&#xEE;","i",$tit);

$imdb="IMDB: ".trim(str_between($html,'ratingValue">','<'));
$gen=str_between($html,'div class="infobar">','</div>');

//$gen = trim(preg_replace("/<(.*)>|(\{(.*)\})/e","",$gen));
$gen = trim(preg_replace("/(<\/?)(\w+)([^>]*>)/e","",$gen));
$gen=str_replace("&nbsp;","",$gen);
$gen=str_replace("\n","",$gen);
//$gen="Gen: ".$gen;
//echo $gen;
$desc=trim(str_between($html,'<p itemprop="description">',"</p>"));
$desc=str_replace("&#x27;","'",$desc);
$desc=str_replace("&nbsp;"," ",$desc);
$desc=str_replace("&raquo;",">>",$desc);
$desc=str_replace("&#xE9;","e",$desc);
$desc=str_replace("&#xCE;","I",$desc);
$desc=str_replace("&#xEE;","i",$desc);
$desc = trim(preg_replace("/<(.*)>|(\{(.*)\})/e","",$desc));
$ttxml .=$tit."\n"; //title
$ttxml .= "\n";     //an
$ttxml .=$img."\n"; //image
$ttxml .=$gen."\n"; //gen
$ttxml .="\n"; //regie
$ttxml .=$imdb."\n"; //imdb
$ttxml .="\n"; //actori
$ttxml .=$desc."\n"; //descriere
$new_file = "/tmp/movie.dat";
$fh = fopen($new_file, 'w');
fwrite($fh, $ttxml);
fclose($fh);
?>

