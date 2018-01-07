<?php

namespace QRCode\Types;

use QRCode\Contracts\QRCodeType;

class QREmailMessage implements QRCodeType
{
    protected $email;
    protected $message;
    protected $subject;

    /**
     * Email Message QR Code
     *
     * @param string $email Email address
     * @param string $message Email Message Body
     * @param string $subject Email subject
     */
    public function __construct(string $email, string $message, string $subject)
    {
        $this->email = $email;
        $this->message = $message;
        $this->subject = $subject;
    }

    /**
     * Get Formatted QR Code String
     *
     * @return string
     */
    public function getCodeString()
    {
        return "MATMSG:TO:{$this->email};SUB:{$this->subject};BODY:{$this->message};;";
    }
}