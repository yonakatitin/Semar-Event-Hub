<?php 

session_start();
if(!isset($_SESSION['id_admin'])){
header("Location: admin_login.php");

exit;
}

//hubungkan hal index dgn function
require 'functions.php';

$id = $_GET["id"];
$rqs = query("SELECT *, b.kategori FROM event AS a JOIN kategori_event AS b ON a.kategori_event=b.id WHERE a.id = $id")[0];

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Event Detail</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Custom Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@100;200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="detaileventstyle.css" rel="stylesheet" />
    <style>
       body {
        background-attachment: fixed;
        height: 100%;
        background-repeat: no-repeat;
        background-image: linear-gradient(221deg, rgba(255, 255, 255, 1) 0%, rgba(77, 106, 255, 0.7900000214576721) 100%);
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
    </style>
</head>
<body class="d-flex flex-column h-100">
<main class="flex-shrink-0">
    <!-- Navigation-->
    
    <!-- Projects Section-->
    <section class="container-fluid p-5">
        <div class="container-fluid px-5 mb-5">
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-5">
                    <div class="card overflow-hidden shadow rounded-4 border-0 mb-5">
                        <img src="img\<?= $rqs["image"]; ?>"class="card-img">
                        <!-- Main Card with Image Overlay-->
                        <div class="card-img-overlay">
                            <div class="card-body p-0">
                                <div class="row">
                                    <div class="col">
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm">
                <div class="card">
                    <div class="row card-body p-4 d-flex">
                        <h2 class="row card-title text-left fw-bold p-3" ><?= $rqs["nama_event"]; ?></h2>
                        <div>
                            <button type="button" class="col btn btn-warning fw-bold"><?= $rqs["kategori"]; ?></button>
                        </div>
                        <div class="row"><br></div>
                        <div class="row">
                            <p class="fw-bold"><i class="bi bi-geo-alt-fill"></i>  <?= $rqs["lokasi_event"]; ?></p>
                        </div>
                        <div class="row">
                            <p class="col fw-bold"><i class="bi bi-calendar-fill"></i>  <?= $rqs["tgl_event"]; ?></p>
                        </div>
                        <div class="row">
                            <p class="col fw"><?= $rqs["deskripsi_event"]; ?></p>
                        </div>
                        <div>
                            <a href="<?= $rqs["regist_link"]; ?>"><button type="button" class="col float-end btn btn-success fw-bold">Register</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>
<script src="https://kit.fontawesome.com/4c02e9d8bf.js" crossorigin="anonymous"></script>
</body>
</html>
