<?php

session_start();
require_once 'functions.php';
include_once 'config.php';
include_once 'db.php';
include_once 'userdb.php';
htmlHead($website['title'], $newsletter['traveloCharset'], NULL, NULL, 
        $website['stylesheet']);
if (!isset($_SESSION['login']))
{
    letterHead($website['version']);
    notLoggedIn();
}
else
{
    letterHeadLoggedIn($website['version'], $_SESSION['user'], $_SESSION['login']);
    echo "<h1> Elkészített hírlevelek:</h1>";
    $con = connectDb();
    newsletters();
    closeDb($con);
}
copyRight();
htmlEnd();
?>
