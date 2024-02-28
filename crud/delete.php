<?php
include ("connect.php");

if(isset($_POST["deleteSend"])){
    $unique = $_POST["deleteSend"];

    $deleteQuery = "DELETE FROM `crudtable` WHERE id = $unique";
    $result = mysqli_query($conn, $deleteQuery);
}


?>