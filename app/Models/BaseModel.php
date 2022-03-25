<?php

namespace App\Models;

use Slim\App;

abstract class BaseModel{

    protected static $app = null;

    public static function setApp(App $app){
        if(self::$app == null){
            self::$app = $app;
        }
    }



}
