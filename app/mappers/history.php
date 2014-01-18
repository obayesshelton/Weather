<?php

use Phalcon\Mvc\Model\Validator\Email;

class History extends \Phalcon\Mvc\Model
{
    /**
     *
     * @var int
     */
    public $id;

    /**
     *
     * @var int
     */
    public $location_id;

    /**
     *
     * @var date
     */
    public $date;

    /**
     *
     * @var int
     */
    public $fog;

    /**
     *
     * @var int
     */
    public $rain;

    /**
     *
     * @var int
     */
     public $snow;

    /**
     *
     * @var int
     */
     public $snow_fall_m;
    
    /**
     *
     * @var int
     */
    public $snow_fall_i;
    /**
     *
     * @var int
     */
    public $month_to_date_snow_fall_m;
    /**
     *
     * @var int
     */
    public $month_to_date_snow_fall_i;
    /**
     *
     * @var int
     */
    public $since1julsnow_fall_m;
    /**
     *
     * @var int
     */
    public $since1julsnow_fall_i;
    /**
     *
     * @var int
     */
    public $snow_depth_m;
    /**
     *
     * @var int
     */
    public $snow_depth_i;
    /**
     *
     * @var int
     */
    public $hail;
    /**
     *
     * @var int
     */
    public $thunder;
    /**
     *
     * @var int
     */
    public $tornado;
    /**
     *
     * @var int
     */
    public $mean_temp_m;
    /**
     *
     * @var int
     */
    public $mean_temp_i;
    /**
     *
     * @var int
     */
    public $mean_dew_pt_m;
    /**
     *
     * @var int
     */
    public $mean_dew_pt_i;
    /**
     *
     * @var int
     */
    public $mean_pressure_m;
    /**
     *
     * @var int
     */
    public $mean_pressure_i;
    /**
     *
     * @var int
     */
    public $mean_wind_spd_m;
    /**
     *
     * @var int
     */
    public $mean_wind_spd_i;
    /**
     *
     * @var int
     */
    public $mean_w_dir_e;
    /**
     *
     * @var int
     */
    public $mean_w_dir_d;
    /**
     *
     * @var int
     */
    public $mean_vis_m;
    /**
     *
     * @var int
     */
    public $mean_vis_i;
    /**
     *
     * @var int
     */
    public $humidity;
    /**
     *
     * @var int
     */
    public $max_temp_m;
    /**
     *
     * @var int
     */
    public $max_temp_i;
    /**
     *
     * @var int
     */
    public $min_temp_m;
    /**
     *
     * @var int
     */
    public $min_temp_i;
    /**
     *
     * @var int
     */
    public $max_humidity;
    /**
     *
     * @var int
     */
    public $min_humidity;
    /**
     *
     * @var int
     */
    public $max_dew_pt_m;
    /**
     *
     * @var int
     */
    public $max_dew_pt_i;
    /**
     *
     * @var int
     */
    public $min_dew_pt_m;
    /**
     *
     * @var int
     */
    public $min_dew_pt_i;
    /**
     *
     * @var int
     */
    public $max_pressure_m;
    /**
     *
     * @var int
     */
    public $max_pressure_i;
    /**
     *
     * @var int
     */
    public $min_pressure_m;
    /**
     *
     * @var int
     */
    public $min_pressure_i;
    /**
     *
     * @var int
     */
    public $max_w_spd_m;
    /**
     *
     * @var int
     */
    public $max_w_spd_i;
    /**
     *
     * @var int
     */
    public $min_w_spd_m;
    /**
     *
     * @var int
     */
    public $min_w_spd_i;
    /**
     *
     * @var int
     */
    public $max_vism;
    /**
     *
     * @var int
     */
    public $max_visi;
    /**
     *
     * @var int
     */
    public $min_vism;
    /**
     *
     * @var int
     */
    public $min_visi;
    /**
     *
     * @var int
     */
    public $gdegreedays;
    /**
     *
     * @var int
     */
    public $heatingdegreedays;
    /**
     *
     * @var int
     */
    public $coolingdegreedays;
    /**
     *
     * @var int
     */
    public $precipm;
    /**
     *
     * @var int
     */
    public $precipi;
    /**
     *
     * @var int
     */
    public $precipsource;
    /**
     *
     * @var int
     */
    public $heatingdegreedaysnormal;
    /**
     *
     * @var int
     */
    public $monthtodateheatingdegreedays;
    /**
     *
     * @var int
     */
    public $monthtodateheatingdegreedaysnormal;
    /**
     *
     * @var int
     */
    public $since1sepheatingdegreedays;
    /**
     *
     * @var int
     */
    public $since1sepheatingdegreedaysnormal;
    /**
     *
     * @var int
     */
    public $since1julheatingdegreedays;
    /**
     *
     * @var int
     */
    public $since1julheatingdegreedaysnormal;
    /**
     *
     * @var int
     */
    public $coolingdegreedaysnormal;
    /**
     *
     * @var int
     */
    public $monthtodatecoolingdegreedays;
    
    /**
     *
     * @var int
     */
    public $monthtodatecoolingdegreedaysnormal;
    
    /**
     *
     * @var int
     */
    public $since1sepcoolingdegreedays;
    
    /**
     *
     * @var int
     */
    public $since1sepcoolingdegreedaysnormal;
    
    /**
     *
     * @var int
     */
    public $since1jancoolingdegreedays;
    
    /**
     *
     * @var int
     */
     public $since1jancoolingdegreedaysnormal;

    /**
     *
     * @var int
     */
    public $status;

    /**
     * initialize
     */
    public function initialize()
    {
    }

    /**
     * Validations and business logic
     */
    public function validation()
    {
    }

    /**
     * Independent Column Mapping.
     */
    public function columnMap() {
        return array(
            'id' => 'id',
            'date' => 'date',
            'location_id' => 'location_id',
            'fog' => 'fog',
            'rain' => 'rain',
            'snow' => 'snow',
            'snow_fall_m' => 'snow_fall_m',
            'snow_fall_i' => 'snow_fall_i',
            'monthtodatesnow_fall_m' => 'monthtodatesnow_fall_m',
            'monthtodatesnow_fall_i' => 'monthtodatesnow_fall_i',
            'since1julsnow_fall_m' => 'since1julsnow_fall_m',
            'since1julsnow_fall_i' => 'since1julsnow_fall_i',
            'snow_depth_m' => 'snow_depth_m',
            'snow_depth_i' => 'snow_depth_i',
            'hail' => 'hail',
            'thunder' => 'thunder',
            'tornado' => 'tornado',
            'mean_temp_m' => 'mean_temp_m',
            'mean_temp_i' => 'mean_temp_i',
            'mean_dew_pt_m' => 'mean_dew_pt_m',
            'mean_dew_pt_i' => 'mean_dew_pt_i',
            'mean_pressure_m' => 'mean_pressure_m',
            'mean_pressure_i' => 'mean_pressure_i',
            'mean_wind_spd_m' => 'mean_wind_spd_m',
            'mean_wind_spd_i' => 'mean_wind_spd_i',
            'mean_w_dir_e' => 'mean_w_dir_e',
            'mean_w_dir_d' => 'mean_w_dir_d',
            'mean_vis_m' => 'mean_vis_m',
            'mean_vis_i' => 'mean_vis_i',
            'humidity' => 'humidity',
            'max_temp_m' => 'max_temp_m',
            'max_temp_i' => 'max_temp_i',
            'min_temp_m' => 'min_temp_m',
            'min_temp_i' => 'min_temp_i',
            'max_humidity' => 'max_humidity',
            'min_humidity' => 'min_humidity',
            'max_dew_pt_m' => 'max_dew_pt_m',
            'max_dew_pt_i' => 'max_dew_pt_i',
            'min_dew_pt_m' => 'min_dew_pt_m',
            'min_dew_pt_i' => 'min_dew_pt_i',
            'max_pressure_m' => 'max_pressure_m',
            'max_pressure_i' => 'max_pressure_i',
            'min_pressure_m' => 'min_pressure_m',
            'min_pressure_i' => 'min_pressure_i',
            'max_w_spd_m' => 'max_w_spd_m',
            'max_w_spd_i' => 'max_w_spd_i',
            'min_w_spd_m' => 'min_w_spd_m',
            'min_w_spd_i' => 'min_w_spd_i',
            'max_vism' => 'max_vism',
            'max_visi' => 'max_visi',
            'min_vism' => 'min_vism',
            'min_visi' => 'min_visi',
            'gdegreedays' => 'gdegreedays',
            'heatingdegreedays' => 'heatingdegreedays',
            'coolingdegreedays' => 'coolingdegreedays',
            'precipm' => 'precipm',
            'precipi' => 'precipi',
            'precipsource' => 'precipsource',
            'heatingdegreedaysnormal' => 'heatingdegreedaysnormal',
            'monthtodateheatingdegreedays' => 'monthtodateheatingdegreedays',
            'monthtodateheatingdegreedaysnormal' => 'monthtodateheatingdegreedaysnormal',
            'since1sepheatingdegreedays' => 'since1sepheatingdegreedays',
            'since1sepheatingdegreedaysnormal' => 'since1sepheatingdegreedaysnormal',
            'since1julheatingdegreedays' => 'since1julheatingdegreedays',
            'since1julheatingdegreedaysnormal' => 'since1julheatingdegreedaysnormal',
            'coolingdegreedaysnormal' => 'coolingdegreedaysnormal',
            'monthtodatecoolingdegreedays' => 'monthtodatecoolingdegreedays',
            'monthtodatecoolingdegreedaysnormal' => 'monthtodatecoolingdegreedaysnormal',
            'status'=> 'status',
        );
    }

}
