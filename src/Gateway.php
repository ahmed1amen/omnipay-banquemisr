<?php

namespace Omnipay\BanqueMisr;

use Omnipay\Common\AbstractGateway;
use Omnipay\Common\Helper;
use Omnipay\Common\Message\NotificationInterface;
use Omnipay\Common\Message\RequestInterface;
use Symfony\Component\HttpFoundation\ParameterBag;

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

        return [
            'merchantId'=>'',
            'apiUsername'=>'',
            'apiPassword'=>'',
            'version'=>'57',
            'currency'=>'USD',
            'testMode'=>false
        ];
    }

    /**
     * Session Controller
     * @link https://banquemisr.gateway.mastercard.com/api/documentation/apiDocumentation/rest-json/version/57/operation/Session%3a%20Create%20Session.html?locale=en_US
     * @param array $parameters
     */
    public function session(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\BanqueMisr\Message\SessionRequest', $parameters);

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

    /**
     * Initialize this gateway with default parameters
     *
     * @param  array $parameters
     * @return $this
     */
    public function initialize(array $parameters = array())
    {
        parent::initialize($parameters);

        $config_array = [
            'testMode' => false,
            'settings' => [
                'gatewayBaseUrl' => Constants::BASE_URL,
                'pkiBaseUrl' => '',
                'hostedSessionUrl' => Constants::BASE_URL . '/form',
                'gatewayUrl' => Constants::BASE_URL . '/api/rest',
                'merchantId' => $this->getMerchantId(),
                'apiUsername' => $this->getApiUsername(),
                'password' => $this->getApiPassword(),
                'debug' => 'TRUE',
                'version' => $this->getVersion(),
                'currency' => $this->getCurrency(),
                'certificatePath' => '',
                'verifyPeer' => TRUE,
                'verifyHost' => 1
            ]
        ];
        Constants::__constructStatic($config_array['settings']);
        return $this;

    }
}
