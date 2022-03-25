<?php 


namespace App\Controllers;

use App\Exceptions\ExceptionWrapper;
use App\Models\Appointments;
use App\Supports\View;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class AppoitmentController{

    public function freeAppoitments(Request $request,Response $response){

        $data = $request->getParsedBody();
        try{
            $appointments = new Appointments();
            $appointments->setAppointedTime($data["date"]);
            $hours = $appointments->possibleAppointedTime($data["id"]);
            $response->getBody()->write(json_encode($hours));
            return $response->withStatus(200);
        }catch(ExceptionWrapper $exp){
            $response->getBody()->write(json_encode($exp->getData()));
            return $response->withStatus(400);
        }
        return $response;
    }

    public function saveAppoitment(Request $request,Response $response){
        try{
            $appointments = new Appointments();
            $appointments->saveAppoitment($request->getParsedBody());
            return $response->withStatus(200);
        }catch(ExceptionWrapper $exp){
            $response->getBody()->write(json_encode($exp->getData()));
            return $response->withStatus(400);
        }
    }

    public function redact(Request $request,Response $response){
        try{
            $appointments = new Appointments();
            $data = $request->getParsedBody();
            $appointments->update($data);
            return $response->withStatus(200);
        }catch(ExceptionWrapper $exp){
            $response->getBody()->write(json_encode($exp->getData()));
            return $response->withStatus(400);
        }
    }
    public function delete(Response $response,$id){
        try{
            $appointments = new Appointments();
            $appointments->delete($id);
            return $response->withStatus(200);
        }catch(ExceptionWrapper $exp){
            $response->getBody()->write(json_encode($exp->getData()));
            return $response->withStatus(400);
        }
    }

    public function getAllAppoitments(View $view, $date){

        
        
    }



}
