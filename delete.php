<?php
include 'connection.php';

$id = $_GET["id"];

$sql = "DELETE FROM customer_info WHERE id=$id";

if ($connection->query($sql) === TRUE) {
    echo "Record deleted successfully";
    header("location: /customerdatacollection/index.php");
    exit;
} else {
    echo "Error: " . $sql . "<br>" . $connection->error;
}


?>