<?php

use App\Supports\Validator;
$validator = new Validator();


$validator->
setRules('username','max_length',20)->
setRules('username','min_length',3)->
setRules('password','min_length',3)->
setRules('password','max_length',255)->
setRules('email',"validateEmail",true);


return $validator;
