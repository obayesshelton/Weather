<?php

namespace Weather\Services;

class History
{

    public $weatherArray = array();

    public function setWeather(array $data)
    {
        $this->weatherArray = $data;
    }

    public function getWeather()
    {
        return $this->weatherArray;
    }
}