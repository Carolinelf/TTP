<?php

class Review {

//    const STATUS_PENDING = "PENDING";
    
    private $id;
    private $date;
    private $coffeeType;
    private $comment;
    private $userId;
    private $cafeId;
    private $status;
    private $rating;
    
    function getId() {
        return $this->id;
    }

    function getDate() {
       
        return $this->date;
    }

    function getCoffeeType() {
        return $this->coffeeType;
    }

    function getComment() {
        return $this->comment;
    }

    function getUserId() {
        return $this->userId;
    }

    function getCafeId() {
        return $this->cafeId;
    }

    function getStatus() {
        return $this->status;
    }

    function getRating() {
        return $this->rating;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setDate($date) {
        $this->date = $date;
    }

    function setCoffeeType($coffeeType) {
        $this->coffeeType = $coffeeType;
    }

    function setComment($comment) {
        $this->comment = $comment;
    }

    function setUserId($userId) {
        $this->userId = $userId;
    }

    function setCafeId($cafeId) {
        $this->cafeId = $cafeId;
    }

    function setStatus($status) {
        $this->status = $status;
    }

    function setRating($rating) {
        $this->rating = $rating;
    }


}
