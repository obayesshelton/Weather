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

            var_dump($summary->dailysummary[0]->fog);exit;

            echo $i . date('md') . "\n";

            if(isset($summary[0])) {

                echo "SAVING \n";

                $history = new \History();

                $history->date = '';//NEEEDED;
                $history->location_id = $summary->dailysummary[0]->location_id;
                $history->fog = $summary->dailysummary[0]->fog;
                $history->rain = $summary->dailysummary[0]->rain;
                $history->snow = $summary->dailysummary[0]->snow;
                $history->snow_fall_m = $summary->dailysummary[0]->snow_fall_m;
                $history->snow_fall_i = $summary->dailysummary[0]->snow_fall_i;
                $history->since_1_month_to_date_snow_fall_m = $summary->dailysummary[0]->since_1_month_to_date_snow_fall_m;
                $history->month_to_date_snow_fall_i = $summary->dailysummary[0]->month_to_date_snow_fall_i;
                $history->since_1jul_snow_fall_m = $summary->dailysummary[0]->since_1jul_snow_fall_m;
                $history->since_1jul_snow_fall_i = $summary->dailysummary[0]->since_1jul_snow_fall_i;
                $history->snow_depth_m = $summary->dailysummary[0]->snow_depth_m;
                $history->snow_depth_i = $summary->dailysummary[0]->snow_depth_i;
                $history->hail = $summary->dailysummary[0]->hail;
                $history->thunder = $summary->dailysummary[0]->thunder;
                $history->tornado = $summary->dailysummary[0]->tornado;
                $history->mean_temp_m = $summary->dailysummary[0]->mean_temp_m;
                $history->mean_temp_i = $summary->dailysummary[0]->mean_temp_i;
                $history->mean_dew_pt_m = $summary->dailysummary[0]->mean_dew_pt_m;
                $history->mean_dew_pt_i = $summary->dailysummary[0]->mean_dew_pt_i;
                $history->mean_pressure_m = $summary->dailysummary[0]->mean_pressure_m;
                $history->mean_pressure_i = $summary->dailysummary[0]->mean_pressure_i;
                $history->mean_wind_spd_m = $summary->dailysummary[0]->mean_wind_spd_m;
                $history->mean_wind_spd_i = $summary->dailysummary[0]->mean_wind_spd_i;
                $history->mean_w_dir_e = $summary->dailysummary[0]->mean_w_dir_e;
                $history->mean_w_dir_d = $summary->dailysummary[0]->mean_w_dir_d;
                $history->mean_vis_m = $summary->dailysummary[0]->mean_vis_m;
                $history->mean_vis_i = $summary->dailysummary[0]->mean_vis_i;
                $history->humidity = $summary->dailysummary[0]->humidity;
                $history->max_temp_m = $summary->dailysummary[0]->max_temp_m;
                $history->max_temp_i = $summary->dailysummary[0]->max_temp_i;
                $history->min_temp_m = $summary->dailysummary[0]->min_temp_m;
                $history->min_temp_i = $summary->dailysummary[0]->min_temp_i;
                $history->max_humidity = $summary->dailysummary[0]->max_humidity;
                $history->min_humidity = $summary->dailysummary[0]->min_humidity;
                $history->max_dew_pt_m = $summary->dailysummary[0]->max_dew_pt_m;
                $history->max_dew_pt_i = $summary->dailysummary[0]->max_dew_pt_i;
                $history->min_dew_pt_m = $summary->dailysummary[0]->min_dew_pt_m;
                $history->min_dew_pt_i = $summary->dailysummary[0]->min_dew_pt_i;
                $history->max_pressure_m = $summary->dailysummary[0]->max_pressure_m;
                $history->max_pressure_i = $summary->dailysummary[0]->max_pressure_i;
                $history->min_pressure_m = $summary->dailysummary[0]->min_pressure_m;
                $history->min_pressure_i = $summary->dailysummary[0]->min_pressure_i;
                $history->max_w_spd_m = $summary->dailysummary[0]->max_w_spd_m;
                $history->max_w_spd_i = $summary->dailysummary[0]->max_w_spd_i;
                $history->min_w_spd_m = $summary->dailysummary[0]->min_w_spd_m;
                $history->min_w_spd_i = $summary->dailysummary[0]->min_w_spd_i;
                $history->max_vism = $summary->dailysummary[0]->max_vism;
                $history->max_visi = $summary->dailysummary[0]->max_visi;
                $history->min_vism = $summary->dailysummary[0]->min_vism;
                $history->min_visi = $summary->dailysummary[0]->min_visi;
                $history->g_degree_days = $summary->dailysummary[0]->g_degree_days;
                $history->heating_degree_days = $summary->dailysummary[0]->heating_degree_days;
                $history->cooling_degree_days = $summary->dailysummary[0]->cooling_degree_days;
                $history->precip_m = $summary->dailysummary[0]->precip_m;
                $history->precip_i = $summary->dailysummary[0]->precip_i;
                $history->precip_source = $summary->dailysummary[0]->precip_source;
                $history->heating_degree_daysnormal = $summary->dailysummary[0]->heating_degree_daysnormal;
                $history->month_to_date_heating_degree_days = $summary->dailysummary[0]->month_to_date_heating_degree_days;
                $history->month_to_date_heating_degree_days_normal = $summary->dailysummary[0]->month_to_date_heating_degree_days_normal;
                $history->since_1_sep_heating_degree_days = $summary->dailysummary[0]->since_1_sep_heating_degree_days;
                $history->since_1_sep_heating_degree_days_normal = $summary->dailysummary[0]->since_1_sep_heating_degree_days_normal;
                $history->since_1_jul_heating_degree_days = $summary->dailysummary[0]->since_1_jul_heating_degree_days;
                $history->since_1_jul_heating_degree_days_normal = $summary->dailysummary[0]->since_1_jul_heating_degree_days_normal;
                $history->cooling_degree_daysnormal = $summary->dailysummary[0]->cooling_degree_daysnormal;
                $history->since_1_month_to_date_cooling_degree_days = $summary->dailysummary[0]->since_1_month_to_date_cooling_degree_days;
                $history->since_1_month_to_date_cooling_degree_days_normal = $summary->dailysummary[0]->since_1_month_to_date_cooling_degree_days_normal;
                $history->status = 1;

                $history->save();

            }

            $i++;
        }
    }
}