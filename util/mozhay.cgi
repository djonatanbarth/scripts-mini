#!/bin/sh
cat <<EOF
Content-type: video/mp4

EOF
exec /sbin/wget --user-agent "" -O - `echo $QUERY_STRING|sed "s_\&amp;_\&_g"`
