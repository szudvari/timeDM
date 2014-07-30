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

        $id = $_GET["uid"];
        $con = connectDb();
        $user = getUserData($id);
        $action = $_SERVER["PHP_SELF"] . "?uid=$id";
        closeDb($con);
        echo <<<EOT
   <form method="post" action="$action"> 
   <table id="results">
    <tr>
    <th>Id</név>
    <th>Név</név>
    <th>Felhasználónév</név>
    <th>Új jelszó</th>
    <th>Új jelszó újra</th>
    <th>Módosít</th>    
    </tr>
    <tr>
    <td>{$user['id']}</td>
    <td>{$user['fullname']}</td>
    <td>{$user['user']}</td>
    <td><input type="password" name="pass1"></td>
    <td><input type="password" name="pass2"></td>
    <td><input type="submit" value="Módosít"></td>
    </tr>
    </table>
    </form>
    
EOT;
        @$pass1 = $_POST["pass1"];
        @$pass2 = $_POST["pass2"];
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            if ($pass1 != $pass2)
            {
                echo '<p id="notloggedin">A két jelszó nem egyezik!</p>';
            }
            else
            {
                $password = encodePass($pass1);
                $con = connectDb();
                changeUserPassword($id, $password, $con);
                closeDb($con);
                echo "<p id=\"logout\">A jelszó módosítva a következőre: $pass1";
                header("Refresh: 2; url=useradmin.php");
            }
        }
    }
}
copyRight();
htmlEnd();
?>