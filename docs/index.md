### What is a QR Code?

**_QR Code_** is short for **_Quick Response Code_**. It is a type of barcode that can store more information than the standard vertical lines barcode.  
<small>For a detailed explanation on QR Codes, visit [https://en.wikipedia.org/wiki/QR_code](https://en.wikipedia.org/wiki/QR_code)</small>

### What does it look like?

A QR Code is a squared image with seemingly random dots. It may look like this:

![QR Code Example](assets/images/QRCODE.png)

If you use your QR Code reader of choice, it should show you the message **QR Code Generator for PHP!**

### What is QR Code Generator for PHP?

QR Code Generator for PHP is a standalone package for creating QR Codes in PHP. It does not depend on any external sources, like some other generators use [Google Graphs API](https://developers.google.com/chart/infographics/docs/qr_codes). It does, however, require the latest version of PHP (7.2).

It supports the following formats:

 - Portable Network Graphics (PNG)
 - Joint Photographic Experts Group (JPEG)
 - Scalable Vector Graphics (SVG)
 
### <a id="examples">Examples</a>
 
 - [Generic use](examples/generic-use)
 - Calendar Event
 - Email Message
 - Phone
 - SMS
 - Text
 - URL
 - meCard
 - vCard v3
 - Wi-fi Network Settings
 
### Note

Because of the number of permutations the QR Code permits, it is common to be able to generate different QR Code images for conveying the same information.

Try scanning these codes:

![Same Code, Different Image](assets/images/random1.png)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;![Same Code, Different Image](assets/images/random2.png)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;![Same Code, Different Image](assets/images/random3.png) 