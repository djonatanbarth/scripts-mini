#!/usr/local/bin/Resource/www/cgi-bin/php
<?php echo "<?xml version='1.0' encoding='UTF8' ?>";
error_reporting(0);
$host = "http://127.0.0.1/cgi-bin";
function str_between($string, $start, $end){
	$string = " ".$string; $ini = strpos($string,$start);
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini;
	return substr($string,$ini,$len);
}
$l="http://www.livehd.tv";
$h=file_get_contents($l);
$token=str_between($h,"token':'","'");
$url="http://127.0.0.1/cgi-bin/scripts/util/translate.cgi?stream,Rtmp-options:-T%20".$token."%20-l%202%20-a%20live%20-W%20http://www.livehd.tv/player/player.swf%20-p%20http://www.livehd.tv";
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
          lines="20" fontSize=15
		      offsetXPC=40 offsetYPC=25 widthPC=60 heightPC=75
		      backgroundColor=0:0:0 foregroundColor=200:200:200>
			<script>print(annotation); annotation;</script>
		</text>
		<!--
		<image  redraw="yes" offsetXPC=52 offsetYPC=20 widthPC=25 heightPC=25>
  /usr/local/etc/www/cgi-bin/scripts/tv/image/onehd.png
		</image>
		-->
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
	<title>OneHD</title>
	<menu>main menu</menu>

<item>
<title>OneHD - Live! Mix</title>
<location>0</location>
<onClick>
<script>
url1="<?php echo $url; ?>" + "%20-y%20onehd,rtmpe://93.114.43.3:1935/live";
playItemURL(url1, 10);
</script>
</onClick>
<media:thumbnail url="/usr/local/etc/www/cgi-bin/scripts/tv/image/onehd.png" />
</item>

<item>
<title>OneHD - Live! Jazz</title>
<location>1</location>
<onClick>
<script>
url1="<?php echo $url; ?>" + "%20-y%20jazz,rtmpe://93.114.43.3:1935/live";
playItemURL(url1, 10);
</script>
</onClick>
<media:thumbnail url="/usr/local/etc/www/cgi-bin/scripts/tv/image/onehd.png" />
</item>

<item>
<title>OneHD - Live! Classics</title>
<location>2</location>
<onClick>
<script>
url1="<?php echo $url; ?>" + "%20-y%20classics,rtmpe://93.114.43.3:1935/live";
playItemURL(url1, 10);
</script>
</onClick>
<media:thumbnail url="/usr/local/etc/www/cgi-bin/scripts/tv/image/onehd.png" />
</item>


<item>
<title>OneHD - Live! Rock</title>
<location>3</location>
<onClick>
<script>
url1="<?php echo $url; ?>" + "%20-y%20rock,rtmpe://93.114.43.3:1935/live";
playItemURL(url1, 10);
</script>
</onClick>
<media:thumbnail url="/usr/local/etc/www/cgi-bin/scripts/tv/image/onehd.png" />
</item>

<item>
<title>OneHD - Live! Pop</title>
<location>4</location>
<onClick>
<script>
url1="<?php echo $url; ?>" + "%20-y%20pop,rtmpe://93.114.43.3:1935/live";
playItemURL(url1, 10);
</script>
</onClick>
<media:thumbnail url="/usr/local/etc/www/cgi-bin/scripts/tv/image/onehd.png" />
</item>

<item>
<title>OneHD - Live! Dance</title>
<location>5</location>
<onClick>
<script>
url1="<?php echo $url; ?>" + "%20-y%20dance,rtmpe://93.114.43.3:1935/live";
playItemURL(url1, 10);
</script>
</onClick>
<media:thumbnail url="/usr/local/etc/www/cgi-bin/scripts/tv/image/onehd.png" />
</item>

<!--
<item>
<title>Divertisment</title>
<location></location>
<link><?php echo $host; ?>/scripts/tv/php/prahova.php?cat=Divertisment</link>
<media:thumbnail url="/usr/local/etc/www/cgi-bin/scripts/tv/image/onehd.png" />
</item>

<item>
<title>Documentare</title>
<location></location>
<link><?php echo $host; ?>/scripts/tv/php/prahova.php?cat=Documentare</link>
<media:thumbnail url="/usr/local/etc/www/cgi-bin/scripts/tv/image/onehd.png" />
</item>

<item>
<title>Emisiuni</title>
<location></location>
<link><?php echo $host; ?>/scripts/tv/php/prahova.php?cat=Emisiuni</link>
<media:thumbnail url="/usr/local/etc/www/cgi-bin/scripts/tv/image/onehd.png" />
</item>

<item>
<title>Business</title>
<location></location>
<link><?php echo $host; ?>/scripts/tv/php/prahova.php?cat=Business</link>
<media:thumbnail url="/usr/local/etc/www/cgi-bin/scripts/tv/image/onehd.png" />
</item>
-->
</channel>
</rss>
