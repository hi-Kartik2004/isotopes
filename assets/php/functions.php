<?php
require_once('config.php');
session_start();
// error_reporting(0);
$conn = mysqli_connect(db_server, db_username, db_password, db_name);
// checking data base connection.
if ($conn) {
    // echo "Success";
} else {
    die("failed to connect with data base");
}

//To show the page
function showPage($page, $data = "")
{
    include("assets/pages/$page.php");
}

// To validate user
function validateUser($data)
{
    unset($_SESSION['error_status']);
    // remembering the inputs...
    $_SESSION['username'] = $data['username'];
    $_SESSION['farm_name'] = $data['farm_name'];
    $_SESSION['firstname'] = $data['first_name'];
    $_SESSION['lastname'] = $data['last_name'];
    $_SESSION['email'] = $data['email'];
    $_SESSION['phone'] = $data['phone'];
    global $conn;
    // $_SESSION['error_status'] = false;
    $inputted_email = $data['email'];
    $inputted_username = $data['username'];
    $sql_query = "SELECT * from `users` WHERE `username`='$inputted_email';";
    $run = mysqli_query($conn, $sql_query);
    $number_of_rows = mysqli_num_rows($run);
    // if($number_of_rows>0){
    //     $_SESSION['error_status'] = true;
    //     $_SESSION['error_field'] = 'verified';
    //     $_SESSION['error_msg'] = "Verification incomplete";
    //     //redirect to verification page...
    // }

    // $sql_query = "SELECT * from `users_information` WHERE `email`= '$inputted_email';";
    // $run = mysqli_query($conn,$sql_query);
    // $number_of_rows = mysqli_num_rows($run);
    // echo $number_of_rows;
    if ($number_of_rows > 0) {
        $_SESSION['error_status'] = true;
        $_SESSION['error_field'] = 'email';
        $_SESSION['error_msg'] = "Email already exsists";
    }
    $sql_query = "SELECT * from `users` WHERE `username`= '$inputted_username';";
    $run = mysqli_query($conn, $sql_query);
    $number_of_rows = mysqli_num_rows($run);
    // echo $number_of_rows;
    if ($number_of_rows > 0) {
        $_SESSION['error_status'] = true;
        $_SESSION['error_field'] = 'username';
        $_SESSION['error_msg'] = "Username already taken";
    }

    if ($data['cpassword'] != $data['password']) {
        $_SESSION['error_status'] = true;
        $_SESSION['error_field'] = 'password';
        $_SESSION['error_msg'] = "Password Mismatch Please recheck";
    }




    // $run = mysqli_query()
}


// To show error:

function showError()
{
    if (isset($_SESSION['error_status']) && $_SESSION['error_status'] == true) {
        $error_msg = $_SESSION['error_msg'];
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
         ' . $error_msg . '
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
    // global $error_msg;

}

// To add user to database:

function addUser($data)
{
    global $conn;
    $username = $data['username'];
    $password = $data['password'];
    $farm_name = $data['farm_name'];
    $firstname = $data['first_name'];
    $lastname = $data['last_name'];
    $email = $data['email'];
    $phone = $data['phone'];
    $query = "INSERT INTO `users` (`id`, `username`, `password`, `first_name`, `last_name`, `farm_name`, `profile_pic`, `created_at`, `updated_at`, `user_login`, `email`, `phone`) VALUES (NULL, '$username', '$password', '$firstname', '$lastname', '$farm_name', ' ', current_timestamp(), current_timestamp(), '0', '$email', '$phone');";

    $run = mysqli_query($conn, $query);
    if ($run) {
        $msg = "User successfully registered, please login";
        return $msg;
    } else {
        $msg = "Oops seems like something went wrong";
        return $msg;
    }
}

// to validate login url
function validateUserLogin($data)
{
    global $conn;
    $username = trim($data['username']);
    $password = trim($data['password']);
    $sql_query = "SELECT * FROM `users` WHERE `username` = '$username'";
    $run = mysqli_query($conn, $sql_query);
    $row_count_username = mysqli_num_rows($run);
    if ($row_count_username == 1) {
        $password_check_query = "SELECT `password` FROM `users` WHERE `username` = '$username';";
        $password_run = mysqli_query($conn, $password_check_query);
        $correct_password = mysqli_fetch_assoc($password_run);
        $correct_password_final = $correct_password['password'];
        if ($password == $correct_password_final) {
            $_SESSION['auth_method'] = "username";
            // header('location : ../../?home');
            return 1;
        } else {

            $_SESSION['error_status'] = 1;
            $_SESSION['error_msg'] = "incorrect Password";
            // header("location : ../../?login");
            return 0;
        }
    }
    $sql_query = "SELECT * FROM `users` WHERE `phone` = '$username'";
    $run = mysqli_query($conn, $sql_query);
    $row_count_email = mysqli_num_rows($run);
    if ($row_count_email > 0) {
        $password_check_query = "SELECT `password` FROM `users` WHERE `phone` = '$username';";
        $password_run = mysqli_query($conn, $password_check_query);
        $correct_password = mysqli_fetch_assoc($password_run);
        $correct_password_final = $correct_password['password'];
        if ($password == $correct_password_final) {
            $_SESSION['auth_method'] = "phone";
            return 1;
        } else {
            $_SESSION['error_status'] = 1;
            $_SESSION['error_msg'] = "Incorrect Password";
            return 0;
        }
    }

    if ($row_count_email == 0 && $row_count_username == 0) {
        $_SESSION['error_status']  = 1;
        $_SESSION['error_msg'] = "Invalid Username or Phone Number";
        return 0;
    }

    return -1;
}

// find user
function findUser($phone)
{
    global $conn;
    $sql_query = "SELECT * from `users` WHERE `phone` = '$phone';";
    $run = mysqli_query($conn, $sql_query);
    $rows_count = mysqli_num_rows($run);
    if ($rows_count == 1) {
        $userdata = mysqli_fetch_assoc($run);
        $userdata['userExists'] = true;
        return $userdata;
    }


    return false;
}


//send otp

function sendOtp($phone)
{
    header("location: send_otp.php?phone=" . $phone);
    return true;
}

//login success
function loginSuccess($entered_phone)
{
    unset($_SESSION);
    session_destroy();
    session_start();
    global $conn;
    $correct_phone = $entered_phone;
    $userdata_query = "SELECT * FROM `users` WHERE `phone` = '$correct_phone';";
    $run = mysqli_query($conn, $userdata_query);
    $userdata = mysqli_fetch_assoc($run);
    print_r($userdata);
    $_SESSION['auth'] = true;
    $_SESSION['userdata'] = $userdata;
    $login_query = "UPDATE `users` SET `user_login` = '1' WHERE `users`.`phone` = '$correct_phone';";
}

function findUserByUsername($username)
{
    global $conn;
    $userdata_query = "SELECT * FROM `users` WHERE `phone` = '$username';";
    $run = mysqli_query($conn, $userdata_query);
    $userdata = mysqli_fetch_assoc($run);

    return $userdata;
}
