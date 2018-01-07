<?php

namespace QRCode;

use QRCode\Contracts\QRCodeType;
use QRCode\Lib\QRCode;

class QRCodeGenerator
{
    protected $type;

    public function __construct(QRCodeType $type)
    {
        $this->type = $type;
    }

    /**
     * Generates QR Code
     *
     * @param string $errorCorrectionLevel
     * @param int    $pixelSize
     * @param int    $margin
     * @return mixed
     */
    public function generate ($errorCorrectionLevel = 'L', $pixelSize = 4, $margin = 4)
    {
        return QRCode::png($this->type->getCodeString(), false, $errorCorrectionLevel, $pixelSize, $margin);
    }
}