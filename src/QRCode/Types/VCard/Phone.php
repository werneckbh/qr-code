<?php

namespace QRCode\Types\VCard;

use QRCode\Contracts\VCardItem;

class Phone implements VCardItem
{
    /**
     * @var string
     */
    protected $type;
    /**
     * @var string
     */
    protected $number;
    /**
     * @var bool
     */
    protected $cellphone;

    /**
     * Phone constructor.
     * @param string $type WORK|HOME
     * @param string $number
     * @param bool   $cellphone
     */
    public function __construct (string $type, string $number, bool $cellphone = false)
    {
        $this->type = $type;
        $this->number = $number;
        $this->cellphone = $cellphone;
    }

    public function __toString()
    {
        $response = "TEL;TYPE={$this->type},";
        $response .= $this->cellphone ? "CELL:" : "VOICE:";
        $response .= $this->number . "\n";

        return $response;
    }
}