#!/usr/local/bin/Resource/www/cgi-bin/php
<?php echo "<?xml version='1.0' encoding='UTF8' ?>";
error_reporting(0);
$host = "http://127.0.0.1/cgi-bin";
?>
<rss version="2.0">
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
	itemWidthPC="30"
	itemHeightPC="8"
	capXPC="8"
	capYPC="25"
	capWidthPC="30"
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

  	<text redraw="yes" offsetXPC="85" offsetYPC="12" widthPC="10" heightPC="6" fontSize="20" backgroundColor="10:105:150" foregroundColor="60:160:205">
		  <script>sprintf("%s / ", focus-(-1))+itemCount;</script>
		</text>
		<text align="left" redraw="yes"
          lines="12" fontSize=15
		      offsetXPC=40 offsetYPC=40 widthPC=55 heightPC=48
		      backgroundColor=0:0:0 foregroundColor=200:200:200>
			<script>print(annotation); annotation;</script>
		</text>
		<image  redraw="yes" offsetXPC=52 offsetYPC=20 widthPC=25 heightPC=25>
  /usr/local/etc/www/cgi-bin/scripts/tv/image/onehd.png
		</image>
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
					  location = "http://127.0.0.1/cgi-bin/scripts/tv/php/ph_prog.php?file=" + getItemInfo(idx, "location");
					  annotation = getURL(location);
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
      majorContext = getPageInfo("majorContext");
      
      print("*** majorContext=",majorContext);
      print("*** userInput=",userInput);
      
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
	<title>OneHD (Time is GMT+2)</title>
	<menu>main menu</menu>

<item>
<title>OneHD - Live! Concert</title>
<location>http://live.1hd.ro/displaygrila2.php</location>
<onClick>playItemURL("http://127.0.0.1/cgi-bin/scripts/util/swiss.cgi?rtmp://93.114.43.3:1935/live/onehd", 10);</onClick>
<media:thumbnail url="/usr/local/etc/www/cgi-bin/scripts/tv/image/onehd.png" />
</item>

<item>
<title>OneHD - Live! Jazz</title>
<location>http://live.1hd.ro/displaygrila2j.php</location>
<onClick>playItemURL("http://127.0.0.1/cgi-bin/scripts/util/swiss.cgi?rtmp://93.114.43.3:1935/live/jazz", 10);</onClick>
<media:thumbnail url="/usr/local/etc/www/cgi-bin/scripts/tv/image/onehd.png" />
</item>

<item>
<title>OneHD - Live! Classics</title>
<location>http://live.1hd.ro/displaygrila2c.php</location>
<onClick>playItemURL("http://127.0.0.1/cgi-bin/scripts/util/swiss.cgi?rtmp://93.114.43.3:1935/live/classics", 10);</onClick>
<media:thumbnail url="/usr/local/etc/www/cgi-bin/scripts/tv/image/onehd.png" />
</item>

<item>
<title>OneHD - Live! Dance</title>
<location>http://live.1hd.ro/displaygrila2d.php</location>
<onClick>playItemURL("http://127.0.0.1/cgi-bin/scripts/util/swiss.cgi?rtmp://93.114.43.3:1935/live/dance", 10);</onClick>
<media:thumbnail url="/usr/local/etc/www/cgi-bin/scripts/tv/image/onehd.png" />
</item>

<item>
<title>OneHD - Live! Rock</title>
<location>http://live.1hd.ro/displaygrila2r.php</location>
<onClick>playItemURL("http://127.0.0.1/cgi-bin/scripts/util/swiss.cgi?rtmp://93.114.43.3:1935/live/rock", 10);</onClick>
<media:thumbnail url="/usr/local/etc/www/cgi-bin/scripts/tv/image/onehd.png" />
</item>

<item>
<title>OneHD - Live! Pop</title>
<location>http://live.1hd.ro/displaygrila2p.php</location>
<onClick>playItemURL("http://127.0.0.1/cgi-bin/scripts/util/swiss.cgi?rtmp://93.114.43.3:1935/live/pop", 10);</onClick>
<media:thumbnail url="/usr/local/etc/www/cgi-bin/scripts/tv/image/onehd.png" />
</item>

</channel>
</rss>
