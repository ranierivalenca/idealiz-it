<?php

define('DB_NAME', 'idealizit');
define('DB_USERNAME', 'idealizit');
define('DB_PW', 'secret');

$replaces = [
    'DB_DATABASE' => DB_NAME,
    'DB_USERNAME' => DB_USERNAME,
    'DB_PASSWORD' => DB_PW
];

$env = file_get_contents('.env');
foreach($replaces as $replace => $by) {
    $env = preg_replace("/{$replace}.*/", "{$replace}={$by}", $env);
}

file_put_contents('.env', $env);

?>