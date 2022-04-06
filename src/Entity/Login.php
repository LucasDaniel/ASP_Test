<?php

namespace ASPTest\Entity;

class Login
{

    private $id;
    private $firstName;
    private $lastName;
    private $email;
    private $age;

    public function __construct($firstName, $lastName, $email, $age)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->age = $age;

        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getAge(): ?int
    {
        if (is_int($this->age)) return $this->age;
        else return null;
    }

    public function setAge(?int $age): self
    {
        $this->age = $age;

        return $this;
    }
    
}