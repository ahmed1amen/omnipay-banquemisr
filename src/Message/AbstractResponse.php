<?php

namespace Omnipay\BanqueMisr\Message;

use Omnipay\Common\Message\AbstractResponse as BaseAbstractResponse;
use Omnipay\Common\Message\RequestInterface;
use phpDocumentor\Reflection\Types\This;


abstract class AbstractResponse extends BaseAbstractResponse
{

    /**
     * @var array
     */
    protected $headers = [];

    public function __construct(RequestInterface $request, $data, $headers = [])
    {
        $this->request = $request;
        $this->data = json_decode($data, true);
        $this->headers = $headers;
    }

    /**
     * Is the Request successful ?
     *
     * @return $this | false
     */
    public function isSuccessful()
    {
        return (empty($this->data['error']) && $this->getCode() < 400) ? $this :false ;
    }

    public function getMessage()
    {
        return $this->data;
    }

}