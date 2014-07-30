<?php
require_once 'db.php';
require_once 'config.php';
require_once 'userdb.php';
//Küldés dátuma
@$id = ($_POST["id"]);
@$travelo['sendingdate'] = iconv("UTF-8", "ISO-8859-2",($_POST["sendingdate"]));
//Mappa, amiben a szükséges képek, file-ok tárolódnak
@$travelo['folder'] = iconv("UTF-8", "ISO-8859-2",($_POST["folder"]));

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
@$travelo['bp_pic'] = iconv("UTF-8", "ISO-8859-2",($_POST["bp_pic"]));
@$travelo['bp_title'] = iconv("UTF-8", "ISO-8859-2",($_POST["bp_title"]));
@$travelo['bp_text'] = iconv("UTF-8", "ISO-8859-2",($_POST["bp_text"]));
@$travelo['bp_price'] = iconv("UTF-8", "ISO-8859-2",($_POST["bp_price"]));
$con = connectDbIso();
updateHirlevTable("life_op_hirlev", $travelo, $id, $con);
closeDb($con);
$url = "success.php?hirlevel_id=$id";
header("Location: ".$url);
?>