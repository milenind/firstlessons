<?php
require_once 'classes/GuestBook.php';
require_once 'classes/GuestBookRecords.php';
$guestBook=new GuestBook('data.txt');
$record=new GuestBookRecords($_POST['new_line']);
$guestBook->append($record);
$guestBook->save();
header('Location:index.php');
