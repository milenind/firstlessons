<?php

require 'classes/GuestBook.php';
$guestBook = new GuestBook('data.txt');
include '../templates/seventhview.php';