<?php 
require 'functions.php';

session_start();
  if(!isset($_SESSION['id_admin'])){
  header("Location: admin_login.php");
  
  exit;
}

$id = $_GET['id'];

if (reject($id) > 0) {
  echo "
    <script>
      alert('request rejected');
      document.location.href = 'eventrequest.php'
    </script>
    ";
} else {
  echo "
    <script>
      alert('failed reject request');
      document.location.href = 'eventrequest.php'
    </script>
  ";
} ?>