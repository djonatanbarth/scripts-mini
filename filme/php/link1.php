#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
error_reporting(0);
$filelink = $_GET["file"];
$filelink=urldecode($filelink);
if (strpos($filelink,"adf.ly") !==false) {
  $h1=file_get_contents($filelink);
  $filelink=str_between($h1,"var url = '","'");
}
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
function cv1($s) {
  $g=ord("g");
  $c=ord($s);
  if ($c < 58) {
    $c=$s;
  } else {
    if ($c > 116) {
     $c=$c-$g + 16 + 6;
    } elseif (($c>64) && ($c<70)) { //2gb
     $c=$c - 29;
    } else {
     $c=$c-$g + 16;
    }
  }
return $c;
}
function get_unpack1($k,$char_rep,$pos_link,$h) {
  $g=ord("g");
  $f=explode("return p}",$h);
  $e=explode("'.split",$f[$k]);
  $t=$e[0];
  $a=explode(";",$t);
  //print_r($a); //for debug only
  $w=explode("|",$a[$char_rep]); //char list for replace
  $t1=explode("'",$a[$pos_link]); // where is final link
  $fl= $t1[3];
  $fl=str_replace("10","u",$fl);
  $fl=str_replace("11","v",$fl);
  $fl=str_replace("12","w",$fl);
  $fl=str_replace("13","x",$fl);
  $fl=str_replace("14","y",$fl);
  $fl=str_replace("15","z",$fl);
  $r="";
  for ($i=0;$i<strlen($fl)-1;$i++) {
      if (preg_match("/[A-Za-z0-9_]/",$fl[$i])) {
         $m=$w[cv1($fl[$i])];
         if ($m=="") $m=$fl[$i];
         $r=$r.$m;
      } else {
        $r=$r.$fl[$i];
      }
  }
  return $r;
}
function cv2($s) {
  $g=ord("g");
  $c=ord($s);
  if ($c < 58) {
    $c=$s;
  } else {
    if ($c > 130) {    //116 //130 - altervideo.net
     $c=$c-$g + 16 + 6;
    } elseif (($c>64) && ($c<70)) { //2gb
     $c=$c - 29;
    } else {
     $c=$c-$g + 16;
    }
  }
return $c;
}
function get_unpack2($k,$char_rep,$pos_link,$h) {
  $g=ord("g");
  $f=explode("return p}",$h);
  $e=explode("'.split",$f[$k]);
  $t=$e[0];
  //echo $t;
  $a=explode(";",$t);
  //print_r($a); //for debug only
  $w=explode("|",$a[$char_rep]); //char list for replace
  $t1=explode("'",$a[$pos_link]); // where is final link
  $fl= $t1[3];
  //print_r ($w);
  $fl=str_replace("10","u",$fl);
  $fl=str_replace("11","v",$fl);
  $fl=str_replace("12","w",$fl);
  $fl=str_replace("13","x",$fl);
  $fl=str_replace("14","y",$fl);
  $fl=str_replace("15","z",$fl);
  $r="";
  for ($i=0;$i<strlen($fl)-1;$i++) {
      if (preg_match("/[A-Za-z0-9_]/",$fl[$i])) {
         $m=$w[cv2($fl[$i])];
         if ($m=="") $m=$fl[$i];
         $r=$r.$m;
      } else {
        $r=$r.$fl[$i];
      }
  }
  return $r;
}
function cv4($s) {
  $g=ord("g");
  $c=ord($s);
  if ($c < 58) {   //91
    $c=$s;
  } elseif (($c>57) && ($c<123)) { //2gb
    $c=$c-$g + 16;
  } elseif ($c> 122) {
    $c=$c - 123 + 36;

  }
return $c;
}
function get_unpack4($k,$char_rep,$pos_link,$h) {
  $g=ord("g");
  $f=explode("return p}",$h);
  $e=explode("'.split",$f[$k]);
  $t=$e[0];
  $a=explode(";",$t);
  //print_r($a); //for debug only
  $w=explode("|",$a[$char_rep]); //char list for replace
  //print_r ($w);
  $t1=explode("'",$a[$pos_link]); // where is final link
  $fl= $t1[3];
  $fl=str_replace("10",chr(123),$fl);
  $fl=str_replace("11",chr(124),$fl);
  $fl=str_replace("12",chr(125),$fl);
  $fl=str_replace("13",chr(126),$fl);
  $fl=str_replace("14",chr(127),$fl);
  $fl=str_replace("15",chr(128),$fl);
  $r="";
  for ($i=0;$i<strlen($fl)-1;$i++) {
    $m=$w[cv4($fl[$i])];
    if ($m=="") $m=$fl[$i];
    $r=$r.$m;
  }
  return $r;
}
function s2g($string) {
$ch = curl_init($string);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
curl_setopt($ch, CURLOPT_REFERER, $string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
$h = curl_exec($ch);

$sid=str_between($h,'"sid" value="','"');
$post="sid=".$sid."&submit=Click+Here+To+Continue";
sleep(2);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
curl_setopt($ch, CURLOPT_REFERER, $string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
curl_setopt ($ch, CURLOPT_POST, 1);
curl_setopt ($ch, CURLOPT_POSTFIELDS, $post);
$h = curl_exec($ch);
$url=get_unpack1(1,10,4,$h);
return $url;
}
function uploadville($string) {
$ch = curl_init($string);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
curl_setopt($ch, CURLOPT_REFERER, $string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
$h = curl_exec($ch);
$id=str_between($h,'"id" value="','"');
$fname=str_between($h,'"fname" value="','"');
$post="op=download1&usr_login=&id=".$id."&fname=".$fname."&referer=&method_free=LOAD_HERE";
//op=download1&usr_login=&id=z5g2on7obv7j&fname=Shark.Night.2011.TS.XviD-TaRiQ786.avi&referer=&method_free=LOAD_HERE
curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
curl_setopt($ch, CURLOPT_REFERER, $string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
curl_setopt ($ch, CURLOPT_POST, 1);
curl_setopt ($ch, CURLOPT_POSTFIELDS, $post);
$h = curl_exec($ch);
  //http://fs2.uploadville.com/files/2/66i4h3lg6hj0h3/video.avi
  //<2 1="10"0="4://7.6.3/z/8/y/b.x"/>
  //http://fs2.uploadville.com/files/9/zqerdhlfeo3ooy/video.avi
  //<2 1="10"0="4://7.6.3/z/9/y/b.x"/>
  $f=explode("return p}",$h);
  $e=explode("'.split",$f[2]);
  $ls=$e[0];
  preg_match("/(\|)((fs)\d{1})\|/",$ls,$m);
  $server=$m[2];
  preg_match("/(\|)([a-z0-9]{14})\|/",$ls,$m);
  $hash=$m[2];
//  preg_match("/(\|)(182|384|364)\|/",$ls,$m);
//  $port=$m[2];
  preg_match("/(\|)(uploadville)\|/",$ls,$m);
  $serv_name=$m[2];
  preg_match("/(\|)(avi|flv|mp4|mkv)\|/",$ls,$m);
  $ext=$m[2];
  $t1=explode('1="10"0="',$ls);
  $t2=explode('"',$t1[1]);
  $t3=explode("/",$t2[0]);
  $files=$t3[4];
  $r="http://".$server.".".$serv_name.".com/files/".$files."/".$hash."/video.".$ext;
  return $r;
}
function uploadc($string) {
$ch = curl_init($string);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
curl_setopt($ch, CURLOPT_REFERER, $string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
$h = curl_exec($ch);
$ipcount_val=str_between($h,'"ipcount_val" value="','"');
$id=str_between($h,'"id" value="','"');
$fname=str_between($h,'"fname" value="','"');
$post="ipcount_val=".$ipcount_val."&op=download2&usr_login=&id=".$id."&fname=".$fname."&referer=&method_free=Slow+access";
//ipcount_val=10&op=download2&usr_login=&id=a2baprw26l3m&fname=np-prophezeiung-xvid.avi&referer=&method_free=Slow+access
curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
curl_setopt($ch, CURLOPT_REFERER, $string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
curl_setopt ($ch, CURLOPT_POST, 1);
curl_setopt ($ch, CURLOPT_POSTFIELDS, $post);
$h = curl_exec($ch);
  //6://v.u.5:t/d/s/r-q-p.o
  $f=explode("return p}",$h);
  $e=explode("'.split",$f[2]);
  $ls=$e[0];
  preg_match("/(\|)((www)\d{1})\|/",$ls,$m);
  $server=$m[2];
  preg_match("/(\|)([a-z0-9]{56})\|/",$ls,$m);
  $hash=$m[2];
  preg_match("/(\|)(182|384|364)\|/",$ls,$m);
  $port=$m[2];
  preg_match("/(\|)(uploadc)\|/",$ls,$m);
  $serv_name=$m[2];
  preg_match("/(\|)(avi|flv|mp4|mkv)\|/",$ls,$m);
  $ext=$m[2];
  $r="http://".$server.".".$serv_name.".com:".$port."/d/".$hash."/".$fname;
  return $r;
}
function rapidload($string) {
$ch = curl_init($string);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
curl_setopt($ch, CURLOPT_REFERER, $string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
$h = curl_exec($ch);

$method_premium=str_between($h,'"method_premium" value="','"');
$method_free=str_between($h,'"method_free" value="','"');
$id=str_between($h,'"id" value="','"');
$fname=str_between($h,'"fname" value="','"');
$post="op=download1&usr_login=&id=".$id."&fname=".$fname."&referer=&method_free=".$method_free;
sleep(2);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
curl_setopt($ch, CURLOPT_REFERER, $string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
curl_setopt ($ch, CURLOPT_POST, 1);
curl_setopt ($ch, CURLOPT_POSTFIELDS, $post);
$h = curl_exec($ch);
//Enter code below:
if (strpos($h,"Enter code below:") !==false) {
  $t1=explode('Enter code below:',$h);
} else {
  $t1=explode('Bitte Code eingeben:',$h);
}
$t2=explode('</table>',$t1[1]);
$p=$t2[0];
$t1=explode('position:absolute',$p);
$a1=explode('padding-left:',$t1[1]);
$p1=explode('px',$a1[1]);
$pos1=trim($p1[0]);
$v1=explode('>&#',$a1[1]);
$v2=explode(';',$v1[1]);
$val1=chr($v2[0]);
//
   $a1=explode('padding-left:',$t1[2]);
   $p1=explode('px',$a1[1]);
   $pos2=trim($p1[0]);
   $v1=explode('>&#',$a1[1]);
   $v2=explode(';',$v1[1]);
   $val2=chr($v2[0]);
//
   $a1=explode('padding-left:',$t1[3]);
   $p1=explode('px',$a1[1]);
   $pos3=trim($p1[0]);
   $v1=explode('>&#',$a1[1]);
   $v2=explode(';',$v1[1]);
   $val3=chr($v2[0]);
//
   $a1=explode('padding-left:',$t1[4]);
   $p1=explode('px',$a1[1]);
   $pos4=trim($p1[0]);
   $v1=explode('>&#',$a1[1]);
   $v2=explode(';',$v1[1]);
   $val4=chr($v2[0]);
//
   $my = array(
   $pos1 => $val1,
   $pos2 => $val2,
   $pos3 => $val3,
   $pos4 => $val4);
   ksort($my);
   $v = array_values($my);
   $p=$v[0].$v[1].$v[2].$v[3];
//
   $id=str_between($h,'name="id" value="','"');
   $rand=str_between($h,'name="rand" value="','"');
   sleep(10);
   $post="op=download2&id=".$id."&rand=".$rand."&referer=".urlencode($string)."&method_free=".$method_free."&method_premium=&code=".$p."&down_script=1";
curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,0);
curl_setopt($ch, CURLOPT_REFERER, $string);
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
curl_setopt ($ch, CURLOPT_POST, 1);
curl_setopt ($ch, CURLOPT_POSTFIELDS, $post);
$h = curl_exec($ch);
curl_close ($ch);
$url=get_unpack1(2,16,5,$h);
return $url;
}
function megavideo_premium($megavideo_id) {
        if ($MEGA_COOKIE <> "") {
        //Get megavideo original link download
        $link = "http://www.megavideo.com/xml/player_login.php?u=". $MEGA_COOKIE . "&v=" . $megavideo_id;
        $content = file_get_contents($link);
        //Check for premium account
        if( strstr($content, 'type="premium"') ) {
            //Get direct download link
            $downloadurl = strstr($content, "downloadurl=");
            $downloadurl = substr($downloadurl, 13, strpos($downloadurl,'" ')-13 );
            if($downloadurl) {
                $downloadurl = urldecode($downloadurl);
                $downloadurl = html_entity_decode($downloadurl);
                return $downloadurl ;
            }
        }
      }
}
function dimshare($k,$char_rep,$pos_link,$h,$fn) {
  $f=explode("return p}",$h);
  $e=explode("'.split",$f[$k]);
  $ls=$e[0];
  preg_match("/(\|)((fs)\d{1})\|/",$ls,$m);
  $server=$m[2];
  preg_match("/(\|)([a-z0-9]{56})\|/",$ls,$m);
  $hash=$m[2];
  preg_match("/(\|)(182|384|364)\|/",$ls,$m);
  $port=$m[2];
  preg_match("/(\|)(dimshare)\|/",$ls,$m);
  $serv_name=$m[2];
  preg_match("/(\|)(avi|flv|mp4|mkv)\|/",$ls,$m);
  $ext=$m[2];
  $r="http://".$server.".".$serv_name.".com:".$port."/d/".$hash."/video.".$ext;
  return $r;
}
function movdivx($k,$char_rep,$pos_link,$h,$fn) {
  $f=explode("return p}",$h);
  $e=explode("'.split",$f[$k]);
  $ls=$e[0];
  preg_match("/(\|)((www)\d{1})\|/",$ls,$m);
  $server=$m[2];
  preg_match("/(\|)([a-z0-9]{56})\|/",$ls,$m);
  $hash=$m[2];
  preg_match("/(\|)(182|384|364)\|/",$ls,$m);
  $port=$m[2];
  preg_match("/(\|)(movdivx)\|/",$ls,$m);
  $serv_name=$m[2];
  preg_match("/(\|)(avi|flv|mp4|mkv)\|/",$ls,$m);
  $ext=$m[2];
  $r="http://".$server.".".$serv_name.".com:".$port."/d/".$hash."/video.".$ext;
  return $r;
}
function vix($k,$char_rep,$pos_link,$h,$fn) {
  $f=explode("return p}",$h);
  $e=explode("'.split",$f[$k]);
  $ls=$e[0];
  preg_match("/(\|)((s|w)\d{2})\|/",$ls,$m);
  $server=$m[2];
  preg_match("/(\|)([a-z0-9]{45})\|/",$ls,$m);
  $hash=$m[2];
  preg_match("/(\|)(182|384|364)\|/",$ls,$m);
  $port=$m[2];
  preg_match("/(\|)(divxden|vidxden)\|/",$ls,$m);
  $serv_name=$m[2];
  $r="http://".$server.".".$serv_name.".com:".$port."/d/".$hash."/".$fn;
  return $r;
}
//peteava
function r() {
$i=mt_rand(4096,0xffff);
$j=mt_rand(4096,0xffff);
return  dechex($i).dechex($j);
}
function zeroFill($a,$b) {
    if ($a >= 0) {
        return bindec(decbin($a>>$b)); //simply right shift for positive number
    }
    $bin = decbin($a>>$b);
    $bin = substr($bin, $b); // zero fill on the left side
    $o = bindec($bin);
    return $o;
}
function crunch($arg1,$arg2) {
  $local4 = strlen($arg2);
  while ($local5 < $local4) {
   $local3 = ord(substr($arg2,$local5));
   $arg1=$arg1^$local3;
   $local3=$local3%32;
   $arg1 = ((($arg1 << $local3) & 0xFFFFFFFF) | zeroFill($arg1,(32 - $local3)));
   $local5++;
  }
  return $arg1;
}
function peteava($movie) {
  $seedfile=file_get_contents("http://content.peteava.ro/seed/seed.txt");
  $t1=explode("=",$seedfile);
  $seed=$t1[1];
  if ($seed == "") {
     return "";
  }
  $r=r();
  $s = hexdec($seed);
  $local3 = crunch($s,$movie);
  $local3 = crunch($local3,"0");
  $local3 = crunch($local3,$r);
  return strtolower(dechex($local3)).$r;
}
/** end peteava **/
function cv($s) {
  $g=ord("g");
  $c=ord($s);
  if ($c < 58) {
    $c=$s;
  } else {
    $c=$c-$g + 16;
  }
return $c;
}
function get_unpack($k,$char_rep,$pos_link,$h) {
  $g=ord("g");
  $f=explode("return p}",$h);
  $e=explode("'.split",$f[$k]);
  $t=$e[0];
  $a=explode(";",$t);
  //print_r($a); //for debug only
  $w=explode("|",$a[$char_rep]); //char list for replace
  $t1=explode("'",$a[$pos_link]); // where is final link
  $fl= $t1[3];
  $s1=explode("/",$fl);
  $r="";
  for ($i=0;$i<strlen($fl)-1;$i++) {
      if (preg_match("/[A-Za-z0-9_]/",$fl[$i])) {
         $m=$w[cv($fl[$i])];
         if ($m=="") $m=$fl[$i];
         $r=$r.$m;
      } else {
        $r=$r.$fl[$i];
      }
  }
  return $r;
}
function rapidmov($string) {
  $h = file_get_contents($string);
  $g=ord("g");
  $f=explode("return p}",$h);
  $e=explode("'.split",$f[1]);
  $t=$e[0];
  $a=explode(";",$t);
  $w=explode("|",$a[9]);
  $t1=explode("'",$a[4]);
  $fl= $t1[3];
  $s1=explode("/",$fl);
  $r="";
  for ($i=0;$i<strlen($fl)-1;$i++) {
      if (preg_match("/[A-Za-z0-9_]/",$fl[$i])) {
         $r=$r.$w[cv($fl[$i])];
      } else {
        $r=$r.$fl[$i];
      }
  }
return $r;
}
function videobb($l) {
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $l);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_COOKIEJAR, '/tmp/cookies.txt');
  curl_setopt($ch, CURLOPT_COOKIEFILE, '/tmp/cookies.txt');
  $page = curl_exec($ch);
  curl_close($ch);
  //preg_match_all('/\{"d":(false|true),"l":"([^"]+)","u":"([^"]+)"\}/i', $page, $st);
  preg_match_all('/\{"d":(false|true),"l":"([^"]+)","u":"([^"]+)"/i', $page, $st);
  $stream = array();
  for ($i = 0; $i < count($st[0]); $i++) {
    $stream[$st[2][$i]] = array(($st[1][$i] == "true" ? true : false), base64_decode($st[3][$i]));
  }
  if (count($stream) > 1) {
    foreach ($stream as $st => $da) {
      if ($da[0] == true) {
        $fl=$da[1];
      } else {
        $fl=$da[1]; // ?????
      }
    }
  } else {
    $qs = array_rand($stream);
    $fl = $stream[$qs][1];
  }
  return $fl;
}
function vk($string) {
  if (strpos($string,"video_ext.php") === false) {
	$h = file_get_contents($string);
	$t1=explode("nvar vars",$h);
	$l=$t1[1];
	$uid=str_between($l,'\"uid\":\"','\"');
	$host=str_between($l,'"host\":\"','\"');
	$host=str_replace("\\/","/",$host);
	$host=str_replace("\\/","/",$host);
	$host=str_replace("\/","/",$host);
	$vtag=str_between($l,'"vtag\":\"','\"');
	$r=$host."u".$uid."/video/".$vtag.".360.mp4";
 } else {
    $baza = file_get_contents($string);
    $host = str_between($baza,"var video_host = '","'");
    $uid = str_between($baza,"var video_uid = '","'");
    $vtag = str_between($baza,"var video_vtag = '","'");
    $hd = str_between($baza,"var video_max_hd = '","'");
    $r = $host."u".$uid."/video/".$vtag.".360.mp4";
    if ($hd == "0") {
      $r = $host."u".$uid."/video/".$vtag.".240.mp4";
    }
 }
  return $r;
}
function youtube($file) {
if(preg_match('/youtube\.com\/(v\/|watch\?v=|embed\/)([\w\-]+)/', $file, $match)) {;
  $l ="http://www.youtube.com/watch?v=".$match[2];
  $r=file_get_contents("http://127.0.0.1/cgi-bin/scripts/util/yt.php?file=".$l);
}
return $r;
}
function flvz($string) {
if (strpos($string,"embed") === false) {
  $string=str_replace("video","embed",$string);
}
$h = file_get_contents($string);
$r = str_between($h,'"url": "','"');
return $r;
}
function putlocker($string) {
     //http://www.putlocker.com/embed/067DF715716F10C5
     //http://www.putlocker.com/file/067DF715716F10C5
     $string=str_replace("file","embed",$string);
     $id=substr(strrchr($string,"/"),1);
     $ch = curl_init();
     curl_setopt($ch, CURLOPT_URL, $string);
     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
     curl_setopt($ch, CURLOPT_COOKIEJAR, '/tmp/cookies.txt');
     curl_setopt($ch, CURLOPT_COOKIEFILE, '/tmp/cookies.txt');
     $h = curl_exec($ch);
     curl_close($ch);
     $t1=explode('form method="post"',$h);
     $t2=explode('value="',$t1[1]);
     $t3=explode('"',$t2[1]);
     $hash=$t3[0];
     $post="hash=".$hash."&confirm=Close+Ad+and+Watch+as+Free+User";
     //hash=fe41ab2306be4d45&confirm=Close+Ad+and+Watch+as+Free+User
     $ch = curl_init();
     curl_setopt($ch, CURLOPT_URL, $string);
     curl_setopt($ch, CURLOPT_COOKIEFILE, '/tmp/cookies.txt');
     curl_setopt ($ch, CURLOPT_POST, 1);
     curl_setopt ($ch, CURLOPT_POSTFIELDS, $post);
     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
     curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
     $h = curl_exec($ch);
     curl_close($ch);
     $id=str_between($h,"playlist: '","'");
     //$url="http://www.putlocker.com/get_file.php?embed_stream=".$id;
     ///get_file.php?embed_stream=MDY3REY3MTU3MTZGMTBDNStlNTY1Y2EwNDcyZjYwZjUy
     if (strpos($string,"putlocker") !==false) {
       $url="http://www.putlocker.com".$id;
     } elseif (strpos($string,"sockshare") !== false) {
       $url="http://www.sockshare.com".$id;
     }
     $ch = curl_init();
     curl_setopt($ch, CURLOPT_URL, $url);
     curl_setopt($ch, CURLOPT_COOKIEFILE, '/tmp/cookies.txt');
     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
     $h = curl_exec($ch);
     curl_close($ch);
     $t1=explode('media:content url="',$h);
     $t2=explode('"',$t1[2]);
     $r = $t2[0];
     return $r;
}
function megavideo($string) {
  if (preg_match('/(v=)([A-Za-z0-9_]+)/', $string, $m)) {
    $id=$m[2];
  } elseif (preg_match('/(v\/)([A-Za-z0-9_]+)/', $string, $m)) {
    $file = get_headers($string);
 	foreach ($file as $key => $value) {
      if (strstr($value,"location")) {
        $url = ltrim($value,"location: ");
        $id = substr(strrchr($url, '='),1);
      } // end if
    } // end foreach
  } elseif (preg_match('/(d=)([A-Za-z0-9_]+)/', $string, $m)) {
    $h=file_get_contents($string);
    $id=str_between($h,'flashvars.v = "','"');
  }
  return $id;
}
//***************Here we start**************************************
$filelink=str_prep($filelink);
if ((strpos($filelink,"vidxden") !==false) || (strpos($filelink,"divxden") !==false)) {
  $fname=substr(strrchr($filelink,"/"),1);
  $fname=str_replace(".html","",$fname);
  $t=explode("/",$filelink);
  $id= $t[3];
     $post= "op=download1&usr_login=&id=".$id."&fname=".$fname."&referer=&method_free=Continue+to+Video";
     $ch = curl_init();
     curl_setopt($ch, CURLOPT_URL, $filelink);
     curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
     curl_setopt($ch, CURLOPT_COOKIEJAR, '/tmp/cookies.txt');
     curl_setopt($ch, CURLOPT_COOKIEFILE, '/tmp/cookies.txt');
     curl_setopt ($ch, CURLOPT_REFERER, $filelink);
     curl_setopt ($ch, CURLOPT_POST, 1);
     curl_setopt ($ch, CURLOPT_POSTFIELDS, $post);
     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
     curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
     $h = curl_exec($ch);
     curl_close($ch);
  if (strpos($h,"DivXBrowserPlugin") === false) {
     $link=get_unpack(1,11,5,$h);
  } else {
    $link=vix(1,12,9,$h,$fname);
  }
} elseif (strpos($filelink,"vidbux") !==false) {
  if (strpos($filelink,"embed") === false) {
    $t=explode("/",$filelink);
    $id= $t[3];
    $filelink=$t[0]."/".$t[1]."/".$t[2]."/"."embed-".$id."-width-653-height-362.html";
  }
  $h = file_get_contents($filelink);
  $link=get_unpack(1,8,4,$h);
} elseif (strpos($filelink,'movreel') !==false) {
  preg_match('/movreel\.com\/(embed\/)?+([\w\-]+)/', $filelink, $m);
  $id=$m[2];
  $filelink = "http://movreel.com/embed/".$id;
  $h = file_get_contents($filelink);
  $link=str_between($h,'<param name="src" value="','"');
} elseif (strpos($filelink,'videoweed') !==false) {
  if (strpos($filelink,"embed") !== false) {
    preg_match('/(v=)([A-Za-z0-9_]+)/', $filelink, $m);
    $id=$m[2];
    $s=explode("/",$filelink);
    $filelink="http://".$s[2]."/embed.php?v=".$id."&amp;width=900&amp;height=600";
  }
  $h = file_get_contents($filelink);
  $f = str_between($h,'flashvars.file="','"');
  $k = str_between($h,'flashvars.filekey="','"');
  $l="http://www.videoweed.es/api/player.api.php?user=undefined&codes=undefined&pass=undefined&file=".$f."&key=".$k;
  //$l=str_replace("&","&amp;",$l);
  $h=file_get_contents($l);
  $link=str_between($h,"url=","&");
} elseif (strpos($filelink,'novamov') !==false) {
  if (strpos($filelink,"embed") !== false) {
    preg_match('/(v=)([A-Za-z0-9_]+)/', $filelink, $m);
    $id=$m[2];
    $s=explode("/",$filelink);
    $filelink="http://".$s[2]."/embed.php?v=".$id."&amp;width=600&amp;height=480";
  }
  $h=file_get_contents($filelink);
  $file=str_between($h,'flashvars.file="','"');
  $filekey=str_between($h,'flashvars.filekey="','"');
  $l="http://www.novamov.com/api/player.api.php?user=undefined&file=".$file."&pass=undefined&key=".urlencode($filekey);
  $h=file_get_contents($l);
  $link=str_between($h,"url=","&");
} elseif (strpos($filelink, 'videobb') !== false) {
  if (strpos($filelink,'videobb.com') !==false) {
     $id=substr(strrchr($filelink,"/"),1);
  } else {   // filmenet.ro
     $a1=explode("videoid=",$filelink);
     $a2=explode("&",$a1[1]);
     $id=$a2[0];
  }
  $l="http://www.sheepser.com/vb23.php?s1=".$id;
  $h=file_get_contents($l);
  $t1=explode('url="',$h);
  $t2=explode('"',$t1[1]);
  $link=$t2[0];
  if (strpos($link,"videobb") === false) {
    $filelink="http://www.videobb.com/player_control/settings.php?v=".$id;
    $link=videobb($filelink);
  }
} elseif (strpos($filelink, 'videozer.com') !== false) {
  $id=substr(strrchr($filelink,"/"),1);
  $l="http://www.sheepser.com/vz23.php?s1=".$id;
  $h=file_get_contents($l);
  $t1=explode('url="',$h);
  $t2=explode('"',$t1[1]);
  $link=$t2[0];
  if (strpos($link,"videozer") === false) {
    $filelink="http://www.videozer.com/player_control/settings.php?v=".$id;
    $link=videobb($filelink);
  }
} elseif ((strpos($filelink, 'vk.com') !== false) || (strpos($filelink, 'vkontakte.ru') !== false)) {
  $link=vk($filelink);
} elseif (strpos($filelink, 'movshare') !== false){
  preg_match('/(v=)([A-Za-z0-9_]+)/', $filelink, $m);
  $id=$m[2];
  if ($id == "") {
    if (strpos($filelink,"?") !==false) {
    $a=explode("?",$filelink);
    $rest = substr($a[0], 0, -1);
    $id= substr(strrchr($rest,"/"),1);
    } else {
    $id = substr(strrchr($filelink,"/"),1);
    }
  }
  $filelink = "http://embed.movshare.net/embed.php?v=".$id;
  $baza = file_get_contents($filelink);
  $key=str_between($baza,'flashvars.filekey="','"');
  if ($key <> "") {
     $l="http://www.movshare.net/api/player.api.php?user=undefined&codes=undefined&key=";
     $l=$l.urlencode($key)."&pass=undefined&file=".$id;
     $b=file_get_contents($l);
     $link=str_between($b,"url=","&");
  } else {
  $link = str_between($baza,'file="','"');
  if ($link == "") {
    $link=str_between($baza,'name="src" value="','"');
  }
  if ($link == "") {
    $link=str_between($baza,'src" value="','"');
  }
  }
} elseif (strpos($filelink, 'youtube') !== false){
  $link=youtube($filelink);
} elseif (strpos($filelink, 'flvz.com') !== false){
  $link=flvz($filelink);
} elseif (strpos($filelink, 'rapidmov.net') !== false){
  $link=rapidmov($filelink);
} elseif (strpos($filelink, 'putlocker.com') !== false){
  $link=putlocker($filelink);
} elseif (strpos($filelink, 'sockshare.com') !== false){
  $link=putlocker($filelink);
} elseif (strpos($filelink, 'peteava.ro/embed') !== false) {
  preg_match('/(video\/)([A-Za-z0-9_]+)/', $filelink, $m);
  $id=$m[2];
  $filelink = "http://www.peteava.ro/embed/video/".$id;
  $h = file_get_contents($filelink);
  $id = str_between($h,"hd_file=","&");
  if ($id == "") {
    $id = str_between($h,"stream.php&file=","&");
  }
  if ($id <> $last_peteava) {
    $last_peteava=$id;
    $token = peteava($id);
    $link =  "http://content.peteava.ro/video/".$id."?start=0&token=".$token;
  }
} elseif (strpos($filelink, 'peteava.ro/id') !== false) {
  $h = file_get_contents($filelink);
  $id = str_between($h,"hd_file=","&");
  if ($id == "") {
    $id = str_between($h,"stream.php&file=","&");
  }
  if ($id <> $last_peteava) {
    $last_peteava=$id;
    $token = peteava($id);
    $link =  "http://content.peteava.ro/video/".$id."?start=0&token=".$token;
  }
} elseif (strpos($filelink, 'content.peteava.ro') !== false) {
  $id = str_between($h,"hd_file=","&");
  if ($id == "") {
    $id = str_between($filelink,"stream.php&file=","&");
  }
  $p=strpos($id,".");  //cinemaxx.ro
  $id1= substr($id,0, $p);
  $id2=substr($id,$p,4);
  $id= $id1.$id2;
  if ($id <> $last_peteava) {
    $last_peteava=$id;
    $token = peteava($id);
    $link =  "http://content.peteava.ro/video/".$id."?start=0&token=".$token;
  }
} elseif (strpos($filelink,'vimeo.com') !==false){
  //http://player.vimeo.com/video/16275866
  if (strpos($filelink,"player.vimeo.com") !==false) {
     $id=substr(strrchr($filelink,"/"),1);
     $link="http://127.0.0.1/cgi-bin/translate?stream,,http://vimeo.com/".$id;
  } else {
     $link="http://127.0.0.1/cgi-bin/translate?stream,,".$filelink;
  }
} elseif (strpos($filelink, 'googleplayer.swf') !== false) {
  $t1 = explode("docid=", $filelink);
  $t2 = explode("&",$t1[1]);
  $link = "http://127.0.0.1/cgi-bin/translate?stream,,http://video.google.com/videoplay?docid=".$t2[0];
} elseif (strpos($filelink, 'filebox.ro/get_video') !== false) {
   $s = str_between($filelink,"videoserver",".");
   $f = str_between($filelink,"key=","&");
   $link = "http://static.filebox.ro/filme/".$s."/".$f.".flv";
} elseif (strpos($filelink, 'megavideo') !== false) {
   $f="/usr/local/etc//usr/local/etc/dvdplayer/megavideo.dat";
   if (file_exists($f)) {
      $h=file_get_contents($f);
      $MEGA_COOKIE=trim($h);
   } else {
      $MEGA_COOKIE="";
   }
   if (strpos($filelink, 'megavideo.com') !== false) {
     $id=megavideo($filelink);
   } else {   // filmenet.ro
     $a1=explode("videoid=",$filelink);
     $a2=explode("&",$a1[1]);
     $id=$a2[0];
   }

   if ($MEGA_COOKIE <> "") {
     $link=megavideo_premium($id);
   } else {
     $link="http://127.0.0.1/cgi-bin/scripts/php1/mv.cgi?v=".$id;
   }
} elseif (strpos($filelink, 'videobam.com/widget') !== false) {
   //http://videobam.com/widget/Xykqy/3"
   $h = file_get_contents($filelink);
   $link=str_between($h,',"url":"','"');
   $link=str_replace("\\","",$link);
} elseif (strpos($filelink, 'divxstage.net') !== false) {
   //divxstage.net/video/canc73f7kgvbt
   $h = file_get_contents($filelink);
   $link=str_between($h,'param name="src" value="','"');
} elseif (strpos($filelink, 'divxstage.eu') !== false) {
   //http://www.divxstage.eu/video/oisekelygcrnb
   //http://www.divxstage.eu/api/player.api.php?key=78%2E96%2E189%2E71%2D0158d8005886f55b17aa976b4b596404&user=undefined&codes=undefined&pass=undefined&file=0nm6yadbatt77
   $h = file_get_contents($filelink);
   $p1=str_between($h,'flashvars.filekey="','"');
   $p2=str_between($h,'flashvars.file="','"');
   if ($p1 == "") {
   $link=str_between($h,'param name="src" value="','"');
   if ($link == "") {
     $link=str_between($h,'addVariable("file","','"');
   }
   } else {
     $l1="http://www.divxstage.eu/api/player.api.php?key=".urlencode($p1)."&user=undefined&codes=undefined&pass=undefined&file=".$p2;
     $h = file_get_contents($l1);
     $link=str_between($h,"url=","&");
   }
} elseif (strpos($filelink, 'stream2k.com/playerjw/vConfig') !== false) {
   $h = file_get_contents($filelink);
   $link=trim(str_between($h,'<file>','</file>'));
} elseif (strpos($filelink, 'xvidstage.com') !== false) {
   //http://xvidstage.com/zwvh3et6vugo
   //http://xvidstage.com/cgi-bin/dl.cgi/igribijb5hnkqetnfyplgdzywdxney3aiufdbxrwn4/video.avi
   $h = file_get_contents($filelink);
   preg_match("/(\|)([a-z0-9]{42})\|/",$h,$m);
   $hash=$m[2];
   $link="http://xvidstage.com/cgi-bin/dl.cgi/".$hash."/video.avi";
} elseif (strpos($filelink, 'nolimitvideo.com') !== false) {
   //http://www.nolimitvideo.com/embed/17ea366031f87f3aa009/new-kids-turbo
   $h = file_get_contents($filelink);
   $link=str_between($h,"file': '","'");
} elseif (strpos($filelink, 'stage666.net') !== false) {
   //http://stage666.net/rfl5qcrxsb3a.html
   //http://stage666.net/cgi-bin/dl.cgi/kylgrtsmovb2rbldug23w3o45jkdpr23gv4cxbsdjq/video.avi
   $h = file_get_contents($filelink);
   preg_match("/(\|)([a-z0-9]{42})\|/",$h,$m);
   $hash=$m[2];
   $link="http://stage666.net/cgi-bin/dl.cgi/".$hash."/video.avi";
} elseif (strpos($filelink, 'rapidload.org') !== false) {
   $link=rapidload($filelink);
} elseif (strpos($filelink, 'vidstream.us') !== false) {
   $h=file_get_contents($filelink);
   $l=str_between($h,'settingsFile: "','&');
   $h=file_get_contents($l);
   $link=str_between($h,'videoPath value="','"');
} elseif (strpos($filelink, '2gb-hosting.com') !== false) {
   $link=s2g($filelink);
} elseif (strpos($filelink, 'dimshare.com') !== false) {
   $string=$filelink;
   $ch = curl_init($string);
   curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
   curl_setopt($ch, CURLOPT_REFERER, $string);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
   $h = curl_exec($ch);
   $id=str_between($h,'"id" value="','"');
   $fname=str_between($h,'"fname" value="','"');
   $post="op=download1&usr_login=&id=".$id."&fname=".$fname."&referer=&method_free=LOAD_HERE";
   sleep(2);
   curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
   curl_setopt($ch, CURLOPT_REFERER, $string);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
   curl_setopt ($ch, CURLOPT_POST, 1);
   curl_setopt ($ch, CURLOPT_POSTFIELDS, $post);
   $h = curl_exec($ch);
   $link=dimshare(1,12,9,$h,$fname);
} elseif (strpos($filelink, 'movdivx.com') !== false) {
   $string=$filelink;
   $ch = curl_init($string);
   curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
   curl_setopt($ch, CURLOPT_REFERER, $string);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
   $h = curl_exec($ch);
   $id=str_between($h,'"id" value="','"');
   $fname=str_between($h,'"fname" value="','"');
   $post="op=download1&usr_login=&id=".$id."&fname=".$fname."&referer=&method_free=Please+wait+for+0+seconds";
   sleep(5);
   curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
   curl_setopt($ch, CURLOPT_REFERER, $string);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
   curl_setopt ($ch, CURLOPT_POST, 1);
   curl_setopt ($ch, CURLOPT_POSTFIELDS, $post);
   $h = curl_exec($ch);
   $link=movdivx(2,11,5,$h);
} elseif (strpos($filelink, 'sharevideo22.com') !== false) {
   $string=$filelink;
   $ch = curl_init($string);
   curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
   curl_setopt($ch, CURLOPT_REFERER, $string);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
   $h = curl_exec($ch);
   $id=str_between($h,'"id" value="','"');
   $fname=str_between($h,'"fname" value="','"');
   $rand=str_between($h,'name="rand" value="','"');
   $post="op=download2&id=".$id."&rand=".$rand."&referer=&method_free=&method_premium=&down_direct=1";
   sleep(2);
   curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
   curl_setopt($ch, CURLOPT_REFERER, $string);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
   curl_setopt ($ch, CURLOPT_POST, 1);
   curl_setopt ($ch, CURLOPT_POSTFIELDS, $post);
   $h = curl_exec($ch);
   $link=get_unpack1(2,9,5,$h);
} elseif (strpos($filelink, 'dr9000.com') !== false) {
   $h=file_get_contents($filelink);  //account suspend
   $link=str_between($h,'name="src" value="','"');
} elseif (strpos($filelink, 'altervideo.net') !== false) {
   $string=$filelink;
   $ch = curl_init($string);
   curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
   curl_setopt($ch, CURLOPT_REFERER, $string);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
   curl_setopt($ch, CURLOPT_COOKIEJAR, '/tmp/cookies.txt');
   curl_setopt($ch, CURLOPT_COOKIEFILE, '/tmp/cookies.txt');
   $h = curl_exec($ch);
   $id=str_between($h,'"id" value="','"');
   $fname=str_between($h,'"fname" value="','"');
   $rand=str_between($h,'name="rand" value="','"');
   $c=str_between($h,'type="hidden" value="','"');
   $post="c=".$c."&choice=Watch+Online";
   sleep(2);
   curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
   curl_setopt($ch, CURLOPT_REFERER, $string);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
   curl_setopt ($ch, CURLOPT_POST, 1);
   curl_setopt ($ch, CURLOPT_POSTFIELDS, $post);
   $h = curl_exec($ch);
   $link=get_unpack2(1,9,4,$h);
} elseif (strpos($filelink, 'royalvids.eu') !== false) {
   $h=file_get_contents($filelink);
   $link=str_between($h,'"flashvars" value="file=','&');
} elseif (strpos($filelink,'skyload.net') !== false) {
   //http://skyload.net/File/11f90e69ce45ef43e55650a871ae85df.flv
   //http://www.skyload.net/File/335c00e46e57e17ef690de605239c9dd.avi
   $h=file_get_contents($filelink);
   $link=str_between($h,"addVariable('file','","'");
   if ($link=="") {
     $link=str_between($h,"param name='src' value='","'");
   }
} elseif (strpos($filelink,'rapidvideo.com') !==false) {
  //http://rapidvideo.com/view/tl9gewcl
  $h=file_get_contents($filelink);
  $link=str_between($h,"addVariable('file','","'");
} elseif (strpos($filelink, 'uploadc.com') !== false) {
   //http://www.uploadc.com/a2baprw26l3m/np-prophezeiung-xvid.avi.htm
   $link=uploadc($filelink);
} elseif (strpos($filelink, 'uploadville.com') !== false) {
   //http://uploadville.com/z5g2on7obv7j
   $link=uploadville($filelink);
} elseif (strpos($filelink, 'zurvid.com') !== false) {
   //http://www.zurvid.com/embed.php?id=635
  $h=file_get_contents($filelink);
  $link=str_between($h,"file=","&");
} elseif (strpos($filelink, 'flashx.tv') !== false) {
   //http://flashx.tv/player/embed_player.php?vid=1394
   //http://flashx.tv/player/embed_player2.php?vid=2638
   $filelink=str_replace("embed_player.php","embed_player2.php",$filelink);
  $h=file_get_contents($filelink);
  $link=str_between($h,"normal_video_file = '","'");
} elseif (strpos($filelink, 'sharefiles4u.com') !== false) {
   //http://www.sharefiles4u.com/cwfqw29ylesp/nrx-ausgewechselt.avi
   //http://stage666.net/cgi-bin/dl.cgi/kylgrtsmovb2rbldug23w3o45jkdpr23gv4cxbsdjq/video.avi
   $h = file_get_contents($filelink);
   preg_match("/(\|)([a-z0-9]{42})\|/",$h,$m);
   $hash=$m[2];
   $link="http://www.sharefiles4u.com/cgi-bin/dl.cgi/".$hash."/video.avi";
} elseif (strpos($filelink, 'ufliq.com') !== false) {
  $h = file_get_contents($filelink);
  $link=get_unpack4(1,14,6,$h);
}
print $link;
?>
