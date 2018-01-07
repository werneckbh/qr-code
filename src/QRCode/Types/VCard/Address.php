<?php

namespace QRCode\Types\VCard;

use QRCode\Contracts\VCardItem;

class Address implements VCardItem
{
    /**
     * @var string
     */
    protected $type;
    /**
     * @var bool
     */
    protected $pref;
    /**
     * @var string
     */
    protected $street;
    /**
     * @var string
     */
    protected $city;
    /**
     * @var string
     */
    protected $state;
    /**
     * @var string
     */
    protected $zip;
    /**
     * @var string
     */
    protected $country;

    public function __construct (string $type, bool $pref = true, string $street, string $city, string $state, string $zip, string $country)
    {
        $this->type = $type;
        $this->pref = $pref;
        $this->street = $street;
        $this->city = $city;
        $this->state = $state;
        $this->zip = $zip;
        $this->country = $country;
    }

    public function __toString ()
    {
        $response = "ADR;TYPE={$this->type}";
        $response .= $this->pref ? ",PREF:;;" : ":;;";
        $response .= "{$this->street};{$this->city};{$this->state};{$this->zip};{$this->country}\n";

        $response .= "LABEL;TYPE={$this->type}";
        $response .= $this->pref ? ",PREF:" : ":";
        $response .= "{$this->street}\\n{$this->city}\, {$this->city} {$this->zip}\\n{$this->country}\n";

        return $response;
    }
}