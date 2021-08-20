<?php
require '../Models/DB.php';
$db = new DB();
$queryString2 = 'INSERT INTO image';
$res2 = $db->execute($queryString2);
$imgpath = $_POST['imgpath'];
$sql2 = "INSERT INTO image SET img='$imgpath'";
$resLightQuery2 = $db->lightquery($sql2);
header('Location:admin.php');

