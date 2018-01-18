<?php

require __DIR__ . '/../vendor/autoload.php';

use QRCode\Types\QRUrl;

$url = new QRUrl('www.example.com');

echo $url->generate();