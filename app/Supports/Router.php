<?php 

namespace App\Supports;

use Slim\App;

class Router{

    private static App $app;

    private function __construct(){
        
    }

    public static function setup(App $app){
        self::$app = $app;
    }
    
    public static function __callStatic($name, $arguments)
    {
        $app = self::$app;

        [$route,$data] = $arguments;

        return $app->$name($route,$data);
    }


}
