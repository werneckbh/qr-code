<?php

require __DIR__ . '/../vendor/autoload.php';

use QRCode\Types\QREmailMessage;

$email = new QREmailMessage('john.doe@example.com', 'Call me dude!', 'QR Code Email Message');

echo $email->generate();