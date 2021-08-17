<?php
if (isset($_POST['sign'])) {
    if (empty($_POST['new_login'])|| empty($_POST['new_pass'])) {
        die('Необходимо заполнить все поля');
    }
    setcookie('username', $_POST['new_login']);
    setcookie('password', sha1($_POST['new_pass']));
    echo 'Вы успешно авторизовались!';
    echo '<br>';
    ?><a href="../nineth/nineth.php">На главную</a><?php
    die;
};
?>

<?php
if ($_COOKIE['username'] == $_POST['login'] && $_COOKIE['password'] == sha1($_POST['pass'])) {
    echo 'Привет, ' . $_POST['login'];
    die;
} else echo 'Пользователя нет в базе! Авторизуйтесь ' . '<br>';

?>
    <hr>
    <form method="post" >
        Введите логин
        <input type="text" name="new_login"/><br>
        Введите пароль
        <input type="text" name="new_pass"/><br>
        <button type="submit" name="sign">Зарегистрироваться</button>
    </form>

<?php
