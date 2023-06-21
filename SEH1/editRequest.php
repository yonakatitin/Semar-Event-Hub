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
$id = $_GET["id"];

//query data mahasiswa berdasar id
$rqs = query("SELECT * FROM request WHERE id = $id")[0];

if (isset($_POST['submit'])) {
	if (ubah($_POST) > 0) {
		echo "
			<script>
				alert('data berhasil diubah');
				document.location.href = 'profil.php'
			</script>
		";
	} else {
		echo "<script>
				alert('data gagal diubah');
				document.location.href = 'profil.php'
			</script>
		";
	}
}

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit Request Event</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
      data-tag="font"
    />
    <style>
    	.box {
    		margin-left: 100px;
    		margin-right: 100px;
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
      .button {
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
<h2>Edit Request</h2>
<br>

	<div class="box">
		<form class="row" action="" method="post" enctype="multipart/form-data" id="form">
			<input type="hidden" name="id" value="<?= $rqs["id"]; ?>">
			<input type="hidden" name="oldImage" value="<?= $rqs["image"]; ?>">
		  <div class="col">
		    <div class="col mb-3">
			    <label for="event-name" class="form-label">Event Name</label>
			    <input type="text" class="form-control" name="nama_event" id="event-name" required value="<?= $rqs["nama_event"]; ?>">
			  </div>
			  <div class="col mb-3">
			    <label for="venue" class="form-label">Venue/Location</label>
			    <input type="text" class="form-control" name="lokasi_event" id="venue" required value="<?= $rqs["lokasi_event"]; ?>">
			  </div>
			  <div class="row">
				  <div class="col">
				    <div class="mb-3">
					    <label for="date" class="form-label">Start Date</label>
					    <input type="date" class="form-control" name="tgl_event" id="date" required value="<?= $rqs["tgl_event"]; ?>">
					  </div>
				  </div>
				  <div class="col">
				    <div class="mb-3">
					    <label for="date" class="form-label">End Date</label>
					    <input type="date" class="form-control" name="tglakhir_event" id="date" required value="<?= $rqs["tglakhir_event"]; ?>">
					  </div>
				  </div>
				</div>
				<div class="col mb-3">
				  <label for="desc" class="form-label">Description</label>
				  <textarea class="form-control" name="deskripsi_event" id="desc" rows="3" required><?= $rqs["deskripsi_event"]; ?></textarea>
				</div>
				<div class="col mb-3">
			    <label class="form-label" for="autoSizingSelect">Category</label>
			    <select class="form-select" name="kategori_event" id="autoSizingSelect">
			      <option value="1" <?php if($rqs['kategori_event'] == 1) {echo "selected";} ?>>Concert</option>
			      <option value="2" <?php if($rqs['kategori_event'] == 2) {echo "selected";} ?>>Seminar</option>
			      <option value="3" <?php if($rqs['kategori_event'] == 3) {echo "selected";} ?>>Baazar</option>
			      <option value="4" <?php if($rqs['kategori_event'] == 4) {echo "selected";} ?>>Other</option>
			    </select>
			  </div>
				<div class="col mb-3">
			    <label for="cp" class="form-label">
			    	<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
					  <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
					</svg> Contact Information</label>
			    <input type="text" class="form-control" name="cp" id="cp" required value="<?= $rqs["cp"]; ?>">
			  </div>
			  <div class="col mb-3">
			    <label for="regist" class="form-label">
			    	<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-link-45deg" viewBox="0 0 16 16">
					  <path d="M4.715 6.542 3.343 7.914a3 3 0 1 0 4.243 4.243l1.828-1.829A3 3 0 0 0 8.586 5.5L8 6.086a1.002 1.002 0 0 0-.154.199 2 2 0 0 1 .861 3.337L6.88 11.45a2 2 0 1 1-2.83-2.83l.793-.792a4.018 4.018 0 0 1-.128-1.287z"/>
					  <path d="M6.586 4.672A3 3 0 0 0 7.414 9.5l.775-.776a2 2 0 0 1-.896-3.346L9.12 3.55a2 2 0 1 1 2.83 2.83l-.793.792c.112.42.155.855.128 1.287l1.372-1.372a3 3 0 1 0-4.243-4.243L6.586 4.672z"/>
					</svg> Registration Link</label>
			    <input type="text" class="form-control" name="regist_link" id="regist" required value="<?= $rqs["regist_link"]; ?>">
			  </div>
			  <button type="submit" class="button btn" name="submit" style="font-size: 18px;">Submit</button>
			  <button class="btn btn-danger">
		      <a href="profil.php" style="color:#ffffff; text-decoration: none;">Cancel</a>
		    </button>
		  </div>
		  <div class="col" align="center">
		    <script>
					function preview() {
		   		thumb.src=URL.createObjectURL(event.target.files[0]);
		 			}
				</script>
			  <div class="col mb-3">
				  <img id="thumb" src="img/<?= $rqs["image"]; ?>"><br>
				</div>
				<div class="col mb-3" id="file">
					<label for="image" class="btn">Select Image</label>
				  <input type="file" title="<?= $rqs["image"]; ?>" class="form-control" name="image" id="image" onchange="preview()" style="visibility:hidden;">
				</div>
		  </div>
		</form>
	</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>