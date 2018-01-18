<?php

namespace QRCode\Types;

class QRText extends GenericType
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
        $this->init();
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