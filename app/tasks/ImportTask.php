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

}