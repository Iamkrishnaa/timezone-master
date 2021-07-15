<?php
//this will navigate directory from document root
require $_SERVER['DOCUMENT_ROOT'] . '/timezone-master/models/UserModel.php';
require $_SERVER['DOCUMENT_ROOT'] . '/timezone-master/models/User.php';
class RegisterUser
{
    private $userModel;
    public function __construct($postData)
    {

        $this->userModel = new UserModel();

        if (isset($postData['checkUserName'])) {
            $this->isUserAlreadyPresent($postData['checkUserName']);
        }
        if (isset($postData['register'])) {
            $firstName = $postData["firstName"];
            $lastName = $postData["lastName"];
            $email = $postData["email"];
            $phoneNumber = $postData["phoneNumber"];
            $state = $postData["state"];
            $city = $postData["city"];
            $tole = $postData["tole"];
            $userName = $postData["userName"];
            $password = $postData["password"];

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

            $this->registerUser($user);
        }
    }

    public function registerUser($user)
    {
        if ($this->userModel->isConnected()) {
            $result = $this->userModel->register($user);
            if ($result) {
                echo json_encode(array("status" => "Registration Success"));
            } else {
                echo json_encode(array("status" => "Registration Failed"));
            }
        }
    }

    public function isUserAlreadyPresent($userName)
    {

        if ($this->userModel->isConnected()) {
            $result = $this->userModel->isUserAlreadyExists($userName);
            if ($result) {
                echo json_encode(array("isUserPresent" => $result));
            } else {
                echo json_encode(array("isUserPresent" => $result));
            }
        }
    }
}

//this is to handle ajax request
$json = file_get_contents('php://input'); //this will get json data sent

$data = json_decode($json, true); //true will change json object to assoc arrays

// $_POST = $data; //this will assign whole data array to post

$obj = new RegisterUser($data);
