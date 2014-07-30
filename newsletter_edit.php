<?php

session_start();
require_once 'db.php';
require_once 'functions.php';
require_once 'config.php';
require_once 'userdb.php';
$id = $_GET['hirlevel_id'];
$type = $_GET['hirlevel_type'];
htmlHead($website['title'], $newsletter['traveloCharset'], $website['jquery'], $website['validationScript'], $website['stylesheet']);


if (!isset($_SESSION['login']))
{
    letterHead($website['version']);
    notLoggedIn();
}
else
{
    letterHeadLoggedIn($website['version'], $_SESSION['user'], $_SESSION['login']);
    switch ($type) {
        case 1:
            $table = "travelo_hirlev";
            $con = connectDb();
            $travelo = getANewsletter($table, $id);
            closeDb($con);
            if (empty($travelo))
            {
                echo '<p id="notloggedin"> Hiba! A kért hírlevél nem létezik.</p>';
                header("Refresh: 3; url=newsletter_list.php");
            }
            else
            {
                traveloEdit($travelo, $id);
            }
            break;
        case 2:
            $table = "life_hirlev";
            $con = connectDb();
            $travelo = getANewsletter($table, $id);
            closeDb($con);
            if (empty($travelo))
            {
                echo '<p id="notloggedin"> Hiba! A kért hírlevél nem létezik.</p>';
                header("Refresh: 3; url=newsletter_list.php");
            }
            else
            {
                lifeEdit($travelo, $id);
            }
            break;
        case 3:
            $table = "life_op_hirlev";
            $con = connectDb();
            $travelo = getANewsletter($table, $id);
            closeDb($con);
            if (empty($travelo))
            {
                echo '<p id="notloggedin"> Hiba! A kért hírlevél nem létezik.</p>';
                header("Refresh: 3; url=newsletter_list.php");
            }
            else
            {
                lifeOpEdit($travelo, $id);
            }
            break;
        default:
            echo '<p id="notloggedin"> Hiba! Nem létező hírlevéltípus.</p>';
            header("Refresh: 3; url=newsletter_list");
    }
}
copyRight();
htmlEnd();
?>
