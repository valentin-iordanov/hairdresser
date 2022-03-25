<?php


namespace App\Models;

use App\Exceptions\ExceptionWrapper;
use App\Supports\DB;

class Appointments{

    private $wantedDate;
    private $startDay;
    private $endDay;
    private $dates;
    private $currentTime;

    public function __construct()
    {
        $this->currentTime = time() + 60 * 60;
    }

    public function update($data){
        $this->isFreeAppointment($data);
        $db = DB::getInstance();
        $db->execute("UPDATE `appoitments` SET `date` = :date, `time` = :time, `person_name` = :personName WHERE `id` = :id",
        ['date' => $data['date'], 'time' => $data['time'], 'personName' => $data['person_name'], 'id' => $data['id']]);
    }

    public function getById($id){
        $db = DB::getInstance();
        return $db->executeReturnObject('SELECT * FROM `appoitments` WHERE `id` = :id',['id' => $id]);
    }

    public function delete($id){
        $appoitment = $this->getById($id);
        if($_SESSION['id'] = $appoitment->user_id){
            $db = DB::getInstance();
            $db->execute("DELETE FROM `appoitments` WHERE `id` = :id ",["id" => $id]);
        }
    }

    public function getAllAppoitmentsOnUserId($userId){
        $db = DB::getInstance();
        $date = date("Y-m-d",time());
        return $db->executeReturnAll("SELECT * FROM `appoitments` WHERE `user_id` = :userId AND `date` >= :date",['userId' => $_SESSION['id'],'date' => $date]);
    }

    public function getAllAppoitments(){
        $db = DB::getInstance();
        return $db->executeQuery('SELECT * FROM `appoitments` WHERE `date` ');
    }

    public function saveAppoitment($data){

        $this->isFreeAppointment($data);

        $db = DB::getInstance();
        $db->execute("INSERT INTO `appoitments` (`id`, `date`, `time`, `person_name`, `user_id`, `service_id`) VALUES (NULL, :date, :time, :name, :userId, :serviceId)",
        ["date" => $data["date"] , "time" => $data["time"] , "name" => $data["name"] , "userId" => $_SESSION['id'] , "serviceId" => $data["serviceId"]]);


    }

    private function isFreeAppointment($data){

        $this->setAppointedTime($data["date"]);
        $freeAppoitments = $this->possibleAppointedTime($data['serviceId']);

        foreach($freeAppoitments as $value){
            if($value == $data['time']){
                return true;
            }
        }
        throw new ExceptionWrapper('Този час вече е невалиден','appoitentHour',false);
    }

    private function findFreeTime()
    {
        $oneMin = 60;

        $possibleHours = [];
        $currentMin = $this->startDay;
        foreach ($this->dates as $value) {

            $serviceStartTime = strtotime($value['date'] . " " . $value['time']);

            $db = DB::getInstance();

            $serviceData = $db->executeReturnObject('SELECT * FROM `services` WHERE `id` = :id', ['id' => $value["service_id"]]);

            if($serviceData == false){
                continue;
            }


            $serviceEndTime = $serviceStartTime + $this->timeToSeconds($serviceData->duration);

            $posibleTimeStart = 0;
            $posibleTimeEnd = 0;

            $flag = true;
            while ($currentMin < $this->endDay) {
                if ($serviceStartTime <= $currentMin && $currentMin < $serviceEndTime) {
                    break;
                } else {
                    if ($flag) {
                        $posibleTimeStart = $currentMin;
                    }
                    $posibleTimeEnd = $currentMin;
                    $currentMin += $oneMin;
                    $flag = false;
                }
            }
            if ($posibleTimeStart != 0 && $posibleTimeEnd != 0) {
                $possibleHours[] = ["startTime" =>  date("Y-m-d H:i:s", $posibleTimeStart), "endTime" =>  date("Y-m-d H:i:s", $posibleTimeEnd + 60)];
            }

            $serviceStartTime = $serviceEndTime;
            $currentMin = $serviceStartTime;
        }

        $possibleHours[] = ["startTime" =>  date("Y-m-d H:i:s", $currentMin), "endTime" =>  date("Y-m-d H:i:s", $this->endDay)];

        return $possibleHours;
    }

    public function possibleAppointedTime ($cholsenService)
    {
        $service = new Service();
        $serviceData = $service->getServiceById($cholsenService);
        if($serviceData == null){
            throw new ExceptionWrapper('This service not exist',"Service",false);
        }
        $serviceTime = $this->timeToSeconds($serviceData->duration);
        $freeTime = $this->findFreeTime();

        $possibleAppointedTime = [];

        foreach ($freeTime as $value) {

            $startTime = strtotime($value["startTime"]);
            $endTime = strtotime($value["endTime"]);

            $currentMin = $startTime;

            while ($currentMin + $serviceTime <= $endTime) {
                $currentMin += $serviceTime;
                if(($currentMin - $serviceTime) > $this->currentTime + 5 * 60){
                    $possibleAppointedTime[] = date("H:i:s", $currentMin - $serviceTime);
                }
            }
        }

        return $possibleAppointedTime;
    }

    private function timeToSeconds($time)
    {
        $newTime = explode(":", $time);

        $hours = $newTime[0] * 3600;
        $minutes = $newTime[1] * 60;
        $seconds = $newTime[2];

        return $hours + $minutes + $seconds;
    }

    public function setAppointedTime($date)
    {

        $wantedDate = strtotime($date);
        $currentTime = strtotime(date("Y-m-d",time()));


        if ($wantedDate < $currentTime) {
            throw new ExceptionWrapper('Date is out of Date','Date',false);
        }

        $db = DB::getInstance();

        $this->dates = $db->executeReturnAll('SELECT * FROM `appoitments` WHERE `date` = :date ORDER BY `time`',['date' => $date]);

        $this->wantedDate = $wantedDate;
        $this->startDay = strtotime(date("Y-m-d", $this->wantedDate)) + 28800;
        $this->endDay = strtotime(date("Y-m-d", $this->wantedDate)) + 72000;
    }
    

}

