<?php

namespace QRCode\Types;

use QRCode\Contracts\QRCodeType;
use QRCode\QRCodeGenerator;

abstract class GenericType implements QRCodeType
{
    /**
     * @var \QRCode\QRCodeGenerator
     */
    protected $generator;

    public function init ()
    {
        $this->generator = new QRCodeGenerator($this);
    }

    public function generate(string $errorCorrectionLevel = 'L', int $pixelSize = 4, int $margin = 4)
    {
        return $this->generator->generate($errorCorrectionLevel, $pixelSize, $margin);
    }

    public function __toString()
    {
        return $this->generate();
    }


}