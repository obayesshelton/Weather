<?php
/**
 * complysec description
 *
 * @author Oliver Bayes-Shelton <oliver.bayes-shelton@randomstorm.com>
 * @package
 * @subpackage
 */

namespace Services;

use Phalcon\Tag,
    Phalcon\Mvc\Model\Criteria,
    Service\Json;

class Wunderground
{
    /**
     * Api key from wunderground.com
     *
     * @var string
     */
    private $apiKey = '15d9da57b2e26350';
    private $get = 'conditions';

    /**
     * Your lang
     *
     * @var string
     */
    private $lang = 'PL';

    /**
     * Initialize country or state
     *
     * @var string
     */
    private $location = 'UK';

    /**
     * Initialize city
     *
     * @var string
     */
    private $city = 'Doncaster';
    private $json;

    public function __construct() {
    }

    /**
     * Get weather from api ,decode and save in $json
     */
    public function getAllWeather() {
        $apiUrl = 'http://api.wunderground.com/api/' . $this->apiKey . '/' . $this->get . '/q/' . $this->location . '/' . $this->city . '.json';
        return json_decode(file_get_contents($apiUrl));
    }

    /**
     * Get weather from api ,decode and save in $json
     */
    public function getHistoricWeather($date = '') {
        $apiUrl = 'http://api.wunderground.com/api/' . $this->apiKey . '/' . $this->get . '/history_' . $date . '/q/' . $this->location . '/' . $this->city . '.json';
        return json_decode(file_get_contents($apiUrl));
    }

    /**
     * Get weather icon with html tag if $imgTag is true
     *
     * @param bool $imgTag add tag if true
     * @return string
     */
    public function getWeatherIcon($imgTag = false) {
        $img = $this->json->current_observation->icon_url;
        if ($imgTag) {
            $img = "<img src='" . $img . "'/>";
        }
        return $img;
    }

    /**
     * Get temperature celcius if $c is true
     *
     * @param bool $c
     * @return string
     */
    public function getTemperature($c = true) {

        if ($c) {
            $out = $this->json->current_observation->temp_c;
        } else {
            $out = $this->json->current_observation->temp_f;
        }

        return $out;
    }

    /**
     * Get satelite .gif
     *
     * @param bool $imgTag
     * @return string
     */
    public function getSateliteImage() {
        $img = file_get_contents('http://api.wunderground.com/api/' . $this->apiKey . '/animatedsatellite/q/' . $this->location . '/' . $this->city . '.gif?key=sat_ir4&basemap=1&timelabel=1&timelabel.y=10&num=5&delay=50&radius=200');
        $img = '<img src="data:image/gif;base64,' . base64_encode($img) . '"/>';

        return $img;
    }

    /**
     * Set Language, http://www.wunderground.com/weather/api/d/docs?d=language-support
     *
     * @param string $lang
     */
    public function setLang($lang) {
        $this->lang = $lang;
    }

    /**
     *
     * @param string $location
     * @param string $city
     */
    public function setLocation($location, $city) {
        $this->location = $location;
        $this->city = $city;
    }

    /**
     * Get city name and country/state
     *
     * @return string
     */
    public function getLocation() {
        return $this->city . ', ' . $this->location;
    }

    /**
     *
     * @param string $apiKey
     */
    public function setApiKey($apiKey) {
        $this->apiKey = $apiKey;
    }
}
