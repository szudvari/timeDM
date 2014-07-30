<?php

session_start();
include_once 'config.php';
require_once 'functions.php';
require_once 'userdb.php';
htmlHead($website['title'], $newsletter['traveloCharset'], $website['jquery'], $website['validationScript'], $website['stylesheet']);
if (!isset($_SESSION['login']))
{
    letterHead($website['version']);
    notLoggedIn();
}
else
{
    letterHeadLoggedIn($website['version'], $_SESSION['user'], $_SESSION['login']);
    $selector = $selector_err = "";
    $err = 0;
    $action = htmlspecialchars($_SERVER['PHP_SELF']);
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if (empty($_POST["selector"]))
        {
            $selector_err = "Válaszd ki a hírlevelet!";
            $err+=1;
        }
        else
        {
            $selector = $_POST["selector"];
        }
    }

    nlInput($action, $selector, $selector_err);
    if (($err == 0) && ($_SERVER["REQUEST_METHOD"] == "POST"))
    {
        if ($selector == "travelo")
        {
            traveloInput();
        }
        elseif ($selector == "life")
        {
            lifeInput();
        }
        else
        {
            lifeInputOnepic();
        }
    }
}
copyRight();
htmlEnd();
?>
