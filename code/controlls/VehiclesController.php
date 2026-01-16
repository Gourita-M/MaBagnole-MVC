<?php

    namespace code\controlls;
require_once __DIR__ . '/../../vendor/autoload.php';

use code\models\Review;

Class VehiclesController
{

    private $Review;

    public function __construct()
    {
        $this->Review = new Review;
    }
    
    public function getVehicle($id)
    {
        return $this->Review->getByVehicleid($id);
    }

}

?>