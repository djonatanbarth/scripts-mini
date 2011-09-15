#!/bin/sh
cat <<EOF
Content-type: video/mp4

EOF
exec /usr/local/etc/www/cgi-bin/scripts/rtmpdump -b 60000 -q -v -p http://justin.tv -r "rtmp://199.9.255.147/app/jtv_Syt70WVj7sYV_NuG" --jtv "35ecea9c02729138f7e10d10699cf356e19ded82:{\"swfDomains\": [\"justin.tv\", \"jtvx.com\", \"xarth.com\", \"twitchtv.com\", \"twitch.tv\", \"wdtinc.com\", \"imapweather.com\", \"facebook.com\", \"starcrafting.com\"], \"streamName\": \"jtv_Syt70WVj7sYV_NuG\", \"expiration\": 1314454090.617106, \"geo_ip\": \"78.96.189.71\", \"server\": \"lhr01-video7-2\"}" --swfUrl "http://www-cdn.justin.tv/widgets/live_frontpage_player.re8fba5b19dcf4e3d3ac3a3bbdc6214cf15ac1435.swf"