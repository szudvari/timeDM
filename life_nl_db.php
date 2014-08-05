<?php
require_once 'db.php';
require_once 'userdb.php';
require_once 'functions.php';
require_once 'config.php';
$id = $_GET['hirlevel_id'];
@$save=$_GET['save'];
$table = "life_hirlev";
$con = connectDbIso();
$travelo = getANewsletterIso($table, $id);
closeDb($con);

$style['travelo_style'] = <<<EOT
       <style type=\'text/css\'> @font-face {
	font-family: "OpenSans";
	src: local('¢'), url(http://szallas.travelo.hu/public/css/fonts/OpenSans-Regular.ttf) format('truetype');
	font-weight: normal;
	font-style: normal;
}
</style>
EOT;
$style['travelo_title'] = 'color:#1a438a; font-size:16px; font-weight:bold; text-decoration:none; text-transform:uppercase';
$style['travelo_bptext'] = 'color:#010101; font-size:14px; text-decoration:none;';
$style['travelo_subtitle'] = 'color:#5d5d5d; font-size:13px; text-decoration:none;';
$style['travelo_text'] = 'color:#010101; font-size:13px; text-decoration:none;';
$style['travelo_logo_img'] = '<img src="life_topmenu-logo.png">';
$style['travelo_header'] = 'padding: 15px 0 8px';
$style['travelo_logo'] = '<a href="http://utazas.life.hu/?utm_source=' . $travelo['analytics_source'] . '&utm_medium=' . $travelo['analytics_medium'] . '&utm_campaign=fooldal" target="_blank">' . $style['travelo_logo_img'] . '</a>';

$style['travelo_menu'] = '"background: -webkit-linear-gradient(rgba(88,65,31,1), rgba(135,113,66,1)); background: -o-linear-gradient(rgba(88,65,31,1), rgba(135,113,66,1)); background: -moz-linear-gradient(rgba(88,65,31,1), rgba(135,113,66,1)); background:linear-gradient(rgba(88,65,31,1), rgba(135,113,66,1)); padding: 8px 0px 8px 0px; text-align: center; font-size: 14px; font-weight: lighter; font-color:#f1ecdd; width:17%; border-right-style:solid; border-right-width:2px; border-right-color:#f1ecdd;"';

$travelo_separator['t_menu1'] = separator($travelo['menu1_link']);
$travelo_separator['t_menu2'] = separator($travelo['menu2_link']);
$travelo_separator['t_menu3'] = separator($travelo['menu3_link']);
$travelo_separator['t_menu4'] = separator($travelo['menu4_link']);
$travelo_menu['1'] = '<a href="' . $travelo['menu1_link'] . $travelo_separator['t_menu1'] . 'utm_source=' . $travelo['analytics_source'] . '&utm_medium=' . $travelo['analytics_medium'] . '&utm_campaign=' . $travelo['menu1_analytics'] . '" style="text-decoration: none; color: #fff; font-weight: bold;" target="_blank">' . $travelo['menu1'] . '</a>';
$travelo_menu['2'] = '<a href="' . $travelo['menu2_link'] . $travelo_separator['t_menu2'] . 'utm_source=' . $travelo['analytics_source'] . '&utm_medium=' . $travelo['analytics_medium'] . '&utm_campaign=' . $travelo['menu2_analytics'] . '" style="text-decoration: none; color: #fff; font-weight: bold;" target="_blank">' . $travelo['menu2'] . '</a>';
$travelo_menu['3'] = '<a href="' . $travelo['menu3_link'] . $travelo_separator['t_menu3'] . 'utm_source=' . $travelo['analytics_source'] . '&utm_medium=' . $travelo['analytics_medium'] . '&utm_campaign=' . $travelo['menu3_analytics'] . '" style="text-decoration: none; color: #fff; font-weight: bold;" target="_blank">' . $travelo['menu3'] . '</a>';
$travelo_menu['4'] = '<a href="' . $travelo['menu4_link'] . $travelo_separator['t_menu4'] . 'utm_source=' . $travelo['analytics_source'] . '&utm_medium=' . $travelo['analytics_medium'] . '&utm_campaign=' . $travelo['menu4_analytics'] . '" style="text-decoration: none; color: #fff; font-weight: bold;" target="_blank">' . $travelo['menu4'] . '</a>';

//nagyképes
$travelo_separator['bp_link'] = separator($travelo['bp_link']);
$travelo_bp['link'] = $travelo['bp_link'] . $travelo_separator['bp_link'] . 'utm_source=' . $travelo['analytics_source'] . '&utm_medium=' . $travelo['analytics_medium'] . '&utm_campaign=' . $travelo['bp_analytics'];
$travelo_bp['pic'] = '<a href="' . $travelo_bp['link'] . '"><img src="' . $travelo['bp_pic'] . '" border="0"></a>';
$travelo_bp['title'] = '<a href="' . $travelo_bp['link'] . '" style="' . $style['travelo_title'] . '">' . $travelo['bp_title'] . '</a>';
$travelo_bp['text'] = '<a href="' . $travelo_bp['link'] . '" style="' . $style['travelo_bptext'] . '">' . $travelo['bp_text'] . '</a>';

//kisképes blokk
//1 - bal
$travelo_separator['1l_link'] = separator($travelo['1l_link']);
$smallpic1['l_link'] = $travelo['1l_link'] . $travelo_separator['1l_link'] . 'utm_source=' . $travelo['analytics_source'] . '&utm_medium=' . $travelo['analytics_medium'] . '&utm_campaign=' . $travelo['1l_analytics'];
$smallpic1['l_pic'] = '<a href="' . $smallpic1['l_link'] . '"><img src="' . $travelo['1l_pic'] . '" border="0"></a>';
$smallpic1['l_title'] = '<a href="' . $smallpic1['l_link'] . '" style="' . $style['travelo_title'] . '">' . $travelo['1l_title'] . '</a>';
$smallpic1['l_subtitle'] = '<a href="' . $smallpic1['l_link'] . '" style="' . $style['travelo_subtitle'] . '">' . $travelo['1l_subtitle'] . '</a>';
$smallpic1['l_text'] = '<a href="' . $smallpic1['l_link'] . '" style="' . $style['travelo_text'] . '">' . $travelo['1l_text'] . '</a>';
//1 - jobb
$travelo_separator['1r_link'] = separator($travelo['1r_link']);
$smallpic1['r_link'] = $travelo['1r_link'] . $travelo_separator['1r_link'] . 'utm_source=' . $travelo['analytics_source'] . '&utm_medium=' . $travelo['analytics_medium'] . '&utm_campaign=' . $travelo['1r_analytics'];
$smallpic1['r_pic'] = '<a href="' . $smallpic1['r_link'] . '"><img src="' . $travelo['1r_pic'] . '" border="0"></a>';
$smallpic1['r_title'] = '<a href="' . $smallpic1['r_link'] . '" style="' . $style['travelo_title'] . '">' . $travelo['1r_title'] . '</a>';
$smallpic1['r_subtitle'] = '<a href="' . $smallpic1['r_link'] . '" style="' . $style['travelo_subtitle'] . '">' . $travelo['1r_subtitle'] . '</a>';
$smallpic1['r_text'] = '<a href="' . $smallpic1['r_link'] . '" style="' . $style['travelo_text'] . '">' . $travelo['1r_text'] . '</a>';
//2 - bal
$travelo_separator['2l_link'] = separator($travelo['2l_link']);
$smallpic2['l_link'] = $travelo['2l_link'] . $travelo_separator['2l_link'] . 'utm_source=' . $travelo['analytics_source'] . '&utm_medium=' . $travelo['analytics_medium'] . '&utm_campaign=' . $travelo['2l_analytics'];
$smallpic2['l_pic'] = '<a href="' . $smallpic2['l_link'] . '"><img src="' . $travelo['2l_pic'] . '" border="0"></a>';
$smallpic2['l_title'] = '<a href="' . $smallpic2['l_link'] . '" style="' . $style['travelo_title'] . '">' . $travelo['2l_title'] . '</a>';
$smallpic2['l_subtitle'] = '<a href="' . $smallpic2['l_link'] . '" style="' . $style['travelo_subtitle'] . '">' . $travelo['2l_subtitle'] . '</a>';
$smallpic2['l_text'] = '<a href="' . $smallpic2['l_link'] . '" style="' . $style['travelo_text'] . '">' . $travelo['2l_text'] . '</a>';
//2 - jobb
$travelo_separator['2r_link'] = separator($travelo['2r_link']);
$smallpic2['r_link'] = $travelo['2r_link'] . $travelo_separator['2r_link'] . 'utm_source=' . $travelo['analytics_source'] . '&utm_medium=' . $travelo['analytics_medium'] . '&utm_campaign=' . $travelo['2r_analytics'];
$smallpic2['r_pic'] = '<a href="' . $smallpic2['r_link'] . '"><img src="' . $travelo['2r_pic'] . '" border="0"></a>';
$smallpic2['r_title'] = '<a href="' . $smallpic2['r_link'] . '" style="' . $style['travelo_title'] . '">' . $travelo['2r_title'] . '</a>';
$smallpic2['r_subtitle'] = '<a href="' . $smallpic2['r_link'] . '" style="' . $style['travelo_subtitle'] . '">' . $travelo['2r_subtitle'] . '</a>';
$smallpic2['r_text'] = '<a href="' . $smallpic2['r_link'] . '" style="' . $style['travelo_text'] . '">' . $travelo['2r_text'] . '</a>';
//3 - bal
$travelo_separator['3l_link'] = separator($travelo['3l_link']);
$smallpic3['l_link'] = $travelo['3l_link'] . $travelo_separator['3l_link'] . 'utm_source=' . $travelo['analytics_source'] . '&utm_medium=' . $travelo['analytics_medium'] . '&utm_campaign=' . $travelo['3l_analytics'];
$smallpic3['l_pic'] = '<a href="' . $smallpic3['l_link'] . '"><img src="' . $travelo['3l_pic'] . '" border="0"></a>';
$smallpic3['l_title'] = '<a href="' . $smallpic3['l_link'] . '" style="' . $style['travelo_title'] . '">' . $travelo['3l_title'] . '</a>';
$smallpic3['l_subtitle'] = '<a href="' . $smallpic3['l_link'] . '" style="' . $style['travelo_subtitle'] . '">' . $travelo['3l_subtitle'] . '</a>';
$smallpic3['l_text'] = '<a href="' . $smallpic3['l_link'] . '" style="' . $style['travelo_text'] . '">' . $travelo['3l_text'] . '</a>';
//3 - jobb
$travelo_separator['3r_link'] = separator($travelo['3r_link']);
$smallpic3['r_link'] = $travelo['3r_link'] . $travelo_separator['3r_link'] . 'utm_source=' . $travelo['analytics_source'] . '&utm_medium=' . $travelo['analytics_medium'] . '&utm_campaign=' . $travelo['3r_analytics'];
$smallpic3['r_pic'] = '<a href="' . $smallpic3['r_link'] . '"><img src="' . $travelo['3r_pic'] . '" border="0"></a>';
$smallpic3['r_title'] = '<a href="' . $smallpic3['r_link'] . '" style="' . $style['travelo_title'] . '">' . $travelo['3r_title'] . '</a>';
$smallpic3['r_subtitle'] = '<a href="' . $smallpic3['r_link'] . '" style="' . $style['travelo_subtitle'] . '">' . $travelo['3r_subtitle'] . '</a>';
$smallpic3['r_text'] = '<a href="' . $smallpic3['r_link'] . '" style="' . $style['travelo_text'] . '">' . $travelo['3r_text'] . '</a>';
//4 - bal
$travelo_separator['4l_link'] = separator($travelo['4l_link']);
$smallpic4['l_link'] = $travelo['4l_link'] . $travelo_separator['4l_link'] . 'utm_source=' . $travelo['analytics_source'] . '&utm_medium=' . $travelo['analytics_medium'] . '&utm_campaign=' . $travelo['4l_analytics'];
$smallpic4['l_pic'] = '<a href="' . $smallpic4['l_link'] . '"><img src="' . $travelo['4l_pic'] . '" border="0"></a>';
$smallpic4['l_title'] = '<a href="' . $smallpic4['l_link'] . '" style="' . $style['travelo_title'] . '">' . $travelo['4l_title'] . '</a>';
$smallpic4['l_subtitle'] = '<a href="' . $smallpic4['l_link'] . '" style="' . $style['travelo_subtitle'] . '">' . $travelo['4l_subtitle'] . '</a>';
$smallpic4['l_text'] = '<a href="' . $smallpic4['l_link'] . '" style="' . $style['travelo_text'] . '">' . $travelo['4l_text'] . '</a>';
//4 - jobb
$travelo_separator['4r_link'] = separator($travelo['4r_link']);
$smallpic4['r_link'] = $travelo['4r_link'] . $travelo_separator['4r_link'] . 'utm_source=' . $travelo['analytics_source'] . '&utm_medium=' . $travelo['analytics_medium'] . '&utm_campaign=' . $travelo['4r_analytics'];
$smallpic4['r_pic'] = '<a href="' . $smallpic4['r_link'] . '"><img src="' . $travelo['4r_pic'] . '" border="0"></a>';
$smallpic4['r_title'] = '<a href="' . $smallpic4['r_link'] . '" style="' . $style['travelo_title'] . '">' . $travelo['4r_title'] . '</a>';
$smallpic4['r_subtitle'] = '<a href="' . $smallpic4['r_link'] . '" style="' . $style['travelo_subtitle'] . '">' . $travelo['4r_subtitle'] . '</a>';
$smallpic4['r_text'] = '<a href="' . $smallpic4['r_link'] . '" style="' . $style['travelo_text'] . '">' . $travelo['4r_text'] . '</a>';
//5 - bal
$travelo_separator['5l_link'] = separator($travelo['5l_link']);
$smallpic5['l_link'] = $travelo['5l_link'] . $travelo_separator['5l_link'] . 'utm_source=' . $travelo['analytics_source'] . '&utm_medium=' . $travelo['analytics_medium'] . '&utm_campaign=' . $travelo['5l_analytics'];
$smallpic5['l_pic'] = '<a href="' . $smallpic5['l_link'] . '"><img src="' . $travelo['5l_pic'] . '" border="0"></a>';
$smallpic5['l_title'] = '<a href="' . $smallpic5['l_link'] . '" style="' . $style['travelo_title'] . '">' . $travelo['5l_title'] . '</a>';
$smallpic5['l_subtitle'] = '<a href="' . $smallpic5['l_link'] . '" style="' . $style['travelo_subtitle'] . '">' . $travelo['5l_subtitle'] . '</a>';
$smallpic5['l_text'] = '<a href="' . $smallpic5['l_link'] . '" style="' . $style['travelo_text'] . '">' . $travelo['5l_text'] . '</a>';
//5 - jobb
$travelo_separator['5r_link'] = separator($travelo['5r_link']);
$smallpic5['r_link'] = $travelo['5r_link'] . $travelo_separator['5r_link'] . 'utm_source=' . $travelo['analytics_source'] . '&utm_medium=' . $travelo['analytics_medium'] . '&utm_campaign=' . $travelo['5r_analytics'];
$smallpic5['r_pic'] = '<a href="' . $smallpic5['r_link'] . '"><img src="' . $travelo['5r_pic'] . '" border="0"></a>';
$smallpic5['r_title'] = '<a href="' . $smallpic5['r_link'] . '" style="' . $style['travelo_title'] . '">' . $travelo['5r_title'] . '</a>';
$smallpic5['r_subtitle'] = '<a href="' . $smallpic5['r_link'] . '" style="' . $style['travelo_subtitle'] . '">' . $travelo['5r_subtitle'] . '</a>';
$smallpic5['r_text'] = '<a href="' . $smallpic5['r_link'] . '" style="' . $style['travelo_text'] . '">' . $travelo['5r_text'] . '</a>';
//Other
$l_legal = iconv("UTF-8", "ISO-8859-2", "A Life Utazás és a jelen hírlevélben szereplő partnerei fenntartják az utazással kapcsolatos feltételek és árak módosításának jogát. A Life.hu Utazási mellékletét a Confhotel-Net Kft. üzemelteti.");
$l_opti1 = iconv("UTF-8", "ISO-8859-2", "Ezt a levelet az optimail online direkt-marketing rendszeren keresztül küldtük a(z)");
$l_opti2 = iconv("UTF-8", "ISO-8859-2", "címre az Ön előzetes hozzájárulásával, melyet az Origo Zrt-nek tett a freemail.hu 
                                                ingyenes rendszerébe történő regisztrációja során. E szerint Ön marketingtartalmú 
                                                célzott üzenetek fogadását vállalja. Szolgáltatásunkkal kapcsolatban bővebb információval 
                                                szolgálunk az Ön számára a  ");
$l_opti3 = iconv("UTF-8", "ISO-8859-2", "Amennyiben a továbbiakban mégsem szeretne az érdeklődési körének megfelelő kedvezményes ajánlatokat vagy 
                                                    nyereményjáték-ismertetőket kapni, kattintson ");
$l_opti4 = iconv("UTF-8", "ISO-8859-2", "Az Origo Zrt. adatkezelési nyilvántartási azonosítója: 820-0001 ");

if ($save==1){
    ob_start();
}
htmlHead($newsletter['lifeTitle'], $newsletter['lifeCharset'], NULL, NULL, $style['travelo_style']);

lifeTableStart();
lifeMenu($style, $travelo_menu);
lifeBigPic($travelo_bp);
if ($travelo['1ok'] == "on")
{
    lifeSmallPic($smallpic1);
}
/* 2sor */
if ($travelo['2ok'] == "on")
{
    lifeSmallPic($smallpic2);
}

/* 3. Sor */
if ($travelo['3ok'] == "on")
{
    lifeSmallPic($smallpic3);
}
/* 4.sor */
if ($travelo['4ok'] == "on")
{
    lifeSmallPic($smallpic4);
}
/* 5.sor */
if ($travelo['5ok']== "on")
{
    lifeSmallPic($smallpic5);
}
bottomMenuLife();
lifeLegalNotice($l_legal);
lifeOptimailFooter($l_opti1, $l_opti2, $l_opti3, $l_opti4);
lifeTableEnd();
bottomMenuMap();
htmlEnd();
if ($save==1) {
$title=$id."-life_dm.txt";
file_put_contents("save/$title", ob_get_contents());
$url="showtxt.php?title=$title";
header("Location: $url");
}
?>