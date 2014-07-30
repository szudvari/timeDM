<?php
session_start();
include_once 'functions.php';
include_once 'db.php';
include_once 'config.php';
include_once 'userdb.php';

htmlHead($website['title'], $newsletter['traveloCharset'], NULL, NULL, $website['stylesheet']);
if (!isset($_SESSION['login']))
{
    letterHead($website['version']);
    notLoggedIn();
}
else
{
    letterHeadLoggedIn($website['version'], $_SESSION['user'], $_SESSION['login']);
    $pass = $_POST['pass'];
    $pass2 = $_POST['pass2'];
    $userdata['user'] = $_POST['user'];
    $userdata['name'] = $_POST['fullname'];
    $userdata['pass'] = encodePass($pass);

    if ($pass == $pass2)
    {
        $con = connectDb();
        insertUserDb($userdata, $con);
        closeDb($con);
        echo '<p id="logout"> Felhasználó felvéve.</p>';
        header("Refresh: 2; url=useradmin.php");
        
    }
    else
    {
        echo "A jelszó nem egyezik!";
        header("Refresh: 2; url={$_SERVER['HTTP_REFERER']}");
    }
    copyRight();
    htmlEnd();
}
?>