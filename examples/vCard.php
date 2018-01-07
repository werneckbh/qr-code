<?php

require __DIR__ . '/../vendor/autoload.php';

use QRCode\Types\VCard\Person;
use QRCode\Types\VCard\Phone;
use QRCode\Types\VCard\Address;
use QRCode\Types\QRVCard;
use QRCode\QRCodeGenerator;

$person = new Person("John", "Doe", "Mr.", "john.doe@example.com");

$phone1 = new Phone('HOME', '(011) 555-6666');
$phone2 = new Phone('HOME', '(001) 9999-8888', true);

$address = new Address('HOME', true, "1234 Main st", "New York", "NY", "12345", "USA");

$vCard = new QRVCard($person, [$phone1, $phone2], [$address]);

$qrGen = new QRCodeGenerator($vCard);

echo $qrGen->generate();