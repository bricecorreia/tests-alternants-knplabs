<?php

class User
{
    private string $fullname;

    public function __construct(
    private string $firstname, 
    private string $lastname, 
    private string $mailAddress,
    ) {
        $this->fullname = $this->firstname . ' ' . $this->lastname;
    }

    function getId(): int
    {
        return $this->id;
    }

    function getFirstname(): string
    {
        return $this->firstname;
    }

    function getLastname(): string
    {
        return $this->lastname;
    }

    function getMailAddress(): string
    {
        return $this->mailAddress;
    }

    /**
     * Get the value of fullname
     */ 
    public function getFullname(): string
    {
        return $this->fullname;
    }
}