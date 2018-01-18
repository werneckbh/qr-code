# QR Code Generator for PHP

Based on the popular library [PHP QR Code](http://phpqrcode.sourceforge.net), this package lets you create several different QR Codes.

## Installation

Install using **composer**:

```bash
$ composer require werneckbh/qr-code
```

**IMPORTANT:**

You **must** generate QR Code cache before running it. In the command line, run:

```bash
$ php ./vendor/werneckbh/qr-code/buildCache.php
```

## Usage

QR Code Generator for PHP supports the following QRCodes:

 - Calendar Event
 - Email Message
 - Phone
 - SMS
 - Text
 - URL
 - meCard
 - vCard v3
 - Wi-fi Network Settings
 
Be sure to check the **examples** folder to view how it can be used, and how to set options such as _Error Correction Level_ (increases complexity), _pixel size_ and _margin_.
 
 ### Calendar Event
 
 ```php
 <?php
 
 use QRCode\Types\QRCalendarEvent;

 $startDateAndTime = new \DateTime('next saturday 7pm');
 $endDateAndTime = new \DateTime('next saturday 11pm');

 $summary = 'Dinner date with Janet Doe';
 $description = 'Important dinner date with Janet Doe, whom you\'ve met at Tinder, at Per Se (French Restaurant)';
 $location = 'Time Warner Center, 10 Columbus Cir, New York, NY 10023, USA';

 $event = new QRCalendarEvent($startDateAndTime, $endDateAndTime, $summary, $description, $location);

 echo $event->generate();
 ```
 
 ### Email Message
 
 ```php
 <?php
 
 use QRCode\Types\QREmailMessage; 
 
 $email = new QREmailMessage('john.doe@example.com', 'Call me dude!', 'QR Code Email Message'); 
  
 
 echo $email->generate();
 // echo $email;
 ```
 
 ### Phone
 
 ```php
 <?php 
 
 use QRCode\Types\QRPhone;

 $phone = new QRPhone('(001) 555-1234');

 echo $phone->generate(); 
 // echo $phone;
 ```
 
 ### SMS
 
 ```php
 <?php
 
 use QRCode\Types\QRSms;
 
 $sms = new QRSms('(01) 555-1234', 'text to send');
 
 echo $sms->generate();
 // echo $sms;
 ```
 
 ### Text
 
 ```php
 <?php
 
 use QRCode\Types\QRText;
 
 $txt = new QRText('QR Code Generator for PHP');
 
 echo $txt->generate();
 // echo $txt;
 ```
 
 ### URL
 
 ```php
 <?php
 
 use QRCode\Types\QRUrl;
 
 $url = new QRUrl('www.example.com');
 
 echo $url->generate();
 // echo $url;
 ```
 
 ### meCard
 
 ```php
 <?php
 
 use QRCode\Types\QRMeCard;
 
 $meCard = new QRMeCard('John Doe', '1234 Main St.', '(001) 555-1234', 'john.doe@example.com');
 
 echo $meCard->generate();
 // echo $meCard;
 ```
 
 ### vCard v3
 
 ```php
 <?php
 
 use QRCode\Types\VCard\Person;
 use QRCode\Types\VCard\Phone;
 use QRCode\Types\VCard\Address;
 use QRCode\Types\QRVCard;
 
 $person = new Person("John", "Doe", "Mr.", "john.doe@example.com");
 
 $phone1 = new Phone('HOME', '(011) 555-6666');
 $phone2 = new Phone('HOME', '(001) 9999-8888', true);
 
 $address = new Address('HOME', true, "1234 Main st", "New York", "NY", "12345", "USA");
 
 $vCard = new QRVCard($person, [$phone1, $phone2], [$address]);
 
 echo $vCard->generate();
 // echo $vCard;
 ```
 
 ### Wi-fi
 
 ```php
 <?php
  
 use QRCode\Types\QRWifi;
 
 $wifi = new QRWifi('WPA2', 'MySuperSSID', 'y0uc4n7f1ndth3p4ssw0rd');
 
 echo $wifi->generate();
 // echo $wifi;
 ```
 
 ## Contributing
 
 To contribute to this project, please do the following:
 
  - Fork it
  - Create a new branch for your contribution
  - Test it! Make sure it works and it won't break the master code
  - Send pull request
  
  Contributors will be added to package descriptor
  
  ## License
  
  **(MIT)**
  
  Copyright 2018 Bruno Vaula Werneck
  
  Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:
  
  The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
  
  THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.