<?php
session_start();
require_once 'functions.php';
include_once 'config.php';
htmlHead($website['title'], $newsletter['traveloCharset'], NULL, NULL, $website['stylesheet']);
if (!isset($_SESSION['login']))
{
    letterHead($website['version']);
}
else
{
    letterHeadLoggedIn($website['version'], $_SESSION['user'], $_SESSION['login']);
}
wordCloud($website['picfolder']);
copyRight();
htmlEnd();
?>
