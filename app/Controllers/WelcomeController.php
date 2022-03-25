<?php

namespace App\Controllers;

use App\Models\Appointments;
use App\Models\Service;
use App\Models\User;
use App\Supports\View;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class WelcomeController{

    public function register(View $view){
        if(empty($_SESSION['logged'])){
            return $view->render('guest.register');
        }
        $viewlogged = new View();
        if(isset($_SESSION['id']) && (new User())->getUserById($_SESSION['id'])->role == 'admin'){
            $viewAdmin = new View();
            return $viewAdmin->render('admin.home');
        }else{
            return $viewlogged->render('user.homeUser');
        }
    }

    public function home(View $view){
        if(empty($_SESSION['logged'])){
            return $view->render('guest.homeGuest');
        }
        $viewlogged = new View();
        if(isset($_SESSION['id']) && (new User())->getUserById($_SESSION['id'])->role == 'admin'){
            $viewAdmin = new View();
            return $viewAdmin->render('admin.home');
        }else{
            return $viewlogged->render('user.homeUser');
        }
    }

    public function login(View $view){
        if(empty($_SESSION['logged'])){
            return $view->render('guest.login');
        }
        $viewlogged = new View();
        if(isset($_SESSION['id']) && (new User())->getUserById($_SESSION['id'])->role == 'admin'){
            $viewAdmin = new View();
            return $viewAdmin->render('admin.home');
        }else{
            return $viewlogged->render('user.homeUser');
        }
    }

    public function saveHour(View $view){
        if(empty($_SESSION['logged'])){
            return $view->render('guest.login');
        }
        $viewlogged = new View();
        $service = new Service();
        $services = $service->getAllServices();
        if(isset($_SESSION['id']) && (new User())->getUserById($_SESSION['id'])->role == 'admin'){
            $viewAdmin = new View();
            return $viewAdmin->render('admin.saveHour',['services' => $services]);
        }else{
            return $viewlogged->render("user.saveHour",['services' => $services]);
        }
    }

    public function appointments(){
        $appointmets = new Appointments();
        $appointmets->getAllAppoitments();
    }

    public function appointmentMenu(ServerRequestInterface $request,View $view,$id){
        if(empty($_SESSION['logged'])){
            return $view->render('guest.login');
        }
        $viewlogged = new View();
        $services = new Service();
        $service = $services->getServiceById($id);
        $viewlogged = new View();
        if(isset($_SESSION['id']) && (new User())->getUserById($_SESSION['id'])->role == 'admin'){
            $viewAdmin = new View();
            return $viewAdmin->render('appointmentMenu',['service' => $service]);
        }else{
            return $viewlogged->render('appointmentMenu',['service' => $service]);
        }
    }


    public function myHours(View $view){
        if(empty($_SESSION['logged'])){
            return $view->render('guest.login');
        }
        $viewlogged = new View();
        $appointmets = new Appointments();
        $services = new Service();
        $info = $appointmets->getAllAppoitmentsOnUserId($_SESSION['id']);
        return $viewlogged->render('user.myHours',['appointments' => $info,'services' => $services]);
    }

    public function redactAppointment(View $view,$id){
        if(empty($_SESSION['logged'])){
            return $view->render('guest.login');
        }
        $viewlogged = new View();
        $appoitmets = new Appointments();
        $services = new Service();
        $currentAppoitment = $appoitmets->getById($id);
        $service = $services->getServiceById($currentAppoitment->service_id);
        if(isset($_SESSION['id']) && (new User())->getUserById($_SESSION['id'])->role == 'admin'){
            $viewAdmin = new View();
            return $viewAdmin->render('admin.appointmentRedact',['appointmentRedact' => $currentAppoitment,'service' => $service]);
        }else{
            return $viewlogged->render('appointmentRedact',['appointmentRedact' => $currentAppoitment,'service' => $service]);
        }
    }

    public function serviceView(View $view){
        if(empty($_SESSION['logged'])){
            return $view->render('error.404');
        }
        $viewlogged = new View();
        $users = new User();
        $services = (new Service())->getAllServices();
        if(isset($_SESSION['id'])){
            $user = $users->getUserById($_SESSION['id']);
            return $user->role == "admin" ? $viewlogged->render('admin.servicesView',['services' => $services]) : $view->render('error.404');
        }
        return $view->render('error.404');
    }

    public function addServiceView(View $view){
        if(empty($_SESSION['logged'])){
            return $view->render('error.404');
        }
        $viewlogged = new View();
        $users = new User();
        if(isset($_SESSION['id'])){
            $user = $users->getUserById($_SESSION['id']);
            return $user->role == "admin" ? $viewlogged->render('admin.createService') : $view->render('error.404');
        }
        return $view->render('error.404');
    }

    public function redactService(View $view,$id){
        if(empty($_SESSION['logged'])){
            return $view->render('error.404');
        }
        $viewlogged = new View();
        $users = new User();
        $service = (new Service)->getServiceById($id);
        if(isset($_SESSION['id'])){
            $user = $users->getUserById($_SESSION['id']);
            return $user->role == "admin" ? $viewlogged->render('admin.redactService',['service' => $service]) : $view->render('error.404');
        }
        return $view->render('error.404');
    }


}


