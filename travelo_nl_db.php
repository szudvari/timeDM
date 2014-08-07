<?php

require_once 'db.php';
require_once 'functions.php';
require_once 'config.php';
$id = $_GET['hirlevel_id'];
$table = "travelo_hirlev";
@$save=$_GET['save'];
$con = connectDb();
$travelo = getANewsletter($table, $id);
closeDb($con);


//style
$style['travelo_style'] = <<<EOT
       <style type='text/css'> @font-face {
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
$style['travelo_textad_title'] = 'color:#1a438a; font-size:15px; font-weight:bold; text-decoration:none; text-transform:uppercase';
$style['travelo_bg'] = '<body style="background: #f5f4f2 url(\'' . $newsletter['picfolder'] . '/fullbg.png\'); text-decoration:none; font-size: 14px; font-family: \'OpenSans\',arial,helvetica,sans-serif;margin:0;padding:0">';
$style['travelo_maintable'] = '<table style="background: #f5f4f2 url(\'' . $newsletter['picfolder'] . '/fullbg.png\'); width: 100%; font-family: \'OpenSans\',arial,helvetica,sans-serif" border="0" align="center">';
$style['mostrecent'] = 'color:#1a438a; font-weight:bold; font-size:14px; text-decoration:none';
$style['mostrecent_highlight'] = 'color:#D40063; font-size:14px; font-weight:normal; text-decoration:none';
$style['travelo_harticle_title'] = "color:#1a438a; font-weight:bold; font-size:18px; text-decoration:none";
$style['travelo_article_title'] = "color:#1a438a;font-size:14px; text-decoration:none";
$style['travelo_article_date'] = "color:#a8a8a8; font-size:12px; text-decoration:none";
$style['travelo_turpan_li'] = "color:#a8a8a8; margin-bottom: 5px";


//header
$style['travelo_logo_img'] = '<img src="' . $newsletter['picfolder'] . '/topmenu_logo.png">';
$style['travelo_header'] = '"width:30%;"';
$style['travelo_logo'] = '<a href="http://szallas.travelo.hu?utm_source=' . $travelo['analytics_source'] . '&utm_medium=' . $travelo['analytics_medium'] . '&utm_campaign=fooldal" target="_blank">' . $style['travelo_logo_img'] . '</a>';
$style['travelo_menu_bg_col'] = '(rgba(136,200,65,1), rgba(104,161,51,1))';
$style['travelo_menu_bg'] = 'background: -webkit-linear-gradient' . $style['travelo_menu_bg_col'] . '; background: -o-linear-gradient' . $style['travelo_menu_bg_col'] . '; background: -moz-linear-gradient' . $style['travelo_menu_bg_col'] . '; background:linear-gradient' . $style['travelo_menu_bg_col'] . ';';
$style['travelo_menu'] = '"' . $style['travelo_menu_bg'] . 'padding: 8px 0 8px 0; margin-top:5px; text-align: center; font-size: 14px; width:18%; border-top-style:solid; border-bottom-style:solid; border-width:1px; border-color:#68a133 #72ae38;"';
$style['travelo_menu_left'] = '"' . $style['travelo_menu_bg'] . ' padding: 8px 0  8px 0; margin-top:5px; border-left-style:solid; border-top-style:solid; border-bottom-style:solid; border-width:1px; border-color:#68a133 #72ae38 #68a133 #68a133; border-top-left-radius:8px; border-bottom-left-radius:8px; text-align: center; font-size: 14px; width:5%;"';
$style['travelo_menu_right'] = '"' . $style['travelo_menu_bg'] . ' padding: 8px 0 8px 0; margin-top:5px; border-right-style:solid; border-top-style:solid; border-bottom-style:solid; border-width:1px; border-color:#68a133 #68a133 #68a133 #72ae38; border-top-right-radius:8px; border-bottom-right-radius:8px; text-align: center; font-size: 14px; width:5%;"';

//menü
$travelo_separator['t_menu1'] = separator($travelo['menu1_link']);
$travelo_separator['t_menu2'] = separator($travelo['menu2_link']);
$travelo_separator['t_menu3'] = separator($travelo['menu3_link']);
$travelo_separator['t_menu4'] = separator($travelo['menu4_link']);
$travelo_separator['t_menu5'] = separator($travelo['menu5_link']);
$travelo_menu['link_style'] = 'text-decoration: none; color: #fff; font-weight: normal; text-transform: uppercase;';
$travelo_menu['1'] = '<a href="' . $travelo['menu1_link'] . $travelo_separator['t_menu1'] . 'utm_source=' . $travelo['analytics_source'] . '&utm_medium=' . $travelo['analytics_medium'] . '&utm_campaign=' . $travelo['menu1_analytics'] . '" style="' . $travelo_menu['link_style'] . '" target="_blank">' . $travelo['menu1'] . '</a>';
$travelo_menu['2'] = '<a href="' . $travelo['menu2_link'] . $travelo_separator['t_menu2'] . 'utm_source=' . $travelo['analytics_source'] . '&utm_medium=' . $travelo['analytics_medium'] . '&utm_campaign=' . $travelo['menu2_analytics'] . '" style="' . $travelo_menu['link_style'] . '" target="_blank">' . $travelo['menu2'] . '</a>';
$travelo_menu['3'] = '<a href="' . $travelo['menu3_link'] . $travelo_separator['t_menu3'] . 'utm_source=' . $travelo['analytics_source'] . '&utm_medium=' . $travelo['analytics_medium'] . '&utm_campaign=' . $travelo['menu3_analytics'] . '" style="' . $travelo_menu['link_style'] . '" target="_blank">' . $travelo['menu3'] . '</a>';
$travelo_menu['4'] = '<a href="' . $travelo['menu4_link'] . $travelo_separator['t_menu4'] . 'utm_source=' . $travelo['analytics_source'] . '&utm_medium=' . $travelo['analytics_medium'] . '&utm_campaign=' . $travelo['menu4_analytics'] . '" style="' . $travelo_menu['link_style'] . '" target="_blank">' . $travelo['menu4'] . '</a>';
$travelo_menu['5'] = '<a href="' . $travelo['menu5_link'] . $travelo_separator['t_menu5'] . 'utm_source=' . $travelo['analytics_source'] . '&utm_medium=' . $travelo['analytics_medium'] . '&utm_campaign=' . $travelo['menu5_analytics'] . '" style="' . $travelo_menu['link_style'] . '" target="_blank">' . $travelo['menu5'] . '</a>';

//nagyképes
$travelo_separator['bp_link'] = separator($travelo['bp_link']);
$travelo_bp['link'] = $travelo['bp_link'] . $travelo_separator['bp_link'] . 'utm_source=' . $travelo['analytics_source'] . '&utm_medium=' . $travelo['analytics_medium'] . '&utm_campaign=' . $travelo['bp_analytics'];
$travelo_bp['pic'] = '<a href="' . $travelo_bp['link'] . '"><img src="' . $travelo['folder'] . '/' . $travelo['bp_pic'] . '" border="0"></a>';
$travelo_bp['title'] = '<a href="' . $travelo_bp['link'] . '" style="' . $style['travelo_title'] . '">' . $travelo['bp_title'] . '</a>';
$travelo_bp['text'] = '<a href="' . $travelo_bp['link'] . '" style="' . $style['travelo_bptext'] . '">' . $travelo['bp_text'] . '</a>';

//kisképes blokk
//1 - bal
$travelo_separator['1l_link'] = separator($travelo['1l_link']);
$smallpic1['l_link'] = $travelo['1l_link'] . $travelo_separator['1l_link'] . 'utm_source=' . $travelo['analytics_source'] . '&utm_medium=' . $travelo['analytics_medium'] . '&utm_campaign=' . $travelo['1l_analytics'];
$smallpic1['l_pic'] = '<a href="' . $smallpic1['l_link'] . '"><img src="' . $travelo['folder'] . '/' . $travelo['1l_pic'] . '" border="0"></a>';
$smallpic1['l_title'] = '<a href="' . $smallpic1['l_link'] . '" style="' . $style['travelo_title'] . '">' . $travelo['1l_title'] . '</a>';
$smallpic1['l_subtitle'] = '<a href="' . $smallpic1['l_link'] . '" style="' . $style['travelo_subtitle'] . '">' . $travelo['1l_subtitle'] . '</a>';
$smallpic1['l_text'] = '<a href="' . $smallpic1['l_link'] . '" style="' . $style['travelo_text'] . '">' . $travelo['1l_text'] . '</a>';
//1 - jobb
$travelo_separator['1r_link'] = separator($travelo['1r_link']);
$smallpic1['r_link'] = $travelo['1r_link'] . $travelo_separator['1r_link'] . 'utm_source=' . $travelo['analytics_source'] . '&utm_medium=' . $travelo['analytics_medium'] . '&utm_campaign=' . $travelo['1r_analytics'];
$smallpic1['r_pic'] = '<a href="' . $smallpic1['r_link'] . '"><img src="' . $travelo['folder'] . '/' . $travelo['1r_pic'] . '" border="0"></a>';
$smallpic1['r_title'] = '<a href="' . $smallpic1['r_link'] . '" style="' . $style['travelo_title'] . '">' . $travelo['1r_title'] . '</a>';
$smallpic1['r_subtitle'] = '<a href="' . $smallpic1['r_link'] . '" style="' . $style['travelo_subtitle'] . '">' . $travelo['1r_subtitle'] . '</a>';
$smallpic1['r_text'] = '<a href="' . $smallpic1['r_link'] . '" style="' . $style['travelo_text'] . '">' . $travelo['1r_text'] . '</a>';
//2 - bal
$travelo_separator['2l_link'] = separator($travelo['2l_link']);
$smallpic2['l_link'] = $travelo['2l_link'] . $travelo_separator['2l_link'] . 'utm_source=' . $travelo['analytics_source'] . '&utm_medium=' . $travelo['analytics_medium'] . '&utm_campaign=' . $travelo['2l_analytics'];
$smallpic2['l_pic'] = '<a href="' . $smallpic2['l_link'] . '"><img src="' . $travelo['folder'] . '/' . $travelo['2l_pic'] . '" border="0"></a>';
$smallpic2['l_title'] = '<a href="' . $smallpic2['l_link'] . '" style="' . $style['travelo_title'] . '">' . $travelo['2l_title'] . '</a>';
$smallpic2['l_subtitle'] = '<a href="' . $smallpic2['l_link'] . '" style="' . $style['travelo_subtitle'] . '">' . $travelo['2l_subtitle'] . '</a>';
$smallpic2['l_text'] = '<a href="' . $smallpic2['l_link'] . '" style="' . $style['travelo_text'] . '">' . $travelo['2l_text'] . '</a>';
//2 - jobb
$travelo_separator['2r_link'] = separator($travelo['2r_link']);
$smallpic2['r_link'] = $travelo['2r_link'] . $travelo_separator['2r_link'] . 'utm_source=' . $travelo['analytics_source'] . '&utm_medium=' . $travelo['analytics_medium'] . '&utm_campaign=' . $travelo['2r_analytics'];
$smallpic2['r_pic'] = '<a href="' . $smallpic2['r_link'] . '"><img src="' . $travelo['folder'] . '/' . $travelo['2r_pic'] . '" border="0"></a>';
$smallpic2['r_title'] = '<a href="' . $smallpic2['r_link'] . '" style="' . $style['travelo_title'] . '">' . $travelo['2r_title'] . '</a>';
$smallpic2['r_subtitle'] = '<a href="' . $smallpic2['r_link'] . '" style="' . $style['travelo_subtitle'] . '">' . $travelo['2r_subtitle'] . '</a>';
$smallpic2['r_text'] = '<a href="' . $smallpic2['r_link'] . '" style="' . $style['travelo_text'] . '">' . $travelo['2r_text'] . '</a>';
//3 - bal
$travelo_separator['3l_link'] = separator($travelo['3l_link']);
$smallpic3['l_link'] = $travelo['3l_link'] . $travelo_separator['3l_link'] . 'utm_source=' . $travelo['analytics_source'] . '&utm_medium=' . $travelo['analytics_medium'] . '&utm_campaign=' . $travelo['3l_analytics'];
$smallpic3['l_pic'] = '<a href="' . $smallpic3['l_link'] . '"><img src="' . $travelo['folder'] . '/' . $travelo['3l_pic'] . '" border="0"></a>';
$smallpic3['l_title'] = '<a href="' . $smallpic3['l_link'] . '" style="' . $style['travelo_title'] . '">' . $travelo['3l_title'] . '</a>';
$smallpic3['l_subtitle'] = '<a href="' . $smallpic3['l_link'] . '" style="' . $style['travelo_subtitle'] . '">' . $travelo['3l_subtitle'] . '</a>';
$smallpic3['l_text'] = '<a href="' . $smallpic3['l_link'] . '" style="' . $style['travelo_text'] . '">' . $travelo['3l_text'] . '</a>';
//3 - jobb
$travelo_separator['3r_link'] = separator($travelo['3r_link']);
$smallpic3['r_link'] = $travelo['3r_link'] . $travelo_separator['3r_link'] . 'utm_source=' . $travelo['analytics_source'] . '&utm_medium=' . $travelo['analytics_medium'] . '&utm_campaign=' . $travelo['3r_analytics'];
$smallpic3['r_pic'] = '<a href="' . $smallpic3['r_link'] . '"><img src="' . $travelo['folder'] . '/' . $travelo['3r_pic'] . '" border="0"></a>';
$smallpic3['r_title'] = '<a href="' . $smallpic3['r_link'] . '" style="' . $style['travelo_title'] . '">' . $travelo['3r_title'] . '</a>';
$smallpic3['r_subtitle'] = '<a href="' . $smallpic3['r_link'] . '" style="' . $style['travelo_subtitle'] . '">' . $travelo['3r_subtitle'] . '</a>';
$smallpic3['r_text'] = '<a href="' . $smallpic3['r_link'] . '" style="' . $style['travelo_text'] . '">' . $travelo['3r_text'] . '</a>';
//4 - bal
$travelo_separator['4l_link'] = separator($travelo['4l_link']);
$smallpic4['l_link'] = $travelo['4l_link'] . $travelo_separator['4l_link'] . 'utm_source=' . $travelo['analytics_source'] . '&utm_medium=' . $travelo['analytics_medium'] . '&utm_campaign=' . $travelo['4l_analytics'];
$smallpic4['l_pic'] = '<a href="' . $smallpic4['l_link'] . '"><img src="' . $travelo['folder'] . '/' . $travelo['4l_pic'] . '" border="0"></a>';
$smallpic4['l_title'] = '<a href="' . $smallpic4['l_link'] . '" style="' . $style['travelo_title'] . '">' . $travelo['4l_title'] . '</a>';
$smallpic4['l_subtitle'] = '<a href="' . $smallpic4['l_link'] . '" style="' . $style['travelo_subtitle'] . '">' . $travelo['4l_subtitle'] . '</a>';
$smallpic4['l_text'] = '<a href="' . $smallpic4['l_link'] . '" style="' . $style['travelo_text'] . '">' . $travelo['4l_text'] . '</a>';
//4 - jobb
$travelo_separator['4r_link'] = separator($travelo['4r_link']);
$smallpic4['r_link'] = $travelo['4r_link'] . $travelo_separator['4r_link'] . 'utm_source=' . $travelo['analytics_source'] . '&utm_medium=' . $travelo['analytics_medium'] . '&utm_campaign=' . $travelo['4r_analytics'];
$smallpic4['r_pic'] = '<a href="' . $smallpic4['r_link'] . '"><img src="' . $travelo['folder'] . '/' . $travelo['4r_pic'] . '" border="0"></a>';
$smallpic4['r_title'] = '<a href="' . $smallpic4['r_link'] . '" style="' . $style['travelo_title'] . '">' . $travelo['4r_title'] . '</a>';
$smallpic4['r_subtitle'] = '<a href="' . $smallpic4['r_link'] . '" style="' . $style['travelo_subtitle'] . '">' . $travelo['4r_subtitle'] . '</a>';
$smallpic4['r_text'] = '<a href="' . $smallpic4['r_link'] . '" style="' . $style['travelo_text'] . '">' . $travelo['4r_text'] . '</a>';
//5 - bal
$travelo_separator['5l_link'] = separator($travelo['5l_link']);
$smallpic5['l_link'] = $travelo['5l_link'] . $travelo_separator['5l_link'] . 'utm_source=' . $travelo['analytics_source'] . '&utm_medium=' . $travelo['analytics_medium'] . '&utm_campaign=' . $travelo['5l_analytics'];
$smallpic5['l_pic'] = '<a href="' . $smallpic5['l_link'] . '"><img src="' . $travelo['folder'] . '/' . $travelo['5l_pic'] . '" border="0"></a>';
$smallpic5['l_title'] = '<a href="' . $smallpic5['l_link'] . '" style="' . $style['travelo_title'] . '">' . $travelo['5l_title'] . '</a>';
$smallpic5['l_subtitle'] = '<a href="' . $smallpic5['l_link'] . '" style="' . $style['travelo_subtitle'] . '">' . $travelo['5l_subtitle'] . '</a>';
$smallpic5['l_text'] = '<a href="' . $smallpic5['l_link'] . '" style="' . $style['travelo_text'] . '">' . $travelo['5l_text'] . '</a>';
//5 - jobb
$travelo_separator['5r_link'] = separator($travelo['5r_link']);
$smallpic5['r_link'] = $travelo['5r_link'] . $travelo_separator['5r_link'] . 'utm_source=' . $travelo['analytics_source'] . '&utm_medium=' . $travelo['analytics_medium'] . '&utm_campaign=' . $travelo['5r_analytics'];
$smallpic5['r_pic'] = '<a href="' . $smallpic5['r_link'] . '"><img src="' . $travelo['folder'] . '/' . $travelo['5r_pic'] . '" border="0"></a>';
$smallpic5['r_title'] = '<a href="' . $smallpic5['r_link'] . '" style="' . $style['travelo_title'] . '">' . $travelo['5r_title'] . '</a>';
$smallpic5['r_subtitle'] = '<a href="' . $smallpic5['r_link'] . '" style="' . $style['travelo_subtitle'] . '">' . $travelo['5r_subtitle'] . '</a>';
$smallpic5['r_text'] = '<a href="' . $smallpic5['r_link'] . '" style="' . $style['travelo_text'] . '">' . $travelo['5r_text'] . '</a>';

//Leggyakoribb keresések
//1 oszlopos
//1. sor
$travelo_separator['mostrecent_1_link'] = separator($travelo['mostrecent_1_link']);
$travelo_mostrecent['1_link'] = $travelo['mostrecent_1_link'] . $travelo_separator['mostrecent_1_link'] . 'utm_source=' . $travelo['analytics_source'] . '&utm_medium=' . $travelo['analytics_medium'] . '&utm_campaign=' . $travelo['mostrecent_1_analytics'];
$travelo_mostrecent['1'] = '<table width="100%" cellpadding="0" cellspacing="0" border="0" style="margin: 10px"><tr><td><a href="' . $travelo_mostrecent['1_link'] . '" style="' . $style['mostrecent'] . '">' . $travelo['mostrecent_1_puretext'] . '<span style="' . $style['mostrecent_highlight'] . '"> – ' . $travelo['mostrecent_1_highlitedtext'] . '</span></a></td></tr></table>';
//2. sor
$travelo_separator['mostrecent_2_link'] = separator($travelo['mostrecent_2_link']);
$travelo_mostrecent['2_link'] = $travelo['mostrecent_2_link'] . $travelo_separator['mostrecent_2_link'] . 'utm_source=' . $travelo['analytics_source'] . '&utm_medium=' . $travelo['analytics_medium'] . '&utm_campaign=' . $travelo['mostrecent_2_analytics'];
$travelo_mostrecent['2'] = '<table width="100%" cellpadding="0" cellspacing="0" border="0" style="margin: 10px"><tr><td><a href="' . $travelo_mostrecent['2_link'] . '" style="' . $style['mostrecent'] . '">' . $travelo['mostrecent_2_puretext'] . '<span style="' . $style['mostrecent_highlight'] . '"> – ' . $travelo['mostrecent_2_highlitedtext'] . '</span></a></td></tr></table>';
//3. sor
$travelo_separator['mostrecent_3_link'] = separator($travelo['mostrecent_3_link']);
$travelo_mostrecent['3_link'] = $travelo['mostrecent_3_link'] . $travelo_separator['mostrecent_3_link'] . 'utm_source=' . $travelo['analytics_source'] . '&utm_medium=' . $travelo['analytics_medium'] . '&utm_campaign=' . $travelo['mostrecent_3_analytics'];
$travelo_mostrecent['3'] = '<table width="100%" cellpadding="0" cellspacing="0" border="0" style="margin: 10px"><tr><td><a href="' . $travelo_mostrecent['3_link'] . '" style="' . $style['mostrecent'] . '">' . $travelo['mostrecent_3_puretext'] . '<span style="' . $style['mostrecent_highlight'] . '"> – ' . $travelo['mostrecent_3_highlitedtext'] . '</span></a></td></tr></table>';
//4. sor
$travelo_separator['mostrecent_4_link'] = separator($travelo['mostrecent_4_link']);
$travelo_mostrecent['4_link'] = $travelo['mostrecent_4_link'] . $travelo_separator['mostrecent_4_link'] . 'utm_source=' . $travelo['analytics_source'] . '&utm_medium=' . $travelo['analytics_medium'] . '&utm_campaign=' . $travelo['mostrecent_4_analytics'];
$travelo_mostrecent['4'] = '<table width="100%" cellpadding="0" cellspacing="0" border="0" style="margin: 10px"><tr><td><a href="' . $travelo_mostrecent['4_link'] . '" style="' . $style['mostrecent'] . '">' . $travelo['mostrecent_4_puretext'] . '<span style="' . $style['mostrecent_highlight'] . '"> – ' . $travelo['mostrecent_4_highlitedtext'] . '</span></a></td></tr></table>';
//5. sor
$travelo_separator['mostrecent_5_link'] = separator($travelo['mostrecent_5_link']);
$travelo_mostrecent['5_link'] = $travelo['mostrecent_5_link'] . $travelo_separator['mostrecent_5_link'] . 'utm_source=' . $travelo['analytics_source'] . '&utm_medium=' . $travelo['analytics_medium'] . '&utm_campaign=' . $travelo['mostrecent_5_analytics'];
$travelo_mostrecent['5'] = '<table width="100%" cellpadding="0" cellspacing="0" border="0" style="margin: 10px"><tr><td><a href="' . $travelo_mostrecent['5_link'] . '" style="' . $style['mostrecent'] . '">' . $travelo['mostrecent_5_puretext'] . '<span style="' . $style['mostrecent_highlight'] . '"> – ' . $travelo['mostrecent_5_highlitedtext'] . '</span></a></td></tr></table>';
//2 oszlopos
//1. sor
//Bal
$travelo_separator['mostrecent_1l_link'] = separator($travelo['mostrecent_1l_link']);
$travelo_mostrecent2['1l_link'] = $travelo['mostrecent_1l_link'] . $travelo_separator['mostrecent_1l_link'] . 'utm_source=' . $travelo['analytics_source'] . '&utm_medium=' . $travelo['analytics_medium'] . '&utm_campaign=' . $travelo['mostrecent_1l_analytics'];
$travelo_mostrecent2['1l'] = '<table width="100%" cellpadding="0" cellspacing="0" border="0" style="margin: 10px"><tr><td><a href="' . $travelo_mostrecent2['1l_link'] . '" style="' . $style['mostrecent'] . '">' . $travelo['mostrecent_1l_puretext'] . '<span style="' . $style['mostrecent_highlight'] . '"> – ' . $travelo['mostrecent_1l_highlitedtext'] . '</span></a></td></tr></table>';
//Jobb
$travelo_separator['mostrecent_1r_link'] = separator($travelo['mostrecent_1r_link']);
$travelo_mostrecent2['1r_link'] = $travelo['mostrecent_1r_link'] . $travelo_separator['mostrecent_1r_link'] . 'utm_source=' . $travelo['analytics_source'] . '&utm_medium=' . $travelo['analytics_medium'] . '&utm_campaign=' . $travelo['mostrecent_1r_analytics'];
$travelo_mostrecent2['1r'] = '<table width="100%" cellpadding="0" cellspacing="0" border="0" style="margin: 10px"><tr><td><a href="' . $travelo_mostrecent2['1r_link'] . '" style="' . $style['mostrecent'] . '">' . $travelo['mostrecent_1r_puretext'] . '<span style="' . $style['mostrecent_highlight'] . '"> – ' . $travelo['mostrecent_1r_highlitedtext'] . '</span></a></td></tr></table>';
//2. sor
//Bal
$travelo_separator['mostrecent_2l_link'] = separator($travelo['mostrecent_2l_link']);
$travelo_mostrecent2['2l_link'] = $travelo['mostrecent_2l_link'] . $travelo_separator['mostrecent_2l_link'] . 'utm_source=' . $travelo['analytics_source'] . '&utm_medium=' . $travelo['analytics_medium'] . '&utm_campaign=' . $travelo['mostrecent_2l_analytics'];
$travelo_mostrecent2['2l'] = '<table width="100%" cellpadding="0" cellspacing="0" border="0" style="margin: 10px"><tr><td><a href="' . $travelo_mostrecent2['2l_link'] . '" style="' . $style['mostrecent'] . '">' . $travelo['mostrecent_2l_puretext'] . '<span style="' . $style['mostrecent_highlight'] . '"> – ' . $travelo['mostrecent_2l_highlitedtext'] . '</span></a></td></tr></table>';
//Jobb
$travelo_separator['mostrecent_2r_link'] = separator($travelo['mostrecent_2r_link']);
$travelo_mostrecent2['2r_link'] = $travelo['mostrecent_2r_link'] . $travelo_separator['mostrecent_2r_link'] . 'utm_source=' . $travelo['analytics_source'] . '&utm_medium=' . $travelo['analytics_medium'] . '&utm_campaign=' . $travelo['mostrecent_2r_analytics'];
$travelo_mostrecent2['2r'] = '<table width="100%" cellpadding="0" cellspacing="0" border="0" style="margin: 10px"><tr><td><a href="' . $travelo_mostrecent2['2r_link'] . '" style="' . $style['mostrecent'] . '">' . $travelo['mostrecent_2r_puretext'] . '<span style="' . $style['mostrecent_highlight'] . '"> – ' . $travelo['mostrecent_2r_highlitedtext'] . '</span></a></td></tr></table>';
//3. sor
//Bal
$travelo_separator['mostrecent_3l_link'] = separator($travelo['mostrecent_3l_link']);
$travelo_mostrecent2['3l_link'] = $travelo['mostrecent_3l_link'] . $travelo_separator['mostrecent_3l_link'] . 'utm_source=' . $travelo['analytics_source'] . '&utm_medium=' . $travelo['analytics_medium'] . '&utm_campaign=' . $travelo['mostrecent_3l_analytics'];
$travelo_mostrecent2['3l'] = '<table width="100%" cellpadding="0" cellspacing="0" border="0" style="margin: 10px"><tr><td><a href="' . $travelo_mostrecent2['3l_link'] . '" style="' . $style['mostrecent'] . '">' . $travelo['mostrecent_3l_puretext'] . '<span style="' . $style['mostrecent_highlight'] . '"> – ' . $travelo['mostrecent_3l_highlitedtext'] . '</span></a></td></tr></table>';
//Jobb
$travelo_separator['mostrecent_3r_link'] = separator($travelo['mostrecent_3r_link']);
$travelo_mostrecent2['3r_link'] = $travelo['mostrecent_3r_link'] . $travelo_separator['mostrecent_3r_link'] . 'utm_source=' . $travelo['analytics_source'] . '&utm_medium=' . $travelo['analytics_medium'] . '&utm_campaign=' . $travelo['mostrecent_3r_analytics'];
$travelo_mostrecent2['3r'] = '<table width="100%" cellpadding="0" cellspacing="0" border="0" style="margin: 10px"><tr><td><a href="' . $travelo_mostrecent2['3r_link'] . '" style="' . $style['mostrecent'] . '">' . $travelo['mostrecent_3r_puretext'] . '<span style="' . $style['mostrecent_highlight'] . '"> – ' . $travelo['mostrecent_3r_highlitedtext'] . '</span></a></td></tr></table>';
///4. sor
//Bal
$travelo_separator['mostrecent_4l_link'] = separator($travelo['mostrecent_4l_link']);
$travelo_mostrecent2['4l_link'] = $travelo['mostrecent_4l_link'] . $travelo_separator['mostrecent_4l_link'] . 'utm_source=' . $travelo['analytics_source'] . '&utm_medium=' . $travelo['analytics_medium'] . '&utm_campaign=' . $travelo['mostrecent_4l_analytics'];
$travelo_mostrecent2['4l'] = '<table width="100%" cellpadding="0" cellspacing="0" border="0" style="margin: 10px"><tr><td><a href="' . $travelo_mostrecent2['4l_link'] . '" style="' . $style['mostrecent'] . '">' . $travelo['mostrecent_4l_puretext'] . '<span style="' . $style['mostrecent_highlight'] . '"> – ' . $travelo['mostrecent_4l_highlitedtext'] . '</span></a></td></tr></table>';
//Jobb
$travelo_separator['mostrecent_4l_link'] = separator($travelo['mostrecent_4r_link']);
$travelo_mostrecent2['4r_link'] = $travelo['mostrecent_4r_link'] . $travelo_separator['mostrecent_4l_link'] . 'utm_source=' . $travelo['analytics_source'] . '&utm_medium=' . $travelo['analytics_medium'] . '&utm_campaign=' . $travelo['mostrecent_4r_analytics'];
$travelo_mostrecent2['4r'] = '<table width="100%" cellpadding="0" cellspacing="0" border="0" style="margin: 10px"><tr><td><a href="' . $travelo_mostrecent2['4r_link'] . '" style="' . $style['mostrecent'] . '">' . $travelo['mostrecent_4r_puretext'] . '<span style="' . $style['mostrecent_highlight'] . '"> – ' . $travelo['mostrecent_4r_highlitedtext'] . '</span></a></td></tr></table>';
//5. sor
//Bal
$travelo_separator['mostrecent_5l_link'] = separator($travelo['mostrecent_5l_link']);
$travelo_mostrecent2['5l_link'] = $travelo['mostrecent_5l_link'] . $travelo_separator['mostrecent_5l_link'] . 'utm_source=' . $travelo['analytics_source'] . '&utm_medium=' . $travelo['analytics_medium'] . '&utm_campaign=' . $travelo['mostrecent_5l_analytics'];
$travelo_mostrecent2['5l'] = '<table width="100%" cellpadding="0" cellspacing="0" border="0" style="margin: 10px"><tr><td><a href="' . $travelo_mostrecent2['5l_link'] . '" style="' . $style['mostrecent'] . '">' . $travelo['mostrecent_5l_puretext'] . '<span style="' . $style['mostrecent_highlight'] . '"> – ' . $travelo['mostrecent_5l_highlitedtext'] . '</span></a></td></tr></table>';
//Jobb
$travelo_separator['mostrecent_5r_link'] = separator($travelo['mostrecent_5r_link']);
$travelo_mostrecent2['5r_link'] = $travelo['mostrecent_5r_link'] . $travelo_separator['mostrecent_5r_link'] . 'utm_source=' . $travelo['analytics_source'] . '&utm_medium=' . $travelo['analytics_medium'] . '&utm_campaign=' . $travelo['mostrecent_5r_analytics'];
$travelo_mostrecent2['5r'] = '<table width="100%" cellpadding="0" cellspacing="0" border="0" style="margin: 10px"><tr><td><a href="' . $travelo_mostrecent2['5r_link'] . '" style="' . $style['mostrecent'] . '">' . $travelo['mostrecent_5r_puretext'] . '<span style="' . $style['mostrecent_highlight'] . '"> – ' . $travelo['mostrecent_5r_highlitedtext'] . '</span></a></td></tr></table>';

//Banner
$travelo_separator['banner_link'] = separator($travelo['banner_link']);
$travelo_banner['link'] = $travelo['banner_link'] . $travelo_separator['banner_link'] . 'utm_source=' . $travelo['analytics_source'] . '&utm_medium=' . $travelo['analytics_medium'] . '&utm_campaign=' . $travelo['banner_analytics'];
$travelo_banner['banner'] = '<a href="' . $travelo_banner['link'] . '"><img src="' . $travelo['folder'] . '/' . $travelo['banner_pic'] . '" border="0" /></a>';

//Szöveges
$travelo_separator['textad_link'] = separator($travelo['textad_link']);
$travelo_textad['link'] = $travelo['textad_link'] . $travelo_separator['textad_link'] . 'utm_source=' . $travelo['analytics_source'] . '&utm_medium=' . $travelo['analytics_medium'] . '&utm_campaign=' . $travelo['textad_analytics'];
$travelo_textad['pic'] = '<a style="text-decoration:none;" href="' . $travelo_textad['link'] . '"><img src="' . $travelo['folder'] . '/' . $travelo['textad_pic'] . '" border="0" align="left" style="padding-right:10px;" /></a>';
$travelo_textad['title'] = '<a style="' . $style['travelo_textad_title'] . '" href="' . $travelo_textad['link'] . '">' . $travelo['textad_title'] . '</a>';
$travelo_textad['text'] = '<a style="' . $style['travelo_bptext'] . '" href="' . $travelo_textad['link'] . '">' . $travelo['textad_text'] . '</a>';

//Banner2_1
$travelo_separator['banner2_1_link'] = separator($travelo['banner2_1_link']);
$travelo_banner2_1['link'] = $travelo['banner2_1_link'] . $travelo_separator['banner2_1_link'] . 'utm_source=' . $travelo['analytics_source'] . '&utm_medium=' . $travelo['analytics_medium'] . '&utm_campaign=' . $travelo['banner2_1_analytics'];
$travelo_banner2_1['banner'] = '<a href="' . $travelo_banner2_1['link'] . '"><img src="' . $travelo['folder'] . '/' . $travelo['banner2_1_pic'] . '" border="0" /></a>';

//Banner2_2
$travelo_separator['banner2_2_link'] = separator($travelo['banner_link']);
$travelo_banner2_2['link'] = $travelo['banner2_2_link'] . $travelo_separator['banner2_2_link'] . 'utm_source=' . $travelo['analytics_source'] . '&utm_medium=' . $travelo['analytics_medium'] . '&utm_campaign=' . $travelo['banner2_2_analytics'];
$travelo_banner2_2['banner'] = '<a href="' . $travelo_banner2_2['link'] . '"><img src="' . $travelo['folder'] . '/' . $travelo['banner2_2_pic'] . '" border="0" /></a>';

//Szöveges2
$travelo_separator['textad2_link'] = separator($travelo['textad2_link']);
$travelo_textad2['link'] = $travelo['textad2_link'] . $travelo_separator['textad2_link'] . 'utm_source=' . $travelo['analytics_source'] . '&utm_medium=' . $travelo['analytics_medium'] . '&utm_campaign=' . $travelo['textad2_analytics'];
$travelo_textad2['pic'] = '<a style="text-decoration:none;" href="' . $travelo_textad2['link'] . '"><img src="' . $travelo['folder'] . '/' . $travelo['textad2_pic'] . '" border="0" align="left" style="padding-right:10px;" /></a>';
$travelo_textad2['title'] = '<a style="' . $style['travelo_textad_title'] . '" href="' . $travelo_textad2['link'] . '">' . $travelo['textad2_title'] . '</a>';
$travelo_textad2['text'] = '<a style="' . $style['travelo_bptext'] . '" href="' . $travelo_textad2['link'] . '">' . $travelo['textad2_text'] . '</a>';

//Szöveges2_2
$travelo_separator['textad2_2_link'] = separator($travelo['textad2_2_link']);
$travelo_textad2_2['link'] = $travelo['textad2_2_link'] . $travelo_separator['textad2_2_link'] . 'utm_source=' . $travelo['analytics_source'] . '&utm_medium=' . $travelo['analytics_medium'] . '&utm_campaign=' . $travelo['textad2_2_analytics'];
$travelo_textad2_2['pic'] = '<a style="text-decoration:none;" href="' . $travelo_textad2_2['link'] . '"><img src="' . $travelo['folder'] . '/' . $travelo['textad2_2_pic'] . '" border="0" align="left" style="padding-right:10px;" /></a>';
$travelo_textad2_2['title'] = '<a style="' . $style['travelo_textad_title'] . '" href="' . $travelo_textad2_2['link'] . '">' . $travelo['textad2_2_title'] . '</a>';
$travelo_textad2_2['text'] = '<a style="' . $style['travelo_bptext'] . '" href="' . $travelo_textad2_2['link'] . '">' . $travelo['textad2_2_text'] . '</a>';

//Legfrisebb cikkek
//Kiemelt
$travelo_separator['harticle_link'] = separator($travelo['harticle_link']);
$travelo_article['h_link'] = $travelo['harticle_link'] . $travelo_separator['harticle_link'] . 'utm_source=' . $travelo['analytics_source'] . '&utm_medium=' . $travelo['analytics_medium'] . '&utm_campaign=' . $travelo['harticle_analytics'];
$travelo_article['h_title'] = '<a href="' . $travelo_article['h_link'] . '" style="' . $style['travelo_harticle_title'] . '">' . $travelo['harticle_title'] . '</a>';
$travelo_article['h_date'] = '<a href="' . $travelo_article['h_link'] . '" style="' . $style['travelo_article_date'] . '">' . $travelo['harticle_date'] . '</a>';
$travelo_article['h_text'] = '<a href="' . $travelo_article['h_link'] . '" style="' . $style['travelo_bptext'] . '">' . $travelo['harticle_text'] . '</a>';
//cikk1
$travelo_separator['article_1_link'] = separator($travelo['article_1_link']);
$travelo_article['1_link'] = $travelo['article_1_link'] . $travelo_separator['article_1_link'] . 'utm_source=' . $travelo['analytics_source'] . '&utm_medium=' . $travelo['analytics_medium'] . '&utm_campaign=' . $travelo['article_1_analytics'];
$travelo_article['1_title'] = '<a href="' . $travelo_article['1_link'] . '" style="' . $style['travelo_article_title'] . '">' . $travelo['article_1_title'] . '</a>';
$travelo_article['1_date'] = '<a href="' . $travelo_article['1_link'] . '" style="' . $style['travelo_article_date'] . '">' . $travelo['article_1_date'] . '</a>';
//cikk2
$travelo_separator['article_2_link'] = separator($travelo['article_2_link']);
$travelo_article['2_link'] = $travelo['article_2_link'] . $travelo_separator['article_2_link'] . 'utm_source=' . $travelo['analytics_source'] . '&utm_medium=' . $travelo['analytics_medium'] . '&utm_campaign=' . $travelo['article_2_analytics'];
$travelo_article['2_title'] = '<a href="' . $travelo_article['2_link'] . '" style="' . $style['travelo_article_title'] . '">' . $travelo['article_2_title'] . '</a>';
$travelo_article['2_date'] = '<a href="' . $travelo_article['2_link'] . '" style="' . $style['travelo_article_date'] . '">' . $travelo['article_2_date'] . '</a>';
//cikk3
$travelo_separator['article_3_link'] = separator($travelo['article_3_link']);
$travelo_article['3_link'] = $travelo['article_3_link'] . $travelo_separator['article_3_link'] . 'utm_source=' . $travelo['analytics_source'] . '&utm_medium=' . $travelo['analytics_medium'] . '&utm_campaign=' . $travelo['article_3_analytics'];
$travelo_article['3_title'] = '<a href="' . $travelo_article['3_link'] . '" style="' . $style['travelo_article_title'] . '">' . $travelo['article_3_title'] . '</a>';
$travelo_article['3_date'] = '<a href="' . $travelo_article['3_link'] . '" style="' . $style['travelo_article_date'] . '">' . $travelo['article_3_date'] . '</a>';
//cikk4
$travelo_separator['article_4_link'] = separator($travelo['article_4_link']);
$travelo_article['4_link'] = $travelo['article_4_link'] . $travelo_separator['article_4_link'] . 'utm_source=' . $travelo['analytics_source'] . '&utm_medium=' . $travelo['analytics_medium'] . '&utm_campaign=' . $travelo['article_4_analytics'];
$travelo_article['4_title'] = '<a href="' . $travelo_article['4_link'] . '" style="' . $style['travelo_article_title'] . '">' . $travelo['article_4_title'] . '</a>';
$travelo_article['4_date'] = '<a href="' . $travelo_article['4_link'] . '" style="' . $style['travelo_article_date'] . '">' . $travelo['article_4_date'] . '</a>';

//Turpan hírek
//1.
$travelo_turpan['1'] = '<li style="' . $style['travelo_turpan_li'] . '"><a href="' . $travelo['turpan_1_link'] . '" style="' . $style['travelo_article_title'] . '">' . $travelo['turpan_1_title'] . '</a></li>';
//2.
$travelo_turpan['2'] = '<li style="' . $style['travelo_turpan_li'] . '"><a href="' . $travelo['turpan_2_link'] . '" style="' . $style['travelo_article_title'] . '">' . $travelo['turpan_2_title'] . '</a></li>';
//3.
$travelo_turpan['3'] = '<li style="' . $style['travelo_turpan_li'] . '"><a href="' . $travelo['turpan_3_link'] . '" style="' . $style['travelo_article_title'] . '">' . $travelo['turpan_3_title'] . '</a></li>';
//4.
$travelo_turpan['4'] = '<li style="' . $style['travelo_turpan_li'] . '"><a href="' . $travelo['turpan_4_link'] . '" style="' . $style['travelo_article_title'] . '">' . $travelo['turpan_4_title'] . '</a></li>';
$banner = ' <!--Banner-->
                    <table cellpadding="0" cellspacing="0" align="center" style="width:305px;">
                        <tr>
                            <td style="width:305px;" align="center" valign="top">
                                <table  cellpadding="0" cellspacing="0" align="center">
                                    <tr>
                                        <td align="center">' . $travelo_banner['banner'] . '</td>
                                    </tr>
                                </table> 
                            </td>
                        </tr>
                    </table>';
$banner2_1 = ' <!--Banner-->
                    <table cellpadding="0" cellspacing="0" align="center" style="width:305px;">
                        <tr>
                            <td style="width:305px;" align="center" valign="top">
                                <table  cellpadding="0" cellspacing="0" align="center">
                                    <tr>
                                        <td align="center">' . $travelo_banner2_1['banner'] . '</td>
                                    </tr>
                                </table> 
                            </td>
                        </tr>
                    </table>';
$banner2_2 = ' <!--Banner-->
                    <table cellpadding="0" cellspacing="0" align="center" style="width:305px;">
                        <tr>
                            <td style="width:305px;" align="center" valign="top">
                                <table  cellpadding="0" cellspacing="0" align="center">
                                    <tr>
                                        <td align="center">' . $travelo_banner2_2['banner'] . '</td>
                                    </tr>
                                </table> 
                            </td>
                        </tr>
                    </table>';
$turpan = '<table cellpadding="0" cellspacing="0" align="center" style="width:305px;">
                        <tr>
                            <td align="center" style="padding: 0;width:305px;">
                                <table cellpadding="0" cellspacing="0" align="center">
                                    <tr>
                                        <td align="center">
                                            <img src="' . $newsletter['picfolder'] . '/utazasihir-top.png" border="0" style="display: block;" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="background: #ffffff;border-left:2px solid #e5e5e5;border-right:2px solid #e5e5e5;width: 255px">
                                            <ul style="margin: 5px 0 5px 20px; padding:10px;">
                                                ' . $travelo_turpan['1']
        . $travelo_turpan['2']
        . $travelo_turpan['3']
        . $travelo_turpan['4'] . '
                                               </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center" style="border-left:2px solid #e5e5e5;border-right:2px solid #e5e5e5;">
                                            <img src="' . $newsletter['picfolder'] . '/turizmuscom-logo.png" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center">
                                            <img src="' . $newsletter['picfolder'] . '/utazasihir-bottom.png" />
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>';
$textad = '<!--Szöveges-->
                    <table width="300" cellspacing="0" cellpadding="0" align="center" style="width:300px;margin-left:5px;margin-top:13px;">
                        <tr>
                            <td style="padding: 20px;background: #f8f5e5; border:1px solid #e5e5e5">
                                <table width="100%" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td style="padding:0 0 10px 0">
                                            ' .  $travelo_textad['pic']
        . $travelo_textad['title'] . '
                                         </td>
                                    </tr>

                                    <tr>
                                        <td>' . $travelo_textad['text'] . '</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>                                                                             
                    </table>      ';
$textad2 = '<!--Szöveges-->
                    <table width="300" cellspacing="0" cellpadding="0" align="center" style="width:300px;margin-left:5px;margin-top:13px;">
                        <tr>
                            <td style="padding: 20px;background: #f8f5e5; border:1px solid #e5e5e5">
                                <table width="100%" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td style="padding:0 0 10px 0">
                                            ' .  $travelo_textad2['pic']
        . $travelo_textad2['title'] . '
                                         </td>
                                    </tr>

                                    <tr>
                                        <td>' . $travelo_textad2['text'] . '</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>                                                                             
                    </table>      ';
$textad2_2 = '<!--Szöveges-->
                    <table width="300" cellspacing="0" cellpadding="0" align="center" style="width:300px;margin-left:5px;margin-top:13px;">
                        <tr>
                            <td style="padding: 20px;background: #f8f5e5; border:1px solid #e5e5e5">
                                <table width="100%" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td style="padding:0 0 10px 0">
                                            ' .  $travelo_textad2_2['pic']
        . $travelo_textad2_2['title'] . '
                                         </td>
                                    </tr>

                                    <tr>
                                        <td>' . $travelo_textad2_2['text'] . '</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>                                                                             
                    </table>      ';
if ($save==1){
    ob_start();
}
htmlHead("Travelo - Heti Esszencia", $newsletter['traveloCharset'], NULL, NULL, $style['travelo_style']);
echo $style['travelo_bg'];
echo $style['travelo_maintable'];
tableStart();
sendingDate($travelo['sendingdate']);
/* menü */
newsletterHeader($style, $travelo_menu);
/* nagyképes */
bigPic($travelo_bp);
/* Kisképes blokk */
/* 1sor */
if ($travelo['1ok'] == "on")
{
    smallPic($smallpic1);
}
/* 2sor */
if ($travelo['2ok'] == "on")
{
    smallPic($smallpic2);
}

/* 3. Sor */
if ($travelo['3ok'] == "on")
{
    smallPic($smallpic3);
}
/* 4.sor */
if ($travelo['4ok'] == "on")
{
    smallPic($smallpic4);
}
/* 5.sor */
if ($travelo['5ok'] == "on")
{
    smallPic($smallpic5);
}
picEnd();
/* Leggyakoribb 1 hasábos */
if ($travelo['mostrecent_1c_ok'] == "on")
{
    mostRecent1c($newsletter['picfolder'], $travelo_mostrecent);
}
/* Leggyakoribb 2 hasábos */
if ($travelo['mostrecent_2c_ok'] == "on")
{
    mostRecent2c($newsletter['picfolder'], $travelo_mostrecent2);
}
/* Cikkiek */
if ($travelo['article_ok'] == "on")
{
    articles($newsletter['picfolder'], $travelo_article);
}
/*Hirdetések2 */
if ($travelo['ad2_ok'] == "b_b")
{
    doubleBanner($banner2_1, $banner2_2);
}
if ($travelo['ad2_ok'] == "b2_sz")
{
    bannerAndText($banner2_1, $textad2);
}
if ($travelo['ad2_ok'] == "sz_sz")
{
    doubleText($textad2, $textad2_2);
}
/* Hirdetések */
if ($travelo['ad_ok'] == "t_b")
{
    turPanAndBanner($turpan, $banner);
}
if ($travelo['ad_ok'] == "b_sz")
{
    bannerAndText($banner, $textad);
}
if ($travelo['ad_ok'] == "t_sz")
{
    turPanAndText($turpan, $textad);
}
/* Bottom menü */
bottomMenu($newsletter['picfolder']);
/* Legal statement */
legalStatement();
tableEnd();
bottomMenuMap();
htmlEnd();
if ($save==1) {
$title=$id."-travelo.txt";
file_put_contents("save/$title", ob_get_contents());
$url="showtxt.php?title=$title";
header("Location: $url");

}
?>