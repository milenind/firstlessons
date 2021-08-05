<?php
echo'1) тип данных,значение';
echo '<br>';
var_dump(2*2);
echo '<br>';
var_dump(3/1);
echo'<br>';
var_dump(1/3);
echo'<br>';
var_dump('20cats'+40);
echo'<br>';
var_dump(18%4);
echo'<br>';
echo '2) все является выражением';
echo '<br>';
echo ($a=2);
echo'<br>';
$x=($y=12)-8;
echo $x;
echo'<br>';
echo'3) true/false';echo '<br>';
var_dump(1==1.0); // равно после преобразования типов
echo'<br>';
var_dump(1===0);// равно и имеет тот же тип
echo'<br>';
var_dump('02'==2);// равно после преобразования типов
echo'<br>';
var_dump('02'===2);// равно и имеет тот же тип
echo'<br>';
var_dump('02'=='2');// равно после преобразования типов
echo'<br>';
var_dump('*');// тип,кол-во символов
echo'<br>';
var_dump($x=true xor true);
echo'<br>';
var_dump('$x'); //тип,кол-во символов
