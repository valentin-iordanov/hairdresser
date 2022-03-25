<?php


namespace App\Controllers;

use App\Models\Service;
use App\Models\User;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class ServicesController{


    public function deleteService(Request $request,Response $response,$id){
            $services = new Service();
            if((new User())->getUserById($_SESSION['id'])->role == "admin"){
                $services->deleteServiceById($id);
            }
            return $response->withStatus(200);
    }
    
    public function addService(Request $request,Response $response){
            $data = $request->getParsedBody();
            // $response->getBody()->write(json_encode($data));
            $services = new Service();
            if((new User())->getUserById($_SESSION['id'])->role == "admin"){
                $services->addService($data);
                return $response->withStatus(201);
            }
            return $response->withStatus(400);
    }
    public function redactService(Request $request,Response $response){
            $data = $request->getParsedBody();
            $services = new Service();
            if((new User())->getUserById($_SESSION['id'])->role == "admin"){
                $services->redactServiceById($data['id'],$data);
            }
            return $response->withStatus(200);
    }



}