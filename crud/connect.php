<?php
session_start();
$server = "localhost";
$user_name = "root";
$password = "";
$database = "ajax-crud";
$conn = mysqli_connect($server, $user_name , $password, $database);


// if($conn){
//     echo("Connection successful");
// }else{
//     die("Sorry We failed to connect". mysqli_connect_error());
// }


// Check connection
if(!$conn){
    die("Sorry We failed to connect". mysqli_connect_error());
}

?>