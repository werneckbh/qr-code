<?php

namespace QRCode;

use QRCode\Contracts\QRCodeType;
use QRCode\Lib\QRCode;

class QRCodeGenerator
{
    protected $type;
    protected $errorCorrectionLevel = 'L';
    protected $pixelSize = 4;
    protected $margin = 4;
    protected $outFile = false;

    public function __construct(QRCodeType $type)
    {
        $this->type = $type;
    }

    /**
     * @param string $errorCorrectionLevel
     * @return \QRCode\QRCodeGenerator
     */
    public function setErrorCorrectionLevel(string $errorCorrectionLevel) : QRCodeGenerator
    {
        $this->errorCorrectionLevel = $errorCorrectionLevel;

        return $this;
    }

    /**
     * @param int $pixelSize
     * @return \QRCode\QRCodeGenerator
     */
    public function setPixelSize(int $pixelSize) : QRCodeGenerator
    {
        $this->pixelSize = $pixelSize;

        return $this;
    }

    /**
     * @param int $margin
     * @return \QRCode\QRCodeGenerator
     */
    public function setMargin(int $margin) : QRCodeGenerator
    {
        $this->margin = $margin;

        return $this;
    }

    /**
     * @param bool $setFile
     * @return \QRCode\QRCodeGenerator
     */
    public function setOutFile(bool $setFile) : QRCodeGenerator
    {
        $this->outFile = $setFile;

        return $this;
    }

    /**
     * Generates QR Code
     *
     * @return mixed
     */
    public function generate ()
    {
        return QRCode::png(
            $this->type->getCodeString(),
            $this->outFile,
            $this->errorCorrectionLevel,
            $this->pixelSize,
            $this->margin
        );
    }
}