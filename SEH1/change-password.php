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

require 'functions.php';

if (isset($_SESSION['id_user'])) {

 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Change Password</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
      data-tag="font"
    />
    <style>
      .box {
        margin-left: 100px;
        margin-right: 800px;
        margin-bottom: 100px;
        font-family: Poppins;
      }
      .nav-item {
        font-family: Poppins;
      }
      .card {
        font-family: Poppins;
      }
      h2 {
        font-family: Poppins;
        margin-left: 100px;
        margin-right: 150px;
        background-color: #00C99F;
        color: white;
        padding: 10px;
        font-weight: bold;
      }
      .box-carousel {
        margin: 40px;
      }
      .box-cards {
        margin-left: 100px;
        margin-right: 100px;
      }
      .navbar-brand {
        margin: 20px;
      }
      .nav-item {
        font-family: Poppins;
        background-color: transparent;
      }
      .card {
        font-family: Poppins;
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
      .search {
        scale: 170%;
        margin-top: -20px;
        margin-bottom: 30px;
        margin-right: 500px;
        margin-left: 500px;
      }
      label {
        font-weight: bold;
      }
      .error {
         background: #F2DEDE;
         color: #A94442;
         padding: 10px;
         width: 100%;
         border-radius: 5px;
         margin: 20px auto;
      }

      .success {
         background: #D4EDDA;
         color: #40754C;
         padding: 10px;
         width: 100%;
         border-radius: 5px;
         margin: 20px auto;
      }
      .button {
        background-color: #00C99F;
        color: white;
        font-family: Poppins;
        outline: none;
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

<br>
<?php 
          
  require'config.php';


  $query = mysqli_query($conn, "SELECT * FROM `user` WHERE `id_user`='$_SESSION[id_user]'") or die(mysqli_error());
  $fetch = mysqli_fetch_array($query);
?>

<h2>Change Password</h2>
<br>
<div class="box">
  <form action="change-p.php" method="post">
    <?php if (isset($_GET['error'])) { ?>
        <p class="error"><?php echo $_GET['error']; ?></p>
    <?php } ?>

    <?php if (isset($_GET['success'])) { ?>
          <p class="success"><?php echo $_GET['success']; ?></p>
    <?php } ?>

    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Old Password</label>
      <input type="password" name="op" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">New Password</label>
      <input type="password" name="np" class="form-control" id="exampleInputPassword1">
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Confirm New Password</label>
      <input type="password" name="c_np" class="form-control" id="exampleInputPassword1">
    </div>
    <button type="submit" class="button btn" name="change" style="font-size: 18px;">Change</button>
    <button class="btn btn-danger">
      <a href="home.php" style="color:#ffffff; text-decoration: none;">Cancel</a>
    </button>
  </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>

<?php 
} else {
  header("Location: home.php");
  exit();
}
?>