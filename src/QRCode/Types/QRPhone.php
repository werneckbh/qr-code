<?php

namespace QRCode\Types;

class QRPhone extends GenericType
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

        $this->init();
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