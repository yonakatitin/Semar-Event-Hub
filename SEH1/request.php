<?php 
require 'functions.php';

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

if (isset($_POST['submit'])) {
	if (tambah($_POST) > 0) {
		echo "
			<script>
				alert('berhasil request publish event');
				document.location.href = 'profil.php'
			</script>
		";

	} else {
		echo "<script>
				alert('gagal request publish event');
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
	<title>Request Event</title>
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
<h2>Request Event</h2>
<br>

	<div class="box">
		<form class="row" action="" method="post" enctype="multipart/form-data" id="form">
		  <div class="col">
		    <div class="col mb-3">
			    <label for="event-name" class="form-label">Event Name</label>
			    <input type="text" class="form-control" name="nama_event" id="event-name" required>
			  </div>
			  <div class="col mb-3">
			    <label for="venue" class="form-label">Venue/Location</label>
			    <input type="text" class="form-control" name="lokasi_event" id="venue" required>
			  </div>
			  <div class="row">
				  <div class="col">
				    <div class="mb-3">
					    <label for="date" class="form-label">Start Date</label>
					    <input type="date" class="form-control" name="tgl_event" id="date" required>
					  </div>
				  </div>
				  <div class="col">
				    <div class="mb-3">
					    <label for="date" class="form-label">End Date</label>
					    <input type="date" class="form-control" name="tglakhir_event" id="date" required>
					  </div>
				  </div>
				</div>
				<div class="col mb-3">
				  <label for="desc" class="form-label">Description</label>
				  <textarea class="form-control" name="deskripsi_event" id="desc" rows="3" required></textarea>
				</div>
				<div class="col mb-3">
			    <label class="form-label" for="autoSizingSelect">Category</label>
			    <select class="form-select" name="kategori_event" id="autoSizingSelect">
			      <option value="1">Concert</option>
			      <option value="2">Seminar</option>
			      <option value="3">Baazar</option>
			      <option value="4">Other</option>
			    </select>
			  </div>
				<div class="col mb-3">
			    <label for="cp" class="form-label">
			    	<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
					  <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
					</svg> Contact Information</label>
			    <input type="text" class="form-control" name="cp" id="cp" required>
			  </div>
			  <div class="col mb-3">
			    <label for="regist" class="form-label">
			    	<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-link-45deg" viewBox="0 0 16 16">
					  <path d="M4.715 6.542 3.343 7.914a3 3 0 1 0 4.243 4.243l1.828-1.829A3 3 0 0 0 8.586 5.5L8 6.086a1.002 1.002 0 0 0-.154.199 2 2 0 0 1 .861 3.337L6.88 11.45a2 2 0 1 1-2.83-2.83l.793-.792a4.018 4.018 0 0 1-.128-1.287z"/>
					  <path d="M6.586 4.672A3 3 0 0 0 7.414 9.5l.775-.776a2 2 0 0 1-.896-3.346L9.12 3.55a2 2 0 1 1 2.83 2.83l-.793.792c.112.42.155.855.128 1.287l1.372-1.372a3 3 0 1 0-4.243-4.243L6.586 4.672z"/>
					</svg> Registration Link</label>
			    <input type="text" class="form-control" name="regist_link" id="regist" required>
			  </div>
			  <div class="col mb-3">
			    <!-- Button trigger modal -->
					<button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-text" viewBox="0 0 16 16">
					  <path d="M5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5z"/>
					  <path d="M9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.5L9.5 0zm0 1v2A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z"/>
					</svg> Ketentuan SOP Event
					</button>

					<!-- Modal -->
					<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
					  <div class="modal-dialog modal-dialog-scrollable">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h1 class="modal-title fs-5" id="staticBackdropLabel">Ketentuan SOP Event Semar Event Hub</h1>
					        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					      </div>
					      <div class="modal-body">
					        <p>1. Publikasi Seputar Event Universitas Sebelas Maret Surakarta</p>
					        <p>2. Unggahan seputar event Universitas Sebelas Maret akan disebarkan melalui Semar Event Hub sesuai dengan ketentuan di bawah ini:</p>
					        <p>		a. Telah menyiapkan ketentuan-ketentuan yang tertera sehingga langsung dapat dipublikasikan.</p>
					        <p>				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
													  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
													</svg> Poster/pamflet</p>
					        <p>				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
													  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
													</svg> Caption</p>
									<p>		b. Ketentuan request publish event di Semar Event Hub sebagai berikut:</p>
									<p>				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
													  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
													</svg> Gambar berasio 1:1</p>
									<p>				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
													  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
													</svg> Tidak mengandung provokasi dan unsur SARA</p>
									<p>				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
													  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
													</svg> Ketentuan disiapkan dan dikirimkan maksimal H-2 upload</p>
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn" data-bs-dismiss="modal">Setuju</button>
					      </div>
					    </div>
					  </div>
					</div>
			  </div>
			  <div class="mb-3 form-check">
			    <input type="checkbox" class="form-check-input" id="cekbox" required>
			    <label class="form-check-label" for="cekbox">Saya setuju dan sudah membaca ketentuan.</label>
			  </div>
			  <button type="submit" class="btn" name="submit" style="font-weight: bold; font-size: 18px;">
			  	Submit</button>
		  </div>
		  <div class="col" align="center">
		    <script>
					function preview() {
		   		thumb.src=URL.createObjectURL(event.target.files[0]);
		 			}
				</script>
			  <div class="col mb-3">
				  <img id="thumb"><br>
				</div>
				<div class="col mb-3" id="file">
					<label for="image" class="btn">Select Image</label>
				  <input type="file" title="<?= $rqs["image"]; ?>" class="form-control" name="image" id="image" onchange="preview()" style="visibility:hidden;" required>
				</div>
		  </div>
		</form>
	</div>

	<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/65ec807597.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>