<?php

use \Norm\Schema\String;
use \Norm\Schema\Text;

return array(
    'schema' => array(
        'name' => String::create('name'),
        'description' => Text::create('description'),
    ),
);
