

<?php
require '../crud/connect.php';
if(isset($_POST["submit"])){
    $usernameEmail = $_POST["usernameEmail"];
    $password = $_POST["password"];
    $result= mysqli_query($conn,"SELECT * FROM `users` WHERE `username`='$usernameEmail' or `email`='$usernameEmail'");

    $row= mysqli_fetch_array($result);
    if(mysqli_num_rows($result)> 0){
    if($password == $row["password"]){
        $_SESSION["login"] = true;
        $_SESSION["id"] = $row['id'];
$_SESSION['username'] = $row['username'];
        header('Location: ./welcome.php');

    }else{
        echo "<script> alert('wrong password'); </script>";
    // header('Location: ./register.php');

    }
}else{
    echo "<script> alert('User not Registered');  </script>";
    header('Location: ./register.php');


}

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

    <style>
        body{
            background-image: url(../images/white-officeBG.jpg) ;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            background-size: 1400px 600px ;
           
        }
        .container{
            display: flex;
            flex-direction: column;
            background-color: transparent;
            position: absolute;
            right: 0;
            margin: 40px;
            max-width: 400px;
            max-height: 500px;
            padding: 20px;
             border: 1px solid blue;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
        <?php require '../partials/_nav.php' ?>
    <!-- End navbar -->
    
    <div class="login-form">
        <form class="container" action="" method="POST" autocomplete="off">
        <h2 class="text-center">Log in </h2>
        <hr>
        <div class="mb-3">
        <label for="usernameEmail" class="form-label">User Name or Email</label>
        <input type="text" class="form-control" id="usernameEmail" name="usernameEmail" required>
        </div>
       
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
       
            <div class="d-grid">
            <button type="submit" name="submit" class="btn btn-warning">Login</button>
            </div>
            
            <label for="password" class="form-label">If you are not login First <a href="./register.php">Register</a></label>
        
          
</form>
    </div>
    



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>
</html>