<?php
if (isset($_POST['submit'])) {
    if (isset($_FILES['file']['name'])) {
        echo "hi";
        $file = $_FILES['file'];
        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('jpg', 'jpeg', 'png');

        if (in_array($fileActualExt, $allowed)) {
            if ($fileError === 0) {
                if ($fileSize < 1000000) {
                    $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                    $fileDestination = 'uploads/' . $fileNameNew;
                    if (move_uploaded_file($fileTmpName, $fileDestination)) {
                        header("Location: profile.php?uploaded");
                    } else {
                        header("Location: profile.php?uploadfailed");
                    }
                } else {
                    header("Location: profile.php?largefile");
                }
            } else {
                header("Location: profile.php?erroruploading");
            }
        } else {
            header("Location: profile.php?unsupportedfile");
        }
    }
}
