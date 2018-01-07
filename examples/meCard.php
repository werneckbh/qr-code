<?php

require __DIR__ . '/../vendor/autoload.php';

use QRCode\QRCodeGenerator;
use QRCode\Types\QRMeCard;

$meCard = new QRMeCard('John Doe', '1234 Main St.', '(001) 555-1234', 'john.doe@example.com');
$qr = new QRCodeGenerator($meCard);

echo $qr->generate();