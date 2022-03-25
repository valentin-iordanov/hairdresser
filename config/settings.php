<?php

use Slim\App;

return function (App $app){
    $app->getContainer()->set('settings', function(){
        return [
            'displayErrorDetails' => true,
            'logErrorDetails' => true,
            'logErrors' => true,
        ];
    });
};

