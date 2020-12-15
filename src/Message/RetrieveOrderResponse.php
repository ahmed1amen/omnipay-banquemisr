<?php

namespace Omnipay\BanqueMisr\Message;


class RetrieveOrderResponse extends AbstractResponse
{

    public function getMessage()
    {
        $this->request->getData();
        return $this->data;
    }

}