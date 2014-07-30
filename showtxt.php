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
$title= $_GET["title"];
$file="save/".$title;
echo <<<EOT
<h1>Hírlevele elkészült.</h1> 
    <p>Az alábbi linkre kattintva letöltheti annak forráskódját.</p>
<p><a href="save/$title" download="$title">Letöltés</a></p>
EOT;
copyRight();
htmlEnd();
?>





