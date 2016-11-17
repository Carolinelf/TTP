<?php

class CafeMapper {

    private function __construct() {
    }

    /*
     * Maps an array to a User Object
     * @param cafe $cafe
     * @param array $properties
     */

    public static function map(Cafe $cafe, array $properties) {
        if (array_key_exists('id', $properties)) {
            $cafe->setId($properties['id']);
        }
        if (array_key_exists('name', $properties)) {
            $cafe->setName($properties['name']);
        }
        if (array_key_exists('location', $properties)) {
            $cafe->setLocation($properties['location']);
        }
        if (array_key_exists('overview', $properties)) {
            $cafe->setOverview($properties['overview']);
        }
        if (array_key_exists('verage_rating', $properties)) {
            $cafe->getAverage_rating($properties['verage_rating']);
        }
    }
}