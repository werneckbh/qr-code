<?php

namespace QR_Code\Contracts;

interface CodeType
{
    /**
     * Get Formatted QR Code String
     *
     * @return string Code String
     */
    public function getCodeString () : string;
}