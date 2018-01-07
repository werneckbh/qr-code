<?php

require __DIR__ . '/../vendor/autoload.php';

use QRCode\QRCodeGenerator;
use QRCode\Types\QRText;

$txt = new QRText('QR Code Generator for PHP');
$qr = new QRCodeGenerator($txt);

echo $qr->generate();