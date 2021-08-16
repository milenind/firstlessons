<?php
require_once 'classes/User.php';
function sendMessage(User $user, $message)
{
    echo $user->email . '-->' . $message;
}

$user = new User;
$user->email = 'test@mail.ru';
$message = 'Привет';
sendMessage($user, $message);
