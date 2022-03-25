<?php

namespace App\Supports;

use \PDO;
use \PDOException;
use Slim\App;

class DB{

    private static $instance = null;
    private PDO $conn;
    
    private static App $app;

    private $username;
    private $password;
    private $serverName;
    private $dataBaseName;

    private function __construct()
    {
        $this->setupDB();
    }

    function executeQuery(String $SQL){
        $stm = $this->conn->query($SQL,PDO::FETCH_BOTH);
        return $stm->fetchAll();
    }

    public static function getInstance(){
        if(self::$instance == null){
            try{
                self::$instance = new DB(self::$app);
            }catch(PDOException $exp){
                return false;
            }
        }
        return self::$instance;
    }

    public function executeReturnAll(String $SQL,$params = [],array $options = array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY)){
        $stm = $this->conn->prepare($SQL,$options);
        $stm->execute($params);
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    private function setupDB(){
        $settings = self::$app->getContainer()->get('mysql');
        $this->username = $settings["username"];
        $this->password = $settings["password"];
        $this->serverName = $settings["serverName"];
        $this->dataBaseName = $settings["dataBaseName"];

        $conn = new PDO("mysql:host={$this->serverName};dbname={$this->dataBaseName};charset=UTF8", $this->username, $this->password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->conn = $conn;
    }

    public static function setApp(App $app){
        if(self::$instance == null){
            self::$app = $app;
        }
    }

    public function execute(String $SQL,$params = [],array $options = array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY)){
        $stm = $this->conn->prepare($SQL,$options);
        $stm->execute($params);
    }

    public function executeReturnObject(String $SQL,$params = [],array $options = array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY)){
        $stm = $this->conn->prepare($SQL,$options);
        $stm->execute($params);
        $data = $stm->fetchObject();
        return $data;
    }

}

