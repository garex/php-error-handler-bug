<?php
function initialHandler($code, $message) {
  echo implode("\t", [__FUNCTION__, $code, $message]) . PHP_EOL;
  // Bug will be only if set/reset inside current handler

  if (E_STRICT == $code) {
    exit(2);
  }

  set_error_handler('anotherHandler');
  restore_error_handler();
}

function anotherHandler($code, $message) {
  echo implode("\t", [__FUNCTION__, $code, $message]) . PHP_EOL;
}

set_error_handler('initialHandler', E_ALL & ~E_STRICT);
// When you set/reset outside -- there will no bug
// set_error_handler('anotherHandler');
// restore_error_handler();

1/0;
reset(explode(',', ','));
1/0;
