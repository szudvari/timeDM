<?php
session_start();
include_once 'functions.php';
include_once 'db.php';
include_once 'userdb.php';
include_once 'config.php';
htmlHead($website['title'], $newsletter['traveloCharset'], NULL, NULL, $website['stylesheet']);
if (!isset($_SESSION['login']))
{
    letterHead($website['version']);
    notLoggedIn();
}
else
{
    letterHeadLoggedIn($website['version'], $_SESSION['user'], $_SESSION['login']);
    addUser();
}
copyRight();
htmlEnd();
