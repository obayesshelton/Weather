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
    public $locationID;

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
    public $humidity;

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
            'id'          => 'id',
            'location_id' => 'id',
            'date'        => 'id',
            'wind'        => 'id',
            'temp'        => 'id',
            'temp_type'   => 'id',
            'icon'        => 'id',
            'summary'     => 'id',
            'humidity'    => 'id',
            'status'      => 'id',
        );
    }

}
