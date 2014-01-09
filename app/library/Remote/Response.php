<?php
/**
 * backoffice.stormportal.randomstorm.com description
 * 
 * @author Thomas Gray <thomas.gray@randomstorm.com>
 * @package 
 * @subpackage 
 */

namespace Remote;


class Response implements \ArrayAccess
{
    protected $lastError = null;

    protected $allowedCodes = array(200, 201, 0);

    /**
     * Constructor sets the data as properties.
     * @param array $data
     */
    public function __construct($data)
    {
        $data = get_object_vars($data);
        foreach($data as $key => $value)
        {
            $this->{$key} = $value;
        }
    }

    public function isValid()
    {
        if(!property_exists($this, 'code') || !property_exists($this, 'status'))
        {
            // Cannot check, no code or status returned
            $this->setLastError('The server did not return a status/code property in it\'s response!');
            var_dump($this);
            die();
            return false;
        }

        return true;
    }

    /**
     * setLastError sets the lastError property in object storage
     *
     * @param null $lastError
     * @throws InvalidArgumentException
     * @return Response
     */
    public function setLastError($lastError)
    {
        if (empty($lastError))
        {
            throw new \InvalidArgumentException(__METHOD__ . ' cannot accept an empty lastError');
        }
        $this->lastError = $lastError;
        return $this;
    }

    /**
     * getLastError returns the lastError from the object
     *
     * @return null
     */
    public function getLastError()
    {
        return $this->lastError;
    }


    /**
     * Set a value within the response
     * @param mixed $offset
     * @param mixed $value
     * @return $this|void
     */
    public function offsetSet($offset, $value)
    {
        $this->{$offset} = $value;
        return $this;
    }

    /**
     * Unset an item within the response
     * @param mixed $offset
     * @return $this|void
     */
    public function offsetUnset($offset)
    {
        unset($this->{$offset});
        return $this;
    }

    /**
     * Check if an item exists
     * @param mixed $offset
     * @return bool
     */
    public function offsetExists($offset)
    {
        return property_exists($this, $offset);
    }

    /**
     * Retrieves an offset
     * @param mixed $offset
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return $this->{$offset};
    }
}