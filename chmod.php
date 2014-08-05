<?php

$dir="/var/local/www/stuff.szallas.travelo.hu/hirlevel/dm/140807_life_dm/";
if (!chmod($dir, 0777)) {
    echo "fault";
}
else {
        echo "succes";
}
