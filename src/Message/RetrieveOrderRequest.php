<?php

namespace Omnipay\BanqueMisr\Message;

use Omnipay\BanqueMisr\Constants;
use Omnipay\Common\Exception\InvalidRequestException;

class RetrieveOrderRequest extends AbstractRequest
{



    /**
     * @return array
     * @throws InvalidRequestException
     */

    public function getData(): array
    {

        $this->validate('transactionReference');
        return ['transactionReference' => $this->getTransactionReference()];
    }


    /**
     * {@inheritdoc}
     */
    public function sendData($data)
    {
        $httpResponse = $this->httpClient->request(
            $this->getHttpMethod(),
            Constants::getRetrieveOrderUrl() . $this->getTransactionReference(),
            $this->getHeaders(),
            );

        return $this->createResponse($httpResponse->getBody()->getContents(), $httpResponse->getHeaders());

    }

    protected function createResponse($data, $headers = []): RetrieveOrderResponse
    {
        return $this->response = new RetrieveOrderResponse($this, $data, $headers);
    }


    /**
     * Get HTTP Method.
     *
     * This is nearly always POST but can be over-ridden in sub classes.
     *
     * @return string
     */
    public function getHttpMethod(): string
    {
        return 'GET';
    }
}
