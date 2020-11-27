<?php

namespace Omnipay\BanqueMisr\Message;

use GuzzleHttp\Client;
use Omnipay\BanqueMisr\Constants;

class SessionRequest extends AbstractRequest
{


    public function getData()
    {

        return [
            "apiOperation" => "CREATE_CHECKOUT_SESSION",
            "interaction" => [
                "operation" => "AUTHORIZE"
            ],
            "order" => [
                "id" => 'oishfd8pq92sfpa9hsdf9', //$this->getTransactionReference(),
                "amount" => $this->getAmount(),
                "currency" => $this->getCurrency()
            ]
        ];
    }


    /**
     * {@inheritdoc}
     */
    public function sendData($data)
    {
        $httpResponse = $this->httpClient->request(
            $this->getHttpMethod(),
            Constants::getGatewayBaseUrl(),
            $this->getHeaders(),
            json_encode($data)
        );


        return $this->createResponse($httpResponse->getBody()->getContents(), $httpResponse->getHeaders());
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
}