<?php

namespace QRCode\Types;

use QRCode\Contracts\QRCodeType;

class QRText implements QRCodeType
{
    protected $text;

    /**
     * Text QR Code
     *
     * @param string $text Text to encode
     */
    public function __construct (string $text)
    {
        $this->text = $text;
    }

    /**
     * Get Formatted QR Code String
     *
     * @return string
     */
    public function getCodeString()
    {
        return $this->text;
    }
}