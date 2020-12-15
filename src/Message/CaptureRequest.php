<?php

namespace Omnipay\BanqueMisr\Message;

use Omnipay\BanqueMisr\Constants;
use Omnipay\BanqueMisr\Message\AbstractRequest;
use Omnipay\Common\Exception\InvalidRequestException;

class CaptureRequest extends AbstractRequest
{


    /**
     * @return array
     * @throws InvalidRequestException
     */

    public function getData(): array
    {
        $this->validate('transactionReference');
        $this->validate('transactionId');
        $this->validate('amount');
        $this->validate('currency');

//"apiOperation": "CAPTURE",
//"transaction":
//"amount":5,
//"currency":"EGP"

        return [
            'transactionReference' => $this->getTransactionReference(),
            'transactionId' => $this->getTransactionId(),
            'apiOperation' => 'CAPTURE',
            'transaction' => [
                'amount' => $this->getAmount(),
                'currency' => $this->getCurrency(),
            ]
        ];
    }


    /**
     * {@inheritdoc}
     */
    public function sendData($data)
    {
        unset($data['transactionReference']);
        unset($data['transactionId']);
        $httpResponse = $this->httpClient->request(
            $this->getHttpMethod(),
            Constants::geTransactionUrl() . $this->getTransactionReference() . '/transaction/' . $this->getTransactionId(),
            $this->getHeaders(),
            json_encode($data, true)
        );

        return $this->createResponse($httpResponse->getBody()->getContents(), $httpResponse->getHeaders());

    }

    protected function createResponse($data, $headers = []): CaptureResponse
    {
        return $this->response = new CaptureResponse($this, $data, $headers);
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
        return 'PUT';
    }
}
