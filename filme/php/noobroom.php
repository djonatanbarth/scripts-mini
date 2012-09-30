#!/usr/local/bin/Resource/www/cgi-bin/php
<?php echo "<?xml version='1.0' encoding='UTF8' ?>";
$host = "http://127.0.0.1/cgi-bin";
function str_between($string, $start, $end){
	$string = " ".$string; $ini = strpos($string,$start);
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini;
	return substr($string,$ini,$len);
}
$query = $_GET["query"];
$queryArr = explode(',', $query);
$tit = urldecode($queryArr[0]);
$l = urldecode($queryArr[1]);
?>
<rss version="2.0">
<script>
  translate_base_url  = "http://127.0.0.1/cgi-bin/translate?";

  storagePath             = getStoragePath("tmp");
  storagePath_stream      = storagePath + "stream.dat";
  storagePath_playlist    = storagePath + "playlist.dat";
  
  error_info          = "";
</script>
<onEnter>
  cachePath = getStoragePath("key");
  optionsPath = cachePath + "noobroom.dat";
  optionsArray = readStringFromFile(optionsPath);
  if(optionsArray == null)
  {
    subtitle = "off";
     server = "-1";
     sserver="Default";
     hhd = "0";
     shd = "SD";
  }
  else
  {
    subtitle = getStringArrayAt(optionsArray, 0);
    server = getStringArrayAt(optionsArray, 1);
    hhd = getStringArrayAt(optionsArray, 2);
  }
  if (subtitle == " " || subtitle == "" || subtitle == null)
    subtitle = "off";
  if (server == " " || server == "" || server == null)
    {
    server = "-1";
    sserver="Default";
    }
  if (hhd == " " || hhd == "" || hhd == null)
    {
     hhd = "0";
     shd="SD";
    }
  startitem = "middle";
    if (hhd == "0")
      shd="SD";
    else if (hhd == "1")
      shd="HD";
    if (server == "-1")
      sserver="Defaut";
    else if (server == "3")
      sserver="Amsterdam";
    else if (server == "0")
      sserver="Chicago";
    else if (server == "6")
      sserver="Miami";
  setRefreshTime(1);
  subtitle = "off";
</onEnter>
<onExit>
  arr = null;
  arr = pushBackStringArray(arr, subtitle);
  arr = pushBackStringArray(arr, server);
  arr = pushBackStringArray(arr, hhd);
  print("arr=",arr);

  writeStringToFile(optionsPath, arr);
</onExit>
<onRefresh>
    itemCount = getPageInfo("itemCount");
    setRefreshTime(-1);
    redrawdisplay();
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
	itemWidthPC="80"
	itemHeightPC="8"
	capXPC="8"
	capYPC="25"
	capWidthPC="80"
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
  	<text align="left" offsetXPC="6" offsetYPC="15" widthPC="70" heightPC="4" fontSize="16" backgroundColor="10:105:150" foregroundColor="100:200:255">
    2= download,1=download manager,4/6= jump -+100, right for more...
		</text>
  	<text redraw="yes" align="left" offsetXPC="80" offsetYPC="12" widthPC="20" heightPC="6" fontSize="20" backgroundColor="10:105:150" foregroundColor="60:160:205">
		  <script>sprintf("%s / ", focus-(-1))+itemCount;</script>
		</text>
  	<text  redraw="yes" align="center" offsetXPC="0" offsetYPC="90" widthPC="100" heightPC="8" fontSize="17" backgroundColor="10:105:150" foregroundColor="100:200:255">
    <script>"7=Server: " + sserver + " 9=HD/SD: " + shd;</script>
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
                      img = getItemInfo(idx,"image");
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
  annotation = " ";
  setFocusItemIndex(idx);
  setItemFocus(0);
  ret = "true";
}
else if (userInput == "two" || userInput == "2")
	{
     showIdle();
     url=getItemInfo(getFocusItemIndex(),"download") + server + "," + hhd;
     movie=getUrl(url);
     cancelIdle();
	 topUrl = "http://127.0.0.1/cgi-bin/scripts/util/download.cgi?link=" + movie + ";name=" + getItemInfo(getFocusItemIndex(),"name");
	 dlok = loadXMLFile(topUrl);
	 "true";
}
else if (userInput == "one" || userInput == "1")
   {
    jumpToLink("destination");
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
else if(userInput == "seven" || userInput == "7")
{
if (server == "-1")
  {
    server = "6";
    sserver="Miami";
  }
else if (server == "6")
  {
    server = "0";
    sserver="Chicago";
  }
else if (server == "0")
  {
    server = "3";
    sserver="Amsterdam";
  }
else if (server == "3")
  {
    server = "-1";
    sserver="Default";
  }
else
  {
    server= "-1";
    sserver="Default";
  }
}
else if(userInput == "nine" || userInput == "9")
{
if (hhd == "0")
 {
  hhd = "1";
  shd = "HD";
 }
else if(hhd == "1")
 {
  hhd = "0";
  shd = "SD";
 }
}
else if (userInput == "right" || userInput == "R")
{
movie=getItemInfo(getFocusItemIndex(),"movie");
showIdle();
movie_info="http://127.0.0.1/cgi-bin/scripts/filme/php/noobroom_det.php?file=" + movie;
dummy = getURL(movie_info);
cancelIdle();
ret_val=doModalRss("/usr/local/etc/www/cgi-bin/scripts/filme/php/movie_detail.rss");
ret="true";
}
redrawdisplay();
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
<destination>
	<link>http://127.0.0.1/cgi-bin/scripts/util/level.php
	</link>
</destination>
<channel>
	<title><?php echo $tit; ?></title>
	<menu>main menu</menu>
<?php
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $l);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch,CURLOPT_REFERER,$l);
  $html = curl_exec($ch);
  curl_close($ch);
if (strpos($l,"genre.php") === false) {
$videos = explode("href='/?", $html);

unset($videos[0]);
$videos = array_values($videos);

foreach($videos as $video) {
   $t1=explode("'",$video);
   $link=$t1[0];
   
   $t1=explode('>',$video);
   $t2=explode('<',$t1[1]);
   $title=$t2[0];
   $name = preg_replace('/[^A-Za-z0-9_]/','_',$title).".mp4";
   $title1=$title;
   $link1="http://127.0.0.1/cgi-bin/scripts/filme/php/noobroom_link.php?file=".$link.",no,";
     echo '
     <item>
     <title>'.$title1.'</title>
     <onClick>
     <script>
     showIdle();
     url="http://127.0.0.1/cgi-bin/scripts/filme/php/noobroom_link.php?file='.$link.'" + "," + subtitle + "," + server + "," + hhd;
     movie=geturl(url);
     cancelIdle();
    storagePath = getStoragePath("tmp");
    storagePath_stream = storagePath + "stream.dat";
    streamArray = null;
    streamArray = pushBackStringArray(streamArray, "");
    streamArray = pushBackStringArray(streamArray, "");
    streamArray = pushBackStringArray(streamArray, movie);
    streamArray = pushBackStringArray(streamArray, movie);
    streamArray = pushBackStringArray(streamArray, video/mp4);
    streamArray = pushBackStringArray(streamArray, "'.$title.'");
    streamArray = pushBackStringArray(streamArray, "1");
    writeStringToFile(storagePath_stream, streamArray);
    ';
    $f = "/usr/local/bin/home_menu";
    if (file_exists($f)) {
    echo '
    doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer.rss");
    ';
    } else {
    echo '
    doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer.rss");
    ';
    }
    echo '
     </script>
     </onClick>
    <download>'.$link1.'</download>
    <name>'.$name.'</name>
    <movie>'.$link.'</movie>
     </item>
     ';
}
} else {
$videos = explode("href='/?", $html);

unset($videos[0]);
$videos = array_values($videos);

foreach($videos as $video) {
   $t1=explode("'",$video);
   $link=$t1[0];

   $t1=explode('>',$video);
   $t2=explode('<',$t1[1]);
   $title=$t2[0];
   $arr[]=array($title, $link);
}
asort($arr);
foreach ($arr as $key => $val) {
 $title=$arr[$key][0];
 $link=$arr[$key][1];
   $name = preg_replace('/[^A-Za-z0-9_]/','_',$title).".mp4";
   $title1=$title;
   $link1="http://127.0.0.1/cgi-bin/scripts/filme/php/noobroom_link.php?file=".$link.",no,";
     echo '
     <item>
     <title>'.$title1.'</title>
     <onClick>
     <script>
     showIdle();
     url="http://127.0.0.1/cgi-bin/scripts/filme/php/noobroom_link.php?file='.$link.'" + "," + subtitle + "," + server + "," + hhd;
     movie=geturl(url);
     cancelIdle();
    storagePath = getStoragePath("tmp");
    storagePath_stream = storagePath + "stream.dat";
    streamArray = null;
    streamArray = pushBackStringArray(streamArray, "");
    streamArray = pushBackStringArray(streamArray, "");
    streamArray = pushBackStringArray(streamArray, movie);
    streamArray = pushBackStringArray(streamArray, movie);
    streamArray = pushBackStringArray(streamArray, video/mp4);
    streamArray = pushBackStringArray(streamArray, "'.$title.'");
    streamArray = pushBackStringArray(streamArray, "1");
    writeStringToFile(storagePath_stream, streamArray);
    ';
    $f = "/usr/local/bin/home_menu";
    if (file_exists($f)) {
    echo '
    doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer.rss");
    ';
    } else {
    echo '
    doModalRss("rss_file:///usr/local/etc/www/cgi-bin/scripts/util/videoRenderer.rss");
    ';
    }
    echo '
     </script>
     </onClick>
    <download>'.$link1.'</download>
    <name>'.$name.'</name>
    <movie>'.$link.'</movie>
     </item>
     ';
}
}
?>
</channel>
</rss>
