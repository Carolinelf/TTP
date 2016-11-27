<?php

class Cafe {
    
    private $id;
    private $name;
    private $location;
    private $overview;
    private $averageRating;

    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

    function getLocation() {
        return $this->location;
    }

    function getOverview() {
        return $this->overview;
    }

    function getAverageRating() {
        return $this->averageRating;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setLocation($location) {
        $this->location = $location;
    }

    function setOverview($overview) {
        $this->overview = $overview;
    }

    function setAverageRating($averageRating) {
        $this->averageRating = $averageRating;
    }
} 