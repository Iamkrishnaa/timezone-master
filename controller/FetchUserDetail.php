<?php

//this will navigate directory from document root
require $_SERVER['DOCUMENT_ROOT'] . '/timezone-master/models/UserModel.php';
require $_SERVER['DOCUMENT_ROOT'] . '/timezone-master/models/User.php';

class FetchUserDetail
{

    public $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function getUserDetails($userName)
    {
        if ($this->userModel->isConnected()) {
            $result = $this->userModel->getUserDetail($userName);
            return json_encode($result);
        } else {
            echo json_encode(array("status" => "Error establishing a database connection"));
            exit;
        }
    }
}
