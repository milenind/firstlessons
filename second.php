<hr>
<?php
echo '1) Программа, которая составляет и выводит таблицу истинности';
echo '<br>';

$a=rand(0,1);
$b=rand(0,1);
$result=$a*$b;
echo 'a = ' . '  ' . $a .' , '.'b = '. $b .' , '.'a ^ b = ' . $result;







echo'<br>';
?>
<hr>
<?php
echo '2) Функция вычисления дискриминанта квадратного уравнения.Программа, которая решает квадратное уравнение. <br>';
function discr($a,$b,$c)
    {
        return ($b*$b)-4*$a*$c;
    }
echo 'Дискриминант равен : '. ' ' . discr(23,54,27).'<br>';
echo 'Дискриминант равен : '. ' ' . discr(9,267,754).'<br>';
echo 'Дискриминант равен : '. ' ' . discr(7,5,3).'<br>';
$a=1;
$b=10;
$c=9;
    echo 'Квадратное уравнение : ' .$a.'x^2+'.$b.'x+'. $c.'=0'.'<br>';
echo 'Дискриминант равен : '. ' ' . discr($a,$b,$c);
$d=discr($a,$b,$c);
echo '<br>';
if($d<0)
{
    echo 'Уравнение не имеет корней';
}
elseif ($d==0)
{
    echo 'Уравнение имеет один корень : '.(-$b)/2*$a.'<br>';
}
elseif($d>0)
{
    echo 'Корни уравнения : x1 ='. ' ' . ((-$b)-sqrt($d))/2*$a. ' , x2 = '. ' ' . ((-$b)+sqrt($d))/2*$a ;
}

echo '<br>';

?>
<hr>
<?php
echo '4) Функция, которая на вход принимает имя человека, а возвращает его пол, пытаясь угадать по имени (null - если угадать не удалось).'.'<br>';

function gender($name)
{

    $name_end=(mb_substr($name,-1,1));
    if ($name == 'Саша' ||  $name == 'Женя' || $name == 'Слава')
    {
        return $name .'- невозможно определить пол';
    }
    elseif($name_end == 'а' || $name_end =='я')
    {
        return $name . '- имя женское';
    }
    else
    {
        return $name .' - имя мужское';
    }
}
echo gender('Женя'). '<br>';
echo gender('Аня').'<br>';
echo gender('Сергей').'<br>';

