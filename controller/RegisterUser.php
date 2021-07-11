<?php
//this will navigate directory from document root
require $_SERVER['DOCUMENT_ROOT'] . '/timezone-master/models/User.php';
class RegisterUser
{

    private $user;
    public function __construct($postData)
    {
        if (isset($postData['checkUserName'])) {
            $data = array(
                "firstName" => "",
                "lastName" => "",
                "email" => "",
                "phoneNumber" => "",
                "state" => "",
                "city" => "",
                "tole" => "",
                "userName" => $postData['checkUserName'],
                "password" => ""
            );

            $this->user = $this->createUserObject($data);
        } else {
            $this->user = $this->createUserObject($postData);
        }

        if (isset($postData["checkUserName"])) {
            $this->isUserAlreadyPresent($postData['checkUserName']);
        } else if (isset($postData["register"])) {
            $this->registerUser();
        }
    }

    public function registerUser()
    {
        if ($this->user->isConnected()) {
            $result = $this->user->register($this->user);
            if ($result) {
                echo json_encode(array("status" => "Registration Success"));
            } else {
                echo json_encode(array("status" => "Registration Failed"));
            }
        }
    }

    public function isUserAlreadyPresent($userName)
    {

        if ($this->user->isConnected()) {
            $result = $this->user->isUserAlreadyExists($userName);
            if ($result) {
                echo json_encode(array("isUserPresent" => $result));
            } else {
                echo json_encode(array("isUserPresent" => $result));
            }
        }
    }

    public function createUserObject($data)
    {
        $firstName = $data["firstName"];
        $lastName = $data["lastName"];
        $email = $data["email"];
        $phoneNumber = $data["phoneNumber"];
        $state = $data["state"];
        $city = $data["city"];
        $tole = $data["tole"];
        $userName = $data["userName"];
        $password = $data["password"];

        $user = new User(
            0,
            $firstName,
            $lastName,
            $email,
            $phoneNumber,
            $state,
            $city,
            $tole,
            $userName,
            $password,
            3,
            date("Y-m-d")
        );

        return $user;
    }
}

//this is to handle ajax request
$json = file_get_contents('php://input'); //this will get json data sent

$data = json_decode($json, true); //true will change json object to assoc arrays

// $_POST = $data; //this will assign whole data array to post

$obj = new RegisterUser($data);
