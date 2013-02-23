#!/usr/local/bin/Resource/www/cgi-bin/php
<?php echo "<?xml version='1.0' encoding='UTF8' ?>";
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
		<!--
  	<text align="left" offsetXPC="6" offsetYPC="15" widthPC="100" heightPC="4" fontSize="16" backgroundColor="10:105:150" foregroundColor="100:200:255">
    For megavideo set premium account in xVoD!
		</text>
		-->
  	<text redraw="yes" offsetXPC="85" offsetYPC="12" widthPC="10" heightPC="6" fontSize="20" backgroundColor="10:105:150" foregroundColor="60:160:205">
		  <script>sprintf("%s / ", focus-(-1))+itemCount;</script>
		</text>
  	<text  redraw="yes" align="center" offsetXPC="0" offsetYPC="90" widthPC="100" heightPC="8" fontSize="17" backgroundColor="10:105:150" foregroundColor="100:200:255">
		  <script>print(annotation); annotation;</script>
		</text>
		<image  redraw="yes" offsetXPC=60 offsetYPC=35 widthPC=30 heightPC=30>
		image/movies.png
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
			<text align="left" lines="1" cornerRounding=5 offsetXPC=0 offsetYPC=2 widthPC=100 heightPC=96>
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
<adultlink>
<mediaDisplay name="threePartsView"/>
<link>
  <?php echo $host; ?>/scripts/filme/php/online-moviez1.php
</link>
</adultlink>
<adultpass>
<mediaDisplay name="onePartView" />
<link>
/usr/local/etc/www/cgi-bin/scripts/adult/adult.rss
</link>
</adultpass>
<channel>
	<title>Movies and Series</title>

<item>
<title>movie2k.to - movies</title>
<link><?php echo $host; ?>/scripts/filme/php/movie2k_main.php</link>
<annotation>http://www.movie2k.to</annotation>
<mediaDisplay name="threePartsView"/>
</item>

<item>
<title>movie2k.to - series</title>
<link><?php echo $host; ?>/scripts/filme/php/movie2ks_main.php</link>
<annotation>http://www.movie2k.to</annotation>
<mediaDisplay name="threePartsView"/>
</item>

<item>
<title>Noobroom</title>
<link><?php echo $host; ?>/scripts/filme/php/noobroom_main.php</link>
<annotation>http://noobroom.com</annotation>
<media:thumbnail url="image/movies.png" />
</item>

<!--
<item>
<title>movfilm.net</title>
<link><?php echo $host."/scripts/filme/php/movfilm_cat.php?query=1,http://movfilm.net/news/,neue+Filme";?></link>
<annotation>http://movfilm.net</annotation>
<mediaDisplay name="threePartsView"/>
</item>
-->
<item>
<title>kinox.to</title>
<link><?php echo $host; ?>/scripts/filme/php/kinox_main.php</link>
<annotation>http://www.kinox.to</annotation>
<mediaDisplay name="threePartsView"/>
</item>

<item>
<title>online-moviez.com</title>
<link><?php echo $host; ?>/scripts/filme/php/online-moviez.php</link>
<annotation>http://www.online-moviez.com</annotation>
<mediaDisplay name="threePartsView"/>
</item>

<!--
<item>
<title>hd-box.org</title>
<link><?php echo $host; ?>/scripts/filme/php/hdbox.php</link>
<annotation>http://hd-box.org/alle-filme.html</annotation>
<mediaDisplay name="threePartsView"/>
</item>

<item>
<title>moovie.cc (in lb. maghiara)</title>
<link><?php echo $host; ?>/scripts/filme/php/moovie.php?query=1,</link>
<annotation>http://www.moovie.cc</annotation>
<mediaDisplay name="threePartsView"/>
</item>

<item>
<title>megaweb.ucoz.com (in lb. maghiara)</title>
<link><?php echo $host; ?>/scripts/filme/php/megaweb.php?query=1,</link>
<annotation>http://megaweb.ucoz.com</annotation>
<mediaDisplay name="threePartsView"/>
</item>
-->
<item>
<title>onlinefilmletoltes.eu (in lb. maghiara)</title>
<link><?php echo $host; ?>/scripts/filme/php/onlinefilmletoltes_main.php</link>
<annotation>http://onlinefilmletoltes.eu</annotation>
<mediaDisplay name="threePartsView"/>
</item>

<item>
<title>onlinewebfilmek (in lb. maghiara)</title>
<link><?php echo $host; ?>/scripts/filme/php/onlinewebfilmek.php?file=http://onlinewebfilmek.blogspot.com</link>
<annotation>http://onlinewebfilmek.blogspot.com</annotation>
<mediaDisplay name="threePartsView"/>
</item>


<item>
<title>www.archive.org - Movies and Films</title>
<link><?php echo $host; ?>/scripts/filme/php/archive.php?page=1</link>
<annotation>http://www.archive.org</annotation>
<mediaDisplay name="threePartsView"/>
</item>

<!--
<item>
<title>10starmovies.com</title>
<link><?php echo $host; ?>/scripts/filme/php/10starmovies_main.php</link>
<annotation>http://10starmovies.com/Tv-Shows/</annotation>
<mediaDisplay name="threePartsView"/>
</item>
-->
<!--
  <item>
    <title>online-moviez.com - Adult filme</title>
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
    <mediaDisplay name="threePartsView"/>
</item>
-->

</channel>
</rss>
