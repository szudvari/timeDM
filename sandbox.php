<?php
session_start();
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
print_r($travelo);
echo "<br>".$_SESSION['userid'];