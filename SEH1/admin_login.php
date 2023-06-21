<?php
    session_start();
    if (isset($_SESSION['id_admin'])) {
        header("Location:  admindashboard.php");
        die();
    }

    include 'config.php';
    $msg = "";

    
    if (isset($_POST['submit'])) {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, md5($_POST['password']));

        $sql = "SELECT * FROM admin_seh WHERE email ='{$email}' AND password ='{$password}'";
        $result = mysqli_query($conn, $sql);
        //$rowcount=mysqli_num_rows($result);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['id_admin'] = $row['id_admin'];
            $_SESSION['status'] = $row['status'];
            
            header("Location: admindashboard.php");
            
        } else {
            $msg = "<div class='alert alert-danger'>Email or password do not match.</div>";
        }
    }
?>



<!DOCTYPE html>
<html lang="english">
  <head>
        <title>Admin Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta charset="utf-8" />
        <meta property="twitter:card" content="summary_large_image" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

        <style data-tag="reset-style-sheet">
          html {  line-height: 1.15;}body {  margin: 0;}* {  box-sizing: border-box;  border-width: 0;  border-style: solid;}p,li,ul,pre,div,h1,h2,h3,h4,h5,h6,figure,blockquote,figcaption {  margin: 0;  padding: 0;}button {  background-color: transparent;}button,input,optgroup,select,textarea {  font-family: inherit;  font-size: 100%;  line-height: 1.15;  margin: 0;}button,select {  text-transform: none;}button,[type="button"],[type="reset"],[type="submit"] {  -webkit-appearance: button;}button::-moz-focus-inner,[type="button"]::-moz-focus-inner,[type="reset"]::-moz-focus-inner,[type="submit"]::-moz-focus-inner {  border-style: none;  padding: 0;}button:-moz-focus,[type="button"]:-moz-focus,[type="reset"]:-moz-focus,[type="submit"]:-moz-focus {  outline: 1px dotted ButtonText;}a {  color: inherit;  text-decoration: inherit;}input {  padding: 2px 4px;}img {  display: block;}html { scroll-behavior: smooth  }
        </style>
        <style data-tag="default-style-sheet">
          html {
            font-family: Inter;
            font-size: 16px;
          }

          body {
            height: 100%;
            margin: 0;
            background-repeat: no-repeat;
            background: radial-gradient(circle at center, rgba(0, 0, 0, 0.2) 0.00%,rgba(63, 106, 149, 0.8) 100.00%);
            background-attachment: fixed;
          }

          .alert {    
            padding: 1rem;
            border-radius: 5px;
            color: white;
            margin: 1rem 0;
          }

          .alert-success {
            background-color: #42ba96;
          }

          .alert-danger {
            background-color: #fc5555;
          }

          .w3l-mockup-form .alert-close {
              cursor: pointer;
              height: 35px;
              width: 35px;
              line-height: 35px;
              position: absolute;
              right: -5px;
              top: -5px;
              background: #62c16e;
              border-radius: 50px;
              color: #fff;
              text-align: center;
}



        </style>
        <link
          rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
          data-tag="font"
        />
        <link
          rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&amp;display=swap"
          data-tag="font"
        />
        <link
          rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
          data-tag="font"
        />
        <link
          rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Shrikhand:wght@400&amp;display=swap"
          data-tag="font"
        />
        <link rel="stylesheet" href="./style.css" />
        <!-- <link href="./login.css" rel="stylesheet" /> -->
  </head>

  <body>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
  <div>
      

  <div class="page-wrapper w-100% h-100%">
    <div class="container-fluid">
       <section class="vh-80%  gradient-custom">
         <div class="container py-5 h-100">
           <div class="row d-flex justify-content-center align-items-center h-100">
             <div class="col-12 col-md-8 col-lg-6 col-xl-5">
             <form class="form-login" method="post">
               <div class="card bg-light text-black" style="border-radius: 1rem;">
                 <div class="card-body p-5 text-center">

                   <div class="mb-md-5 mt-md-4 pb-5">
                     <img src="img/logo.png" class="rounded mx-auto d-block"><br><br>
                     <h4 class="fw-bold mb-2 text-uppercase">Let's Login To Your Account!<h4><br><br>

                     <!-- <form method="post">
                    
                     <div class="form-outline form-white mb-4" >
                       <input type="email" id="typeEmailX" class="form-control form-control-lg " placeholder="Email" name="email" />
                     </div>

                     <div class="form-outline form-white mb-4" method="post">
                       <input type="password" id="typePasswordX" class="form-control form-control-lg" placeholder="Password" name="password" />
                     </div>

                     
                     <button type="button" class="btn btn-success" name="submit" method="post" >Login</button>
                    
                     <div class="d-flex justify-content-center text-center mt-4 pt-1">
                     </div>
                     </form> -->

                      <?php echo $msg; ?>
                      <br>
                        <div class="form-outline form-white mb-4">
                          
                          <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" name="email" placeholder="Enter email" aria-describedby="emailHelp">
                          
                        </div>
                        <br>
                        <div class="form-outline form-white mb-4">
                          
                          <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Enter password" name="password">
                        </div>
                      <br>
                        <button type="submit" name="submit" class="btn btn-success">Login</button>
                        <br>
                        <br>
                        <br>
                        <div style="size: 12px;">
                          <h6>Create your account  <a href="Aregister.php">register</a></h6>
                        </div>
          </form>
               </div>
             </div>
           </div>
         </div>
       </section>
    </div>
  </div>



    <script src="jquery-ui/jquery.min.js"></script>
    <script>
        $(document).ready(function (c) {
            $('.alert-close').on('click', function (c) {
                $('.main-mockup').fadeOut('slow', function (c) {
                    $('.main-mockup').remove();
                });
            });
        });
    </script>

  </body>
</html>
