<?php
    
    namespace code\controlls;

require_once __DIR__ . '/../../vendor/autoload.php';
use code\models\Review;

Class ReviewController 
{
    private $Review;

    public function __construct()
    {
        $this->Review = new Review;
    }

    public function showReviews()
    {

    }
}
?>

// $reviews = new Review;

    // $reviews->review_id = $id;

    // $review = $reviews->getReviewsById();

    // if(isset($_POST['edit'])){

    //     $reviews->rating = $_POST['rating'];
    //     $reviews->reviews_comment = $_POST['comment'];
        
    //     $reviews->editReview();

    //     header("Location: ./rented.php");

    //     exit;
    // }