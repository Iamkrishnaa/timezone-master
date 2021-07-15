<?php

//this will navigate directory from document root
require $_SERVER['DOCUMENT_ROOT'] . '/timezone-master/models/UserModel.php';
require $_SERVER['DOCUMENT_ROOT'] . '/timezone-master/models/User.php';

class LoginUser
{

    public $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function login($userName, $password)
    {
        if ($this->userModel->isConnected()) {
            $res = $this->userModel->loginAuthentication($userName, $password);
            // echo json_encode($res);
            return json_encode($res);
        } else {
            echo json_encode(array("status" => "Error establishing a database connection"));
            exit;
        }
    }
}
