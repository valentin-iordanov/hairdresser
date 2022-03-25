<?php

namespace App\Models;

use App\Exceptions\ExceptionWrapper;
use App\Supports\DB;
use Exception;

class User extends BaseModel{

    private $data = [];

    public function __construct(...$postParams)
    {
        if(count($postParams) != 0){
            $this->data = $postParams[0];
        }
        
    }


    public function getUserById(int $id = null){
        $db = DB::getInstance();
        return $db->executeReturnObject("SELECT * FROM `users` WHERE id = :id",["id" => $id]);
    }

    public function getUserByName(String $name){
        $db = DB::getInstance();
        return $db->executeReturnObject("SELECT * FROM `users` WHERE name = :name",["name" => $name]);
    }
    
    public function getUserByEmail(String $email){
        $db = DB::getInstance();
        return $db->executeReturnObject("SELECT * FROM `users` WHERE email = :email",["email" => $email]);
    }

    public function register(){
        $this->isRegistred();
        $db = DB::getInstance();

        $this->validation();

        $db->execute("INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES (NULL, :name, :email, :password)"
        ,['name' => $this->data["username"],'email' => $this->data["email"],'password' => $this->data["password"]]);

        $user = $this->getUserByEmail($this->data['email']);
        $_SESSION['logged'] = true;
        $_SESSION['id'] = $user->id;
        return $user;

    }

    private function isRegistred(){
        $emialValidate = $this->getUserByEmail($this->data['email']);
        $usernameValidate = $this->getUserByName($this->data['username']);
    
        if($emialValidate !== false){
            throw new ExceptionWrapper("Email alredy is registred","Email",false);
        }

        if($usernameValidate !== false){
            throw new ExceptionWrapper("Username is in Use","Username",false);
        }
    }

    private function validation(){
        $validator = self::$app->getContainer()->get('userRules');
        $validator->setData($this->data);
        $validator->validate();  
    }

    public function login(){
        $emialValidate = $this->getUserByEmail($this->data['email']);

        if($emialValidate === false){
            throw new ExceptionWrapper('Email is not Registred','Email',false);
        }

        if($emialValidate !== false){
            if($emialValidate->password == $this->data["password"]){
                $_SESSION['logged'] = true;
                $_SESSION['id'] = $emialValidate->id;
                return $emialValidate;
            }else {
                throw new ExceptionWrapper('Password is not valid','Password',false);
            }
        }
    }
}

