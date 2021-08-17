<?php
if ($_COOKIE['username'] == $_POST['login'] && $_COOKIE['password'] == sha1($_POST['pass'])) {
    echo 'Вы админ! Добро пожаловать!'.'<br>';
    ?>
    <button ><a href="admin.php">Перейти на сайт</a></button>
    <?php
    die;
} else echo 'Вы не админ, вам доступна только пробная версия приложения ' . '<br>';
?>
<button ><a href="noadmin.php">Перейти на сайт</a></button>

