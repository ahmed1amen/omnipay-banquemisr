<?php

namespace Omnipay\BanqueMisr\Message;

use Exception;
use Omnipay\BanqueMisr\Constants;
use Omnipay\Common\Http\ClientInterface;
use Omnipay\Common\Message\AbstractRequest as BaseAbstractRequest;
use phpDocumentor\Reflection\Types\This;
use Symfony\Component\HttpFoundation\Request as HttpRequest;



abstract class AbstractRequest extends BaseAbstractRequest

{


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


    protected function createResponse($data, $headers = [])
    {
        return $this->response = new Response($this, $data, $headers);
    }

    /**
     * {@inheritdoc}
     */
    public function sendData($data)
    {


        // Guzzle HTTP Client createRequest does funny things when a GET request
        // has attached data, so don't send the data if the method is GET.
        if ($this->getHttpMethod() == 'GET') {
            $requestUrl = $this->getEndpoint() . '?' . http_build_query($data);
            $body = null;
        } else {
            $body = json_encode($data);
            $requestUrl = $this->getEndpoint();
        }


        $httpResponse = $this->httpClient->request(
            $this->getHttpMethod(),
            Constants::getGatewayBaseUrl(),
            $this->getHeaders(),
            $body
        );


        return $this->createResponse($httpResponse->getBody()->getContents(), $httpResponse->getHeaders());
    }



    public function getHeaders()
    {
        $headers = array();
        $headers['Accept'] = 'application/json';
        $headers['Content-Type'] = 'application/json; utf-8';
        $headers ['Authorization'] = 'Basic ' . base64_encode($this->getApiUsername() . ':' . $this->getApiPassword());
        return $headers;
    }
    public function getVersion()
    {
        return $this->getParameter('version');
    }
    public function setVersion($value)
    {
        return $this->setParameter('version', $value);
    }
    public function getApiUsername()
    {
        return $this->getParameter('apiUsername');
    }
    public function setApiUsername($value)
    {
        return $this->setParameter('apiUsername', $value);
    }
    public function getApiPassword()
    {
        return $this->getParameter('apiPassword');
    }
    public function setApiPassword($value)
    {
        return $this->setParameter('apiPassword', $value);
    }
    public function getMerchantId()
    {
        return $this->getParameter('merchantId');
    }
    public function setMerchantId($value)
    {
        return $this->setParameter('merchantId',$value);
    }

    public function getBaseData()
    {
        $data = array();
        $data['apiUsername'] = $this->getApiUsername();
        $data['apiUsername'] = $this->getApiUsername();
        $data['version'] = $this->getVersion();
        $data['merchantId'] = $this->getMerchantId();
        $data['currency'] = $this->getCurrency();
        $data['getAmount'] = $this->getAmount();


        return $data;
    }

}