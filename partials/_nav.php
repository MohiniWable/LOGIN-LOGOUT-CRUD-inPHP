


<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="../front/welcome.php">Intellect</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>


    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../front/welcome.php">Home</a>
        </li>
       
        <li class="nav-item">
          <a class="nav-link" href="../front/register.php">Register</a>
        </li>
        
        <?php
        // require '../crud/connect.php';
        if(isset($_SESSION['login'])){
        ?>

        <li class="nav-item">
          <a class="nav-link" href="../front/logout.php">Logout</a>
        </li>
        
    <?php }else{
      ?>
       <li class="nav-item">
          <a class="nav-link" href="../front/login.php">Login</a>
        </li>
        <?php
    }  ?>
        
      </ul>
    </div>
  </div>
</nav>
