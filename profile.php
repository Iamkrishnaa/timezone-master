<head>
    <title><?php
            session_start();
            echo $_SESSION["user"] . " - Profile"
            ?>
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        .profile-tab label {
            font-weight: 600;
        }

        .profile-tab p {
            font-weight: 600;
            color: #0062cc;
        }
    </style>
</head>

<?php
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
}
if (isset($_POST["log-out"])) {
    session_destroy();
    header("Location: login.php");
}

if (isset($_SESSION['user'])) {
    require $_SERVER['DOCUMENT_ROOT'] . '/timezone-master/controller/FetchUserDetail.php';

    $fetchUserDetail = new FetchUserDetail();
    $details = $fetchUserDetail->getUserDetails($_SESSION['user']);
    $userDetails = json_decode($details, true);
}

if (isset($_POST['update-profile']) && isset($_SESSION['user'])) {

    echo "<h1 class='text-center'>This is under Construction.</h1>";
}
?>
<hr>
<div class="container bootstrap snippet">
    <div class="row">
        <div class="col-sm-10">
            <h1>Welcome, <?php
                            if (isset($_SESSION['user'])) {
                                echo $_SESSION['user'];
                            } else {
                                echo  "User name";
                            }
                            ?>
            </h1>
        </div>
    </div>
    <div class="row">

        <!--/col-3-->
        <div class="col-sm-9">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#profile">Profile</a></li>
                <li><a data-toggle="tab" href="#updateProfile">Update Profile</a></li>
            </ul>


            <div class="tab-content">
                <div class="tab-pane active" id="profile">
                    <hr>
                    <div class="col-lg-12">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <fieldset class="border p-2">
                                    <legend class="w-auto">Basic Information</legend>
                                    <div class="row mx-2">
                                        <div class="col-md-6">
                                            <label>User Id</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p><?php echo $userDetails["userId"] ?></p>
                                        </div>
                                    </div>
                                    <div class="row mx-2">
                                        <div class="col-md-6">
                                            <label>User Name</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p><?php echo $userDetails["userName"] ?></p>
                                        </div>
                                    </div>
                                    <div class="row mx-2">
                                        <div class="col-md-6">
                                            <label>Name</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p><?php echo $userDetails["firstName"] . " " . $userDetails["lastName"] ?></p>
                                        </div>
                                    </div>
                                    <div class="row mx-2">
                                        <div class="col-md-6">
                                            <label>Email</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p><?php echo $userDetails["email"] ?></p>
                                        </div>
                                    </div>
                                    <div class="row mx-2">
                                        <div class="col-md-6">
                                            <label>Phone</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p><?php echo $userDetails["phoneNumber"] ?></p>
                                        </div>
                                    </div>
                                    <div class="row mx-2">
                                        <div class="col-md-6">
                                            <label>Registered Date</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p><?php echo $userDetails["registeredDate"] ?></p>
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset class="border p-2">
                                    <legend class="w-auto">Address</legend>
                                    <div class="row mx-2">
                                        <div class="col-md-6">
                                            <label>State</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p><?php echo $userDetails["state"] ?></p>
                                        </div>
                                    </div>
                                    <div class="row mx-2">
                                        <div class="col-md-6">
                                            <label>City</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p><?php echo $userDetails["city"] ?></p>
                                        </div>
                                    </div>
                                    <div class="row mx-2">
                                        <div class="col-md-6">
                                            <label>Tole</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p><?php echo $userDetails["tole"] ?></p>
                                        </div>
                                    </div>
                                </fieldset>
                                <div class="row p-2 justify-content-end">
                                    <form method="POST" action="" class="m-2">
                                        <button class="btn btn-lg btn-danger" type="submit" name="log-out"><i class="glyphicon glyphicon-log-out"></i> Logout</button>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>

                    <hr>

                </div>
                <div class="tab-pane" id="updateProfile">


                    <hr>
                    <form class="form" action="" onsubmit="return validateFormData();" method="post" id="registrationForm">
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="first_name">
                                    <h4>First name</h4>
                                </label>
                                <input type="text" class="form-control" name="first_name" id="firstName" placeholder="first name" title="enter your first name if any." value="<?php
                                                                                                                                                                                if (isset($userDetails['firstName'])) {
                                                                                                                                                                                    echo $userDetails['firstName'];
                                                                                                                                                                                }
                                                                                                                                                                                ?>">
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="last_name">
                                    <h4>Last name</h4>
                                </label>
                                <input type="text" class="form-control" name="last_name" id="lastName" placeholder="last name" title="enter your last name if any." value="<?php
                                                                                                                                                                            if (isset($userDetails['lastName'])) {
                                                                                                                                                                                echo $userDetails['lastName'];
                                                                                                                                                                            }
                                                                                                                                                                            ?>">
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="email">
                                    <h4>Email</h4>
                                </label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="enter email" title="enter your email if any." value="<?php
                                                                                                                                                                    if (isset($userDetails['email'])) {
                                                                                                                                                                        echo $userDetails['email'];
                                                                                                                                                                    }
                                                                                                                                                                    ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="mobile">
                                    <h4>Mobile/Phone</h4>
                                </label>
                                <input type="text" class="form-control" name="mobile" id="phoneNumber" placeholder="enter mobile number" title="enter your mobile number if any." value="<?php
                                                                                                                                                                                            if (isset($userDetails['phoneNumber'])) {
                                                                                                                                                                                                echo $userDetails['phoneNumber'];
                                                                                                                                                                                            }
                                                                                                                                                                                            ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="state">
                                    <h4>State</h4>
                                </label>
                                <input type="text" class="form-control" id="state" placeholder="State" title="enter a state" value="<?php
                                                                                                                                    if (isset($userDetails['state'])) {
                                                                                                                                        echo $userDetails['state'];
                                                                                                                                    }
                                                                                                                                    ?>">
                            </div>

                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="city">
                                    <h4>City</h4>
                                </label>
                                <input type="text" class="form-control" id="city" placeholder="City" title="enter a city" value="<?php
                                                                                                                                    if (isset($userDetails['city'])) {
                                                                                                                                        echo $userDetails['city'];
                                                                                                                                    }
                                                                                                                                    ?>">
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="tole">
                                    <h4>Tole</h4>
                                </label>
                                <input type="text" class="form-control" id="tole" placeholder="Tole" title="enter a tole" value="<?php
                                                                                                                                    if (isset($userDetails['tole'])) {
                                                                                                                                        echo $userDetails['tole'];
                                                                                                                                    }
                                                                                                                                    ?>">
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="password">
                                    <h4>Password</h4>
                                </label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="password" title="enter your password." value="<?php
                                                                                                                                                                        if (isset($userDetails['password'])) {
                                                                                                                                                                            echo $userDetails['password'];
                                                                                                                                                                        }
                                                                                                                                                                        ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <br>
                                <button class="btn btn-lg btn-success pull-right" type="submit" name="update-profile"><i class="glyphicon glyphicon-ok-sign"></i> Update Profile</button>
                                <!--<button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>-->
                            </div>
                        </div>
                    </form>
                </div>

            </div>
            <!--/tab-pane-->
        </div>
        <!--/tab-content-->

    </div>
    <!--/col-9-->
</div>
<!--/row-->

<script>
    $(document).ready(function() {


        var readURL = function(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('.avatar').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }


        $(".file-upload").on('change', function() {
            readURL(this);
        });
    });


    let firstName = document.getElementById('firstName');
    let lastName = document.getElementById('lastName');
    let email = document.getElementById('email');
    let phoneNumber = document.getElementById('phoneNumber');
    let state = document.getElementById('state');
    let city = document.getElementById('city');
    let tole = document.getElementById('tole');
    let password = document.getElementById('password');

    function validateFormData() {
        let isValidated = false;
        if (
            !isEmpty(firstName) && !isEmpty(lastName) &&
            !isEmpty(email) && !isEmpty(phoneNumber) &&
            !isEmpty(state) && !isEmpty(city) &&
            !isEmpty(tole) && !isEmpty(password) && validateEmail(email.value)
        ) {
            if ((phoneNumber.value).length == 10) {
                if ((password.value).length > 6) {
                    isValidated = true;
                } else {
                    handleErrorMessage(password, true);
                }
            } else {
                handleErrorMessage(phoneNumber, true);
            }
        }

        return isValidated;

    }

    function validateEmail(mail) {
        const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        isValid = re.test(mail.toLowerCase());
        if (isValid) {
            handleErrorMessage(email, false);
            return true;
        } else {
            handleErrorMessage(email, true);
            return false;
        }
    }

    function isEmpty(field) {
        if (field.value === "") {
            handleErrorMessage(field, true);
            return true;
        } else {
            handleErrorMessage(field, false);
            return false;
        }
    }

    function handleErrorMessage(field, status) {
        if (status == true) {
            field.style.borderBottom = "2px solid";
            field.style.borderBottomColor = "red";
        } else {
            field.style.borderBottom = "1px solid";
            field.style.borderBottomColor = "#ddd";
        }
    }

    email.addEventListener('input', function() {
        validateEmail(email.value);
    });
</script>