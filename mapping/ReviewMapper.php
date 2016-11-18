<?php

class ReviewMapper {

    private function __construct() {
    }

    /*
     * Maps an array to a User Object
     * @param review $review
     * @param array $properties
     */

    public static function map(Review $review, array $properties) {
//         var_dump($review);
//die();
        if (array_key_exists('id', $properties)) {
            $review->setId($properties['id']);
        }        
//        if (array_key_exists('date', $properties)) {
//            $date = self::createDateTime($properties['date']);
//            if ($date) {
//                $review->setDate($date);
//            }
//        }
        if (array_key_exists('date', $properties)) {
            $review->setDate($properties['date']);
        }
        if (array_key_exists('coffee_type', $properties)) {
            $review->setCoffeeType($properties['coffee_type']);
        }
        if (array_key_exists('comment', $properties)) {
            $review->setComment($properties['comment']);
        }
        if (array_key_exists('user_id', $properties)) {
            $review->setUserId($properties['user_id']);
        }
        if (array_key_exists('cafe_id', $properties)) {
            $review->setCafeId($properties['cafe_id']);
        }
        if (array_key_exists('status', $properties)) {
            $review->setStatus($properties['status']);
        }
        if (array_key_exists('rating', $properties)) {
            $review->setRating($properties['rating']);
        }
 
    }
}