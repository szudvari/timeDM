<?php
require_once 'db.php';
require_once 'config.php';
//Küldés dátuma
@$id = ($_POST["id"]);
@$travelo['sendingdate'] = ($_POST["sendingdate"]);
//Mappa, amiben a szükséges képek, file-ok tárolódnak
@$travelo['folder'] = ($_POST["folder"]);

//általános analytics
@$travelo['analytics_source'] = ($_POST["analytics_source"]);
@$travelo['analytics_medium'] = ($_POST["analytics_medium"]);
@$analytics_camapaign = "";
@$title = $travelo['analytics_source']." ".@$travelo['sendingdate'];

//Menü
//menü 1. hely
@$travelo['menu1'] = ($_POST["menu1"]);
@$travelo['menu1_link'] = ($_POST["menu1_link"]);
@$travelo['menu1_analytics'] = ($_POST["menu1_analytics"]);
//menü 2. hely
@$travelo['menu2'] = ($_POST["menu2"]);
@$travelo['menu2_link'] = ($_POST["menu2_link"]);
@$travelo['menu2_analytics'] = ($_POST["menu2_analytics"]);
//menü 3. hely
@$travelo['menu3'] = ($_POST["menu3"]);
@$travelo['menu3_link'] = ($_POST["menu3_link"]);
@$travelo['menu3_analytics'] = ($_POST["menu3_analytics"]);
//menü 4. hely
@$travelo['menu4'] = ($_POST["menu4"]);
@$travelo['menu4_link'] = ($_POST["menu4_link"]);
@$travelo['menu4_analytics'] = ($_POST["menu4_analytics"]);
//menü 5. hely
@$travelo['menu5'] = ($_POST["menu5"]);
@$travelo['menu5_link'] = ($_POST["menu5_link"]);
@$travelo['menu5_analytics'] = ($_POST["menu5_analytics"]);

//Ajánlatok
//nagyképes
@$travelo['bp_link'] = ($_POST["bp_link"]);
@$travelo['bp_analytics'] = ($_POST["bp_analytics"]);
@$travelo['bp_pic'] = ($_POST["bp_pic"]);
@$travelo['bp_title'] = ($_POST["bp_title"]);
@$travelo['bp_text'] = ($_POST["bp_text"]);
@$travelo['bp_price'] = ($_POST["bp_price"]);
//kisképes blokk
@$travelo['1ok'] = ($_POST["1ok"]);
//1. sor - bal
@$travelo['1l_link'] = ($_POST["1l_link"]);
@$travelo['1l_analytics'] = ($_POST["1l_analytics"]);
@$travelo['1l_pic'] = ($_POST["1l_pic"]);
@$travelo['1l_title'] = ($_POST["1l_title"]);
@$travelo['1l_subtitle'] = ($_POST["1l_subtitle"]);
@$travelo['1l_text'] = ($_POST["1l_text"]);
@$travelo['1l_price'] = ($_POST["1l_price"]);
//1. sor - jobb
@$travelo['1r_link'] = ($_POST["1r_link"]);
@$travelo['1r_analytics'] = ($_POST["1r_analytics"]);
@$travelo['1r_pic'] = ($_POST["1r_pic"]);
@$travelo['1r_title'] = ($_POST["1r_title"]);
@$travelo['1r_subtitle'] = ($_POST["1r_subtitle"]);
@$travelo['1r_text'] = ($_POST["1r_text"]);
@$travelo['1r_price'] = ($_POST["1r_price"]);

@$travelo['2ok'] = ($_POST["2ok"]);
//2. sor - bal
@$travelo['2l_link'] = ($_POST["2l_link"]);
@$travelo['2l_analytics'] = ($_POST["2l_analytics"]);
@$travelo['2l_pic'] = ($_POST["2l_pic"]);
@$travelo['2l_title'] = ($_POST["2l_title"]);
@$travelo['2l_subtitle'] = ($_POST["2l_subtitle"]);
@$travelo['2l_text'] = ($_POST["2l_text"]);
@$travelo['2l_price'] = ($_POST["2l_price"]);
//2. sor - jobb
@$travelo['2r_link'] = ($_POST["2r_link"]);
@$travelo['2r_analytics'] = ($_POST["2r_analytics"]);
@$travelo['2r_pic'] = ($_POST["2r_pic"]);
@$travelo['2r_title'] = ($_POST["2r_title"]);
@$travelo['2r_subtitle'] = ($_POST["2r_subtitle"]);
@$travelo['2r_text'] = ($_POST["2r_text"]);
@$travelo['2r_price'] = ($_POST["2r_price"]);

@$travelo['3ok'] = ($_POST["3ok"]);
//3. sor - bal
@$travelo['3l_link'] = ($_POST["3l_link"]);
@$travelo['3l_analytics'] = ($_POST["3l_analytics"]);
@$travelo['3l_pic'] = ($_POST["3l_pic"]);
@$travelo['3l_title'] = ($_POST["3l_title"]);
@$travelo['3l_subtitle'] = ($_POST["3l_subtitle"]);
@$travelo['3l_text'] = ($_POST["3l_text"]);
@$travelo['3l_price'] = ($_POST["3l_price"]);
//3. sor - jobb
@$travelo['3r_link'] = ($_POST["3r_link"]);
@$travelo['3r_analytics'] = ($_POST["3r_analytics"]);
@$travelo['3r_pic'] = ($_POST["3r_pic"]);
@$travelo['3r_title'] = ($_POST["3r_title"]);
@$travelo['3r_subtitle'] = ($_POST["3r_subtitle"]);
@$travelo['3r_text'] = ($_POST["3r_text"]);
@$travelo['3r_price'] = ($_POST["3r_price"]);

@$travelo['4ok'] = ($_POST["4ok"]);
//4. sor - bal
@$travelo['4l_link'] = ($_POST["4l_link"]);
@$travelo['4l_analytics'] = ($_POST["4l_analytics"]);
@$travelo['4l_pic'] = ($_POST["4l_pic"]);
@$travelo['4l_title'] = ($_POST["4l_title"]);
@$travelo['4l_subtitle'] = ($_POST["4l_subtitle"]);
@$travelo['4l_text'] = ($_POST["4l_text"]);
@$travelo['4l_price'] = ($_POST["4l_price"]);
//4. sor - jobb
@$travelo['4r_link'] = ($_POST["4r_link"]);
@$travelo['4r_analytics'] = ($_POST["4r_analytics"]);
@$travelo['4r_pic'] = ($_POST["4r_pic"]);
@$travelo['4r_title'] = ($_POST["4r_title"]);
@$travelo['4r_subtitle'] = ($_POST["4r_subtitle"]);
@$travelo['4r_text'] = ($_POST["4r_text"]);
@$travelo['4r_price'] = ($_POST["4r_price"]);

//5. sor
@$travelo['5ok'] = ($_POST["5ok"]);
//5. sor - bal
@$travelo['5l_link'] = ($_POST["5l_link"]);
@$travelo['5l_analytics'] = ($_POST["5l_analytics"]);
@$travelo['5l_pic'] = ($_POST["5l_pic"]);
@$travelo['5l_title'] = ($_POST["5l_title"]);
@$travelo['5l_subtitle'] = ($_POST["5l_subtitle"]);
@$travelo['5l_text'] = ($_POST["5l_text"]);
@$travelo['5l_price'] = ($_POST["5l_price"]);
//5. sor - jobb
@$travelo['5r_link'] = ($_POST["5r_link"]);
@$travelo['5r_analytics'] = ($_POST["5r_analytics"]);
@$travelo['5r_pic'] = ($_POST["5r_pic"]);
@$travelo['5r_title'] = ($_POST["5r_title"]);
@$travelo['5r_subtitle'] = ($_POST["5r_subtitle"]);
@$travelo['5r_text'] = ($_POST["5r_text"]);
@$travelo['5r_price'] = ($_POST["5r_price"]);

//Leggyakoribb keresések
//1 oszlopos
@$travelo['mostrecent_1c_ok'] = ($_POST["most_recent_1c_ok"]);
//1. sor
@$travelo['mostrecent_1_link'] = ($_POST["mostrecent_1_link"]);
@$travelo['mostrecent_1_analytics'] = ($_POST["mostrecent_1_analytics"]);
@$travelo['mostrecent_1_puretext'] = ($_POST["mostrecent_1_puretext"]);
@$travelo['mostrecent_1_highlitedtext'] = ($_POST["mostrecent_1_highlitedtext"]);
//2. sor
@$travelo['mostrecent_2_link'] = ($_POST["mostrecent_2_link"]);
@$travelo['mostrecent_2_analytics'] = ($_POST["mostrecent_2_analytics"]);
@$travelo['mostrecent_2_puretext'] = ($_POST["mostrecent_2_puretext"]);
@$travelo['mostrecent_2_highlitedtext'] = ($_POST["mostrecent_2_highlitedtext"]);
//3. sor
@$travelo['mostrecent_3_link'] = ($_POST["mostrecent_3_link"]);
@$travelo['mostrecent_3_analytics'] = ($_POST["mostrecent_3_analytics"]);
@$travelo['mostrecent_3_puretext'] = ($_POST["mostrecent_3_puretext"]);
@$travelo['mostrecent_3_highlitedtext'] = ($_POST["mostrecent_3_highlitedtext"]);
//4. sor
@$travelo['mostrecent_4_link'] = ($_POST["mostrecent_4_link"]);
@$travelo['mostrecent_4_analytics'] = ($_POST["mostrecent_4_analytics"]);
@$travelo['mostrecent_4_puretext'] = ($_POST["mostrecent_4_puretext"]);
@$travelo['mostrecent_4_highlitedtext'] = ($_POST["mostrecent_4_highlitedtext"]);
//5. sor
@$travelo['mostrecent_5_link'] = ($_POST["mostrecent_5_link"]);
@$travelo['mostrecent_5_analytics'] = ($_POST["mostrecent_5_analytics"]);
@$travelo['mostrecent_5_puretext'] = ($_POST["mostrecent_5_puretext"]);
@$travelo['mostrecent_5_highlitedtext'] = ($_POST["mostrecent_5_highlitedtext"]);
//2 oszlopos
@$travelo['mostrecent_2c_ok'] = ($_POST["most_recent_2c_ok"]);
//1. sor bal
@$travelo['mostrecent_1l_link'] = ($_POST["mostrecent_1l_link"]);
@$travelo['mostrecent_1l_analytics'] = ($_POST["mostrecent_1l_analytics"]);
@$travelo['mostrecent_1l_puretext'] = ($_POST["mostrecent_1l_puretext"]);
@$travelo['mostrecent_1l_highlitedtext'] = ($_POST["mostrecent_1l_highlitedtext"]);
//1. sor jobb
@$travelo['mostrecent_1r_link'] = ($_POST["mostrecent_1r_link"]);
@$travelo['mostrecent_1r_analytics'] = ($_POST["mostrecent_1r_analytics"]);
@$travelo['mostrecent_1r_puretext'] = ($_POST["mostrecent_1r_puretext"]);
@$travelo['mostrecent_1r_highlitedtext'] = ($_POST["mostrecent_1r_highlitedtext"]);
//2. sor bal
@$travelo['mostrecent_2l_link'] = ($_POST["mostrecent_2l_link"]);
@$travelo['mostrecent_2l_analytics'] = ($_POST["mostrecent_2l_analytics"]);
@$travelo['mostrecent_2l_puretext'] = ($_POST["mostrecent_2l_puretext"]);
@$travelo['mostrecent_2l_highlitedtext'] = ($_POST["mostrecent_2l_highlitedtext"]);
//2. sor jobb
@$travelo['mostrecent_2r_link'] = ($_POST["mostrecent_2r_link"]);
@$travelo['mostrecent_2r_analytics'] = ($_POST["mostrecent_2r_analytics"]);
@$travelo['mostrecent_2r_puretext'] = ($_POST["mostrecent_2r_puretext"]);
@$travelo['mostrecent_2r_highlitedtext'] = ($_POST["mostrecent_2r_highlitedtext"]);
//3. sor bal
@$travelo['mostrecent_3l_link'] = ($_POST["mostrecent_3l_link"]);
@$travelo['mostrecent_3l_analytics'] = ($_POST["mostrecent_3l_analytics"]);
@$travelo['mostrecent_3l_puretext'] = ($_POST["mostrecent_3l_puretext"]);
@$travelo['mostrecent_3l_highlitedtext'] = ($_POST["mostrecent_3l_highlitedtext"]);
//3. sor jobb
@$travelo['mostrecent_3r_link'] = ($_POST["mostrecent_3r_link"]);
@$travelo['mostrecent_3r_analytics'] = ($_POST["mostrecent_3r_analytics"]);
@$travelo['mostrecent_3r_puretext'] = ($_POST["mostrecent_3r_puretext"]);
@$travelo['mostrecent_3r_highlitedtext'] = ($_POST["mostrecent_3r_highlitedtext"]);
//4. sor bal
@$travelo['mostrecent_4l_link'] = ($_POST["mostrecent_4l_link"]);
@$travelo['mostrecent_4l_analytics'] = ($_POST["mostrecent_4l_analytics"]);
@$travelo['mostrecent_4l_puretext'] = ($_POST["mostrecent_4l_puretext"]);
@$travelo['mostrecent_4l_highlitedtext'] = ($_POST["mostrecent_4l_highlitedtext"]);
//4. sor jobb
@$travelo['mostrecent_4r_link'] = ($_POST["mostrecent_4r_link"]);
@$travelo['mostrecent_4r_analytics'] = ($_POST["mostrecent_4r_analytics"]);
@$travelo['mostrecent_4r_puretext'] = ($_POST["mostrecent_4r_puretext"]);
@$travelo['mostrecent_4r_highlitedtext'] = ($_POST["mostrecent_4r_highlitedtext"]);
//5. sor bal
@$travelo['mostrecent_5l_link'] = ($_POST["mostrecent_5l_link"]);
@$travelo['mostrecent_5l_analytics'] = ($_POST["mostrecent_5l_analytics"]);
@$travelo['mostrecent_5l_puretext'] = ($_POST["mostrecent_5l_puretext"]);
@$travelo['mostrecent_5l_highlitedtext'] = ($_POST["mostrecent_5l_highlitedtext"]);
//5. sor jobb
@$travelo['mostrecent_5r_link'] = ($_POST["mostrecent_5r_link"]);
@$travelo['mostrecent_5r_analytics'] = ($_POST["mostrecent_5r_analytics"]);
@$travelo['mostrecent_5r_puretext'] = ($_POST["mostrecent_5r_puretext"]);
@$travelo['mostrecent_5r_highlitedtext'] = ($_POST["mostrecent_5r_highlitedtext"]);

//Legfrisebb cikkek
@$travelo['article_ok'] = ($_POST["article_ok"]);
//Kiemelt
@$travelo['harticle_link'] = ($_POST["harticle_link"]);
@$travelo['harticle_analytics'] = ($_POST["harticle_analytics"]);
@$travelo['harticle_title'] = ($_POST["harticle_title"]);
@$travelo['harticle_date'] = ($_POST["harticle_date"]);
@$travelo['harticle_text'] = ($_POST["harticle_text"]);
//1.
@$travelo['article_1_link'] = ($_POST["article_1_link"]);
@$travelo['article_1_analytics'] = ($_POST["article_1_analytics"]);
@$travelo['article_1_title'] = ($_POST["article_1_title"]);
@$travelo['article_1_date'] = ($_POST["article_1_date"]);
//2.
@$travelo['article_2_link'] = ($_POST["article_2_link"]);
@$travelo['article_2_analytics'] = ($_POST["article_2_analytics"]);
@$travelo['article_2_title'] = ($_POST["article_2_title"]);
@$travelo['article_2_date'] = ($_POST["article_2_date"]);
//3.
@$travelo['article_3_link'] = ($_POST["article_3_link"]);
@$travelo['article_3_analytics'] = ($_POST["article_3_analytics"]);
@$travelo['article_3_title'] = ($_POST["article_3_title"]);
@$travelo['article_3_date'] = ($_POST["article_3_date"]);
//4.
@$travelo['article_4_link'] = ($_POST["article_4_link"]);
@$travelo['article_4_analytics'] = ($_POST["article_4_analytics"]);
@$travelo['article_4_title'] = ($_POST["article_4_title"]);
@$travelo['article_4_date'] = ($_POST["article_4_date"]);

//Hirdetések
@$travelo['ad_ok'] = ($_POST["advertisements"]);
//Banner
@$travelo['banner_link'] = ($_POST["banner_link"]);
@$travelo['banner_analytics'] = ($_POST["banner_analytics"]);
@$travelo['banner_pic'] = ($_POST["banner_pic"]);

//Szöveges
@$travelo['textad_link'] = ($_POST["textad_link"]);
@$travelo['textad_analytics'] = ($_POST["textad_analytics"]);
@$travelo['textad_pic'] = ($_POST["textad_pic"]);
@$travelo['textad_title'] = ($_POST["textad_title"]);
@$travelo['textad_text'] = ($_POST["textad_text"]);

//Turpan hírek
//1.
@$travelo['turpan_1_title'] = ($_POST["turpan_1_title"]);
@$travelo['turpan_1_link'] = ($_POST["turpan_1_link"]);
//2.
@$travelo['turpan_2_title'] = ($_POST["turpan_2_title"]);
@$travelo['turpan_2_link'] = ($_POST["turpan_2_link"]);
//3.
@$travelo['turpan_3_title'] = ($_POST["turpan_3_title"]);
@$travelo['turpan_3_link'] = ($_POST["turpan_3_link"]);
//4.
@$travelo['turpan_4_title'] = ($_POST["turpan_4_title"]);
@$travelo['turpan_4_link'] = ($_POST["turpan_4_link"]);

//Hirdetések2
@$travelo['ad2_ok'] = ($_POST["advertisements2"]);
//Banner1
@$travelo['banner2_1_link'] = ($_POST["banner2_1_link"]);
@$travelo['banner2_1_analytics'] = ($_POST["banner2_1_analytics"]);
@$travelo['banner2_1_pic'] = ($_POST['banner2_1_pic']);

//Banner2
@$travelo['banner2_2_link'] = ($_POST["banner2_2_link"]);
@$travelo['banner2_2_analytics'] = ($_POST["banner2_2_analytics"]);
@$travelo['banner2_2_pic'] = ($_POST['banner2_2_pic']);

//Szöveges
@$travelo['textad2_link'] = ($_POST["textad2_link"]);
@$travelo['textad2_analytics'] = ($_POST["textad2_analytics"]);
@$travelo['textad2_pic'] = ($_POST['textad2_pic']);
@$travelo['textad2_title'] = ($_POST["textad2_title"]);
@$travelo['textad2_text'] = ($_POST["textad2_text"]);

//Szöveges2_2
@$travelo['textad2_2_link'] = ($_POST["textad2_2_link"]);
@$travelo['textad2_2_analytics'] = ($_POST["textad2_2_analytics"]);
@$travelo['textad2_2_pic'] = ($_POST['textad2_2_pic']);
@$travelo['textad2_2_title'] = ($_POST["textad2_2_title"]);
@$travelo['textad2_2_text'] = ($_POST["textad2_2_text"]);
//print_r ($travelo);
$con = connectDb();
 updateHirlevTable("travelo_hirlev", $travelo, $id, $con);
closeDb($con);
$url = "success.php?hirlevel_id=$id";
header("Location: ".$url);
?>
