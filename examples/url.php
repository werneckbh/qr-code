<?php

require __DIR__ . '/../vendor/autoload.php';

use QRCode\QRCodeGenerator;
use QRCode\Types\QRUrl;

$url = new QRUrl('www.example.com');
$qr = new QRCodeGenerator($url);

echo $qr->generate();