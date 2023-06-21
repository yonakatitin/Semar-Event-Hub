<?php 
require 'functions.php';

session_start();
  if(!isset($_SESSION['id_admin'])){
  header("Location: admin_login.php");
  
  exit;
}

$id = $_GET['id'];

if (accept($id) > 0) {
  echo "
    <script>
      alert('request accepted');
      document.location.href = 'eventrequest.php'
    </script>
    ";
} else {
  echo "
    <script>
      alert('failed accept request');
      document.location.href = 'eventrequest.php'
    </script>
  ";
} ?>