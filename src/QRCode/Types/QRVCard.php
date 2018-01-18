<?php

namespace QRCode\Types;

use QRCode\Exceptions\InvalidVCardAddressEntryException;
use QRCode\Exceptions\InvalidVCardPhoneEntryException;
use QRCode\Types\VCard\Address;
use QRCode\Types\VCard\Person;
use QRCode\Types\VCard\Phone;

class QRVCard extends GenericType
{
    /**
     * @var \QRCode\Types\VCard\Person
     */
    protected $person;
    /**
     * @var array
     */
    protected $phones;
    /**
     * @var array
     */
    protected $addresses;

    /**
     * QRVCard constructor.
     * @param \QRCode\Types\VCard\Person $person
     * @param array                      $phones
     * @param array                      $addresses
     * @throws \Exception
     */
    public function __construct (Person $person, array $phones = [], array $addresses = [])
    {
        $this->validateAddresses($addresses);
        $this->validatePhones($phones);

        $this->person = $person;
        $this->phones = $phones;
        $this->addresses = $addresses;

        $this->init();
    }

    /**
     * @param array $phones
     * @throws \QRCode\Exceptions\InvalidVCardPhoneEntryException
     */
    protected function validatePhones (array $phones)
    {
        foreach ($phones as $phone) {
            if (!$phone instanceof Phone) {
                throw new InvalidVCardPhoneEntryException('Invalid VCard Phone Entry');
            }
        }
    }

    /**
     * @param array $addresses
     * @throws \QRCode\Exceptions\InvalidVCardAddressEntryException
     */
    protected function validateAddresses (array $addresses)
    {
        foreach ($addresses as $address) {
            if (!$address instanceof Address) {
                throw new InvalidVCardAddressEntryException('Invalid VCard Address Entry');
            }
        }
    }

    /**
     * Get Formatted QR Code String
     *
     * @return string
     */
    public function getCodeString()
    {
        $response = "BEGIN:VCARD\nVERSION:3.0\n";
        $response .= (string) $this->person;

        foreach ($this->phones as $phone) {
            $response .= (string) $phone;
        }

        foreach ($this->addresses as $address) {
            $response .= (string) $address;
        }

        $response .= "{$this->person->getEmailStr()}";

        $response .= "REV:" . (new \DateTime('NOW'))->format('Y:m:d\TH:i:s\Z') . "\n";

        $response .= "END:VCARD";

        return $response;
    }
}