<?php

session_start();
include_once 'userdb.php';
include_once 'db.php';
include_once 'functions.php';
htmlHead($website['title'], $newsletter['traveloCharset'], $website['jquery'], $website['validationScript'], $website['stylesheet']);
if (!isset($_SESSION['login']))
{
    letterHead($website['version']);
    notLoggedIn();
}
else
{
    letterHeadLoggedIn($website['version'], $_SESSION['user'], $_SESSION['login']);
    if ($_SESSION['login'] != 1)
    {
        echo "<p id=\"notloggedin\"> A kért oldal megtekintéséhez nincs jogosultsága.</br>"
        . "Kérem, lépjen kapcsolatba a rendszergazdával!<br>";
    }
    else
    {
        $id = $_GET["uid"];
        if ($id != 1)
        {
            $status = $_GET["status"];
            $con = connectDb();
            changeUserSatus($id, $status, $con);
            closeDb($con);
            header("Location:useradmin.php");
        }
        else
        {

            echo "<p id=\"notloggedin\">A főadmin nem tiltható ki!</p>";
            header("Refresh: 3; url=useradmin.php");
        }
    }
}
copyRight();
htmlEnd();
