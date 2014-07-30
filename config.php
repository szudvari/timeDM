<?php
$db['host'] = "localhost";
$db['name'] = "timedm";
$db['user'] = "root";
$db['pass'] = "root";
$db['charset'] = "utf8";

$website['title'] = "TimEDM";
$website['jquery'] = '<script type="text/javascript" src="./js/jquery-1.9.1.min.js"></script>';
$website['validationScript'] = '<script type="text/javascript" src="./js/quickValidation.js"></script>';
$website['stylesheet'] = '<link rel="stylesheet" href="style.css" type="text/css">';
$website['version'] = "v1.0";
$website['picfolder'] = "./misc";


$newsletter['picfolder'] = "http://stuff.szallas.travelo.hu/hirlevel/misc";
$newsletter['traveloCharset'] = "utf8";
$newsletter['lifeCharset'] = "iso-8859-2";
$newsletter['lifeTitle'] = iconv("UTF-8", "ISO-8859-2", "Life Utazás");


?>
