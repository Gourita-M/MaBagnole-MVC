<?php

namespace code\controlls;

use code\models\Reservation;
use code\models\Review;
use code\models\Vehicles;
use code\models\Category;

class AdminController
{
    private Reservation $reservation;
    private Review $review;
    private Vehicles $vehicles;
    private Category $category;

    public function __construct()
    {
        $this->reservation = new Reservation();
        $this->review      = new Review();
        $this->vehicles    = new Vehicles();
        $this->category    = new Category();
    }

    public function addVehicle()
    {
        return [
            'vehicles'     => $this->vehicles->getVehicle(),
            'categories'   => $this->category->getCategories(),
            'reservations' => $this->reservation->getReservationByVehicle(),
            'reviews'      => $this->review->getReviewsWithVehicles(),
        ];
    }
}