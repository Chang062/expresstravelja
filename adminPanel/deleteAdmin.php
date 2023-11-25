<?php
require_once '../db/conn.php';

if (!isset($_GET['id'])) {
    include 'errormessage.php';
} else {
    $id = $_GET['id'];
    $result = $admins->deleteAdmin($id);

    if ($result) {
        header("Location: showAdmins.php");
    } else {
        include 'errormessage.php';
    }
}
