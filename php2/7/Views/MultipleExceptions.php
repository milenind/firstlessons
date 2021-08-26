<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<h1>
    Ошибки:
</h1>
<?php foreach ($this->exceptions->all() as $exception):?>
<h3><?=$exception->getMessage()?></h3>
<?php endforeach;?>
</body>
</html>