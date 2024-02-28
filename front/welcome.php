



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

    <style>
body {
  background-image: url('../images/laptopBG.jpg');
  background-repeat: no-repeat;
  background-size: 1400px 600px ;
  
}

    </style>
</head>
<body>

    <!-- Navbar -->
          <?php require '../partials/_nav.php' ?>
    <!-- Navbar end -->

    <?php
require '../crud/connect.php';
if(isset($_SESSION['login'])){

  ?>
  <div class="container">

<a href="../crud/index.php"><button type="button" class="btn btn-outline-danger mt-5" id="crud-btn">Go To CRUD Application</button></a>

</div>
  <?php
} else{
  ?>
<div class="container">

<a href="./login.php"><button type="button" class="btn btn-outline-primary mt-5" id="crud-btn">Login First for CRUD Application</button></a>

</div>
  <?php

}
?>

  
    


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


</body>
</html>