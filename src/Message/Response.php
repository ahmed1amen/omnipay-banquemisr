<?php

namespace Omnipay\BanqueMisr\Message;


class Response extends AbstractResponse
{

    public function getMessage()
    {


        return $this->data;
    }

}