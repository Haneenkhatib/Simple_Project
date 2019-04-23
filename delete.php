<?php
require_once 'DBConnection.php';
$id=$_POST['row_id'];
$sql = "DELETE FROM user_s WHERE id=$id";



if ($con->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $con->error;
}
