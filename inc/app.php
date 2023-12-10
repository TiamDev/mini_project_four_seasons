<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once 'index.php';

require_once 'lib/PHPMailer-6.8.1/src/PHPMailer.php';
require_once 'lib/PHPMailer-6.8.1/src/SMTP.php';
require_once 'lib/PHPMailer-6.8.1/src/Exception.php';
$mail = new PHPMailer(true);
$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);
if (isset($_POST['send'])) {

    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = "App Email Here";
    $mail->Password   = ''; //app password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587; // 587
    $mail->CharSet = 'UTF-8'; // Set UTF-8 character encoding
    $mail->setFrom("App Email Here", "Info");
    $mail->addAddress("Admin Email Here"); //$_POST['email']
    $mail->isHTML(true);
    $mail->Subject = $_POST['subject'];
    $mail->Body    = $_POST['email'] . "\n\n" . $_POST['message']; // $strMessage;

    $mail->send();
    return true;
} else {
}
if (isset($_POST['booking'])) {

    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = "App Email Here";
    $mail->Password   = ''; //app password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587; // 587
    $mail->CharSet = 'UTF-8'; // Set UTF-8 character encoding
    $mail->setFrom("App Email Here", "Info");
    $mail->addAddress("Admin Email Here"); //$_POST['email']
    $mail->isHTML(true);
    $mail->Subject = "Booking a Table";
    $mail->Body    = "Username: " . $_POST['name'] . "\r\n\r\nEmail: " . $_POST['email'] . "\r\n\r\nPhone: " . $_POST['phone'] . "\r\n\r\nDate: " . $_POST['date'] . " " . $_POST['time'] . "\r\n\r\nPeople: " . $_POST['people'] . "\r\n\r\nMessage: " . $_POST['message']; // $strMessage;

    $mail->send();
    //send email to customer
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = "App Email Here";
    $mail->Password   = ''; //app password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587; // 587
    $mail->CharSet = 'UTF-8'; // Set UTF-8 character encoding
    $mail->setFrom("App Email Here", "Four Season Restaurant");
    $mail->addAddress($_POST['email']); //$_POST['email']
    $mail->isHTML(true);
    $mail->Subject = "Booking a Table";
    $mail->Body    = "Hi  " . $_POST['name'] . "\r\n\r\nThank you for your Reservation in our Restaurant .\r\n\r\nYour Resrevation will be Confirmed as Soon as Possible .";

    $mail->send();
    return true;
} else {
}
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function myAppIsUserSignedIn()
{
    return isset($_SESSION['isSignedIn']);
}

function myAppSignout()
{
    // Starting a session
    // session_start();
    session_unset();
    session_destroy();
}

function myAppDeleteLastSlash($string)
{
    if (substr($string, -1) === '/') {
        $string = substr_replace($string, "", -1);
    }
    return $string;
}


function myAppRequestRoute()
{

    // Get the file name from the URL
    $pageName = $_SERVER['REQUEST_URI'];
    $pageName = str_ireplace(ROOT_PATH, "", $pageName);
    $pageName = myAppDeleteLastSlash($pageName);
    if ($pageName == "") {
        $pageName = "home";
    } else if ($pageName == "admin") {
        $pageName = "admin/home";
    }
    return $pageName;
}
