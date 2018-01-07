<?php

namespace QRCode\Types;

use QRCode\Contracts\QRCodeType;

class QRUrl implements QRCodeType
{
    protected $url;

    /**
     * URL QR Code
     *
     * @param string $url
     */
    public function __construct (string $url)
    {
        $this->url = $url;
    }

    /**
     * Get Formatted QR Code String
     *
     * @return string
     */
    public function getCodeString()
    {
        return preg_match("#^https?\:\/\/#", $this->url) ? $this->url : "http://{$this->url}";
    }
}