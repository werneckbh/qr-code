<?php
require __DIR__ . '/../vendor/autoload.php';

use QRCode\QRTools;

if (count(scandir(__DIR__ . '/../src/cache')) == 2) {
    QRTools::buildCache();
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>QR Code Generator for PHP</title>
</head>
<body>
<h3>QR Code Generator for PHP</h3>
<hr>
<p>Examples:</p>
<ul>
    <li><a href="calendar.php" target="_blank">Calendar Event</a></li>
    <li><a href="email.php" target="_blank">Email Message</a></li>
    <li><a href="phone.php" target="_blank">Phone</a></li>
    <li><a href="sms.php" target="_blank">SMS</a></li>
    <li><a href="text.php" target="_blank">Text</a></li>
    <li><a href="url.php" target="_blank">URL</a></li>
    <li><a href="meCard.php" target="_blank">meCard</a></li>
    <li><a href="vCard.php" target="_blank">vCard v3</a></li>
    <li><a href="wifi.php" target="_blank">Wi-fi Settings</a></li>
</ul>
</body>
</html>
