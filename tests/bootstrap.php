<?php

    $base_dir = dirname( dirname ( dirname(__DIR__) ) );

    $loader = require $base_dir . '/autoload.php';
    $loader->add('AppName', __DIR__.'/../src/');

    
