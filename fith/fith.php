<?php
session_start();

?>
    <form method="post" action="users.php">
        Введите логин
        <input type="text" name="login"/><br>
        Введите пароль
        <input type="text" name="pass"/><br>
        <button type="submit" name="send">Войти</button>
    </form>
<?php
if ($_COOKIE['username'] !== empty($_COOKIE['username'])) {
    echo 'Зарегистрированные пользователи : ' . '<br>' . 'Логин : ' . $_COOKIE['username'] . '<br> ' . 'Пароль : ' . ' ' . $_COOKIE['password'];
} else {
    echo 'Нет зарегистрированных пользователей';
}