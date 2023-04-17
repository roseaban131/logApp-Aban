<?php
include "config/db.php";
include "config/config.php";
$id = $_GET['pid'];
$sql = "DELETE FROM `person` WHERE pid = $id";
$result = mysqli_query($conn, $sql);
if($result){
    header("Location: guestbook-list.php");
}
else {
    echo "Failed: Error" . mysqli_error($conn);
}
?>