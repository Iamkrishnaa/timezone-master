<?php

require $_SERVER['DOCUMENT_ROOT'] . '/timezone-master/models/UserModel.php';
$obj = new UserModel();
$obj->loginAuthentication("krishnasa", "122a");
