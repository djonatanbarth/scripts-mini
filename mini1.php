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
  showIdle();
  setRefreshTime(1);
</onEnter>

<onRefresh>
  setRefreshTime(-1);
  itemCount = getPageInfo("itemCount");
  redrawDisplay();
</onRefresh>

	<mediaDisplay name=photoView
	  centerXPC=17
		centerYPC=25
		centerHeightPC=60
		columnCount=4
	  rowCount=3
		menuBorderColor="55:55:55"
		sideColorBottom="0:0:0"
		sideColorTop="0:0:0"
	  backgroundColor="0:0:0"
		itemBackgroundColor="0:0:0"
		itemGapXPC=0
		itemGapYPC=0
		imageBorderColor="10:105:150"
		imageBorderPC="0"
		sideTopHeightPC=0
		bottomYPC=0
		sliding=yes
		showHeader=no
		showDefaultInfo=no
		idleImageWidthPC="8" idleImageHeightPC="10" idleImageXPC="80" idleImageYPC="10">
		<text align="left" offsetXPC=5 offsetYPC=5 widthPC=75 heightPC=5 fontSize=15 backgroundColor=0:0:0 foregroundColor=120:120:120>
   <?php echo $info; ?>
		</text>
<!--
<backgroundDisplay name=ims_guide_menu>
                <image offsetXPC=0 offsetYPC=0 widthPC=100 heightPC=100>
                        image/IMS_bg.fsp
                </image>
</backgroundDisplay>
-->
  	<text align="left" redraw="yes" useBackgroundSurface=yes offsetXPC="8" offsetYPC="15" widthPC="50" heightPC="8" fontSize="24" foregroundColor="100:200:255">
		  <script>print(hed); hed;</script>
		</text>
  	<text align="center" redraw="yes" lines=" 2" useBackgroundSurface=yes offsetXPC="8" offsetYPC="85" widthPC="84" heightPC="12" fontSize="17" foregroundColor="200:200:200">
		  <script>print(annotation); annotation;</script>
		</text>
  <image offsetXPC=0 offsetYPC=23 widthPC=100 heightPC=1>
		../etc/translate/rss/image/gradient_line.bmp
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
			<image>
				<script>
					idx = getQueryItemIndex();
					focus = getFocusItemIndex();
					if(focus==idx)
					{
					  hed = getItemInfo(idx, "title");
					  annotation = getItemInfo(idx, "annotation");
					  getItemInfo(idx, "focus");
					}
					else
					{
					getItemInfo(idx, "unfocus");
					}
				</script>
			 <offsetXPC>
			   <script>
					idx = getQueryItemIndex();
					focus = getFocusItemIndex();
			    if(focus==idx) 7.5; else 15;
			   </script>
			 </offsetXPC>
			 <offsetYPC>
			   <script>
					idx = getQueryItemIndex();
					focus = getFocusItemIndex();
			    if(focus==idx) 0; else 10;
			   </script>
			 </offsetYPC>
			 <widthPC>
			   <script>
					idx = getQueryItemIndex();
					focus = getFocusItemIndex();
			    if(focus==idx) 85; else 70;
			   </script>
			 </widthPC>
			 <heightPC>
			   <script>
					idx = getQueryItemIndex();
					focus = getFocusItemIndex();
			    if(focus==idx) 80; else 70;
			   </script>
			 </heightPC>
			</image>

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
      if(userInput == "zero" || userInput == "0")
      {
        if(itemCount &gt;= 10)
        {
          setFocusItemIndex(9);
          redrawDisplay();
        }
      }
      else if (userInput == "pagedown" || userInput == "pageup" || userInput == "PD" || userInput == "PG")
      {
        itemSize = getPageInfo("itemCount");
        idx = Integer(getFocusItemIndex());
        if (userInput == "pagedown")
        {
          idx -= -4;
          if(idx &gt;= itemSize)
            idx = itemSize-1;
        }
        else
        {
          idx -= 4;
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

<!-- 1 -->
<item>
<title>Movies &amp; Series</title>
<onClick>
<script>
showIdle();
"<?php echo $host; ?>/scripts/filme/filme.php";
</script>
</onClick>
<focus>/usr/local/etc/www/cgi-bin/scripts/image/filme_focus.png</focus>
<unfocus>/usr/local/etc/www/cgi-bin/scripts/image/filme_unfocus.png</unfocus>
<annotation>Watch movies and TV Series online.</annotation>
</item>

<!-- 2 -->
<item>
<title>TV Live</title>
<onClick>
<script>
showIdle();
"<?php echo $host; ?>/scripts/tv/tv_live.php";
</script>
</onClick>
<focus>/usr/local/etc/www/cgi-bin/scripts/image/livetv_focus.png</focus>
<unfocus>/usr/local/etc/www/cgi-bin/scripts/image/livetv_unfocus.png</unfocus>
<annotation>TV stations around the world, news, music or sport.</annotation>
</item>

<!-- 3 -->


<!-- 4 - new line -->


<!-- 5 -->
<item>
<title>OneHD</title>
<onClick>
<script>
showIdle();
"<?php echo $host; ?>/scripts/tv/prahovahd.php";
</script>
</onClick>
<focus>/usr/local/etc/www/cgi-bin/scripts/image/onehd_focus.png</focus>
<unfocus>/usr/local/etc/www/cgi-bin/scripts/image/onehd_unfocus.png</unfocus>
<annotation>One HD - the first online HD television - an alternative to traditional television, promotes cultural programs, entertainment...</annotation>
</item>

<!-- 6 -->
<item>
<title>Radio OnLine</title>
<onClick>
<script>
showIdle();
"/usr/local/etc/www/cgi-bin/scripts/tv/radio.rss";
</script>
</onClick>
<focus>/usr/local/etc/www/cgi-bin/scripts/image/radio_focus.png</focus>
<unfocus>/usr/local/etc/www/cgi-bin/scripts/image/radio_unfocus.png</unfocus>
<annotation>Radio stations around the world, shoutcast radio....</annotation>
</item>

<!-- 7 - new line -->
<item>
<title>For Kids.....</title>
<onClick>
<script>
showIdle();
"<?php echo $host; ?>/scripts/filme/desene.php";
</script>
</onClick>
<focus>/usr/local/etc/www/cgi-bin/scripts/image/desene_focus.png</focus>
<unfocus>/usr/local/etc/www/cgi-bin/scripts/image/desene_unfocus.png</unfocus>
<annotation>Just for kids, cartoons, movies trailers</annotation>
</item>

<!-- 8 -->
<item>
<title>Metafeeds</title>
<onClick>
<script>
showIdle();
"<?php echo $host; ?>/scripts/user/users.php";
</script>
</onClick>
<focus>/usr/local/etc/www/cgi-bin/scripts/image/user_focus.png</focus>
<unfocus>/usr/local/etc/www/cgi-bin/scripts/image/user_unfocus.png</unfocus>
<annotation>Metafeeds is a community RSS portal for the Playon!HD and other realtek based media players.</annotation>
</item>

<!-- 9 -->

<!-- 10 - new line -->
<item>
<title>Video clips and TV recordings</title>
<onClick>
<script>
showIdle();
"<?php echo $host; ?>/scripts/clip/clip.php";
</script>
</onClick>
<focus>/usr/local/etc/www/cgi-bin/scripts/image/videoclip_focus.png</focus>
<unfocus>/usr/local/etc/www/cgi-bin/scripts/image/videoclip_unfocus.png</unfocus>
<annotation>Funny clips, music or TV shows.</annotation>
</item>

<!-- 11 -->
<item>
<title>Movies or games trailers</title>
<onClick>
<script>
showIdle();
"<?php echo $host; ?>/scripts/trailer/trailer.php";
</script>
</onClick>
<focus>/usr/local/etc/www/cgi-bin/scripts/image/trailer_focus.png</focus>
<unfocus>/usr/local/etc/www/cgi-bin/scripts/image/trailer_unfocus.png</unfocus>
<annotation>See what movies or new games have appeared.</annotation>
</item>

<!-- 12 -->

<item>
<title>Sport</title>
<onClick>
<script>
showIdle();
"<?php echo $host; ?>/scripts/tv/tv_sport.php";
</script>
</onClick>
<focus>/usr/local/etc/www/cgi-bin/scripts/image/sport_focus.png</focus>
<unfocus>/usr/local/etc/www/cgi-bin/scripts/image/sport_unfocus.png</unfocus>
<annotation>Sporting events. Football and not only ...</annotation>
</item>

<!-- 13 - new line -->

<?php
$f="/usr/local/etc/xLive/repoman/05_08_2011.txt";
if (file_exists($f)) {
echo '
<item>
<title>repoman xLive</title>
<link>/usr/local/etc/xLive/repoman/repoman.rss</link>
<media:thumbnail url="/usr/local/etc/www/cgi-bin/scripts/php1/xlive.png" />
<focus>/usr/local/etc/www/cgi-bin/scripts/image/xlive_focus.png</focus>
<unfocus>/usr/local/etc/www/cgi-bin/scripts/image/xlive_unfocus.png</unfocus>
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
<focus>/usr/local/etc/www/cgi-bin/scripts/image/xlive_focus.png</focus>
<unfocus>/usr/local/etc/www/cgi-bin/scripts/image/xlive_unfocus.png</unfocus>
<location></location>
<annotation>repoman xLive</annotation>
<mediaDisplay name="photoView"/>
</item>
';
}
?>
<!-- 14 -->
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
<focus>/usr/local/etc/www/cgi-bin/scripts/image/xvod_focus.png</focus>
<unfocus>/usr/local/etc/www/cgi-bin/scripts/image/xvod_unfocus.png</unfocus>
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
<focus>/usr/local/etc/www/cgi-bin/scripts/image/xvod_focus.png</focus>
<unfocus>/usr/local/etc/www/cgi-bin/scripts/image/xvod_unfocus.png</unfocus>
<location></location>
<annotation>Xtreamering xVod</annotation>
<mediaDisplay name="photoView"/>
</item>
';
}
}
?>

<!-- 15 -->
  <item>
    <title>Adult channel.</title>
    <annotation>Only for 18++. Requires password!</annotation>
    <focus>/usr/local/etc/www/cgi-bin/scripts/image/adult_focus.png</focus>
    <unfocus>/usr/local/etc/www/cgi-bin/scripts/image/adult_unfocus.png</unfocus>
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
</channel>

</rss>
