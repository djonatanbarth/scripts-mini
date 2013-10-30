#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
function str_between($string, $start, $end){ 
	$string = " ".$string; $ini = strpos($string,$start); 
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini; 
	return substr($string,$ini,$len); 
}
$cookie="/tmp/noobroom.txt";
error_reporting(0);
set_time_limit(60);
$noob=file_get_contents("/tmp/n.txt");
$query = $_GET["file"];
$queryArr = explode(',', $query);
$id = $queryArr[0];
$subtitle = $queryArr[1];
$server = $queryArr[2];
$hd = $queryArr[3];
$tv= $queryArr[4];
//http://noobroom1.com/?12&tv=1
//http://noobroom1.com/?12&tv=1
//http://noobroom1.com/?12&tv=1
if (!$hd) $hd="0";
if (!$tv) {
 $l=$noob."/?".$id;
 $tv="0";
} else {
 $l=$noob."/?".$id."&tv=1";
}
if ($tv=="0")
  $l=$l."&hd=1";
//http://noobroom1.com/?1238&hd=1
//echo $l;
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $l);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
  curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
  $html = curl_exec($ch);
  curl_close($ch);
  //echo $html;
  //streamer": "http://noobroom1.com/fork.php?type=flv&auth=xxxxxxxxxxxx&loc=15&hd=0&tv=1"
  $auth=str_between($html,"auth=","&");
  if (!$auth) $auth="0";
// 11 == Los Angeles
// 12 == New York
// 14 == Frankfurt
// 15 == Amsterdam /Default
// 16 == London
function get_movie($noob1,$s,$id1,$auth1,$hd1,$tv1,$id1) {
  $i=$s;
  if ($tv1=="1") $hd1="0";
  $l=$noob1."/fork.php?type=flv&auth=".$auth1."&loc=".$i."&hd=".$hd1."&tv=".$tv1;
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $l);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  //curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_HEADER, 1);
  curl_setopt($ch, CURLOPT_NOBODY, 1);
  curl_setopt($ch, CURLOPT_COOKIEFILE, "/tmp/noobroom.txt");
  curl_setopt($ch, CURLOPT_REFERER,$noob1."/player.swf");
  curl_setopt($ch, CURLOPT_HTTPHEADER, array("Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8","Accept-Language: ro-ro,ro;q=0.8,en-us;q=0.6,en-gb;q=0.4,en;q=0.2","Accept-Encoding: gzip, deflate"));
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:14.0) Gecko/20100101 Firefox/14.0.1');
  $html = curl_exec($ch);
  curl_close($ch);

  $link=trim(str_between($html,"Location:","/index.php"));
  $movie_link=$link."/index.php?file=".$id1."&start=0&type=flv&hd=".$hd1."&auth=".$auth1."&tv=".$tv1;
  return $movie_link;
}
//
if ($hd < 2) {
if ($server == "0") // Montreal -- Los Angeles
  $movie=get_movie($noob,"13",$id,$auth,$hd,$tv,$id);
elseif ($server == "1") //Philadelphia  ---> New York
  $movie=get_movie($noob,"12",$id,$auth,$hd,$tv,$id);
elseif ($server == "2") //Frankfurt
  $movie=get_movie($noob,"11",$id,$auth,$hd,$tv,$id);
elseif ($server == "3") //Amsterdam
  $movie=get_movie($noob,"15",$id,$auth,$hd,$tv,$id);
elseif ($server == "4") //France   // London
  $movie=get_movie($noob,"10",$id,$auth,$hd,$tv,$id);
else //Default
  $movie=get_movie($noob,"15",$id,$auth,$hd,$tv,$id);
} else {
  //http://noobroom1.com/15/xxxxxxxxxxxx/1238.mp4
  //http://noobroom1.com/15/xxxxxxxxxxxx/episode_12.mp4
if ($server == "0") // Montreal
  $serv="13";
elseif ($server == "1") //Philadelphia
  $serv="12";
elseif ($server == "2") //Frankfurt
  $serv="11";
elseif ($server == "3") //Amsterdam
  $serv="15";
elseif ($server == "4") //France // London
  $serv="10";
else //Default
  $serv="15";
  if ($hd=="2")
   if ($tv=="0")
     $movie= $noob."/".$serv."/".$auth."/".$id.".mp4";
   else
     $movie= $noob."/".$serv."/".$auth."/episode_".$id.".mp4";
  else
   if ($tv=="0")
     $movie= $noob."/".$serv."/".$auth."/".$id."_hd.mp4";
   else
     $movie= $noob."/".$serv."/".$auth."/episode_".$id.".mp4";
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $movie);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_HEADER, 1);
  curl_setopt($ch, CURLOPT_NOBODY, 1);
  curl_setopt($ch, CURLOPT_COOKIEFILE, "/tmp/noobroom.txt");
  curl_setopt($ch, CURLOPT_REFERER,$noob."/?".$id);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array("Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8","Accept-Language: ro-ro,ro;q=0.8,en-us;q=0.6,en-gb;q=0.4,en;q=0.2","Accept-Encoding: gzip, deflate"));
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:14.0) Gecko/20100101 Firefox/14.0.1');
  $h1 = curl_exec($ch);
  curl_close($ch);
  $t1=explode("Location:",$h1);
  $t2=explode("\n",$t1[1]);
  $movie=trim($t2[0]);
}
//////////////////////////////////////////////////////////////////
$subtitle="off";
exec ("rm -f /tmp/test.xml");
if ($subtitle == "on") {
  if ($tv=="0")
    $file="http://hdforall.uphero.com/srt/".$id.".srt";
  else
    $file="http://hdforall.uphero.com/srt/tv/".$id.".srt";
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $file);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_TIMEOUT, 30);
  $h = curl_exec($ch);
  curl_close($ch);
  if (!$h) {
  if ($tv=="0")
    $file="http://hddlinks.p.ht/srt/".$id.".srt";
  else
    $file="http://hddlinks.p.ht/srt/tv/".$id.".srt";
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $file);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_TIMEOUT, 30);
  $h = curl_exec($ch);
  curl_close($ch);
  }
  //echo $h;
if(preg_match('/(\d\d):(\d\d):(\d\d),(\d\d\d) --> (\d\d):(\d\d):(\d\d),(\d\d\d)/', $h))
{
  $file_array = file($file);
  foreach($file_array as $line)
  {
    $line = rtrim($line);
    $line = preg_replace("/(<\/?)(\w+)([^>]*>)/e","",$line);
        if(preg_match('/(\d\d):(\d\d):(\d\d),(\d\d\d) --> (\d\d):(\d\d):(\d\d),(\d\d\d)/', $line, $match))
        {
          $begin = round(3600 * $match[1] + 60 * $match[2] + $match[3] + $match[4]/1000);
          $end   = round(3600 *$match[5] + 60 * $match[6] + $match[7] + $match[8]/1000);
          $line1 = '';
          $line2 = '';
        $f = "/usr/local/bin/home_menu22";

        if (!file_exists($f)) {
          if ($begin > $last_end)
          {
   $ttxml .=$last_end."\n";
   $ttxml .=$begin."\n";
   $ttxml .="\n";
   $ttxml .="\n";
          }

          $last_end=$end;
        }
        }
        // if the next line is not blank, get the text
        elseif($line != '')
        {
          if($line1 != '')
          {
            $line2= $line;
          }
          else
          {
            $line1= $line;
          }
        }

        // if the next line is blank, write
        if($line == '')
        {
        if ($line2=="") {
$ttxml .=$begin."\n";
$ttxml .=$end."\n";
$ttxml .=$line2."\n";
$ttxml .=$line1."\n";
        } else {
$ttxml .=$begin."\n";
$ttxml .=$end."\n";
$ttxml .=$line1."\n";
$ttxml .=$line2."\n";
        }
          $line1 = '';
          $line2 = '';
        }
      }
//dummy sub
if ($end > 0) {
if (!file_exists($f))
   $ttxml .=$end."\n";
else
   $ttxml .="10000"."\n";
$ttxml .="10002"."\n";
$ttxml .="\n";
$ttxml .="\n";
}
//echo $ttxml;
$new_file = "/tmp/test.xml";
$fh = fopen($new_file, 'w');
fwrite($fh, $ttxml);
fclose($fh);
}
}
print $movie;
?>
