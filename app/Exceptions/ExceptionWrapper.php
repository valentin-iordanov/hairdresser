<?php

namespace App\Exceptions;

use Exception;

class ExceptionWrapper extends Exception{

    public $message;
    public $filed;
    public $param;
    public $isValid;

    public function __construct($message,$filed,$isValid){
        $this->message = $message;
        $this->filed = $filed;
        $this->isValid = $isValid;
    }

    public function getData(){
        return [
            'message' => $this->message,
            'filed' => $this->filed,
            'isValid' => $this->isValid
        ];
    }

}


