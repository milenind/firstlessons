<?php
session_start();
setcookie('username', 'admin');
setcookie('password', sha1(123456));
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width,user-scalable=no,initial-scale=1.0,maximum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nineth</title>
    <style>
        .img {

            border: 2px solid #efd3f5;
            padding-left: 10px;
            padding-right: 10px;
            background: beige;
            margin-right: 30px;
            margin-left: 30px;
        }
    </style>
</head>
<body>
</body>
</html>
<?php
if (isset($_POST['send'])) {
    if (empty($_POST['login']) || empty($_POST['pass'])) {
        die('Необходимо заполнить все поля');
    }
}
?>
<div>
    <form method="post" action="web.php">
        Введите логин
        <input type="text" name="login"/><br>
        Введите пароль
        <input type="password" name="pass"/><br>
        <button type="submit" name="send">Войти</button>
    </form>
    <br>
    <hr>
</div>
