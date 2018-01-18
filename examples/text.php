<?php

require __DIR__ . '/../vendor/autoload.php';

use QRCode\Types\QRText;

$txt = new QRText('QR Code Generator for PHP');

//echo $txt->generate();
echo $txt;