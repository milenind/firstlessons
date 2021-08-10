<?php
$path = '1.txt';
$new_l= $_POST['new_l'] ;
$fw=fopen($path,a);
fwrite($fw,$new_l);
fclose($fw);
$fo = fopen($path, 'r');
while (!feof($fo)) {
    $line = fgets($fo) . '<hr>';
    echo $line;
}
fclose($fo);
?>
<form action = "fourth.php" >
    <button>Запись успешно внесена</button>
</form>

