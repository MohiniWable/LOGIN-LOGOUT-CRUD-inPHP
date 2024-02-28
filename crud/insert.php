<?php
include 'connect.php';

// $firstname = $_POST['firstname'];
// $lastname = $_POST['lastname'];
// $email = $_POST['email'];
// $mobile = $_POST['mobile'];


// By using jquery
extract($_POST);

// insert data in database table
if(isset($_POST['firstnameSend']) && isset($_POST['lastnameSend']) && isset($_POST['emailSend']) && isset($_POST['mobileSend']) )
{
    $query = "INSERT INTO `crudtable`(`firstname`,`lastname`,`email`,`mobile`) VALUES ('$firstnameSend', '$lastnameSend', '$emailSend','$mobileSend')";
    
    $result = mysqli_query($conn, $query);

}


?>