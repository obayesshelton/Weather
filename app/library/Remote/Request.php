<?php
/**
 * backoffice.stormportal.randomstorm.com description
 * 
 * @author Thomas Gray <thomas.gray@randomstorm.com>
 * @package 
 * @subpackage 
 */

namespace Remote;

use Phalcon\Mvc\User\Component,
    Phalcon\Mvc\View;

class Request extends Component
{
    /**
     * @var string $url Base URL used to issue requests.
     */
    protected $url;

    /**
     * @var string|null $xAuth XAuth token for the users api interaction
     */
    protected $xAuth;

    public function __construct($url, $xAuth = null)
    {
        $this->setUrl($url);

        if(!is_null($xAuth))
        {
            $this->setXAuth($xAuth);
        }
    }

    /**
     * setXAuth sets the xAuth property in object storage
     *
     * @param null|string $xAuth
     * @throws \InvalidArgumentException
     * @return Request
     */
    public function setXAuth($xAuth)
    {
        if (empty($xAuth))
        {
            throw new \InvalidArgumentException(__METHOD__ . ' cannot accept an empty xAuth');
        }
        $this->xAuth = $xAuth;
        return $this;
    }

    /**
     * getXAuth returns the xAuth from the object
     *
     * @return null|string
     */
    public function getXAuth()
    {
        return $this->xAuth;
    }

    /**
     * setUrl sets the url property in object storage
     *
     * @param string $url
     * @throws \InvalidArgumentException
     * @return Request
     */
    public function setUrl($url)
    {
        if (empty($url))
        {
            throw new \InvalidArgumentException(__METHOD__ . ' cannot accept an empty url');
        }
        $this->url = rtrim($url, '/') .'/';
        return $this;
    }

    /**
     * getUrl returns the url from the object WITH a trailing slash
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Request method issues a request against the url defined in the url property.
     * @param string $interface
     * @param mixed $data
     * @param null|string $authToken
     * @return Response
     * @throws \RuntimeException
     */
    public function request($interface, $data = NULL)
    {
        $cache = $this->getDI()->get('cache');

        $cleanCacheName = str_replace('/', '_', $interface);

        $cacheKey = "requests/$cleanCacheName.cache";
        $request = null;

        if ($request === null) {

            // Because getUrl always returns a trailing slash, we strip the leading from $interface if it's there
            $curlHandle = curl_init($this->getUrl() . ltrim($interface, '/'));

            $authToken = $this->getXAuth();

            if(!is_null($authToken))
            {
                curl_setopt($curlHandle, CURLOPT_HTTPHEADER, array('x-auth:' . $authToken));
            }

            curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curlHandle, CURLOPT_CONNECTTIMEOUT, 6);
            curl_setopt($curlHandle, CURLOPT_CUSTOMREQUEST, (empty($data) ? 'GET' : 'POST'));
            curl_setopt($curlHandle, CURLOPT_SSL_VERIFYPEER, false);

            if(!empty($data))
            {
                if(is_array($data))
                {
                    $data = http_build_query($data);
                }

                curl_setopt($curlHandle, CURLOPT_POSTFIELDS, $data);
            }

            $response = curl_exec($curlHandle);

            $data = $this->getResponse($response);

            // Store it in the cache
            $cache->save($cacheKey, $data);

            return $data;
        }
        return $request;
    }

    protected function getResponse($response)
    {
        if(false === $response)
        {
            throw new \RuntimeException(__METHOD__ . ' failed to retrieve response from the remote API!');
        }

        $data = json_decode($response, false);

        if(!is_object($data))
        {
            throw new \RuntimeException(__METHOD__ . ' could not decode the response from the called interface');
        }

        $response = new Response($data);

        if(!$response->isValid())
        {
            throw new \RuntimeException('Response from remote server is not valid. Reason: ' . $response->getLastError());
        }

        return $response;
    }


}