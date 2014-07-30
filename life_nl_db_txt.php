<?php

require_once 'db.php';
require_once 'userdb.php';
require_once 'functions.php';
require_once 'config.php';
$id = $_GET['hirlevel_id'];
$table = "life_hirlev";
$con = connectDbIso();
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


//Other
$legal=iconv("UTF-8", "ISO-8859-2", "A Life Utazás és a jelen hírlevélben szereplő partnerei fenntartják
az utazással kapcsolatos feltételek és árak módosítasának jogát.
A Life.hu Utazási mellékletét a Confhotel-Net Kft. üzemelteti. 
Kapcsolat: +36-20-777-8095; life@travelo.hu 

--------------------------------------------------------------------------- 
Ezt a levelet az optimail online direkt-marketing rendszeren keresztül 
küldtük a(z) {email} címre az Ön előzetes hozzájárulásával, melyet az Origo
Zrt-nek tett a freemail.hu ingyenes rendszerébe történő regisztrációja
során. E szerint Ön marketingtartalmú célzott üzenetek fogadását vállalja. 
Szolgáltatásunkkal kapcsolatban bővebb információval szolgálunk az Ön 
számára a http://www.optimail.hu oldalon. 
<br>
Amennyiben a továbbiakban mégsem szeretne az érdeklődési körének megfelelő 
kedvezményes ajánlatokat vagy nyereményjáték-ismertetőket kapni, látogasson 
el az alábbi címre: 
{unsubscribeUrl} 

Az Origo Zrt. adatkezelési nyilvántartási azonosítója: 820-0001 
---------------------------------------------------------------------------");
$csomag = iconv("UTF-8", "ISO-8859-2","Csomagár :");


htmlHead($newsletter['lifeTitle'], $newsletter['lifeCharset'], NULL, NULL, $style['travelo_style']);
ob_start();
echo <<<EOT
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
echo <<<EOT


$legal

EOT;

$title=$id."-life_onepic_text.txt";
file_put_contents("save/$title", ob_get_contents());
$url="showtxt.php?title=$title";
header("Location: $url");
htmlEnd();