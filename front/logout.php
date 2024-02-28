<?php

require '../crud/connect.php';
$_SESSION = [];
session_unset();
session_destroy();
// echo "logout successful!!";

header("Location: ./welcome.php");


?>