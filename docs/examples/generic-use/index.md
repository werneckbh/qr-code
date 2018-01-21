### Generic Use

You can use the root library for creating generic QR Codes. By default, a generic QR Code is a text code.

```php
<?php

require_once "/vendor/autoload.php";

use QR_Code\QR_Code;

QR_Code::png('Hello World');
```

The code above should stream a PNG image like this:

![Hello World QR Code](../../assets/images/generic-use.png)

If you want to save the file, enter a path and name relative to the **PUBLIC** folder as a 2nd argument.

```php
<?php

require_once "/vendor/autoload.php";

use QR_Code\QR_Code;

QR_Code::png('Hello World', '/path/to/myBeautifulQRCode.png');
```

It is possible to create other types of QR Codes by embedding the necessary code string. E.g.:

```php
<?php

require_once "/vendor/autoload.php";

use QR_Code\QR_Code;

QR_Code::png('TEL:+55 31 1234-5678');
```

The code above generates a Phone QR Code. Your device should open your contacts and present you the option to save it. Try it:

![Phone QR Code](../../assets/images/phone.png)