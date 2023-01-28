<?php
require_once('config.php');
session_start();
ob_start();
$conn = mysqli_connect(db_server, db_username, db_password, db_name);
$phone = $_GET['phone'];
$_SESSION['otp_phone'] = $phone;
$otp = rand(1000, 9999);
require __DIR__ . '/vendor/autoload.php';

use Twilio\Rest\Client;

// Your Account SID and Auth Token from twilio.com/console
$account_sid = '';
$auth_token = '';
// In production, these should be environment variables. E.g.:
// $auth_token = $_ENV["TWILIO_AUTH_TOKEN"]

// A Twilio number you own with SMS capabilities
$twilio_number = "+17707624285";

$client = new Client($account_sid, $auth_token);
$client->messages->create(
    // Where to send a text message (your cell phone?)
    '+91' . $phone,
    array(
        'from' => $twilio_number,
        'body' => 'Your otp for Harvest2Home login is : ' . $otp
    )

);

$otp_query = "UPDATE `users` SET `otp` = '$otp' WHERE `users`.`phone` = '$phone';";
$run = mysqli_query($conn, $otp_query);
print_r($client);
echo "<script>
window.location = '../../?enterotp';
</script>";
