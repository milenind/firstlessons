<?php
require '../eighth/DB.php';
$db = new DB();
$queryString2 = 'INSERT INTO singer';
$res2 = $db->execute($queryString2);
$name = $_POST['name'];
$descr = $_POST['description'];
$age = $_POST['age'];
$imgpath = $_POST['imgpath'];
$sql2 = "INSERT INTO singer SET name='$name',description='$descr',age='$age',imgpath='$imgpath'";
$resLightQuery2 = $db->lightquery($sql2);
header('Location:admin.php');
