<?php 

session_start();
if(!isset($_SESSION['id_user'])){
header("Location: user_login.php");

exit;
}

if (isset($_POST['logout'])){
  session_start();
  session_destroy();
  header('location: landingremake.php');
}

//hubungkan hal index dgn function
require 'functions.php';
$event = ' ';

//tombol cari ditekan
if (isset($_POST["cari"])) {
  $event = cari($_POST['keyword']);
}


 ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Semar Event Hub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
      data-tag="font"
    />

    <style>
      .nav-item {
        font-family: Poppins;
        background-color: transparent;
      }
      .card {
        font-family: Poppins;
      }
      h1 {
        font-family: Poppins;
        text-align: center;
      }
      .box-carousel {
        margin-top: 20px;
        margin-left: 40px;
        margin-right: 40px;
      }
      .box-cards {
        margin-left: 100px;
        margin-right: 100px;
      }
      nav {
        margin-top: 15px;
        margin-right: 150px;
        margin-left: 80px;
        background-color: transparent;
      }
      .nav-link {
      color: black;
      font-weight: bold;
      background-color: transparent;
      }
      body {
        background-image: linear-gradient(221deg, rgba(255, 255, 255, 1) 0%, rgba(77, 106, 255, 0.7900000214576721) 100%);
      }
      .card {
        color: white;
        width: 18rem;
        background-color: #131D32;
      }
      .list-group-item {
        color: white;
        background-color: #131D32;
      }
      .btn {
        background-color: #00C99F;
        color: white;
        font-family: Poppins;
      }
      .search {
        scale: 170%;
        margin-top: -20px;
        margin-bottom: 30px;
        margin-right: 500px;
        margin-left: 500px;
      }
    </style>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="img/logo.png" alt="Logo" class="d-inline-block align-text-top"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="nav justify-content-end" id="navbarSupportedContent">
          <ul class="nav justify-content-end ">
            <li class="nav-item custom-nav-item">
              <a class="nav-link active" aria-current="page" href="request.php">Request Publish</a>
            </li>
            <li class="nav-item custom-nav-item">
              <a class="nav-link active" aria-current="page" href="home.php">Home</a>
            </li>
            <li class="nav-item custom-nav-item">
              <a class="nav-link active" aria-current="page" href="user_logout.php">Logout</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
              </svg> 
               <?php 
          
                  require'config.php';
          
          
                  $query = mysqli_query($conn, "SELECT * FROM `user` WHERE `id_user`='$_SESSION[id_user]'") or die(mysqli_error());
                  $fetch = mysqli_fetch_array($query);
          
                  // echo "<h2 class='text-success'>".$fetch['nama_admin']."</h2>";
                ?>
                
               <?= $fetch['nama'] ?>
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="profil.php">Event Request</a></li>
                <li><a class="dropdown-item" href="change-password.php">Change Password</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
  </nav>

<div class="box-carousel">
    <div id="carouselExample" class="carousel slide">
      <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="img/header2.png" class="d-block w-100" >
        </div>
        <div class="carousel-item">
            <img src="img/image 8.png" class="d-block w-100">
        </div>
        <div class="carousel-item">
            <img src="img/header3.png" class="d-block w-100" >
        </div>
        <div class="carousel-item">
            <img src="img/header4.png" class="d-block w-100" >
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</div>

<div class="search">
  <form class="d-flex" role="search" action="search.php" method="post">
    <input name="keyword" class="form-control me-2" type="search" placeholder="Search" aria-label="Search" autofocus>
    <button name="cari" class="btn" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
      <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
    </svg></button>
  </form>
</div>

<div class="buttons" align="center">
  <a href="concert.php"><button type="button" class="btn">Concert</button></a>
  <a href="seminar.php"><button type="button" class="btn">Seminar</button></a>
  <a href="bazaar.php"><button type="button" class="btn">Bazaar</button></a>
  <a href="other.php"><button type="button" class="btn">Other</button></a>
</div>

    
  </div>

  <br>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>