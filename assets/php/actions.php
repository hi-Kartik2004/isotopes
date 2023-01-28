<?php
require_once('config.php');
require_once('functions.php');
ob_start();
// session_start();

//try signup
if (isset($_GET['try-signup'])) {
    // print_r($_POST);
    validateUser($_POST);
    // print_r($userdata);
    if (isset($_SESSION['error_status']) && $_SESSION['error_status'] == true) {
        echo "failed to insert";
        header("location: ../../?signup");
    } else {
        echo "inserted";
        $success_msg = addUser($_POST);
        // echo $success_msg;
        $_SESSION['error_status'] = 1;
        $_SESSION['error_msg'] = $success_msg;
        header("location: ../../?login");
    }
}


// User login
if (isset($_GET['user-login-try'])) {
    print_r($_POST);
    $validationStatus = validateUserLogin($_POST);
    print_r($_SESSION);
    if ($_SESSION['auth_method'] == "username") {
        $username = $_POST['username'];
        $userdata = findUserByUsername($username);
        print_r($userdata);
    }
    // echo $validationStatus;
    if (isset($_SESSION['error_status']) && $_SESSION['error_status'] == 1) {
        echo "error exists";
        header("location: ../../?login");
    } else {
        echo "No error";
        global $userdata;
        $phone = $userdata['phone'];
        loginSuccess($username);
        header("location: ../../?home");
        // die();
    }
}

// Forgot password
if (isset($_GET['forgotPassword'])) {
    // echo "Hi";
    $phone = $_POST['phone'];
    $_SESSION['otp_phone'] = $phone;
    // echo $phone;
    $userExists = findUser($phone);
    print_r($userExists);
    if (isset($userExists['userExists']) && $userExists['userExists']) {
        echo "yes";
        $otpStatus = sendOtp($phone);
        // header("location: ../../?enterotp");
    } else {
        $_SESSION['error_status'] = true;
        $_SESSION['error_msg'] = "User does'nt exist, Please sign up";
        header("location: ../../?forgotten-password");
    }
}

//verify otp

if (isset($_GET['verifyotp'])) {
    global $conn;
    $entered_phone = $_SESSION['otp_phone'];
    $entered_otp = $_POST['otp'];
    $otp_query = "SELECT `otp` FROM `users` WHERE `phone` = '$entered_phone';";
    $run = mysqli_query($conn, $otp_query);
    $otp = mysqli_fetch_assoc($run);
    // print_r($otp);
    $correct_otp = $otp['otp'];
    // echo $correct_otp;
    // echo $entered_otp;
    if ($correct_otp == $entered_otp) {
        loginSuccess($entered_phone);
        header("location: ../../?home");
    } else {
        $_SESSION['error_status'] = true;
        $_SESSION['error_msg'] = "Wrong otp entered";
        header("location: ../../?enterotp");
    }
}
