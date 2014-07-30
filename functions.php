<?php

include_once 'userdb.php';
include_once 'db.php';
include_once 'config.php';

function separator($link) {
    $findme = '?';
    $pos = strpos($link, $findme);
    if ($pos === false) {
        $separator_result = '?';
    } else {
        $separator_result = '&';
    }
    return $separator_result;
}

function auto_copyright($year = 'auto') {
    if (intval($year) == 'auto') {
        $year = date('Y');
    }
    if (intval($year) == date('Y')) {
        $cr = intval($year);
    }
    if (intval($year) < date('Y')) {
        $cr = intval($year) . ' - ' . date('Y');
    }
    if (intval($year) > date('Y')) {
        $cr = date('Y');
    }
    echo "($cr)";
}

function getFolderName($string) {
    $array = explode("/", $string);
    $folderName = end($array);
    return $folderName;
}

function upload_picture($file, $folder) {
    $allowedExts = array("gif", "jpeg", "jpg", "png");
    $temp = explode(".", $file["name"]);
    $extension = end($temp);
//print_r($file);
    if ((($file["type"] == "image/gif") 
            || ($file["type"] == "image/jpeg") 
            || ($file["type"] == "image/jpg") 
            || ($file["type"] == "image/pjpeg") 
            || ($file["type"] == "image/x-png") 
            || ($file["type"] == "image/png")) 
            && ($file["size"] < 8000000) 
            && in_array($extension, $allowedExts)) {
        if ($file["error"] > 0) {
            echo "Return Code: " . $file["error"] . "<br>";
        } else {
            if (file_exists($folder . "/" . $file["name"])) {
                echo $file["name"] . " already exists. ";
            } else {
//				echo "move ";
//				echo $folder . "/" . $file["name"];
                move_uploaded_file($file["tmp_name"], $folder . "/" . $file["name"]);
            }
        }
    } else {
        echo "Invalid file";
    }
}

/* html functions */

function tableStart() {
    echo <<<EOT
    <tbody>
    <tr>
        <td width="100%" align="center">
            <table style="border: none; width: 660px;" border="0" cellspacing="0" cellpadding="0">
                <tbody>
EOT;
}

function newsletterHeader($style, $travelo_menu) {
    echo <<<EOT
    <!--Logo+fejléc-->
<tr>
    <td>
        <table  cellpadding="0" cellspacing="0" style="width:660px;margin:0 0 5px 0;">
            <tr>
                <td style={$style['travelo_header']}>{$style['travelo_logo']}</td>
                <td style="width:70%;">
                    <table cellpadding="0" cellspacing="0" style="width:100%;">
                        <tr>
                            <td valign="baseline" style={$style['travelo_menu_left']}>&nbsp;</td>
                            <td valign="baseline" style={$style['travelo_menu']}>{$travelo_menu['1']}</td>
                            <td valign="baseline" style={$style['travelo_menu']}>{$travelo_menu['2']}</td>
                            <td valign="baseline" style={$style['travelo_menu']}>{$travelo_menu['3']}</td>
                            <td valign="baseline" style={$style['travelo_menu']}>{$travelo_menu['4']}</td>
                            <td valign="baseline" style={$style['travelo_menu']}>{$travelo_menu['5']}</td>
                            <td valign="baseline" style={$style['travelo_menu_right']}>&nbsp;</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </td>
</tr>
<!--Logo+fejléc vége-->
EOT;
}

function sendingDate($sdate) {
    echo <<<EOT
    <!-- Dátum-->
                        <tr>
                            <td style="padding-bottom: 5px; text-align:right; color:#9e9e9e; font-size:14px">$sdate</td>
                        </tr> 
                        <!-- Dátum vége-->
EOT;
}

function bigPic($travelo_bp) {
    echo <<<EOT
    <!--Nagyképes-->
<tr>
    <td style="background:#ffffff; margin-top:15px">
        <table  cellpadding="0" cellspacing="0" style="width:625px;margin:15px 20px 15px 15px;">
            <!--Kép-->
            <tr>
                <td align="center">{$travelo_bp['pic']}</td>
            </tr>
            <tr>
                <td align="center" style="">
                    <table cellpadding="0" cellspacing="0" style="background:#f7f5ef;padding:10px 10px;width:620px;margin-left:5px;">
                        <!--Cím-->
                        <tr>
                            <td style="">{$travelo_bp['title']}</td>
                        </tr>
                        <!--Szöveg-->
                        <tr>
                            <td style="padding-top:5px;">{$travelo_bp['text']}</td>
                        </tr>                        
                    </table>
                </td>
            </tr>
        </table>
    </td>
</tr>
<!--Nagyképes vége-->
EOT;
}

function smallPic($smallpic) {
    echo <<<EOT
    <!--1sor--> 
    <tr>
        <td style="background:#ffffff">
            <table cellpadding="0" cellspacing="0" style="width:625px;margin:0 20px 20px 15px;" align="center">
                <tr>
                    <!-- Bal-->
                    <td style="width:305px;" align="center" valign="top">
                        <table cellpadding="0" cellspacing="0" align="center" style="width:305px;">
                            <!--Kép-->
                            <tr>
                                <td align="center">{$smallpic['l_pic']}</td>
                            </tr>
                            <tr>
                                <td align="center" style="padding: 0;width:305px;">
                                    <table cellpadding="0" cellspacing="0" style="background:#f7f5ef;padding:5px 10px;margin-left:5px;width:300px;">
                                        <!--Cím-->
                                        <tr>
                                            <td>{$smallpic['l_title']}</td>
                                        </tr>
                                        <!--Alcím-->
                                        <tr>
                                            <td style="">{$smallpic['l_subtitle']}</td>
                                        </tr> 
                                        <!--Szöveg-->
                                        <tr>
                                            <td style="padding-top:4px;">{$smallpic['l_text']}</td>
                                        </tr>                        
                                    </table>
                                </td>
                            </tr>
                        </table></td>
                    <td style="width:15px;">&nbsp;</td>  
                    <!--Jobb-->
                    <td style="width:305px;" align="center" valign="top">
                        <table cellpadding="0" cellspacing="0" align="center" style="width:305px;">
                            <!--Kép-->
                            <tr>
                                <td align="center">{$smallpic['r_pic']}</td>
                            </tr>
                            <tr>
                                <td align="center" style="padding: 0;width:305px;">
                                    <table cellpadding="0" cellspacing="0" style="background:#f7f5ef;padding:5px 10px;margin-left:5px;width:300px;">
                                        <!--Cím-->
                                        <tr>
                                            <td>{$smallpic['r_title']}</td>
                                        </tr>
                                        <!--Alcím--> 
                                        <tr>
                                            <td>{$smallpic['r_subtitle']}</td>
                                        </tr>                                         
                                        <!--Szöveg-->
                                        <tr>
                                            <td style="padding-top:4px;">{$smallpic['r_text']}</td>
                                        </tr>                        
                                    </table>
                                </td>
                            </tr>
                        </table>                   
                    </td>
                </tr>
            </table>
        </td>
    </tr>
EOT;
}

function picEnd() {
    echo <<<EOT
    <!--Kisképes blokk vége-->
EOT;
}

function mostRecent1c($picfolder, $travelo_mostrecent) {
    echo <<<EOT
<!--Leggyakoribb keresések 1 hasábos-->
<tr>
    <td style="background:#ffffff">
        <table cellpadding="0" cellspacing="0" style="margin-bottom: 20px;">
            <tr>
                <td align="center" style="background:#ffffff;">
                    <img src="$picfolder/leggyakoribb-top.png" border="0" style="display: block;" />
                </td>
            </tr>
            <tr>
                <td style="background: #ffffff">
                    <table width="620px" cellpadding="0" cellspacing="0" style="border-left:2px solid #e5e5e5;border-right:2px solid #e5e5e5; margin: 0 20px">
                        <tr>
                            <td style="width:100%" valign="top">
                            {$travelo_mostrecent['1']}
                            {$travelo_mostrecent['2']}
                            {$travelo_mostrecent['3']}
                            {$travelo_mostrecent['4']}
                            {$travelo_mostrecent['5']}
                             </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td align="center" style="background:#ffffff">
                    <img src="$picfolder/legfrissebb-bottom.png" />
                </td>
            </tr>                                
        </table>
    </td>
</tr>
<!--Leggyakoribb keresések 1 hasábos vége-->
EOT;
}

function mostRecent2c($picfolder, $travelo_mostrecent2) {
    echo <<<EOT
    <!--Leggyakoribb (2 hasábos)--> 
<tr>
    <td style="background:#ffffff">
        <table cellpadding="0" cellspacing="0" style="margin-bottom: 20px;">
            <tr>
                <td align="center" style="background:#ffffff;">
                    <img src="$picfolder/leggyakoribb-top.png" border="0" style="display: block;" />
                </td>
            </tr>
            <tr>
                <td style="background: #ffffff">
                    <table width="620px" cellpadding="0" cellspacing="0" style="border-left:2px solid #e5e5e5;border-right:2px solid #e5e5e5; margin: 0 20px">
                        <tr>
                            <td style="width:50%" valign="top">
                            {$travelo_mostrecent2['1l']}
                            {$travelo_mostrecent2['2l']}
                            {$travelo_mostrecent2['3l']}
                            {$travelo_mostrecent2['4l']}
                            {$travelo_mostrecent2['5l']}
                                
                                </td>
                            <td style="width:50%" valign="top">
                            {$travelo_mostrecent2['1r']}
                            {$travelo_mostrecent2['2r']}
                            {$travelo_mostrecent2['3r']}
                            {$travelo_mostrecent2['4r']}
                            {$travelo_mostrecent2['5r']}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td align="center" style="background:#ffffff">
                    <img src="$picfolder/legfrissebb-bottom.png" />
                </td>
            </tr>                                
        </table>
    </td>
</tr>
<!--Leggyakoribb (2 hasábos) vége-->
EOT;
}

function articles($picfolder, $travelo_article) {
    echo <<<EOT
    <!--Cikkek-->
<tr>
    <td style="background:#ffffff">
        <table cellpadding="0" cellspacing="0" style="margin-bottom:20px;">
            <tr>
                <td align="center" style="background:#ffffff">
                    <img src="$picfolder/legfrissebb-top.png" border="0" style="display: block;" />
                </td>
            </tr>
            <tr>
                <td style="background: #ffffff">
                    <table width="620" cellpadding="0" cellspacing="0" style="border-left:2px solid #e5e5e5;border-right:2px solid #e5e5e5; margin: 0 20px;width:620px;">
                        <tr>
                            <td style="width:300px;" valign="top">
                                <table style="width:300px;">
                                    <tr>
                                        <td style="padding: 0px 10px">
                                            {$travelo_article['h_title']}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 5px 10px">
                                            {$travelo_article['h_date']}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 0px 10px">
                                            {$travelo_article['h_text']}
                                        </td>
                                    </tr>                        
                                </table>
                            </td>
                            <td style="width:20px;"></td>  
                            <td style="width:300px;" valign="top">
                                <table cellpadding="0" cellspacing="0" border="0" style="width:300px;padding-bottom:10px;">
                                    <tr>
                                        <td>{$travelo_article['1_title']}</td>
                                    </tr>
                                    <tr>
                                        <td>{$travelo_article['1_date']}</td>
                                    </tr>
                                </table>
                                <table cellpadding="0" cellspacing="0" border="0" style="width:300px;padding-bottom:10px;">
                                    <tr>
                                        <td>{$travelo_article['2_title']}</td>
                                    </tr>
                                    <tr>
                                        <td>{$travelo_article['2_date']}</td>
                                    </tr>
                                </table>
                                <table cellpadding="0" cellspacing="0" border="0" style="width:300px;padding-bottom:10px;">
                                     <tr>
                                        <td>{$travelo_article['3_title']}</td>
                                    </tr>
                                    <tr>
                                        <td>{$travelo_article['3_date']}</td>
                                    </tr>
                                </table>
                                <table cellpadding="0" cellspacing="0" border="0" style="width:300px;padding-bottom:10px;">
                                    <tr>
                                        <td>{$travelo_article['4_title']}</td>
                                    </tr>
                                    <tr>
                                        <td>{$travelo_article['4_date']}</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td align="center" style="background:#ffffff">
                    <img src="$picfolder/legfrissebb-bottom.png" />
                </td>
            </tr>                                
        </table>
    </td>
</tr>            
<!--Cikkek vége-->
EOT;
}

function bannerAndText($banner, $textad) {
    echo <<<EOT
    <!--Banner + szöveges-->
<tr>
    <td style="background:#ffffff">
        <table cellpadding="0" cellspacing="0" style="width:625px;margin:0 20px 20px 15px;" align="center">
            <tr>
                <td style="width:305px;" align="center" valign="top">
                    $banner
                </td>
                <td style="width:20px;">&nbsp;</td>  
                <td style="width:305px;" align="center" valign="top">
                    $textad                                          
                </td>                  
            </tr>
        </table>
    </td>
</tr> 
<!--Banner + szöveges vége-->
EOT;
}

function doubleText($textad2_1, $textad2_2) {
    echo <<<EOT
    <!--Dupla szoveges-->
<tr>
    <td style="background:#ffffff">
        <table cellpadding="0" cellspacing="0" style="width:625px;margin:0 20px 20px 15px;" align="center">
            <tr>
                <td style="width:305px;" align="center" valign="top">
                    $textad2_1
                </td>
                <td style="width:20px;">&nbsp;</td>  
                <td style="width:305px;" align="center" valign="top">
                    $textad2_2                                         
                </td>                  
            </tr>
        </table>
    </td>
</tr> 
<!--Dupla szoveges vege-->
EOT;
}

function doubleBanner($banner2_1, $banner2_2) {
    echo <<<EOT
    <!--Dupla banner-->
<tr>
    <td style="background:#ffffff">
        <table cellpadding="0" cellspacing="0" style="width:625px;margin:0 20px 20px 15px;" align="center">
            <tr>
                <td style="width:305px;" align="center" valign="top">
                    $banner2_1
                </td>
                <td style="width:20px;">&nbsp;</td>  
                <td style="width:305px;" align="center" valign="top">
                    $banner2_2                                         
                </td>                  
            </tr>
        </table>
    </td>
</tr> 
<!--Dupla banner vége-->
EOT;
}

function turPanAndBanner($turpan, $banner) {
    echo <<<EOT
    <!--Turpan + banner-->
<tr>
    <td align="center" style="background:#ffffff">
        <table cellpadding="0" cellspacing="0" style="width:625px;margin:0 20px 20px 15px;" align="center">
            <tr>
                <!--Turpan-->                                       
                <td style="width:305px;" align="center" valign="top">
                    $turpan
                </td>
                <!--Turpan vége-->
                <td style="width:20px;">&nbsp;</td>
                <!--Banner-->
                <td style="width:305px;" align="center" valign="top">
                    $banner
                </td>
            </tr>
        </table>
    </td>
</tr>                        
<!--Turpan+Banner vége-->
EOT;
}

function turPanAndText($turpan, $textad) {
    echo <<<EOT
        <!--Turpan + szöveges-->
<tr>
    <td align="center" style="background:#ffffff">
        <table cellpadding="0" cellspacing="0" style="width:625px;margin:0 20px 20px 15px;" align="center">
            <tr>
                <!--Turpan-->                                       
                <td style="width:305px;" align="center" valign="top">
                    $turpan
                </td>
                <!--Turpan vége-->
                <td style="width:20px;">&nbsp;</td>  
                <td style="width:305px;" align="center" valign="top">
                    $textad                                         
                </td>                  
            </tr>
        </table>
    </td>
</tr> 
<!--Turpan + szöveges vége-->
EOT;
}

function legalStatement() {
    echo <<<EOT
    <tr>
    <td valign="top">
        <table cellpadding="0" cellspacing="0" width="100%" style="margin-top: 20px; background: #ffffff">
            <tr>
                <td style="padding: 20px; font-size:12px; color: #5d5d5d; text-align:center">
                    Ezt az emailt azért kaptad, mert Indapass regisztrációddal hozzájárultál a Travelo és a CEMP csoport tartalmaiból összeállított hírlevél fogadásához. Ha szeretnél leiratkozni, <a href="%Link:Unsubscribe%" style="color: #ec006e; text-decoration:none">itt</a> teheted meg.
                    <br /><br />
                    A Confhotel-Net Kft. és a jelen hírlevélben szereplő partnerei fenntartják az utazással kapcsolatos feltételek és árak módosításának jogát.
                </td>
            </tr>
        </table>
        <table cellpadding="0" cellspacing="0" width="100%" style="margin-top: 20px;">
            <tr>
                <td style="padding: 20px; font-size:12px; color: #5d5d5d; font-weight:bold; text-align:center">
                    Confhotel-Net Kft.  •  1033 Budapest, Flórián tér 1.  •  Tel.: +36 1 7001 002  •  Fax: +36 1 7002 502  •  E-mail: <a href="" style="color: #ec006e; text-decoration:none">info@travelo.hu</a>
                </td>
            </tr>
        </table>            
    </td>
</tr>
EOT;
}

function tableEnd() {
    echo <<<EOT
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
EOT;
}

//Bottom menü
function bottomMenu($picfolder) {
    echo <<<EOT
    <tr>
        <td align="center" style="padding: 25px 0; background:#ffffff">
            <img usemap="#bottommenuimagemap" src="$picfolder/bottommenu.png" border="0" />
         </td>
     </tr>
EOT;
}

function bottomMenuMap() {
    echo <<<EOT
    <map name="bottommenuimagemap" id="bottommenuimagemap">
    <area shape="rect" coords="58,17,201,47" href="http://repulojegy.travelo.hu/" alt="rep" target="_blank" />
    <area shape="rect" coords="248,14,412,48" href="http://autoberles.travelo.hu/" target="_blank" />
    <area shape="rect" coords="464,11,614,47" href="http://biztositas.travelo.hu/" target="_blank" />
</map>
EOT;
}

function htmlHead($title, $charset, $js1, $js2, $stylesheet) {
    echo <<<EOT
	<!doctype html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=$charset">
        <title>$title</title>
        $js1
        $js2
        $stylesheet
    </head>
    <body>

EOT;
}

function htmlEnd() {
    echo <<<EOT
     </body>
	</html>
	
EOT;
}

function copyRight() {
    echo <<<EOT
    <div id="footer">
    Copyright: Szudvari 
EOT;
    auto_copyright(2014);
    echo <<<EOT
    </div>
    <img id="e" src="./misc/turning_e.gif"></img>
EOT;
}

function letterHead($version) {
    echo <<<EOT
<div id="menu">
  <ul>
      <li id="title"><a href="index.php">Tim-E-Dm<span class="mini">$version</span></a></span></li>
      <li><a href="login.php">Bejelentkezés</a></li>
      <li><a href="url_builder.php">URL Builder</a></li>                
  </ul>    
</div>
   
EOT;
}

function letterHeadLoggedIn($version, $user, $admin) {
    if ($admin != 1) {
        $adminp = "";
    } else {
        $adminp = "(admin)";
    }


    echo <<<EOT
<div id="loggedinuser">
    Belépve: $user $adminp
</div>
   <div id="menu">
  <ul>
      <li id="title"><a href="index.php">Tim-E-Dm<span class="mini">$version</span></a></span></li>
      <li><a href="nl_input.php">Hírlevél készítés</a></li>
      <li><a href="newsletter_list.php">Hírlevek szerkesztése</a></li>
      <li><a href="url_builder.php">URL Builder</a></li>   
      <li><a href="useradmin.php">Felhasználók</a></li>   
      <li><a href="logout.php">Kijelentkezés</a></li>
      
  </ul>    
</div>
   
EOT;
}

function traveloInput() {
    echo <<<EOT
            <div id="main">
                <form action="travelo_nl_inputDb.php" method="post" id="travelo_nl_edit" accept-charset="UTF-8" enctype="multipart/form-data">
        <fieldset>
            <legend>Alapadatok</legend>
            <span class="error">*</span><label class="base" for="sendingdate">Küldés dátuma:</label><input class="quickValidate"  type="text" name="sendingdate" id="sendingdate" data-validate="required" data-name="Küldés dátuma "><br>
            <span class="error">*</span><label class="base" for="folder">Alap mappa:</label><input class="quickValidate"  type="text" name="folder" id="folder" data-validate="required"><span class="help"> Pl.: http://stuff.szallas.travelo.hu/hirlevel/20140101</span><br>
        </fieldset>
        <fieldset>
            <legend>Analytics kódok</legend>
            <span class="error">*</span><label class="base" for="analytics_source">Source:</label><input class="quickValidate"  type="text" id="analytics_source" name="analytics_source" value="hirlev" data-validate="required"><br>
            <span class="error">*</span><label class="base" for="analytics_medium"> Medium:</label><input class="quickValidate"  type="text" id="analytics_medium" name="analytics_medium" data-validate="required"><br>
        </fieldset>
        <fieldset>
            <legend>Menü</legend>
            <table border="0">
                <tr>
                    <td class="menu">
                        1. hely:<br>
                        <span class="error">*</span><label for="menu1" class="menu">Felirat:</label> <input class="menu" type="text" name="menu1" id="menu1" value="közel" data-validate="required"><br>
                        <span class="error">*</span><label for="menu1_link" class="menu">Link:</label> <input class="menu" type="text" name="menu1_link" id="menu1_link" value="http://travelo.hu/kozel" data-validate="required"><br>
                        <span class="error">*</span><label for="menu1_analytics" class="menu">Analytics:</label> <input class="menu" type="text" name="menu1_analytics" value="fejlec-kozel" data-validate="required"><br>
                    </td>
                    <td class="menu">
                        2. hely:<br>
                        <span class="error">*</span><label for="menu2" class="menu">Felirat:</label> <input class="menu" type="text" name="menu2" id="menu2" value="távol" data-validate="required"><br>
                        <span class="error">*</span><label for="menu2_link" class="menu">Link:</label> <input class="menu" type="text" name="menu2_link" id="menu2_link" value="http://travelo.hu/tavol" data-validate="required"><br>
                        <span class="error">*</span><label for="menu2_analytics" class="menu">Analytics:</label> <input class="menu" type="text" name="menu2_analytics" value="fejlec-tavol" data-validate="required"><br>
                    </td>
                    <td class="menu">
                        3. hely:<br>
                        <span class="error">*</span><label for="menu3" class="menu">Felirat:</label> <input class="menu" type="text" name="menu3" id="menu3" value="cucc" data-validate="required"><br>
                        <span class="error">*</span><label for="menu3_link" class="menu">Link:</label> <input class="menu" type="text" name="menu3_link" id="menu3_link" value="http://travelo.hu/cucc" data-validate="required"><br>
                        <span class="error">*</span><label for="menu3_analytics" class="menu">Analytics:</label> <input class="menu" type="text" name="menu3_analytics" value="fejlec-cucc" data-validate="required"><br>
                    </td>
                    <td class="menu">
                        4. hely:<br>
                        <span class="error">*</span><label for="menu4" class="menu">Felirat:</label><input class="menu" type="text" name="menu4" id="menu4" value="hírek" data-validate="required"><br>
                        <span class="error">*</span><label for="menu4_link" class="menu">Link:</label> <input class="menu" type="text" name="menu4_link" id="menu4_link" value="http://travelo.hu/hirek" data-validate="required"><br>
                        <span class="error">*</span><label for="menu4_analytics" class="menu">Analytics:</label> <input class="menu" type="text" name="menu4_analytics" value="fejlec-hirek" data-validate="required"><br>
                    </td>
                    <td class="menu">
                        5. hely:<br>
                        <span class="error">*</span><label for="menu5" class="menu">Felirat:</label> <input class="menu" type="text" name="menu5" id="menu5" value="akciók" data-validate="required"><br>
                        <span class="error">*</span><label for="menu5_link" class="menu">Link:</label> <input class="menu" type="text" name="menu5_link" id="menu5_link" value="http://szallas.travelo.hu/akciok" data-validate="required"><br>
                        <span class="error">*</span><label for="menu5_analytics" class="menu">Analytics:</label> <input class="menu" type="text" name="menu5_analytics" value="fejlec-akciok" data-validate="required"><br>
                    </td>
                </tr>
            </table>
        </fieldset>
        <fieldset>
            <legend>Ajánlatok</legend>
            <div class="sc">
                <fieldset class="sc">
                    <legend>Nagyképes</legend>
                    <span class="error">*</span><label class="offer" for="bp_title">Cím:</label><input class="quickValidate"  type="text" name="bp_title" id="bp_title" data-validate="required"><br>
                    <span class="error">*</span><label class="offer" for="bp_text">Leírás:</label><textarea rows="6" cols="35" class="quickValidate" id="bp_text" name="bp_text" form="travelo_nl_edit" data-validate="required"></textarea><br>
                    <span class="error">*</span><label class="offer" for="bp_pic">Kép név:</label><input class="quickValidate"  type="file" name="bp_pic" id="bp_pic" data-validate="required"><br>
                    <span class="error">*</span><label class="offer" for="bp_link">Link:</label><input class="quickValidate"  type="text" name="bp_link" data-validate="required"><br>
                    <span class="error">*</span><label class="offer" for="bp_analytics">Analytics:</label><input class="quickValidate"  type="text" id="bp_analytics" name="bp_analytics" data-validate="required"><br>
                    <span class="error">*</span><label class="offer" for="bp_price">Legjobb ár:</label><input class="quickValidate"  type="text" id="bp_price" name="bp_price" data-validate="required"><br>
                </fieldset>
            </div>

            <fieldset class="dc">
                <legend>Kisképesek</legend>
                <table>
                    <tr>
                        <th>&nbsp;</th>
                        <th>Bal</th>
                        <th>Jobb</th>
                    </tr>
                    <tr>
                        <td class="checkbox">
                            <input type="checkbox" id="1ok" name="1ok"><label class="checkbox" for="1ok"> 1. sor</label>
                        </td>
                        <td class="smallpic">
                            <label for="1l_title" class="offer">Cím:</label><input class="base"  type="text" id="1l_title" name="1l_title"><br>
                            <label for="1l_subtitle" class="offer">Alcím:</label><input class="base"  type="text" id="1l_subtitle" name="1l_subtitle"><br>
                            <label for="1l_text" class="offer" >Leírás:</label><textarea rows="6" cols="35" id="1l-text" name="1l_text" form="travelo_nl_edit"></textarea><br>
                            <label for="1l_pic" class="offer" >Kép név:</label><input class="base"  type="file" id="1l_pic" name="1l_pic"><br>
                            <label for="1l_link" class="offer" >Link:</label><input class="base"  type="text" id="1l_link" name="1l_link"><br>
                            <label for="1l_analytics" class="offer" >Analytics:</label><input class="base"  type="text" id="1l_analytics" name="1l_analytics"><br>
                            <label for="1l_price" class="offer" >Legjobb ár:</label><input class="base"  type="text" id="1l_price" name="1l_price"><br>
                        </td>
                        <td class="smallpic">
                            <label for="1r_title" class="offer">Cím:</label><input class="base"  type="text" id="1r_title" name="1r_title"><br>
                            <label for="1r_subtitle" class="offer">Alcím:</label><input class="base"  type="text" id="1r_subtitle" name="1r_subtitle"><br>
                            <label for="1r_text" class="offer" >Leírás:</label><textarea rows="6" cols="35" id="1r-text" name="1r_text" form="travelo_nl_edit"></textarea><br>
                            <label for="1r_pic" class="offer" >Kép név:</label><input class="base"  type="file" id="1r_pic" name="1r_pic"><br>
                            <label for="1r_link" class="offer" >Link:</label><input class="base"  type="text" id="1r_link" name="1r_link"><br>
                            <label for="1r_analytics" class="offer" >Analytics:</label><input class="base"  type="text" id="1r_analytics" name="1r_analytics"><br>
                            <label for="1r_price" class="offer" >Legjobb ár:</label><input class="base" type="text" id="1r_price" name="1r_price"><br>
                        </td>
                    </tr>
                    <tr>
                        <td class="checkbox">
                            <input type="checkbox" name="2ok"> 2. sor
                        </td>
                        <td class="smallpic">
                            <label for="2l_title" class="offer">Cím:</label><input class="base"  type="text" id="2l_title" name="2l_title"><br>
                            <label for="2l_subtitle" class="offer">Alcím:</label><input class="base"  type="text" id="2l_subtitle" name="2l_subtitle"><br>
                            <label for="2l_text" class="offer" >Leírás:</label><textarea rows="6" cols="35" id="2l-text" name="2l_text" form="travelo_nl_edit"></textarea><br>
                            <label for="2l_pic" class="offer" >Kép név:</label><input class="base"  type="file" id="2l_pic" name="2l_pic"><br>
                            <label for="2l_link" class="offer" >Link:</label><input class="base"  type="text" id="2l_link" name="2l_link"><br>
                            <label for="2l_analytics" class="offer" >Analytics:</label><input class="base"  type="text" id="2l_analytics" name="2l_analytics"><br>
                            <label for="2l_price" class="offer" >Legjobb ár:</label><input class="base"  type="text" id="2l_price" name="2l_price"><br>
                        </td>
                        <td class="smallpic">
                            <label for="2r_title" class="offer">Cím:</label><input class="base"  type="text" id="2r_title" name="2r_title"><br>
                            <label for="2r_subtitle" class="offer">Alcím:</label><input class="base"  type="text" id="2r_subtitle" name="2r_subtitle"><br>
                            <label for="2r_text" class="offer" >Leírás:</label><textarea rows="6" cols="35" id="2r-text" name="2r_text" form="travelo_nl_edit"></textarea><br>
                            <label for="2r_pic" class="offer" >Kép név:</label><input class="base"  type="file" id="2r_pic" name="2r_pic"><br>
                            <label for="2r_link" class="offer" >Link:</label><input class="base"  type="text" id="2r_link" name="2r_link"><br>
                            <label for="2r_analytics" class="offer" >Analytics:</label><input class="base"  type="text" id="2r_analytics" name="2r_analytics"><br>
                            <label for="2r_price" class="offer" >Legjobb ár:</label><input class="base" type="text" id="2r_price" name="2r_price"><br>
                        </td>
                    </tr>
                    <tr>
                        <td class="checkbox">
                            <input type="checkbox" name="3ok"> 3. sor
                        </td>
                        <td class="smallpic">
                            <label for="3l_title" class="offer">Cím:</label><input class="base"  type="text" id="3l_title" name="3l_title"><br>
                            <label for="3l_subtitle" class="offer">Alcím:</label><input class="base"  type="text" id="3l_subtitle" name="3l_subtitle"><br>
                            <label for="3l_text" class="offer" >Leírás:</label><textarea rows="6" cols="35" id="3l-text" name="3l_text" form="travelo_nl_edit"></textarea><br>
                            <label for="3l_pic" class="offer" >Kép név:</label><input class="base"  type="file" id="3l_pic" name="3l_pic"><br>
                            <label for="3l_link" class="offer" >Link:</label><input class="base"  type="text" id="3l_link" name="3l_link"><br>
                            <label for="3l_analytics" class="offer" >Analytics:</label><input class="base"  type="text" id="3l_analytics" name="3l_analytics"><br>
                            <label for="3l_price" class="offer" >Legjobb ár:</label><input class="base"  type="text" id="3l_price" name="3l_price"><br>
                        </td>
                        <td class="smallpic">
                            <label for="3r_title" class="offer">Cím:</label><input class="base"  type="text" id="3r_title" name="3r_title"><br>
                            <label for="3r_subtitle" class="offer">Alcím:</label><input class="base"  type="text" id="3r_subtitle" name="3r_subtitle"><br>
                            <label for="3r_text" class="offer" >Leírás:</label><textarea rows="6" cols="35" id="3r-text" name="3r_text" form="travelo_nl_edit"></textarea><br>
                            <label for="3r_pic" class="offer" >Kép név:</label><input class="base"  type="file" id="3r_pic" name="3r_pic"><br>
                            <label for="3r_link" class="offer" >Link:</label><input class="base"  type="text" id="3r_link" name="3r_link"><br>
                            <label for="3r_analytics" class="offer" >Analytics:</label><input class="base"  type="text" id="3r_analytics" name="3r_analytics"><br>
                            <label for="3r_price" class="offer" >Legjobb ár:</label><input class="base" type="text" id="3r_price" name="3r_price"><br>
                        </td>
                    </tr>
                    <tr>
                        <td class="checkbox">
                            <input type="checkbox" name="4ok"> 4. sor
                        </td>
                        <td class="smallpic">
                            <label for="4l_title" class="offer">Cím:</label><input class="base"  type="text" id="4l_title" name="4l_title"><br>
                            <label for="4l_subtitle" class="offer">Alcím:</label><input class="base"  type="text" id="4l_subtitle" name="4l_subtitle"><br>
                            <label for="4l_text" class="offer" >Leírás:</label><textarea rows="6" cols="35" id="4l-text" name="4l_text" form="travelo_nl_edit"></textarea><br>
                            <label for="4l_pic" class="offer" >Kép név:</label><input class="base"  type="file" id="4l_pic" name="4l_pic"><br>
                            <label for="4l_link" class="offer" >Link:</label><input class="base"  type="text" id="4l_link" name="4l_link"><br>
                            <label for="4l_analytics" class="offer" >Analytics:</label><input class="base"  type="text" id="4l_analytics" name="4l_analytics"><br>
                            <label for="4l_price" class="offer" >Legjobb ár:</label><input class="base"  type="text" id="4l_price" name="4l_price"><br>
                        </td>
                        <td class="smallpic">
                            <label for="4r_title" class="offer">Cím:</label><input class="base"  type="text" id="4r_title" name="4r_title"><br>
                            <label for="4r_subtitle" class="offer">Alcím:</label><input class="base"  type="text" id="4r_subtitle" name="4r_subtitle"><br>
                            <label for="4r_text" class="offer" >Leírás:</label><textarea rows="6" cols="35" id="4r-text" name="4r_text" form="travelo_nl_edit"></textarea><br>
                            <label for="4r_pic" class="offer" >Kép név:</label><input class="base"  type="file" id="4r_pic" name="4r_pic"><br>
                            <label for="4r_link" class="offer" >Link:</label><input class="base"  type="text" id="4r_link" name="4r_link"><br>
                            <label for="4r_analytics" class="offer" >Analytics:</label><input class="base"  type="text" id="4r_analytics" name="4r_analytics"><br>
                            <label for="4r_price" class="offer" >Legjobb ár:</label><input class="base" type="text" id="4r_price" name="4r_price"><br>
                        </td>
                    </tr>
                    <tr>
                        <td class="smallpic">
                            <input type="checkbox" name="5ok"> 5. sor
                        </td>
                        <td class="smallpic">
                            <label for="5l_title" class="offer">Cím:</label><input class="base"  type="text" id="5l_title" name="5l_title"><br>
                            <label for="5l_subtitle" class="offer">Alcím:</label><input class="base"  type="text" id="5l_subtitle" name="5l_subtitle"><br>
                            <label for="5l_text" class="offer" >Leírás:</label><textarea rows="6" cols="35" id="5l-text" name="5l_text" form="travelo_nl_edit"></textarea><br>
                            <label for="5l_pic" class="offer" >Kép név:</label><input class="base"  type="file" id="5l_pic" name="5l_pic"><br>
                            <label for="5l_link" class="offer" >Link:</label><input class="base"  type="text" id="5l_link" name="5l_link"><br>
                            <label for="5l_analytics" class="offer" >Analytics:</label><input class="base"  type="text" id="5l_analytics" name="5l_analytics"><br>
                            <label for="5l_price" class="offer" >Legjobb ár:</label><input class="base"  type="text" id="5l_price" name="5l_price"><br>
                        </td>
                        <td class="smallpic">
                            <label for="5r_title" class="offer">Cím:</label><input class="base"  type="text" id="5r_title" name="5r_title"><br>
                            <label for="5r_subtitle" class="offer">Alcím:</label><input class="base"  type="text" id="5r_subtitle" name="5r_subtitle"><br>
                            <label for="5r_text" class="offer" >Leírás:</label><textarea rows="6" cols="35" id="5r-text" name="5r_text" form="travelo_nl_edit"></textarea><br>
                            <label for="5r_pic" class="offer" >Kép név:</label><input class="base"  type="file" id="5r_pic" name="5r_pic"><br>
                            <label for="5r_link" class="offer" >Link:</label><input class="base"  type="text" id="5r_link" name="5r_link"><br>
                            <label for="5r_analytics" class="offer" >Analytics:</label><input class="base"  type="text" id="5r_analytics" name="5r_analytics"><br>
                            <label for="5r_price" class="offer" >Legjobb ár:</label><input class="base" type="text" id="5r_price" name="5r_price"><br>
                        </td>
                    </tr>
                </table>
            </fieldset>
        </fieldset>
        <fieldset>
            <legend>Leggyakoribb keresések</legend>
            <table>
                <tr>
                    <td colspan="2">
                        <input type="checkbox" name="most_recent_1c_ok"> 1 oszlopos<br>
                    </td>
                </tr>
                <tr>
                    <td class="mostrecent_1c" colspan="2">
                        <label for="mostrecent_1_puretext" class="mostrecent">Szöveg: </label><input class="mostrecent" type="text" id="mostrecent_1_puretext" name="mostrecent_1_puretext"> 
                        <label for="mostrecent_1_highlitedtext" class="mostrecent">Kiemelt szöveg: </label><input class="mostrecent" type="text" id="mostrecent_1_highlitedtext" name="mostrecent_1_highlitedtext"><br>
                        <label for="mostrecent_1_link" class="mostrecent">Link: </label><input class="mostrecent" type="text" id="mostrecent_1_link" name="mostrecent_1_link">
                        <label for="mostrecent_1_analytics" class="mostrecent">Analytics: </label><input class="mostrecent" type="text" id="mostrecent_1_analytics" name="mostrecent_1_analytics"><br>   
                    </td>
                </tr>
                <tr>
                    <td class="mostrecent_1c" colspan="2">
                        <label for="mostrecent_2_puretext" class="mostrecent">Szöveg: </label><input class="mostrecent" type="text" id="mostrecent_2_puretext" name="mostrecent_2_puretext"> 
                        <label for="mostrecent_2_highlitedtext" class="mostrecent">Kiemelt szöveg: </label><input class="mostrecent" type="text" id="mostrecent_2_highlitedtext" name="mostrecent_2_highlitedtext"><br>
                        <label for="mostrecent_2_link" class="mostrecent">Link: </label><input class="mostrecent" type="text" id="mostrecent_2_link" name="mostrecent_2_link">
                        <label for="mostrecent_2_analytics" class="mostrecent">Analytics: </label><input class="mostrecent" type="text" id="mostrecent_2_analytics" name="mostrecent_2_analytics"><br>   
                    </td>
                </tr>
                <tr>
                    <td class="mostrecent_1c" colspan="3">
                        <label for="mostrecent_3_puretext" class="mostrecent">Szöveg: </label><input class="mostrecent" type="text" id="mostrecent_3_puretext" name="mostrecent_3_puretext"> 
                        <label for="mostrecent_3_highlitedtext" class="mostrecent">Kiemelt szöveg: </label><input class="mostrecent" type="text" id="mostrecent_3_highlitedtext" name="mostrecent_3_highlitedtext"><br>
                        <label for="mostrecent_3_link" class="mostrecent">Link: </label><input class="mostrecent" type="text" id="mostrecent_3_link" name="mostrecent_3_link">
                        <label for="mostrecent_3_analytics" class="mostrecent">Analytics: </label><input class="mostrecent" type="text" id="mostrecent_3_analytics" name="mostrecent_3_analytics"><br>   
                    </td>
                </tr>
                <tr>
                    <td class="mostrecent_1c" colspan="4">
                        <label for="mostrecent_4_puretext" class="mostrecent">Szöveg: </label><input class="mostrecent" type="text" id="mostrecent_4_puretext" name="mostrecent_4_puretext"> 
                        <label for="mostrecent_4_highlitedtext" class="mostrecent">Kiemelt szöveg: </label><input class="mostrecent" type="text" id="mostrecent_4_highlitedtext" name="mostrecent_4_highlitedtext"><br>
                        <label for="mostrecent_4_link" class="mostrecent">Link: </label><input class="mostrecent" type="text" id="mostrecent_4_link" name="mostrecent_4_link">
                        <label for="mostrecent_4_analytics" class="mostrecent">Analytics: </label><input class="mostrecent" type="text" id="mostrecent_4_analytics" name="mostrecent_4_analytics"><br>   
                    </td>
                </tr>
                <tr>
                    <td class="mostrecent_1c" colspan="5">
                        <label for="mostrecent_5_puretext" class="mostrecent">Szöveg: </label><input class="mostrecent" type="text" id="mostrecent_5_puretext" name="mostrecent_5_puretext"> 
                        <label for="mostrecent_5_highlitedtext" class="mostrecent">Kiemelt szöveg: </label><input class="mostrecent" type="text" id="mostrecent_5_highlitedtext" name="mostrecent_5_highlitedtext"><br>
                        <label for="mostrecent_5_link" class="mostrecent">Link: </label><input class="mostrecent" type="text" id="mostrecent_5_link" name="mostrecent_5_link">
                        <label for="mostrecent_5_analytics" class="mostrecent">Analytics: </label><input class="mostrecent" type="text" id="mostrecent_5_analytics" name="mostrecent_5_analytics"><br>   
                    </td>
                </tr>
                <tr>
                    <td class="mostrecent_1c" colspan="2">
                        <input type="checkbox" name="most_recent_2c_ok"> 2 oszlopos<br>
                    </td>
                </tr>
                <tr>
                    <th>Bal</th>
                    <th>Jobb</th>
                </tr>
                <tr>
                    <td class="mostrecent_2c">
                        <label for="mostrecent_1l_puretext" class="mostrecent_2c">Szöveg: </label><input class="mostrecent_2c" type="text" id="mostrecent_1l_puretext" name="mostrecent_1l_puretext"> 
                        <label for="mostrecent_1l_highlitedtext" class="mostrecent">Kiemelt szöveg: </label><input class="mostrecent_2c" type="text" id="mostrecent_1l_highlitedtext" name="mostrecent_1l_highlitedtext"><br>
                        <label for="mostrecent_1l_link" class="mostrecent_2c">Link: </label><input class="mostrecent_2c" type="text" id="mostrecent_1l_link" name="mostrecent_1l_link">
                        <label for="mostrecent_1l_analytics" class="mostrecent">Analytics: </label><input class="mostrecent_2c" type="text" id="mostrecent_1l_analytics" name="mostrecent_1l_analytics"><br>   
                    </td>
                    <td class="mostrecent_2c">
                        <label for="mostrecent_1r_puretext" class="mostrecent_2c">Szöveg: </label><input class="mostrecent_2c" type="text" id="mostrecent_1r_puretext" name="mostrecent_1r_puretext"> 
                        <label for="mostrecent_1r_highlitedtext" class="mostrecent">Kiemelt szöveg: </label><input class="mostrecent_2c" type="text" id="mostrecent_1r_highlitedtext" name="mostrecent_1r_highlitedtext"><br>
                        <label for="mostrecent_1r_link" class="mostrecent_2c">Link: </label><input class="mostrecent_2c" type="text" id="mostrecent_1r_link" name="mostrecent_1r_link">
                        <label for="mostrecent_1r_analytics" class="mostrecent">Analytics: </label><input class="mostrecent_2c" type="text" id="mostrecent_1r_analytics" name="mostrecent_1r_analytics"><br>   
                    </td>
                </tr>
                <tr>
                    <td class="mostrecent_2c">
                        <label for="mostrecent_2l_puretext" class="mostrecent_2c">Szöveg: </label><input class="mostrecent_2c" type="text" id="mostrecent_2l_puretext" name="mostrecent_2l_puretext"> 
                        <label for="mostrecent_2l_highlitedtext" class="mostrecent">Kiemelt szöveg: </label><input class="mostrecent_2c" type="text" id="mostrecent_2l_highlitedtext" name="mostrecent_2l_highlitedtext"><br>
                        <label for="mostrecent_2l_link" class="mostrecent_2c">Link: </label><input class="mostrecent_2c" type="text" id="mostrecent_2l_link" name="mostrecent_2l_link">
                        <label for="mostrecent_2l_analytics" class="mostrecent">Analytics: </label><input class="mostrecent_2c" type="text" id="mostrecent_2l_analytics" name="mostrecent_2l_analytics"><br>   
                    </td>
                    <td class="mostrecent_2c">
                        <label for="mostrecent_2r_puretext" class="mostrecent_2c">Szöveg: </label><input class="mostrecent_2c" type="text" id="mostrecent_2r_puretext" name="mostrecent_2r_puretext"> 
                        <label for="mostrecent_2r_highlitedtext" class="mostrecent">Kiemelt szöveg: </label><input class="mostrecent_2c" type="text" id="mostrecent_2r_highlitedtext" name="mostrecent_2r_highlitedtext"><br>
                        <label for="mostrecent_2r_link" class="mostrecent_2c">Link: </label><input class="mostrecent_2c" type="text" id="mostrecent_2r_link" name="mostrecent_2r_link">
                        <label for="mostrecent_2r_analytics" class="mostrecent">Analytics: </label><input class="mostrecent_2c" type="text" id="mostrecent_2r_analytics" name="mostrecent_2r_analytics"><br>   
                    </td>
                </tr>
                <tr>
                    <td class="mostrecent_2c">
                        <label for="mostrecent_3l_puretext" class="mostrecent_2c">Szöveg: </label><input class="mostrecent_2c" type="text" id="mostrecent_3l_puretext" name="mostrecent_3l_puretext"> 
                        <label for="mostrecent_3l_highlitedtext" class="mostrecent">Kiemelt szöveg: </label><input class="mostrecent_2c" type="text" id="mostrecent_3l_highlitedtext" name="mostrecent_3l_highlitedtext"><br>
                        <label for="mostrecent_3l_link" class="mostrecent_2c">Link: </label><input class="mostrecent_2c" type="text" id="mostrecent_3l_link" name="mostrecent_3l_link">
                        <label for="mostrecent_3l_analytics" class="mostrecent">Analytics: </label><input class="mostrecent_2c" type="text" id="mostrecent_3l_analytics" name="mostrecent_3l_analytics"><br>   
                    </td>
                    <td class="mostrecent_2c">
                        <label for="mostrecent_3r_puretext" class="mostrecent_2c">Szöveg: </label><input class="mostrecent_2c" type="text" id="mostrecent_3r_puretext" name="mostrecent_3r_puretext"> 
                        <label for="mostrecent_3r_highlitedtext" class="mostrecent">Kiemelt szöveg: </label><input class="mostrecent_2c" type="text" id="mostrecent_3r_highlitedtext" name="mostrecent_3r_highlitedtext"><br>
                        <label for="mostrecent_3r_link" class="mostrecent_2c">Link: </label><input class="mostrecent_2c" type="text" id="mostrecent_3r_link" name="mostrecent_3r_link">
                        <label for="mostrecent_3r_analytics" class="mostrecent">Analytics: </label><input class="mostrecent_2c" type="text" id="mostrecent_3r_analytics" name="mostrecent_3r_analytics"><br>   
                    </td>
                </tr>
                <tr>
                    <td class="mostrecent_2c">
                        <label for="mostrecent_4l_puretext" class="mostrecent_2c">Szöveg: </label><input class="mostrecent_2c" type="text" id="mostrecent_4l_puretext" name="mostrecent_4l_puretext"> 
                        <label for="mostrecent_4l_highlitedtext" class="mostrecent">Kiemelt szöveg: </label><input class="mostrecent_2c" type="text" id="mostrecent_4l_highlitedtext" name="mostrecent_4l_highlitedtext"><br>
                        <label for="mostrecent_4l_link" class="mostrecent_2c">Link: </label><input class="mostrecent_2c" type="text" id="mostrecent_4l_link" name="mostrecent_4l_link">
                        <label for="mostrecent_4l_analytics" class="mostrecent">Analytics: </label><input class="mostrecent_2c" type="text" id="mostrecent_4l_analytics" name="mostrecent_4l_analytics"><br>   
                    </td>
                    <td class="mostrecent_2c">
                        <label for="mostrecent_4r_puretext" class="mostrecent_2c">Szöveg: </label><input class="mostrecent_2c" type="text" id="mostrecent_4r_puretext" name="mostrecent_4r_puretext"> 
                        <label for="mostrecent_4r_highlitedtext" class="mostrecent">Kiemelt szöveg: </label><input class="mostrecent_2c" type="text" id="mostrecent_4r_highlitedtext" name="mostrecent_4r_highlitedtext"><br>
                        <label for="mostrecent_4r_link" class="mostrecent_2c">Link: </label><input class="mostrecent_2c" type="text" id="mostrecent_4r_link" name="mostrecent_4r_link">
                        <label for="mostrecent_4r_analytics" class="mostrecent">Analytics: </label><input class="mostrecent_2c" type="text" id="mostrecent_4r_analytics" name="mostrecent_4r_analytics"><br>   
                    </td>
                </tr>
                <tr>
                    <td class="mostrecent_2c">
                        <label for="mostrecent_5l_puretext" class="mostrecent_2c">Szöveg: </label><input class="mostrecent_2c" type="text" id="mostrecent_5l_puretext" name="mostrecent_5l_puretext"> 
                        <label for="mostrecent_5l_highlitedtext" class="mostrecent">Kiemelt szöveg: </label><input class="mostrecent_2c" type="text" id="mostrecent_5l_highlitedtext" name="mostrecent_5l_highlitedtext"><br>
                        <label for="mostrecent_5l_link" class="mostrecent_2c">Link: </label><input class="mostrecent_2c" type="text" id="mostrecent_5l_link" name="mostrecent_5l_link">
                        <label for="mostrecent_5l_analytics" class="mostrecent">Analytics: </label><input class="mostrecent_2c" type="text" id="mostrecent_5l_analytics" name="mostrecent_5l_analytics"><br>   
                    </td>
                    <td class="mostrecent_2c">
                        <label for="mostrecent_5r_puretext" class="mostrecent_2c">Szöveg: </label><input class="mostrecent_2c" type="text" id="mostrecent_5r_puretext" name="mostrecent_5r_puretext"> 
                        <label for="mostrecent_5r_highlitedtext" class="mostrecent">Kiemelt szöveg: </label><input class="mostrecent_2c" type="text" id="mostrecent_5r_highlitedtext" name="mostrecent_5r_highlitedtext"><br>
                        <label for="mostrecent_5r_link" class="mostrecent_2c">Link: </label><input class="mostrecent_2c" type="text" id="mostrecent_5r_link" name="mostrecent_5r_link">
                        <label for="mostrecent_5r_analytics" class="mostrecent">Analytics: </label><input class="mostrecent_2c" type="text" id="mostrecent_5r_analytics" name="mostrecent_5r_analytics"><br>   
                    </td>
                </tr>
            </table>
        </fieldset>
        <fieldset>
            <legend><input type="checkbox" id="article_ok" name="article_ok"><label for="article_ok">Legfrisebb cikkek</label></legend>
            <table class="onec">
                <tr>
                    <td id="harticle" rowspan="5">
                        <label for="harticle_title" class="offer">Cím: </label><input class="base" type="text" id="harticle_title" name="harticle_title"><br> 
                        <label for="harticle_date" class="offer">Dátum: </label><input class="base" type="text" id="harticle_date" name="harticle_date"><br>
                        <label for="harticle_text" class="offer">Lead: </label><textarea rows="6" cols="35" id="harticle_text" name="harticle_text" form="travelo_nl_edit"></textarea><br>
                        <label for="harticle_link" class="offer">Link: </label><input class="base" type="text" id="harticle_link" name="harticle_link"><br>
                        <label for="harticle_analytics" class="offer">Analytics: </label><input class="base" type="text" id="harticle_analytics" name="harticle_analytics"><br>
                    </td>
                </tr>
                <tr>
                    <td class="article">
                        <label for="article_1_title" class="offer">Cím: </label><input class="base" type="text" id="article_1_title" name="article_1_title"><br> 
                        <label for="article_1_date" class="offer">Dátum: </label><input class="base" type="text" id="article_1_date" name="article_1_date"><br>
                        <label for="article_1_link" class="offer">Link: </label><input class="base" type="text" id="article_1_link" name="article_1_link"><br>
                        <label for="article_1_analytics" class="offer">Analytics: </label><input class="base" type="text" id="article_1_analytics" name="article_1_analytics"><br>
                    </td>
                </tr>
                <tr>
                    <td class="article">
                        <label for="article_2_title" class="offer">Cím: </label><input class="base" type="text" id="article_2_title" name="article_2_title"><br> 
                        <label for="article_2_date" class="offer">Dátum: </label><input class="base" type="text" id="article_2_date" name="article_2_date"><br>
                        <label for="article_2_link" class="offer">Link: </label><input class="base" type="text" id="article_2_link" name="article_2_link"><br>
                        <label for="article_2_analytics" class="offer">Analytics: </label><input class="base" type="text" id="article_2_analytics" name="article_2_analytics"><br>
                    </td>
                </tr>
                <tr>
                    <td class="article">
                        <label for="article_3_title" class="offer">Cím: </label><input class="base" type="text" id="article_3_title" name="article_3_title"><br> 
                        <label for="article_3_date" class="offer">Dátum: </label><input class="base" type="text" id="article_3_date" name="article_3_date"><br>
                        <label for="article_3_link" class="offer">Link: </label><input class="base" type="text" id="article_3_link" name="article_3_link"><br>
                        <label for="article_3_analytics" class="offer">Analytics: </label><input class="base" type="text" id="article_3_analytics" name="article_3_analytics"><br>
                    </td>
                </tr>
                <tr>
                    <td class="article">
                        <label for="article_4_title" class="offer">Cím: </label><input class="base" type="text" id="article_4_title" name="article_4_title"><br> 
                        <label for="article_4_date" class="offer">Dátum: </label><input class="base" type="text" id="article_4_date" name="article_4_date"><br>
                        <label for="article_4_link" class="offer">Link: </label><input class="base" type="text" id="article_4_link" name="article_4_link"><br>
                        <label for="article_4_analytics" class="offer">Analytics: </label><input class="base" type="text" id="article_4_analytics" name="article_4_analytics"><br>
                    </td>
                </tr>  
            </table>
        </fieldset>
        <fieldset>
            <legend>Hirdetések</legend>
            <table class="sc">
                <tr>
                    <td class="select">
                        <input type="radio" id="null" name="advertisements" value="null"><label for="null"> Nincs hirdetés</label>  
                    </td>
                    <td class="select">
                        <input type="radio" id="t_b" name="advertisements" value="t_b"><label for="t_b"> Turpan + Banner</label>
                    </td>
                    <td class="select">
                        <input type="radio" id="b_sz" name="advertisements" value="b_sz"><label for="b_sz"> Banner + Szöveges</label>  
                    </td>
                    <td class="select">
                        <input type="radio" id="t_sz" name="advertisements" value="t_sz"><label for="t_sz"> Turpan + Szöveges</label> 
                    </td>
                </tr>
            </table>
            <div class="sc">
                <fieldset class="sc">
                    <legend>Turpan</legend>
                    <table>
                        <tr>
                            <td>
                                <label for="turpan_1_title" class="offer">Cím: </label><input class="base" type="text" id="turpan_1_title" name="turpan_1_title"><br> 
                                <label for="turpan_1_title" class="offer">Link: </label><input class="base" type="text" id="turpan_1_link" name="turpan_1_link"><br>
                            </td>
                        </tr>  
                        <tr>
                            <td>
                                <label for="turpan_2_title" class="offer">Cím: </label><input class="base" type="text" id="turpan_2_title" name="turpan_2_title"><br> 
                                <label for="turpan_2_title" class="offer">Link: </label><input class="base" type="text" id="turpan_2_link" name="turpan_2_link"><br>
                            </td>
                        </tr>  
                        <tr>
                            <td>
                                <label for="turpan_3_title" class="offer">Cím: </label><input class="base" type="text" id="turpan_3_title" name="turpan_3_title"><br> 
                                <label for="turpan_3_title" class="offer">Link: </label><input class="base" type="text" id="turpan_3_link" name="turpan_3_link"><br>
                            </td>
                        </tr>  
                        <tr>
                            <td>
                                <label for="turpan_4_title" class="offer">Cím: </label><input class="base" type="text" id="turpan_4_title" name="turpan_4_title"><br> 
                                <label for="turpan_4_title" class="offer">Link: </label><input class="base" type="text" id="turpan_4_link" name="turpan_4_link"><br>
                            </td>
                        </tr>  
                    </table>
                </fieldset>
            </div>
            <div class="sc">
                <fieldset class="sc">
                    <legend>Banner</legend>
                    <table>
                        <tr>
                            <td>
                                <label for="banner_pic" class="offer">Kép: </label><input class="base" type="file" id="banner_pic" name="banner_pic"><br> 
                                <label for="banner_link" class="offer">Link: </label><input class="base" type="text" id="banner_link" name="banner_link"><br>
                                <label for="banner_analytics" class="offer">Analytics: </label><input class="base" type="text" id="banner_analytics" name="banner_analytics"><br>
                            </td>
                        </tr>
                    </table>
                </fieldset>
            </div>
            <div class="sc">
                <fieldset class="sc">
                    <legend>Szöveges</legend>
                    <table>
                        <tr>
                            <td>
                                <label for="textad_pic" class="offer">Kép: </label><input class="base" type="file" id="textad_pic" name="textad_pic"><br> 
                                <label for="textad_title" class="offer">Cím: </label><input class="base" type="text" id="textad_title" name="textad_title"><br> 
                                <label for="textad_text" class="offer">Szöveg</label><textarea rows="6" cols="35" id="textad_text" name="textad_text" form="travelo_nl_edit"></textarea><br>
                                <label for="textad_link" class="offer">Link: </label><input class="base" type="text" id="textad_link" name="textad_link"><br>
                                <label for="textad_analytics" class="offer">Analytics: </label><input class="base" type="text" id="textad_analytics" name="textad_analytics"><br>
                            </td>
                        </tr>
                    </table>
                </fieldset>
            </div>
    </fieldset>
    <fieldset>
            <legend>Hirdetések 2. sor</legend>
            <table class="sc">
                <tr>
                    <td class="select">
                        <input type="radio" id="null2" name="advertisements2" value="null"><label for="null2"> Nincs hirdetés</label>  
                    </td>
                    <td class="select">
                        <input type="radio" id="b_b" name="advertisements2" value="b_b"><label for="b_b"> Banner + Banner</label>
                    </td>
                    <td class="select">
                        <input type="radio" id="b2_sz" name="advertisements2" value="b2_sz"><label for="b2_sz"> Banner1 + Szöveges</label> 
                    </td>
                    <td class="select">
                        <input type="radio" id="sz_sz" name="advertisements2" value="sz_sz"><label for="sz_sz"> Szöveges + Szöveges</label>  
                    </td>
                </tr>
            </table>
             <div class="sc">
                <fieldset class="sc">
                    <legend>Banner1</legend>
                    <table>
                        <tr>
                            <td>
                                <label for="banner2_1_pic" class="offer">Kép: </label><input class="base" type="file" id="banner2_1_pic" name="banner2_1_pic"><br> 
                                <label for="banner2_1_link" class="offer">Link: </label><input class="base" type="text" id="banner2_1_link" name="banner2_1_link"><br>
                                <label for="banner2_1_analytics" class="offer">Analytics: </label><input class="base" type="text" id="banner2_1_analytics" name="banner2_1_analytics1"><br>
                            </td>
                        </tr>
                    </table>
                </fieldset>
                <fieldset class="sc">
                    <legend>Banner2</legend>
                    <table>
                        <tr>
                            <td>
                                <label for="banner2_2_pic" class="offer">Kép: </label><input class="base" type="file" id="banner2_2_pic" name="banner2_2_pic"><br> 
                                <label for="banner2_2_link" class="offer">Link: </label><input class="base" type="text" id="banner2_2_link" name="banner2_2_link"><br>
                                <label for="banner2_2_analytics" class="offer">Analytics: </label><input class="base" type="text" id="banner2_2_analytics" name="banner2_2_analytics"><br>
                            </td>
                        </tr>
                    </table>
                </fieldset>
            </div>
            <div class="sc">
                <fieldset class="sc">
                    <legend>Szöveges</legend>
                    <table>
                        <tr>
                            <td>
                                <label for="textad2_pic" class="offer">Kép: </label><input class="base" type="file" id="textad2_pic" name="textad2_pic"><br> 
                                <label for="textad2_title" class="offer">Cím: </label><input class="base" type="text" id="textad2_title" name="textad2_title"><br> 
                                <label for="textad2_text" class="offer">Szöveg</label><textarea rows="6" cols="35" id="textad2_text" name="textad2_text" form="travelo_nl_edit"></textarea><br>
                                <label for="textad2_link" class="offer">Link: </label><input class="base" type="text" id="textad2_link" name="textad2_link"><br>
                                <label for="textad2_analytics" class="offer">Analytics: </label><input class="base" type="text" id="textad2_analytics" name="textad2_analytics"><br>
                            </td>
                        </tr>
                    </table>
                </fieldset>
            </div>
            <div class="sc">
                <fieldset class="sc">
                    <legend>Szöveges2</legend>
                    <table>
                        <tr>
                            <td>
                                <label for="textad2_2_pic" class="offer">Kép: </label><input class="base" type="file" id="textad2_2_pic" name="textad2_2_pic"><br> 
                                <label for="textad2_2_title" class="offer">Cím: </label><input class="base" type="text" id="textad2_2_title" name="textad2_2_title"><br> 
                                <label for="textad2_2_text" class="offer">Szöveg</label><textarea rows="6" cols="35" id="textad2_2_text" name="textad2_2_text" form="travelo_nl_edit"></textarea><br>
                                <label for="textad2_2_link" class="offer">Link: </label><input class="base" type="text" id="textad2_2_link" name="textad2_2_link"><br>
                                <label for="textad2_2_analytics" class="offer">Analytics: </label><input class="base" type="text" id="textad2_2_analytics" name="textad2_2_analytics"><br>
                            </td>
                        </tr>
                    </table>
                </fieldset>
            </div>
        </fieldset>
        <div id="submit">
        <input class="submit" id="submit" type="submit" value="Hírlevél készítése"><br>
        </div>
    </form>
<script type="text/javascript">
	$('form').quickValidate();
</script>
    </div>
EOT;
}

function traveloEdit($travelo, $id) {
    $s1ok = $s2ok = $s3ok = $s4ok = $s5ok = $most_recent_1c_ok = $most_recent_2c_ok = $article_ok = $t_b = $b_sz = $t_sz = $b_b = $b2_sz = $sz_sz = "";
    if ($travelo['1ok'] != NULL) {
        $s1ok = "checked";
    }
    if ($travelo['2ok'] != NULL) {
        $s2ok = "checked";
    }
    if ($travelo['3ok'] != NULL) {
        $s3ok = "checked";
    }
    if ($travelo['4ok'] != NULL) {
        $s4ok = "checked";
    }
    if ($travelo['5ok'] != NULL) {
        $s5ok = "checked";
    }
    if ($travelo['mostrecent_1c_ok'] != NULL) {
        $most_recent_1c_ok = "checked";
    }
    if ($travelo['mostrecent_2c_ok'] != NULL) {
        $most_recent_2c_ok = "checked";
    }
    if ($travelo['article_ok'] != NULL) {
        $article_ok = "checked";
    }

    if ($travelo['ad_ok'] == "t_b") {
        $t_b = 'checked="checked"';
    } elseif ($travelo['ad_ok'] == "b_sz") {
        $b_sz = 'checked="checked"';
    } elseif ($travelo['ad_ok'] == "t_sz") {
        $t_sz = 'checked="checked"';
    }
    
    if ($travelo['ad2_ok'] == "b_b") {
        $b_b = 'checked="checked"';
    } elseif ($travelo['ad2_ok'] == "b2_sz") {
        $b2_sz = 'checked="checked"';
    } elseif ($travelo['ad2_ok'] == "sz_sz") {
        $sz_sz = 'checked="checked"';
    }
    //echo $travelo['ad2_ok'];
    
    echo <<<EOT
    <h1> Travelo hírlevél módosítása </h1>
            <div id="main">
                <form action="travelo_nl_updateDb.php" method="post" id="travelo_nl_edit" accept-charset="UTF-8">
        <fieldset>
            <legend>Alapadatok</legend>
            <span class="error">*</span><label class="base" for="sendingdate">Küldés dátuma:</label><input class="quickValidate"  type="text" name="sendingdate" id="sendingdate"  value="{$travelo['sendingdate']}" data-validate="required" data-name="Küldés dátuma "><br>
            <span class="error">*</span><label class="base" for="folder">Alap mappa:</label><input class="quickValidate"  type="text" name="folder" id="folder" value="{$travelo['folder']}" data-validate="required"><span class="help"> Pl.: http://stuff.szallas.travelo.hu/hirlevel/20140101</span><br>
        </fieldset>
        <fieldset>
            <legend>Analytics kódok</legend>
            <span class="error">*</span><label class="base" for="analytics_source">Source:</label><input class="quickValidate"  type="text" id="analytics_source" name="analytics_source" value="{$travelo['analytics_source']}" data-validate="required"><br>
            <span class="error">*</span><label class="base" for="analytics_medium"> Medium:</label><input class="quickValidate"  type="text" id="analytics_medium" name="analytics_medium" value="{$travelo['analytics_medium']}" data-validate="required"><br>
        </fieldset>
        <fieldset>
            <legend>Menü</legend>
            <table border="0">
                <tr>
                    <td class="menu">
                        1. hely:<br>
                        <span class="error">*</span><label for="menu1" class="menu">Felirat:</label> <input class="menu" type="text" name="menu1" id="menu1" value="{$travelo['menu1']}" data-validate="required"><br>
                        <span class="error">*</span><label for="menu1_link" class="menu">Link:</label> <input class="menu" type="text" name="menu1_link" id="menu1_link" value="{$travelo['menu1_link']}" data-validate="required"><br>
                        <span class="error">*</span><label for="menu1_analytics" class="menu">Analytics:</label> <input class="menu" type="text" name="menu1_analytics" value="{$travelo['menu1_analytics']}" data-validate="required"><br>
                    </td>
                    <td class="menu">
                        2. hely:<br>
                        <span class="error">*</span><label for="menu2" class="menu">Felirat:</label> <input class="menu" type="text" name="menu2" id="menu2" value="{$travelo['menu2']}" data-validate="required"><br>
                        <span class="error">*</span><label for="menu2_link" class="menu">Link:</label> <input class="menu" type="text" name="menu2_link" id="menu2_link" value="{$travelo['menu2_link']}" data-validate="required"><br>
                        <span class="error">*</span><label for="menu2_analytics" class="menu">Analytics:</label> <input class="menu" type="text" name="menu2_analytics" value="{$travelo['menu2_analytics']}" data-validate="required"><br>
                    </td>
                    <td class="menu">
                        3. hely:<br>
                        <span class="error">*</span><label for="menu3" class="menu">Felirat:</label> <input class="menu" type="text" name="menu3" id="menu3" value="{$travelo['menu3']}" data-validate="required"><br>
                        <span class="error">*</span><label for="menu3_link" class="menu">Link:</label> <input class="menu" type="text" name="menu3_link" id="menu3_link" value="{$travelo['menu3_link']}" data-validate="required"><br>
                        <span class="error">*</span><label for="menu3_analytics" class="menu">Analytics:</label> <input class="menu" type="text" name="menu3_analytics" value="{$travelo['menu3_analytics']}" data-validate="required"><br>                    </td>
                    <td class="menu">
                        4. hely:<br>
                        <span class="error">*</span><label for="menu4" class="menu">Felirat:</label> <input class="menu" type="text" name="menu4" id="menu4" value="{$travelo['menu4']}" data-validate="required"><br>
                        <span class="error">*</span><label for="menu4_link" class="menu">Link:</label> <input class="menu" type="text" name="menu4_link" id="menu4_link" value="{$travelo['menu4_link']}" data-validate="required"><br>
                        <span class="error">*</span><label for="menu4_analytics" class="menu">Analytics:</label> <input class="menu" type="text" name="menu4_analytics" value="{$travelo['menu4_analytics']}" data-validate="required"><br>
                    </td>
                    <td class="menu">
                        5. hely:<br>
                        <span class="error">*</span><label for="menu5" class="menu">Felirat:</label> <input class="menu" type="text" name="menu5" id="menu5" value="{$travelo['menu5']}" data-validate="required"><br>
                        <span class="error">*</span><label for="menu5_link" class="menu">Link:</label> <input class="menu" type="text" name="menu5_link" id="menu5_link" value="{$travelo['menu5_link']}" data-validate="required"><br>
                        <span class="error">*</span><label for="menu5_analytics" class="menu">Analytics:</label> <input class="menu" type="text" name="menu5_analytics" value="{$travelo['menu5_analytics']}" data-validate="required"><br>
                    </td>
                </tr>
            </table>
        </fieldset>
        <fieldset>
            <legend>Ajánlatok</legend>
            <div class="sc">
                <fieldset class="sc">
                    <legend>Nagyképes</legend>
                    <span class="error">*</span><label class="offer" for="bp_title">Cím:</label><input class="quickValidate"  type="text" name="bp_title" id="bp_title" value="{$travelo['bp_title']}" data-validate="required"><br>
                    <span class="error">*</span><label class="offer" for="bp_text">Leírás:</label><textarea rows="6" cols="35" class="quickValidate" id="bp_text" name="bp_text" form="travelo_nl_edit" data-validate="required">{$travelo['bp_text']}</textarea><br>
                    <span class="error">*</span><label class="offer" for="bp_pic">Kép név:</label><input class="quickValidate"  type="text" name="bp_pic" id="bp_pic" value="{$travelo['bp_pic']}" data-validate="required"><br>
                    <span class="error">*</span><label class="offer" for="bp_link">Link:</label><input class="quickValidate"  type="text" name="bp_link" value="{$travelo['bp_link']}" data-validate="required"><br>
                    <span class="error">*</span><label class="offer" for="bp_analytics">Analytics:</label><input class="quickValidate"  type="text" id="bp_analytics" name="bp_analytics" value="{$travelo['bp_analytics']}" data-validate="required"><br>
                    <span class="error">*</span><label class="offer" for="bp_price">Legjobb ár:</label><input class="quickValidate"  type="text" id="bp_price" name="bp_price" value="{$travelo['bp_price']}" data-validate="required"><br>
                </fieldset>
            </div>

            <fieldset class="dc">
                <legend>Kisképesek</legend>
                <table>
                    <tr>
                        <th>&nbsp;</th>
                        <th>Bal</th>
                        <th>Jobb</th>
                    </tr>
                    <tr>
                        <td class="checkbox">
                            <input type="checkbox" id="1ok" name="1ok" $s1ok><label class="checkbox" for="1ok"> 1. sor</label>
                        </td>
                        <td class="smallpic">
                            <label for="1l_title" class="offer">Cím:</label><input class="base"  type="text" id="1l_title" name="1l_title" value="{$travelo['1l_title']}"><br>
                            <label for="1l_subtitle" class="offer">Alcím:</label><input class="base"  type="text" id="1l_subtitle" name="1l_subtitle" value="{$travelo['1l_subtitle']}"><br>
                            <label for="1l_text" class="offer" >Leírás:</label><textarea rows="6" cols="35" id="1l-text" name="1l_text" form="travelo_nl_edit">{$travelo['1l_text']}</textarea><br>
                            <label for="1l_pic" class="offer" >Kép név:</label><input class="base"  type="text" id="1l_pic" name="1l_pic" value="{$travelo['1l_pic']}"><br>
                            <label for="1l_link" class="offer" >Link:</label><input class="base"  type="text" id="1l_link" name="1l_link" value="{$travelo['1l_link']}"><br>
                            <label for="1l_analytics" class="offer" >Analytics:</label><input class="base"  type="text" id="1l_analytics" name="1l_analytics" value="{$travelo['1l_analytics']}"><br>
                            <label for="1l_price" class="offer" >Legjobb ár:</label><input class="base"  type="text" id="1l_price" name="1l_price" value="{$travelo['1l_price']}"><br>
                        </td>
                        <td class="smallpic">
                            <label for="1r_title" class="offer">Cím:</label><input class="base"  type="text" id="1r_title" name="1r_title" value="{$travelo['1r_title']}"><br>
                            <label for="1r_subtitle" class="offer">Alcím:</label><input class="base"  type="text" id="1r_subtitle" name="1r_subtitle" value="{$travelo['1r_subtitle']}"><br>
                            <label for="1r_text" class="offer" >Leírás:</label><textarea rows="6" cols="35" id="1r-text" name="1r_text" form="travelo_nl_edit">{$travelo['1r_text']}</textarea><br>
                            <label for="1r_pic" class="offer" >Kép név:</label><input class="base"  type="text" id="1r_pic" name="1r_pic" value="{$travelo['1r_pic']}"><br>
                            <label for="1r_link" class="offer" >Link:</label><input class="base"  type="text" id="1r_link" name="1r_link" value="{$travelo['1r_link']}"><br>
                            <label for="1r_analytics" class="offer" >Analytics:</label><input class="base"  type="text" id="1r_analytics" name="1r_analytics" value="{$travelo['1r_analytics']}"><br>
                            <label for="1r_price" class="offer" >Legjobb ár:</label><input class="base"  type="text" id="1r_price" name="1r_price" value="{$travelo['1r_price']}"><br>
                        </td>
                    </tr>
                    <tr>
                        <td class="checkbox">
                            <input type="checkbox" name="2ok" $s2ok> 2. sor
                        </td>
                        <td class="smallpic">
                            <label for="2l_title" class="offer">Cím:</label><input class="base"  type="text" id="2l_title" name="2l_title" value="{$travelo['2l_title']}"><br>
                            <label for="2l_subtitle" class="offer">Alcím:</label><input class="base"  type="text" id="2l_subtitle" name="2l_subtitle" value="{$travelo['2l_subtitle']}"><br>
                            <label for="2l_text" class="offer" >Leírás:</label><textarea rows="6" cols="35" id="2l-text" name="2l_text" form="travelo_nl_edit">{$travelo['2l_text']}</textarea><br>
                            <label for="2l_pic" class="offer" >Kép név:</label><input class="base"  type="text" id="2l_pic" name="2l_pic" value="{$travelo['2l_pic']}"><br>
                            <label for="2l_link" class="offer" >Link:</label><input class="base"  type="text" id="2l_link" name="2l_link" value="{$travelo['2l_link']}"><br>
                            <label for="2l_analytics" class="offer" >Analytics:</label><input class="base"  type="text" id="2l_analytics" name="2l_analytics" value="{$travelo['2l_analytics']}"><br>
                            <label for="2l_price" class="offer" >Legjobb ár:</label><input class="base"  type="text" id="2l_price" name="2l_price" value="{$travelo['2l_price']}"><br>
                        </td>
                        <td class="smallpic">
                            <label for="2r_title" class="offer">Cím:</label><input class="base"  type="text" id="2r_title" name="2r_title" value="{$travelo['2r_title']}"><br>
                            <label for="2r_subtitle" class="offer">Alcím:</label><input class="base"  type="text" id="2r_subtitle" name="2r_subtitle" value="{$travelo['2r_subtitle']}"><br>
                            <label for="2r_text" class="offer" >Leírás:</label><textarea rows="6" cols="35" id="2r-text" name="2r_text" form="travelo_nl_edit">{$travelo['2r_text']}</textarea><br>
                            <label for="2r_pic" class="offer" >Kép név:</label><input class="base"  type="text" id="2r_pic" name="2r_pic" value="{$travelo['2r_pic']}"><br>
                            <label for="2r_link" class="offer" >Link:</label><input class="base"  type="text" id="2r_link" name="2r_link" value="{$travelo['2r_link']}"><br>
                            <label for="2r_analytics" class="offer" >Analytics:</label><input class="base"  type="text" id="2r_analytics" name="2r_analytics" value="{$travelo['2r_analytics']}"><br>
                            <label for="2r_price" class="offer" >Legjobb ár:</label><input class="base"  type="text" id="2r_price" name="2r_price" value="{$travelo['2r_price']}"><br>
                        </td>
                    </tr>
                    <tr>
                        <td class="checkbox">
                            <input type="checkbox" name="3ok" $s3ok> 3. sor
                        </td>
                        <td class="smallpic">
                            <label for="3l_title" class="offer">Cím:</label><input class="base"  type="text" id="3l_title" name="3l_title" value="{$travelo['3l_title']}"><br>
                            <label for="3l_subtitle" class="offer">Alcím:</label><input class="base"  type="text" id="3l_subtitle" name="3l_subtitle" value="{$travelo['3l_subtitle']}"><br>
                            <label for="3l_text" class="offer" >Leírás:</label><textarea rows="6" cols="35" id="3l-text" name="3l_text" form="travelo_nl_edit">{$travelo['3l_text']}</textarea><br>
                            <label for="3l_pic" class="offer" >Kép név:</label><input class="base"  type="text" id="3l_pic" name="3l_pic" value="{$travelo['3l_pic']}"><br>
                            <label for="3l_link" class="offer" >Link:</label><input class="base"  type="text" id="3l_link" name="3l_link" value="{$travelo['3l_link']}"><br>
                            <label for="3l_analytics" class="offer" >Analytics:</label><input class="base"  type="text" id="3l_analytics" name="3l_analytics" value="{$travelo['3l_analytics']}"><br>
                            <label for="3l_price" class="offer" >Legjobb ár:</label><input class="base"  type="text" id="3l_price" name="3l_price" value="{$travelo['3l_price']}"><br>
                        </td>
                        <td class="smallpic">
                            <label for="3r_title" class="offer">Cím:</label><input class="base"  type="text" id="3r_title" name="3r_title" value="{$travelo['3r_title']}"><br>
                            <label for="3r_subtitle" class="offer">Alcím:</label><input class="base"  type="text" id="3r_subtitle" name="3r_subtitle" value="{$travelo['3r_subtitle']}"><br>
                            <label for="3r_text" class="offer" >Leírás:</label><textarea rows="6" cols="35" id="3r-text" name="3r_text" form="travelo_nl_edit">{$travelo['3r_text']}</textarea><br>
                            <label for="3r_pic" class="offer" >Kép név:</label><input class="base"  type="text" id="3r_pic" name="3r_pic" value="{$travelo['3r_pic']}"><br>
                            <label for="3r_link" class="offer" >Link:</label><input class="base"  type="text" id="3r_link" name="3r_link" value="{$travelo['3r_link']}"><br>
                            <label for="3r_analytics" class="offer" >Analytics:</label><input class="base"  type="text" id="3r_analytics" name="3r_analytics" value="{$travelo['3r_analytics']}"><br>
                            <label for="3r_price" class="offer" >Legjobb ár:</label><input class="base"  type="text" id="3r_price" name="3r_price" value="{$travelo['3r_price']}"><br>
                        </td>
                    </tr>
                    <tr>
                        <td class="checkbox">
                            <input type="checkbox" name="4ok" $s4ok> 4. sor
                        </td>
                        <td class="smallpic">
                            <label for="4l_title" class="offer">Cím:</label><input class="base"  type="text" id="4l_title" name="4l_title" value="{$travelo['4l_title']}"><br>
                            <label for="4l_subtitle" class="offer">Alcím:</label><input class="base"  type="text" id="4l_subtitle" name="4l_subtitle" value="{$travelo['4l_subtitle']}"><br>
                            <label for="4l_text" class="offer" >Leírás:</label><textarea rows="6" cols="35" id="4l-text" name="4l_text" form="travelo_nl_edit">{$travelo['4l_text']}</textarea><br>
                            <label for="4l_pic" class="offer" >Kép név:</label><input class="base"  type="text" id="4l_pic" name="4l_pic" value="{$travelo['4l_pic']}"><br>
                            <label for="4l_link" class="offer" >Link:</label><input class="base"  type="text" id="4l_link" name="4l_link" value="{$travelo['4l_link']}"><br>
                            <label for="4l_analytics" class="offer" >Analytics:</label><input class="base"  type="text" id="4l_analytics" name="4l_analytics" value="{$travelo['4l_analytics']}"><br>
                            <label for="4l_price" class="offer" >Legjobb ár:</label><input class="base"  type="text" id="4l_price" name="4l_price" value="{$travelo['4l_price']}"><br>
                        </td>
                        <td class="smallpic">
                            <label for="4r_title" class="offer">Cím:</label><input class="base"  type="text" id="4r_title" name="4r_title" value="{$travelo['4r_title']}"><br>
                            <label for="4r_subtitle" class="offer">Alcím:</label><input class="base"  type="text" id="4r_subtitle" name="4r_subtitle" value="{$travelo['4r_subtitle']}"><br>
                            <label for="4r_text" class="offer" >Leírás:</label><textarea rows="6" cols="35" id="4r-text" name="4r_text" form="travelo_nl_edit">{$travelo['4r_text']}</textarea><br>
                            <label for="4r_pic" class="offer" >Kép név:</label><input class="base"  type="text" id="4r_pic" name="4r_pic" value="{$travelo['4r_pic']}"><br>
                            <label for="4r_link" class="offer" >Link:</label><input class="base"  type="text" id="4r_link" name="4r_link" value="{$travelo['4r_link']}"><br>
                            <label for="4r_analytics" class="offer" >Analytics:</label><input class="base"  type="text" id="4r_analytics" name="4r_analytics" value="{$travelo['4r_analytics']}"><br>
                            <label for="4r_price" class="offer" >Legjobb ár:</label><input class="base"  type="text" id="4r_price" name="4r_price" value="{$travelo['4r_price']}"><br>
                        </td>
                    </tr>
                    <tr>
                        <td class="smallpic">
                            <input type="checkbox" name="5ok" $s5ok> 5. sor
                        </td>
                        <td class="smallpic">
                           <label for="5l_title" class="offer">Cím:</label><input class="base"  type="text" id="5l_title" name="5l_title" value="{$travelo['5l_title']}"><br>
                            <label for="5l_subtitle" class="offer">Alcím:</label><input class="base"  type="text" id="5l_subtitle" name="5l_subtitle" value="{$travelo['5l_subtitle']}"><br>
                            <label for="5l_text" class="offer" >Leírás:</label><textarea rows="6" cols="35" id="5l-text" name="5l_text" form="travelo_nl_edit">{$travelo['5l_text']}</textarea><br>
                            <label for="5l_pic" class="offer" >Kép név:</label><input class="base"  type="text" id="5l_pic" name="5l_pic" value="{$travelo['5l_pic']}"><br>
                            <label for="5l_link" class="offer" >Link:</label><input class="base"  type="text" id="5l_link" name="5l_link" value="{$travelo['5l_link']}"><br>
                            <label for="5l_analytics" class="offer" >Analytics:</label><input class="base"  type="text" id="5l_analytics" name="5l_analytics" value="{$travelo['5l_analytics']}"><br>
                            <label for="5l_price" class="offer" >Legjobb ár:</label><input class="base"  type="text" id="5l_price" name="5l_price" value="{$travelo['5l_price']}"><br>
                        </td>
                        <td class="smallpic">
                            <label for="5r_title" class="offer">Cím:</label><input class="base"  type="text" id="5r_title" name="5r_title" value="{$travelo['5r_title']}"><br>
                            <label for="5r_subtitle" class="offer">Alcím:</label><input class="base"  type="text" id="5r_subtitle" name="5r_subtitle" value="{$travelo['5r_subtitle']}"><br>
                            <label for="5r_text" class="offer" >Leírás:</label><textarea rows="6" cols="35" id="5r-text" name="5r_text" form="travelo_nl_edit">{$travelo['5r_text']}</textarea><br>
                            <label for="5r_pic" class="offer" >Kép név:</label><input class="base"  type="text" id="5r_pic" name="5r_pic" value="{$travelo['5r_pic']}"><br>
                            <label for="5r_link" class="offer" >Link:</label><input class="base"  type="text" id="5r_link" name="5r_link" value="{$travelo['5r_link']}"><br>
                            <label for="5r_analytics" class="offer" >Analytics:</label><input class="base"  type="text" id="5r_analytics" name="5r_analytics" value="{$travelo['5r_analytics']}"><br>
                            <label for="5r_price" class="offer" >Legjobb ár:</label><input class="base"  type="text" id="5r_price" name="5r_price" value="{$travelo['5r_price']}"><br>
                        </td>
                    </tr>
                </table>
            </fieldset>
        </fieldset>
        <fieldset>
            <legend>Leggyakoribb keresések</legend>
            <table>
                <tr>
                    <td colspan="2">
                        <input type="checkbox" name="most_recent_1c_ok" $most_recent_1c_ok> 1 oszlopos<br>
                    </td>
                </tr>
                <tr>
                    <td class="mostrecent_1c" colspan="2">
                        <label for="mostrecent_1_puretext" class="mostrecent">Szöveg: </label><input class="mostrecent" type="text" id="mostrecent_1_puretext" name="mostrecent_1_puretext" value="{$travelo['mostrecent_1_puretext']}"> 
                        <label for="mostrecent_1_highlitedtext" class="mostrecent">Kiemelt szöveg: </label><input class="mostrecent" type="text" id="mostrecent_1_highlitedtext" name="mostrecent_1_highlitedtext" value="{$travelo['mostrecent_1_highlitedtext']}"><br>
                        <label for="mostrecent_1_link" class="mostrecent">Link: </label><input class="mostrecent" type="text" id="mostrecent_1_link" name="mostrecent_1_link" value="{$travelo['mostrecent_1_link']}">
                        <label for="mostrecent_1_analytics" class="mostrecent">Analytics: </label><input class="mostrecent" type="text" id="mostrecent_1_analytics" name="mostrecent_1_analytics" value="{$travelo['mostrecent_1_analytics']}"><br>   
                    </td>
                </tr>
                <tr>
                    <td class="mostrecent_1c" colspan="2">
                        <label for="mostrecent_2_puretext" class="mostrecent">Szöveg: </label><input class="mostrecent" type="text" id="mostrecent_2_puretext" name="mostrecent_2_puretext" value="{$travelo['mostrecent_2_puretext']}"> 
                        <label for="mostrecent_2_highlitedtext" class="mostrecent">Kiemelt szöveg: </label><input class="mostrecent" type="text" id="mostrecent_2_highlitedtext" name="mostrecent_2_highlitedtext" value="{$travelo['mostrecent_2_highlitedtext']}"><br>
                        <label for="mostrecent_2_link" class="mostrecent">Link: </label><input class="mostrecent" type="text" id="mostrecent_2_link" name="mostrecent_2_link" value="{$travelo['mostrecent_2_link']}">
                        <label for="mostrecent_2_analytics" class="mostrecent">Analytics: </label><input class="mostrecent" type="text" id="mostrecent_2_analytics" name="mostrecent_2_analytics" value="{$travelo['mostrecent_2_analytics']}"><br> 
                    </td>
                </tr>
                <tr>
                    <td class="mostrecent_1c" colspan="3">
                       <label for="mostrecent_3_puretext" class="mostrecent">Szöveg: </label><input class="mostrecent" type="text" id="mostrecent_3_puretext" name="mostrecent_3_puretext" value="{$travelo['mostrecent_3_puretext']}"> 
                        <label for="mostrecent_3_highlitedtext" class="mostrecent">Kiemelt szöveg: </label><input class="mostrecent" type="text" id="mostrecent_3_highlitedtext" name="mostrecent_3_highlitedtext" value="{$travelo['mostrecent_3_highlitedtext']}"><br>
                        <label for="mostrecent_3_link" class="mostrecent">Link: </label><input class="mostrecent" type="text" id="mostrecent_3_link" name="mostrecent_3_link" value="{$travelo['mostrecent_3_link']}">
                        <label for="mostrecent_3_analytics" class="mostrecent">Analytics: </label><input class="mostrecent" type="text" id="mostrecent_3_analytics" name="mostrecent_3_analytics" value="{$travelo['mostrecent_3_analytics']}"><br> 
                    </td>
                </tr>
                <tr>
                    <td class="mostrecent_1c" colspan="4">
                        <label for="mostrecent_4_puretext" class="mostrecent">Szöveg: </label><input class="mostrecent" type="text" id="mostrecent_4_puretext" name="mostrecent_4_puretext" value="{$travelo['mostrecent_4_puretext']}"> 
                        <label for="mostrecent_4_highlitedtext" class="mostrecent">Kiemelt szöveg: </label><input class="mostrecent" type="text" id="mostrecent_4_highlitedtext" name="mostrecent_4_highlitedtext" value="{$travelo['mostrecent_4_highlitedtext']}"><br>
                        <label for="mostrecent_4_link" class="mostrecent">Link: </label><input class="mostrecent" type="text" id="mostrecent_4_link" name="mostrecent_4_link" value="{$travelo['mostrecent_4_link']}">
                        <label for="mostrecent_4_analytics" class="mostrecent">Analytics: </label><input class="mostrecent" type="text" id="mostrecent_4_analytics" name="mostrecent_4_analytics" value="{$travelo['mostrecent_4_analytics']}"><br> 
                    </td>
                </tr>
                <tr>
                    <td class="mostrecent_1c" colspan="5">
                        <label for="mostrecent_5_puretext" class="mostrecent">Szöveg: </label><input class="mostrecent" type="text" id="mostrecent_5_puretext" name="mostrecent_5_puretext" value="{$travelo['mostrecent_5_puretext']}"> 
                        <label for="mostrecent_5_highlitedtext" class="mostrecent">Kiemelt szöveg: </label><input class="mostrecent" type="text" id="mostrecent_5_highlitedtext" name="mostrecent_5_highlitedtext" value="{$travelo['mostrecent_5_highlitedtext']}"><br>
                        <label for="mostrecent_5_link" class="mostrecent">Link: </label><input class="mostrecent" type="text" id="mostrecent_5_link" name="mostrecent_5_link" value="{$travelo['mostrecent_5_link']}">
                        <label for="mostrecent_5_analytics" class="mostrecent">Analytics: </label><input class="mostrecent" type="text" id="mostrecent_5_analytics" name="mostrecent_5_analytics" value="{$travelo['mostrecent_5_analytics']}"><br> 
                    </td>
                </tr>
                <tr>
                    <td class="mostrecent_1c" colspan="2">
                        <input type="checkbox" name="most_recent_2c_ok" $most_recent_2c_ok> 2 oszlopos<br>
                    </td>
                </tr>
                <tr>
                    <th>Bal</th>
                    <th>Jobb</th>
                </tr>
                <tr>
                    <td class="mostrecent_2c">
                        <label for="mostrecent_1l_puretext" class="mostrecent_2c">Szöveg: </label><input class="mostrecent_2c" type="text" id="mostrecent_1l_puretext" name="mostrecent_1l_puretext" value="{$travelo['mostrecent_1l_puretext']}"> 
                        <label for="mostrecent_1l_highlitedtext" class="mostrecent">Kiemelt szöveg: </label><input class="mostrecent_2c" type="text" id="mostrecent_1l_highlitedtext" name="mostrecent_1l_highlitedtext" value="{$travelo['mostrecent_1l_highlitedtext']}"><br>
                        <label for="mostrecent_1l_link" class="mostrecent_2c">Link: </label><input class="mostrecent_2c" type="text" id="mostrecent_1l_link" name="mostrecent_1l_link" value="{$travelo['mostrecent_1l_link']}">
                        <label for="mostrecent_1l_analytics" class="mostrecent">Analytics: </label><input class="mostrecent_2c" type="text" id="mostrecent_1l_analytics" name="mostrecent_1l_analytics" value="{$travelo['mostrecent_1l_analytics']}"><br>   
                    </td>
                    <td class="mostrecent_2c">
                        <label for="mostrecent_1r_puretext" class="mostrecent_2c">Szöveg: </label><input class="mostrecent_2c" type="text" id="mostrecent_1r_puretext" name="mostrecent_1r_puretext" value="{$travelo['mostrecent_1r_puretext']}"> 
                        <label for="mostrecent_1r_highlitedtext" class="mostrecent">Kiemelt szöveg: </label><input class="mostrecent_2c" type="text" id="mostrecent_1r_highlitedtext" name="mostrecent_1r_highlitedtext" value="{$travelo['mostrecent_1r_highlitedtext']}"><br>
                        <label for="mostrecent_1r_link" class="mostrecent_2c">Link: </label><input class="mostrecent_2c" type="text" id="mostrecent_1r_link" name="mostrecent_1r_link" value="{$travelo['mostrecent_1r_link']}">
                        <label for="mostrecent_1r_analytics" class="mostrecent">Analytics: </label><input class="mostrecent_2c" type="text" id="mostrecent_1r_analytics" name="mostrecent_1r_analytics" value="{$travelo['mostrecent_1r_analytics']}"><br>  
                    </td>
                </tr>
                <tr>
                    <td class="mostrecent_2c">
                        <label for="mostrecent_2l_puretext" class="mostrecent_2c">Szöveg: </label><input class="mostrecent_2c" type="text" id="mostrecent_2l_puretext" name="mostrecent_2l_puretext" value="{$travelo['mostrecent_2l_puretext']}"> 
                        <label for="mostrecent_2l_highlitedtext" class="mostrecent">Kiemelt szöveg: </label><input class="mostrecent_2c" type="text" id="mostrecent_2l_highlitedtext" name="mostrecent_2l_highlitedtext" value="{$travelo['mostrecent_2l_highlitedtext']}"><br>
                        <label for="mostrecent_2l_link" class="mostrecent_2c">Link: </label><input class="mostrecent_2c" type="text" id="mostrecent_2l_link" name="mostrecent_2l_link" value="{$travelo['mostrecent_2l_link']}">
                        <label for="mostrecent_2l_analytics" class="mostrecent">Analytics: </label><input class="mostrecent_2c" type="text" id="mostrecent_2l_analytics" name="mostrecent_2l_analytics" value="{$travelo['mostrecent_2l_analytics']}"><br>  
                    </td>
                    <td class="mostrecent_2c">
                        <label for="mostrecent_2r_puretext" class="mostrecent_2c">Szöveg: </label><input class="mostrecent_2c" type="text" id="mostrecent_2r_puretext" name="mostrecent_2r_puretext" value="{$travelo['mostrecent_2r_puretext']}"> 
                        <label for="mostrecent_2r_highlitedtext" class="mostrecent">Kiemelt szöveg: </label><input class="mostrecent_2c" type="text" id="mostrecent_2r_highlitedtext" name="mostrecent_2r_highlitedtext" value="{$travelo['mostrecent_2r_highlitedtext']}"><br>
                        <label for="mostrecent_2r_link" class="mostrecent_2c">Link: </label><input class="mostrecent_2c" type="text" id="mostrecent_2r_link" name="mostrecent_2r_link" value="{$travelo['mostrecent_2r_link']}">
                        <label for="mostrecent_2r_analytics" class="mostrecent">Analytics: </label><input class="mostrecent_2c" type="text" id="mostrecent_2r_analytics" name="mostrecent_2r_analytics" value="{$travelo['mostrecent_2r_analytics']}"><br>  
                    </td>
                </tr>
                <tr>
                    <td class="mostrecent_2c">
                        <label for="mostrecent_3l_puretext" class="mostrecent_2c">Szöveg: </label><input class="mostrecent_2c" type="text" id="mostrecent_3l_puretext" name="mostrecent_3l_puretext" value="{$travelo['mostrecent_3l_puretext']}"> 
                        <label for="mostrecent_3l_highlitedtext" class="mostrecent">Kiemelt szöveg: </label><input class="mostrecent_2c" type="text" id="mostrecent_3l_highlitedtext" name="mostrecent_3l_highlitedtext" value="{$travelo['mostrecent_3l_highlitedtext']}"><br>
                        <label for="mostrecent_3l_link" class="mostrecent_2c">Link: </label><input class="mostrecent_2c" type="text" id="mostrecent_3l_link" name="mostrecent_3l_link" value="{$travelo['mostrecent_3l_link']}">
                        <label for="mostrecent_3l_analytics" class="mostrecent">Analytics: </label><input class="mostrecent_2c" type="text" id="mostrecent_3l_analytics" name="mostrecent_3l_analytics" value="{$travelo['mostrecent_3l_analytics']}"><br>  
                    </td>
                    <td class="mostrecent_2c">
                        <label for="mostrecent_3r_puretext" class="mostrecent_2c">Szöveg: </label><input class="mostrecent_2c" type="text" id="mostrecent_3r_puretext" name="mostrecent_3r_puretext" value="{$travelo['mostrecent_3r_puretext']}"> 
                        <label for="mostrecent_3r_highlitedtext" class="mostrecent">Kiemelt szöveg: </label><input class="mostrecent_2c" type="text" id="mostrecent_3r_highlitedtext" name="mostrecent_3r_highlitedtext" value="{$travelo['mostrecent_3r_highlitedtext']}"><br>
                        <label for="mostrecent_3r_link" class="mostrecent_2c">Link: </label><input class="mostrecent_2c" type="text" id="mostrecent_3r_link" name="mostrecent_3r_link" value="{$travelo['mostrecent_3r_link']}">
                        <label for="mostrecent_3r_analytics" class="mostrecent">Analytics: </label><input class="mostrecent_2c" type="text" id="mostrecent_3r_analytics" name="mostrecent_3r_analytics" value="{$travelo['mostrecent_3r_analytics']}"><br>  
                    </td>
                </tr>
                <tr>
                    <td class="mostrecent_2c">
                        <label for="mostrecent_4l_puretext" class="mostrecent_2c">Szöveg: </label><input class="mostrecent_2c" type="text" id="mostrecent_4l_puretext" name="mostrecent_4l_puretext" value="{$travelo['mostrecent_4l_puretext']}"> 
                        <label for="mostrecent_4l_highlitedtext" class="mostrecent">Kiemelt szöveg: </label><input class="mostrecent_2c" type="text" id="mostrecent_4l_highlitedtext" name="mostrecent_4l_highlitedtext" value="{$travelo['mostrecent_4l_highlitedtext']}"><br>
                        <label for="mostrecent_4l_link" class="mostrecent_2c">Link: </label><input class="mostrecent_2c" type="text" id="mostrecent_4l_link" name="mostrecent_4l_link" value="{$travelo['mostrecent_4l_link']}">
                        <label for="mostrecent_4l_analytics" class="mostrecent">Analytics: </label><input class="mostrecent_2c" type="text" id="mostrecent_4l_analytics" name="mostrecent_4l_analytics" value="{$travelo['mostrecent_4l_analytics']}"><br>  
                    </td>
                    <td class="mostrecent_2c">
                        <label for="mostrecent_4r_puretext" class="mostrecent_2c">Szöveg: </label><input class="mostrecent_2c" type="text" id="mostrecent_4r_puretext" name="mostrecent_4r_puretext" value="{$travelo['mostrecent_4r_puretext']}"> 
                        <label for="mostrecent_4r_highlitedtext" class="mostrecent">Kiemelt szöveg: </label><input class="mostrecent_2c" type="text" id="mostrecent_4r_highlitedtext" name="mostrecent_4r_highlitedtext" value="{$travelo['mostrecent_4r_highlitedtext']}"><br>
                        <label for="mostrecent_4r_link" class="mostrecent_2c">Link: </label><input class="mostrecent_2c" type="text" id="mostrecent_4r_link" name="mostrecent_4r_link" value="{$travelo['mostrecent_4r_link']}">
                        <label for="mostrecent_4r_analytics" class="mostrecent">Analytics: </label><input class="mostrecent_2c" type="text" id="mostrecent_4r_analytics" name="mostrecent_4r_analytics" value="{$travelo['mostrecent_4r_analytics']}"><br>  
                    </td>
                </tr>
                <tr>
                    <td class="mostrecent_2c">
                        <label for="mostrecent_5l_puretext" class="mostrecent_2c">Szöveg: </label><input class="mostrecent_2c" type="text" id="mostrecent_5l_puretext" name="mostrecent_5l_puretext" value="{$travelo['mostrecent_5l_puretext']}"> 
                        <label for="mostrecent_5l_highlitedtext" class="mostrecent">Kiemelt szöveg: </label><input class="mostrecent_2c" type="text" id="mostrecent_5l_highlitedtext" name="mostrecent_5l_highlitedtext" value="{$travelo['mostrecent_5l_highlitedtext']}"><br>
                        <label for="mostrecent_5l_link" class="mostrecent_2c">Link: </label><input class="mostrecent_2c" type="text" id="mostrecent_5l_link" name="mostrecent_5l_link" value="{$travelo['mostrecent_5l_link']}">
                        <label for="mostrecent_5l_analytics" class="mostrecent">Analytics: </label><input class="mostrecent_2c" type="text" id="mostrecent_5l_analytics" name="mostrecent_5l_analytics" value="{$travelo['mostrecent_5l_analytics']}"><br>  
                    </td>
                    <td class="mostrecent_2c">
                         <label for="mostrecent_5r_puretext" class="mostrecent_2c">Szöveg: </label><input class="mostrecent_2c" type="text" id="mostrecent_5r_puretext" name="mostrecent_5r_puretext" value="{$travelo['mostrecent_5r_puretext']}"> 
                        <label for="mostrecent_5r_highlitedtext" class="mostrecent">Kiemelt szöveg: </label><input class="mostrecent_2c" type="text" id="mostrecent_5r_highlitedtext" name="mostrecent_5r_highlitedtext" value="{$travelo['mostrecent_5r_highlitedtext']}"><br>
                        <label for="mostrecent_5r_link" class="mostrecent_2c">Link: </label><input class="mostrecent_2c" type="text" id="mostrecent_5r_link" name="mostrecent_5r_link" value="{$travelo['mostrecent_5r_link']}">
                        <label for="mostrecent_5r_analytics" class="mostrecent">Analytics: </label><input class="mostrecent_2c" type="text" id="mostrecent_5r_analytics" name="mostrecent_5r_analytics" value="{$travelo['mostrecent_5r_analytics']}"><br>  
                    </td>
                </tr>
            </table>
        </fieldset>
        <fieldset>
            <legend><input type="checkbox" id="article_ok" name="article_ok" $article_ok><label for="article_ok">Legfrisebb cikkek</label></legend>
            <table class="onec">
                <tr>
                    <td id="harticle" rowspan="5">
                        <label for="harticle_title" class="offer">Cím: </label><input class="base" type="text" id="harticle_title" name="harticle_title" value="{$travelo['harticle_title']}"><br> 
                        <label for="harticle_date" class="offer">Dátum: </label><input class="base" type="text" id="harticle_date" name="harticle_date" value="{$travelo['harticle_date']}"><br>
                        <label for="harticle_text" class="offer">Lead: </label><textarea rows="6" cols="35" id="harticle_text" name="harticle_text" form="travelo_nl_edit">{$travelo['harticle_text']}</textarea><br>
                        <label for="harticle_link" class="offer">Link: </label><input class="base" type="text" id="harticle_link" name="harticle_link" value="{$travelo['harticle_link']}"><br>
                        <label for="harticle_analytics" class="offer">Analytics: </label><input class="base" type="text" id="harticle_analytics" name="harticle_analytics" value="{$travelo['harticle_analytics']}"><br>
                    </td>
                </tr>
                <tr>
                    <td class="article">
                        <label for="article_1_title" class="offer">Cím: </label><input class="base" type="text" id="article_1_title" name="article_1_title" value="{$travelo['article_1_title']}"><br> 
                        <label for="article_1_date" class="offer">Dátum: </label><input class="base" type="text" id="article_1_date" name="article_1_date" value="{$travelo['article_1_date']}"><br>
                        <label for="article_1_link" class="offer">Link: </label><input class="base" type="text" id="article_1_link" name="article_1_link" value="{$travelo['article_1_link']}"><br>
                        <label for="article_1_analytics" class="offer">Analytics: </label><input class="base" type="text" id="article_1_analytics" name="article_1_analytics" value="{$travelo['article_1_analytics']}"><br>
                    </td>
                </tr>
                <tr>
                    <td class="article">
                        <label for="article_2_title" class="offer">Cím: </label><input class="base" type="text" id="article_2_title" name="article_2_title" value="{$travelo['article_2_title']}"><br> 
                        <label for="article_2_date" class="offer">Dátum: </label><input class="base" type="text" id="article_2_date" name="article_2_date" value="{$travelo['article_2_date']}"><br>
                        <label for="article_2_link" class="offer">Link: </label><input class="base" type="text" id="article_2_link" name="article_2_link" value="{$travelo['article_2_link']}"><br>
                        <label for="article_2_analytics" class="offer">Analytics: </label><input class="base" type="text" id="article_2_analytics" name="article_2_analytics" value="{$travelo['article_2_analytics']}"><br>
                    </td>
                </tr>
                <tr>
                    <td class="article">
                        <label for="article_3_title" class="offer">Cím: </label><input class="base" type="text" id="article_3_title" name="article_3_title" value="{$travelo['article_3_title']}"><br> 
                        <label for="article_3_date" class="offer">Dátum: </label><input class="base" type="text" id="article_3_date" name="article_3_date" value="{$travelo['article_3_date']}"><br>
                        <label for="article_3_link" class="offer">Link: </label><input class="base" type="text" id="article_3_link" name="article_3_link" value="{$travelo['article_3_link']}"><br>
                        <label for="article_3_analytics" class="offer">Analytics: </label><input class="base" type="text" id="article_3_analytics" name="article_3_analytics" value="{$travelo['article_3_analytics']}"><br>
                    </td>
                </tr>
                <tr>
                    <td class="article">
                        <label for="article_4_title" class="offer">Cím: </label><input class="base" type="text" id="article_4_title" name="article_4_title" value="{$travelo['article_4_title']}"><br> 
                        <label for="article_4_date" class="offer">Dátum: </label><input class="base" type="text" id="article_4_date" name="article_4_date" value="{$travelo['article_4_date']}"><br>
                        <label for="article_4_link" class="offer">Link: </label><input class="base" type="text" id="article_4_link" name="article_4_link" value="{$travelo['article_4_link']}"><br>
                        <label for="article_4_analytics" class="offer">Analytics: </label><input class="base" type="text" id="article_4_analytics" name="article_4_analytics" value="{$travelo['article_4_analytics']}"><br>
                    </td>
                </tr>  
            </table>
        </fieldset>
        <fieldset>
            <legend>Hirdetések</legend>
            <table class="sc">
                <tr>
                    <td class="select">
                        <input type="radio" id="null" name="advertisements" value="null"><label for="null"> Nincs hirdetés</label>  
                    </td>
                    <td class="select">
                        <input type="radio" id="t_b" name="advertisements" value="t_b" $t_b><label for="t_b"> Turpan + Banner</label>
                    </td>
                    <td class="select">
                        <input type="radio" id="b_sz" name="advertisements" value="b_sz" $b_sz><label for="b_sz"> Banner + Szöveges</label>  
                    </td>
                    <td class="select">
                        <input type="radio" id="t_sz" name="advertisements" value="t_sz" $t_sz><label for="t_sz"> Turpan + Szöveges</label> 
                    </td>
                </tr>
            </table>
            <div class="sc">
                <fieldset class="sc">
                    <legend>Turpan</legend>
                    <table>
                        <tr>
                            <td>
                                <label for="turpan_1_title" class="offer">Cím: </label><input class="base" type="text" id="turpan_1_title" name="turpan_1_title" value="{$travelo['turpan_1_title']}"><br> 
                                <label for="turpan_1_title" class="offer">Link: </label><input class="base" type="text" id="turpan_1_link" name="turpan_1_link" value="{$travelo['turpan_1_link']}"><br>
                            </td>
                        </tr>  
                        <tr>
                            <td>
                                <label for="turpan_2_title" class="offer">Cím: </label><input class="base" type="text" id="turpan_2_title" name="turpan_2_title" value="{$travelo['turpan_2_title']}"><br> 
                                <label for="turpan_2_title" class="offer">Link: </label><input class="base" type="text" id="turpan_2_link" name="turpan_2_link" value="{$travelo['turpan_2_link']}"><br>
                            </td>
                        </tr>  
                        <tr>
                            <td>
                                <label for="turpan_3_title" class="offer">Cím: </label><input class="base" type="text" id="turpan_3_title" name="turpan_3_title" value="{$travelo['turpan_3_title']}"><br> 
                                <label for="turpan_3_title" class="offer">Link: </label><input class="base" type="text" id="turpan_3_link" name="turpan_3_link" value="{$travelo['turpan_3_link']}"><br>
                            </td>
                        </tr>  
                        <tr>
                            <td>
                                <label for="turpan_4_title" class="offer">Cím: </label><input class="base" type="text" id="turpan_4_title" name="turpan_4_title" value="{$travelo['turpan_4_title']}"><br> 
                                <label for="turpan_4_title" class="offer">Link: </label><input class="base" type="text" id="turpan_4_link" name="turpan_4_link" value="{$travelo['turpan_4_link']}"><br>
                            </td>
                        </tr>  
                    </table>
                </fieldset>
            </div>
            <div class="sc">
                <fieldset class="sc">
                    <legend>Banner</legend>
                    <table>
                        <tr>
                            <td>
                                <label for="banner_pic" class="offer">Kép: </label><input class="base" type="text" id="banner_pic" name="banner_pic" value="{$travelo['banner_pic']}"><br> 
                                <label for="banner_link" class="offer">Link: </label><input class="base" type="text" id="banner_link" name="banner_link" value="{$travelo['banner_link']}"><br>
                                <label for="banner_analytics" class="offer">Analytics: </label><input class="base" type="text" id="banner_analytics" name="banner_analytics" value="{$travelo['banner_analytics']}"><br>
                            </td>
                        </tr>
                    </table>
                </fieldset>
            </div>
            <div class="sc">
                <fieldset class="sc">
                    <legend>Szöveges</legend>
                    <table>
                        <tr>
                            <td>
                                <label for="textad_pic" class="offer">Kép: </label><input class="base" type="text" id="textad_pic" name="textad_pic" value="{$travelo['textad_pic']}"><br> 
                                <label for="textad_title" class="offer">Cím: </label><input class="base" type="text" id="textad_title" name="textad_title" value="{$travelo['textad_title']}"><br> 
                                <label for="textad_text" class="offer">Szöveg</label><textarea rows="6" cols="35" id="textad_text" name="textad_text" form="travelo_nl_edit">{$travelo['textad_text']}</textarea><br>
                                <label for="textad_link" class="offer">Link: </label><input class="base" type="text" id="textad_link" name="textad_link" value="{$travelo['textad_link']}"><br>
                                <label for="textad_analytics" class="offer">Analytics: </label><input class="base" type="text" id="textad_analytics" name="textad_analytics" value="{$travelo['textad_analytics']}"><br>
                            </td>
                        </tr>
                    </table>
                </fieldset>
            </div>
        </fieldset>
         <fieldset>
            <legend>Hirdetések 2. sor</legend>
            <table class="sc">
                <tr>
                    <td class="select">
                        <input type="radio" id="null2" name="advertisements2" value="null"><label for="null2"> Nincs hirdetés</label>  
                    </td>
                    <td class="select">
                        <input type="radio" id="b_b" name="advertisements2" value="b_b" $b_b><label for="b_b"> Banner + Banner</label>
                    </td>
                    <td class="select">
                        <input type="radio" id="b2_sz" name="advertisements2" value="b2_sz" $b2_sz><label for="b2_sz"> Banner1 + Szöveges</label>  
                    </td>
                    <td class="select">
                        <input type="radio" id="sz_sz" name="advertisements2" value="sz_sz" $sz_sz><label for="b2_sz"> Szöveges + Szöveges</label>  
                    </td>                        
                </tr>
            </table>
             <div class="sc">
                <fieldset class="sc">
                    <legend>Banner1</legend>
                    <table>
                        <tr>
                            <td>
                                <label for="banner2_1_pic" class="offer">Kép: </label><input class="base" type="text" id="banner2_1_pic" name="banner2_1_pic" value="{$travelo['banner2_1_pic']}"><br> 
                                <label for="banner2_1_link" class="offer">Link: </label><input class="base" type="text" id="banner2_1_link" name="banner2_1_link" value="{$travelo['banner2_1_link']}"><br>
                                <label for="banner2_1_analytics" class="offer">Analytics: </label><input class="base" type="text" id="banner2_1_analytics" name="banner2_1_analytics1" value="{$travelo['banner2_1_analytics']}"><br>
                            </td>
                        </tr>
                    </table>
                </fieldset>
                <fieldset class="sc">
                    <legend>Banner2</legend>
                    <table>
                        <tr>
                            <td>
                                <label for="banner2_2_pic" class="offer">Kép: </label><input class="base" type="text" id="banner2_2_pic" name="banner2_2_pic" value="{$travelo['banner2_2_pic']}"><br> 
                                <label for="banner2_2_link" class="offer">Link: </label><input class="base" type="text" id="banner2_2_link" name="banner2_2_link" value="{$travelo['banner2_2_link']}"><br>
                                <label for="banner2_2_analytics" class="offer">Analytics: </label><input class="base" type="text" id="banner2_2_analytics" name="banner2_2_analytics" value="{$travelo['banner2_2_analytics']}"><br>
                            </td>
                        </tr>
                    </table>
                </fieldset>
            </div>
            <div class="sc">
                <fieldset class="sc">
                    <legend>Szöveges</legend>
                    <table>
                        <tr>
                            <td>
                                <label for="textad2_pic" class="offer">Kép: </label><input class="base" type="text" id="textad2_pic" name="textad2_pic" value="{$travelo['textad2_pic']}"><br> 
                                <label for="textad2_title" class="offer">Cím: </label><input class="base" type="text" id="textad2_title" name="textad2_title" value="{$travelo['textad2_title']}"><br> 
                                <label for="textad2_text" class="offer">Szöveg</label><textarea rows="6" cols="35" id="textad2_text" name="textad2_text" form="travelo_nl_edit">{$travelo['textad2_text']}</textarea><br>
                                <label for="textad2_link" class="offer">Link: </label><input class="base" type="text" id="textad2_link" name="textad2_link" value="{$travelo['textad2_link']}"><br>
                                <label for="textad2_analytics" class="offer">Analytics: </label><input class="base" type="text" id="textad2_analytics" name="textad2_analytics" value="{$travelo['textad2_analytics']}"><br>
                            </td>
                        </tr>
                    </table>
                </fieldset>
            </div>
            <div class="sc">
                <fieldset class="sc">
                    <legend>Szöveges</legend>
                    <table>
                        <tr>
                            <td>
                                <label for="textad2_pic" class="offer">Kép: </label><input class="base" type="text" id="textad2_2_pic" name="textad2_2_pic" value="{$travelo['textad2_2_pic']}"><br> 
                                <label for="textad2_title" class="offer">Cím: </label><input class="base" type="text" id="textad2_2_title" name="textad2_2_title" value="{$travelo['textad2_2_title']}"><br> 
                                <label for="textad2_text" class="offer">Szöveg</label><textarea rows="6" cols="35" id="textad2_2_text" name="textad2_2_text" form="travelo_nl_edit">{$travelo['textad2_2_text']}</textarea><br>
                                <label for="textad2_link" class="offer">Link: </label><input class="base" type="text" id="textad2_2_link" name="textad2_2_link" value="{$travelo['textad2_2_link']}"><br>
                                <label for="textad2_analytics" class="offer">Analytics: </label><input class="base" type="text" id="textad2_2_analytics" name="textad2_2_analytics" value="{$travelo['textad2_2_analytics']}"><br>
                            </td>
                        </tr>
                    </table>
                </fieldset>
            </div>                    
        </fieldset>
        <input type="hidden" name="id" value="$id">                       
        <div id="submit">
        <input class="submit" id="submit" type="submit" value="Hírlevél módosítása"><br>
        </div>
    </form>
<script type="text/javascript">
	$('form').quickValidate();
</script>
    </div>
       
EOT;
}

function lifeInput() {
    echo <<<EOT
   <div id="main"> 
   <form action="life_inputDb.php" method="post" id="travelo_nl_edit" accept-charset="UTF-8" enctype="multipart/form-data">
        <fieldset>
            <legend>Alapadatok</legend>
            <span class="error">*</span><label class="base" for="sendingdate">Küldés dátuma:</label><input class="quickValidate"  type="text" name="sendingdate" id="sendingdate" data-validate="required" data-name="Küldés dátuma "><br>
            <span class="error">*</span><label class="base" for="folder">Alap mappa:</label><input class="quickValidate"  type="text" name="folder" id="folder" data-validate="required"><br>
        </fieldset>
        <fieldset>
            <legend>Analytics kódok</legend>
            <span class="error">*</span><label class="base" for="analytics_source">Source:</label><input class="quickValidate"  type="text" id="analytics_source" name="analytics_source" data-validate="required"><br>
            <span class="error">*</span><label class="base" for="analytics_medium"> Medium:</label><input class="quickValidate"  type="text" id="analytics_medium" name="analytics_medium" data-validate="required"><br>
        </fieldset>
        <fieldset>
            <legend>Menü</legend>
            <table border="0">
                <tr>
                    <td class="menu">
                        1. hely:<br>
                        <span class="error">*</span><label for="menu1" class="menu">Felirat:</label> <input class="menu" type="text" name="menu1" id="menu1" value="Wellness" data-validate="required"><br>
                        <span class="error">*</span><label for="menu1_link" class="menu">Link:</label> <input class="menu" type="text" name="menu1_link" id="menu1_link" value="http://utazas.life.hu/kereses?keyword=wellness&belfold=1" data-validate="required"><br>
                        <span class="error">*</span><label for="menu1_analytics" class="menu">Analytics:</label> <input class="menu" type="text" name="menu1_analytics" value="menu_wellness" data-validate="required"><br>
                    </td>
                    <td class="menu">
                        2. hely:<br>
                        <span class="error">*</span><label for="menu2" class="menu">Felirat:</label> <input class="menu" type="text" name="menu2" id="menu2" value="Tengerpart" data-validate="required"><br>
                        <span class="error">*</span><label for="menu2_link" class="menu">Link:</label> <input class="menu" type="text" name="menu2_link" id="menu2_link" value="http://utazas.life.hu/kereses?szo=tengerpart" data-validate="required"><br>
                        <span class="error">*</span><label for="menu2_analytics" class="menu">Analytics:</label> <input class="menu" type="text" name="menu2_analytics" value="menu_tengerpart" data-validate="required"><br>
                    </td>
                    <td class="menu">
                        3. hely:<br>
                        <span class="error">*</span><label for="menu3" class="menu">Felirat:</label> <input class="menu" type="text" name="menu3" id="menu3" value="Balaton" data-validate="required"><br>
                        <span class="error">*</span><label for="menu3_link" class="menu">Link:</label> <input class="menu" type="text" name="menu3_link" id="menu3_link" value="http://utazas.life.hu/kereses?szo=Balaton&belfold=1" data-validate="required"><br>
                        <span class="error">*</span><label for="menu3_analytics" class="menu">Analytics:</label> <input class="menu" type="text" name="menu3_analytics" value="menu_balaton" data-validate="required"><br>
                    </td>
                    <td class="menu">
                        4. hely:<br>
                        <span class="error">*</span><label for="menu4" class="menu">Felirat:</label><input class="menu" type="text" name="menu4" id="menu4" value="Akciók" data-validate="required"><br>
                        <span class="error">*</span><label for="menu4_link" class="menu">Link:</label> <input class="menu" type="text" name="menu4_link" id="menu4_link" value="http://utazas.life.hu/akciok" data-validate="required"><br>
                        <span class="error">*</span><label for="menu4_analytics" class="menu">Analytics:</label> <input class="menu" type="text" name="menu4_analytics" value="menu_akciok" data-validate="required"><br>
                    </td>
               </tr>
            </table>
        </fieldset>
        <fieldset>
            <legend>Ajánlatok</legend>
            <div class="sc">
                <fieldset class="sc">
                    <legend>Nagyképes</legend>
                    <span class="error">*</span><label class="offer" for="bp_title">Cím:</label><input class="quickValidate"  type="text" name="bp_title" id="bp_title" data-validate="required"><br>
                    <span class="error">*</span><label class="offer" for="bp_text">Leírás:</label><textarea rows="6" cols="35" class="quickValidate" id="bp_text" name="bp_text" form="travelo_nl_edit" data-validate="required"></textarea><br>
                    <span class="error">*</span><label class="offer" for="bp_pic">Kép név:</label><input class="quickValidate"  type="file" name="bp_pic" id="bp_pic" data-validate="required"><br>
                    <span class="error">*</span><label class="offer" for="bp_link">Link:</label><input class="quickValidate"  type="text" name="bp_link" data-validate="required"><br>
                    <span class="error">*</span><label class="offer" for="bp_analytics">Analytics:</label><input class="quickValidate"  type="text" id="bp_analytics" name="bp_analytics" data-validate="required"><br>
                    <span class="error">*</span><label class="offer" for="bp_price">Legjobb ár:</label><input class="quickValidate"  type="text" id="bp_price" name="bp_price" data-validate="required"><br>
                </fieldset>
            </div>

            <fieldset class="dc">
                <legend>Kisképesek</legend>
                <table>
                    <tr>
                        <th>&nbsp;</th>
                        <th>Bal</th>
                        <th>Jobb</th>
                    </tr>
                    <tr>
                        <td class="checkbox">
                            <input type="checkbox" id="1ok" name="1ok"><label class="checkbox" for="1ok"> 1. sor</label>
                        </td>
                        <td class="smallpic">
                            <label for="1l_title" class="offer">Cím:</label><input class="base"  type="text" id="1l_title" name="1l_title"><br>
                            <label for="1l_subtitle" class="offer">Alcím:</label><input class="base"  type="text" id="1l_subtitle" name="1l_subtitle"><br>
                            <label for="1l_text" class="offer" >Leírás:</label><textarea rows="6" cols="35" id="1l-text" name="1l_text" form="travelo_nl_edit"></textarea><br>
                            <label for="1l_pic" class="offer" >Kép név:</label><input class="base"  type="file" id="1l_pic" name="1l_pic"><br>
                            <label for="1l_link" class="offer" >Link:</label><input class="base"  type="text" id="1l_link" name="1l_link"><br>
                            <label for="1l_analytics" class="offer" >Analytics:</label><input class="base"  type="text" id="1l_analytics" name="1l_analytics"><br>
                            <label for="1l_price" class="offer" >Legjobb ár:</label><input class="base"  type="text" id="1l_price" name="1l_price"><br>
                        </td>
                        <td class="smallpic">
                            <label for="1r_title" class="offer">Cím:</label><input class="base"  type="text" id="1r_title" name="1r_title"><br>
                            <label for="1r_subtitle" class="offer">Alcím:</label><input class="base"  type="text" id="1r_subtitle" name="1r_subtitle"><br>
                            <label for="1r_text" class="offer" >Leírás:</label><textarea rows="6" cols="35" id="1r-text" name="1r_text" form="travelo_nl_edit"></textarea><br>
                            <label for="1r_pic" class="offer" >Kép név:</label><input class="base"  type="file" id="1r_pic" name="1r_pic"><br>
                            <label for="1r_link" class="offer" >Link:</label><input class="base"  type="text" id="1r_link" name="1r_link"><br>
                            <label for="1r_analytics" class="offer" >Analytics:</label><input class="base"  type="text" id="1r_analytics" name="1r_analytics"><br>
                            <label for="1r_price" class="offer" >Legjobb ár:</label><input class="base" type="text" id="1r_price" name="1r_price"><br>
                        </td>
                    </tr>
                    <tr>
                        <td class="checkbox">
                            <input type="checkbox" name="2ok"> 2. sor
                        </td>
                        <td class="smallpic">
                            <label for="2l_title" class="offer">Cím:</label><input class="base"  type="text" id="2l_title" name="2l_title"><br>
                            <label for="2l_subtitle" class="offer">Alcím:</label><input class="base"  type="text" id="2l_subtitle" name="2l_subtitle"><br>
                            <label for="2l_text" class="offer" >Leírás:</label><textarea rows="6" cols="35" id="2l-text" name="2l_text" form="travelo_nl_edit"></textarea><br>
                            <label for="2l_pic" class="offer" >Kép név:</label><input class="base"  type="file" id="2l_pic" name="2l_pic"><br>
                            <label for="2l_link" class="offer" >Link:</label><input class="base"  type="text" id="2l_link" name="2l_link"><br>
                            <label for="2l_analytics" class="offer" >Analytics:</label><input class="base"  type="text" id="2l_analytics" name="2l_analytics"><br>
                            <label for="2l_price" class="offer" >Legjobb ár:</label><input class="base"  type="text" id="2l_price" name="2l_price"><br>
                        </td>
                        <td class="smallpic">
                            <label for="2r_title" class="offer">Cím:</label><input class="base"  type="text" id="2r_title" name="2r_title"><br>
                            <label for="2r_subtitle" class="offer">Alcím:</label><input class="base"  type="text" id="2r_subtitle" name="2r_subtitle"><br>
                            <label for="2r_text" class="offer" >Leírás:</label><textarea rows="6" cols="35" id="2r-text" name="2r_text" form="travelo_nl_edit"></textarea><br>
                            <label for="2r_pic" class="offer" >Kép név:</label><input class="base"  type="file" id="2r_pic" name="2r_pic"><br>
                            <label for="2r_link" class="offer" >Link:</label><input class="base"  type="text" id="2r_link" name="2r_link"><br>
                            <label for="2r_analytics" class="offer" >Analytics:</label><input class="base"  type="text" id="2r_analytics" name="2r_analytics"><br>
                            <label for="2r_price" class="offer" >Legjobb ár:</label><input class="base" type="text" id="2r_price" name="2r_price"><br>
                        </td>
                    </tr>
                    <tr>
                        <td class="checkbox">
                            <input type="checkbox" name="3ok"> 3. sor
                        </td>
                        <td class="smallpic">
                            <label for="3l_title" class="offer">Cím:</label><input class="base"  type="text" id="3l_title" name="3l_title"><br>
                            <label for="3l_subtitle" class="offer">Alcím:</label><input class="base"  type="text" id="3l_subtitle" name="3l_subtitle"><br>
                            <label for="3l_text" class="offer" >Leírás:</label><textarea rows="6" cols="35" id="3l-text" name="3l_text" form="travelo_nl_edit"></textarea><br>
                            <label for="3l_pic" class="offer" >Kép név:</label><input class="base"  type="file" id="3l_pic" name="3l_pic"><br>
                            <label for="3l_link" class="offer" >Link:</label><input class="base"  type="text" id="3l_link" name="3l_link"><br>
                            <label for="3l_analytics" class="offer" >Analytics:</label><input class="base"  type="text" id="3l_analytics" name="3l_analytics"><br>
                            <label for="3l_price" class="offer" >Legjobb ár:</label><input class="base"  type="text" id="3l_price" name="3l_price"><br>
                        </td>
                        <td class="smallpic">
                            <label for="3r_title" class="offer">Cím:</label><input class="base"  type="text" id="3r_title" name="3r_title"><br>
                            <label for="3r_subtitle" class="offer">Alcím:</label><input class="base"  type="text" id="3r_subtitle" name="3r_subtitle"><br>
                            <label for="3r_text" class="offer" >Leírás:</label><textarea rows="6" cols="35" id="3r-text" name="3r_text" form="travelo_nl_edit"></textarea><br>
                            <label for="3r_pic" class="offer" >Kép név:</label><input class="base"  type="file" id="3r_pic" name="3r_pic"><br>
                            <label for="3r_link" class="offer" >Link:</label><input class="base"  type="text" id="3r_link" name="3r_link"><br>
                            <label for="3r_analytics" class="offer" >Analytics:</label><input class="base"  type="text" id="3r_analytics" name="3r_analytics"><br>
                            <label for="3r_price" class="offer" >Legjobb ár:</label><input class="base" type="text" id="3r_price" name="3r_price"><br>
                        </td>
                    </tr>
                    <tr>
                        <td class="checkbox">
                            <input type="checkbox" name="4ok"> 4. sor
                        </td>
                        <td class="smallpic">
                            <label for="4l_title" class="offer">Cím:</label><input class="base"  type="text" id="4l_title" name="4l_title"><br>
                            <label for="4l_subtitle" class="offer">Alcím:</label><input class="base"  type="text" id="4l_subtitle" name="4l_subtitle"><br>
                            <label for="4l_text" class="offer" >Leírás:</label><textarea rows="6" cols="35" id="4l-text" name="4l_text" form="travelo_nl_edit"></textarea><br>
                            <label for="4l_pic" class="offer" >Kép név:</label><input class="base"  type="file" id="4l_pic" name="4l_pic"><br>
                            <label for="4l_link" class="offer" >Link:</label><input class="base"  type="text" id="4l_link" name="4l_link"><br>
                            <label for="4l_analytics" class="offer" >Analytics:</label><input class="base"  type="text" id="4l_analytics" name="4l_analytics"><br>
                            <label for="4l_price" class="offer" >Legjobb ár:</label><input class="base"  type="text" id="4l_price" name="4l_price"><br>
                        </td>
                        <td class="smallpic">
                            <label for="4r_title" class="offer">Cím:</label><input class="base"  type="text" id="4r_title" name="4r_title"><br>
                            <label for="4r_subtitle" class="offer">Alcím:</label><input class="base"  type="text" id="4r_subtitle" name="4r_subtitle"><br>
                            <label for="4r_text" class="offer" >Leírás:</label><textarea rows="6" cols="35" id="4r-text" name="4r_text" form="travelo_nl_edit"></textarea><br>
                            <label for="4r_pic" class="offer" >Kép név:</label><input class="base"  type="file" id="4r_pic" name="4r_pic"><br>
                            <label for="4r_link" class="offer" >Link:</label><input class="base"  type="text" id="4r_link" name="4r_link"><br>
                            <label for="4r_analytics" class="offer" >Analytics:</label><input class="base"  type="text" id="4r_analytics" name="4r_analytics"><br>
                            <label for="4r_price" class="offer" >Legjobb ár:</label><input class="base" type="text" id="4r_price" name="4r_price"><br>
                        </td>
                    </tr>
                    <tr>
                        <td class="smallpic">
                            <input type="checkbox" name="5ok"> 5. sor
                        </td>
                        <td class="smallpic">
                            <label for="5l_title" class="offer">Cím:</label><input class="base"  type="text" id="5l_title" name="5l_title"><br>
                            <label for="5l_subtitle" class="offer">Alcím:</label><input class="base"  type="text" id="5l_subtitle" name="5l_subtitle"><br>
                            <label for="5l_text" class="offer" >Leírás:</label><textarea rows="6" cols="35" id="5l-text" name="5l_text" form="travelo_nl_edit"></textarea><br>
                            <label for="5l_pic" class="offer" >Kép név:</label><input class="base"  type="file" id="5l_pic" name="5l_pic"><br>
                            <label for="5l_link" class="offer" >Link:</label><input class="base"  type="text" id="5l_link" name="5l_link"><br>
                            <label for="5l_analytics" class="offer" >Analytics:</label><input class="base"  type="text" id="5l_analytics" name="5l_analytics"><br>
                            <label for="5l_price" class="offer" >Legjobb ár:</label><input class="base"  type="text" id="5l_price" name="5l_price"><br>
                        </td>
                        <td class="smallpic">
                            <label for="5r_title" class="offer">Cím:</label><input class="base"  type="text" id="5r_title" name="5r_title"><br>
                            <label for="5r_subtitle" class="offer">Alcím:</label><input class="base"  type="text" id="5r_subtitle" name="5r_subtitle"><br>
                            <label for="5r_text" class="offer" >Leírás:</label><textarea rows="6" cols="35" id="5r-text" name="5r_text" form="travelo_nl_edit"></textarea><br>
                            <label for="5r_pic" class="offer" >Kép név:</label><input class="base"  type="file" id="5r_pic" name="5r_pic"><br>
                            <label for="5r_link" class="offer" >Link:</label><input class="base"  type="text" id="5r_link" name="5r_link"><br>
                            <label for="5r_analytics" class="offer" >Analytics:</label><input class="base"  type="text" id="5r_analytics" name="5r_analytics"><br>
                            <label for="5r_price" class="offer" >Legjobb ár:</label><input class="base" type="text" id="5r_price" name="5r_price"><br>
                        </td>
                    </tr>
                </table>
            </fieldset>
        </fieldset>
        <div id="submit">
        <input id="submit" type="submit" value="Hírlevél készítése"><br>
        </div>
    </form>
<!--<script type="text/javascript">
	$('form').quickValidate();
</script>-->
    </div>
EOT;
}

function lifeEdit($travelo, $id) {
    $s1ok = $s2ok = $s3ok = $s4ok = $s5ok = $most_recent_1c_ok = $most_recent_2c_ok = $article_ok = $t_b = $b_sz = $t_sz = "";
    if ($travelo['1ok'] != NULL) {
        $s1ok = "checked";
    }
    if ($travelo['2ok'] != NULL) {
        $s2ok = "checked";
    }
    if ($travelo['3ok'] != NULL) {
        $s3ok = "checked";
    }
    if ($travelo['4ok'] != NULL) {
        $s4ok = "checked";
    }
    if ($travelo['5ok'] != NULL) {
        $s5ok = "checked";
    }

    echo <<<EOT
    <h1> Life hírlevél módosítása </h1>
            <div id="main">
                <form action="life_updateDb.php" method="post" id="travelo_nl_edit" accept-charset="UTF-8">
        <fieldset>
            <legend>Alapadatok</legend>
            <span class="error">*</span><label class="base" for="sendingdate">Küldés dátuma:</label><input class="quickValidate"  type="text" name="sendingdate" id="sendingdate"  value="{$travelo['sendingdate']}" data-validate="required" data-name="Küldés dátuma "><br>
            <span class="error">*</span><label class="base" for="folder">Alap mappa:</label><input class="quickValidate"  type="text" name="folder" id="folder" value="{$travelo['folder']}" data-validate="required"><span class="help"> Pl.: http://stuff.szallas.travelo.hu/hirlevel/20140101</span><br>
        </fieldset>
        <fieldset>
            <legend>Analytics kódok</legend>
            <span class="error">*</span><label class="base" for="analytics_source">Source:</label><input class="quickValidate"  type="text" id="analytics_source" name="analytics_source" value="{$travelo['analytics_source']}" data-validate="required"><br>
            <span class="error">*</span><label class="base" for="analytics_medium"> Medium:</label><input class="quickValidate"  type="text" id="analytics_medium" name="analytics_medium" value="{$travelo['analytics_medium']}" data-validate="required"><br>
        </fieldset>
        <fieldset>
            <legend>Menü</legend>
            <table border="0">
                <tr>
                    <td class="menu">
                        1. hely:<br>
                        <span class="error">*</span><label for="menu1" class="menu">Felirat:</label> <input class="menu" type="text" name="menu1" id="menu1" value="{$travelo['menu1']}" data-validate="required"><br>
                        <span class="error">*</span><label for="menu1_link" class="menu">Link:</label> <input class="menu" type="text" name="menu1_link" id="menu1_link" value="{$travelo['menu1_link']}" data-validate="required"><br>
                        <span class="error">*</span><label for="menu1_analytics" class="menu">Analytics:</label> <input class="menu" type="text" name="menu1_analytics" value="{$travelo['menu1_analytics']}" data-validate="required"><br>
                    </td>
                    <td class="menu">
                        2. hely:<br>
                        <span class="error">*</span><label for="menu2" class="menu">Felirat:</label> <input class="menu" type="text" name="menu2" id="menu2" value="{$travelo['menu2']}" data-validate="required"><br>
                        <span class="error">*</span><label for="menu2_link" class="menu">Link:</label> <input class="menu" type="text" name="menu2_link" id="menu2_link" value="{$travelo['menu2_link']}" data-validate="required"><br>
                        <span class="error">*</span><label for="menu2_analytics" class="menu">Analytics:</label> <input class="menu" type="text" name="menu2_analytics" value="{$travelo['menu2_analytics']}" data-validate="required"><br>
                    </td>
                    <td class="menu">
                        3. hely:<br>
                        <span class="error">*</span><label for="menu3" class="menu">Felirat:</label> <input class="menu" type="text" name="menu3" id="menu3" value="{$travelo['menu3']}" data-validate="required"><br>
                        <span class="error">*</span><label for="menu3_link" class="menu">Link:</label> <input class="menu" type="text" name="menu3_link" id="menu3_link" value="{$travelo['menu3_link']}" data-validate="required"><br>
                        <span class="error">*</span><label for="menu3_analytics" class="menu">Analytics:</label> <input class="menu" type="text" name="menu3_analytics" value="{$travelo['menu3_analytics']}" data-validate="required"><br>                    </td>
                    <td class="menu">
                        4. hely:<br>
                        <span class="error">*</span><label for="menu4" class="menu">Felirat:</label> <input class="menu" type="text" name="menu4" id="menu4" value="{$travelo['menu4']}" data-validate="required"><br>
                        <span class="error">*</span><label for="menu4_link" class="menu">Link:</label> <input class="menu" type="text" name="menu4_link" id="menu4_link" value="{$travelo['menu4_link']}" data-validate="required"><br>
                        <span class="error">*</span><label for="menu4_analytics" class="menu">Analytics:</label> <input class="menu" type="text" name="menu4_analytics" value="{$travelo['menu4_analytics']}" data-validate="required"><br>
                    </td>
                 </tr>
            </table>
        </fieldset>
        <fieldset>
            <legend>Ajánlatok</legend>
            <div class="sc">
                <fieldset class="sc">
                    <legend>Nagyképes</legend>
                    <span class="error">*</span><label class="offer" for="bp_title">Cím:</label><input class="quickValidate"  type="text" name="bp_title" id="bp_title" value="{$travelo['bp_title']}" data-validate="required"><br>
                    <span class="error">*</span><label class="offer" for="bp_text">Leírás:</label><textarea rows="6" cols="35" class="quickValidate" id="bp_text" name="bp_text" form="travelo_nl_edit" data-validate="required">{$travelo['bp_text']}</textarea><br>
                    <span class="error">*</span><label class="offer" for="bp_pic">Kép név:</label><input class="quickValidate"  type="text" name="bp_pic" id="bp_pic" value="{$travelo['bp_pic']}" data-validate="required"><br>
                    <span class="error">*</span><label class="offer" for="bp_link">Link:</label><input class="quickValidate"  type="text" name="bp_link" value="{$travelo['bp_link']}" data-validate="required"><br>
                    <span class="error">*</span><label class="offer" for="bp_analytics">Analytics:</label><input class="quickValidate"  type="text" id="bp_analytics" name="bp_analytics" value="{$travelo['bp_analytics']}" data-validate="required"><br>
                    <span class="error">*</span><label class="offer" for="bp_price">Legjobb ár:</label><input class="quickValidate"  type="text" id="bp_price" name="bp_price" value="{$travelo['bp_price']}" data-validate="required"><br>
                </fieldset>
            </div>

            <fieldset class="dc">
                <legend>Kisképesek</legend>
                <table>
                    <tr>
                        <th>&nbsp;</th>
                        <th>Bal</th>
                        <th>Jobb</th>
                    </tr>
                    <tr>
                        <td class="checkbox">
                            <input type="checkbox" id="1ok" name="1ok" $s1ok><label class="checkbox" for="1ok"> 1. sor</label>
                        </td>
                        <td class="smallpic">
                            <label for="1l_title" class="offer">Cím:</label><input class="base"  type="text" id="1l_title" name="1l_title" value="{$travelo['1l_title']}"><br>
                            <label for="1l_subtitle" class="offer">Alcím:</label><input class="base"  type="text" id="1l_subtitle" name="1l_subtitle" value="{$travelo['1l_subtitle']}"><br>
                            <label for="1l_text" class="offer" >Leírás:</label><textarea rows="6" cols="35" id="1l-text" name="1l_text" form="travelo_nl_edit">{$travelo['1l_text']}</textarea><br>
                            <label for="1l_pic" class="offer" >Kép név:</label><input class="base"  type="text" id="1l_pic" name="1l_pic" value="{$travelo['1l_pic']}"><br>
                            <label for="1l_link" class="offer" >Link:</label><input class="base"  type="text" id="1l_link" name="1l_link" value="{$travelo['1l_link']}"><br>
                            <label for="1l_analytics" class="offer" >Analytics:</label><input class="base"  type="text" id="1l_analytics" name="1l_analytics" value="{$travelo['1l_analytics']}"><br>
                            <label for="1l_price" class="offer" >Legjobb ár:</label><input class="base"  type="text" id="1l_price" name="1l_price" value="{$travelo['1l_price']}"><br>
                        </td>
                        <td class="smallpic">
                            <label for="1r_title" class="offer">Cím:</label><input class="base"  type="text" id="1r_title" name="1r_title" value="{$travelo['1r_title']}"><br>
                            <label for="1r_subtitle" class="offer">Alcím:</label><input class="base"  type="text" id="1r_subtitle" name="1r_subtitle" value="{$travelo['1r_subtitle']}"><br>
                            <label for="1r_text" class="offer" >Leírás:</label><textarea rows="6" cols="35" id="1r_text" name="1r_text" form="travelo_nl_edit">{$travelo['1r_text']}</textarea><br>
                            <label for="1r_pic" class="offer" >Kép név:</label><input class="base"  type="text" id="1r_pic" name="1r_pic" value="{$travelo['1r_pic']}"><br>
                            <label for="1r_link" class="offer" >Link:</label><input class="base"  type="text" id="1r_link" name="1r_link" value="{$travelo['1r_link']}"><br>
                            <label for="1r_analytics" class="offer" >Analytics:</label><input class="base"  type="text" id="1r_analytics" name="1r_analytics" value="{$travelo['1r_analytics']}"><br>
                            <label for="1r_price" class="offer" >Legjobb ár:</label><input class="base"  type="text" id="1r_price" name="1r_price" value="{$travelo['1r_price']}"><br>
                        </td>
                    </tr>
                    <tr>
                        <td class="checkbox">
                            <input type="checkbox" name="2ok" $s2ok> 2. sor
                        </td>
                        <td class="smallpic">
                            <label for="2l_title" class="offer">Cím:</label><input class="base"  type="text" id="2l_title" name="2l_title" value="{$travelo['2l_title']}"><br>
                            <label for="2l_subtitle" class="offer">Alcím:</label><input class="base"  type="text" id="2l_subtitle" name="2l_subtitle" value="{$travelo['2l_subtitle']}"><br>
                            <label for="2l_text" class="offer" >Leírás:</label><textarea rows="6" cols="35" id="2l-text" name="2l_text" form="travelo_nl_edit">{$travelo['2l_text']}</textarea><br>
                            <label for="2l_pic" class="offer" >Kép név:</label><input class="base"  type="text" id="2l_pic" name="2l_pic" value="{$travelo['2l_pic']}"><br>
                            <label for="2l_link" class="offer" >Link:</label><input class="base"  type="text" id="2l_link" name="2l_link" value="{$travelo['2l_link']}"><br>
                            <label for="2l_analytics" class="offer" >Analytics:</label><input class="base"  type="text" id="2l_analytics" name="2l_analytics" value="{$travelo['2l_analytics']}"><br>
                            <label for="2l_price" class="offer" >Legjobb ár:</label><input class="base"  type="text" id="2l_price" name="2l_price" value="{$travelo['2l_price']}"><br>
                        </td>
                        <td class="smallpic">
                            <label for="2r_title" class="offer">Cím:</label><input class="base"  type="text" id="2r_title" name="2r_title" value="{$travelo['2r_title']}"><br>
                            <label for="2r_subtitle" class="offer">Alcím:</label><input class="base"  type="text" id="2r_subtitle" name="2r_subtitle" value="{$travelo['2r_subtitle']}"><br>
                            <label for="2r_text" class="offer" >Leírás:</label><textarea rows="6" cols="35" id="2r_text" name="2r_text" form="travelo_nl_edit">{$travelo['2r_text']}</textarea><br>
                            <label for="2r_pic" class="offer" >Kép név:</label><input class="base"  type="text" id="2r_pic" name="2r_pic" value="{$travelo['2r_pic']}"><br>
                            <label for="2r_link" class="offer" >Link:</label><input class="base"  type="text" id="2r_link" name="2r_link" value="{$travelo['2r_link']}"><br>
                            <label for="2r_analytics" class="offer" >Analytics:</label><input class="base"  type="text" id="2r_analytics" name="2r_analytics" value="{$travelo['2r_analytics']}"><br>
                            <label for="2r_price" class="offer" >Legjobb ár:</label><input class="base"  type="text" id="2r_price" name="2r_price" value="{$travelo['2r_price']}"><br>
                        </td>
                    </tr>
                    <tr>
                        <td class="checkbox">
                            <input type="checkbox" name="3ok" $s3ok> 3. sor
                        </td>
                        <td class="smallpic">
                            <label for="3l_title" class="offer">Cím:</label><input class="base"  type="text" id="3l_title" name="3l_title" value="{$travelo['3l_title']}"><br>
                            <label for="3l_subtitle" class="offer">Alcím:</label><input class="base"  type="text" id="3l_subtitle" name="3l_subtitle" value="{$travelo['3l_subtitle']}"><br>
                            <label for="3l_text" class="offer" >Leírás:</label><textarea rows="6" cols="35" id="3l-text" name="3l_text" form="travelo_nl_edit">{$travelo['3l_text']}</textarea><br>
                            <label for="3l_pic" class="offer" >Kép név:</label><input class="base"  type="text" id="3l_pic" name="3l_pic" value="{$travelo['3l_pic']}"><br>
                            <label for="3l_link" class="offer" >Link:</label><input class="base"  type="text" id="3l_link" name="3l_link" value="{$travelo['3l_link']}"><br>
                            <label for="3l_analytics" class="offer" >Analytics:</label><input class="base"  type="text" id="3l_analytics" name="3l_analytics" value="{$travelo['3l_analytics']}"><br>
                            <label for="3l_price" class="offer" >Legjobb ár:</label><input class="base"  type="text" id="3l_price" name="3l_price" value="{$travelo['3l_price']}"><br>
                        </td>
                        <td class="smallpic">
                            <label for="3r_title" class="offer">Cím:</label><input class="base"  type="text" id="3r_title" name="3r_title" value="{$travelo['3r_title']}"><br>
                            <label for="3r_subtitle" class="offer">Alcím:</label><input class="base"  type="text" id="3r_subtitle" name="3r_subtitle" value="{$travelo['3r_subtitle']}"><br>
                            <label for="3r_text" class="offer" >Leírás:</label><textarea rows="6" cols="35" id="3r-text" name="3r_text" form="travelo_nl_edit">{$travelo['3r_text']}</textarea><br>
                            <label for="3r_pic" class="offer" >Kép név:</label><input class="base"  type="text" id="3r_pic" name="3r_pic" value="{$travelo['3r_pic']}"><br>
                            <label for="3r_link" class="offer" >Link:</label><input class="base"  type="text" id="3r_link" name="3r_link" value="{$travelo['3r_link']}"><br>
                            <label for="3r_analytics" class="offer" >Analytics:</label><input class="base"  type="text" id="3r_analytics" name="3r_analytics" value="{$travelo['3r_analytics']}"><br>
                            <label for="3r_price" class="offer" >Legjobb ár:</label><input class="base"  type="text" id="3r_price" name="3r_price" value="{$travelo['3r_price']}"><br>
                        </td>
                    </tr>
                    <tr>
                        <td class="checkbox">
                            <input type="checkbox" name="4ok" $s4ok> 4. sor
                        </td>
                        <td class="smallpic">
                            <label for="4l_title" class="offer">Cím:</label><input class="base"  type="text" id="4l_title" name="4l_title" value="{$travelo['4l_title']}"><br>
                            <label for="4l_subtitle" class="offer">Alcím:</label><input class="base"  type="text" id="4l_subtitle" name="4l_subtitle" value="{$travelo['4l_subtitle']}"><br>
                            <label for="4l_text" class="offer" >Leírás:</label><textarea rows="6" cols="35" id="4l-text" name="4l_text" form="travelo_nl_edit">{$travelo['4l_text']}</textarea><br>
                            <label for="4l_pic" class="offer" >Kép név:</label><input class="base"  type="text" id="4l_pic" name="4l_pic" value="{$travelo['4l_pic']}"><br>
                            <label for="4l_link" class="offer" >Link:</label><input class="base"  type="text" id="4l_link" name="4l_link" value="{$travelo['4l_link']}"><br>
                            <label for="4l_analytics" class="offer" >Analytics:</label><input class="base"  type="text" id="4l_analytics" name="4l_analytics" value="{$travelo['4l_analytics']}"><br>
                            <label for="4l_price" class="offer" >Legjobb ár:</label><input class="base"  type="text" id="4l_price" name="4l_price" value="{$travelo['4l_price']}"><br>
                        </td>
                        <td class="smallpic">
                            <label for="4r_title" class="offer">Cím:</label><input class="base"  type="text" id="4r_title" name="4r_title" value="{$travelo['4r_title']}"><br>
                            <label for="4r_subtitle" class="offer">Alcím:</label><input class="base"  type="text" id="4r_subtitle" name="4r_subtitle" value="{$travelo['4r_subtitle']}"><br>
                            <label for="4r_text" class="offer" >Leírás:</label><textarea rows="6" cols="35" id="4r-text" name="4r_text" form="travelo_nl_edit">{$travelo['4r_text']}</textarea><br>
                            <label for="4r_pic" class="offer" >Kép név:</label><input class="base"  type="text" id="4r_pic" name="4r_pic" value="{$travelo['4r_pic']}"><br>
                            <label for="4r_link" class="offer" >Link:</label><input class="base"  type="text" id="4r_link" name="4r_link" value="{$travelo['4r_link']}"><br>
                            <label for="4r_analytics" class="offer" >Analytics:</label><input class="base"  type="text" id="4r_analytics" name="4r_analytics" value="{$travelo['4r_analytics']}"><br>
                            <label for="4r_price" class="offer" >Legjobb ár:</label><input class="base"  type="text" id="4r_price" name="4r_price" value="{$travelo['4r_price']}"><br>
                        </td>
                    </tr>
                    <tr>
                        <td class="smallpic">
                            <input type="checkbox" name="5ok" $s5ok> 5. sor
                        </td>
                        <td class="smallpic">
                           <label for="5l_title" class="offer">Cím:</label><input class="base"  type="text" id="5l_title" name="5l_title" value="{$travelo['5l_title']}"><br>
                            <label for="5l_subtitle" class="offer">Alcím:</label><input class="base"  type="text" id="5l_subtitle" name="5l_subtitle" value="{$travelo['5l_subtitle']}"><br>
                            <label for="5l_text" class="offer" >Leírás:</label><textarea rows="6" cols="35" id="5l-text" name="5l_text" form="travelo_nl_edit">{$travelo['5l_text']}</textarea><br>
                            <label for="5l_pic" class="offer" >Kép név:</label><input class="base"  type="text" id="5l_pic" name="5l_pic" value="{$travelo['5l_pic']}"><br>
                            <label for="5l_link" class="offer" >Link:</label><input class="base"  type="text" id="5l_link" name="5l_link" value="{$travelo['5l_link']}"><br>
                            <label for="5l_analytics" class="offer" >Analytics:</label><input class="base"  type="text" id="5l_analytics" name="5l_analytics" value="{$travelo['5l_analytics']}"><br>
                            <label for="5l_price" class="offer" >Legjobb ár:</label><input class="base"  type="text" id="5l_price" name="5l_price" value="{$travelo['5l_price']}"><br>
                        </td>
                        <td class="smallpic">
                            <label for="5r_title" class="offer">Cím:</label><input class="base"  type="text" id="5r_title" name="5r_title" value="{$travelo['5r_title']}"><br>
                            <label for="5r_subtitle" class="offer">Alcím:</label><input class="base"  type="text" id="5r_subtitle" name="5r_subtitle" value="{$travelo['5r_subtitle']}"><br>
                            <label for="5r_text" class="offer" >Leírás:</label><textarea rows="6" cols="35" id="5r-text" name="5r_text" form="travelo_nl_edit">{$travelo['5r_text']}</textarea><br>
                            <label for="5r_pic" class="offer" >Kép név:</label><input class="base"  type="text" id="5r_pic" name="5r_pic" value="{$travelo['5r_pic']}"><br>
                            <label for="5r_link" class="offer" >Link:</label><input class="base"  type="text" id="5r_link" name="5r_link" value="{$travelo['5r_link']}"><br>
                            <label for="5r_analytics" class="offer" >Analytics:</label><input class="base"  type="text" id="5r_analytics" name="5r_analytics" value="{$travelo['5r_analytics']}"><br>
                            <label for="5r_price" class="offer" >Legjobb ár:</label><input class="base"  type="text" id="5r_price" name="5r_price" value="{$travelo['5r_price']}"><br>
                        </td>
                    </tr>
                </table>
            </fieldset>
        </fieldset>
        <input type="hidden" name="id" value="$id">                       
        <div id="submit">
        <input class="submit" id="submit" type="submit" value="Hírlevél módosítása"><br>
        </div>
    </form>
<script type="text/javascript">
	$('form').quickValidate();
</script>
    </div>
       
EOT;
}

function lifeTableStart() {
    echo <<<EOT
    <body style="background: #faf8f1; text-decoration:none; font-size: 14px; font-family: 'OpenSans',arial,helvetica,sans-serif;margin:0;padding:0">
        <table width="660" border="0" align="center" style="background: #faf8f1; width: 660px; font-family: 'OpenSans',arial,helvetica,sans-serif">
            <tbody>
EOT;
}

function lifeMenu($style, $travelo_menu) {
    echo <<<EOT
    <!--Menü-->
<tr>
    <td>
        <table  cellpadding="0" cellspacing="0" style="width:660px;margin:0 0 5px 0;">
            <tr>
                <td style={$style['travelo_header']}>{$style['travelo_logo']}</td>
                <td style={$style['travelo_menu']}>{$travelo_menu['1']}</td>
                <td style={$style['travelo_menu']}>{$travelo_menu['2']}</td>
                <td style={$style['travelo_menu']}>{$travelo_menu['3']}</td>
                <td style={$style['travelo_menu']}>{$travelo_menu['4']}</td>
            </tr>
        </table>
    </td>
</tr>
<!--Menü vége-->
EOT;
}

function lifeBigPic($travelo_bp) {
    echo <<<EOT
    <!--Nagyképes-->
<tr>
    <td style="background:#ffffff;">
        <table  cellpadding="0" cellspacing="0" style="width:625px;margin:15px 20px 15px 15px;">
            <!--Kép-->
            <tr>
                <td align="center">{$travelo_bp['pic']}</td>
            </tr>
            <tr>
                <td align="center" style="">
                    <table cellpadding="0" cellspacing="0" style="background:#f7f5ef;padding:10px 10px;width:625px;margin-left:0px;">
                        <!--Cím-->
                        <tr>
                            <td>{$travelo_bp['title']}</td>
                        </tr>
                        <!--Szöveg-->
                        <tr>
                            <td style="padding-top:5px;">{$travelo_bp['text']}</td>
                        </tr>                        
                    </table>
                </td>
            </tr>
        </table>
    </td>
</tr>
<!--Nagyképes vége-->
EOT;
}

function lifeSmallPic($smallpic) {
    echo <<<EOT
<tr>
    <td style="background:#ffffff">
        <table cellpadding="0" cellspacing="0" style="width:625px;margin:0 20px 20px 15px;" align="center">
            <tr>
                <!-- Bal-->
                <td style="width:305px;" align="center" valign="top">
                    <table cellpadding="0" cellspacing="0" align="center" style="width:305px;">
                        <!--Kép-->
                        <tr>
                            <td align="center">{$smallpic['l_pic']}</td>
                        </tr>
                        <tr>
                            <td align="center" style="padding: 0;width:305px;">
                                <table cellpadding="0" cellspacing="0" style="background:#f7f5ef;padding:5px 10px;margin-left:0px;width:305px;">
                                    <!--Cím-->
                                    <tr>
                                        <td>{$smallpic['l_title']}</td>
                                    </tr>
                                    <!--Alcím-->
                                    <tr>
                                        <td style="">{$smallpic['l_subtitle']}</td>
                                    </tr> 
                                    <!--Szöveg-->
                                    <tr>
                                        <td style="padding-top:4px;">{$smallpic['l_text']}</td>
                                    </tr>                        
                                </table>
                            </td>
                        </tr>
                    </table></td>
                <td style="width:15px;">&nbsp;</td>  
                <!--Jobb-->
                <td style="width:305px;" align="center" valign="top">
                    <table cellpadding="0" cellspacing="0" align="center" style="width:305px;">
                        <!--Kép-->
                        <tr>
                            <td align="center">{$smallpic['r_pic']}</td>
                        </tr>
                        <tr>
                            <td align="center" style="padding: 0;width:305px;">
                                <table cellpadding="0" cellspacing="0" style="background:#f7f5ef;padding:5px 10px;margin-left:0px;width:305px;">
                                    <!--Cím-->
                                    <tr>
                                        <td>{$smallpic['r_title']}</td>
                                    </tr>
                                    <!--Alcím--> 
                                    <tr>
                                        <td>{$smallpic['r_subtitle']}</td>
                                    </tr>                                         
                                    <!--Szöveg-->
                                    <tr>
                                        <td style="padding-top:4px;">{$smallpic['r_text']}</td>
                                    </tr>                        
                                </table>
                            </td>
                        </tr>
                    </table>                   
                </td>
            </tr>
        </table>
    </td>
</tr>
EOT;
}

function lifeLegalNotice($l_legal) {
    echo <<<EOT
    <tr>
    <td colspan="5" valign="top">
        <table cellpadding="0" cellspacing="0" width="100%" style="margin-top: 20px; background: #ffffff">
            <tr>
                <td style="padding: 20px; font-size:10px; color: #5d5d5d; text-align:center">$l_legal Kapcsolat: +36-20-492-99-29; <a href="mailto:life@travelo.hu" style="color: #ec006e; text-decoration:none">life@travelo.hu</a>
                </td>
            </tr>
        </table>
    </td>
</tr>
EOT;
}

function lifeOptimailFooter($l_opti1, $l_opti2, $l_opti3, $l_opti4) {
    global $newsletter;
    echo <<<EOT
    <!-- Optimail lablec ON -->
<tr>
    <td colspan="5">
        <table align="center" bgcolor="white" width="100%" style="margin-top: 20px; background: #ffffff">
            <tr>
                <td><table align="center" bgcolor="white" width="562">
                        <tr>
                            <td colspan="2" align="left" height="10" width="562"><img src="{$newsletter['picfolder']}/spacer1.gif" width="562" height="10" alt="" border="0"></td>
                        </tr>
                        <tr>
                            <td colspan="2" align="left" height="1" width="562"><img src="{$newsletter['picfolder']}/lablec_szaggatott.gif" width="562" height="1" alt="" border="0"></td>
                        </tr>
                        <tr>
                            <td colspan="2" align="left" valign="top" height="32"><img src="{$newsletter['picfolder']}/lablec_logo.gif" width="158" height="32" alt="" border="0"></td>
                        </tr>
                        <tr>
                            <td width="45"><img src="{openingLogger}" width="45" height="1" alt="" border="0"></td>
                            <td align="left" valign="top" style="font-family:Arial; color:#555555; font-size:11px; text-align: justify">$l_opti1 
                                {email} $l_opti2<a style="color:#7EC100;text-decoration:none" href="http://www.optimail.hu" target="_blank">www.optimail.hu</a> oldalon.<br>
                                $l_opti3<a href="{unsubscribeUrl}" style="color:#7EC100; text-decoration:none" target="_blank">ide</a>. <br>
                                $l_opti4
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" align="left" height="1" width="562"><img src="{$newsletter['picfolder']}/lablec_szaggatott.gif" width="562" height="1" alt="" border="0"></td>
                        </tr>
                        <tr>
                            <td colspan="2" align="left" height="10" width="562"><img src="{$newsletter['picfolder']}/spacer1.gif" width="562" height="10" alt="" border="0"></td>
                        </tr>
                    </table></td>
            </tr>
        </table>

    </td>
</tr>
<!-- Optimail lablec OFF -->'
EOT;
}

function lifeTableEnd() {
    echo '</table>';
}

function wordCloud($picfolder) {
    echo <<<EOT
<div id="wordcloud">
    <img src="$picfolder/wordcloud.png"></img>
</div>

EOT;
}

function addUser() {
    echo <<<EOT
<div id="loginform">
<form action="add.php" method="post">
	<fieldset>
		<legend>Új felhasználó</legend>
		<label for="user">Felahsználónév</label>
		<input type="text" id="user" name="user"><br>
		<label for="fullname">Teljes név</label>
		<input type="text" id="fullname" name="fullname"><br>
		<label for="pass">Jelszó</label>
		<input type="password" id="pass" name="pass"><br>
		<label for="pass2">Jelszó újra</label>
		<input type="password" id="pass2" name="pass2"><br>
		<input id="submit2" type="submit" value="Hozzáad">
</fieldset>
</form>
</div>
EOT;
}

function loginUser() {
    echo <<<EOT
<div id="loginform">
<form action="auth.php" method="post">
	<fieldset>
		<legend>Belépés</legend>
		<label for="user">Felahsználónév</label>
		<input type="text" id="user" name="user"><br>
		<label for="pass">Jelszó</label>
		<input type="password" id="pass" name="pass"><br>
		<input id="submit2" type="submit" value="Belépés">
</fieldset>
</form>
</div>

EOT;
}

function nlInput($action, $selector, $selector_err) {
    $tchecked = $lchecked = $lochecked = "";
    if (isset($selector) && ($selector == 'travelo')) {
        $tchecked = 'checked="checked"';
    }
    if (isset($selector) && ($selector == 'life')) {
        $lchecked = 'checked="checked"';
    }
    if (isset($selector) && ($selector == 'lifeop')) {
        $lochecked = 'checked="checked"';
    }
    echo <<<EOT
<form method="post" action="$action">
        <fieldset>
            <legend>Hírlevél választása</legend>
            <table class="sc">
                <tr>
                    <td class="select" colspan="3">
                        <input type="radio" id="travelo" name="selector" value="travelo" $tchecked><label class="selector" for="travelo"> Travelo heti hírlevél</label>
                        <span class="error">*</span>
                    </td>
                    <td class="select" colspan="3">
                        <input type="radio" id="life" name="selector" value="life" $lchecked><label class="selector" for="life"> Life EDM</label>  
                        <span class="error">*</span>
                    </td>
                    <td class="select" colspan="3">
                        <input type="radio" id="lifeop" name="selector" value="lifeop" $lochecked><label class="selector" for="lifeop"> Life EDM Egyetlen képpel</label>  
                        <span class="error">*</span>
                    </td>
                </tr>
                <tr>
                    <td class="select" colspan="9">
                        <span class="error">$selector_err</span><br>
                        <input id="submit" type="submit" value="Típus választása"><br>
                    </td>
                </tr>
            </table>
        </fieldset>
    </form>
EOT;
}

function lifeOnepic($travelo_bp) {
    $string = "Megnézem";
    echo <<<EOT
<!--Nagykepes-->
                <tr>
                    <td style="background:#ffffff;">
                        <table  cellpadding="0" cellspacing="0" style="width:625px;margin:15px 20px 15px 15px;">
                            <!--Kep-->
                            <tr>
                                <td align="center">{$travelo_bp['pic']}</td>
                            </tr>
                            <tr>
                                <td align="center" style="">
                                    <table cellpadding="0" cellspacing="0" style="background:#f7f5ef;padding:10px 10px;width:625px;margin-left:0px;">
                                        <!--Cim-->
                                        <tr>
                                            <td style="text-align:center;">{$travelo_bp['title']}</td>
                                        </tr>
                                        <!--Szoveg-->
                                        <tr>
                                            <td style="padding-top:35px; text-align:center;">{$travelo_bp['text']}</td>
                                        </tr>
                                        <tr>
                                        <td align="center" style="padding-top:35px;">
                                        <div style= "width: 200px; height:50px; 
                                            background-color: #e60f71; 
                                            text-align: center; padding-top:17px; 
                                            border-radius:5px; 
                                            box-shadow: 5px 5px 5px #888888; 
                                            border: solid 1px #fff;"> 
                                        <a style="font-family:'OpenSans',arial,helvetica,sans-serif; 
                                            font-size:22px; color:#fff; 
                                            font-weight:bold; text-decoration:none;" 
                                            href="{$travelo_bp['link']}">Megn&eacute;zem</a>
                                        </td>
                                        </tr>                     
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <!--Nagykepes vege-->    
EOT;
}

function lifeInputOnepic() {
    echo <<<EOT
   <div id="main"> 
   <form action="life_onepic_inputDb.php" method="post" id="travelo_nl_edit" accept-charset="UTF-8">
        <fieldset>
            <legend>Alapadatok</legend>
            <span class="error">*</span><label class="base" for="sendingdate">Küldés dátuma:</label><input class="quickValidate"  type="text" name="sendingdate" id="sendingdate" data-validate="required" data-name="Küldés dátuma "><br>
            <span class="error">*</span><label class="base" for="folder">Alap mappa:</label><input class="quickValidate"  type="text" name="folder" id="folder" data-validate="required"><br>
        </fieldset>
        <fieldset>
            <legend>Analytics kódok</legend>
            <span class="error">*</span><label class="base" for="analytics_source">Source:</label><input class="quickValidate"  type="text" id="analytics_source" name="analytics_source" data-validate="required"><br>
            <span class="error">*</span><label class="base" for="analytics_medium"> Medium:</label><input class="quickValidate"  type="text" id="analytics_medium" name="analytics_medium" data-validate="required"><br>
        </fieldset>
        <fieldset>
            <legend>Menü</legend>
            <table border="0">
                <tr>
                    <td class="menu">
                        1. hely:<br>
                        <span class="error">*</span><label for="menu1" class="menu">Felirat:</label> <input class="menu" type="text" name="menu1" id="menu1" data-validate="required"><br>
                        <span class="error">*</span><label for="menu1_link" class="menu">Link:</label> <input class="menu" type="text" name="menu1_link" id="menu1_link" data-validate="required"><br>
                        <span class="error">*</span><label for="menu1_analytics" class="menu">Analytics:</label> <input class="menu" type="text" name="menu1_analytics" data-validate="required"><br>
                    </td>
                    <td class="menu">
                        2. hely:<br>
                        <span class="error">*</span><label for="menu2" class="menu">Felirat:</label> <input class="menu" type="text" name="menu2" id="menu2" data-validate="required"><br>
                        <span class="error">*</span><label for="menu2_link" class="menu">Link:</label> <input class="menu" type="text" name="menu2_link" id="menu2_link" data-validate="required"><br>
                        <span class="error">*</span><label for="menu2_analytics" class="menu">Analytics:</label> <input class="menu" type="text" name="menu2_analytics" data-validate="required"><br>
                    </td>
                    <td class="menu">
                        3. hely:<br>
                        <span class="error">*</span><label for="menu3" class="menu">Felirat:</label> <input class="menu" type="text" name="menu3" id="menu3" data-validate="required"><br>
                        <span class="error">*</span><label for="menu3_link" class="menu">Link:</label> <input class="menu" type="text" name="menu3_link" id="menu3_link" data-validate="required"><br>
                        <span class="error">*</span><label for="menu3_analytics" class="menu">Analytics:</label> <input class="menu" type="text" name="menu3_analytics" data-validate="required"><br>
                    </td>
                    <td class="menu">
                        4. hely:<br>
                        <span class="error">*</span><label for="menu4" class="menu">Felirat:</label><input class="menu" type="text" name="menu4" id="menu4" data-validate="required"><br>
                        <span class="error">*</span><label for="menu4_link" class="menu">Link:</label> <input class="menu" type="text" name="menu4_link" id="menu4_link" data-validate="required"><br>
                        <span class="error">*</span><label for="menu4_analytics" class="menu">Analytics:</label> <input class="menu" type="text" name="menu4_analytics" data-validate="required"><br>
                    </td>
               </tr>
            </table>
        </fieldset>
        <fieldset>
            <legend>Ajánlatok</legend>
            <div class="sc">
                <fieldset class="sc">
                    <legend>Nagyképes</legend>
                    <span class="error">*</span><label class="offer" for="bp_title">Cím:</label><input class="quickValidate"  type="text" name="bp_title" id="bp_title" data-validate="required"><br>
                    <span class="error">*</span><label class="offer" for="bp_text">Leírás:</label><textarea rows="6" cols="35" class="quickValidate" id="bp_text" name="bp_text" form="travelo_nl_edit" data-validate="required"></textarea><br>
                    <span class="error">*</span><label class="offer" for="bp_pic">Kép név:</label><input class="quickValidate"  type="text" name="bp_pic" id="bp_pic" data-validate="required"><br>
                    <span class="error">*</span><label class="offer" for="bp_link">Link:</label><input class="quickValidate"  type="text" name="bp_link" data-validate="required"><br>
                    <span class="error">*</span><label class="offer" for="bp_analytics">Analytics:</label><input class="quickValidate"  type="text" id="bp_analytics" name="bp_analytics" data-validate="required"><br>
                    <span class="error">*</span><label class="offer" for="bp_price">Legjobb ár:</label><input class="quickValidate"  type="text" id="bp_price" name="bp_price" data-validate="required"><br>
                </fieldset>
            </div>
        </fieldset>
        <div id="submit">
        <input id="submit" type="submit" value="Hírlevél készítése"><br>
        </div>
    </form>
<script type="text/javascript">
	$('form').quickValidate();
</script>
    </div>
EOT;
}

function lifeOpEdit($travelo, $id) {
    echo <<<EOT
    <h1> Life hírlevél módosítása </h1>
            <div id="main">
                <form action="life_onepic_updateDb.php" method="post" id="travelo_nl_edit" accept-charset="UTF-8">
        <fieldset>
            <legend>Alapadatok</legend>
            <span class="error">*</span><label class="base" for="sendingdate">Küldés dátuma:</label><input class="quickValidate"  type="text" name="sendingdate" id="sendingdate"  value="{$travelo['sendingdate']}" data-validate="required" data-name="Küldés dátuma "><br>
            <span class="error">*</span><label class="base" for="folder">Alap mappa:</label><input class="quickValidate"  type="text" name="folder" id="folder" value="{$travelo['folder']}" data-validate="required"><span class="help"> Pl.: http://stuff.szallas.travelo.hu/hirlevel/20140101</span><br>
        </fieldset>
        <fieldset>
            <legend>Analytics kódok</legend>
            <span class="error">*</span><label class="base" for="analytics_source">Source:</label><input class="quickValidate"  type="text" id="analytics_source" name="analytics_source" value="{$travelo['analytics_source']}" data-validate="required"><br>
            <span class="error">*</span><label class="base" for="analytics_medium"> Medium:</label><input class="quickValidate"  type="text" id="analytics_medium" name="analytics_medium" value="{$travelo['analytics_medium']}" data-validate="required"><br>
        </fieldset>
        <fieldset>
            <legend>Menü</legend>
            <table border="0">
                <tr>
                    <td class="menu">
                        1. hely:<br>
                        <span class="error">*</span><label for="menu1" class="menu">Felirat:</label> <input class="menu" type="text" name="menu1" id="menu1" value="{$travelo['menu1']}" data-validate="required"><br>
                        <span class="error">*</span><label for="menu1_link" class="menu">Link:</label> <input class="menu" type="text" name="menu1_link" id="menu1_link" value="{$travelo['menu1_link']}" data-validate="required"><br>
                        <span class="error">*</span><label for="menu1_analytics" class="menu">Analytics:</label> <input class="menu" type="text" name="menu1_analytics" value="{$travelo['menu1_analytics']}" data-validate="required"><br>
                    </td>
                    <td class="menu">
                        2. hely:<br>
                        <span class="error">*</span><label for="menu2" class="menu">Felirat:</label> <input class="menu" type="text" name="menu2" id="menu2" value="{$travelo['menu2']}" data-validate="required"><br>
                        <span class="error">*</span><label for="menu2_link" class="menu">Link:</label> <input class="menu" type="text" name="menu2_link" id="menu2_link" value="{$travelo['menu2_link']}" data-validate="required"><br>
                        <span class="error">*</span><label for="menu2_analytics" class="menu">Analytics:</label> <input class="menu" type="text" name="menu2_analytics" value="{$travelo['menu2_analytics']}" data-validate="required"><br>
                    </td>
                    <td class="menu">
                        3. hely:<br>
                        <span class="error">*</span><label for="menu3" class="menu">Felirat:</label> <input class="menu" type="text" name="menu3" id="menu3" value="{$travelo['menu3']}" data-validate="required"><br>
                        <span class="error">*</span><label for="menu3_link" class="menu">Link:</label> <input class="menu" type="text" name="menu3_link" id="menu3_link" value="{$travelo['menu3_link']}" data-validate="required"><br>
                        <span class="error">*</span><label for="menu3_analytics" class="menu">Analytics:</label> <input class="menu" type="text" name="menu3_analytics" value="{$travelo['menu3_analytics']}" data-validate="required"><br>                    </td>
                    <td class="menu">
                        4. hely:<br>
                        <span class="error">*</span><label for="menu4" class="menu">Felirat:</label> <input class="menu" type="text" name="menu4" id="menu4" value="{$travelo['menu4']}" data-validate="required"><br>
                        <span class="error">*</span><label for="menu4_link" class="menu">Link:</label> <input class="menu" type="text" name="menu4_link" id="menu4_link" value="{$travelo['menu4_link']}" data-validate="required"><br>
                        <span class="error">*</span><label for="menu4_analytics" class="menu">Analytics:</label> <input class="menu" type="text" name="menu4_analytics" value="{$travelo['menu4_analytics']}" data-validate="required"><br>
                    </td>
                 </tr>
            </table>
        </fieldset>
        <fieldset>
            <legend>Ajánlatok</legend>
            <div class="sc">
                <fieldset class="sc">
                    <legend>Nagyképes</legend>
                    <span class="error">*</span><label class="offer" for="bp_title">Cím:</label><input class="quickValidate"  type="text" name="bp_title" id="bp_title" value="{$travelo['bp_title']}" data-validate="required"><br>
                    <span class="error">*</span><label class="offer" for="bp_text">Leírás:</label><textarea rows="6" cols="35" class="quickValidate" id="bp_text" name="bp_text" form="travelo_nl_edit" data-validate="required">{$travelo['bp_text']}</textarea><br>
                    <span class="error">*</span><label class="offer" for="bp_pic">Kép név:</label><input class="quickValidate"  type="text" name="bp_pic" id="bp_pic" value="{$travelo['bp_pic']}" data-validate="required"><br>
                    <span class="error">*</span><label class="offer" for="bp_link">Link:</label><input class="quickValidate"  type="text" name="bp_link" value="{$travelo['bp_link']}" data-validate="required"><br>
                    <span class="error">*</span><label class="offer" for="bp_analytics">Analytics:</label><input class="quickValidate"  type="text" id="bp_analytics" name="bp_analytics" value="{$travelo['bp_analytics']}" data-validate="required"><br>
                    <span class="error">*</span><label class="offer" for="bp_price">Legjobb ár:</label><input class="quickValidate"  type="text" id="bp_price" name="bp_price" value="{$travelo['bp_price']}" data-validate="required"><br>
                </fieldset>
            </div>
      </fieldset>
        <input type="hidden" name="id" value="$id">                       
        <div id="submit">
        <input class="submit" id="submit" type="submit" value="Hírlevél módosítása"><br>
        </div>
    </form>
<script type="text/javascript">
	$('form').quickValidate();
</script>
    </div>
       
EOT;
}

?>