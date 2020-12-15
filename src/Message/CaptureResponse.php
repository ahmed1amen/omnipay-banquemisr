<?php

namespace Omnipay\BanqueMisr\Message;


class CaptureResponse extends AbstractResponse
{


    public function getMessage()
    {
        $this->request->getData();
        return $this->data;
    }

}