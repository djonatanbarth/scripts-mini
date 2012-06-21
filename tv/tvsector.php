#!/usr/local/bin/Resource/www/cgi-bin/php
<?php echo "<?xml version='1.0' encoding='UTF8' ?>";
$host = "http://127.0.0.1/cgi-bin";
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
  startitem = "middle";
  server = "s7";
  setRefreshTime(1);
/* 1.) Log in to Futubox.com, select a random channel to start watching, and view the source of that page
   2.) In your web browser, right-click on the page and select "View Page Source" then Ctrl/Cmd + F to find "sid="
   3.) Then copy the sid value after the '=' */
  cachePath = getStoragePath("key");
  optionsPath = cachePath + "futubox.dat";
  optionsArray = readStringFromFile(optionsPath);
  if(optionsArray == null)
  {
    sid = "";
  }
  else
  {
    sid = getStringArrayAt(optionsArray, 0);
  }
  
</onEnter>
<onExit>
  arr = null;
  if (sid != "" || sid != null)
  {
  arr = pushBackStringArray(arr, sid);
  print("arr=",arr);
  writeStringToFile(optionsPath, arr);
  }
setRefreshTime(-1);
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
	itemWidthPC="35"
	itemHeightPC="8"
	capXPC="8"
	capYPC="25"
	capWidthPC="35"
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
  	<text redraw="yes" align="left" offsetXPC="6" offsetYPC="15" widthPC="100" heightPC="4" fontSize="16" backgroundColor="10:105:150" foregroundColor="100:200:255">
    <script>"Press 2 for other server. Server : " + server + ", SID:" + sid;</script>
		</text>
  	<text redraw="yes" offsetXPC="85" offsetYPC="12" widthPC="10" heightPC="6" fontSize="20" backgroundColor="10:105:150" foregroundColor="60:160:205">
		  <script>sprintf("%s / ", focus-(-1))+itemCount;</script>
		</text>
		<text align="justify" redraw="yes"
          lines="10" fontSize=17
		      offsetXPC=45 offsetYPC=35 widthPC=50 heightPC=42
		      backgroundColor=0:0:0 foregroundColor=200:200:200>
1.) Log in to Futubox.com, select a random channel to start watching, and view the source of that page 2.) In your web browser, right-click on the page and select "View Page Source" then Ctrl/Cmd + F to find "sid="
   3.) Then copy the sid value after the '='
		</text>
  	<text  redraw="yes" align="center" offsetXPC="0" offsetYPC="90" widthPC="100" heightPC="8" fontSize="17" backgroundColor="10:105:150" foregroundColor="100:200:255">
    <script>"Press 2 for other server. Server : " + server + ", SID:" + sid;</script>
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
					  location = getItemInfo(idx, "location");
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
  redrawDisplay();
  "true";
}
else if (userInput == "two" || userInput == "2")
{
		if (server == "s7")
           server = "s6";
		else if (server == "s6")
           server = "s5";
		else if (server == "s5")
          server = "s7";
        else
		 server = "s6";
  redrawDisplay();
  ret = "true";
}
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
	<title>High Definition TV</title>
	<menu>main menu</menu>

<item>
<title>Set / change SID</title>
<onClick>
  keyword = getInput();
  if (keyword != null)
  {
    sid = keyword;
    jumptolink("");
  }
</onClick>
</item>
<item>
<title>Eurosport HD</title>
<onClick>
	<script>
		movie = "http://127.0.0.1/cgi-bin/translate?stream,Rtmp-options:-b%2060000%20-W%20http://www.futubox.com/donottouch/fpv3.39.swf%20-y%20z010601.stream%20-p%20http://futubox.com/,rtmp://" + server + ".webport.tv/live?sid=" + sid;
		playitemurl(movie,10);
		</script>
		</onClick>
</item>

<item>
<title>Eurosport 2 HD</title>
<onClick>
	<script>
		movie = "http://127.0.0.1/cgi-bin/translate?stream,Rtmp-options:-b%2060000%20-W%20http://www.futubox.com/donottouch/fpv3.39.swf%20-y%20z010301.stream%20-p%20http://futubox.com/,rtmp://" + server + ".webport.tv/live?sid=" + sid;
		playitemurl(movie,10);
		</script>
		</onClick>
</item>

<item>
<title>ESPN America HD</title>
<onClick>
	<script>
		movie = "http://127.0.0.1/cgi-bin/translate?stream,Rtmp-options:-b%2060000%20-W%20http://www.futubox.com/donottouch/fpv3.39.swf%20-y%20z050201.stream%20-p%20http://futubox.com/,rtmp://" + server + ".webport.tv/live?sid=" + sid;
		playitemurl(movie,10);
		</script>
		</onClick>
</item>

<item>
<title>Discovery HD</title>
<onClick>
	<script>
		movie = "http://127.0.0.1/cgi-bin/translate?stream,Rtmp-options:-b%2060000%20-W%20http://www.futubox.com/donottouch/fpv3.39.swf%20-y%20z050240.stream%20-p%20http://futubox.com/,rtmp://" + server + ".webport.tv/ilt";
		playitemurl(movie,10);
		</script>
		</onClick>
</item>	

<!-- item>
<title>Nat Geo WILD HD</title>
<onClick>
	<script>
		movie = "http://127.0.0.1/cgi-bin/translate?stream,Rtmp-options:-b%2060000%20-W%20http://www.futubox.com/donottouch/fpv3.39.swf%20-y%20z050204.stream%20-p%20http://futubox.com/,rtmp://" + server + ".webport.tv/live?sid=" + sid;
		playitemurl(movie,10);
		</script>
		</onClick>
</item -->	

<item>
<title>Nat Geo HD</title>
<onClick>
	<script>
		movie = "http://127.0.0.1/cgi-bin/translate?stream,Rtmp-options:-b%2060000%20-W%20http://www.futubox.com/donottouch/fpv3.39.swf%20-y%20z050225.stream%20-p%20http://futubox.com/,rtmp://" + server + ".webport.tv/live?sid=" + sid;
		playitemurl(movie,10);
		</script>
		</onClick>
</item>	

<item>
<title>Nat Geo WILD HD</title>
<onClick>
	<script>
		movie = "http://127.0.0.1/cgi-bin/translate?stream,Rtmp-options:-b%2060000%20-W%20http://www.futubox.com/donottouch/fpv3.39.swf%20-y%20z050238.stream%20-p%20http://futubox.com/,rtmp://" + server + ".webport.tv/live?sid=" + sid;
		playitemurl(movie,10);
		</script>
		</onClick>
</item>	

<item>
<title>Nat Geo Adventure</title>
<onClick>
	<script>
		movie = "http://127.0.0.1/cgi-bin/translate?stream,Rtmp-options:-b%2060000%20-W%20http://www.futubox.com/donottouch/fpv3.39.swf%20-y%20z050249.stream%20-p%20http://futubox.com/,rtmp://" + server + ".webport.tv/live?sid=" + sid;
		playitemurl(movie,10);
		</script>
		</onClick>
</item>	

<!-- item>
<title>Discovery Showcase HD</title>
<onClick>
	<script>
		movie = "http://127.0.0.1/cgi-bin/translate?stream,Rtmp-options:-b%2060000%20-W%20http://www.futubox.com/donottouch/fpv3.39.swf%20-y%20z050002.stream%20-p%20http://futubox.com/,rtmp://" + server + ".webport.tv/live?sid=" + sid;
		playitemurl(movie,10);
		</script>
		</onClick>
</item -->
	
<item>
<title>Animal Planet HD</title>
<onClick>
	<script>
		movie = "http://127.0.0.1/cgi-bin/translate?stream,Rtmp-options:-b%2060000%20-W%20http://www.futubox.com/donottouch/fpv3.39.swf%20-y%20z050001.stream%20-p%20http://futubox.com/,rtmp://" + server + ".webport.tv/live?sid=" + sid;
		playitemurl(movie,10);
		</script>
		</onClick>
</item>	

<item>
<title>History HD</title>
<onClick>
	<script>
		movie = "http://127.0.0.1/cgi-bin/translate?stream,Rtmp-options:-b%2060000%20-W%20http://www.futubox.com/donottouch/fpv3.39.swf%20-y%20z050003.stream%20-p%20http://futubox.com/,rtmp://" + server + ".webport.tv/live?sid=" + sid;
		playitemurl(movie,10);
		</script>
		</onClick>
</item>

<item>
<title>Bio HD</title>
<onClick>
	<script>
		movie = "http://127.0.0.1/cgi-bin/translate?stream,Rtmp-options:-b%2060000%20-W%20http://www.futubox.com/donottouch/fpv3.39.swf%20-y%20z020204.stream%20-p%20http://futubox.com/,rtmp://" + server + ".webport.tv/live?sid=" + sid;
		playitemurl(movie,10);
		</script>
		</onClick>
</item>	

<item>
<title>BBC HD</title>
<onClick>
	<script>
		movie = "http://127.0.0.1/cgi-bin/translate?stream,Rtmp-options:-b%2060000%20-W%20http://www.futubox.com/donottouch/fpv3.39.swf%20-y%20z010201.stream%20-p%20http://futubox.com/,rtmp://" + server + ".webport.tv/live?sid=" + sid;
		playitemurl(movie,10);
		</script>
		</onClick>
</item>

<item>
<title>CCTV News</title>
<onClick>
	<script>
		movie = "http://127.0.0.1/cgi-bin/translate?stream,Rtmp-options:-b%2060000%20-W%20http://www.futubox.com/donottouch/fpv3.39.swf%20-y%20z050222.stream%20-p%20http://futubox.com/,rtmp://" + server + ".webport.tv/live?sid=" + sid;
		playitemurl(movie,10);
		</script>
		</onClick>
</item>

<item>
<title>MTV Live HD</title>
<onClick>
	<script>
		movie = "http://127.0.0.1/cgi-bin/translate?stream,Rtmp-options:-b%2060000%20-W%20http://www.futubox.com/donottouch/fpv3.39.swf%20-y%20z010001.stream%20-p%20http://futubox.com/,rtmp://" + server + ".webport.tv/live?sid=" + sid;
		playitemurl(movie,10);
		</script>
		</onClick>
</item>

<item>
<title>AXN HD</title>
<onClick>
	<script>
		movie = "http://127.0.0.1/cgi-bin/translate?stream,Rtmp-options:-b%2060000%20-W%20http://www.futubox.com/donottouch/fpv3.39.swf%20-y%20z050245.stream%20-p%20http://futubox.com/,rtmp://" + server + ".webport.tv/live?sid=" + sid;
		playitemurl(movie,10);
		</script>
		</onClick>
</item>	

<!-- item>
<title>HBO HD</title>
<onClick>
	<script>
		movie = "http://127.0.0.1/cgi-bin/translate?stream,Rtmp-options:-b%2060000%20-W%20http://www.futubox.com/donottouch/fpv3.39.swf%20-y%20z110402.stream%20-p%20http://futubox.com/,rtmp://" + server + ".webport.tv/live?sid=" + sid;
		playitemurl(movie,10);
		</script>
		</onClick>
</item>

<item>
<title>HBO 2 HD</title>
<onClick>
	<script>
		movie = "http://127.0.0.1/cgi-bin/translate?stream,Rtmp-options:-b%2060000%20-W%20http://www.futubox.com/donottouch/fpv3.39.swf%20-y%20z010701.stream%20-p%20http://futubox.com/,rtmp://" + server + ".webport.tv/live?sid=" + sid;
		playitemurl(movie,10);
		</script>
		</onClick>
</item -->

<item>
<title>Comedy Central HD</title>
<onClick>
	<script>
		movie = "http://127.0.0.1/cgi-bin/translate?stream,Rtmp-options:-b%2060000%20-W%20http://www.futubox.com/donottouch/fpv3.39.swf%20-y%20z020503.stream%20-p%20http://futubox.com/,rtmp://" + server + ".webport.tv/live?sid=" + sid;
		playitemurl(movie,10);
		</script>
		</onClick>
</item>

<!-- item>
<title>Cinema Comedy HD</title>
<onClick>
	<script>
		movie = "http://127.0.0.1/cgi-bin/translate?stream,Rtmp-options:-b%2060000%20-W%20http://www.futubox.com/donottouch/fpv3.39.swf%20-y%20z050205.stream%20-p%20http://futubox.com/,rtmp://" + server + ".webport.tv/live?sid=" + sid;
		playitemurl(movie,10);
		</script>
		</onClick>
</item -->	

<item>
<title>Cinema Hits HD</title>
<onClick>
	<script>
		movie = "http://127.0.0.1/cgi-bin/translate?stream,Rtmp-options:-b%2060000%20-W%20http://www.futubox.com/donottouch/fpv3.39.swf%20-y%20z050211.stream%20-p%20http://futubox.com/,rtmp://" + server + ".webport.tv/live?sid=" + sid;
		playitemurl(movie,10);
		</script>
		</onClick>
</item>	

<item>
<title>Cinema Max HD</title>
<onClick>
	<script>
		movie = "http://127.0.0.1/cgi-bin/translate?stream,Rtmp-options:-b%2060000%20-W%20http://www.futubox.com/donottouch/fpv3.39.swf%20-y%20z050206.stream%20-p%20http://futubox.com/,rtmp://" + server + ".webport.tv/live?sid=" + sid;
		playitemurl(movie,10);
		</script>
		</onClick>
</item>	

<item>
<title>Cinemax HD</title>
<onClick>
	<script>
		movie = "http://127.0.0.1/cgi-bin/translate?stream,Rtmp-options:-b%2060000%20-W%20http://www.futubox.com/donottouch/fpv3.39.swf%20-y%20z050221.stream%20-p%20http://futubox.com/,rtmp://" + server + ".webport.tv/live?sid=" + sid;
		playitemurl(movie,10);
		</script>
		</onClick>
</item>

<!-- item>
<title>Cinemamax 2 HD</title>
<onClick>
	<script>
		movie = "http://127.0.0.1/cgi-bin/translate?stream,Rtmp-options:-b%2060000%20-W%20http://www.futubox.com/donottouch/fpv3.39.swf%20-y%20z010401.stream%20-p%20http://futubox.com/,rtmp://" + server + ".webport.tv/live?sid=" + sid;
		playitemurl(movie,10);
		</script>
		</onClick>
</item -->

<item>
<title>FOX HD</title>
<onClick>
	<script>
		movie = "http://127.0.0.1/cgi-bin/translate?stream,Rtmp-options:-b%2060000%20-W%20http://www.futubox.com/donottouch/fpv3.39.swf%20-y%20z050224.stream%20-p%20http://futubox.com/,rtmp://" + server + ".webport.tv/live?sid=" + sid;
		playitemurl(movie,10);
		</script>
		</onClick>
</item>	

<item>
<title>Syfy</title>
<onClick>
	<script>
		movie = "http://127.0.0.1/cgi-bin/translate?stream,Rtmp-options:-b%2060000%20-W%20http://www.futubox.com/donottouch/fpv3.39.swf%20-y%20z050241.stream%20-p%20http://futubox.com/,rtmp://" + server + ".webport.tv/live?sid=" + sid;
		playitemurl(movie,10);
		</script>
		</onClick>
</item>

<item>
<title>Disney XD HD</title>
<onClick>
	<script>
		movie = "http://127.0.0.1/cgi-bin/translate?stream,Rtmp-options:-b%2060000%20-W%20http://www.futubox.com/donottouch/fpv3.39.swf%20-y%20z020101.stream%20-p%20http://futubox.com/,rtmp://" + server + ".webport.tv/live?sid=" + sid;
		playitemurl(movie,10);
		</script>
		</onClick>
</item>

<!-- item>
<title>Nickelodeon HD</title>
<onClick>
	<script>
		movie = "http://127.0.0.1/cgi-bin/translate?stream,Rtmp-options:-b%2060000%20-W%20http://www.futubox.com/donottouch/fpv3.39.swf%20-y%20z050007.stream%20-p%20http://futubox.com/,rtmp://" + server + ".webport.tv/live?sid=" + sid;
		playitemurl(movie,10);
		</script>
		</onClick>
</item -->

<item>
<title>E4 HD</title>
<onClick>
	<script>
		movie = "http://127.0.0.1/cgi-bin/translate?stream,Rtmp-options:-b%2060000%20-W%20http://www.futubox.com/donottouch/fpv3.39.swf%20-y%20z150233.stream%20-p%20http://futubox.com/,rtmp://" + server + ".webport.tv/live?sid=" + sid;
		playitemurl(movie,10);
		</script>
		</onClick>
</item>	

<item>
<title>ITV2 HD</title>
<onClick>
	<script>
		movie = "http://127.0.0.1/cgi-bin/translate?stream,Rtmp-options:-b%2060000%20-W%20http://www.futubox.com/donottouch/fpv3.39.swf%20-y%20z020102.stream%20-p%20http://futubox.com/,rtmp://" + server + ".webport.tv/live?sid=" + sid;
		playitemurl(movie,10);
		</script>
		</onClick>
</item>

<item>
<title>ITV3 HD</title>
<onClick>
	<script>
		movie = "http://127.0.0.1/cgi-bin/translate?stream,Rtmp-options:-b%2060000%20-W%20http://www.futubox.com/donottouch/fpv3.39.swf%20-y%20z020103.stream%20-p%20http://futubox.com/,rtmp://" + server + ".webport.tv/live?sid=" + sid;
		playitemurl(movie,10);
		</script>
		</onClick>
</item>

<item>
<title>MGM HD</title>
<onClick>
	<script>
		movie = "http://127.0.0.1/cgi-bin/translate?stream,Rtmp-options:-b%2060000%20-W%20http://www.futubox.com/donottouch/fpv3.39.swf%20-y%20z020401.stream%20-p%20http://futubox.com/,rtmp://" + server + ".webport.tv/live?sid=" + sid;
		playitemurl(movie,10);
		</script>
		</onClick>
</item>

<item>
<title>Sky Cinema 1 HD</title>
<onClick>
	<script>
		movie = "http://127.0.0.1/cgi-bin/translate?stream,Rtmp-options:-b%2060000%20-W%20http://www.futubox.com/donottouch/fpv3.39.swf%20-y%20z050207.stream%20-p%20http://futubox.com/,rtmp://" + server + ".webport.tv/live?sid=" + sid;
		playitemurl(movie,10);
		</script>
		</onClick>
</item>	

<item>
<title>Sky Cinema Family HD</title>
<onClick>
	<script>
		movie = "http://127.0.0.1/cgi-bin/translate?stream,Rtmp-options:-b%2060000%20-W%20http://www.futubox.com/donottouch/fpv3.39.swf%20-y%20z150244.stream%20-p%20http://futubox.com/,rtmp://" + server + ".webport.tv/live?sid=" + sid;
		playitemurl(movie,10);
		</script>
		</onClick>
</item>	

<item>
<title>Sky Cinema Passion HD</title>
<onClick>
	<script>
		movie = "http://127.0.0.1/cgi-bin/translate?stream,Rtmp-options:-b%2060000%20-W%20http://www.futubox.com/donottouch/fpv3.39.swf%20-y%20z150243.stream%20-p%20http://futubox.com/,rtmp://" + server + ".webport.tv/live?sid=" + sid;
		playitemurl(movie,10);
		</script>
		</onClick>
</item>	

<item>
<title>Sky Arts</title>
<onClick>
	<script>
		movie = "http://127.0.0.1/cgi-bin/translate?stream,Rtmp-options:-b%2060000%20-W%20http://www.futubox.com/donottouch/fpv3.39.swf%20-y%20z150242.stream%20-p%20http://futubox.com/,rtmp://" + server + ".webport.tv/live?sid=" + sid;
		playitemurl(movie,10);
		</script>
		</onClick>
</item>	

<item>
<title>Sky News HD</title>
<onClick>
	<script>
		movie = "http://127.0.0.1/cgi-bin/translate?stream,Rtmp-options:-b%2060000%20-W%20http://www.futubox.com/donottouch/fpv3.39.swf%20-y%20z050227.stream%20-p%20http://futubox.com/,rtmp://" + server + ".webport.tv/live?sid=" + sid;
		playitemurl(movie,10);
		</script>
		</onClick>
</item>	

<item>
<title>Sky Sports 1</title>
<onClick>
	<script>
		movie = "http://127.0.0.1/cgi-bin/translate?stream,Rtmp-options:-b%2060000%20-W%20http://www.futubox.com/donottouch/fpv3.39.swf%20-y%20z050226.stream%20-p%20http://futubox.com/,rtmp://" + server + ".webport.tv/live?sid=" + sid;
		playitemurl(movie,10);
		</script>
		</onClick>
</item>	

<item>
<title>Sky Movies Comedy</title>
<onClick>
	<script>
		movie = "http://127.0.0.1/cgi-bin/translate?stream,Rtmp-options:-b%2060000%20-W%20http://www.futubox.com/donottouch/fpv3.39.swf%20-y%20z050231.stream%20-p%20http://futubox.com/,rtmp://" + server + ".webport.tv/live?sid=" + sid;
		playitemurl(movie,10);
		</script>
		</onClick>
</item>	

<item>
<title>Sky Movies Family</title>
<onClick>
	<script>
		movie = "http://127.0.0.1/cgi-bin/translate?stream,Rtmp-options:-b%2060000%20-W%20http://www.futubox.com/donottouch/fpv3.39.swf%20-y%20z050234.stream%20-p%20http://futubox.com/,rtmp://" + server + ".webport.tv/live?sid=" + sid;
		playitemurl(movie,10);
		</script>
		</onClick>
</item>	

<item>
<title>Sky Movies Modern Greats</title>
<onClick>
	<script>
		movie = "http://127.0.0.1/cgi-bin/translate?stream,Rtmp-options:-b%2060000%20-W%20http://www.futubox.com/donottouch/fpv3.39.swf%20-y%20z150228.stream%20-p%20http://futubox.com/,rtmp://" + server + ".webport.tv/live?sid=" + sid;
		playitemurl(movie,10);
		</script>
		</onClick>
</item>	

<item>
<title>Sky Movies Drama and Romance</title>
<onClick>
	<script>
		movie = "http://127.0.0.1/cgi-bin/translate?stream,Rtmp-options:-b%2060000%20-W%20http://www.futubox.com/donottouch/fpv3.39.swf%20-y%20z050229.stream%20-p%20http://futubox.com/,rtmp://" + server + ".webport.tv/live?sid=" + sid;
		playitemurl(movie,10);
		</script>
		</onClick>
</item>	

<item>
<title>Sky Movies Action and Adventure</title>
<onClick>
	<script>
		movie = "http://127.0.0.1/cgi-bin/translate?stream,Rtmp-options:-b%2060000%20-W%20http://www.futubox.com/donottouch/fpv3.39.swf%20-y%20z050237.stream%20-p%20http://futubox.com/,rtmp://" + server + ".webport.tv/live?sid=" + sid;
		playitemurl(movie,10);
		</script>
		</onClick>
</item>	

<item>
<title>Sky Movies SCI-FI and Horror</title>
<onClick>
	<script>
		movie = "http://127.0.0.1/cgi-bin/translate?stream,Rtmp-options:-b%2060000%20-W%20http://www.futubox.com/donottouch/fpv3.39.swf%20-y%20z050230.stream%20-p%20http://futubox.com/,rtmp://" + server + ".webport.tv/live?sid=" + sid;
		playitemurl(movie,10);
		</script>
		</onClick>
</item>	

<item>
<title>Sky Movies Crime and Thriller</title>
<onClick>
	<script>
		movie = "http://127.0.0.1/cgi-bin/translate?stream,Rtmp-options:-b%2060000%20-W%20http://www.futubox.com/donottouch/fpv3.39.swf%20-y%20z150236.stream%20-p%20http://futubox.com/,rtmp://" + server + ".webport.tv/live?sid=" + sid;
		playitemurl(movie,10);
		</script>
		</onClick>
</item>	

<!-- Germany -->
<item>
<title>Sport1 HD</title>
<onClick>
	<script>
		movie = "http://127.0.0.1/cgi-bin/translate?stream,Rtmp-options:-b%2060000%20-W%20http://www.futubox.com/donottouch/fpv3.39.swf%20-y%20z030103.stream%20-p%20http://futubox.com/,rtmp://" + server + ".webport.tv/live?sid=" + sid;
		playitemurl(movie,10);
		</script>
		</onClick>
</item>

<item>
<title>Das Erste HD</title>
<onClick>
	<script>
		movie = "http://127.0.0.1/cgi-bin/translate?stream,Rtmp-options:-b%2060000%20-W%20http://www.futubox.com/donottouch/fpv3.39.swf%20-y%20z030402.stream%20-p%20http://futubox.com/,rtmp://" + server + ".webport.tv/live?sid=" + sid;
		playitemurl(movie,10);
		</script>
		</onClick>
</item>

<item>
<title>ZDF HD</title>
<onClick>
	<script>
		movie = "http://127.0.0.1/cgi-bin/translate?stream,Rtmp-options:-b%2060000%20-W%20http://www.futubox.com/donottouch/fpv3.39.swf%20-y%20z030401.stream%20-p%20http://futubox.com/,rtmp://" + server + ".webport.tv/live?sid=" + sid;
		playitemurl(movie,10);
		</script>
		</onClick>
</item>

<item>
<title>N24 HD</title>
<onClick>
	<script>
		movie = "http://127.0.0.1/cgi-bin/translate?stream,Rtmp-options:-b%2060000%20-W%20http://www.futubox.com/donottouch/fpv3.39.swf%20-y%20z050008.stream%20-p%20http://futubox.com/,rtmp://" + server + ".webport.tv/live?sid=" + sid;
		playitemurl(movie,10);
		</script>
		</onClick>
</item>

<item>
<title>Kabel Eins</title>
<onClick>
	<script>
		movie = "http://127.0.0.1/cgi-bin/translate?stream,Rtmp-options:-b%2060000%20-W%20http://www.futubox.com/donottouch/fpv3.39.swf%20-y%20z110103.stream%20-p%20http://futubox.com/,rtmp://" + server + ".webport.tv/live?sid=" + sid;
		playitemurl(movie,10);
		</script>
		</onClick>
</item>

<item>
<title>PRO7 HD</title>
<onClick>
	<script>
		movie = "http://127.0.0.1/cgi-bin/translate?stream,Rtmp-options:-b%2060000%20-W%20http://www.futubox.com/donottouch/fpv3.39.swf%20-y%20z010102.stream%20-p%20http://futubox.com/,rtmp://" + server + ".webport.tv/live?sid=" + sid;
		playitemurl(movie,10);
		</script>
		</onClick>
</item>

<item>
<title>RTL HD</title>
<onClick>
	<script>
		movie = "http://127.0.0.1/cgi-bin/translate?stream,Rtmp-options:-b%2060000%20-W%20http://www.futubox.com/donottouch/fpv3.39.swf%20-y%20z030101.stream%20-p%20http://futubox.com/,rtmp://" + server + ".webport.tv/live?sid=" + sid;
		playitemurl(movie,10);
		</script>
		</onClick>
</item>

<item>
<title>RTL2 HD</title>
<onClick>
	<script>
		movie = "http://127.0.0.1/cgi-bin/translate?stream,Rtmp-options:-b%2060000%20-W%20http://www.futubox.com/donottouch/fpv3.39.swf%20-y%20z030104.stream%20-p%20http://futubox.com/,rtmp://" + server + ".webport.tv/live?sid=" + sid;
		playitemurl(movie,10);
		</script>
		</onClick>
</item>

<!-- item>
<title>RTL2 HD</title>
<onClick>
	<script>
		movie = "http://127.0.0.1/cgi-bin/translate?stream,Rtmp-options:-b%2060000%20-W%20http://www.futubox.com/donottouch/fpv3.39.swf%20-y%20z050219.stream%20-p%20http://futubox.com/,rtmp://" + server + ".webport.tv/live?sid=" + sid;
		playitemurl(movie,10);
		</script>
		</onClick>
</item -->

<item>
<title>Sat1 HD</title>
<onClick>
	<script>
		movie = "http://127.0.0.1/cgi-bin/translate?stream,Rtmp-options:-b%2060000%20-W%20http://www.futubox.com/donottouch/fpv3.39.swf%20-y%20z010101.stream%20-p%20http://futubox.com/,rtmp://" + server + ".webport.tv/live?sid=" + sid;
		playitemurl(movie,10);
		</script>
		</onClick>
</item>

<item>
<title>SIXX HD</title>
<onClick>
	<script>
		movie = "http://127.0.0.1/cgi-bin/translate?stream,Rtmp-options:-b%2060000%20-W%20http://www.futubox.com/donottouch/fpv3.39.swf%20-y%20z010104.stream%20-p%20http://futubox.com/,rtmp://" + server + ".webport.tv/live?sid=" + sid;
		playitemurl(movie,10);
		</script>
		</onClick>
</item>

<!-- item>
<title>Vox HD</title>
<onClick><script>movie = "http://127.0.0.1/cgi-bin/translate?stream,Rtmp-options:-b%2060000%20-W%20http://www.futubox.com/donottouch/fpv3.39.swf%20-y%20z030102.stream%20-p%20http://futubox.com/,rtmp://" + server + ".webport.tv/live?sid=" + sid;
</script></onClick>
</item -->

<item>
<title>Vox HD</title>
<onClick>
	<script>
		movie = "http://127.0.0.1/cgi-bin/translate?stream,Rtmp-options:-b%2060000%20-W%20http://www.futubox.com/donottouch/fpv3.39.swf%20-y%20z050220.stream%20-p%20http://futubox.com/,rtmp://" + server + ".webport.tv/live?sid=" + sid;
		playitemurl(movie,10);
		</script>
		</onClick>
</item>

<item>
<title>Arte HD</title>
<onClick>
	<script>
		movie = "http://127.0.0.1/cgi-bin/translate?stream,Rtmp-options:-b%2060000%20-W%20http://www.futubox.com/donottouch/fpv3.39.swf%20-y%20z050218.stream%20-p%20http://futubox.com/,rtmp://" + server + ".webport.tv/live?sid=" + sid;
		playitemurl(movie,10);
		</script>
		</onClick>
</item>

<!-- France -->
<item>
<title>W9</title>
<onClick>
	<script>
		movie = "http://127.0.0.1/cgi-bin/translate?stream,Rtmp-options:-b%2060000%20-W%20http://www.futubox.com/donottouch/fpv3.39.swf%20-y%20z010108.stream%20-p%20http://futubox.com/,rtmp://" + server + ".webport.tv/live?sid=" + sid;
		playitemurl(movie,10);
		</script>
		</onClick>
</item>

<item>
<title>France 24</title>
<onClick>
	<script>
		movie = "http://127.0.0.1/cgi-bin/translate?stream,Rtmp-options:-b%2060000%20-W%20http://www.futubox.com/donottouch/fpv3.39.swf%20-y%20z050213.stream%20-p%20http://futubox.com/,rtmp://" + server + ".webport.tv/live?sid=" + sid;
		playitemurl(movie,10);
		</script>
		</onClick>
</item>

<item>
<title>FT1 HD</title>
<onClick>
	<script>
		movie = "http://127.0.0.1/cgi-bin/translate?stream,Rtmp-options:-b%2060000%20-W%20http://www.futubox.com/donottouch/fpv3.39.swf%20-y%20z010107.stream%20-p%20http://futubox.com/,rtmp://" + server + ".webport.tv/live?sid=" + sid;
		playitemurl(movie,10);
		</script>
		</onClick>
</item>	

<item>
<title>France 2 HD</title>
<onClick>
	<script>
		movie = "http://127.0.0.1/cgi-bin/translate?stream,Rtmp-options:-b%2060000%20-W%20http://www.futubox.com/donottouch/fpv3.39.swf%20-y%20z010105.stream%20-p%20http://futubox.com/,rtmp://" + server + ".webport.tv/live?sid=" + sid;
		playitemurl(movie,10);
		</script>
		</onClick>
</item>	

<item>
<title>France 3 HD</title>
<onClick>
	<script>
		movie = "http://127.0.0.1/cgi-bin/translate?stream,Rtmp-options:-b%2060000%20-W%20http://www.futubox.com/donottouch/fpv3.39.swf%20-y%20z010111.stream%20-p%20http://futubox.com/,rtmp://" + server + ".webport.tv/live?sid=" + sid;
		playitemurl(movie,10);
		</script>
		</onClick>
</item>	

<item>
<title>France 4 HD</title>
<onClick>
	<script>
		movie = "http://127.0.0.1/cgi-bin/translate?stream,Rtmp-options:-b%2060000%20-W%20http://www.futubox.com/donottouch/fpv3.39.swf%20-y%20z010112.stream%20-p%20http://futubox.com/,rtmp://" + server + ".webport.tv/live?sid=" + sid;
		playitemurl(movie,10);
		</script>
		</onClick>
</item>	

<item>
<title>France 5 HD</title>
<onClick>
	<script>
		movie = "http://127.0.0.1/cgi-bin/translate?stream,Rtmp-options:-b%2060000%20-W%20http://www.futubox.com/donottouch/fpv3.39.swf%20-y%20z010113.stream%20-p%20http://futubox.com/,rtmp://" + server + ".webport.tv/live?sid=" + sid;
		playitemurl(movie,10);
		</script>
		</onClick>
</item>	

<item>
<title>M6 HD</title>
<onClick>
	<script>
		movie = "http://127.0.0.1/cgi-bin/translate?stream,Rtmp-options:-b%2060000%20-W%20http://www.futubox.com/donottouch/fpv3.39.swf%20-y%20z010106.stream%20-p%20http://futubox.com/,rtmp://" + server + ".webport.tv/live?sid=" + sid;
		playitemurl(movie,10);
		</script>
		</onClick>
</item>	

<!-- Italy -->
<item>
<title>Discovery HD IT</title>
<onClick>
	<script>
		movie = "http://127.0.0.1/cgi-bin/translate?stream,Rtmp-options:-b%2060000%20-W%20http://www.futubox.com/donottouch/fpv3.39.swf%20-y%20z050208.stream%20-p%20http://futubox.com/,rtmp://" + server + ".webport.tv/live?sid=" + sid;
		playitemurl(movie,10);
		</script>
		</onClick>
</item>	

<item>
<title>Nat Geo HD IT</title>
<onClick>
	<script>
		movie = "http://127.0.0.1/cgi-bin/translate?stream,Rtmp-options:-b%2060000%20-W%20http://www.futubox.com/donottouch/fpv3.39.swf%20-y%20z150223.stream%20-p%20http://futubox.com/,rtmp://" + server + ".webport.tv/live?sid=" + sid;
		playitemurl(movie,10);
		</script>
		</onClick>
</item>	

<item>
<title>History HD IT</title>
<onClick>
	<script>
		movie = "http://127.0.0.1/cgi-bin/translate?stream,Rtmp-options:-b%2060000%20-W%20http://www.futubox.com/donottouch/fpv3.39.swf%20-y%20z050248.stream%20-p%20http://futubox.com/,rtmp://" + server + ".webport.tv/live?sid=" + sid;
		playitemurl(movie,10);
		</script>
		</onClick>
</item>

<item>
<title>Bio HD IT</title>
<onClick>
	<script>
		movie = "http://127.0.0.1/cgi-bin/translate?stream,Rtmp-options:-b%2060000%20-W%20http://www.futubox.com/donottouch/fpv3.39.swf%20-y%20z050239.stream%20-p%20http://futubox.com/,rtmp://" + server + ".webport.tv/live?sid=" + sid;
		playitemurl(movie,10);
		</script>
		</onClick>
</item>	

<item>
<title>Rai News</title>
<onClick>
	<script>
		movie = "http://127.0.0.1/cgi-bin/translate?stream,Rtmp-options:-b%2060000%20-W%20http://www.futubox.com/donottouch/fpv3.39.swf%20-y%20z050217.stream%20-p%20http://futubox.com/,rtmp://" + server + ".webport.tv/live?sid=" + sid;
		playitemurl(movie,10);
		</script>
		</onClick>
</item>

<item>
<title>Rai 1</title>
<onClick>
	<script>
		movie = "http://127.0.0.1/cgi-bin/translate?stream,Rtmp-options:-b%2060000%20-W%20http://www.futubox.com/donottouch/fpv3.39.swf%20-y%20z050214.stream%20-p%20http://futubox.com/,rtmp://" + server + ".webport.tv/live?sid=" + sid;
		playitemurl(movie,10);
		</script>
		</onClick>
</item>

<item>
<title>Rai 2</title>
<onClick>
	<script>
		movie = "http://127.0.0.1/cgi-bin/translate?stream,Rtmp-options:-b%2060000%20-W%20http://www.futubox.com/donottouch/fpv3.39.swf%20-y%20z050215.stream%20-p%20http://futubox.com/,rtmp://" + server + ".webport.tv/live?sid=" + sid;
		playitemurl(movie,10);
		</script>
		</onClick>
</item>

<item>
<title>Italia 1</title>
<onClick>
	<script>
		movie = "http://127.0.0.1/cgi-bin/translate?stream,Rtmp-options:-b%2060000%20-W%20http://www.futubox.com/donottouch/fpv3.39.swf%20-y%20z010501.stream%20-p%20http://futubox.com/,rtmp://" + server + ".webport.tv/live?sid=" + sid;
		playitemurl(movie,10);
		</script>
		</onClick>
</item>	

<item>
<title>Canale 5</title>
<onClick>
	<script>
		movie = "http://127.0.0.1/cgi-bin/translate?stream,Rtmp-options:-b%2060000%20-W%20http://www.futubox.com/donottouch/fpv3.39.swf%20-y%20z010502.stream%20-p%20http://futubox.com/,rtmp://" + server + ".webport.tv/live?sid=" + sid;
		playitemurl(movie,10);
		</script>
		</onClick>
</item>	

<item>
<title>Rai Movie</title>
<onClick>
	<script>
		movie = "http://127.0.0.1/cgi-bin/translate?stream,Rtmp-options:-b%2060000%20-W%20http://www.futubox.com/donottouch/fpv3.39.swf%20-y%20z050216.stream%20-p%20http://futubox.com/,rtmp://" + server + ".webport.tv/live?sid=" + sid;
		playitemurl(movie,10);
		</script>
		</onClick>
</item>

<item>
<title>FOX HD IT</title>
<onClick>
	<script>
		movie = "http://127.0.0.1/cgi-bin/translate?stream,Rtmp-options:-b%2060000%20-W%20http://www.futubox.com/donottouch/fpv3.39.swf%20-y%20z050210.stream%20-p%20http://futubox.com/,rtmp://" + server + ".webport.tv/live?sid=" + sid;
		playitemurl(movie,10);
		</script>
		</onClick>
</item>	

<item>
<title>FOX Life HD</title>
<onClick>
	<script>
		movie = "http://127.0.0.1/cgi-bin/translate?stream,Rtmp-options:-b%2060000%20-W%20http://www.futubox.com/donottouch/fpv3.39.swf%20-y%20z050247.stream%20-p%20http://futubox.com/,rtmp://" + server + ".webport.tv/live?sid=" + sid;
		playitemurl(movie,10);
		</script>
		</onClick>
</item>	

<item>
<title>Fox Crime HD</title>
<onClick>
	<script>
		movie = "http://127.0.0.1/cgi-bin/translate?stream,Rtmp-options:-b%2060000%20-W%20http://www.futubox.com/donottouch/fpv3.39.swf%20-y%20z050209.stream%20-p%20http://futubox.com/,rtmp://" + server + ".webport.tv/live?sid=" + sid;
		playitemurl(movie,10);
		</script>
		</onClick>
</item>	

<item>
<title>Gambero Rosso</title>
<onClick>
	<script>
		movie = "http://127.0.0.1/cgi-bin/translate?stream,Rtmp-options:-b%2060000%20-W%20http://www.futubox.com/donottouch/fpv3.39.swf%20-y%20z050246.stream%20-p%20http://futubox.com/,rtmp://" + server + ".webport.tv/live?sid=" + sid;
		playitemurl(movie,10);
		</script>
		</onClick>
</item>

<!-- Rusia -->
<!--
<item>
<title>CTC</title>
<onClick>
	<script>
		movie = "http://127.0.0.1/cgi-bin/translate?stream,Rtmp-options:-b%2060000%20-W%20http://www.futubox.com/donottouch/fpv3.39.swf%20-y%20z040003.stream%20-p%20http://futubox.com/,rtmp://" + server + ".webport.tv/live?sid=" + sid;
		playitemurl(movie,10);
		</script>
		</onClick>
</item>	

<item>
<title>THT</title>
<onClick>
	<script>
		movie = "http://127.0.0.1/cgi-bin/translate?stream,Rtmp-options:-b%2060000%20-W%20http://www.futubox.com/donottouch/fpv3.39.swf%20-y%20z040004.stream%20-p%20http://futubox.com/,rtmp://" + server + ".webport.tv/live?sid=" + sid;
		playitemurl(movie,10);
		</script>
		</onClick>
</item>	

<item>
<title>HTB</title>
<onClick>
	<script>
		movie = "http://127.0.0.1/cgi-bin/translate?stream,Rtmp-options:-b%2060000%20-W%20http://www.futubox.com/donottouch/fpv3.39.swf%20-y%20z040001.stream%20-p%20http://futubox.com/,rtmp://" + server + ".webport.tv/live?sid=" + sid;
		playitemurl(movie,10);
		</script>
		</onClick>
</item>	

<item>
<title>Channel One</title>
<onClick>
	<script>
		movie = "http://127.0.0.1/cgi-bin/translate?stream,Rtmp-options:-b%2060000%20-W%20http://www.futubox.com/donottouch/fpv3.39.swf%20-y%20z040002.stream%20-p%20http://futubox.com/,rtmp://" + server + ".webport.tv/live?sid=" + sid;
		playitemurl(movie,10);
		</script>
		</onClick>
</item>	
-->

<!-- Adult -->

<item>
<title>Redlight HD</title>
<onClick>
	<script>
		movie = "http://127.0.0.1/cgi-bin/translate?stream,Rtmp-options:-b%2060000%20-W%20http://www.futubox.com/donottouch/fpv3.39.swf%20-y%20z990101.stream%20-p%20http://futubox.com/,rtmp://" + server + ".webport.tv/live?sid=" + sid;
		playitemurl(movie,10);
		</script>
		</onClick>
</item>	

<item>
<title>HustlerTV HD</title>
<onClick>
	<script>
		movie = "http://127.0.0.1/cgi-bin/translate?stream,Rtmp-options:-b%2060000%20-W%20http://www.futubox.com/donottouch/fpv3.39.swf%20-y%20z990102.stream%20-p%20http://futubox.com/,rtmp://" + server + ".webport.tv/live?sid=" + sid;
		playitemurl(movie,10);
		</script>
		</onClick>
</item>	

<item>
<title>Penthouse HD</title>
<onClick>
	<script>
		movie = "http://127.0.0.1/cgi-bin/translate?stream,Rtmp-options:-b%2060000%20-W%20http://www.futubox.com/donottouch/fpv3.39.swf%20-y%20z990103.stream%20-p%20http://futubox.com/,rtmp://" + server + ".webport.tv/live?sid=" + sid;
		playitemurl(movie,10);
		</script>
		</onClick>
</item>	

<item>
<title>Penthouse 2 HD</title>
<onClick>
	<script>
		movie = "http://127.0.0.1/cgi-bin/translate?stream,Rtmp-options:-b%2060000%20-W%20http://www.futubox.com/donottouch/fpv3.39.swf%20-y%20z990104.stream%20-p%20http://futubox.com/,rtmp://" + server + ".webport.tv/live?sid=" + sid;
		playitemurl(movie,10);
		</script>
		</onClick>
</item>	

</channel>
</rss>
