#!/bin/sh
cd /tmp/cached
wget -q  http://livehd.tv/index.php >/dev/null
token=`cat index.php | grep token | sed "s/\(.*\)token':'//;s/',\(.*\)//"`
rm index.php >/dev/null

cat <<EOF
Content-type: video/flv

EOF
exec /usr/local/etc/translate/bin/rtmpdump -q -v -b 60000 -l 2 -T $token -W http://www.livehd.tv/player/player.swf -p http://livehd.tv/ -r `echo $QUERY_STRING+hd|sed "s_\&amp;_\&_g;s/+//g"`
