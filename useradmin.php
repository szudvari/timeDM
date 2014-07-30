<?php

session_start();
include_once 'functions.php';
include_once 'db.php';
include_once 'userdb.php';
include_once 'config.php';
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

        $con = connectDb();
        allUser();
        closeDb($con);
        echo<<<EOT
<form action=adduser.php>
<input id="submit3" type="submit" value="Új felhasználó felvétele">
</form>
EOT;
        if ($_SESSION['user']=="admin")
            echo '<p><a href="pswbackup.php">Adatbázis-szintű jelszó generálás</a></p>';
    }
}
copyRight();
htmlEnd();
?>

