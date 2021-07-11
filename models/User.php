<?php
//this will navigate directory from document root
require $_SERVER['DOCUMENT_ROOT'] . '/timezone-master/db/CheckConnection.php';
class User extends CheckConnection
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
        parent::__construct();
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



    public function register(User $user)
    {
        $sql = "INSERT INTO `registration`(`firstName`, `lastName`, `email`, `phoneNumber`, `state`, `city`, `tole`, `userName`, `password`, `level`, `registeredDate`) VALUES (?,?,?,?,?,?,?,?,?,?,?);";

        $stmt = $this->getConnection()->prepare($sql);

        $stmt->bind_param(
            'sssssssssis',
            $firstName,
            $lastName,
            $email,
            $phoneNumber,
            $state,
            $city,
            $tole,
            $userName,
            $password,
            $level,
            $registeredDate
        );

        $firstName = $user->getFirstName();
        $lastName = $user->getLastName();
        $email = $user->getEmail();
        $phoneNumber = $user->getPhoneNumber();
        $state = $user->getState();
        $city = $user->getCity();
        $tole = $user->getTole();
        $userName = $user->getUserName();
        $password = $user->getPassword();
        $level = $user->getLevel();
        $registeredDate = $user->getRegisteredDate();

        $result = $stmt->execute();

        $this->getConnection()->close(); //close mysql connection
        return $result;
    }


    public function isUserAlreadyExists($user): bool
    {

        $isAlreadyPresent = false;

        if ($this->isConnected()) {
            $sql = "SELECT * FROM `registration` WHERE userName = '$user';";
            $result = $this->getConnection()->query($sql);
            if ($result->num_rows > 0) {
                $isAlreadyPresent = true;
            } else {
                $isAlreadyPresent = false;
            }
            $this->getConnection()->close(); //close mysql connection
        }

        return $isAlreadyPresent;
    }
}

// $obj = new User(1, "", "", "", "", "", "", "", "", "", 2, "2021-12-22");
// echo (int)$obj->isUserAlreadyExists("Chor");
