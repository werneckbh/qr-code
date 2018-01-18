<?php

require __DIR__ . '/../vendor/autoload.php';

use QRCode\Types\QRPhone;

$phone = new QRPhone('(001) 555-1234');

echo $phone->generate();