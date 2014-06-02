<?php

use \Norm\Schema\String;
use \Norm\Schema\NormArray;
use PassMan\Schema\Pass;

return array(
    'observers' => array(
        '\\PassMan\\Observer\\UserPrivileged',
    ),
    'schema' => array(
        'name' => String::create('name'),
        'url' => String::create('url'),
        'username' => String::create('username'),
        'password' => Pass::create('password'),
        '$privileges' => NormArray::create('$privileges'),
    ),
);
