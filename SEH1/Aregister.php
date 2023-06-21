<?php


    // session_start();
    // if (isset($_SESSION['login'])) {
    //     header("Location: user-homepage.php");
    //     die();
    // }



    include 'config.php';
    $msg = "";

    if (isset($_POST['submit'])) {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, md5($_POST['password']));
        $confirm_password = mysqli_real_escape_string($conn, md5($_POST['confirm_password']));
        // $code = mysqli_real_escape_string($conn, md5(rand()));

        if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM admin_seh WHERE email='{$email}'")) > 0) {
            $msg = "<div class='alert alert-danger'>{$email} - This email address has been already exists.</div>";
        } else {
            if ($password === $confirm_password) {
                $sql = "INSERT INTO admin_seh ( nama , email, password, status) VALUES ('{$name}', '{$email}', '{$password}', 0)";
                $result = mysqli_query($conn, $sql);
                $msg = "<div class='alert alert-success'>Register Success</div>";
            }
            else {
                $msg = "<div class='alert alert-danger'>Password and Confirm Password do not match</div>";
            }
    }
}

?>

<!DOCTYPE html>
<html lang="english">
  <head>
    <title>Register Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="utf-8" />
    <meta property="twitter:card" content="summary_large_image" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


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
            background-attachment: fixed;
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
  </head>
  <body>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>

    <div>
      <link href="./login.css" rel="stylesheet" />
            <section class="vh-80 gradient-custom">
              <div class="container py-5 h-80">
                <div class="row d-flex justify-content-center align-items-center h-">
                  <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-light text-dark hv-60%" style="border-radius: 1rem;">
                      <div class="card-body p-5 text-center">

                        <div class="mb-md-5 mt-md-4 pb-5">
                          <img src="https://drive.google.com/uc?export=view&id=1kThTpjbcnvln9GPvqI8900iKqDrNEOQE" class="rounded mx-auto d-block"><br><br>
                          <h2 class="fw-bold mb-2 text-uppercase">Register</h2><br><Br>
                          <br>
                          <form method="post">
                          <?php echo $msg; ?>
                          <div class="form-outline form-white mb-4">
                            <input type="text" id="typeemailX" class="form-control form-control-lg" name="name" placeholder="Name" value="<?php if (isset($_POST['submit'])) { echo $name; }?>" required>
                          </div>
                          
                          <div class="form-outline form-white mb-4">
                            <input type="email" id="typeEmailX" class="form-control form-control-lg" pattern="[\w.%+\-]+@staff\.uns\.ac\.id" title="gunakan email staff" name="email" placeholder="Email" value="<?php if (isset($_POST['submit'])) { echo $email; }?>" required>
                          </div>

                          <div class="form-outline form-white mb-4">
                            <input type="password" id="typePasswordX" class="form-control form-control-lg" name="password" placeholder="Password" required>
                          </div>

                          <div class="form-outline form-white mb-4">
                            <input type="password" id="typePasswordX" class="form-control form-control-lg" name="confirm_password" placeholder="Re-type Password" required>
                          </div><br>

                          <button class="btn btn-success" type="submit" name="submit">Register</button><br>
                          </form>
                            <div>
                              <p>If you hany any account! <a href="admin_login.php">Login</a></p>
                            </div>

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
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
