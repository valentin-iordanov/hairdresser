<?php 



namespace App\Supports;

use App\Exceptions\ExceptionWrapper;

class Validator{
   
    private $data = [];
    private $rules = [];

    public function setData($data){
        $this->data = $data;
    }

    public function setRules($filed,$action,$param){
        $this->rules[$filed][] = ['action' => $action, 'param' => $param];
        return $this;
    }


    public function validate(){
        foreach($this->rules as $filed => $filedRules){
            foreach($filedRules as $value){

                $action = $value['action'];
                $this->$action($filed,$value['param']);

            }
        }
    }

    private function min_length($filed,$param){
        if(mb_strlen($this->data[$filed]) < $param){
            throw new ExceptionWrapper("{$filed} min length is {$param}",$filed,false);
        }
    }

    private function max_length($filed,$param){
        if(mb_strlen($this->data[$filed]) > $param){
            throw new ExceptionWrapper("{$filed} max length is {$param}",$filed,false);
        }
    }

    private function validateEmail($filed,$param){
        if($param === false){
            return;
        }
        if(filter_var($this->data[$filed], FILTER_VALIDATE_EMAIL)){}
        else{
           throw new ExceptionWrapper("{$filed} is not valid",$filed,false);
       }
    }



}
