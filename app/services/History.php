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

class History extends AbstractService
{
    public function getHistoricWeather($locationId = 1) {

        $history = \History::find(array(
            "location_id = :location_id: AND status = '1'",
            "bind" => array('location_id' => $locationId)
        ));

        if(!$history) {
            return false;
        }

        return $history;

    }

    public function getHistoricWeatherForChart($locationId = 1) {

        $history = \History::find(array(
            "location_id = :location_id: AND status = '1'",
            "bind" => array('location_id' => $locationId)
        ));


        if(!$history) {
            return false;
        }

        $historyChartArray = array();

        $i = 1;

        $text = '';

        foreach($history as $year) {
            $yearRaw = explode('-', $year->date);
            $text .= '[' . $yearRaw[0] . ', ' . $year->temp . '],';
        }

        return $text;
    }
}
