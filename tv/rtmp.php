#!/usr/local/bin/Resource/www/cgi-bin/php
<?php echo "<?xml version='1.0' encoding='UTF8' ?>"; ?>
<?php
error_reporting(0);
echo '
<rss version="2.0">
<script>
  translate_base_url  = "http://127.0.0.1/cgi-bin/translate?";

  storagePath             = getStoragePath("tmp");
  storagePath_stream      = storagePath + "stream.dat";
  storagePath_playlist    = storagePath + "playlist.dat";

  error_info          = "";
</script>
<onEnter>
  startitem = "middle";
  setRefreshTime(1);
</onEnter>

<onRefresh>
  setRefreshTime(-1);
  itemCount = getPageInfo("itemCount");
</onRefresh>

<mediaDisplay name="threePartsView"
	sideLeftWidthPC="0"
	sideRightWidthPC="0"

	headerImageWidthPC="0"
	selectMenuOnRight="no"
	autoSelectMenu="no"
	autoSelectItem="no"
	itemImageHeightPC="0"
	itemImageWidthPC="0"
	itemXPC="8"
	itemYPC="25"
	itemWidthPC="50"
	itemHeightPC="8"
	capXPC="8"
	capYPC="25"
	capWidthPC="50"
	capHeightPC="64"
	itemBackgroundColor="0:0:0"
	itemPerPage="8"
  itemGap="0"
	bottomYPC="90"
	backgroundColor="0:0:0"
	showHeader="no"
	showDefaultInfo="no"
	imageFocus=""
	sliding="no"
	idleImageXPC="5" idleImageYPC="5" idleImageWidthPC="8" idleImageHeightPC="10"
>

  	<text align="center" offsetXPC="0" offsetYPC="0" widthPC="100" heightPC="20" fontSize="30" backgroundColor="10:105:150" foregroundColor="100:200:255">
		  <script>getPageInfo("pageTitle");</script>
		</text>
  	<text align="left" offsetXPC="6" offsetYPC="15" widthPC="75" heightPC="4" fontSize="16" backgroundColor="10:105:150" foregroundColor="100:200:255">
    2= add to favorite, 4/6 jump +- 100, 7/9 jump +- 500
		</text>
  	<text redraw="yes" offsetXPC="76" offsetYPC="12" widthPC="20" heightPC="6" fontSize="20" backgroundColor="10:105:150" foregroundColor="60:160:205">
		  <script>sprintf("%s / ", focus-(-1))+itemCount;</script>
		</text>
  	<text  redraw="yes" align="center" offsetXPC="0" offsetYPC="90" widthPC="100" heightPC="8" fontSize="17" backgroundColor="10:105:150" foregroundColor="100:200:255">
		  <script>print(annotation); annotation;</script>
		</text>
		<image  redraw="yes" offsetXPC=60 offsetYPC=35 widthPC=30 heightPC=30>
  image/tv_radio.png
		</image>
  	<text  redraw="yes" align="center" offsetXPC="60" offsetYPC="70" widthPC="35" heightPC="8" fontSize="17" backgroundColor="10:105:150" foregroundColor="100:200:255">
		  <script>print(tip); tip;</script>
		</text>
        <idleImage>image/POPUP_LOADING_01.png</idleImage>
        <idleImage>image/POPUP_LOADING_02.png</idleImage>
        <idleImage>image/POPUP_LOADING_03.png</idleImage>
        <idleImage>image/POPUP_LOADING_04.png</idleImage>
        <idleImage>image/POPUP_LOADING_05.png</idleImage>
        <idleImage>image/POPUP_LOADING_06.png</idleImage>
        <idleImage>image/POPUP_LOADING_07.png</idleImage>
        <idleImage>image/POPUP_LOADING_08.png</idleImage>

		<itemDisplay>
			<text align="left" lines="1" offsetXPC=0 offsetYPC=0 widthPC=100 heightPC=100>
				<script>
					idx = getQueryItemIndex();
					focus = getFocusItemIndex();
					if(focus==idx)
					{
					  tip = getItemInfo(idx, "tip");
					  annotation = getItemInfo(idx, "annotation");
					}
					getItemInfo(idx, "title");
				</script>
				<fontSize>
  				<script>
  					idx = getQueryItemIndex();
  					focus = getFocusItemIndex();
  			    if(focus==idx) "16"; else "14";
  				</script>
				</fontSize>
			  <backgroundColor>
  				<script>
  					idx = getQueryItemIndex();
  					focus = getFocusItemIndex();
  			    if(focus==idx) "10:80:120"; else "-1:-1:-1";
  				</script>
			  </backgroundColor>
			  <foregroundColor>
  				<script>
  					idx = getQueryItemIndex();
  					focus = getFocusItemIndex();
  			    if(focus==idx) "255:255:255"; else "140:140:140";
  				</script>
			  </foregroundColor>
			</text>

		</itemDisplay>

<onUserInput>
<script>
ret = "false";
userInput = currentUserInput();
titlu="";
if (userInput == "pagedown" || userInput == "pageup")
{
  idx = Integer(getFocusItemIndex());
  if (userInput == "pagedown")
  {
    idx -= -8;
    if(idx &gt;= itemCount)
      idx = itemCount-1;
  }
  else
  {
    idx -= 8;
    if(idx &lt; 0)
      idx = 0;
  }

  print("new idx: "+idx);
  setFocusItemIndex(idx);
	setItemFocus(0);
  "true";
}
else if(userInput == "nine" || userInput == "9")
{
    idx = Integer(getFocusItemIndex());
    idx -= -500;
    if(idx &gt;= itemCount)
    idx = itemCount-1;

  print("new idx: "+idx);
  setFocusItemIndex(idx);
	setItemFocus(0);
  "true";
}
else if(userInput == "seven" || userInput == "7")
{
    idx = Integer(getFocusItemIndex());
    idx -= 500;
    if(idx &lt; 0)
      idx = 0;

  print("new idx: "+idx);
  setFocusItemIndex(idx);
	setItemFocus(0);
  "true";
}
else if(userInput == "six" || userInput == "6")
{
    idx = Integer(getFocusItemIndex());
    idx -= -100;
    if(idx &gt;= itemCount)
    idx = itemCount-1;

  print("new idx: "+idx);
  setFocusItemIndex(idx);
	setItemFocus(0);
  "true";
}
else if(userInput == "four" || userInput == "4")
{
    idx = Integer(getFocusItemIndex());
    idx -= 100;
    if(idx &lt; 0)
      idx = 0;

  print("new idx: "+idx);
  setFocusItemIndex(idx);
	setItemFocus(0);
  "true";
}
else if (userInput == "two" || userInput == "2")
{
 showIdle();
 url="http://127.0.0.1/cgi-bin/scripts/tv/php/ohlulz_add.php?mod=add*" + getItemInfo(getFocusItemIndex(),"link1") + "*" + getItemInfo(getFocusItemIndex(),"title1");
 dummy=getUrl(url);
 cancelIdle();
 ret="true";
}
redrawDisplay();
ret;
</script>
</onUserInput>

	</mediaDisplay>

	<item_template>
		<mediaDisplay  name="threePartsView" idleImageXPC="5" idleImageYPC="5" idleImageWidthPC="8" idleImageHeightPC="10">
        <idleImage>image/POPUP_LOADING_01.png</idleImage>
        <idleImage>image/POPUP_LOADING_02.png</idleImage>
        <idleImage>image/POPUP_LOADING_03.png</idleImage>
        <idleImage>image/POPUP_LOADING_04.png</idleImage>
        <idleImage>image/POPUP_LOADING_05.png</idleImage>
        <idleImage>image/POPUP_LOADING_06.png</idleImage>
        <idleImage>image/POPUP_LOADING_07.png</idleImage>
        <idleImage>image/POPUP_LOADING_08.png</idleImage>
		</mediaDisplay>

	</item_template>
<channel>
	<title>TV Live - rtmp list</title>
	<menu>main menu</menu>
';
function str_between($string, $start, $end){
	$string = " ".$string; $ini = strpos($string,$start);
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini;
	return substr($string,$ini,$len);
}
function html_to_utf8 ($data)
    {
    return preg_replace("/\\&\\#([0-9]{3,10})\\;/e", '_html_to_utf8("\\1")', $data);
    }

function _html_to_utf8 ($data)
    {
    if ($data > 127)
        {
        $i = 5;
        while (($i--) > 0)
            {
            if ($data != ($a = $data % ($p = pow(64, $i))))
                {
                $ret = chr(base_convert(str_pad(str_repeat(1, $i + 1), 8, "0"), 2, 10) + (($data - $a) / $p));
                for ($i; $i > 0; $i--)
                    $ret .= chr(128 + ((($data % pow(64, $i)) - ($data % ($p = pow(64, $i - 1)))) / $p));
                break;
                }
            }
        }
        else
        $ret = "&#$data;";
    return $ret;
    }
function fix1($in) {
$s=html_to_utf8($in);
$s = urlencode($s);
$s = str_replace("+"," ",$s);
$s = str_replace("%2B","+",$s);
$s = str_replace("%28","(",$s);
$s = str_replace("%29",")",$s);
$s = str_replace("%26","&",$s);
$s = str_replace("%3B",";",$s);
$s = str_replace("%2F","/",$s);
$s = str_replace("%23","#",$s);
$s = str_replace("%5B","[",$s);
$s = str_replace("%5D","]",$s);
return $s;
}
$link="http://apps.ohlulz.com/rtmpgui/list.xml";
$process = curl_init($link);
curl_setopt($process, CURLOPT_HTTPGET, 1);
curl_setopt($process, CURLOPT_RETURNTRANSFER,1);
curl_setopt($process,CURLOPT_CONNECTTIMEOUT,20);
$html_live = curl_exec($process);
$html_work = $html_live;
curl_close($process);
$link="http://hdforall.googlecode.com/files/3-11-2012.xml";
$html_backup=file_get_contents($link);
$videos=explode("<stream>",$html_live);
if (count($videos) < 500) {
  $html_work = $html_backup;
}
$baseurl="http://127.0.0.1/cgi-bin/scripts/util/translate.cgi?stream,";
//<!-- wilmaa -->
$videos=explode("<stream>",$html_work);
unset($videos[0]);
$videos = array_values($videos);

foreach($videos as $video) {
$video=str_replace("<![CDATA[","",$video);
$video=str_replace("]]>","",$video);
$opt="";
$title=str_between($video,"<title>","</title>");
$title=trim(str_replace("'","",$title));
$title = fix1($title);
$swf=trim(str_between($video,'<swfUrl>','</swfUrl>'));
$link=trim(str_between($video,"<link>","</link>"));
$page=trim(str_between($video,"<pageUrl>","</pageUrl>"));
$playpath=trim(str_between($video,"<playpath>","</playpath>"));
$adv = trim(str_between($video,"<advanced>","</advanced>"));
      if (($swf <> "") || ($page <> "") || ($playpath <> "") || ($adv <> "")) {
        $opt="Rtmp-options:";
        if ($swf <> "") {
          $opt=$opt."-W%20".$swf."%20";
        }
        if ($playpath <> "") {
          $opt=$opt."-y%20".$playpath."%20";
        }
        if ($page <> "") {
          $opt=$opt."-p%20".$page;
        }
        if ($adv <> "") {
          $opt=$opt."%20".str_replace(" ","%20",$adv);
        } else {
          $opt=$opt."%20-x%20927444%20-w%206c1be1765187eae0bc9af07d858fae59a0effd3c5b803d08db261ced2c5512bb";
          }
      }

if (($title <> "") && (strpos($link,"<") === false) && preg_match("/wilmaa/i",$opt)) {
    $link1=urlencode($baseurl.$opt.",".$link);
    echo '
    <item>
    <title>'.$title.'</title>
    <onClick>
    <script>
    showIdle();
    url="'.$baseurl.$opt.','.$link.'";
    titlu="'.$link.'";
    cancelIdle();
    playItemUrl(url,10);
    </script>
    </onClick>
    <annotation>'.$link.' - '.$playpath.'</annotation>
    <link1>'.$link1.'</link1>
    <title1>'.urlencode($title).'</title1>
    <tip>wilmaa</tip>
    </item>
    ';
}
}
$baseurl="http://127.0.0.1/cgi-bin/scripts/util/translate.cgi?stream,";
//<!-- backup list -->
$videos=explode("<stream>",$html_backup);
unset($videos[0]);
$videos = array_values($videos);
$n=0;
foreach($videos as $video) {
$video=str_replace("<![CDATA[","",$video);
$video=str_replace("]]>","",$video);
$opt="";
$title=str_between($video,"<title>","</title>");
$title=trim(str_replace("'","",$title));
$title=html_to_utf8($title);
$swf=trim(str_between($video,'<swfUrl>','</swfUrl>'));
$link=trim(str_between($video,"<link>","</link>"));
$page=trim(str_between($video,"<pageUrl>","</pageUrl>"));
$playpath=trim(str_between($video,"<playpath>","</playpath>"));
$adv = trim(str_between($video,"<advanced>","</advanced>"));
      if (($swf <> "") || ($page <> "") || ($playpath <> "") || ($adv <> "")) {
        $opt="Rtmp-options:";
        if ($swf <> "") {
          $opt=$opt."-W%20".$swf."%20";
        }
        if ($playpath <> "") {
          $opt=$opt."-y%20".$playpath."%20";
        }
        if ($page <> "") {
          $opt=$opt."-p%20".$page;
        }
        if ($adv <> "") {
          $opt=$opt."%20".str_replace(" ","%20",$adv);
        }
      }
if (($title <> "") && (strpos($link,"<") === false) && !preg_match("/filmon|wilmaa|ustream|tvsector/i",$opt)) {
$n++;
$link1=urlencode($baseurl.$opt.",".$link);
$title=fix1($title);
if (strpos($title,"%") === false) {
    echo '
    <item>
    <title>'.$title.'</title>
    <onClick>
    <script>
    showIdle();
    url="'.$baseurl.$opt.','.$link.'";
    titlu="'.$link.'";
    cancelIdle();
    playItemUrl(url,10);
    </script>
    </onClick>
    <annotation>'.$link.' - '.$playpath.'</annotation>
    <link1>'.$link1.'</link1>
    <title1>'.urlencode($title).'</title1>
    <tip>alte canale - backup list</tip>
    </item>
    ';
}
}
}
//<!-- live list -->
$videos=explode("<stream>",$html_live);
$baseurl="http://127.0.0.1/cgi-bin/scripts/util/translate.cgi?stream,";

unset($videos[0]);
$videos = array_values($videos);
$n=0;
foreach($videos as $video) {
$video=str_replace("<![CDATA[","",$video);
$video=str_replace("]]>","",$video);
$opt="";
$title=str_between($video,"<title>","</title>");
$title=trim(str_replace("'","",$title));
$title=fix1($title);
$swf=trim(str_between($video,'<swfUrl>','</swfUrl>'));
$link=trim(str_between($video,"<link>","</link>"));
$page=trim(str_between($video,"<pageUrl>","</pageUrl>"));
$playpath=trim(str_between($video,"<playpath>","</playpath>"));
$adv = trim(str_between($video,"<advanced>","</advanced>"));
      if (($swf <> "") || ($page <> "") || ($playpath <> "") || ($adv <> "")) {
        $opt="Rtmp-options:";
        if ($swf <> "") {
          $opt=$opt."-W%20".$swf."%20";
        }
        if ($playpath <> "") {
          $opt=$opt."-y%20".$playpath."%20";
        }
        if ($page <> "") {
          $opt=$opt."-p%20".$page;
        }
        if ($adv <> "") {
          $opt=$opt."%20".str_replace(" ","%20",$adv);
        }
      }
if (($title <> "") && (strpos($link,"<") === false) && !preg_match("/filmon|wilmaa|ustream|tvsector/i",$opt)) {
$n++;
$link1=urlencode($baseurl.$opt.",".$link);
if (strpos($title,"%") === false) {
    echo '
    <item>
    <title>'.$title.'</title>
    <onClick>
    <script>
    showIdle();
    url="'.$baseurl.$opt.','.$link.'";
    titlu="'.$link.'";
    cancelIdle();
    playItemUrl(url,10);
    </script>
    </onClick>
    <annotation>'.$link.' - '.$playpath.'</annotation>
    <link1>'.$link1.'</link1>
    <title1>'.urlencode($title).'</title1>
    <tip>alte canale - backup list</tip>
    </item>
    ';
}
}
}
//<!-- RTMP US -->
$m3uFile = "http://hdforall.googlecode.com/files/rtmp_us.txt";
$m3uFile = file($m3uFile);
$buffer = array();
foreach($m3uFile as $line) {
if($line != "\n" || $line != "\r" || $line != "\r\n" || $line != "\n\r" || trim($line) !="")
  $buffer[] = $line;
}
//print_r ($buffer);
$m3uFile = $buffer;
foreach($m3uFile as $key => $line) {
$l1=trim($line);
$next1= trim($m3uFile[$key + 2]);
$next= trim($m3uFile[$key + 4]);
  if (!preg_match("/http|mms|rtmp/i",$line) && trim($line) <> "" && $l1[0]==":" && $next1 == "echo.") {
    $t1=explode("echo The",trim($m3uFile[$key + 3]));
    $t2=explode("stream",$t1[1]);
    $t3=explode("is starting",$t2[0]);
    $title=trim($t3[0]);
    $next=str_replace('"',"",$next);
    //$next=str_replace("| %vlc% -","",$next);
    $t1=explode("|",$next);
    $next=$t1[0];
    $next=trim($next);
    if (strpos($next,"rtmpdump") === false) {
      preg_match("/(http|mms)(.*)/i",$next,$m);
      $link=$m[0];
      $link="http://127.0.0.1/cgi-bin/scripts/util/translate.cgi?stream,,".$link;
    } else {
      $t1=explode("rtmpdump -v",$next);
      $link=$t1[1];
      $t1=explode("rtmp",$link);
      $t2=explode(" ",$t1[1]);
      $rtmp="rtmp".$t2[0];
      $opt=substr($link,strlen($rtmp)+4);
      $opt="Rtmp-options:".trim($opt);
      $opt=str_replace(" ","%20",$opt);
      $link = "http://127.0.0.1/cgi-bin/scripts/util/translate.cgi?stream,".$opt.",".$rtmp;
      $link1=urlencode($link);

    }
    if ($title <> "" && $title <> "(NAME)") {
    echo '
    <item>
    <title>'.$title.'</title>
    <onClick>
    <script>
    showIdle();
    url="'.$link.'";
    titlu="'.$rtmp.'";
    cancelIdle();
    playItemUrl(url,10);
    </script>
    </onClick>
    <link1>'.$link1.'</link1>
    <title1>'.urlencode($title).'</title1>
    <annotation>'.$rtmp.'</annotation>
    <tip>rtmp US</tip>
    </item>
    ';
    }
    }
}
//<!-- RTMP ALL alternative -->
$html=file_get_contents("http://hdforall.googlecode.com/files/channels.xml");
$baseurl="http://127.0.0.1/cgi-bin/scripts/util/translate.cgi?stream,";

$videos=explode("<stream>",$html);
unset($videos[0]);
$videos = array_values($videos);
$n=0;
foreach($videos as $video) {
$video=str_replace("<![CDATA[","",$video);
$video=str_replace("]]>","",$video);
$opt="";
$title=str_between($video,"<title>","</title>");
$title=trim(str_replace("'","",$title));
$title=fix1($title);
$swf=trim(str_between($video,'<swfUrl>','</swfUrl>'));
$link=trim(str_between($video,"<link>","</link>"));
$page=trim(str_between($video,"<pageUrl>","</pageUrl>"));
$playpath=trim(str_between($video,"<playpath>","</playpath>"));
$adv = trim(str_between($video,"<advanced>","</advanced>"));
      if (($swf <> "") || ($page <> "") || ($playpath <> "") || ($adv <> "")) {
        $opt="Rtmp-options:";
        if ($swf <> "") {
          $opt=$opt."-W%20".$swf."%20";
        }
        if ($playpath <> "") {
          $opt=$opt."-y%20".$playpath."%20";
        }
        if ($page <> "") {
          $opt=$opt."-p%20".$page;
        }
        if ($adv <> "") {
          $opt=$opt."%20".str_replace(" ","%20",$adv);
        }
      }
if (($title <> "") && (strpos($link,"<") === false) && !preg_match("/tvsector/i",$opt)) {
$n++;
$link1=urlencode($baseurl.$opt.",".$link);
if (strpos($title,"%") === false) {
    echo '
    <item>
    <title>'.$title.'</title>
    <onClick>
    <script>
    showIdle();
    url="'.$baseurl.$opt.','.$link.'";
    titlu="'.$link.'";
    cancelIdle();
    playItemUrl(url,10);
    </script>
    </onClick>
    <annotation>'.$link.' - '.$playpath.'</annotation>
    <link1>'.$link1.'</link1>
    <title1>'.urlencode($title).'</title1>
    <tip>for all countries</tip>
    </item>
    ';
}
}
}
?>
<!-- Spania -->
    <item>
    <title>FOX HD ESP</title>
    <onClick>
    <script>
    showIdle();
    url="http://127.0.0.1/cgi-bin/scripts/util/translate.cgi?stream,Rtmp-options:-y%20foxhdtoti?id=116138%20-W%20http://mips.tv/content/scripts/eplayer.swf%20-p%20http://mips.tv/embedplayer/fgffgfgf/1/650/400%20%20swfVfy=1,rtmp://95.211.90.151/live";
    titlu="rtmp://95.211.90.151/live";
    cancelIdle();
    playItemUrl(url,10);
    </script>
    </onClick>
    <annotation>rtmp://95.211.90.151/live</annotation>
    <link1>http%3A%2F%2F127.0.0.1%2Fcgi-bin%2Fscripts%2Futil%2Ftranslate.cgi%3Fstream%2CRtmp-options%3A-y%2520foxhdtoti%3Fid%3D116138%2520-W%2520http%3A%2F%2Fmips.tv%2Fcontent%2Fscripts%2Feplayer.swf%2520-p%2520http%3A%2F%2Fmips.tv%2Fembedplayer%2Ffgffgfgf%2F1%2F650%2F400%2520%2520swfVfy%3D1%2Crtmp%3A%2F%2F95.211.90.151%2Flive</link1>
    <title1>FOX+HD+ESP</title1>
    <tip>Spania</tip>
    </item>

    <item>
    <title>FOX CRIME HD ESP</title>
    <onClick>
    <script>
    showIdle();
    url="http://127.0.0.1/cgi-bin/scripts/util/translate.cgi?stream,Rtmp-options:-y%20cinestrenostvhd6?id=117244%20-W%20http://mips.tv/content/scripts/eplayer.swf%20-p%20http://mips.tv/embedplayer/cinestrenostvhd6/1/650/400%20%20swfVfy=1,rtmp://184.173.181.3/live";
    titlu="rtmp://184.173.181.3/live";
    cancelIdle();
    playItemUrl(url,10);
    </script>
    </onClick>
    <annotation>rtmp://184.173.181.3/live</annotation>
    <link1>http%3A%2F%2F127.0.0.1%2Fcgi-bin%2Fscripts%2Futil%2Ftranslate.cgi%3Fstream%2CRtmp-options%3A-y%2520cinestrenostvhd6%3Fid%3D117244%2520-W%2520http%3A%2F%2Fmips.tv%2Fcontent%2Fscripts%2Feplayer.swf%2520-p%2520http%3A%2F%2Fmips.tv%2Fembedplayer%2Fcinestrenostvhd6%2F1%2F650%2F400%2520%2520swfVfy%3D1%2Crtmp%3A%2F%2F184.173.181.3%2Flive</link1>
    <title1>FOX+CRIME+HD+ESP</title1>
    <tip>Spania</tip>
    </item>

    <item>
    <title>SYFY HD ESP</title>
    <onClick>
    <script>
    showIdle();
    url="http://127.0.0.1/cgi-bin/scripts/util/translate.cgi?stream,Rtmp-options:-y%20plussysfhd%20-W%20http://www.yocast.tv/player/player-licensed.swf%20-p%20http://www.yocast.tv/embed.php?live=plusacchd&vw=580&vh=400%20live=true%20swfVfy=true,rtmp://31.204.153.32/app";
    titlu="rtmp://31.204.153.32/app";
    cancelIdle();
    playItemUrl(url,10);
    </script>
    </onClick>
    <annotation>rtmp://31.204.153.32/app</annotation>
    <link1>http%3A%2F%2F127.0.0.1%2Fcgi-bin%2Fscripts%2Futil%2Ftranslate.cgi%3Fstream%2CRtmp-options%3A-y%2520plussysfhd%2520-W%2520http%3A%2F%2Fwww.yocast.tv%2Fplayer%2Fplayer-licensed.swf%2520-p%2520http%3A%2F%2Fwww.yocast.tv%2Fembed.php%3Flive%3Dplusacchd%26vw%3D580%26vh%3D400%2520live%3Dtrue%2520swfVfy%3Dtrue%2Crtmp%3A%2F%2F31.204.153.32%2Fapp</link1>
    <title1>SYFY+HD+ESP</title1>
    <tip>Spania</tip>
    </item>

    <item>
    <title>PARAMOUNT COMEDY ESP</title>
    <onClick>
    <script>
    showIdle();
    url="http://127.0.0.1/cgi-bin/scripts/util/translate.cgi?stream,Rtmp-options:-y%20179761%20-W%20http://static.castalba.tv/player.swf%20-p%20http://castalba.tv/embed.php?cid=10068&wh=590&ht=400&r=lacajatv.%20es,rtmp://159.253.149.16/live";
    titlu="rtmp://159.253.149.16/live";
    cancelIdle();
    playItemUrl(url,10);
    </script>
    </onClick>
    <annotation>rtmp://159.253.149.16/live</annotation>
    <link1>http%3A%2F%2F127.0.0.1%2Fcgi-bin%2Fscripts%2Futil%2Ftranslate.cgi%3Fstream%2CRtmp-options%3A-y%2520179761%2520-W%2520http%3A%2F%2Fstatic.castalba.tv%2Fplayer.swf%2520-p%2520http%3A%2F%2Fcastalba.tv%2Fembed.php%3Fcid%3D10068%26wh%3D590%26ht%3D400%26r%3Dlacajatv.%2520es%2Crtmp%3A%2F%2F159.253.149.16%2Flive</link1>
    <title1>PARAMOUNT+COMEDY+ESP</title1>
    <tip>Spania</tip>
    </item>

    <item>
    <title>HOLLYWOOD ESP</title>
    <onClick>
    <script>
    showIdle();
    url="http://127.0.0.1/cgi-bin/scripts/util/translate.cgi?stream,Rtmp-options:-y%20hollywoodlacajatv?id=113954%20-W%20http://mips.tv/content/scripts/eplayer.swf%20-p%20http://mips.tv/embedplayer/hollywoodlacajatv/1/670/400%20%20swfVfy=1,rtmp://174.37.252.220/live";
    titlu="rtmp://174.37.252.220/live";
    cancelIdle();
    playItemUrl(url,10);
    </script>
    </onClick>
    <annotation>rtmp://174.37.252.220/live</annotation>
    <link1>http%3A%2F%2F127.0.0.1%2Fcgi-bin%2Fscripts%2Futil%2Ftranslate.cgi%3Fstream%2CRtmp-options%3A-y%2520hollywoodlacajatv%3Fid%3D113954%2520-W%2520http%3A%2F%2Fmips.tv%2Fcontent%2Fscripts%2Feplayer.swf%2520-p%2520http%3A%2F%2Fmips.tv%2Fembedplayer%2Fhollywoodlacajatv%2F1%2F670%2F400%2520%2520swfVfy%3D1%2Crtmp%3A%2F%2F174.37.252.220%2Flive</link1>
    <title1>HOLLYWOOD+ESP</title1>
    <tip>Spania</tip>
    </item>

    <item>
    <title>DISCOVERY ESP</title>
    <onClick>
    <script>
    showIdle();
    url="http://127.0.0.1/cgi-bin/scripts/util/translate.cgi?stream,Rtmp-options:-y%20discoverylacajatv?id=113618%20-W%20http://mips.tv/content/scripts/eplayer.swf%20-p%20http://mips.tv/embedplayer/discoverylacajatv/1/670/400%20%20swfVfy=1,rtmp://174.37.252.206/live";
    titlu="rtmp://174.37.252.206/live";
    cancelIdle();
    playItemUrl(url,10);
    </script>
    </onClick>
    <annotation>rtmp://174.37.252.206/live</annotation>
    <link1>http%3A%2F%2F127.0.0.1%2Fcgi-bin%2Fscripts%2Futil%2Ftranslate.cgi%3Fstream%2CRtmp-options%3A-y%2520discoverylacajatv%3Fid%3D113618%2520-W%2520http%3A%2F%2Fmips.tv%2Fcontent%2Fscripts%2Feplayer.swf%2520-p%2520http%3A%2F%2Fmips.tv%2Fembedplayer%2Fdiscoverylacajatv%2F1%2F670%2F400%2520%2520swfVfy%3D1%2Crtmp%3A%2F%2F174.37.252.206%2Flive</link1>
    <title1>DISCOVERY+ESP</title1>
    <tip>Spania</tip>
    </item>

    <item>
    <title>AXN HD ESP</title>
    <onClick>
    <script>
    showIdle();
    url="http://127.0.0.1/cgi-bin/scripts/util/translate.cgi?stream,Rtmp-options:-y%20plusaxnhd%20-W%20http://www.histream.tv/swfs/player.swf%20-p%20http://www.histream.tv/embed.php?file=plusaxnhd&width=580&height=400%20live=true%20swfVfy=true,rtmp://109.200.206.178/histreamEd";
    titlu="rtmp://109.200.206.178/histreamEd";
    cancelIdle();
    playItemUrl(url,10);
    </script>
    </onClick>
    <annotation>rtmp://109.200.206.178/histreamEd</annotation>
    <link1>http%3A%2F%2F127.0.0.1%2Fcgi-bin%2Fscripts%2Futil%2Ftranslate.cgi%3Fstream%2CRtmp-options%3A-y%2520plusaxnhd%2520-W%2520http%3A%2F%2Fwww.histream.tv%2Fswfs%2Fplayer.swf%2520-p%2520http%3A%2F%2Fwww.histream.tv%2Fembed.php%3Ffile%3Dplusaxnhd%26width%3D580%26height%3D400%2520live%3Dtrue%2520swfVfy%3Dtrue%2Crtmp%3A%2F%2F109.200.206.178%2FhistreamEd</link1>
    <title1>AXN+HD+ESP</title1>
    <tip>Spania</tip>
    </item>

    <item>
    <title>CALLE 13 HD ESP</title>
    <onClick>
    <script>
    showIdle();
    url="http://127.0.0.1/cgi-bin/scripts/util/translate.cgi?stream,Rtmp-options:-y%20plus13hd%20-W%20http://www.yocast.tv/player/player-licensed.swf%20-p%20http://www.yocast.tv/embed.php?live=plusacchd&vw=580&vh=400%20live=true%20swfVfy=true,rtmp://31.204.153.32/app";
    titlu="rtmp://31.204.153.32/app";
    cancelIdle();
    playItemUrl(url,10);
    </script>
    </onClick>
    <annotation>rtmp://31.204.153.32/app</annotation>
    <link1>http%3A%2F%2F127.0.0.1%2Fcgi-bin%2Fscripts%2Futil%2Ftranslate.cgi%3Fstream%2CRtmp-options%3A-y%2520plus13hd%2520-W%2520http%3A%2F%2Fwww.yocast.tv%2Fplayer%2Fplayer-licensed.swf%2520-p%2520http%3A%2F%2Fwww.yocast.tv%2Fembed.php%3Flive%3Dplusacchd%26vw%3D580%26vh%3D400%2520live%3Dtrue%2520swfVfy%3Dtrue%2Crtmp%3A%2F%2F31.204.153.32%2Fapp</link1>
    <title1>CALLE+13+HD+ESP</title1>
    <tip>Spania</tip>
    </item>

    <item>
    <title>CANAL ACCTION HD</title>
    <onClick>
    <script>
    showIdle();
    url="http://127.0.0.1/cgi-bin/scripts/util/translate.cgi?stream,Rtmp-options:-y%20plusacchd%20-W%20http://www.yocast.tv/player/player-licensed.swf%20-p%20http://www.yocast.tv/embed.php?live=plusacchd&vw=580&vh=400%20live=true%20swfVfy=true,rtmp://31.204.153.32/app";
    titlu="rtmp://31.204.153.32/app";
    cancelIdle();
    playItemUrl(url,10);
    </script>
    </onClick>
    <annotation>rtmp://31.204.153.32/app</annotation>
    <link1>http%3A%2F%2F127.0.0.1%2Fcgi-bin%2Fscripts%2Futil%2Ftranslate.cgi%3Fstream%2CRtmp-options%3A-y%2520plusacchd%2520-W%2520http%3A%2F%2Fwww.yocast.tv%2Fplayer%2Fplayer-licensed.swf%2520-p%2520http%3A%2F%2Fwww.yocast.tv%2Fembed.php%3Flive%3Dplusacchd%26vw%3D580%26vh%3D400%2520live%3Dtrue%2520swfVfy%3Dtrue%2Crtmp%3A%2F%2F31.204.153.32%2Fapp</link1>
    <title1>CANAL+ACCTION+HD</title1>
    <tip>Spania</tip>
    </item>

    <item>
    <title>COSMOPOLITAN HD ESP</title>
    <onClick>
    <script>
    showIdle();
    url="http://127.0.0.1/cgi-bin/scripts/util/translate.cgi?stream,Rtmp-options:-y%20cosmopolitancris78?id=115439%20-W%20http://mips.tv/content/scripts/eplayer.swf%20-p%20http://mips.tv/embedplayer/cosmopolitancris78/1/670/400%20%20swfVfy=1,rtmp://184.173.181.3/live";
    titlu="rtmp://184.173.181.3/live";
    cancelIdle();
    playItemUrl(url,10);
    </script>
    </onClick>
    <annotation>rtmp://184.173.181.3/live</annotation>
    <link1>http%3A%2F%2F127.0.0.1%2Fcgi-bin%2Fscripts%2Futil%2Ftranslate.cgi%3Fstream%2CRtmp-options%3A-y%2520cosmopolitancris78%3Fid%3D115439%2520-W%2520http%3A%2F%2Fmips.tv%2Fcontent%2Fscripts%2Feplayer.swf%2520-p%2520http%3A%2F%2Fmips.tv%2Fembedplayer%2Fcosmopolitancris78%2F1%2F670%2F400%2520%2520swfVfy%3D1%2Crtmp%3A%2F%2F184.173.181.3%2Flive</link1>
    <title1>COSMOPOLITAN+HD+ESP</title1>
    <tip>Spania</tip>
    </item>

    <item>
    <title>TNT HD ESP</title>
    <onClick>
    <script>
    showIdle();
    url="http://127.0.0.1/cgi-bin/scripts/util/translate.cgi?stream,Rtmp-options:-y%20plustnthd%20-W%20http://www.yocast.tv/player/player-licensed.swf%20-p%20http://www.yocast.tv/embed.php?live=plusacchd&vw=580&vh=400%20live=true%20swfVfy=true,rtmp://31.204.153.32/app";
    titlu="rtmp://31.204.153.32/app";
    cancelIdle();
    playItemUrl(url,10);
    </script>
    </onClick>
    <annotation>rtmp://31.204.153.32/app</annotation>
    <link1>http%3A%2F%2F127.0.0.1%2Fcgi-bin%2Fscripts%2Futil%2Ftranslate.cgi%3Fstream%2CRtmp-options%3A-y%2520plustnthd%2520-W%2520http%3A%2F%2Fwww.yocast.tv%2Fplayer%2Fplayer-licensed.swf%2520-p%2520http%3A%2F%2Fwww.yocast.tv%2Fembed.php%3Flive%3Dplusacchd%26vw%3D580%26vh%3D400%2520live%3Dtrue%2520swfVfy%3Dtrue%2Crtmp%3A%2F%2F31.204.153.32%2Fapp</link1>
    <title1>TNT+HD+ESP</title1>
    <tip>Spania</tip>
    </item>

    <item>
    <title>CANAL + MOVIES ESP</title>
    <onClick>
    <script>
    showIdle();
    url="http://127.0.0.1/cgi-bin/scripts/util/translate.cgi?stream,Rtmp-options:-y%20plushd%20-W%20http://www.yocast.tv/player/player-licensed.swf%20-p%20http://www.yocast.tv/embed.php?live=plusacchd&vw=580&vh=400%20live=true%20swfVfy=true,rtmp://31.204.153.32/app";
    titlu="rtmp://31.204.153.32/app";
    cancelIdle();
    playItemUrl(url,10);
    </script>
    </onClick>
    <annotation>rtmp://31.204.153.32/app</annotation>
    <link1>http%3A%2F%2F127.0.0.1%2Fcgi-bin%2Fscripts%2Futil%2Ftranslate.cgi%3Fstream%2CRtmp-options%3A-y%2520plushd%2520-W%2520http%3A%2F%2Fwww.yocast.tv%2Fplayer%2Fplayer-licensed.swf%2520-p%2520http%3A%2F%2Fwww.yocast.tv%2Fembed.php%3Flive%3Dplusacchd%26vw%3D580%26vh%3D400%2520live%3Dtrue%2520swfVfy%3Dtrue%2Crtmp%3A%2F%2F31.204.153.32%2Fapp</link1>
    <title1>CANAL+%2B+MOVIES+ESP</title1>
    <tip>Spania</tip>
    </item>

    <item>
    <title>CANAL + DCINE</title>
    <onClick>
    <script>
    showIdle();
    url="http://127.0.0.1/cgi-bin/scripts/util/translate.cgi?stream,Rtmp-options:-y%20plusdcinehd%20-W%20http://www.yocast.tv/player/player-licensed.swf%20-p%20http://www.yocast.tv/embed.php?live=plusacchd&vw=580&vh=400%20live=true%20swfVfy=true,rtmp://31.204.153.32/app";
    titlu="rtmp://31.204.153.32/app";
    cancelIdle();
    playItemUrl(url,10);
    </script>
    </onClick>
    <annotation>rtmp://31.204.153.32/app</annotation>
    <link1>http%3A%2F%2F127.0.0.1%2Fcgi-bin%2Fscripts%2Futil%2Ftranslate.cgi%3Fstream%2CRtmp-options%3A-y%2520plusdcinehd%2520-W%2520http%3A%2F%2Fwww.yocast.tv%2Fplayer%2Fplayer-licensed.swf%2520-p%2520http%3A%2F%2Fwww.yocast.tv%2Fembed.php%3Flive%3Dplusacchd%26vw%3D580%26vh%3D400%2520live%3Dtrue%2520swfVfy%3Dtrue%2Crtmp%3A%2F%2F31.204.153.32%2Fapp</link1>
    <title1>CANAL+%2B+DCINE</title1>
    <tip>Spania</tip>
    </item>

    <item>
    <title>CANAL + COMEDIA ESP</title>
    <onClick>
    <script>
    showIdle();
    url="http://127.0.0.1/cgi-bin/scripts/util/translate.cgi?stream,Rtmp-options:-y%20pluscomhd%20-W%20http://www.yocast.tv/player/player-licensed.swf%20-p%20http://www.yocast.tv/embed.php?live=plusacchd&vw=580&vh=400%20live=true%20swfVfy=true,rtmp://31.204.153.32/app";
    titlu="rtmp://31.204.153.32/app";
    cancelIdle();
    playItemUrl(url,10);
    </script>
    </onClick>
    <annotation>rtmp://31.204.153.32/app</annotation>
    <link1>http%3A%2F%2F127.0.0.1%2Fcgi-bin%2Fscripts%2Futil%2Ftranslate.cgi%3Fstream%2CRtmp-options%3A-y%2520pluscomhd%2520-W%2520http%3A%2F%2Fwww.yocast.tv%2Fplayer%2Fplayer-licensed.swf%2520-p%2520http%3A%2F%2Fwww.yocast.tv%2Fembed.php%3Flive%3Dplusacchd%26vw%3D580%26vh%3D400%2520live%3Dtrue%2520swfVfy%3Dtrue%2Crtmp%3A%2F%2F31.204.153.32%2Fapp</link1>
    <title1>CANAL+%2B+COMEDIA+ESP</title1>
    <tip>Spania</tip>
    </item>

    <item>
    <title>DISNEY CINEMAGIC ESP</title>
    <onClick>
    <script>
    showIdle();
    url="http://127.0.0.1/cgi-bin/scripts/util/translate.cgi?stream,Rtmp-options:-y%20streamcinemag-qrmw%20-T%20VyPxYFDj4BvxtVv7%20-p%20http://streami.tv/embed/e2.php?%20%20-W%20http://streami.tv/files/fp/flowplayer.controls-3.2.11.swf%20timeout=10%20live=true%20swfVfy=true,rtmp://origin.streami.tv:1936/streami/";
    titlu="rtmp://origin.streami.tv:1936/streami/";
    cancelIdle();
    playItemUrl(url,10);
    </script>
    </onClick>
    <annotation>rtmp://origin.streami.tv:1936/streami/</annotation>
    <link1>http%3A%2F%2F127.0.0.1%2Fcgi-bin%2Fscripts%2Futil%2Ftranslate.cgi%3Fstream%2CRtmp-options%3A-y%2520streamcinemag-qrmw%2520-T%2520VyPxYFDj4BvxtVv7%2520-p%2520http%3A%2F%2Fstreami.tv%2Fembed%2Fe2.php%3F%2520%2520-W%2520http%3A%2F%2Fstreami.tv%2Ffiles%2Ffp%2Fflowplayer.controls-3.2.11.swf%2520timeout%3D10%2520live%3Dtrue%2520swfVfy%3Dtrue%2Crtmp%3A%2F%2Forigin.streami.tv%3A1936%2Fstreami%2F</link1>
    <title1>DISNEY+CINEMAGIC+ESP</title1>
    <tip>Spania</tip>
    </item>

    <item>
    <title>DISNEY XD ESP</title>
    <onClick>
    <script>
    showIdle();
    url="http://127.0.0.1/cgi-bin/scripts/util/translate.cgi?stream,Rtmp-options:-y%20streamxddis-pbgw%20-T%20VyPxYFDj4BvxtVv7%20-p%20http://streami.tv/embed/e2.php?%20%20-W%20http://streami.tv/files/fp/flowplayer.controls-3.2.11.swf%20timeout=10%20live=true%20swfVfy=true,rtmp://origin.streami.tv:1936/streami/";
    titlu="rtmp://origin.streami.tv:1936/streami/";
    cancelIdle();
    playItemUrl(url,10);
    </script>
    </onClick>
    <annotation>rtmp://origin.streami.tv:1936/streami/</annotation>
    <link1>http%3A%2F%2F127.0.0.1%2Fcgi-bin%2Fscripts%2Futil%2Ftranslate.cgi%3Fstream%2CRtmp-options%3A-y%2520streamxddis-pbgw%2520-T%2520VyPxYFDj4BvxtVv7%2520-p%2520http%3A%2F%2Fstreami.tv%2Fembed%2Fe2.php%3F%2520%2520-W%2520http%3A%2F%2Fstreami.tv%2Ffiles%2Ffp%2Fflowplayer.controls-3.2.11.swf%2520timeout%3D10%2520live%3Dtrue%2520swfVfy%3Dtrue%2Crtmp%3A%2F%2Forigin.streami.tv%3A1936%2Fstreami%2F</link1>
    <title1>DISNEY+XD+ESP</title1>
    <tip>Spania</tip>
    </item>

    <item>
    <title>CAZA Y PESCA HD ESP</title>
    <onClick>
    <script>
    showIdle();
    url="http://127.0.0.1/cgi-bin/scripts/util/translate.cgi?stream,Rtmp-options:-y%20streampescaycaza-wrhh%20-T%20VyPxYFDj4BvxtVv7%20-p%20http://streami.tv/embed/e2.php?%20%20-W%20http://streami.tv/files/fp/flowplayer.controls-3.2.11.swf%20timeout=10%20live=true%20swfVfy=true,rtmp://origin.streami.tv:1936/streami/";
    titlu="rtmp://origin.streami.tv:1936/streami/";
    cancelIdle();
    playItemUrl(url,10);
    </script>
    </onClick>
    <annotation>rtmp://origin.streami.tv:1936/streami/</annotation>
    <link1>http%3A%2F%2F127.0.0.1%2Fcgi-bin%2Fscripts%2Futil%2Ftranslate.cgi%3Fstream%2CRtmp-options%3A-y%2520streampescaycaza-wrhh%2520-T%2520VyPxYFDj4BvxtVv7%2520-p%2520http%3A%2F%2Fstreami.tv%2Fembed%2Fe2.php%3F%2520%2520-W%2520http%3A%2F%2Fstreami.tv%2Ffiles%2Ffp%2Fflowplayer.controls-3.2.11.swf%2520timeout%3D10%2520live%3Dtrue%2520swfVfy%3Dtrue%2Crtmp%3A%2F%2Forigin.streami.tv%3A1936%2Fstreami%2F</link1>
    <title1>CAZA+Y+PESCA+HD+ESP</title1>
    <tip>Spania</tip>
    </item>

    <item>
    <title>CANAL + FUTBOL ESP</title>
    <onClick>
    <script>
    showIdle();
    url="http://127.0.0.1/cgi-bin/scripts/util/translate.cgi?stream,Rtmp-options:-y%20futbolhd%20-W%20http://www.yocast.tv/player/player-licensed.swf%20-p%20http://www.yocast.tv/embed.php?live=plusacchd&vw=580&vh=400%20live=true%20swfVfy=true,rtmp://31.204.153.32/app";
    titlu="rtmp://31.204.153.32/app";
    cancelIdle();
    playItemUrl(url,10);
    </script>
    </onClick>
    <annotation>rtmp://31.204.153.32/app</annotation>
    <link1>http%3A%2F%2F127.0.0.1%2Fcgi-bin%2Fscripts%2Futil%2Ftranslate.cgi%3Fstream%2CRtmp-options%3A-y%2520futbolhd%2520-W%2520http%3A%2F%2Fwww.yocast.tv%2Fplayer%2Fplayer-licensed.swf%2520-p%2520http%3A%2F%2Fwww.yocast.tv%2Fembed.php%3Flive%3Dplusacchd%26vw%3D580%26vh%3D400%2520live%3Dtrue%2520swfVfy%3Dtrue%2Crtmp%3A%2F%2F31.204.153.32%2Fapp</link1>
    <title1>CANAL+%2B+FUTBOL+ESP</title1>
    <tip>Spania</tip>
    </item>

    <item>
    <title>CANAL + DEPORTE HD ESP</title>
    <onClick>
    <script>
    showIdle();
    url="http://127.0.0.1/cgi-bin/scripts/util/translate.cgi?stream,Rtmp-options:-y%20dephd2%20-W%20http://www.histream.tv/swfs/player.swf%20-p%20http://www.histream.tv/embed.php?file=plusaxnhd&width=580&height=400%20live=true%20swfVfy=true,rtmp://109.200.206.178/histreamEd";
    titlu="rtmp://109.200.206.178/histreamEd";
    cancelIdle();
    playItemUrl(url,10);
    </script>
    </onClick>
    <annotation>rtmp://109.200.206.178/histreamEd</annotation>
    <link1>http%3A%2F%2F127.0.0.1%2Fcgi-bin%2Fscripts%2Futil%2Ftranslate.cgi%3Fstream%2CRtmp-options%3A-y%2520dephd2%2520-W%2520http%3A%2F%2Fwww.histream.tv%2Fswfs%2Fplayer.swf%2520-p%2520http%3A%2F%2Fwww.histream.tv%2Fembed.php%3Ffile%3Dplusaxnhd%26width%3D580%26height%3D400%2520live%3Dtrue%2520swfVfy%3Dtrue%2Crtmp%3A%2F%2F109.200.206.178%2FhistreamEd</link1>
    <title1>CANAL+%2B+DEPORTE+HD+ESP</title1>
    <tip>Spania</tip>
    </item>

    <item>
    <title>CANAL + LIGA HD ESP</title>
    <onClick>
    <script>
    showIdle();
    url="http://127.0.0.1/cgi-bin/scripts/util/translate.cgi?stream,Rtmp-options:-y%20pluslighd%20-W%20http://www.yocast.tv/player/player-licensed.swf%20-p%20http://www.yocast.tv/embed.php?live=plusacchd&vw=580&vh=400%20live=true%20swfVfy=true,rtmp://31.204.153.32/app";
    titlu="rtmp://31.204.153.32/app";
    cancelIdle();
    playItemUrl(url,10);
    </script>
    </onClick>
    <annotation>rtmp://31.204.153.32/app</annotation>
    <link1>http%3A%2F%2F127.0.0.1%2Fcgi-bin%2Fscripts%2Futil%2Ftranslate.cgi%3Fstream%2CRtmp-options%3A-y%2520pluslighd%2520-W%2520http%3A%2F%2Fwww.yocast.tv%2Fplayer%2Fplayer-licensed.swf%2520-p%2520http%3A%2F%2Fwww.yocast.tv%2Fembed.php%3Flive%3Dplusacchd%26vw%3D580%26vh%3D400%2520live%3Dtrue%2520swfVfy%3Dtrue%2Crtmp%3A%2F%2F31.204.153.32%2Fapp</link1>
    <title1>CANAL+%2B+LIGA+HD+ESP</title1>
    <tip>Spania</tip>
    </item>

    <item>
    <title>GOL TV ESP</title>
    <onClick>
    <script>
    showIdle();
    url="http://127.0.0.1/cgi-bin/scripts/util/translate.cgi?stream,Rtmp-options:-y%20findegol11%20-W%20http://stream4u.eu/player/player.swf%20-p%20http://www.stream4u.eu/embed.php?v=findegol11&vw=580&vh=400&domain=s%20harestreamfree.com,rtmp://31.204.154.37/live/?u=findegol11";
    titlu="rtmp://31.204.154.37/live/?u=findegol11";
    cancelIdle();
    playItemUrl(url,10);
    </script>
    </onClick>
    <annotation>rtmp://31.204.154.37/live/?u=findegol11</annotation>
    <link1>http%3A%2F%2F127.0.0.1%2Fcgi-bin%2Fscripts%2Futil%2Ftranslate.cgi%3Fstream%2CRtmp-options%3A-y%2520findegol11%2520-W%2520http%3A%2F%2Fstream4u.eu%2Fplayer%2Fplayer.swf%2520-p%2520http%3A%2F%2Fwww.stream4u.eu%2Fembed.php%3Fv%3Dfindegol11%26vw%3D580%26vh%3D400%26domain%3Ds%2520harestreamfree.com%2Crtmp%3A%2F%2F31.204.154.37%2Flive%2F%3Fu%3Dfindegol11</link1>
    <title1>GOL+TV+ESP</title1>
    <tip>Spania</tip>
    </item>

    <item>
    <title>REAL MADRID TV ESP</title>
    <onClick>
    <script>
    showIdle();
    url="http://127.0.0.1/cgi-bin/scripts/util/translate.cgi?stream,Rtmp-options:-y%20sdfgsdgsdf%20-W%20http://stream4u.eu/player/player.swf%20-p%20http://www.stream4u.eu/embed.php?v=sdfgsdgsdf&vw=600&vh=400&domain=s%20tremingtotaltv.com,rtmp://31.204.154.37/live/?u=sdfgsdgsdf";
    titlu="rtmp://31.204.154.37/live/?u=sdfgsdgsdf";
    cancelIdle();
    playItemUrl(url,10);
    </script>
    </onClick>
    <annotation>rtmp://31.204.154.37/live/?u=sdfgsdgsdf</annotation>
    <link1>http%3A%2F%2F127.0.0.1%2Fcgi-bin%2Fscripts%2Futil%2Ftranslate.cgi%3Fstream%2CRtmp-options%3A-y%2520sdfgsdgsdf%2520-W%2520http%3A%2F%2Fstream4u.eu%2Fplayer%2Fplayer.swf%2520-p%2520http%3A%2F%2Fwww.stream4u.eu%2Fembed.php%3Fv%3Dsdfgsdgsdf%26vw%3D600%26vh%3D400%26domain%3Ds%2520tremingtotaltv.com%2Crtmp%3A%2F%2F31.204.154.37%2Flive%2F%3Fu%3Dsdfgsdgsdf</link1>
    <title1>REAL+MADRID+TV+ESP</title1>
    <tip>Spania</tip>
    </item>

    <item>
    <title>NBA ESP</title>
    <onClick>
    <script>
    showIdle();
    url="http://127.0.0.1/cgi-bin/scripts/util/translate.cgi?stream,Rtmp-options:-y%20eventosppvc1xx1a?id=118903%20-W%20http://mips.tv/content/scripts/eplayer.swf%20-p%20http://mips.tv/embedplayer/eventosppvc1xx1a/1/700/400%20live=true%20swfVfy=true,rtmp://95.211.90.153/live";
    titlu="rtmp://95.211.90.153/live";
    cancelIdle();
    playItemUrl(url,10);
    </script>
    </onClick>
    <annotation>rtmp://95.211.90.153/live</annotation>
    <link1>http%3A%2F%2F127.0.0.1%2Fcgi-bin%2Fscripts%2Futil%2Ftranslate.cgi%3Fstream%2CRtmp-options%3A-y%2520eventosppvc1xx1a%3Fid%3D118903%2520-W%2520http%3A%2F%2Fmips.tv%2Fcontent%2Fscripts%2Feplayer.swf%2520-p%2520http%3A%2F%2Fmips.tv%2Fembedplayer%2Feventosppvc1xx1a%2F1%2F700%2F400%2520live%3Dtrue%2520swfVfy%3Dtrue%2Crtmp%3A%2F%2F95.211.90.153%2Flive</link1>
    <title1>NBA+ESP</title1>
    <tip>Spania</tip>
    </item>

    <item>
    <title>ESPN 2 ESP</title>
    <onClick>
    <script>
    showIdle();
    url="http://127.0.0.1/cgi-bin/scripts/util/translate.cgi?stream,Rtmp-options:-y%2012021%20-W%20http://www.udemy.com/static/flash/player5.9.swf%20-p%20http://sawlive.tv/embed/watch/NTM1OTEzYjZhMTBjOmFmNjk3MjYxNmM3MDZlOmNhZmM0N%20GVmMjU1ZjlkMTliZGIyYz/I0NjliZWE2NDgyMmUwMTFjZmE6YjMzOTFlZWY4NjBlNjB%20kYTIzZTE2Yzk4ZWI0NmFjODk_%20live=true%20swfVfy=true,rtmp://68.68.28.65:1935/app";
    titlu="rtmp://68.68.28.65:1935/app";
    cancelIdle();
    playItemUrl(url,10);
    </script>
    </onClick>
    <annotation>rtmp://68.68.28.65:1935/app</annotation>
    <link1>http%3A%2F%2F127.0.0.1%2Fcgi-bin%2Fscripts%2Futil%2Ftranslate.cgi%3Fstream%2CRtmp-options%3A-y%252012021%2520-W%2520http%3A%2F%2Fwww.udemy.com%2Fstatic%2Fflash%2Fplayer5.9.swf%2520-p%2520http%3A%2F%2Fsawlive.tv%2Fembed%2Fwatch%2FNTM1OTEzYjZhMTBjOmFmNjk3MjYxNmM3MDZlOmNhZmM0N%2520GVmMjU1ZjlkMTliZGIyYz%2FI0NjliZWE2NDgyMmUwMTFjZmE6YjMzOTFlZWY4NjBlNjB%2520kYTIzZTE2Yzk4ZWI0NmFjODk_%2520live%3Dtrue%2520swfVfy%3Dtrue%2Crtmp%3A%2F%2F68.68.28.65%3A1935%2Fapp</link1>
    <title1>ESPN+2+ESP</title1>
    <tip>Spania</tip>
    </item>

    <item>
    <title>BARCA TV HD ESP</title>
    <onClick>
    <script>
    showIdle();
    url="http://127.0.0.1/cgi-bin/scripts/util/translate.cgi?stream,Rtmp-options:-y%20streambar--elo-fefh%20-T%20VyPxYFDj4BvxtVv7%20-p%20http://streami.tv/embed/e2.php?%20%20-W%20http://streami.tv/files/fp/flowplayer.controls-3.2.11.swf%20timeout=10%20live=true%20swfVfy=true,rtmp://origin.streami.tv:1936/streami/";
    titlu="rtmp://origin.streami.tv:1936/streami/";
    cancelIdle();
    playItemUrl(url,10);
    </script>
    </onClick>
    <annotation>rtmp://origin.streami.tv:1936/streami/</annotation>
    <link1>http%3A%2F%2F127.0.0.1%2Fcgi-bin%2Fscripts%2Futil%2Ftranslate.cgi%3Fstream%2CRtmp-options%3A-y%2520streambar--elo-fefh%2520-T%2520VyPxYFDj4BvxtVv7%2520-p%2520http%3A%2F%2Fstreami.tv%2Fembed%2Fe2.php%3F%2520%2520-W%2520http%3A%2F%2Fstreami.tv%2Ffiles%2Ffp%2Fflowplayer.controls-3.2.11.swf%2520timeout%3D10%2520live%3Dtrue%2520swfVfy%3Dtrue%2Crtmp%3A%2F%2Forigin.streami.tv%3A1936%2Fstreami%2F</link1>
    <title1>BARCA+TV+HD+ESP</title1>
    <tip>Spania</tip>
    </item>

    <item>
    <title>NEOX ESP</title>
    <onClick>
    <script>
    showIdle();
    url="http://127.0.0.1/cgi-bin/scripts/util/translate.cgi?stream,Rtmp-options:-y%20stream-eventos2%20-W%20http://www.antena3.com/AkamaiPlugin/AkamaiAdvancedStreamingPlugin.swf%20-p%20http://www.antena3.com/static/swf/A3PlayerAkamai.swf?xml=http://www.antena3.com/static/directos/directo3.xml&autoplay=true,rtmp://antena3fms35livefs.fplive.net:443/antena3fms35live-live";
    titlu="rtmp://antena3fms35livefs.fplive.net:443/antena3fms35live-live";
    cancelIdle();
    playItemUrl(url,10);
    </script>
    </onClick>
    <annotation>rtmp://antena3fms35livefs.fplive.net:443/antena3fms35live-live</annotation>
    <link1>http%3A%2F%2F127.0.0.1%2Fcgi-bin%2Fscripts%2Futil%2Ftranslate.cgi%3Fstream%2CRtmp-options%3A-y%2520stream-eventos2%2520-W%2520http%3A%2F%2Fwww.antena3.com%2FAkamaiPlugin%2FAkamaiAdvancedStreamingPlugin.swf%2520-p%2520http%3A%2F%2Fwww.antena3.com%2Fstatic%2Fswf%2FA3PlayerAkamai.swf%3Fxml%3Dhttp%3A%2F%2Fwww.antena3.com%2Fstatic%2Fdirectos%2Fdirecto3.xml%26autoplay%3Dtrue%2Crtmp%3A%2F%2Fantena3fms35livefs.fplive.net%3A443%2Fantena3fms35live-live</link1>
    <title1>NEOX+ESP</title1>
    <tip>Spania</tip>
    </item>

</channel>
</rss>
