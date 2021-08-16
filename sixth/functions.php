<?php
require_once 'classes/GuestBookRecords.php';
function getGuestBookRecords()
{
    $lines = file('data.txt', FILE_IGNORE_NEW_LINES);
    $ret = [];
    foreach ($lines as $line) {
        $ret[] = new GuestBookRecords($line);
    }
    return $ret;
}