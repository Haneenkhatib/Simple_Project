<?php
require_once 'DBConnection.php';

$row=$_POST['row_id'];
$name=$_POST['name_val'];
$title=$_POST['title_val'];
$gender=$_POST['gender_val'];
$intresets=$_POST['intresets_val'];
var_dump($_POST);
$sql="update user_s set name='$name',title='$title',gender='$gender',intresets='$intresets' where id='$row'";
if ($con->query($sql) === TRUE) {
    echo "success";
    exit();
} else {
//    $data = array("msg"=>"fail");
}
//echo json_encode($data);
$con->close(); // Connection Closed
