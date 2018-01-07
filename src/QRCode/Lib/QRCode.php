<?php

namespace QRCode\Lib;

class QRCode
{
    // Encoding Modes
    const QR_MODE_NUL       = -1;
    const QR_MODE_NUM       = 0;
    const QR_MODE_AN        = 1;
    const QR_MODE_8         = 2;
    const QR_MODE_KANJI     = 3;
    const QR_MODE_STRUCTURE = 4;

    // Levels of error correction
    const QR_ECLEVEL_L = 0;
    const QR_ECLEVEL_M = 1;
    const QR_ECLEVEL_Q = 2;
    const QR_ECLEVEL_H = 3;

    // Supported output formats
    const QR_FORMAT_TEXT = 0;
    const QR_FORMAT_PNG  = 1;

    public $version;
    public $width;
    public $data;

    /**
     * @param \QRCode\Lib\QRInput $input
     * @param                 $mask
     * @return $this|null
     * @throws \Exception
     */
    public function encodeMask(QRInput $input, $mask)
    {
        if ($input->getVersion() < 0 || $input->getVersion() > QRSpec::QRSPEC_VERSION_MAX) {
            throw new \Exception('wrong version');
        }
        if ($input->getErrorCorrectionLevel() > self::QR_ECLEVEL_H) {
            throw new \Exception('wrong level');
        }

        $raw = new QRRawCode($input);

        QRtools::markTime('after_raw');

        $version = $raw->version;
        $width = QRspec::getWidth($version);
        $frame = QRspec::newFrame($version);

        $filler = new FrameFiller($width, $frame);
        if (is_null($filler)) {
            return null;
        }

        // interleaved data and ecc codes
        for ($i = 0; $i < $raw->dataLength + $raw->eccLength; $i++) {
            $code = $raw->getCode();
            $bit = 0x80;
            for ($j = 0; $j < 8; $j++) {
                $addr = $filler->next();
                $filler->setFrameAt($addr, 0x02 | (($bit & $code) != 0));
                $bit = $bit >> 1;
            }
        }

        QRtools::markTime('after_filler');

        unset($raw);

        // remainder bits
        $j = QRspec::getRemainder($version);
        for ($i = 0; $i < $j; $i++) {
            $addr = $filler->next();
            $filler->setFrameAt($addr, 0x02);
        }

        $frame = $filler->frame;
        unset($filler);


        // masking
        $maskObj = new QRMask();
        if ($mask < 0) {

            if (QRConfig::QR_FIND_BEST_MASK) {
                $masked = $maskObj->mask($width, $frame, $input->getErrorCorrectionLevel());
            } else {
                $masked = $maskObj->makeMask($width, $frame, (intval(QRConfig::QR_DEFAULT_MASK) % 8), $input->getErrorCorrectionLevel());
            }
        } else {
            $masked = $maskObj->makeMask($width, $frame, $mask, $input->getErrorCorrectionLevel());
        }

        if ($masked == null) {
            return null;
        }

        QRtools::markTime('after_mask');

        $this->version = $version;
        $this->width = $width;
        $this->data = $masked;

        return $this;
    }

    /**
     * @param \QRCode\Lib\QRInput $input
     * @return null|\QRCode\Lib\QRCode
     * @throws \Exception
     */
    public function encodeInput(QRInput $input)
    {
        return $this->encodeMask($input, -1);
    }

    /**
     * @param $string
     * @param $version
     * @param $level
     * @return null|\QRCode\Lib\QRCode
     * @throws \Exception
     */
    public function encodeString8bit($string, $version, $level)
    {
        if ($string == null) {
            throw new \Exception('empty string!');
        }

        $input = new QRInput($version, $level);
        if ($input == null) return null;

        $response = $input->append(self::QR_MODE_8, strlen($string), str_split($string));
        if ($response < 0) {
            unset($input);
            return null;
        }
        return $this->encodeInput($input);
    }

    /**
     * @param $string
     * @param $version
     * @param $level
     * @param $hint
     * @param $casesensitive
     * @return null|\QRCode\Lib\QRCode
     * @throws \Exception
     */
    public function encodeString($string, $version, $level, $hint, $casesensitive)
    {

        if ($hint != self::QR_MODE_8 && $hint != self::QR_MODE_KANJI) {
            throw new \Exception('bad hint');
        }

        $input = new QRInput($version, $level);
        if ($input == null) return null;

        $response = QRsplit::splitStringToQRInput($string, $input, $hint, $casesensitive);
        if ($response < 0) {
            return null;
        }

        return $this->encodeInput($input);
    }

    //----------------------------------------------------------------------
    public static function png($text, $outfile = false, $level = self::QR_ECLEVEL_L, $size = 3, $margin = 4, $saveAndPrint = false)
    {
        $enc = QRencode::factory($level, $size, $margin);

        return $enc->encodePNG($text, $outfile, $saveAndPrint);
    }

    /**
     * @param      $text
     * @param bool $outfile
     * @param int  $level
     * @param int  $size
     * @param int  $margin
     * @return mixed
     * @throws \Exception
     */
    public static function text($text, $outfile = false, $level = self::QR_ECLEVEL_L, $size = 3, $margin = 4)
    {
        $enc = QRencode::factory($level, $size, $margin);

        return $enc->encode($text, $outfile);
    }

    /**
     * @param      $text
     * @param int  $level
     * @param int  $size
     * @param int  $margin
     * @return mixed
     * @throws \Exception
     */
    public static function raw($text, $level = self::QR_ECLEVEL_L, $size = 3, $margin = 4)
    {
        $enc = QRencode::factory($level, $size, $margin);

        return $enc->encodeRAW($text);
    }
}