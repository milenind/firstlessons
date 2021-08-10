<?php
$path = '1.txt';
$fo = fopen($path, 'r');
while (!feof($fo)) {
    $line = fgets($fo) . '<hr>';
    echo $line;
}
fclose($fo);
?>
<form method="post" action="upload.php" enctype="multipart/form-data">
    Введите новую запись!<br>
    <input type="text" name="new_l"/>
    <button type="submit" name="send">Отправить</button>
    ;
</form>
<?php


