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
    public $wind;

    /**
     *
     * @var string
     */
    public $windDir;

    /**
     *
     * @var float
     */
    public $pressure;

    /**
     *
     * @var float
     */
    public $humidity;

    /**
     *
     * @var int
     */
    public $temp;

    /**
     *
     * @var int
     */
    public $tempType;

    /**
     *
     * @var int
     */
    public $icon;

    /**
     *
     * @var varchar
     */
    public $summary;

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
            'snowfallm' => 'snowfallm',
            'snowfalli' => 'snowfalli',
            'monthtodatesnowfallm' => 'monthtodatesnowfallm',
            'monthtodatesnowfalli' => 'monthtodatesnowfalli',
            'since1julsnowfallm' => 'since1julsnowfallm',
            'since1julsnowfalli' => 'since1julsnowfalli',
            'snowdepthm' => 'snowdepthm',
            'snowdepthi' => 'snowdepthi',
            'hail' => 'hail',
            'thunder' => 'thunder',
            'tornado' => 'tornado',
            'meantempm' => 'meantempm',
            'meantempi' => 'meantempi',
            'meandewptm' => 'meandewptm',
            'meandewpti' => 'meandewpti',
            'meanpressurem' => 'meanpressurem',
            'meanpressurei' => 'meanpressurei',
            'meanwindspdm' => 'meanwindspdm',
            'meanwindspdi' => 'meanwindspdi',
            'meanwdire' => 'meanwdire',
            'meanwdird' => 'meanwdird',
            'meanvism' => 'meanvism',
            'meanvisi' => 'meanvisi',
            'humidity' => 'humidity',
            'maxtempm' => 'maxtempm',
            'maxtempi' => 'maxtempi',
            'mintempm' => 'mintempm',
            'mintempi' => 'mintempi',
            'maxhumidity' => 'maxhumidity',
            'minhumidity' => 'minhumidity',
            'maxdewptm' => 'maxdewptm',
            'maxdewpti' => 'maxdewpti',
            'mindewptm' => 'mindewptm',
            'mindewpti' => 'mindewpti',
            'maxpressurem' => 'maxpressurem',
            'maxpressurei' => 'maxpressurei',
            'minpressurem' => 'minpressurem',
            'minpressurei' => 'minpressurei',
            'maxwspdm' => 'maxwspdm',
            'maxwspdi' => 'maxwspdi',
            'minwspdm' => 'minwspdm',
            'minwspdi' => 'minwspdi',
            'maxvism' => 'maxvism',
            'maxvisi' => 'maxvisi',
            'minvism' => 'minvism',
            'minvisi' => 'minvisi',
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
