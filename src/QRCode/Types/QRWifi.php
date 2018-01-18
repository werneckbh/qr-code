<?php

namespace QRCode\Types;

class QRWifi extends GenericType
{
    protected $authentication;
    protected $ssid;
    protected $password;
    protected $hidden;

    public function __construct(string $authentication, string $ssid, string $password, bool $hidden = false)
    {
        $this->authentication = $authentication;
        $this->ssid = $ssid;
        $this->password = $password;
        $this->hidden = $hidden;

        $this->init();
    }

    /**
     * Get Formatted QR Code String
     *
     * @return string
     */
    public function getCodeString()
    {
        $response = "WIFI:T:{$this->authentication};S:{$this->ssid};P:{$this->password};";
        if ($this->hidden) {
            $response .= "H:true;";
        } else {
            $response .= ";";
        }

        return $response;
    }
}