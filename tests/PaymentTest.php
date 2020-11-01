<?php

namespace Omnipay\BanqueMisr;
use Omnipay\BanqueMisr;
use GuzzleHttp\Client;
use JMS\Serializer\SerializerInterface;
use Omnipay\Omnipay;
use Omnipay\Tests\GatewayTestCase;

class GatewayTest extends GatewayTestCase
{
    public function testSesstion()
    {
        $gateway = Omnipay::create('BanqueMisr');

        $gateway->setConfig([
            'testMode' => false,
            'settings' => [
                'merchantId' => 'TESTMEDIAGATE_EG',
                'apiUsername' => "merchant." . 'TESTMEDIAGATE_EG',
                'password' => '123123123123',
                'debug' => 'TRUE',
                'version' =>'57',
                'currency' => 'USD',
                'certificatePath' =>'',
                //IMPORTANT: Ensure that you set these flags to TRUE in Production. The Test certificate is self signed and doesn't really need these to be set in Development.
                // By default they are set to PRODUCTION env values
                'verifyPeer' =>  TRUE,
                'verifyHost' => 1
            ]


        ]);

        dd(   $gateway->getConfig());

        $gateway->setTestMode(false);







    }


    

}
