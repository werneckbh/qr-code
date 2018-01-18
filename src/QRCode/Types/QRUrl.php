<?php

namespace QRCode\Types;


class QRUrl extends GenericType
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

        $this->init();
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