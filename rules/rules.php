<?php

$app->getContainer()->set('userRules',function(){
    return require('userRules.php');
});

