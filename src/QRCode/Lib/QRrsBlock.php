<?php

namespace QRCode\Lib;

class QRrsBlock
{
    public $dataLength;
    public $data = [];
    public $eccLength;
    public $ecc  = [];

    public function __construct($dl, $data, $el, &$ecc, QRrsItem $rs)
    {
        $rs->encode_rs_char($data, $ecc);

        $this->dataLength = $dl;
        $this->data = $data;
        $this->eccLength = $el;
        $this->ecc = $ecc;
    }
}