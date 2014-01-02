<?php

namespace Weather\Services;

class Location
{

    public $location = array();

    public function setLocation(array $data)
    {
        $this->location = $data;
    }

    public function getLocation()
    {
        return $this->location;
    }
}