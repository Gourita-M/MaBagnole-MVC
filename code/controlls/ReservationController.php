<?php
    
    namespace code\controlls;

require_once __DIR__ . '/../../vendor/autoload.php';
use code\models\Reservation;
use code\models\Vehicles;

Class ReservationController 
{
    private $Reserve;

    public function __construct()
    {
        $this->Reserve = new Reservation;
    }

    public function addReservation($id)
    {
        $this->Reserve->vehicleid = $id;
        $this->Reserve->start_date = $_POST['pickup'];
        $this->Reserve->end_date = $_POST['back'];
        $this->Reserve->location = $_POST['picklocation'];

        $result = $this->Reserve->createReservation($_SESSION['userid']);

        if($result){
            header("Location: ../rented");
            exit();
        }
    }



}

    
?>