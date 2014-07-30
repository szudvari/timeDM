<?php

require_once 'db.php';
require_once 'userdb.php';
require_once 'functions.php';
require_once 'config.php';
$id = $_GET['hirlevel_id'];
$table = "travelo_hirlev";
$con = connectDb();
$travelo = getANewsletterIso($table, $id);
closeDb($con);

//nagyképes
$travelo_separator['bp_link'] = separator($travelo['bp_link']);
$travelo_bp['link'] = $travelo['bp_link'] . $travelo_separator['bp_link'] . 'utm_source=' . $travelo['analytics_source'] . '&utm_medium=' . $travelo['analytics_medium'] . '&utm_campaign=' . $travelo['bp_analytics'];

$travelo_separator['1l_link'] = separator($travelo['1l_link']);
$smallpic1['l_link'] = $travelo['1l_link'] . $travelo_separator['1l_link'] . 'utm_source=' . $travelo['analytics_source'] . '&utm_medium=' . $travelo['analytics_medium'] . '&utm_campaign=' . $travelo['1l_analytics'];

//1 - jobb
$travelo_separator['1r_link'] = separator($travelo['1r_link']);
$smallpic1['r_link'] = $travelo['1r_link'] . $travelo_separator['1r_link'] . 'utm_source=' . $travelo['analytics_source'] . '&utm_medium=' . $travelo['analytics_medium'] . '&utm_campaign=' . $travelo['1r_analytics'];

//2 - bal
$travelo_separator['2l_link'] = separator($travelo['2l_link']);
$smallpic2['l_link'] = $travelo['2l_link'] . $travelo_separator['2l_link'] . 'utm_source=' . $travelo['analytics_source'] . '&utm_medium=' . $travelo['analytics_medium'] . '&utm_campaign=' . $travelo['2l_analytics'];

$travelo_separator['2r_link'] = separator($travelo['2r_link']);
$smallpic2['r_link'] = $travelo['2r_link'] . $travelo_separator['2r_link'] . 'utm_source=' . $travelo['analytics_source'] . '&utm_medium=' . $travelo['analytics_medium'] . '&utm_campaign=' . $travelo['2r_analytics'];

//3 - bal
$travelo_separator['3l_link'] = separator($travelo['3l_link']);
$smallpic3['l_link'] = $travelo['3l_link'] . $travelo_separator['3l_link'] . 'utm_source=' . $travelo['analytics_source'] . '&utm_medium=' . $travelo['analytics_medium'] . '&utm_campaign=' . $travelo['3l_analytics'];

//3 - jobb
$travelo_separator['3r_link'] = separator($travelo['3r_link']);
$smallpic3['r_link'] = $travelo['3r_link'] . $travelo_separator['3r_link'] . 'utm_source=' . $travelo['analytics_source'] . '&utm_medium=' . $travelo['analytics_medium'] . '&utm_campaign=' . $travelo['3r_analytics'];

//4 - bal
$travelo_separator['4l_link'] = separator($travelo['4l_link']);
$smallpic4['l_link'] = $travelo['4l_link'] . $travelo_separator['4l_link'] . 'utm_source=' . $travelo['analytics_source'] . '&utm_medium=' . $travelo['analytics_medium'] . '&utm_campaign=' . $travelo['4l_analytics'];

//4 - jobb
$travelo_separator['4r_link'] = separator($travelo['4r_link']);
$smallpic4['r_link'] = $travelo['4r_link'] . $travelo_separator['4r_link'] . 'utm_source=' . $travelo['analytics_source'] . '&utm_medium=' . $travelo['analytics_medium'] . '&utm_campaign=' . $travelo['4r_analytics'];

//5 - bal
$travelo_separator['5l_link'] = separator($travelo['5l_link']);
$smallpic5['l_link'] = $travelo['5l_link'] . $travelo_separator['5l_link'] . 'utm_source=' . $travelo['analytics_source'] . '&utm_medium=' . $travelo['analytics_medium'] . '&utm_campaign=' . $travelo['5l_analytics'];

//5 - jobb
$travelo_separator['5r_link'] = separator($travelo['5r_link']);
$smallpic5['r_link'] = $travelo['5r_link'] . $travelo_separator['5r_link'] . 'utm_source=' . $travelo['analytics_source'] . '&utm_medium=' . $travelo['analytics_medium'] . '&utm_campaign=' . $travelo['5r_analytics'];

//Leggyakoribb keresések
//1 oszlopos
//1. sor
$travelo_separator['mostrecent_1_link'] = separator($travelo['mostrecent_1_link']);
$travelo_mostrecent['1_link'] = $travelo['mostrecent_1_link'] . $travelo_separator['mostrecent_1_link'] . 'utm_source=' . $travelo['analytics_source'] . '&utm_medium=' . $travelo['analytics_medium'] . '&utm_campaign=' . $travelo['mostrecent_1_analytics'];

//2. sor
$travelo_separator['mostrecent_2_link'] = separator($travelo['mostrecent_2_link']);
$travelo_mostrecent['2_link'] = $travelo['mostrecent_2_link'] . $travelo_separator['mostrecent_2_link'] . 'utm_source=' . $travelo['analytics_source'] . '&utm_medium=' . $travelo['analytics_medium'] . '&utm_campaign=' . $travelo['mostrecent_2_analytics'];

//3. sor
$travelo_separator['mostrecent_3_link'] = separator($travelo['mostrecent_3_link']);
$travelo_mostrecent['3_link'] = $travelo['mostrecent_3_link'] . $travelo_separator['mostrecent_3_link'] . 'utm_source=' . $travelo['analytics_source'] . '&utm_medium=' . $travelo['analytics_medium'] . '&utm_campaign=' . $travelo['mostrecent_3_analytics'];

//4. sor
$travelo_separator['mostrecent_4_link'] = separator($travelo['mostrecent_4_link']);
$travelo_mostrecent['4_link'] = $travelo['mostrecent_4_link'] . $travelo_separator['mostrecent_4_link'] . 'utm_source=' . $travelo['analytics_source'] . '&utm_medium=' . $travelo['analytics_medium'] . '&utm_campaign=' . $travelo['mostrecent_4_analytics'];

//5. sor
$travelo_separator['mostrecent_5_link'] = separator($travelo['mostrecent_5_link']);
$travelo_mostrecent['5_link'] = $travelo['mostrecent_5_link'] . $travelo_separator['mostrecent_5_link'] . 'utm_source=' . $travelo['analytics_source'] . '&utm_medium=' . $travelo['analytics_medium'] . '&utm_campaign=' . $travelo['mostrecent_5_analytics'];

//2 oszlopos
//1. sor
//Bal
$travelo_separator['mostrecent_1l_link'] = separator($travelo['mostrecent_1l_link']);
$travelo_mostrecent2['1l_link'] = $travelo['mostrecent_1l_link'] . $travelo_separator['mostrecent_1l_link'] . 'utm_source=' . $travelo['analytics_source'] . '&utm_medium=' . $travelo['analytics_medium'] . '&utm_campaign=' . $travelo['mostrecent_1l_analytics'];

//Jobb
$travelo_separator['mostrecent_1r_link'] = separator($travelo['mostrecent_1r_link']);
$travelo_mostrecent2['1r_link'] = $travelo['mostrecent_1r_link'] . $travelo_separator['mostrecent_1r_link'] . 'utm_source=' . $travelo['analytics_source'] . '&utm_medium=' . $travelo['analytics_medium'] . '&utm_campaign=' . $travelo['mostrecent_1r_analytics'];

//2. sor
//Bal
$travelo_separator['mostrecent_2l_link'] = separator($travelo['mostrecent_2l_link']);
$travelo_mostrecent2['2l_link'] = $travelo['mostrecent_2l_link'] . $travelo_separator['mostrecent_2l_link'] . 'utm_source=' . $travelo['analytics_source'] . '&utm_medium=' . $travelo['analytics_medium'] . '&utm_campaign=' . $travelo['mostrecent_2l_analytics'];

//Jobb
$travelo_separator['mostrecent_2r_link'] = separator($travelo['mostrecent_2r_link']);
$travelo_mostrecent2['2r_link'] = $travelo['mostrecent_2r_link'] . $travelo_separator['mostrecent_2r_link'] . 'utm_source=' . $travelo['analytics_source'] . '&utm_medium=' . $travelo['analytics_medium'] . '&utm_campaign=' . $travelo['mostrecent_2r_analytics'];

//3. sor
//Bal
$travelo_separator['mostrecent_3l_link'] = separator($travelo['mostrecent_3l_link']);
$travelo_mostrecent2['3l_link'] = $travelo['mostrecent_3l_link'] . $travelo_separator['mostrecent_3l_link'] . 'utm_source=' . $travelo['analytics_source'] . '&utm_medium=' . $travelo['analytics_medium'] . '&utm_campaign=' . $travelo['mostrecent_3l_analytics'];

//Jobb
$travelo_separator['mostrecent_3r_link'] = separator($travelo['mostrecent_3r_link']);
$travelo_mostrecent2['3r_link'] = $travelo['mostrecent_3r_link'] . $travelo_separator['mostrecent_3r_link'] . 'utm_source=' . $travelo['analytics_source'] . '&utm_medium=' . $travelo['analytics_medium'] . '&utm_campaign=' . $travelo['mostrecent_3r_analytics'];
$travelo_mostrecent2['3r'] = '<table width="100%" cellpadding="0" cellspacing="0" border="0" style="margin: 10px"><tr><td><a href="' . $travelo_mostrecent2['3r_link'] . '" style="' . $style['mostrecent'] . '">' . $travelo['mostrecent_3r_puretext'] . '<span style="' . $style['mostrecent_highlight'] . '"> – ' . $travelo['mostrecent_3r_highlitedtext'] . '</span></a></td></tr></table>';
///4. sor
//Bal
$travelo_separator['mostrecent_4l_link'] = separator($travelo['mostrecent_4l_link']);
$travelo_mostrecent2['4l_link'] = $travelo['mostrecent_4l_link'] . $travelo_separator['mostrecent_4l_link'] . 'utm_source=' . $travelo['analytics_source'] . '&utm_medium=' . $travelo['analytics_medium'] . '&utm_campaign=' . $travelo['mostrecent_4l_analytics'];

//Jobb
$travelo_separator['mostrecent_4l_link'] = separator($travelo['mostrecent_4r_link']);
$travelo_mostrecent2['4r_link'] = $travelo['mostrecent_4r_link'] . $travelo_separator['mostrecent_4l_link'] . 'utm_source=' . $travelo['analytics_source'] . '&utm_medium=' . $travelo['analytics_medium'] . '&utm_campaign=' . $travelo['mostrecent_4r_analytics'];

//5. sor
//Bal
$travelo_separator['mostrecent_5l_link'] = separator($travelo['mostrecent_5l_link']);
$travelo_mostrecent2['5l_link'] = $travelo['mostrecent_5l_link'] . $travelo_separator['mostrecent_5l_link'] . 'utm_source=' . $travelo['analytics_source'] . '&utm_medium=' . $travelo['analytics_medium'] . '&utm_campaign=' . $travelo['mostrecent_5l_analytics'];

//Jobb
$travelo_separator['mostrecent_5r_link'] = separator($travelo['mostrecent_5r_link']);
$travelo_mostrecent2['5r_link'] = $travelo['mostrecent_5r_link'] . $travelo_separator['mostrecent_5r_link'] . 'utm_source=' . $travelo['analytics_source'] . '&utm_medium=' . $travelo['analytics_medium'] . '&utm_campaign=' . $travelo['mostrecent_5r_analytics'];

//Legfrisebb cikkek
//Kiemelt
$travelo_separator['harticle_link'] = separator($travelo['harticle_link']);
$travelo_article['h_link'] = $travelo['harticle_link'] . $travelo_separator['harticle_link'] . 'utm_source=' . $travelo['analytics_source'] . '&utm_medium=' . $travelo['analytics_medium'] . '&utm_campaign=' . $travelo['harticle_analytics'];

//cikk1
$travelo_separator['article_1_link'] = separator($travelo['article_1_link']);
$travelo_article['1_link'] = $travelo['article_1_link'] . $travelo_separator['article_1_link'] . 'utm_source=' . $travelo['analytics_source'] . '&utm_medium=' . $travelo['analytics_medium'] . '&utm_campaign=' . $travelo['article_1_analytics'];

//cikk2
$travelo_separator['article_2_link'] = separator($travelo['article_2_link']);
$travelo_article['2_link'] = $travelo['article_2_link'] . $travelo_separator['article_2_link'] . 'utm_source=' . $travelo['analytics_source'] . '&utm_medium=' . $travelo['analytics_medium'] . '&utm_campaign=' . $travelo['article_2_analytics'];

//cikk3
$travelo_separator['article_3_link'] = separator($travelo['article_3_link']);
$travelo_article['3_link'] = $travelo['article_3_link'] . $travelo_separator['article_3_link'] . 'utm_source=' . $travelo['analytics_source'] . '&utm_medium=' . $travelo['analytics_medium'] . '&utm_campaign=' . $travelo['article_3_analytics'];

//cikk4
$travelo_separator['article_4_link'] = separator($travelo['article_4_link']);
$travelo_article['4_link'] = $travelo['article_4_link'] . $travelo_separator['article_4_link'] . 'utm_source=' . $travelo['analytics_source'] . '&utm_medium=' . $travelo['analytics_medium'] . '&utm_campaign=' . $travelo['article_4_analytics'];

//Szöveges
$travelo_separator['textad_link'] = separator($travelo['textad_link']);
$travelo_textad['link'] = $travelo['textad_link'] . $travelo_separator['textad_link'] . 'utm_source=' . $travelo['analytics_source'] . '&utm_medium=' . $travelo['analytics_medium'] . '&utm_campaign=' . $travelo['textad_analytics'];
$travelo_textad['pic'] = '<a style="text-decoration:none;" href="' . $travelo_textad['link'] . '"><img src="' . $travelo['folder'] . '/' . $travelo['textad_pic'] . '" border="0" align="left" style="padding-right:10px;" /></a>';
$travelo_textad['title'] = '<a style="' . $style['travelo_textad_title'] . '" href="' . $travelo_textad['link'] . '">' . $travelo['textad_title'] . '</a>';
$travelo_textad['text'] = '<a style="' . $style['travelo_bptext'] . '" href="' . $travelo_textad['link'] . '">' . $travelo['textad_text'] . '</a>';

//Other

$csomag = iconv("UTF-8", "ISO-8859-2","Csomagár :");
$kiemelt = iconv("UTF-8", "ISO-8859-2", "Kiemelt ajánlatok:");
$leggyakoribb = iconv("UTF-8", "ISO-8859-2", "Leggyakoribb kresések:");
$cikkek = iconv("UTF-8", "ISO-8859-2", "Legfrissebb cikkeink:");
$turpan1 = iconv("UTF-8", "ISO-8859-2", "Utazási hírek:");
$turpan2 = iconv("UTF-8", "ISO-8859-2", "turizmus.com - utazási híreink forrása");
$hirdetes = iconv("UTF-8", "ISO-8859-2", "Hirdetés:");
$legal=iconv("UTF-8", "ISO-8859-2", "Ezt az mailt azért kapta, mert korábbi regisztrációjával hozzájárult
a Travelo és a CEMP csoport tartalmaiból összeállított hírlevél fogadásához.
Ha szeretne leiratkozni, küldje el szándékát a hirlevel@travelo.hu email címre!

--------------------------------------------------------------------------- 
A Confhotel-Net Kft. és a jelen hírlevélben szereplő partnerei fenntartják
az utazással kapcsolatos feltételek és árak módosításának jogát.

Confhotel-NEt Kft. | 1033 Budapest, Flórián tér 1. | Tel.: +36 1 7001 002
Fax: +36 1 7002 502 | E-mail: info@travelo.hu
---------------------------------------------------------------------------");




htmlHead($newsletter['lifeTitle'], $newsletter['lifeCharset'], NULL, NULL, $style['travelo_style']);
ob_start();
echo <<<EOT
$kiemelt
{$travelo['bp_title']}
{$travelo['bp_text']}
>>> {$travelo_bp['link']}
$csomag{$travelo['bp_price']}

EOT;
if ($travelo['1ok'] == "on")
{
    echo <<<EOT
    
{$travelo['1l_title']}
{$travelo['1l_subtitle']}
{$travelo['1l_text']}
>>> {$smallpic1['l_link']}
$csomag{$travelo['1l_price']}

{$travelo['1r_title']}
{$travelo['1r_subtitle']}
{$travelo['1r_text']}
>>> {$smallpic1['r_link']}
$csomag{$travelo['1r_price']}

EOT;
}
/* 2sor */
if ($travelo['2ok'] == "on")
{
       echo <<<EOT
    
{$travelo['2l_title']}
{$travelo['2l_subtitle']}
{$travelo['2l_text']}
>>> {$smallpic2['l_link']}
$csomag{$travelo['2l_price']}

{$travelo['2r_title']}
{$travelo['2r_subtitle']}
{$travelo['2r_text']}
>>> {$smallpic2['r_link']}
$csomag{$travelo['2r_price']}

EOT;
}

/* 3. Sor */
if ($travelo['3ok'] == "on")
{
      echo <<<EOT
    
{$travelo['3l_title']}
{$travelo['3l_subtitle']}
{$travelo['3l_text']}
>>> {$smallpic3['l_link']}
$csomag{$travelo['3l_price']}

{$travelo['3r_title']}
{$travelo['3r_subtitle']}
{$travelo['3r_text']}
>>> {$smallpic3['r_link']}
$csomag{$travelo['3r_price']}

EOT;
}
/* 4.sor */
if ($travelo['4ok'] == "on")
{
      echo <<<EOT
    
{$travelo['4l_title']}
{$travelo['4l_subtitle']}
{$travelo['4l_text']}
>>> {$smallpic4['l_link']}
$csomag{$travelo['4l_price']}

{$travelo['4r_title']}
{$travelo['4r_subtitle']}
{$travelo['4r_text']}
>>> {$smallpic4['r_link']}
$csomag{$travelo['4r_price']}

EOT;
}
/* 5.sor */
if ($travelo['5ok']== "on")
{
    echo <<<EOT
    
{$travelo['5l_title']}
{$travelo['5l_subtitle']}
{$travelo['5l_text']}
>>> {$smallpic5['l_link']}
$csomag{$travelo['5l_price']}

{$travelo['5r_title']}
{$travelo['5r_subtitle']}
{$travelo['5r_text']}
>>> {$smallpic5['r_link']}
$csomag{$travelo['5r_price']}

EOT;
}
if ($travelo['mostrecent_1c_ok'] == "on")
{
        echo <<<EOT

---
$leggyakoribb
{$travelo['mostrecent_1_puretext']} - {$travelo['mostrecent_1_highlitedtext']}
>>> {$travelo_mostrecent['1_link']} 
        
{$travelo['mostrecent_2_puretext']} - {$travelo['mostrecent_2_highlitedtext']}
>>> {$travelo_mostrecent['2_link']}
        
{$travelo['mostrecent_3_puretext']} - {$travelo['mostrecent_3_highlitedtext']}
>>> {$travelo_mostrecent['3_link']}
        
{$travelo['mostrecent_4_puretext']} - {$travelo['mostrecent_4_highlitedtext']}
>>> {$travelo_mostrecent['4_link']}
        
{$travelo['mostrecent_5_puretext']} - {$travelo['mostrecent_5_highlitedtext']}
>>> {$travelo_mostrecent['5_link']}

EOT;
}
/* Leggyakoribb 2 hasábos */
if ($travelo['mostrecent_2c_ok'] == "on")
{
    echo <<<EOT

---
$leggyakoribb
{$travelo['mostrecent_1l_puretext']} - {$travelo['mostrecent_1l_highlitedtext']}
>>> {$travelo_mostrecent2['1l_link']} 
    
{$travelo['mostrecent_1r_puretext']} - {$travelo['mostrecent_1r_highlitedtext']}
>>> {$travelo_mostrecent2['1r_link']} 
        
{$travelo['mostrecent_2l_puretext']} - {$travelo['mostrecent_2l_highlitedtext']}
>>> {$travelo_mostrecent2['2l_link']}     
      
{$travelo['mostrecent_2r_puretext']} - {$travelo['mostrecent_2r_highlitedtext']}
>>> {$travelo_mostrecent2['2r_link']}             
        
{$travelo['mostrecent_3l_puretext']} - {$travelo['mostrecent_3l_highlitedtext']}
>>> {$travelo_mostrecent2['3l_link']}     
      
{$travelo['mostrecent_3r_puretext']} - {$travelo['mostrecent_3r_highlitedtext']}
>>> {$travelo_mostrecent2['3r_link']}             
        
{$travelo['mostrecent_4l_puretext']} - {$travelo['mostrecent_4l_highlitedtext']}
>>> {$travelo_mostrecent2['4l_link']}     
      
{$travelo['mostrecent_4r_puretext']} - {$travelo['mostrecent_4r_highlitedtext']}
>>> {$travelo_mostrecent2['4r_link']}              
               
{$travelo['mostrecent_5l_puretext']} - {$travelo['mostrecent_5l_highlitedtext']}
>>> {$travelo_mostrecent2['5l_link']}     
      
{$travelo['mostrecent_5r_puretext']} - {$travelo['mostrecent_5r_highlitedtext']}
>>> {$travelo_mostrecent2['5r_link']}                      
        
EOT;
}
/* Cikkiek */
if ($travelo['article_ok'] == "on")
{
echo <<<EOT

---
$cikkek
{$travelo['harticle_title']}
{$travelo['harticle_date']}
{$travelo['harticle_text']}
>>>{$travelo_article['h_link']}
    
{$travelo['article_1_title']}
{$travelo['article_1_date']}
>>>{$travelo_article['1_link']}
    
{$travelo['article_2_title']}
{$travelo['article_2_date']}
>>>{$travelo_article['2_link']}
    
{$travelo['article_3_title']}
{$travelo['article_3_date']}
>>>{$travelo_article['3_link']}
    
{$travelo['article_4_title']}
{$travelo['article_4_date']}
>>>{$travelo_article['4_link']}  
    
EOT;
}
/* Hirdetések */
if ($travelo['ad_ok'] == "t_b")
{
echo <<<EOT

--- 
$turpan1
{$travelo['turpan_1_title']} - {$travelo['turpan_1_link']}
{$travelo['turpan_2_title']} - {$travelo['turpan_2_link']}
{$travelo['turpan_3_title']} - {$travelo['turpan_3_link']}
{$travelo['turpan_4_title']} - {$travelo['turpan_4_link']}
   
$turpan2
        
EOT;
}
if ($travelo['ad_ok'] == "b_sz")
{
echo <<<EOT

--- 
$hirdetes
{$travelo['textad_title']}
{$travelo['textad_text']}
>>>{$travelo_textad['link']}
 
EOT;

}
if ($travelo['ad_ok'] == "t_sz")
{
   echo <<<EOT
    
 --- 
$turpan1
{$travelo['turpan_1_title']} - {$travelo['turpan_1_link']}
{$travelo['turpan_2_title']} - {$travelo['turpan_2_link']}
{$travelo['turpan_3_title']} - {$travelo['turpan_3_link']}
{$travelo['turpan_4_title']} - {$travelo['turpan_4_link']}
   
$turpan2
   
   --- 
$hirdetes
{$travelo['textad_title']}
{$travelo['textad_text']}
>>>{$travelo_textad['link']}
EOT;
}

echo <<<EOT


$legal
EOT;


$title=$id."-travelo_text.txt";
file_put_contents("save/$title", ob_get_contents());
$url="showtxt.php?title=$title";
header("Location: $url");
htmlEnd();