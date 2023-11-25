<?php
require_once '../db/conn.php';

if (!isset($_GET['id'])) {
    include 'errormessage.php';
} else {
    $id = $_GET['id'];
    $result = $crud->deleteHotel($id);

    if ($result) {
        header("Location: showHotels.php");
    } else {
        include 'errormessage.php';
    }
}
