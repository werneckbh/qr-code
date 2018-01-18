<?php

namespace QRCode\Types;

class QRMeCard extends GenericType
{
    protected $name;
    protected $address;
    protected $phone;
    protected $email;

    /**
     * MeCard QR Code
     *
     * @param string $name
     * @param string $address
     * @param string $phone
     * @param string $email
     */
    public function __construct(string $name, string $address, string $phone, string $email)
    {
        $this->name = $name;
        $this->address = $address;
        $this->phone = $phone;
        $this->email = $email;

        $this->init();
    }

    /**
     * Get Formatted QR Code String
     *
     * @return string
     */
    public function getCodeString()
    {
        return "MECARD:N:{$this->name};ADR:{$this->address};TEL:{$this->phone};EMAIL:{$this->email};;";
    }
}