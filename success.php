<?php

session_start();
require_once 'functions.php';
include_once 'config.php';
include_once 'db.php';
include_once 'userdb.php';
$id = $_GET['hirlevel_id'];
htmlHead($website['title'], $newsletter['traveloCharset'], NULL, NULL, $website['stylesheet']);
if (!isset($_SESSION['login']))
{
    letterHead($website['version']);
    notLoggedIn();
}
else
{
    letterHeadLoggedIn($website['version'], $_SESSION['user'], $_SESSION['login']);
    echo "<h1>A hírlevél elkészült</h1>";
    $con = connectDb();
    getSuccesNewsletter($id);
    closeDb($con);
}
copyRight();
htmlEnd();
?>
