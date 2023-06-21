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
          
          
$request = query("SELECT * FROM request WHERE user_id = $_SESSION[id_user]");
// $fetch = mysqli_fetch_array($request);

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>User Profile</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
      data-tag="font"
    />
    <style>
    	.box {
    		margin-left: 100px;
        margin-right: 150px;
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
      .btn {
        background-color: #00C99F;
        color: white;
        font-family: Poppins;
        outline: none;
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

<br>
<h2>Event Request</h2>
<br>

<div class="box">
	<table border="0" cellpadding="10" cellspacing="0" width="100%">
	<tr>
		<th>#</th>
		<th>Poster</th>
		<th>Event Name</th>
		<th>Date</th>
    <th>Status</th>
		<th></th>
	</tr>

	<?php $i = 1; ?>
	<?php foreach ($request as $row) : ?>
	<tr style="column-width: 100%;">
		<td><?= $i; ?></td>
		<td><img src="img/<?= $row['image']; ?>" width="100px"></td>
		<td><?= $row["nama_event"]; ?></td>
		<td><?= $row["tgl_event"]; ?></td>
    <td><?= $row["status"]; ?></td>
		<?php if ($row["status"] == 'requested') : ?>
    <td>
			
        <a href="editRequest.php?id=<?= $row['id']; ?>">
      
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
			  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
			  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
			</svg></a>
      
		</td>
    <?php endif ?>
	</tr>
	<?php $i++; ?>
	<?php endforeach ?>
</table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>