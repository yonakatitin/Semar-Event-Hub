<?php 
require 'functions.php';

session_start();
  if(!isset($_SESSION['id_admin'])){
  header("Location: admin_login.php");
  
  exit;
}

if (isset($_POST['submit'])) {
  if (addEvent($_POST) > 0) {
    echo "
      <script>
        alert('event berhasil ditambahkan');
        document.location.href = 'eventdetails.php'
      </script>
    ";
  } else {
    echo "<script>
        alert('event gagal ditambahkan');
        document.location.href = 'eventdetails.php'
      </script>
    ";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Event</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<main class="d-flex flex-nowrap">

  <div class="d-flex flex-column vh-100 p-3 text-bg-dark sticky-top" style="width: 280px;">
    <a href="admindashboard.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
      <img src="img/Logogbr.png">
      <span class="fs-4">SEMAR Event Hub</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="eventdetails.php" class="nav-link text-white">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar" viewBox="0 0 16 16">
            <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
          </svg>
          Event Details
        </a>
      </li>
      <li>
        <a href="eventrequest.php" class="nav-link text-white text-wrap">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
          </svg>
          Event Approval Request
        </a>
      </li>
      <li>
        <a href="admin_userdetails.php" class="nav-link text-white">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
            <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z"/>
          </svg>
          User Details
        </a>
      </li>
      <li>
        <a href="admin-change-password.php" class="nav-link text-white">
          <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffffff}</style><path d="M336 352c97.2 0 176-78.8 176-176S433.2 0 336 0S160 78.8 160 176c0 18.7 2.9 36.8 8.3 53.7L7 391c-4.5 4.5-7 10.6-7 17v80c0 13.3 10.7 24 24 24h80c13.3 0 24-10.7 24-24V448h40c13.3 0 24-10.7 24-24V384h40c6.4 0 12.5-2.5 17-7l33.3-33.3c16.9 5.4 35 8.3 53.7 8.3zM376 96a40 40 0 1 1 0 80 40 40 0 1 1 0-80z"/></svg>
          Change Password
        </a>
      </li>
      <?php 

      if ($_SESSION['id_admin'] == 9) : ?>
        <li>
          <a href="admin_admindetails.php" class="nav-link text-white">
            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffffff}</style><path d="M256 80C149.9 80 62.4 159.4 49.6 262c9.4-3.8 19.6-6 30.4-6c26.5 0 48 21.5 48 48V432c0 26.5-21.5 48-48 48c-44.2 0-80-35.8-80-80V384 336 288C0 146.6 114.6 32 256 32s256 114.6 256 256v48 48 16c0 44.2-35.8 80-80 80c-26.5 0-48-21.5-48-48V304c0-26.5 21.5-48 48-48c10.8 0 21 2.1 30.4 6C449.6 159.4 362.1 80 256 80z"/></svg>
            Admin Details
          </a>
        </li>
      <?php endif ?>
    </ul>
    <hr>
    <div class="row">
      <div class="col text-start align-self-center">
        <?php 
          
          require'config.php';
   
   
          $query = mysqli_query($conn, "SELECT * FROM `admin_seh` WHERE `id_admin`='$_SESSION[id_admin]'") or die(mysqli_error());
          $fetch = mysqli_fetch_array($query);
   
          // echo "<h2 class='text-success'>".$fetch['nama_admin']."</h2>";
        ?>
          
         
        
        <strong> Admin  <?= $fetch['nama'] ?></strong>
      </div>
      <div class="col float-end">
        <button class="btn btn-primary float-end">
          <a href="admin_logout.php" style="color:#ffffff;">Logout</a></button>
      </div>
    </div>
  </div>

  <div class="page-wrapper w-100 p-3">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
      <!-- ============================================================== -->
      <!-- Bread crumb and right sidebar toggle -->
      <!-- ============================================================== -->
      <div class="row page-titles w-100 p-3">
        <div class="col-md-5 align-self-center">
          <h3 class="text-themecolor">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-calendar" viewBox="0 0 16 16">
              <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
            </svg>  Add Event
          </h3>
        </div>
      </div>

      <div class="row">
        <!-- column -->
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <div class="table-responsive">
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
        <button type="submit" class="btn btn-success" name="submit" style="font-weight: bold; font-size: 18px;">Submit</button>
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
          <label for="image" class="btn btn-secondary">Select Image</label>
          <input type="file" title="<?= $rqs["image"]; ?>" class="form-control" name="image" id="image" onchange="preview()" style="visibility:hidden;" required>
        </div>
      </div>
    </form>
  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<script src="https://kit.fontawesome.com/4c02e9d8bf.js" crossorigin="anonymous"></script>
</body>
</html>