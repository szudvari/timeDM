<?php

require_once 'config.php';
require_once 'db.php';

function insertUserDb($userdata, $con) {
    $sql = "INSERT INTO  users (user ,pass ,fullname) values (\"{$userdata['user']}\", \"{$userdata['pass']}\", \"{$userdata['name']}\")";
    $res=mysql_query($sql, $con);
    if (!$res)
    {
        if (mysql_errno() == 1062){
            echo "<div id=\"notloggedin\">Ez a felhasználónév már foglalt.<br>"
            . "Válassz másikat!</div>";
        }
        else {
            echo mysql_errno().": ".mysql_error();
            exit();
        }
        header("Refresh: 2; url={$_SERVER['HTTP_REFERER']}");
        exit ();
    }
}

function authUserDb($userdata, $con) {
    $sql = "select user from users where user=\"{$userdata['user']}\" 
        and pass=\"{$userdata['pass']}\" and active=1";
    $res = mysql_query($sql, $con);
    if (!$res)
    {
        echo "Hiba a lekérdezés során!";
        exit();
    }

    if (mysql_num_rows($res) == 0)
    {
        return false;
    }
    else
    {
        return true;
    }
}
function getUserRole ($userdata) {
  $sql = "select role from users where user=\"{$userdata['user']}\";";
  $res = mysql_query($sql);
  if (!$res)
    {
        echo "A ($sql) kérdés futtatása sikertelen: " . mysql_error();
        exit;
    }

    if (mysql_num_rows($res) == 0)
    {
        echo "Nincs ilyen felhasználó";
        exit;
    }
  while ($row = mysql_fetch_assoc($res)) {
        $role = $row["role"];
  }
  return $role;
}
function notLoggedIn() {
    echo '<p id="notloggedin">A kért oldalmegtekintése bejelntkezéshez kötött.<br>'
    . 'Kérem, jelentkezzen be!<br>'
    . 'Amennyiben még nincs belépési azonosítója, keresse fel a rendszergazdát!</p>';
    echo '<p id="notloggedin"><a href="login.php">Bejelentkezés</a></p>';
}

function encodePass($clearPass) {
    $salt1 = "eldjh!er%vb+nv";
    $salt2 = "%fgdfgfd=4%dfsdf(";
    $saltedText = $salt1 . $clearPass . $salt2;
    $cryptedPass = hash("sha512", $saltedText);
    return $cryptedPass;
}

function allUser() {
    mysql_query("set names 'utf8'");
    mysql_query("set character set 'utf8'");
    $sql = "SELECT  `id` ,  `fullname` ,  `user` ,  `active` , `role` FROM  `users` where `id` > 1";
    $result = mysql_query($sql);
    $table = array();
    while ($row = mysql_fetch_assoc($result)) {
        $table[] = $row;
    }
    echo '<table id="results">';
    echo <<<EOT
   <th> ID </th>
   <th> Teljes név </th>
   <th> Login name </th>
   <th> Aktív </th>
   <th> Admin </th> 
   <th> Státusz módosítása  </th>
   <th> Admin rang kiosztása  </th>
   <th> Jelszó módosítás </th>
EOT;
    foreach ($table as $row) {
        echo '<tr>';
        foreach ($row as $value){
            switch ($value) {
                case "0": echo '<td style="background: red; font-weight: bold;">Nem</td>';
                    break;
                case "1": echo '<td style="background: green; font-weight: bold;">Igen</td>';
                    break;
                default: echo '<td>' . $value . '</td>';
                    break;
            }
        }
        if ($row['active'] == 1)
        {
            echo "<td><a id=\"alink\" href=\"update_ustatus.php?uid={$row['id']}"
            . "&status={$row['active']}\">User letiltása</a></td>";
        }
        else
        {
            echo "<td><a id=\"alink\" href=\"update_ustatus.php?uid={$row['id']}"
            . "&status={$row['active']}\">User aktiválása</a></td>";
        }
        if ($row['role'] == 1)
        {
            echo "<td><a id=\"alink\" href=\"update_astatus.php?uid={$row['id']}"
            . "&status={$row['role']}\">Admin jog megvonása</a></td>";
        }
        else
        {
            echo "<td><a id=\"alink\" href=\"update_astatus.php?uid={$row['id']}"
            . "&status={$row['role']}\">Admin jog kiosztása</a></td>";
        }
        echo "<td><a id=\"alink\" href=\"update_upassword.php?uid={$row['id']}\">Új jelszó megadása</a></td>";
        echo '</tr>';
    }
    echo '</table>';
}

function changeUserSatus($id, $status, $con) {
    switch ($status) {
        case "0":
            $sql = "UPDATE  `users` SET  `active` =  '1' WHERE  `users`.`id` =$id;";
            break;
        case "1":
            $sql = "UPDATE  `users` SET  `active` =  '0' WHERE  `users`.`id` =$id;";
            break;
    }
    $res = mysql_query($sql, $con);
    if (!$res)
    {
        die("Hiba:" . mysql_errno() . " - " . mysql_error());
    }
}
function changeAdminSatus($id, $status, $con) {
    switch ($status) {
        case "0":
            $sql = "UPDATE  `users` SET  `role` =  '1' WHERE  `users`.`id` =$id;";
            break;
        case "1":
            $sql = "UPDATE  `users` SET  `role` =  '0' WHERE  `users`.`id` =$id;";
            break;
    }
    $res = mysql_query($sql, $con);
    if (!$res)
    {
        die("Hiba:" . mysql_errno() . " - " . mysql_error());
    }
 }
function changeUserPassword($id, $password, $con) {
   $sql = "UPDATE  `users` SET  `pass` =  '$password' WHERE  `users`.`id` =$id;";
   $res = mysql_query($sql, $con);
    if (!$res)
    {
        die("Hiba:" . mysql_errno() . " - " . mysql_error());
    }
    return $res;
}
function getUserData ($id) {
    mysql_query("set names 'utf8'");
    mysql_query("set character set 'utf8'");
    $sql = "SELECT  `id` ,  `user` ,  `fullname` FROM  `users` WHERE  `id` =$id";
    $result = mysql_query($sql);
    $array = array();
    while ($row = mysql_fetch_assoc($result)) {
        $array = $row;
    }
    return $array;
}
function getUserId ($userdata) {
  $sql = "select id from users where user=\"{$userdata['user']}\";";
  $res = mysql_query($sql);
  if (!$res)
    {
        echo "A ($sql) kérdés futtatása sikertelen: " . mysql_error();
        exit;
    }

    if (mysql_num_rows($res) == 0)
    {
        echo "Nincs ilyen felhasználó";
        exit;
    }
  while ($row = mysql_fetch_assoc($res)) {
        $id = $row["id"];
  }
  return $id;
}