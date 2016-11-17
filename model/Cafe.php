<?php

class Cafe {
    
    private $id;
    private $name;
    private $location;
    private $overview;
    private $average_rating;

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

    function getAverage_rating() {
        return $this->average_rating;
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

    function setAverage_rating($average_rating) {
        $this->average_rating = $average_rating;
    }
}