<?php

namespace QRCode\Lib;

class QRConfig
{
    const QR_CACHEABLE = true;
    const QR_CACHE_DIR = __DIR__ . DIRECTORY_SEPARATOR .'..'. DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'cache';
    const QR_LOG_DIR   = __DIR__ . DIRECTORY_SEPARATOR .'..'. DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'logs';

    const QR_FIND_BEST_MASK   = true;
    const QR_FIND_FROM_RANDOM = false;
    const QR_DEFAULT_MASK     = 2;

    const QR_PNG_MAXIMUM_SIZE = 1024;
}