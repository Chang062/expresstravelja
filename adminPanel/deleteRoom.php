<?php

require_once '../db/conn.php';

if (!isset($_GET['id'])) {
    include 'errormessage.php';
} else {
    $id = $_GET['id'];
    $result = $crud->deleteRoom($id);

    if ($result) {
        header("Location: showRooms.php");
    } else {
        include 'errormessage.php';
    }
}
