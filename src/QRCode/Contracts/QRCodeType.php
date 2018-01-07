<?php

namespace QRCode\Contracts;

interface QRCodeType
{
    /**
     * Get Formatted QR Code String
     *
     * @return string
     */
    public function getCodeString();
}