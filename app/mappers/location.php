<?php

use Phalcon\Mvc\Model\Validator\Email;

class Location extends \Phalcon\Mvc\Model
{
    /**
     *
     * @var int
     */
    public $id;

    /**
     *
     * @var varchar
     */
    public $town;

    /**
     *
     * @var varchar
     */
    public $county;

    /**
     *
     * @var varchar
     */
    public $country;

    /**
     *
     * @var float
     */
    public $lat;

    /**
     *
     * @var float
     */
    public $lng;

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
            'town'        => 'town',
            'county'      => 'county',
            'country'     => 'country',
            'lat'         => 'lat',
            'lng'         => 'lng',
            'status'      => 'status',
        );
    }

}
