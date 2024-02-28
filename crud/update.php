<?php

include ("connect.php");

if (isset($_POST["updateid"]) && isset($_POST["updateid"]) != "") {
    $user_id = $_POST["updateid"];

    $updateQuery = "SELECT * FROM `crudtable` WHERE id = $user_id ";

    // if(!$result = mysqli_query($conn, $updateQuery)) {
    //     exit(mysqli_error($conn));
    // }


    $result = mysqli_query($conn, $updateQuery);
    $response = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $response = $row;
}

echo json_encode($response);
}else{
    $response['status']= 200;
    $response['message']= 'Data not found';
}



//  Update Query

if(isset($_POST['hiddenData'])) {
    $uniqueid = $_POST['hiddenData'];
    $firstname = $_POST['updateFirstName'];
    $lastname = $_POST['updateLastName'];
    $email = $_POST['updateEmail'];
    $mobile = $_POST['updateMobile'];

    $sql= "UPDATE `crudtable` SET `firstname`='$firstname',`lastname`='$lastname',`email`='$email',`mobile`='$mobile' WHERE id= $uniqueid";

    $result = mysqli_query($conn, $sql);

}
?>