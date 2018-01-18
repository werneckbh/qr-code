<?php

namespace QRCode\Types;

use QRCode\Contracts\QRCodeType;
use QRCode\Exceptions\InvalidErrorCorrectionLevelException;
use QRCode\Exceptions\InvalidMarginException;
use QRCode\Exceptions\InvalidPixelSizeException;
use QRCode\QRCodeGenerator;

abstract class GenericType implements QRCodeType
{
    /**
     * @var \QRCode\QRCodeGenerator
     */
    protected $generator;

    /**
     * Initialize QR Code Generator
     *
     */
    public function init ()
    {
        $this->generator = new QRCodeGenerator($this);
    }

    /**
     * Set Error Correction Level. Available values are L, M, Q or H
     * WARNING: The higher the correction level, the more complex the QR Code.
     *
     * @param string $errorCorrectionLevel
     * @throws \QRCode\Exceptions\InvalidErrorCorrectionLevelException
     * @return GenericType
     */
    public function setErrorCorrectionLevel(string $errorCorrectionLevel) : GenericType
    {
        if (!in_array($errorCorrectionLevel, ['L', 'M', 'Q', 'H'])) {
            throw new InvalidErrorCorrectionLevelException("Invalid Error Correction Level.\nAccepted values are L, M, Q or H");
        }

        $this->generator->setErrorCorrectionLevel($errorCorrectionLevel);

        return $this;
    }

    /**
     * Set Pixel Size
     * WARNING: Avoid values higher than 6
     *
     * @param int $pixelSize
     * @throws \QRCode\Exceptions\InvalidPixelSizeException
     * @return GenericType
     */
    public function setPixelSize(int $pixelSize) : GenericType
    {
        if ($pixelSize < 1 || $pixelSize > 7) {
            throw new InvalidPixelSizeException('PixelSize must be greater than 0 and lower than 8');
        }

        $this->generator->setPixelSize($pixelSize);

        return $this;
    }

    /**
     * Set QR Code Margin
     * WARNING: Avoid margin below 2 or above 6
     *
     * @param int $margin
     * @throws \QRCode\Exceptions\InvalidMarginException
     * @return GenericType
     */
    public function setMargin(int $margin) : GenericType
    {
        if ($margin < 1 || $margin > 7) {
            throw new InvalidMarginException('Margin must be greater than 0 and lower than 8');
        }
        $this->generator->setMargin($margin);

        return $this;
    }

    public function generate() : mixed
    {
        return $this->generator->generate();
    }

    public function __toString() : string
    {
        return (string) $this->generate();
    }
}