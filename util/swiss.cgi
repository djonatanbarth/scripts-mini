#!/bin/sh
cat <<EOF
Content-type: video/flv

EOF
exec /usr/local/etc/translate/bin/rtmpdump -q -v -b 60000 -W http://live.1hd.ro/jwplayer/player.swf -r `echo $QUERY_STRING|sed "s_\&amp;_\&_g"`
