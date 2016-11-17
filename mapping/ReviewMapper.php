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
        if (array_key_exists('id', $properties)) {
            $review->setId($properties['id']);
        }        
        if (array_key_exists('date', $properties)) {
            $date = self::createDateTime($properties['date']);
            if ($date) {
                $review->setDate($date);
            }
        }
        if (array_key_exists('coffeeType', $properties)) {
            $review->setCoffeeType($properties['coffeeType']);
        }
        if (array_key_exists('comment', $properties)) {
            $review->setComment($properties['comment']);
        }
        if (array_key_exists('userId', $properties)) {
            $review->setUserId($properties['userId']);
        }
        if (array_key_exists('cafeId', $properties)) {
            $review->setCafeId($properties['cafeId']);
        }
        if (array_key_exists('status', $properties)) {
            $review->setStatus($properties['status']);
        }
        if (array_key_exists('rating', $properties)) {
            $review->setRating($properties['rating']);
        }
  
    }
}