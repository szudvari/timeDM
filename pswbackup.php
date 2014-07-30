<?php

session_start();
include_once 'userdb.php';
include_once 'db.php';
include_once 'config.php';
include_once 'functions.php';

htmlHead($website['title'], $newsletter['traveloCharset'], NULL, NULL, $website['stylesheet']);
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

        echo <<<EOT
   <form method="post" action="$action"> 
   <table id="results">
    <th>Jelszó</th>
    <th>&nbsp;</th>
    </tr>
    <tr>
    <td><input type="password" name="pass1"></td>
    <td><input type="submit" value="Megmutat"></td>
    </tr>
    </table>
    </form>
    
EOT;
        @$pass1 = $_POST["pass1"];
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $password = encodePass($pass1);
            echo "<b>A beírt jelszó:</b> $pass1";
            echo "<br><b>A titkosított jelszó:</b> $password<br>";
        }
    }
}
copyRight();
htmlEnd();
?>