<?php

require_once 'db.php';
require_once 'userdb.php';
require_once 'functions.php';
require_once 'config.php';
$id = $_GET['hirlevel_id'];
$table = "life_op_hirlev";
@$save=$_GET['save'];
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
$style['travelo_title'] = 'color:#1a438a; font-size:24px; font-weight:bold; text-decoration:none; text-transform:uppercase';
$style['travelo_bptext'] = 'color:#010101; font-size:20px; text-decoration:none;';
$style['travelo_subtitle'] = 'color:#5d5d5d; font-size:13px; text-decoration:none;';
$style['travelo_text'] = 'color:#010101; font-size:13px; text-decoration:none;';
$style['travelo_logo_img'] = '<img src="topmenu-logo.png">';
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
lifeOnepic($travelo_bp);
bottomMenu($newsletter['picfolder']);
lifeLegalNotice($l_legal);
lifeOptimailFooter($l_opti1, $l_opti2, $l_opti3, $l_opti4);
lifeTableEnd();
bottomMenuMap();
htmlEnd();
if ($save==1) {
$title=$id."-life_onepic.txt";
file_put_contents("save/$title", ob_get_contents());
$url="showtxt.php?title=$title";
header("Location: $url");
}
?>