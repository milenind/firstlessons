<?php

$path = '1.txt';
$fo = fopen($path, 'r');
while (!feof($fo)) {
    $line = fgets($fo) . '<br>';
    echo $line;
}
fclose($fo);
$fw = fopen($path,'a');
fwrite($fw,'Четвертая строка');
while (!feof($fw)) {
    $line = fgets($fw) . '<br>';
    echo $line;
}
?>g

