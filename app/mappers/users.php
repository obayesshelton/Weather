<?php

use Phalcon\Mvc\Model\Validator\Email;

class Users extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id;

    /**
     *
     * @var string
     */
    public $title;

    /**
     *
     * @var string
     */
    public $first_name;

    /**
     *
     * @var string
     */
    public $last_name;

    /**
     *
     * @var string
     */
    public $email;

    /**
     *
     * @var string
     */
    public $job_title;
     
    /**
     *
     * @var string
     */
    public $password;

    /**
     *
     * @var integer
     */
    public $password_status;
     
    /**
     *
     * @var string
     */
    public $token;
     
    /**
     *
     * @var string
     */
    public $auth_expiry;
     
    /**
     *
     * @var string
     */
    public $last_logged_in;

    /**
     *
     * @var integer
     */
    public $status;

    /**
     *
     * @var string
     */
    public $date_created;

    /**
     * initialize
     */
    public function initialize()
    {
        $this->hasMany("id", "Acl", "users_id");
        $this->hasMany("id", "AclUsersToOverrides", "users_id");
    }

    /**
     * Validations and business logic
     */
    public function validation()
    {
        $this->validate(
            new Email(
                array(
                    "field"    => "email",
                    "required" => true,
                )
            )
        );
        if ($this->validationHasFailed() == true) {
            return false;
        }
    }

    /**
     * Independent Column Mapping.
     */
    public function columnMap() {
        return array(
            'id'              => 'id',
            'title'           => 'title',
            'first_name'      => 'first_name',
            'last_name'       => 'last_name',
            'email'           => 'email',
            'job_title'       => 'job_title',
            'password'        => 'password',
            'token'           => 'token',
            'auth_expiry'     => 'auth_expiry',
            'last_logged_in'  => 'last_logged_in',
            'status'          => 'status',
            'date_created'    => 'date_created',
            'password_status' => 'password_status'
        );
    }

}
