<?php

namespace Omnipay\BanqueMisr\Message;


class SessionResponse extends AbstractResponse
{

    public function getMessage()
    {
        $this->request->getData();
        $this->data['transactionReference'] = $this->request->getParameters()['transactionReference'];
        return $this->data;
    }

}