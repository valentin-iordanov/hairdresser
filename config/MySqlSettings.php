<?php

use Slim\App;

return function (App $app){

    $app->getContainer()->set('mysql',function(){
        return [
            "username" => "root",
            "password" => "",
            "dataBaseName" => "hairdressing",
            "serverName" => "localhost"
        ];
    });
};


