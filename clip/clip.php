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
  middleItem = Integer(itemCount / 2);
  redrawDisplay();
</onRefresh>

	<mediaDisplay name=photoView 
	  centerXPC=7 
		centerYPC=25
		centerHeightPC=40
columnCount=5
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
		idleImageXPC="5" idleImageYPC="5" idleImageWidthPC="8" idleImageHeightPC="10">
		
  	<text align="center" offsetXPC="0" offsetYPC="0" widthPC="100" heightPC="20" fontSize="30" backgroundColor="10:105:150" foregroundColor="100:200:255">
		  <script>getPageInfo("pageTitle");</script>
		</text>

  	<text redraw="yes" offsetXPC="85" offsetYPC="12" widthPC="10" heightPC="6" fontSize="20" backgroundColor="10:105:150" foregroundColor="60:160:205">
		  <script>sprintf("%s / ", focus-(-1))+itemCount;</script>
		</text>

		<!--  lines="5" fontSize=15 -->
		<text align="center" redraw="yes" 
  lines=3 fontSize=17
		      offsetXPC=5 offsetYPC=65 widthPC=90 heightPC=20 
		      backgroundColor=0:0:0 foregroundColor=120:120:120>
			<script>print(annotation); annotation;</script>
		</text>
		
		<text align="center" redraw="yes" offsetXPC=10 offsetYPC=85 widthPC=80 heightPC=10 fontSize=15 backgroundColor=0:0:0 foregroundColor=75:75:75>
			<script>print(location); location;</script>
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
					  location = getItemInfo(idx, "location");
					  annotation = getItemInfo(idx, "annotation");
					}
					getItemInfo(idx, "image");
				</script>
			 <offsetXPC>
			   <script>
					idx = getQueryItemIndex();
					focus = getFocusItemIndex();
			    if(focus==idx) 0; else 12;
			   </script>
			 </offsetXPC>
			 <offsetYPC>
			   <script>
					idx = getQueryItemIndex();
					focus = getFocusItemIndex();
			    if(focus==idx) 0; else 6;
			   </script>
			 </offsetYPC>
			 <widthPC>
			   <script>
					idx = getQueryItemIndex();
					focus = getFocusItemIndex();
			    if(focus==idx) 100; else 75;
			   </script>
			 </widthPC>
			 <heightPC>
			   <script>
					idx = getQueryItemIndex();
					focus = getFocusItemIndex();
			    if(focus==idx) 50; else 37;
			   </script>
			 </heightPC>
			</image>
			
			<text align="center" lines="4" offsetXPC=0 offsetYPC=55 widthPC=100 heightPC=45 backgroundColor=-1:-1:-1>
				<script>
					idx = getQueryItemIndex();
					getItemInfo(idx, "title");
				</script>
				<fontSize>
  				<script>
  					idx = getQueryItemIndex();
  					focus = getFocusItemIndex();
  			    if(focus==idx) "18"; else "14";
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
          idx -= -5;
          if(idx &gt;= itemSize)
            idx = itemSize-1;
        }
        else
        {
          idx -= 5;
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

	</item_template>

<channel>
<title>Video Clips</title>


<item>
<title>Metacafe</title>
	<link><?php echo $host; ?>/scripts/clip/php/metacafe.php?query=1</link>
	<location>http://www.metacafe.com</location>
	<image>/usr/local/etc/www/cgi-bin/scripts/clip/image/metacafe.png</image>
	<media:thumbnail url="/usr/local/etc/www/cgi-bin/scripts/clip/image/metacafe.png" />
	<annotation>Metacafe - Best Videos & Funny Movies:</annotation>
</item>

<item>
<title>Youtube</title>
	<link>rss_file:///usr/local/etc/www/cgi-bin/scripts/clip/youtube/yt_index.rss</link>
	<location>http://youtube.com</location>
	<image>image/youtube.gif</image>
	<media:thumbnail url="image/youtube.gif" />
	<annotation>YouTube videos.</annotation>
	<mediaDisplay name="onePartView" />
</item>

<item>
<title>myVideo.de</title>
	<link><?php echo $host; ?>/scripts/clip/myvideo_de.php</link>
	<location>http://www.myvideo.de</location>
	<image>/usr/local/etc/www/cgi-bin/scripts/clip/image/myvideo_de.jpg</image>
	<media:thumbnail url="/usr/local/etc/www/cgi-bin/scripts/clip/image/myvideo_de.jpg" />
	<annotation>Gratis Videos, kostenlose Video Clips auf MyVideo .  Die brandneuen gratis Videos von Usern, Kinotrailer, gratis Games, Clips von Talenten, die beliebtesten TV-Formate - MyVideo zeigt sie alle gratis & kostenlos!</annotation>
</item>

<item>
<title>funnyordie.com</title>
	<link><?php echo $host; ?>/scripts/clip/php/funnyordie_main.php</link>
	<location>http://www.funnyordie.com</location>
	<image>/usr/local/etc/www/cgi-bin/scripts/clip/image/funnyordie.png</image>
	<media:thumbnail url="/usr/local/etc/www/cgi-bin/scripts/clip/image/funnyordie.png" />
	<annotation>funny or die - Funny videos, funny pictures, funny jokes, top ten lists, funny blogs, caption contests, and funny articles featuring celebrities, comedians, and you.</annotation>
</item>

<item>
<title>youclubvideo</title>
	<link><?php echo $host; ?>/scripts/clip/php/youclubvideo.php</link>
	<location>http://www.youclubvideo.com</location>
	<image>/usr/local/etc/www/cgi-bin/scripts/clip/image/youclubvideo.png</image>
	<media:thumbnail url="/usr/local/etc/www/cgi-bin/scripts/clip/image/youclubvideo.png" />
	<annotation>YouClubVideo was started as an idea to bring together a wide variety of clubbing experiences and people from all the countries of the world that have in common the same feelings, sounds and sences of club music.</annotation>
</item>

<item>
<title>dancetrippin.tv</title>
	<link><?php echo $host; ?>/scripts/clip/php/dancetrippin.php</link>
	<location>http://www.dancetrippin.tv</location>
	<image>/usr/local/etc/www/cgi-bin/scripts/clip/image/dancetrippin.png</image>
	<media:thumbnail url="/usr/local/etc/www/cgi-bin/scripts/clip/image/dancetrippin.png" />
	<annotation>DanceTrippin.tv: The Man With No Shadow (aka De Man Zonder Schaduw in his homeland of the Netherlands) closes Zomerpark 2012 with a stunning set that builds and builds to the perfect ending of an amazing day in Amsterdam. Much respect to the organization GZG for this special event!</annotation>
</item>

<item>
<title>Dailymotion</title>
	<link><?php echo $host; ?>/scripts/clip/dm.php</link>
	<location>http://www.dailymotion.com</location>
	<image>/usr/local/etc/www/cgi-bin/scripts/clip/image/dailymotion.png</image>
	<media:thumbnail url="/usr/local/etc/www/cgi-bin/scripts/clip/image/dailymotion.png" />
	<annotation>Dailymotion is about finding new ways to see, share and engage your world through the power of online video. You can find - or upload - videos about your interests and hobbies, eyewitness accounts of recent news and distant places, and everything else from the strange to the spectacular.</annotation>
</item>
<!--
<item>
<title>HD Podcast</title>
	<link><?php echo $host; ?>/scripts/clip/php/podcasthd.php</link>
	<location>http://www.podcast.tv/high-definition-video-podcasts.html</location>
	<image>/usr/local/etc/www/cgi-bin/scripts/clip/image/podcast.png</image>
	<media:thumbnail url="/usr/local/etc/www/cgi-bin/scripts/clip/image/podcast.png" />
	<annotation>HD-Podcasts (High Definition)  | podcast.tv is an international video podcast directory with podcast recommendations and useful podcasting functions for enjoying podcasts and learn how to podcast</annotation>
</item>
-->
<!--
<item>
<title>clipfish.de</title>
	<link><?php echo $host; ?>/scripts/clip/php/clipfish.php?query=1</link>
	<location>http://www.clipfish.de</location>
	<image>/usr/local/etc/www/cgi-bin/scripts/clip/image/clipfish.gif</image>
	<media:thumbnail url="/usr/local/etc/www/cgi-bin/scripts/clip/image/clipfish.gif" />
	<annotation>Witzige Videoclips - Dein Witzvideo - Gratis Witzig-Videos bei Clipfish</annotation>
</item>

<item>
<title>video.web.de</title>
	<link><?php echo $host; ?>/scripts/clip/web_de.php</link>
	<location>http://video.web.de</location>
	<image>/usr/local/etc/www/cgi-bin/scripts/clip/image/web_de.gif</image>
	<media:thumbnail url="/usr/local/etc/www/cgi-bin/scripts/clip/image/web_de.gif" />
	<annotation>Lustige Videos, gratis Nachrichten-Videos, Promi-Videos, Game-Trailer und Kino-Trailer - WEB.DE Video Community - WEB.DE Video</annotation>
</item>
-->
<!--
<item>
    <title>ARD.de</title>
    <link><?php echo $host; ?>/scripts/php1/youtube_user.php?query=1,ARD</link>
    <image>/usr/local/etc/www/cgi-bin/scripts/clip/image/ard.jpg</image>
    <location>http://www.ard.de/</location>
    <annotation>ARD.de ist der zentrale Einstieg in die gesamte Internet-Welt der ARD - zu allen Sendern und Sendungen, zu allen Radio-, Fernseh- und Online-Angeboten.</annotation>
    <media:thumbnail url="/usr/local/etc/www/cgi-bin/scripts/clip/image/ard.jpg" />
</item>
-->
<item>
<title>ZDF Mediathek</title>
	<link><?php echo $host; ?>/scripts/clip/zdf_main.php</link>
	<location>http://www.zdf.de/ZDFmediathek/hauptnavigation/startseite</location>
	<image>/usr/local/etc/www/cgi-bin/scripts/clip/image/zdf.jpg</image>
	<media:thumbnail url="/usr/local/etc/www/cgi-bin/scripts/clip/image/zdf.jpg" />
	<annotation>Die ZDFmediathek - das Videoportal des ZDF im Internet. Sendung verpasst? Hier können Sie zahlreiche ZDF-Sendungen online anschauen.</annotation>
</item>

<item>
<title>Das Wetter im Ersten</title>
	<link>http://www.daserste.de/podcasts/mam_dyn~id,423~wetter.xml</link>
	<location>http://www.daserste.de/podcasts/mam_dyn~id,423~wetter.xml</location>
	<image>/usr/local/etc/www/cgi-bin/scripts/clip/image/Wetter.jpg</image>
	<media:thumbnail url="/usr/local/etc/www/cgi-bin/scripts/clip/image/Wetter.jpg" />
	<annotation>Das Wetter im Ersten</annotation>
    <mediaDisplay name="threePartsView" itemBackgroundColor="0:0:0" backgroundColor="0:0:0" sideLeftWidthPC="0" itemImageXPC="5" itemXPC="20" itemYPC="20" itemWidthPC="65" capWidthPC="70" unFocusFontColor="101:101:101" focusFontColor="255:255:255" idleImageWidthPC="10" idleImageHeightPC="10">
        <idleImage>image/POPUP_LOADING_01.png</idleImage>
        <idleImage>image/POPUP_LOADING_02.png</idleImage>
        <idleImage>image/POPUP_LOADING_03.png</idleImage>
        <idleImage>image/POPUP_LOADING_04.png</idleImage>
        <idleImage>image/POPUP_LOADING_05.png</idleImage>
        <idleImage>image/POPUP_LOADING_06.png</idleImage>
        <idleImage>image/POPUP_LOADING_07.png</idleImage>
        <idleImage>image/POPUP_LOADING_08.png</idleImage>
		<backgroundDisplay>
			<image  offsetXPC=0 offsetYPC=0 widthPC=100 heightPC=100>
			image/mele/backgd.jpg
			</image>
		</backgroundDisplay>
		<image  offsetXPC=0 offsetYPC=2.8 widthPC=100 heightPC=15.6>
		image/mele/rss_title.jpg
		</image>
		<text  offsetXPC=40 offsetYPC=8 widthPC=35 heightPC=10 fontSize=20 backgroundColor=-1:-1:-1 foregroundColor=255:255:255>
               Das Wetter im Ersten
		</text>
    </mediaDisplay>
</item>
<!--
<item>
<title>ikiwi.at</title>
	<link><?php echo $host; ?>/scripts/clip/php/ikiwi.php?query=1</link>
	<location>http://www.ikiwi.at/</location>
	<image>/usr/local/etc/www/cgi-bin/scripts/clip/image/ikiwi.png</image>
	<media:thumbnail url="/usr/local/etc/www/cgi-bin/scripts/clip/image/ikiwi.png" />
	<annotation>Ziel von iKiwi ist es, die besten Videos des Internets auf einem Portal kostenlos anzubieten und durch innovative Funktionalitäten den Nutzern einen größtmöglichen Mehrwert und kreativen Spielraum zu bieten.</annotation>
</item>
-->
<!--
<item>
<title>vol.at</title>
	<link><?php echo $host; ?>/scripts/clip/php/video_vol_at.php?query=1</link>
	<location>http://www.vol.at/</location>
	<image>/usr/local/etc/www/cgi-bin/scripts/clip/image/video_vol_at.png</image>
	<media:thumbnail url="/usr/local/etc/www/cgi-bin/scripts/clip/image/video_vol_at.png" />
	<annotation>Aktuelle Nachrichten aus Vorarlberg, sterreich und der Welt: News, Sport Nachrichten, Wetter, Wirtschaft, Kultur, Stars, Veranstaltungen, Reise, Chat, uvm.</annotation>
</item>
-->
<item>
<title>businessworld</title>
	<link><?php echo $host; ?>/scripts/clip/php/businessworld.php?query=1</link>
	<location>http://www.businessworld.de/</location>
	<image>/usr/local/etc/www/cgi-bin/scripts/clip/image/businessworld.gif</image>
	<media:thumbnail url="/usr/local/etc/www/cgi-bin/scripts/clip/image/businessworld.gif" />
	<annotation>businessworld.de - Wirtschaftsinformationen und Kontakte per Video. Publizieren und recherchieren Sie zu Unternehmen, Produkten, Events, Jobs, Karriere, Ideen und Know-how.</annotation>
</item>
<!--
<item>
<title>luegmol.ch</title>
	<link><?php echo $host; ?>/scripts/clip/php/luegmol.php?query=1</link>
	<location>http://www.luegmol.ch</location>
	<image>/usr/local/etc/www/cgi-bin/scripts/clip/image/luegmol.png</image>
	<media:thumbnail url="/usr/local/etc/www/cgi-bin/scripts/clip/image/luegmol.png" />
	<annotation>LUEGMOL.CH - Funny & Most Wonderfull Movies at LUEGMOL.CH:</annotation>
</item>
-->
<!--
<item>
<title>livingzurich.tv</title>
	<link><?php echo $host; ?>/scripts/clip/php/livingzurich.php?query=1</link>
	<location>http://livingzurich.tv</location>
	<image>/usr/local/etc/www/cgi-bin/scripts/clip/image/livingzurich.png</image>
	<media:thumbnail url="/usr/local/etc/www/cgi-bin/scripts/clip/image/livingzurich.png" />
	<annotation>LivingZurich.TV | Videos aus und über Zürich</annotation>
</item>
-->
<item>
<title>crovideos.com</title>
	<link><?php echo $host; ?>/scripts/clip/php/crovideos.php?query=1</link>
	<location>http://www.crovideos.com</location>
	<image>/usr/local/etc/www/cgi-bin/scripts/clip/image/crovideos.png</image>
	<media:thumbnail url="/usr/local/etc/www/cgi-bin/scripts/clip/image/crovideos.png" />
	<annotation>Videos Kroatien Video Musik MP3 Croatia Urlaub Reisen | CroVideos.com:</annotation>
</item>
<!--
<item>
<title>cliphost24.com</title>
	<link><?php echo $host; ?>/scripts/clip/php/cliphost24.php?query=1</link>
	<location>http://www.cliphost24.com</location>
	<image>/usr/local/etc/www/cgi-bin/scripts/clip/image/cliphost24.jpg</image>
	<media:thumbnail url="/usr/local/etc/www/cgi-bin/scripts/clip/image/cliphost24.jpg" />
	<annotation>Kostenloser Video Upload Service für Video Files bis 50 MB . Es können Video Dateien verschiedenen Formaten hochgeladen werden und optional können die Uploads in der TOP100 veröffentlicht werden.</annotation>
</item>
-->
<item>
<title>deutschlandreporter.de</title>
	<link><?php echo $host; ?>/scripts/clip/php/deutschlandreporter.php</link>
	<location>http://www.deutschlandreporter.de</location>
	<image>/usr/local/etc/www/cgi-bin/scripts/clip/image/deutschlandreporter.png</image>
	<media:thumbnail url="/usr/local/etc/www/cgi-bin/scripts/clip/image/deutschlandreporter.png" />
	<annotation>GSD | Karl-Heinz Klevers in Wuppertal - Video - Wuppertal - News - Gesellschaft - News - Menschen:</annotation>
</item>
<!--
<item>
<title>uprom.tv</title>
	<link><?php echo $host; ?>/scripts/clip/php/uprom.php</link>
	<location>http://www.uprom.tv</location>
	<image>/usr/local/etc/www/cgi-bin/scripts/clip/image/uprom.gif</image>
	<media:thumbnail url="/usr/local/etc/www/cgi-bin/scripts/clip/image/uprom.gif" />
	<annotation>UProm.TV - Lade Deine Video Clips hoch und komm so ins Fernsehen! Mit UProm.TV hat jeder die Chance, mit seinen eigenen Videoclips ins TV zu kommen</annotation>
</item>
-->




<item>
<title>BlipTV</title>
	<link><?php echo $host; ?>/scripts/clip/bliptv.php</link>
	<location>http://blip.tv/</location>
	<image>/usr/local/etc/www/cgi-bin/scripts/clip/image/blip_tv.jpg</image>
	<media:thumbnail url="/usr/local/etc/www/cgi-bin/scripts/clip/image/blip_tv.jpg" />
	<annotation>Our mission is to make independent Web shows sustainable. We provide services to more than 50,000 independently produced Web shows. More than 44,000 show creators use blip.tv every day to manage their online and offline presence.</annotation>
</item>

<item>
<title>Best of YouTube (iPod video)</title>
	<link>http://feeds.feedburner.com/boyt</link>
	<location>http://feeds.feedburner.com/boyt</location>
	<image>/usr/local/etc/www/cgi-bin/scripts/clip/image/bestofyoutube.jpg</image>
	<media:thumbnail url="/usr/local/etc/www/cgi-bin/scripts/clip/image/bestofyoutube.jpg" />
	<annotation>The best video clips from YouTube delivered directly to your iPod</annotation>
    <mediaDisplay name="threePartsView" itemBackgroundColor="0:0:0" backgroundColor="0:0:0" sideLeftWidthPC="0" itemImageXPC="5" itemXPC="20" itemYPC="20" itemWidthPC="65" capWidthPC="70" unFocusFontColor="101:101:101" focusFontColor="255:255:255" idleImageWidthPC="10" idleImageHeightPC="10">
        <idleImage>image/POPUP_LOADING_01.png</idleImage>
        <idleImage>image/POPUP_LOADING_02.png</idleImage>
        <idleImage>image/POPUP_LOADING_03.png</idleImage>
        <idleImage>image/POPUP_LOADING_04.png</idleImage>
        <idleImage>image/POPUP_LOADING_05.png</idleImage>
        <idleImage>image/POPUP_LOADING_06.png</idleImage>
        <idleImage>image/POPUP_LOADING_07.png</idleImage>
        <idleImage>image/POPUP_LOADING_08.png</idleImage>
		<backgroundDisplay>
			<image  offsetXPC=0 offsetYPC=0 widthPC=100 heightPC=100>
			image/mele/backgd.jpg
			</image>
		</backgroundDisplay>
		<image  offsetXPC=0 offsetYPC=2.8 widthPC=100 heightPC=15.6>
		image/mele/rss_title.jpg
		</image>
		<text  offsetXPC=40 offsetYPC=8 widthPC=35 heightPC=10 fontSize=20 backgroundColor=-1:-1:-1 foregroundColor=255:255:255>
               Best of YouTube
		</text>
    </mediaDisplay>
</item>
<item>
<title>Revision3</title>
<link><?php echo $host; ?>/scripts/tv/rev3.php</link>
<media:thumbnail url="/usr/local/etc/www/cgi-bin/scripts/tv/image/revision3.gif" />
<image>/usr/local/etc/www/cgi-bin/scripts/tv/image/revision3.gif</image>
<location>http://revision3.com/</location>
<annotation>Revision3 is the leading independent free online video service that offers hit TV shows including Diggnation with Kevin Rose, Scam School, Film Riot, etc.</annotation>
</item>



<item>
<title>Video Podcast Directory</title>
	<link><?php echo $host; ?>/scripts/clip/php/videopodcasts_main.php</link>
	<location>http://www.videopodcasts.tv/</location>
	<image>/usr/local/etc/www/cgi-bin/scripts/clip/image/videopodcasts.gif</image>
	<media:thumbnail url="/usr/local/etc/www/cgi-bin/scripts/clip/image/videopodcasts.gif" />
	<annotation>The best video podcast directory. Search the biggest collection of video podcasts, video podcast feeds and video podcast software in the universe. Play, share, and enjoy!</annotation>
</item>

<item>
<title>podcastalley</title>
	<link><?php echo $host; ?>/scripts/clip/php/podcastalley_main.php</link>
	<location>http://www.podcastalley.com/index.php</location>
	<image>/usr/local/etc/www/cgi-bin/scripts/clip/image/podcastalley.gif</image>
	<media:thumbnail url="/usr/local/etc/www/cgi-bin/scripts/clip/image/podcastalley.gif" />
	<annotation>Podcast Alley is the podcast lovers portal. Featuring the best Podcast Directory and the Top 10 podcasts, as voted on by the listeners.</annotation>
</item>
<!--
<item>
<title>gaskrank.tv</title>
	<link><?php echo $host; ?>/scripts/clip/php/gaskrank.php?query=1</link>
	<location>http://www.gaskrank.tv</location>
	<image>/usr/local/etc/www/cgi-bin/scripts/clip/image/gaskrank.jpg</image>
	<media:thumbnail url="/usr/local/etc/www/cgi-bin/scripts/clip/image/gaskrank.jpg" />
	<annotation>Gaskrank TV kostenloses Motorrad Video Portal für Motorrad Videos</annotation>
</item>
-->
</channel>
</rss>
