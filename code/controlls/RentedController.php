<?php 

    namespace code\controlls;
require_once __DIR__ . '/../../vendor/autoload.php';

use code\models\Reservation;
use code\models\Review;


Class RentedController 
{

    private $Reser;
    private $Review;

    public function __construct()
    {
        $this->Reser = new Reservation ;
        $this->Review = new Review ;
    }

    public function showReservations()
    {
        return $this->Reser->getReservationReview($_SESSION['userid']);
    }

    public function editReviews()
    {
        $this->Review->user_id = $_SESSION['userid'];
        $this->Review->vehicle_id = $_POST['vehiid'];
        $this->Review->rating = $_POST['rating'];
        $this->Review->reviews_comment = $_POST['review'];

        $result = $this->Review->addReview();

        if($result){
            $error = "Review is Added";
            header("Location: ./rented");
            exit;
        }else $error = "Review is not added";
    }
}

?>