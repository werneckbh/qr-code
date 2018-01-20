<?php

namespace QR_Code\Util;

/**
 * Class Str
 *
 * Based on PHP QR Code distributed under LGPL 3
 * Copyright (C) 2010 Dominik Dzienia <deltalab at poczta dot fm>
 *
 * QR Code Generator for PHP is distributed under MIT
 * Copyright (C) 2018 Bruno Vaula Werneck <brunovaulawerneck at gmail dot com>
 *
 * @package QR_Code\Util
 */
class Str
{
    /**
     * @param array  $srctab
     * @param int    $x
     * @param int    $y
     * @param string $repl
     * @param bool   $replLen
     */
    public static function set (array &$srctab, int $x, int $y, string $repl, $replLen = false) : void
    {
        $srctab[$y] = substr_replace($srctab[$y], ($replLen !== false) ? substr($repl, 0, $replLen) : $repl, $x, ($replLen !== false) ? $replLen : strlen($repl));
    }
}