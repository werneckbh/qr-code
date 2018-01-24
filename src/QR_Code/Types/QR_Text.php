<?php

namespace QR_Code\Types;

use QR_Code\Contracts\CodeType;
use QR_Code\Util\AbstractGenerator;

/**
 * Class QR_Text
 *
 * QR Code Generator for PHP is distributed under MIT
 * Copyright (C) 2018 Bruno Vaula Werneck <brunovaulawerneck at gmail dot com>
 *
 * @package QR_Code\Types
 */
class QR_Text extends AbstractGenerator implements CodeType
{
    protected $data;

    /**
     * QR_Text constructor.
     *
     * @param string $data Text to encode
     */
    public function __construct (string $data = '')
    {
        $this->data = $data;
    }

    /**
     * Sets text to encode
     * 
     * @param string $data Text to encode
     *
     * @return \QR_Code\Types\QR_Text
     */
    public function setData (string $data) : QR_Text
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Get Formatted QR Code String
     *
     * @return string Code String
     */
    public function getCodeString () : string
    {
        return $this->data;
    }
}