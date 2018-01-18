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
     * @param string $errorCorrectionLevel
     * @param int    $pixelSize
     * @param int    $margin
     * @return mixed
     */
    public function generate (string $errorCorrectionLevel = 'L', int $pixelSize = 4, int $margin = 4);

    /**
     * Prints QR Code
     *
     * @return mixed
     */
    public function __toString();
}