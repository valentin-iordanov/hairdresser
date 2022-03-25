<?php



namespace App\Controllers;

use App\Exceptions\ExceptionWrapper;
use App\Models\User;
use App\Supports\View;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class UserController{

    public function register(Request $request,Response $response,View $view){
        try{
            $data = $request->getParsedBody();
            $user = new User($data);
            $response->withStatus(200);
            $response->getBody()->write(json_encode($user->register()));
            return $response;
        }catch(ExceptionWrapper $exp){
            $response->getBody()->write(json_encode($exp->getData()));
            return $response->withStatus(400);
        }
        return $response->withStatus(201);
    }
    public function login(Request $request,Response $response){
        try{
            $data = $request->getParsedBody();
            $user = new User($data);
            $response->withStatus(200);
            $response->getBody()->write(json_encode($user->login()));
            return $response;
        }catch(ExceptionWrapper $exp){
            $response->getBody()->write(json_encode($exp->getData()));
            return $response->withStatus(400);
        }
        return $response->withStatus(200);
    }
    
}
