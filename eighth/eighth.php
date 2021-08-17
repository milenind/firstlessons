<?php
require 'DB.php';

$db = new DB();

$queryString = 'SELECT * FROM articles';
$res = $db->execute($queryString);
$sql1 = 'select text,name from articles';
$resLightQuery = $db->lightquery($sql1);
echo '<pre>';
foreach ($resLightQuery as $item) {
    echo 'Название статьи : ' . $item['name'] . '<br>' . $item['text'] . '<br>' . '<br>';
}

