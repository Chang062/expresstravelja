<?php
$title = "Success";
require_once 'includes/header.php';
require_once 'db/conn.php';
//require_once 'sendemail.php';


if (isset($_POST['register'])) {
    $uname = strtolower(trim($_POST['username']));
    $email = strtolower(trim($_POST['email']));
    $password = $_POST['password'];

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
if (isset($_POST['createAdmin'])) {
    $uname = strtolower(trim($_POST['username']));
    $email = strtolower(trim($_POST['email']));
    $password = $_POST['password'];

    $isSuccess = $admins->insertAdmin($uname, $email, $password);
    header("location: adminPanel/loginAdmins.php");
}


if (isset($_POST['booknow'])) {



    $check_in = date_create($_POST['check_in']);
    $check_out = date_create($_POST['check_out']);
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $hotel_id = $_POST['hotel_id'];
    $room_id = $_POST['room_id'];
    $days = date_diff($check_in, $check_out);
    $payment = $_POST['payment'] * intval($days->format('%R%a'));;

    $_SESSION['price'] = $payment;

    if (date("m/d/Y") > $check_in or date("m/d/Y") > $check_out) {
        echo "<script>alert('Error: You cannot choose a date in the past')</script>";
        echo "<script>window.location.href='room.php'</script>";
    } else if ($check_in > $check_out or $check_in == date("m/d/Y")) {
        echo "<script>alert('error: Please check that you are entering the a valid date')</script>";
        echo "<script>window.location.href='room.php'</script>";
    } else {
        $isSuccess = $crud->insertBookings($full_name, $check_in, $check_out, $email, $contact, $hotel_id, $room_id, $payment);
    }
    /*
    if ($isSuccess) {
        SendEmail::SendMail($email, 'Welcome to ICT WORKSHOP', 'You have successfully registerted for Fall year\'s ICT WORKSHOP');
        include 'includes/successmessage.php';
    } else {
        include 'includes/errormessage.php';
    }*/
}

if (isset($_POST['createHotel'])) {
    $name = $_POST['name'];
    $location = $_POST['location'];
    $description = $_POST['description'];
    $orig_file = $_FILES["image"]["tmp_name"];
    $ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
    $target_dir = 'images/';
    $destination = "$target_dir$name.$ext";
    move_uploaded_file($orig_file, $destination);


    $isSuccess = $crud->insertHotel($name, $location, $description, $destination);
    header("location: adminPanel/showHotels.php");
}

if (isset($_POST['updateHotel'])) {

    $id = $_POST['id'];
    $name = $_POST['name'];
    $location = $_POST['location'];
    $description = $_POST['description'];

    $result = $crud->updateHotel($id, $name, $location, $description);
    if ($result) {
        header("location: adminPanel/showHotels.php");
    } else {
        // header("location: adminPanel/errormessage.php");
    }
} else {
    //header("location: adminPanel/errormessage.php");
}
