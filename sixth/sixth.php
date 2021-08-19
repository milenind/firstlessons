<?php
require 'classes/GuestBook.php';
//$table = new Table;
//$table->id = 1;
//$table->set_price(2390) ;
//$table->color = 'черный';
//$table->size = '140x190';
//$table2 = new Table;
//$table2->id = 2;
//$table2->set_price(4090);
//$table2->color = 'белый';
//$table2->size = '300x300';
//echo $table->show_info();
//echo $table2->show_info();
$guestBook= new GuestBook('data.txt');
foreach ($guestBook->getRecords() as $record) { ?>
    <?php
    echo $record->getMessage();
    ?>
    <hr>
    <?php
}
?>
<form method="post" action="../sixth/append.php">
    Введите новую запись
    <br>
    <input type="text" name="new_line"></input>
    <br>
    <button type="submit" name="send">Внести</button>


</form>


