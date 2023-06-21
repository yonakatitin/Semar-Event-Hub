<?php
   include 'config.php';
  
  
  session_start();
  if(!isset($_SESSION['id_admin'])){
  header("Location: admin_login.php");
  
  exit;
}

require 'functions.php';
$users = query("SELECT * FROM user");

//tombol cari ditekan
if (isset($_POST["cari"])) {
    $users = cariUser($_POST['keyword']);
}

?> 



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<style>

tr:hover {background-color: #26AFB5;}

.tbody{
    text-align:center;
    text-decoration: none;
}


</style>

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
            <div class="row page-titles  ">
                <div class="col-3">
                    <h3 class="text-themecolor">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
                        <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z"/>
                        </svg>User Details
                    </h3>
                </div>
                
            </div>
            <div class="col-4" style="float:right;">

            <form class="d-flex" role="search" action="" method="post">
                <input class="form-control me-2" type="search" name="keyword" size="40" placeholder="Search" aria-label="Search" autocomplete="off">
                <button class="btn btn-outline-success" type="submit" name="cari">Search</button>
            </form>
            </div>
            <br>
<br>
            <br>
            <div class="row">
                <!-- column -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>User</th>
                                        <th>Email</th>
                                        <th></th>
                                    </tr>
                                    </thead>

                                        <tbody >
                                            <?php $i = 1; ?>
                                            <?php foreach ($users as $row) : ?>
                                            <tr class="clickable"
                                                onclick="window.location='#'">
                                                <td><?= $i; ?></td>
                                                <td><?= $row["nama"]; ?></td>
                                                <td><?= $row["email"]; ?></td>
                                                <td>
                                                    <a href="admin_hapususerlist.php?id=<?= $row['id_user']; ?>"><button type='button' style='font-size: 12px;' class='btn btn-outline-primary btn-sm'>Delete</button></a>
                                                </td>
                                            </tr>
                                            <?php $i++; ?>
                                            <?php endforeach ?>

                                            
                                    
                                        </tbody>
                                        
                                </table>
                                <nav class="list">
                                    <a href="admin_userdetails.php" style="text-align:center;"> See All List</a>
                                 </nav>
                                <!-- <p>Total: <?php echo mysqli_num_rows($i) ?></p> -->
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