<?php

use App\Models\BaseModel;
use App\Supports\DB;
use App\Supports\Router;
use DI\Bridge\Slim\Bridge;
use DI\Container;

$app = Bridge::create(new Container());

$app->addBodyParsingMiddleware();

$mySqlSettings = require "../config/MySqlSettings.php";
$mySqlSettings($app);

$settings = require "../config/settings.php";
$settings($app);

$middleware = require "../config/middleware.php";
$middleware($app);

DB::setApp($app);
if(DB::getInstance() === false){
    dd("database not runing");
};

Router::setup($app);

BaseModel::setApp($app);

require '../rules/rules.php';

require '../routes/web.php';

return $app;
