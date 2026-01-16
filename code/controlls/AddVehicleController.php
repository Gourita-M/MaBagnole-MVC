<?php

namespace code\controlls;

use code\models\Category;
use code\models\Vehicles;

Class AddVehicleController
{
  private $Category;
  private $Vehicle;

  public function __construct()
  {
    $this->Category = new Category;
    $this->Vehicle = new Vehicles;
  }

  public function showCategories()
  {
        return $this->Category->getCategories();
  }

  public function addVehicle()
  {
        // $this->Vehicle->model = ;
        // $this->Vehicle->price_day = ;
        // $this->Vehicle->vehicle_status = ;
        // $this->Vehicle->category_id = ;
        // $this->Vehicle->Vehicle_image = ;
  }
  


}


?>