<?php
class User
{
    private int $userId;
    private string $firstName;
    private string $lastName;
    private string $email;
    private string $phoneNumber;
    private string $state;
    private string $city;
    private string $tole;
    private string $userName;
    private string $password;
    private int $level;
    private string $registeredDate;

    public function __construct(
        int $userId,
        string $firstName,
        string $lastName,
        string $email,
        string $phoneNumber,
        string $state,
        string $city,
        string $tole,
        string $userName,
        string $password,
        int $level,
        string $registeredDate
    ) {
        $this->userId = $userId;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->phoneNumber = $phoneNumber;
        $this->state = $state;
        $this->city = $city;
        $this->tole = $tole;
        $this->userName = $userName;
        $this->password = $password;
        $this->level = $level;
        $this->registeredDate = $registeredDate;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function setUserId(int $userId)
    {
        $this->userId = $userId;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName)
    {
        $this->firstName = $firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName)
    {
        $this->lastName = $lastName;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(string $phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }

    public function getState(): string
    {
        return $this->state;
    }

    public function setState(string $state)
    {
        $this->state = $state;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function setCity(string $city)
    {
        $this->city = $city;
    }

    public function getTole(): string
    {
        return $this->tole;
    }

    public function setTole(string $tole)
    {
        $this->tole = $tole;
    }

    public function getUserName(): string
    {
        return $this->userName;
    }

    public function setUserName(string $userName)
    {
        $this->userName = $userName;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password)
    {
        $this->password = $password;
    }

    public function getLevel(): int
    {
        return $this->level;
    }

    public function setLevel(int $level)
    {
        $this->level = $level;
    }

    public function getregisteredDate(): string
    {
        return $this->registeredDate;
    }

    public function setRegisteredDate(string $registeredDate)
    {
        $this->registeredDate = $registeredDate;
    }
}
