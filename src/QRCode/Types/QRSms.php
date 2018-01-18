<?php

namespace QRCode\Types;

class QRSms extends GenericType
{
    protected $phone;
    protected $text;

    /**
     * SMS QR Code
     *
     * @param string $phone
     * @param string $text
     */
    public function __construct(string $phone, string $text)
    {
        $this->phone = $phone;
        $this->text = $text;

        $this->init();
    }

    /**
     * Get Formatted QR Code String
     *
     * @return string
     */
    public function getCodeString()
    {
        return "SMSTO:{$this->phone}:{$this->text}";
    }
}