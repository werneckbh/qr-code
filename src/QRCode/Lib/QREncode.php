<?php

namespace QRCode\Lib;

class QREncode
{
    public $casesensitive = true;
    public $eightbit      = false;

    public $version = 0;
    public $size    = 3;
    public $margin  = 4;

    public $structured = 0; // not supported yet

    public $level = QRCode::QR_ECLEVEL_L;
    public $hint  = QRCode::QR_MODE_8;

    //----------------------------------------------------------------------
    public static function factory($level = QRCode::QR_ECLEVEL_L, $size = 3, $margin = 4)
    {
        $enc = new QRencode();
        $enc->size = $size;
        $enc->margin = $margin;

        switch ($level . '') {
            case '0':
            case '1':
            case '2':
            case '3':
                $enc->level = $level;
                break;
            case 'l':
            case 'L':
                $enc->level = QRCode::QR_ECLEVEL_L;
                break;
            case 'm':
            case 'M':
                $enc->level = QRCode::QR_ECLEVEL_M;
                break;
            case 'q':
            case 'Q':
                $enc->level = QRCode::QR_ECLEVEL_Q;
                break;
            case 'h':
            case 'H':
                $enc->level = QRCode::QR_ECLEVEL_H;
                break;
        }

        return $enc;
    }

    /**
     * @param      $intext
     * @return mixed
     * @throws \Exception
     */
    public function encodeRAW($intext)
    {
        $code = new QRCode();

        if ($this->eightbit) {
            $code->encodeString8bit($intext, $this->version, $this->level);
        } else {
            $code->encodeString($intext, $this->version, $this->level, $this->hint, $this->casesensitive);
        }

        return $code->data;
    }

    /**
     * @param      $intext
     * @param bool $outfile
     * @return mixed
     * @throws \Exception
     */
    public function encode($intext, $outfile = false)
    {
        $code = new QRcode();

        if ($this->eightbit) {
            $code->encodeString8bit($intext, $this->version, $this->level);
        } else {
            $code->encodeString($intext, $this->version, $this->level, $this->hint, $this->casesensitive);
        }

        QRtools::markTime('after_encode');

        if ($outfile !== false) {
            return file_put_contents($outfile, join("\n", QRtools::binarize($code->data)));
        }

        return QRtools::binarize($code->data);
    }

    //----------------------------------------------------------------------
    public function encodePNG($intext, $outfile = false, $saveAndPrint = false)
    {
        try {

            ob_start();
            $tab = $this->encode($intext);
            $err = ob_get_contents();
            ob_end_clean();

            if ($err != '')
                QRtools::log($outfile, $err);

            $maxSize = (int) (QRConfig::QR_PNG_MAXIMUM_SIZE / (count($tab) + 2 * $this->margin));

            QRImage::png($tab, $outfile, min(max(1, $this->size), $maxSize), $this->margin, $saveAndPrint);

        } catch (\Exception $e) {

            QRtools::log($outfile, $e->getMessage());

        }

        return true;
    }
}