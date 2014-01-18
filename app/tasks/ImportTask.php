<?php

use Phalcon\Tag,
    Phalcon\Mvc\Model\Criteria,
    Phalcon\Cache\Frontend\Data,
    Phalcon\Cache\Backend\File,
    Service\Json;

class importTask extends \Phalcon\CLI\Task
{

    public function locationAction() {

        $row = 1;
        if (($handle = fopen("data/locations.csv", "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $num = count($data);

                $row++;

                $location = new \Location();

                for ($c=0; $c < $num; $c++) {

                    if($row === 2) {

                    } else {

                        echo ". \n";

                        $location->town = $data[0];
                        $location->county = $data[1];
                        $location->country = $data[2];
                        $location->status = 1;

                    }
                    $location->save();
                }
            }
            fclose($handle);
        }

    }

    public function historyAction() {

        $wunderground = $this->getDI()->get('Services\Wunderground'); /* @var \Service\Wunderground $qunderground */

        $i = 2000;

        while($i <= 2014) {
            $summary = $wunderground->getHistoricWeather('20140101')->history;

            var_dump($summary->dailysummary[0]->date->pretty);exit;

            echo $i . date('md') . "\n";

            if(isset($summary[0])) {

                echo "SAVING \n";

                $history = new \History();

                $history->locationID = 992;
                $history->date = $i . date('md');
                $history->wind = $summary[0]->meanwindspdm;
                $history->windDir = $summary[0]->meanwdire;
                $history->pressure = $summary[0]->minpressurem;
                $history->humidity = $summary[0]->humidity;
                $history->temp = $summary[0]->meantempm;
                $history->tempType = 1;
                $history->icon = 1;
                $history->summary = '??';
                $history->status = 1;

                $history->save();

            }

            $i++;
        }
    }
}