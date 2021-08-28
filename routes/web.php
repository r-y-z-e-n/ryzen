<?php

use ryzen\framework\Router;

/**
 * All Your Web Routes Can Be Configured Here
 */

Router::get('/', [\app\controllers\HomeController::class, 'index']);