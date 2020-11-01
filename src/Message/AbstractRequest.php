<?php

namespace Omnipay\BanqueMisr\Message;

use Exception;
use Omnipay\BanqueMisr\Constants;
use Omnipay\Common\Http\ClientInterface;
use Omnipay\Common\Message\AbstractRequest as BaseAbstractRequest;
use Symfony\Component\HttpFoundation\Request as HttpRequest;


abstract class AbstractRequest extends BaseAbstractRequest
{



    /**
     * Return the API endpoint.
     *
     * @return string
     */
    public function getBaseEndpoint()
    {
        return ($this->getTestMode() === false ? self::LIVE_ENDPOINT : self::TEST_ENDPOINT);
    }


    /**
     * Get HTTP Method.
     *
     * This is nearly always POST but can be over-ridden in sub classes.
     *
     * @return string
     */
    public function getHttpMethod()
    {
        return 'POST';
    }


    /**
     * {@inheritdoc}
     */
    public function sendData($data)
    {
        $headers = array_merge(
            $this->getHeaders(),
      array('Authorization' => 'Basic ' . base64_encode(Constants::getApiUsername(). ':' . Constants::getPassword()))
        );

        $httpResponse = $this->httpClient->request(
            $this->getHttpMethod(),
            $this->getEndpoint(),
            $headers,
            json_encode($data,true)
        );


        return $this->createResponse($httpResponse->getBody()->getContents(), $httpResponse->getHeaders());
    }

    protected function createResponse($data, $headers = [])
    {
        return $this->response = new Response($this, $data, $headers);
    }


    public function getHeaders()
    {
        $headers = array();
        $headers['Accept']='application/json';
        $headers['Content-Type']='application/json; utf-8';

        return $headers;
    }

}