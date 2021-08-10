<?php


function existUserLogin($login)
{
    if ($_COOKIE['username'] == $_POST['$login']) {
        echo 'Логин есть в базе';
    } else echo 'Авторизуйтесь';
}