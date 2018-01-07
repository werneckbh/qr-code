<?php

namespace QRCode\Lib;

class QRStr
{
    public static function set(&$srctab, $x, $y, $repl, $replLen = false)
    {
        $replacement = $replLen !== false ? substr($repl, 0, $replLen) : $repl;
        $length = $replLen !== false ?: strlen($repl);

        $srctab[$y] = substr_replace($srctab[$y], $replacement, $x, $length);
    }
}