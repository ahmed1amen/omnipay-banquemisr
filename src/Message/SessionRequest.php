<?php

namespace Omnipay\BanqueMisr\Message;
use Omnipay\BanqueMisr\Constants;

class SessionRequest extends AbstractRequest
{

    public function getInteraction()
    {
        return $this->getParameter('interaction');
    }

    /**
     * Sets Interaction Session
     *
     * @param array $value
     * @return $this
     */
    public function setInteraction($value)
    {
        return $this->setParameter('interaction', $value);
    }


    public function getExtraData()
    {
        return $this->getParameter('extradata');
    }
    /**
     * Sets Extra Data To The Session Request.
     *
     * @param array $value
     * @return $this
     */
    public function setExtraData(array $value)
    {
        return $this->setParameter('extradata', $value);
    }

    public function getOrderNotificationUrl ()
    {
        return $this->getParameter('ordernotificationurl');
    }
    /**
     * Sets The URL to which the gateway will send Webhook notifications when an order is created or updated.....
    To receive notifications at this URL, you must enable Webhook notifications in Merchant Administration. Ensure the URL is HTTPS
     *
     * @param string $value
     * @return $this
     */
    public function setOrderNotificationUrl(string $value)
    {
        return $this->setParameter('ordernotificationurl', $value);
    }

    /**
     * @return array
     * @throws \Omnipay\Common\Exception\InvalidRequestException
     */

    public function getData()
    {

        $this->validate('interaction');
        return array_merge([
            "apiOperation" => "CREATE_CHECKOUT_SESSION",
            "interaction" =>$this->getInteraction(),
            "order" => [
                "id" => $this->getTransactionReference(),
                "amount" => $this->getAmount(),
                "notificationUrl" => $this->getOrderNotificationUrl()??'',
                "currency" => $this->getCurrency()
            ]
        ],

            $this->getExtraData()??[]


        );
    }


    /**
     * {@inheritdoc}
     */
    public function sendData($data)
    {
        $httpResponse = $this->httpClient->request(
            $this->getHttpMethod(),
            Constants::getCheckoutSessionUrl(),
            $this->getHeaders(),
            json_encode($data, true));

        return $this->createResponse($httpResponse->getBody()->getContents(), $httpResponse->getHeaders());

    }

    protected function createResponse($data, $headers = [])
    {
        return $this->response = new SessionResponse($this, $data, $headers);
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
