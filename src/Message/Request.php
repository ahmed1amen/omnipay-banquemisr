<?php

namespace Omnipay\BanqueMisr\Message;


use GuzzleHttp\Client;
use Omnipay\BanqueMisr\UrlBuilder;


class Request extends AbstractRequest
{

    public function getData()
    {
        return [];
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
        return 'GET';
    }
}