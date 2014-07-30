<?php

if (!mkdir("/var/local/www/stuff.szallas.travelo.hu/hirlevel/dm/teszt")) {
    die('Failed to create folders...');
}
else echo "ok";
