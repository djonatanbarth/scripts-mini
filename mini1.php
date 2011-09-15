#!/usr/local/bin/Resource/www/cgi-bin/php
<?php echo "<?xml version='1.0' encoding='UTF8' ?>";
$host = "http://127.0.0.1/cgi-bin";
$p=$_SERVER['SCRIPT_FILENAME'];
$script_directory = substr($p, 0, strrpos($p, '/'));
$check_file=$script_directory."/filme/peteava.php";
$f_version=$script_directory."/version.txt";
if (file_exists($f_version)) {
  $curr_vers=trim(file_get_contents($script_directory."/version.txt"));
if (file_exists($check_file)) {
 $avb_vers=trim(file_get_contents("http://hdforall.googlecode.com/files/version.txt"));
} else {
 $avb_vers=trim(file_get_contents("http://hdforall.googlecode.com/files/version_mini.txt"));
}
if ($avb_vers <> $curr_vers) {
  $info = "A new version is available (".$avb_vers."). Update from system tools.";
} else {
  $info = "Tips: Use key 1-9 and PREV, Next for easy navigation.";
}
} else {
  $info = "Tips: Use key 1-9 and PREV, Next for easy navigation.";
}
?>
<rss version="2.0">
<onEnter>
  startitem = "middle";
  setRefreshTime(1);
columnCount=3
</onEnter>

<onRefresh>
  setRefreshTime(-1);
  itemCount = getPageInfo("itemCount");
  redrawDisplay();
</onRefresh>

	<mediaDisplay name=photoView 
	    centerXPC=7
		centerYPC=25
		centerHeightPC=60
        columnCount=3
	    rowCount=1
		menuBorderColor="55:55:55"
		sideColorBottom="0:0:0"
		sideColorTop="0:0:0"
	    backgroundColor="0:0:0"
		imageBorderColor="0:0:0"
		itemBackgroundColor="0:0:0"
		itemGapXPC=0
		itemGapYPC=1
		sideTopHeightPC=22
		bottomYPC=85
		sliding=yes
		showHeader=no
		showDefaultInfo=no
		idleImageWidthPC="8" idleImageHeightPC="10" idleImageXPC="80" idleImageYPC="10">
<!--
  	<text align="center" offsetXPC="0" offsetYPC="0" widthPC="100" heightPC="20" fontSize="30" backgroundColor="10:105:150" foregroundColor="100:200:255">
		  <script>getPageInfo("pageTitle");</script>
		</text>

  	<text redraw="yes" offsetXPC="85" offsetYPC="12" widthPC="10" heightPC="6" fontSize="20" backgroundColor="10:105:150" foregroundColor="60:160:205">
		  <script>sprintf("%s / ", focus-(-1))+itemCount;</script>
		</text>
-->
		<text align="left" offsetXPC=5 offsetYPC=5 widthPC=75 heightPC=5 fontSize=15 backgroundColor=0:0:0 foregroundColor=120:120:120>
   <?php echo $info; ?>
		</text>
		<text align="center" redraw="yes" lines="4" offsetXPC=10 offsetYPC=85 widthPC=75 heightPC=15 fontSize=15 backgroundColor=0:0:0 foregroundColor=120:120:120>
			<script>print(annotation); annotation;</script>
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
			<image>
				<script>
					idx = getQueryItemIndex();
					focus = getFocusItemIndex();
					if(focus==idx) 
					{
					  annotation = getItemInfo(idx, "annotation");
					}
					getItemInfo(idx, "image");
				</script>
			 <offsetXPC>
			   <script>
					idx = getQueryItemIndex();
					focus = getFocusItemIndex();
			    if(focus==idx) 0; else 15;
			   </script>
			 </offsetXPC>
			 <offsetYPC>
			   <script>
					idx = getQueryItemIndex();
					focus = getFocusItemIndex();
			    if(focus==idx) 0; else 8;
			   </script>
			 </offsetYPC>
			 <widthPC>
			   <script>
					idx = getQueryItemIndex();
					focus = getFocusItemIndex();
			    if(focus==idx) 100; else 70;
			   </script>
			 </widthPC>
			 <heightPC>
			   <script>
					idx = getQueryItemIndex();
					focus = getFocusItemIndex();
			    if(focus==idx) 60; else 42;
			   </script>
			 </heightPC>
			</image>
			
			<text align="center" lines="3" offsetXPC=0 offsetYPC=65 widthPC=100 heightPC=35 backgroundColor=-1:-1:-1>
				<script>
					idx = getQueryItemIndex();
					getItemInfo(idx, "title");
				</script>
				<fontSize>
  				<script>
  					idx = getQueryItemIndex();
  					focus = getFocusItemIndex();
  			    if(focus==idx) "22"; else "18";
  				</script>
				</fontSize>
			  <foregroundColor>
  				<script>
  					idx = getQueryItemIndex();
  					focus = getFocusItemIndex();
  			    if(focus==idx) "255:255:255"; else "75:75:75";
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
      if(userInput == "one" || userInput == "1")
      {
        if(itemCount &gt;= 1)
        {
          setFocusItemIndex(0);
          redrawDisplay();
        }
      }
      else if(userInput == "two" || userInput == "2")
      {
        if(itemCount &gt;= 2)
        {
          setFocusItemIndex(1);
          redrawDisplay();
        }
      }
      else if(userInput == "three" || userInput == "3")
      {
        if(itemCount &gt;= 3)
        {
          setFocusItemIndex(2);
          redrawDisplay();
        }
      }
      else if(userInput == "four" || userInput == "4")
      {
        if(itemCount &gt;= 4)
        {
          setFocusItemIndex(3);
          redrawDisplay();
        }
      }
      else if(userInput == "five" || userInput == "5")
      {
        if(itemCount &gt;= 5)
        {
          setFocusItemIndex(4);
          redrawDisplay();
        }
      }
      else if(userInput == "six" || userInput == "6")
      {
        if(itemCount &gt;= 6)
        {
          setFocusItemIndex(5);
          redrawDisplay();
        }
      }
      else if(userInput == "seven" || userInput == "7")
      {
        if(itemCount &gt;= 7)
        {
          setFocusItemIndex(6);
          redrawDisplay();
        }
      }
      else if(userInput == "eight" || userInput == "8")
      {
        if(itemCount &gt;= 8)
        {
          setFocusItemIndex(7);
          redrawDisplay();
        }
      }
      else if(userInput == "nine" || userInput == "9")
      {
        if(itemCount &gt;= 9)
        {
          setFocusItemIndex(8);
          redrawDisplay();
        }
      }
      else if (userInput == "pagedown" || userInput == "pageup" || userInput == "PD" || userInput == "PG")
      {
        itemSize = getPageInfo("itemCount");
        idx = Integer(getFocusItemIndex());
        if (userInput == "pagedown")
        {
          idx -= -10;
          if(idx &gt;= itemSize)
            idx = itemSize-1;
        }
        else
        {
          idx -= 10;
          if(idx &lt; 0)
            idx = 0;
        }
        setFocusItemIndex(idx);
        setItemFocus(idx);
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
		<link>
		  <script>getItemInfo(getQueryItemIndex(), "location");</script>
		</link>
	</item_template>
<adultlink>
<mediaDisplay name="photoView"/>
<link>
  <?php echo $host; ?>/scripts/adult/adult1325.php
</link>
</adultlink>
<adultpass>
<mediaDisplay name="onePartView" />
<link>
/usr/local/etc/www/cgi-bin/scripts/adult/adult.rss
</link>
</adultpass>
<destination>
<link>http://127.0.0.1/cgi-bin/scripts/mini1.php</link>
<mediaDisplay name="photoView"/>
</destination>
  <channel>
    <title>HDD Links</title>
  <item>
    <link><?php echo $host; ?>/scripts/trailer/trailer.php</link>
    <title>Movie trailers</title>
    <annotation>Last movie and game trailers</annotation>
    <image>image/trailerb.png</image>
    <mediaDisplay name="photoView"/>
  </item>

  <item>
    <link><?php echo $host; ?>/scripts/filme/filme.php</link>
    <title>Movies &amp; Series</title>
    <annotation>Movies, TV Series</annotation>
    <image>/usr/local/etc/www/cgi-bin/scripts/filme/image/movies.png</image>
    <mediaDisplay name="threePartsView"/>
  </item>

  <item>
    <link><?php echo $host; ?>/scripts/filme/desene.php</link>
    <title>Kids...</title>
    <annotation>Cartoons...</annotation>
    <image>/usr/local/etc/www/cgi-bin/scripts/filme/image/desene.png</image>
    <mediaDisplay name="threePartsView"/>
  </item>
  
  <item>
    <link><?php echo $host; ?>/scripts/clip/clip.php</link>
    <title>Video clips</title>
    <annotation>Vimeo, youtube, dailymotion, podcast and other stuff...</annotation>
    <image>image/videoclip.png</image>
    <mediaDisplay name="photoView"/>
  </item>

<item>
<title>TV Live</title>
<link><?php echo $host; ?>/scripts/tv/tv_live.php</link>
<media:thumbnail url="/usr/local/etc/www/cgi-bin/scripts/tv/image/tvlive.png" />
<image>/usr/local/etc/www/cgi-bin/scripts/tv/image/tvlive.png</image>
<location></location>
<annotation>Live Tv</annotation>
</item>

<item>
<title>Radio On Line</title>
<link>/usr/local/etc/www/cgi-bin/scripts/tv/radio.rss</link>
<media:thumbnail url="../etc/translate/rss/image/radio_online.jpg" />
<image>../etc/translate/rss/image/radio_online.jpg</image>
<location></location>
<annotation>Internet radio....</annotation>
<mediaDisplay name="photoView" />
</item>

<item>
<title>OneHD</title>
<link><?php echo $host; ?>/scripts/tv/prahovahd.php</link>
<media:thumbnail url="/usr/local/etc/www/cgi-bin/scripts/tv/image/onehd.png" />
<image>/usr/local/etc/www/cgi-bin/scripts/tv/image/onehd.png</image>
<location>http://live.1hd.ro/</location>
<annotation>One HD - prima televiziune online HD - o alternativa la televiziunea clasica, promoveaza emisiuni culturale, de divertisment, business, turism, experimentale, disponibile atat live cat si on-demand (VOD).</annotation>
</item>

<item>
<title>Sport</title>
<link><?php echo $host; ?>/scripts/tv/tv_sport.php</link>
<media:thumbnail url="/usr/local/etc/www/cgi-bin/scripts/tv/image/sport.jpg" />
<image>/usr/local/etc/www/cgi-bin/scripts/tv/image/sport.jpg</image>
<location></location>
<annotation>Sport</annotation>
<mediaDisplay name="photoView"/>
</item>
<?php
$f="/usr/local/etc/xLive/repoman/05_08_2011.txt";
if (file_exists($f)) {
echo '
<item>
<title>repoman xLive</title>
<link>/usr/local/etc/xLive/repoman/repoman.rss</link>
<media:thumbnail url="/usr/local/etc/www/cgi-bin/scripts/php1/xlive.png" />
<image>/usr/local/etc/www/cgi-bin/scripts/php1/xlive.png</image>
<location></location>
<annotation>repoman xLive</annotation>
<mediaDisplay name="photoView"/>
</item>
';
} else {
echo '
<item>
<title>repoman xLive</title>
<onClick>
<script>
rss = "/usr/local/etc/www/cgi-bin/scripts/util/downloadDialog.rss";
ret = doModalRss(rss);
if (ret == "Confirm")    {
  showIdle();
  url="http://127.0.0.1/cgi-bin/scripts/util/xlive.cgi?mode=install";
  msg = getURL(url);
  cancelIdle();
  jumptolink("destination");
}
</script>
</onClick>
<media:thumbnail url="/usr/local/etc/www/cgi-bin/scripts/php1/xlive.png" />
<image>/usr/local/etc/www/cgi-bin/scripts/php1/xlive.png</image>
<location></location>
<annotation>repoman xLive</annotation>
<mediaDisplay name="photoView"/>
</item>
';
}
?>
<?php
exec ("pidof lighttpd",$out);
if ($out[0] <> "") {
$f="/usr/local/etc/xVoD/30_07_2011.txt";
if (file_exists($f)) {
echo '
<item>
<title>xVoD</title>
<link>http://127.0.0.1:82/xVoD/php/index.php</link>
<media:thumbnail url="/usr/local/etc/www/cgi-bin/scripts/php1/xvod.jpg" />
<image>/usr/local/etc/www/cgi-bin/scripts/php1/xvod.jpg</image>
<location></location>
<annotation>Xtreamering xVod</annotation>
<mediaDisplay name="photoView"/>
</item>
';
} else {
echo '
<item>
<title>xVoD</title>
<onClick>
<script>
rss = "/usr/local/etc/www/cgi-bin/scripts/util/downloadDialog.rss";
ret = doModalRss(rss);
if (ret == "Confirm")    {
  showIdle();
  url="http://127.0.0.1/cgi-bin/scripts/util/xvod.cgi?mode=install";
  msg = getURL(url);
  cancelIdle();
  jumptolink("destination");
}
</script>
</onClick>
<media:thumbnail url="/usr/local/etc/www/cgi-bin/scripts/php1/xvod.jpg" />
<image>/usr/local/etc/www/cgi-bin/scripts/php1/xvod.jpg</image>
<location></location>
<annotation>Xtreamering xVod</annotation>
<mediaDisplay name="photoView"/>
</item>
';
}
}
?>
  <item>
    <link><?php echo $host; ?>/scripts/user/users.php</link>
    <title>Metafeeds</title>
    <annotation>Metafeeds is a community RSS portal for the Playon!HD and other realtek based media players.</annotation>
    <image>image/users.png</image>
    <mediaDisplay name="threePartsView"/>
  </item>
  <item>
    <title>Adult channel</title>
    <annotation>Only for 18++.</annotation>
    <image>image/adult.png</image>
    <onClick>
    <script>
    optionsPath="/usr/local/etc/dvdplayer/adult.dat";
    pass = readStringFromFile(optionsPath);
    if (pass == null)
    {
    pass="1325";
    writeStringToFile(optionsPath, pass);
    keyword = getInput();
    if (keyword != null)
    {
      if (keyword == pass)
      {
        jumpToLink("adultlink");
      }
      else
      {
       jumpToLink("adultpass");
      }
    }
    }
    else if (pass == "0")
    {
    jumpToLink("adultlink");
    }
    else
    {
    keyword = getInput();
    if (keyword != null)
    {
      if (keyword == pass)
      {
        jumpToLink("adultlink");
      }
      else
      {
       jumpToLink("adultpass");
      }
    }
    }
    </script>
    </onClick>
    <mediaDisplay name="photoView"/>
  </item>
<!--
  <item>
    <link><?php echo $host; ?>/scripts/util/system.php</link>
    <title>Utilitare player</title>
    <annotation>Pornire-Oprire sever FTP, redenumire fişiere si alte unelte utile.</annotation>
    <image>image/system.png</image>
    <mediaDisplay name="threePartsView"/>
  </item>
-->
</channel>

</rss>
