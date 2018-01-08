<?php

require __DIR__ . '/../vendor/autoload.php';

use QRCode\QRCodeGenerator;
use QRCode\Types\QRWifi;

$wifi = new QRWifi('WPA2', 'BrunoWerneck', 'valhallaenxovais');
$qr = new QRCodeGenerator($wifi);

echo $qr->generate();