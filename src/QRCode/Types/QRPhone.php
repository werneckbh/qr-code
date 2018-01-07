<?php

namespace QRCode\Types;

use QRCode\Contracts\QRCodeType;

class QRPhone implements QRCodeType
{
    protected $phone;

    /**
     * Phone QR Code
     *
     * @param $phone
     */
    public function __construct(string $phone)
    {
        $this->phone = $phone;
    }

    /**
     * Get Formatted QR Code String
     *
     * @return string
     */
    public function getCodeString()
    {
        return "TEL:{$this->phone}";
    }
}