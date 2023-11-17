<?php
$title = "Success";
require_once 'includes/header.php';
require_once 'db/conn.php';
//require_once 'sendemail.php';


if (isset($_POST['register'])) {
    $uname = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $email = $_POST['email'];


    $isSuccess = $users->insertUser($uname, $email, $password);
    header("location: login.php");


    /*
    if ($isSuccess) {
        SendEmail::SendMail($email, 'Welcome to ICT WORKSHOP', 'You have successfully registerted for Fall year\'s ICT WORKSHOP');
        include 'includes/successmessage.php';
    } else {
        include 'includes/errormessage.php';
    }*/
}


if (isset($_POST['booknow'])) {


    $check_in = $_POST['check_in'];
    $check_out = $_POST['check_out'];
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $hotel_id = $_POST['hotel_id'];
    $room_id = $_POST['room_id'];
    $user_id = $_POST['user_id'];

    if (date("Y/m/d") > $check_in or date("Y/m/d") > $check_out) {
        echo "<script>alert('Error: You cannot choose a date in the past')</script>";
    } else if ($check_in > $check_out or $check_in == date("Y/m/d")) {
        echo "<script>alert('error: Please check that you are entering the a valid date')</script>";
    } else {
        $isSuccess = $crud->insertBookings($full_name, $check_in, $check_out, $email, $contact, $hotel_name, $room_type, $user_id);
        header("location: index.php");
    }





    /*
    if ($isSuccess) {
        SendEmail::SendMail($email, 'Welcome to ICT WORKSHOP', 'You have successfully registerted for Fall year\'s ICT WORKSHOP');
        include 'includes/successmessage.php';
    } else {
        include 'includes/errormessage.php';
    }*/
}
