<?php
   
   
   namespace code\controlls;

require_once __DIR__ . '/../../vendor/autoload.php';
use code\models\Vehicles;

Class getVehiclesData
{
    private $Vehicle;

    public function __construct()
    {
        $this->Vehicle = new Vehicles;
    }

    public function showData()
    {
        return $this->Vehicle->getVehicle();
    }
}
    $vehicle = new getVehiclesData;
    
    $result = $vehicle->showData();
    
    echo json_encode($result);
?>