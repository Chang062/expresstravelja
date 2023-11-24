<?php
require_once '../includes/auth_check.php';
require_once '../db/conn.php';

if (!isset($_GET['id'])) {
    include 'errormessage.php';
    header("Location: showHotels.php");
} else {
    $id = $_GET['id'];
    $result = $crud->deleteHotel($id);

    if ($result) {
        header("Location: showHotels.php");
    } else {
        include 'errormessage.php';
    }
}
