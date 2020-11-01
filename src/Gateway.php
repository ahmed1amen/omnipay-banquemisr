<?php

namespace Omnipay\BanqueMisr;

use Omnipay\Common\AbstractGateway;
use Omnipay\Common\Message\NotificationInterface;
use Omnipay\Common\Message\RequestInterface;

/**
 * @method NotificationInterface acceptNotification(array $options = array())
 * @method RequestInterface authorize(array $options = array())
 * @method RequestInterface completeAuthorize(array $options = array())
 * @method RequestInterface capture(array $options = array())
 * @method RequestInterface purchase(array $options = array())
 * @method RequestInterface completePurchase(array $options = array())
 * @method RequestInterface refund(array $options = array())
 * @method RequestInterface fetchTransaction(array $options = [])
 * @method RequestInterface void(array $options = array())
 * @method RequestInterface createCard(array $options = array())
 * @method RequestInterface updateCard(array $options = array())
 * @method RequestInterface deleteCard(array $options = array())
 */
class Gateway extends AbstractGateway
{

    public function getName()
    {
        return 'BanqueMisr';
    }

    public function getDefaultParameters()
    {

        $config_array = [
            'testMode' => false,
            'settings' => [
                'gatewayBaseUrl' => Constants::BASE_URL,
                'pkiBaseUrl' => '',
                'hostedSessionUrl' => Constants::BASE_URL . '/form',
                'gatewayUrl' => Constants::BASE_URL . '/api/rest',
                'merchantId' => $this->getMerchantId(),
                'apiUsername' => "merchant." . $this->getMerchantId(),
                'password' => Constants::getPassword(),
                'debug' => 'TRUE',
                'version' => $this->getVersion(),
                'currency' => $this->getCurrency(),
                'certificatePath' => '',
                //IMPORTANT: Ensure that you set these flags to TRUE in Production. The Test certificate is self signed and doesn't really need these to be set in Development.
                // By default they are set to PRODUCTION env values
                'verifyPeer' => TRUE,
                'verifyHost' => 1
            ]
        ];
        Constants::__constructStatic($config_array['settings']);
        return $config_array;
    }


    public function getConfig()
    {
        return $this->getParameter('config');
    }

    public function setConfig($value)
    {

        return $this->setParameter('config', $value);
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

    public function getMerchantId()
    {
        return $this->getParameter('merchantId');
    }

    public function setMerchantId()
    {
        return $this->setParameter('merchantId');
    }


}
