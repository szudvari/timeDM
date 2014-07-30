<?php
session_start();
require_once 'functions.php';
include_once 'config.php';
htmlHead($website['title'], $newsletter['traveloCharset'], $website['jquery'], $website['validationScript'], $website['stylesheet']);
if (!isset($_SESSION['login']))
{
    letterHead($website['version']);
}
else
{
    letterHeadLoggedIn($website['version'], $_SESSION['user'], $_SESSION['login']);
}
$b_url_err = $b_source_err = $b_medium_err = $b_campaign_err = "";
$b_err = 0;
$b_url = $b_source = $b_medium = $b_campaign = $b_separator = $b_link = "";
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    if (empty($_POST["url"]))
    {
        $b_url_err = "Add meg az URL-t!";
        $b_err+=1;
    }
    else
    {
        $b_url = $_POST["url"];
        if ((!preg_match('#^http://.+#', $b_url)) && (!preg_match('#^https://.+#', $b_url)))
        {
            $b_url_err = "Hibás az URL! Használj http:// vagy https:// kezdetű linket!";
            $b_err+=1;
        }
    }
    if (empty($_POST["source"]))
    {
        $b_source_err = "Add meg a forrást!";
        $b_err+=1;
    }
    else
    {
        $b_source = $_POST["source"];
    }
    if (empty($_POST["medium"]))
    {
        $b_medium_err = "Add meg a médiumot!";
        $b_err+=1;
    }
    else
    {
        $b_medium = $_POST["medium"];
    }
    if (empty($_POST["campaign"]))
    {
        $b_campaign_err = "Add meg a kampányt!";
        $b_err+=1;
    }
    else
    {
        $b_campaign = $_POST["campaign"];
    }
    $b_separator = separator($b_url);
    $b_link = $b_url . $b_separator . 'utm_source=' . $b_source . '&utm_medium=' . $b_medium . '&utm_campaign=' . $b_campaign;
}
?>
<h2> URL Builder </h2>
<p><span class="error">* Kötelező mező</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="url" class="offer">URL: </label><input class="base" type="text" id="url" name="url" value="<?php echo $b_url; ?>">
    <span class="error"><?php
if (empty($b_url))
{
    echo "*";
} echo $b_url_err;
?></span><br><br>
    <label for="source" class="offer">Source: </label><input class="base" type="text" id="source" name="source" value="<?php echo $b_source; ?>">
    <span class="error"><?php
        if (empty($b_source))
        {
            echo "*";
        } echo $b_source_err;
        ?></span><br><br>
    <label for="medium" class="offer">Medium: </label><input class="base" type="text" id="medium" name="medium" value="<?php echo $b_medium; ?>">
    <span class="error"><?php
        if (empty($b_medium))
        {
            echo "*";
        } echo $b_medium_err;
        ?></span><br><br>
    <label for="campaign" class="offer">Campaign: </label><input class="base" type="text" id="campaign" name="campaign" value="<?php echo $b_campaign; ?>">
    <span class="error"><?php
        if (empty($b_campaign))
        {
            echo "*";
        } echo $b_campaign_err;
        ?></span><br><br>
    <input id="submit2" type="submit" value="Felépít">
</form>
        <?php
        if (($b_err == 0) && ($_SERVER["REQUEST_METHOD"] == "POST"))
        {
            echo "<h3>A felépített URL:</h3>";
            echo "<p>$b_link</p>";
            echo '<p><a href=' . $b_link . '" target="_blank">TESZT</a></p>';
            echo '<p><form><input type="button" onClick="history.go(0)" value="Adatok törlése"></form></p>';
        }
//echo $b_err;
        copyRight();
        htmlEnd();
        ?>