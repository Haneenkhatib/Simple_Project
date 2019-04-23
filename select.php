<?php
require_once 'DBConnection.php';

$sql = "SELECT * FROM user_s";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $i=0;
        echo"
        <tr>
        <td>".++$i."</td>
        <td>".$row['name']."</td>
        <td>".$row['title']."</td>
        <td>".$row['gender']."</td>
        <td>".$row['Intrests']."</td>
        </tr>
        ";


    }
} else {
    echo "0 results";
}
$con->close();
