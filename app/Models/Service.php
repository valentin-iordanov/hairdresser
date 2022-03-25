<?php 

namespace App\Models;

use App\Supports\DB;

class Service {

    public function getServiceById($id){
        $db = DB::getInstance();
        return $db->executeReturnObject("SELECT * FROM `services` WHERE id = :id",["id" => $id]);
    }

    public function getAllServices(){
        $db = DB::getInstance();
        return $db->executeQuery("SELECT * FROM `services`");
    }

    public function deleteServiceById($id){
        $db = DB::getInstance();
        $db->execute('DELETE FROM `services` WHERE id = :id',['id' => $id]);
    }

    public function redactServiceById($id,$newData){
        $db = DB::getInstance();
        $db->execute('UPDATE `services` SET `name` = :name, `price` = :price, `duration` = :duration , `picture` = :picture_url WHERE `id` = :id',
        ['price' => $newData['price'], 'duration' => $newData['duration'], 'picture_url' => $newData['picture_url'], 'name' => $newData['name'], 'id' => $id]);
    }

    public function addService($data){
        $db = DB::getInstance();
        $db->execute("INSERT INTO `services` (`id`, `name`, `price`, `duration`, `picture`) VALUES (NULL, :name, :price, :duration, :picture_url)",
        ['name' => $data['name'], 'price' => $data['price'], 'duration' => $data['duration'], 'picture_url' => $data['picture_url'] ]);
    }

}


