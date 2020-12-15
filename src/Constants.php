<?php

namespace Omnipay\BanqueMisr;
class Constants
{
    const  BASE_URL = "https://banquemisr.gateway.mastercard.com";

    private static $gatewayUrl = "";
    private static $debug = FALSE;
    private static $version = "";
    private static $currency = "";
    private static $merchantId = "";
    private static $password = "";
    private static $apiUsername = "";
    private static $sessionJsUrl = "";
    private static $checkoutJsUrl = "";
    private static $checkoutSessionUrl = "";
    private static $retrieveOrderUrl = "";

    /**
     * @return string
     */
    public static function getRetrieveOrderUrl(): string
    {
        return self::$retrieveOrderUrl;
    }

    /**
     * @param string $retrivieOrderUrl
     */
    public static function setRetrivieOrderUrl(string $retrivieOrderUrl): void
    {
        self::$retrivieOrderUrl = $retrivieOrderUrl;
    }
    private static $pkiBaseUrl = "";
    private static $hostedSessionUrl = "";
    private static $certificatePath = "";
    private static $certificateAuth = FALSE;
    private static $certificateVerifyPeer = TRUE;
    private static $certificateVerifyHost = 1;

    private static $gatewayBaseUrl = "";

    /**
     * @return string
     */
    public static function getGatewayBaseUrl(): string
    {
        return self::$gatewayBaseUrl;
    }

    /**
     * @param string $gatewayBaseUrl
     */
    public static function setGatewayBaseUrl(string $gatewayBaseUrl)
    {
        self::$gatewayBaseUrl = $gatewayBaseUrl;
    }

    /**
     * @return string
     */
    public static function getGatewayUrl(): string
    {
        return self::$gatewayUrl;
    }

    /**
     * @param string $gatewayUrl
     */
    public static function setGatewayUrl(string $gatewayUrl)
    {
        self::$gatewayUrl = $gatewayUrl;
    }

    /**
     * @return bool
     */
    public static function isDebug(): bool
    {
        return self::$debug;
    }

    /**
     * @param bool $debug
     */
    public static function setDebug(bool $debug)
    {
        self::$debug = $debug;
    }

    /**
     * @return string
     */
    public static function getVersion(): string
    {
        return self::$version;
    }

    /**
     * @param string $version
     */
    public static function setVersion(string $version)
    {
        self::$version = $version;
    }

    /**
     * @return string
     */
    public static function getCurrency(): string
    {
        return self::$currency;
    }

    /**
     * @param string $currency
     */
    public static function setCurrency(string $currency)
    {
        self::$currency = $currency;
    }

    /**
     * @return string
     */
    public static function getMerchantId(): string
    {
        return self::$merchantId;
    }

    /**
     * @param string $merchantId
     */
    public static function setMerchantId(string $merchantId)
    {
        self::$merchantId = $merchantId;
    }

    /**
     * @return string
     */
    public static function getPassword(): string
    {
        return self::$password;
    }

    /**
     * @param string $password
     */
    public static function setPassword(string $password)
    {
        self::$password = $password;
    }

    /**
     * @return string
     */
    public static function getApiUsername(): string
    {
        return self::$apiUsername;
    }

    /**
     * @param string $apiUsername
     */
    public static function setApiUsername(string $apiUsername)
    {
        self::$apiUsername = $apiUsername;
    }

    /**
     * @return string
     */
    public static function getSessionJsUrl(): string
    {
        return self::$sessionJsUrl;
    }

    /**
     * @param string $sessionJsUrl
     */
    public static function setSessionJsUrl(string $sessionJsUrl)
    {
        self::$sessionJsUrl = $sessionJsUrl;
    }

    /**
     * @return string
     */
    public static function getCheckoutJsUrl(): string
    {
        return self::$checkoutJsUrl;
    }

    /**
     * @param string $checkoutJsUrl
     */
    public static function setCheckoutJsUrl(string $checkoutJsUrl)
    {
        self::$checkoutJsUrl = $checkoutJsUrl;
    }

    /**
     * @return string
     */
    public static function getCheckoutSessionUrl(): string
    {
        return self::$checkoutSessionUrl;
    }

    /**
     * @param string $checkoutSessionUrl
     */
    public static function setCheckoutSessionUrl(string $checkoutSessionUrl)
    {
        self::$checkoutSessionUrl = $checkoutSessionUrl;
    }

    /**
     * @return string
     */
    public static function getPkiBaseUrl(): string
    {
        return self::$pkiBaseUrl;
    }

    /**
     * @param string $pkiBaseUrl
     */
    public static function setPkiBaseUrl(string $pkiBaseUrl)
    {
        self::$pkiBaseUrl = $pkiBaseUrl;
    }

    /**
     * @return string
     */
    public static function getCertificatePath(): string
    {
        return self::$certificatePath;
    }

    /**
     * @param string $certificatePath
     */
    public static function setCertificatePath(string $certificatePath)
    {
        self::$certificatePath = $certificatePath;
    }

    /**
     * @return bool
     */
    public static function isCertificateAuth(): bool
    {
        return self::$certificateAuth;
    }

    /**
     * @param bool $certificateAuth
     */
    public static function setCertificateAuth(bool $certificateAuth)
    {
        self::$certificateAuth = $certificateAuth;
    }

    /**
     * @return bool
     */
    public static function isCertificateVerifyPeer(): bool
    {
        return self::$certificateVerifyPeer;
    }

    /**
     * @param bool $certificateVerifyPeer
     */
    public static function setCertificateVerifyPeer(bool $certificateVerifyPeer)
    {
        self::$certificateVerifyPeer = $certificateVerifyPeer;
    }

    /**
     * @return int
     */
    public static function getCertificateVerifyHost(): int
    {
        return self::$certificateVerifyHost;
    }

    /**
     * @param int $certificateVerifyHost
     */
    public static function setCertificateVerifyHost(int $certificateVerifyHost)
    {
        self::$certificateVerifyHost = $certificateVerifyHost;
    }

    /**
     * Merchant constructor.
     * @param $configArray
     */
    static function __constructStatic($configArray)
    {
        if (array_key_exists("gatewayBaseUrl", $configArray))
            self::$gatewayBaseUrl = $configArray["gatewayBaseUrl"];

        if (array_key_exists("pkiBaseUrl", $configArray))
            self::$pkiBaseUrl = $configArray["pkiBaseUrl"];

        if (array_key_exists("hostedSessionUrl", $configArray))
            self::$hostedSessionUrl = $configArray["hostedSessionUrl"];

        if (array_key_exists("gatewayUrl", $configArray))
            self::$gatewayUrl = $configArray["gatewayUrl"];

        if (array_key_exists("debug", $configArray))
            self::$debug = $configArray["debug"];

        if (array_key_exists("version", $configArray))
            self::$version = $configArray["version"];

        if (array_key_exists("currency", $configArray))
            self::$currency = $configArray["currency"];

        if (array_key_exists("merchantId", $configArray))
            self::$merchantId = $configArray["merchantId"];

        if (array_key_exists("password", $configArray))
            self::$password = $configArray["password"];

        if (array_key_exists("apiUsername", $configArray))
            self::$apiUsername = $configArray["apiUsername"];

        self::$sessionJsUrl = self::$hostedSessionUrl . '/version/' . self::$version . '/merchant/' . self::$merchantId . '/session.js';
        self::$checkoutSessionUrl = self::$gatewayUrl . '/version/' . self::$version . '/merchant/' . self::$merchantId . '/session';
        self::$checkoutJsUrl = self::$gatewayBaseUrl . '/checkout/version/' . self::$version . '/checkout.js';

        self::$retrieveOrderUrl = self::$gatewayUrl . '/version/' . self::$version . '/merchant/' . self::$merchantId . '/order/';

        if (array_key_exists("certificatePath", $configArray) && !empty($configArray["certificatePath"])) {
            self::$certificatePath = $configArray["certificatePath"];

            self::$certificateAuth = true;

            if (array_key_exists("verifyPeer", $configArray))
                self::$certificateVerifyPeer = $configArray["verifyPeer"];

            if (array_key_exists("verifyHost", $configArray))
                self::$certificateVerifyHost = $configArray["verifyHost"];

            //Set the gateway-url back to SSL URL if Certificate Auth is being used
            self::$gatewayUrl = self::$pkiBaseUrl . '/api/rest';
        }
    }


}
