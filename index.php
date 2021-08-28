<?php

/**
 * @var $app ;
 */

require_once __DIR__ . '/vendor/autoload.php';

require 'config/model.php';

require 'routes/web.php';

$app->run();