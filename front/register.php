<?php
require '../crud/connect.php';
if(isset($_POST["submit"])){

    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];

    $duplicate = mysqli_query($conn,"SELECT * FROM `users` WHERE `username`='$username' or `email`='$email'");
if(mysqli_num_rows($duplicate) > 0){
    echo "<script> alert('username or email already exist!')</script>";
}else{

    if($password==$cpassword){
        $sql="INSERT INTO `users` (`username`,`email`,`password`) VALUES ('$username','$email', '$password')";
        $result=mysqli_query($conn,$sql);

        echo "<script> alert('Registration successfully!')</script>";
        header("Location: ./login.php");

    }else{
        echo "<script> alert('Password does not match!')</script>";

    }

}
   
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
            padding: 10px;
             border: 1px solid black;
        }

            
    </style>
</head>
<body>
    <!-- Navbar -->
        <?php require '../partials/_nav.php' ?>
    <!-- End navbar -->

<!-- form -->
    <div class="bg">
        <!-- <img src="../images/bg.jpg" alt="register page background" width="100%" height="500px" style="opacity: 0.5; "> -->

        <h1 class="text-center">Registration</h1>
        <form class="container" action="" method="POST" autocomplete="off">
        <div class="mb-3">
        <label for="username" class="form-label">User Name</label>
        <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="mb-3">
            <label for="cpassword" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="cpassword" name="cpassword" required>
        </div>
            <div class="d-grid">
            <button type="submit" name="submit" class="btn btn-warning" style="color: white">Register</button>
            </div>
          
</form>

    </div>

    
   

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
 
 function addUser() {
            // by using jQuery
            var usernameAdd = $('#username').val();
            var emailAdd = $('#email').val();
            var passwordAdd = $('#password').val();
          
            $.ajax({
                url: "add.php",
                type: 'post',
                data: {
                    usernameSend: usernameAdd,
                    emailSend: emailAdd,
                    passwordSend: passwordAdd
                },
                success: function(data, status) {
                    // Function to display data
                    // console.log(status)
                    // $('#completeModal').modal('hide');


                    
                }

            });

        }


</script>

</body>
</html>