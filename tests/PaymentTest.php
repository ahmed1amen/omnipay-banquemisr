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
        /**
         * @var $gateway  BanqueMisr\Gateway
         * */
        $gateway = Omnipay::create('BanqueMisr');

        $gateway->initialize([
//            'merchantId' => 'TESTREV_INST_6',
//            'apiUsername' => 'merchant.TESTREV_INST_6',
//            'apiPassword' => '1986113b27bfe589798fe160cdff4cc7',

            'merchantId' => 'TESTMEDIAGATE_EG',
            'apiUsername' => 'merchant.TESTMEDIAGATE_EG',
            'apiPassword' => 'b78d20b909be0b4b7d8c5d3c431ef163',

            'version' => '57',
            'currency' => 'EGP',
            'testMode' => false


        ]);
            $resp= $gateway->order()->setTransactionReference('bc3224e6-ca4e-4307-902e-3e18a0b71e04')->send();
        dd($resp->isSuccessful());

        $gateway->setTestMode(false);







    }




}
