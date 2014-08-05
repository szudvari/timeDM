<?php
session_start();
require_once 'db.php';
require_once 'config.php';
require_once 'userdb.php';
require_once 'functions.php';
//Küldés dátuma
@$type = 2;
@$travelo['sendingdate'] = iconv("UTF-8", "ISO-8859-2",($_POST["sendingdate"]));
//Mappa, amiben a szükséges képek, file-ok tárolódnak
@$travelo['folder'] = iconv("UTF-8", "ISO-8859-2",($_POST["folder"]));
@$folder_name = getFolderName($travelo['folder']);
@$dir="/var/local/www/stuff.szallas.travelo.hu/hirlevel/dm/".$folder_name;
//echo $dir;
if (!mkdir($dir)) {
    if (file_exists($dir)) {
        echo "A könyvtár már létezik";
    } 
    else {
        die("hiba, a könyvtár nem jött létre");
    }
}
else { 
    chmod($dir, 0775);
}

//általános analytics
@$travelo['analytics_source'] = iconv("UTF-8", "ISO-8859-2",($_POST["analytics_source"]));
@$travelo['analytics_medium'] = iconv("UTF-8", "ISO-8859-2",($_POST["analytics_medium"]));
@$analytics_camapaign = "";
@$title = $travelo['analytics_source']." ".@$travelo['sendingdate'];

//Menü
//menü 1. hely
@$travelo['menu1'] = iconv("UTF-8", "ISO-8859-2",($_POST["menu1"]));
@$travelo['menu1_link'] = iconv("UTF-8", "ISO-8859-2",($_POST["menu1_link"]));
@$travelo['menu1_analytics'] = iconv("UTF-8", "ISO-8859-2",($_POST["menu1_analytics"]));
//menü 2. hely
@$travelo['menu2'] = iconv("UTF-8", "ISO-8859-2",($_POST["menu2"]));
@$travelo['menu2_link'] = iconv("UTF-8", "ISO-8859-2",($_POST["menu2_link"]));
@$travelo['menu2_analytics'] = iconv("UTF-8", "ISO-8859-2",($_POST["menu2_analytics"]));
//menü 3. hely
@$travelo['menu3'] = iconv("UTF-8", "ISO-8859-2",($_POST["menu3"]));
@$travelo['menu3_link'] = iconv("UTF-8", "ISO-8859-2",($_POST["menu3_link"]));
@$travelo['menu3_analytics'] = iconv("UTF-8", "ISO-8859-2",($_POST["menu3_analytics"]));
//menü 4. hely
@$travelo['menu4'] = iconv("UTF-8", "ISO-8859-2",($_POST["menu4"]));
@$travelo['menu4_link'] = iconv("UTF-8", "ISO-8859-2",($_POST["menu4_link"]));
@$travelo['menu4_analytics'] = iconv("UTF-8", "ISO-8859-2",($_POST["menu4_analytics"]));

//Ajánlatok
//nagyképes
@$travelo['bp_link'] = iconv("UTF-8", "ISO-8859-2",($_POST["bp_link"]));
@$travelo['bp_analytics'] = iconv("UTF-8", "ISO-8859-2",($_POST["bp_analytics"]));
@$travelo['bp_pic'] = iconv("UTF-8", "ISO-8859-2",($_FILES['bp_pic']['name']));
@$travelo['bp_title'] = iconv("UTF-8", "ISO-8859-2",($_POST["bp_title"]));
@$travelo['bp_text'] = iconv("UTF-8", "ISO-8859-2",($_POST["bp_text"]));
@$travelo['bp_price'] = iconv("UTF-8", "ISO-8859-2",($_POST["bp_price"]));
//kisképes blokk
@$travelo['1ok'] = iconv("UTF-8", "ISO-8859-2",($_POST["1ok"]));
//1. sor - bal
@$travelo['1l_link'] = iconv("UTF-8", "ISO-8859-2",($_POST["1l_link"]));
@$travelo['1l_analytics'] = iconv("UTF-8", "ISO-8859-2",($_POST["1l_analytics"]));
@$travelo['1l_pic'] = iconv("UTF-8", "ISO-8859-2",($_FILES['1l_pic']['name']));
@$travelo['1l_title'] = iconv("UTF-8", "ISO-8859-2",($_POST["1l_title"]));
@$travelo['1l_subtitle'] =  iconv("UTF-8", "ISO-8859-2", ($_POST["1l_subtitle"]));
@$travelo['1l_text'] =  iconv("UTF-8", "ISO-8859-2", ($_POST["1l_text"]));
@$travelo['1l_price'] =  iconv("UTF-8", "ISO-8859-2", ($_POST["1l_price"]));
//1. sor - jobb
@$travelo['1r_link'] =  iconv("UTF-8", "ISO-8859-2", ($_POST["1r_link"]));
@$travelo['1r_analytics'] =  iconv("UTF-8", "ISO-8859-2", ($_POST["1r_analytics"]));
@$travelo['1r_pic'] =  iconv("UTF-8", "ISO-8859-2", ($_FILES['1r_pic']['name']));
@$travelo['1r_title'] =  iconv("UTF-8", "ISO-8859-2", ($_POST["1r_title"]));
@$travelo['1r_subtitle'] =  iconv("UTF-8", "ISO-8859-2", ($_POST["1r_subtitle"]));
@$travelo['1r_text'] =  iconv("UTF-8", "ISO-8859-2", ($_POST["1r_text"]));
@$travelo['1r_price'] =  iconv("UTF-8", "ISO-8859-2", ($_POST["1r_price"]));

@$travelo['2ok'] =  iconv("UTF-8", "ISO-8859-2", ($_POST["2ok"]));
//2. sor - bal
@$travelo['2l_link'] =  iconv("UTF-8", "ISO-8859-2", ($_POST["2l_link"]));
@$travelo['2l_analytics'] =  iconv("UTF-8", "ISO-8859-2", ($_POST["2l_analytics"]));
@$travelo['2l_pic'] =  iconv("UTF-8", "ISO-8859-2", ($_FILES['2l_pic']['name']));
@$travelo['2l_title'] =  iconv("UTF-8", "ISO-8859-2", ($_POST["2l_title"]));
@$travelo['2l_subtitle'] =  iconv("UTF-8", "ISO-8859-2", ($_POST["2l_subtitle"]));
@$travelo['2l_text'] =  iconv("UTF-8", "ISO-8859-2", ($_POST["2l_text"]));
@$travelo['2l_price'] =  iconv("UTF-8", "ISO-8859-2", ($_POST["2l_price"]));
//2. sor - jobb
@$travelo['2r_link'] =  iconv("UTF-8", "ISO-8859-2", ($_POST["2r_link"]));
@$travelo['2r_analytics'] =  iconv("UTF-8", "ISO-8859-2", ($_POST["2r_analytics"]));
@$travelo['2r_pic'] =  iconv("UTF-8", "ISO-8859-2", ($_FILES['2r_pic']['name']));
@$travelo['2r_title'] =  iconv("UTF-8", "ISO-8859-2", ($_POST["2r_title"]));
@$travelo['2r_subtitle'] =  iconv("UTF-8", "ISO-8859-2", ($_POST["2r_subtitle"]));
@$travelo['2r_text'] =  iconv("UTF-8", "ISO-8859-2", ($_POST["2r_text"]));
@$travelo['2r_price'] =  iconv("UTF-8", "ISO-8859-2", ($_POST["2r_price"]));

@$travelo['3ok'] =  iconv("UTF-8", "ISO-8859-2", ($_POST["3ok"]));
//3. sor - bal
@$travelo['3l_link'] =  iconv("UTF-8", "ISO-8859-2", ($_POST["3l_link"]));
@$travelo['3l_analytics'] =  iconv("UTF-8", "ISO-8859-2", ($_POST["3l_analytics"]));
@$travelo['3l_pic'] =  iconv("UTF-8", "ISO-8859-2", ($_FILES['3l_pic']['name']));
@$travelo['3l_title'] =  iconv("UTF-8", "ISO-8859-2", ($_POST["3l_title"]));
@$travelo['3l_subtitle'] =  iconv("UTF-8", "ISO-8859-2", ($_POST["3l_subtitle"]));
@$travelo['3l_text'] =  iconv("UTF-8", "ISO-8859-2", ($_POST["3l_text"]));
@$travelo['3l_price'] =  iconv("UTF-8", "ISO-8859-2", ($_POST["3l_price"]));
//3. sor - jobb
@$travelo['3r_link'] =  iconv("UTF-8", "ISO-8859-2", ($_POST["3r_link"]));
@$travelo['3r_analytics'] =  iconv("UTF-8", "ISO-8859-2", ($_POST["3r_analytics"]));
@$travelo['3r_pic'] =  iconv("UTF-8", "ISO-8859-2", ($_FILES['3r_pic']['name']));
@$travelo['3r_title'] =  iconv("UTF-8", "ISO-8859-2", ($_POST["3r_title"]));
@$travelo['3r_subtitle'] =  iconv("UTF-8", "ISO-8859-2", ($_POST["3r_subtitle"]));
@$travelo['3r_text'] =  iconv("UTF-8", "ISO-8859-2", ($_POST["3r_text"]));
@$travelo['3r_price'] =  iconv("UTF-8", "ISO-8859-2", ($_POST["3r_price"]));

@$travelo['4ok'] =  iconv("UTF-8", "ISO-8859-2", ($_POST["4ok"]));
//4. sor - bal
@$travelo['4l_link'] =  iconv("UTF-8", "ISO-8859-2", ($_POST["4l_link"]));
@$travelo['4l_analytics'] =  iconv("UTF-8", "ISO-8859-2", ($_POST["4l_analytics"]));
@$travelo['4l_pic'] =  iconv("UTF-8", "ISO-8859-2", ($_FILES['4l_pic']['name']));
@$travelo['4l_title'] =  iconv("UTF-8", "ISO-8859-2", ($_POST["4l_title"]));
@$travelo['4l_subtitle'] =  iconv("UTF-8", "ISO-8859-2", ($_POST["4l_subtitle"]));
@$travelo['4l_text'] =  iconv("UTF-8", "ISO-8859-2", ($_POST["4l_text"]));
@$travelo['4l_price'] =  iconv("UTF-8", "ISO-8859-2", ($_POST["4l_price"]));
//4. sor - jobb
@$travelo['4r_link'] =  iconv("UTF-8", "ISO-8859-2", ($_POST["4r_link"]));
@$travelo['4r_analytics'] =  iconv("UTF-8", "ISO-8859-2", ($_POST["4r_analytics"]));
@$travelo['4r_pic'] =  iconv("UTF-8", "ISO-8859-2", ($_FILES['4r_pic']['name']));
@$travelo['4r_title'] =  iconv("UTF-8", "ISO-8859-2", ($_POST["4r_title"]));
@$travelo['4r_subtitle'] =  iconv("UTF-8", "ISO-8859-2", ($_POST["4r_subtitle"]));
@$travelo['4r_text'] =  iconv("UTF-8", "ISO-8859-2", ($_POST["4r_text"]));
@$travelo['4r_price'] =  iconv("UTF-8", "ISO-8859-2", ($_POST["4r_price"]));

//5. sor
@$travelo['5ok'] =  iconv("UTF-8", "ISO-8859-2", ($_POST["5ok"]));
//5. sor - bal
@$travelo['5l_link'] =  iconv("UTF-8", "ISO-8859-2", ($_POST["5l_link"]));
@$travelo['5l_analytics'] =  iconv("UTF-8", "ISO-8859-2", ($_POST["5l_analytics"]));
@$travelo['5l_pic'] =  iconv("UTF-8", "ISO-8859-2", ($_FILES['5l_pic']['name']));
@$travelo['5l_title'] =  iconv("UTF-8", "ISO-8859-2", ($_POST["5l_title"]));
@$travelo['5l_subtitle'] =  iconv("UTF-8", "ISO-8859-2", ($_POST["5l_subtitle"]));
@$travelo['5l_text'] =  iconv("UTF-8", "ISO-8859-2", ($_POST["5l_text"]));
@$travelo['5l_price'] =  iconv("UTF-8", "ISO-8859-2", ($_POST["5l_price"]));
//5. sor - jobb
@$travelo['5r_link'] =  iconv("UTF-8", "ISO-8859-2", ($_POST["5r_link"]));
@$travelo['5r_analytics'] =  iconv("UTF-8", "ISO-8859-2", ($_POST["5r_analytics"]));
@$travelo['5r_pic'] =  iconv("UTF-8", "ISO-8859-2", ($_FILES['5r_pic']['name']));
@$travelo['5r_title'] =  iconv("UTF-8", "ISO-8859-2", ($_POST["5r_title"]));
@$travelo['5r_subtitle'] =  iconv("UTF-8", "ISO-8859-2", ($_POST["5r_subtitle"]));
@$travelo['5r_text'] =  iconv("UTF-8", "ISO-8859-2", ($_POST["5r_text"]));
@$travelo['5r_price'] =  iconv("UTF-8", "ISO-8859-2", ($_POST["5r_price"]));

if (($travelo['bp_pic'])!=""){
    upload_picture($_FILES["bp_pic"], $dir);
}
if (($travelo['1l_pic'])!=""){
    upload_picture($_FILES["1l_pic"], $dir);
}
if (($travelo['1r_pic'])!=""){
    upload_picture($_FILES["1r_pic"], $dir);
}
if (($travelo['2l_pic'])!=""){
    upload_picture($_FILES["2l_pic"], $dir);
}
if (($travelo['2r_pic'])!=""){
    upload_picture($_FILES["2r_pic"], $dir);
}
if (($travelo['3l_pic'])!=""){
    upload_picture($_FILES["3l_pic"], $dir);
}
if (($travelo['3r_pic'])!=""){
    upload_picture($_FILES["3r_pic"], $dir);
}
if (($travelo['4l_pic'])!=""){
    upload_picture($_FILES["4l_pic"], $dir);
}
if (($travelo['4r_pic'])!=""){
    upload_picture($_FILES["4r_pic"], $dir);
}
if (($travelo['5l_pic'])!=""){
    upload_picture($_FILES["5l_pic"], $dir);
}

$con = connectDbIso();
$travelo['hirlev_id'] = insertMainTable($travelo, $title, $type, $_SESSION['userid'], $con);
insertHirlevTable("life_hirlev", $travelo, $con);
closeDb($con);
$url = "success.php?hirlevel_id={$travelo['hirlev_id']}";
header("Location: ".$url);
?>