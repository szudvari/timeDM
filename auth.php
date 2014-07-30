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
}
else
{
    letterHeadLoggedIn($website['version'], $_SESSION['user'], $_SESSION['login']);
}
$userdata['user'] = $_POST['user'];
$userdata['pass'] = encodePass($_POST['pass']);

$con = connectDb();
$login = authUserDb($userdata, $con);
closeDb($con);

if ($login)
{
//    echo 'success';
    $con = connectDb();
    $_SESSION['login'] = getUserRole($userdata);
    $_SESSION['user'] = $userdata['user'];
    $_SESSION['userid'] = getUserId($userdata);
    closeDb($con);
    header("Location: index.php");
}
else
{
    echo '<p id="notloggedin">Hibás felhasználónév vagy jelszó.</p>';
    header("Refresh: 3; url={$_SERVER['HTTP_REFERER']}");
}

