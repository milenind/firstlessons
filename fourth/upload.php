<?php
$path = 'guestbook.txt';
$newRecord = $_POST['new_l'] . PHP_EOL;
$fw = fopen($path, 'a');
fwrite($fw, $newRecord);
fclose($fw);
$fo = fopen($path, 'r');
while (!feof($fo)) {
    $line = fgets($fo) . '<hr>';
    echo $line;
}
fclose($fo);
?>
<form action="fourth.php">
    <button>Запись успешно внесена</button>
</form>

