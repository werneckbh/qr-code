<?php

require __DIR__ . '/../vendor/autoload.php';

use QRCode\Types\QRSms;

$sms = new QRSms('(01) 555-1234', 'text to send');

echo $sms->generate();