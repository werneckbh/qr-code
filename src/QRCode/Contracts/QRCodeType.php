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

    /**
     * Generates QR Code
     *
     * @return mixed
     */
    public function generate ();

    /**
     * Prints QR Code
     *
     * @return mixed
     */
    public function __toString();
}