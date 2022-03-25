<?php

use App\Controllers\AppoitmentController;
use App\Controllers\ServicesController;
use App\Controllers\UserController;
use App\Controllers\WelcomeController;
use App\Models\Appointments;
use App\Supports\Router;
use FastRoute\Route;

Router::get('/',[WelcomeController::class,'home']);
Router::get('/register',[WelcomeController::class,'register']);
Router::post('/user/register',[UserController::class,'register']);
Router::get('/login',[WelcomeController::class,'login']);
Router::post('/user/login',[UserController::class,'login']);

Router::get('/savehour',[WelcomeController::class,'saveHour']);
Router::get('/myhours',[WelcomeController::class,'myHours']);

Router::get('/appoitmentmenu/{id}',[WelcomeController::class,'appointmentMenu']);
Router::post('/appoitments',[AppoitmentController::class,'freeAppoitments']);
Router::post('/saveAppoitment',[AppoitmentController::class,'saveAppoitment']);
Router::delete('/appoitment/delete/{id}',[AppoitmentController::class,'delete']);
Router::put('/redactAppoitment',[AppoitmentController::class,'redact']);
Router::get('/appointment/redact/{id}',[WelcomeController::class,'redactAppointment']);
Router::get('/appoitments/{data}',[Appointments::class,'getAllAppoitments']);




Router::get('/servicesAdd',[WelcomeController::class,'addServiceView']);
Router::get('/servicesView',[WelcomeController::class,'serviceView']);
Router::get('/service/redact/{id}',[WelcomeController::class,'redactService']);


Router::delete('/service/delete/{id}',[ServicesController::class,'deleteService']);
Router::post('/addService',[ServicesController::class,'addService']);
Router::put('/redactService',[ServicesController::class,'redactService']);


