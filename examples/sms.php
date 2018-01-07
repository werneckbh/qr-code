<?php

require __DIR__ . '/../vendor/autoload.php';

use QRCode\QRCodeGenerator;
use QRCode\Types\QRSms;

$sms = new QRSms('(01) 555-1234', 'text to send');
$qr = new QRCodeGenerator($sms);

echo $qr->generate();