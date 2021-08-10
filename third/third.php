<?php
echo '1) Программа-калькулятор <br>';
?>
    <hr>
    <form method="POST" action="third.php">
        <input type="text" placeholder=" Введите первое число " name="num1"/>
        <input type="text" placeholder=" Введите второе число " name="num2"/><br>
        <input type="radio" value="+" name="operator"/>+
        <input type="radio" value="-" name="operator">-
        <input type="radio" value="*" name="operator"/>*
        <input type="radio" value="/" name="operator"/>/<br>
        <input type="submit" value=" Посчитать " name="count"/>
        <input type="reset" value=" Отменить " name="clean"/>
    </form>
<?php
$num1 = $_POST['num1'];
$num2 = $_POST['num2'];
$radio = $_POST['operator'];
if ($_POST['count']) {
    if ($radio == '+') {
        $a = $num1 + $num2;
        echo 'Сумма ' . $num1 . ' ' . ' и ' . $num2 . ' ' . 'равняется :' . ' ' . $a . '<br>';
    } elseif ($radio == '-') {
        $b = $num1 - $num2;
        echo 'Разность ' . $num1 . ' ' . ' и ' . $num2 . ' ' . 'равняется :' . ' ' . $b . '<br>';
    } elseif ($radio == '*') {
        $c = $num1 * $num2;
        echo 'Произведение ' . $num1 . ' ' . ' и ' . $num2 . ' ' . 'равняется :' . ' ' . $c . '<br>';
    } elseif ($radio == '/') {
        $d = $num1 / $num2;
        echo 'Частное между ' . $num1 . ' ' . ' и ' . $num2 . ' ' . 'равняется :' . ' ' . $d . '<br>';
    } else {
        echo 'Введите значения!';
    }
}
?>
    <br>
    <hr>
<?php
echo '2) Примитивная фотогалерея из двух страниц';
echo '<br>';

echo $a = '<a href="1.jpg" target="_blank"><img src="1.jpg" width="200" height="200" alt="картинка"></a>';
echo $b = '<a href="2.png" target="_blank"><img src="2.png" width="200" height="200" alt="картинка"></a>';
echo $c = '<a href="3.jpg" target="_blank"><img src="3.jpg" width="200" height="200" alt="картинка"></a>';
