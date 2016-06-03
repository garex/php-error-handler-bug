<?php
$_SERVER['counter'] = 0;

set_error_handler('handler1', E_ALL);
trigger_error('notice 1',  E_USER_NOTICE); // OK
trigger_error('notice 2',  E_USER_NOTICE); // not caught !

function handler1($errrno, $errstr)
{
    ++$_SERVER['counter'];
    echo __FUNCTION__ . ": $errstr\n";
    set_error_handler('handler2', E_USER_WARNING);
    restore_error_handler();
}

function handler2($errrno, $errstr)
{
    echo __FUNCTION__ . ": $errstr\n";
}

if ($_SERVER['counter'] < 2) {
  die('2nd call was not caught' . PHP_EOL);
}
