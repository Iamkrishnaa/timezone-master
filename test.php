<?php
//this will navigate directory from document root
require $_SERVER['DOCUMENT_ROOT'] . '/timezone-master/models/User.php';
class RegisterUser
{

    public function __construct($postData)
    {
        $_POST = $postData;
    }

    public function register(User $user): bool
    {
        $isRegistered = FALSE;

        if ($this->isConnected) {
            $sql = "INSERT INTO `registration`(`firstName`, `lastName`, `email`, `phoneNumber`, `state`, `city`, `tole`, `userName`, `password`, `level`, `registeredDate`) VALUES (?,?,?,?,?,?,?,?,?,?,?);";
            $stmt = $this->conn->prepare($sql);

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

            if ($result) {
                // echo json_encode(array("status" => "success"));
                $isRegistered = TRUE;
            } else {
                // echo json_encode(array("status" => "failed"));
                $isRegistered = FALSE;
            }
        }

        $this->conn->close(); //close mysql connection
        return $isRegistered;
    }

    public function isUserAlreadyExists($user)
    {

        if ($this->isConnected) {
            $sql = "SELECT * FROM `registration` WHERE userName = '$user';";
            $result = $this->conn->query($sql);
            if ($result->num_rows > 0) {
                echo json_encode(array("isUserPresent" => true));
            } else {
                echo json_encode(array("isUserPresent" => false));
            }
        }
    }
}

function registerUser()
{

    if (isset($_POST["register"]) && $_SERVER["REQUEST_METHOD"] == "POST") {

        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $email = $_POST["email"];
        $phoneNumber = $_POST["phoneNumber"];
        $state = $_POST["state"];
        $city = $_POST["city"];
        $tole = $_POST["tole"];
        $userName = $_POST["userName"];
        $password = $_POST["password"];

        $registerUser = new RegisterUser();

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

        $register = $registerUser->register($user);
        if ($register) {
            echo json_encode(array("status" => "success"));
        } else {
            echo json_encode(array("status" => "failed"));
        }
    }
    // else {
    //     echo "no register param detected";
    // }
}

//this is to handle ajax request
$json = file_get_contents('php://input'); //this will get json data sent

$data = json_decode($json, true); //true will change json object to assoc arrays

$_POST = $data; //this will assign whole data array to post

$obj = new RegisterUser($data);
if (isset($_POST['checkUserName'])) {
    $obj->isUserAlreadyExists($_POST["checkUserName"]);
} else if (isset($_POST["register"])) {
    registerUser();
}
