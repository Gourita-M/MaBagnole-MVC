<?php


$url = $_SERVER['REQUEST_URI'];

$parts = explode('/', $url);

switch ($parts[3]) {

    case '':
        require './View/Home.php';
        break;

    case 'Home':
        require './View/Home.php';
        break;

    case 'admin':
        require './View/admin.php';
        break;

    case 'delete_review':
        require './View/delete_review.php';
        break;

    case 'rent':
        $id = "$parts[4]";
        require './View/rent.php';
        break;

    case 'rented':
        require './View/rented.php';
        break;

    case 'vehicle_details':
        $id = "$parts[4]";
        require './View/Vehicle_details.php';
        break;

    case 'vehicle':
        require './View/Vehicles.php';
        break;

    case 'edit_Vehicle':
        require './View/edit_Vehicle.php';
        break;

    case 'delete_Vehicle':
        $id = "$parts[4]";
        require './View/delete_Vehicle.php';
        break;

    case 'add_vehicle':
        require './View/add_vehicle.php';
        break;

    default:
        http_response_code(404);
        echo "404 - Page not found";
        
}



?>



