<?php
require $_SERVER['DOCUMENT_ROOT'] . '/timezone-master/db/CheckConnection.php';
class UserModel extends CheckConnection
{
    public function __construct()
    {
        parent::__construct();
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


    public function loginAuthentication($user, $pass)
    {
        $sql = "SELECT * FROM `registration` WHERE userName = '$user';";

        $result = $this->getConnection()->query($sql);

        $loginDetails = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $loginDetails['userName'] = $row['userName'];
                $loginDetails['password'] = $row['password'];
            }
        } else {
            return (array("status" => "Username Not Found"));
            exit;
        }

        if ($loginDetails['password'] === $pass) {
            return (array("status" => "Login Success"));
        } else {
            return (array("status" => "Password Incorrect"));
        }
        $this->getConnection()->close();
    }

    public function getUserDetail($userName)
    {
        $sql = "SELECT * FROM `registration` WHERE userName = '$userName';";
        $result = $this->getConnection()->query($sql);

        $detail = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $detail = $row;
            }
        }

        return $detail;
    }
}
