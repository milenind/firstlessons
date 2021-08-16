<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width,user-scalable=no,initial-scale=1.0,maximum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP-1</title>
</head>
<body>
<?php
foreach ($guestBook->getrecords() as $record) { ?>
    <article style="border: 1px dotted darkorchid;margin-bottom:20px;">
        <?php echo $record->getMessage(); ?>
    </article>
<?php } ?>
<hr>
<form method="post" action="append.php">
    Введите новую запись
    <br>
    <input type="text" name="new_line"></input>
    <br>
    <button type="submit" name="send">Внести</button>
</form>
</body>
</html>