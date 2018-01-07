<?php

namespace QRCode\Types\VCard;

use QRCode\Contracts\VCardItem;

class Person implements VCardItem
{
    protected $firstName;
    protected $lastName;
    protected $title;
    protected $email;
    protected $org;
    protected $orgTitle;

    public function __construct(string $firstName, string $lastName, string $title = '', string $email, string $org = '', string $orgTitle = '')
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->title = $title;
        $this->email = $email;
        $this->org = $org;
        $this->orgTitle = $orgTitle;
    }

    public function getEmailStr ()
    {
        return "EMAIL:{$this->email}\n";
    }

    protected function getFullName ()
    {
        return "{$this->firstName} {$this->lastName}";
    }

    protected function getName ()
    {
        $response = "N:{$this->lastName};{$this->firstName};;";
        if ($this->title) {
            $response .= "{$this->title};";
        }

        return $response;
    }

    public function __toString()
    {
        $response = "{$this->getName()}\n";
        $response .= "FN:{$this->getFullName()}\n";
        $response .= "ORG:{$this->org}\n";
        $response .= "TITLE:{$this->orgTitle}\n";

        return $response;
    }
}