<?php

class User
{
    private int $id;
    private $firstName;
    private string $lastname;

    public function __construct(string $firstname, string $lastname, string $mailAddress)
    {
        $this->firstname    = $firstname;
        $this->lastname     = $lastname;
        $this->mailAddress= $mailAddress;
    }

    function getId(): int
    {
        return $this->id;
    }

    function getFirstname(): int
    {
        return $this->firstname;
    }

    function getLastname(){
        return $this->lastname;
    }

    function getMailAddress()
    {
        return $mailAddress;
    }
}