<?php
include ('config/config.php');
include ('config/db.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM `person` WHERE pid = $id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location: guestbook-list.php");
        exit;
    } else {
        echo "Failed: Error " . mysqli_error($conn);
    }
}

$sql = "SELECT * FROM `person`";
$result = mysqli_query($conn, $sql);
$persons = array();
if ($result) {
    while ($person = mysqli_fetch_assoc($result)) {
        $persons[] = $person;
    }
} else {
    echo "Failed: Error " . mysqli_error($conn);
}

include('inc/header.php');
?>