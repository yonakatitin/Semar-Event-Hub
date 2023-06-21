<?php 
session_start();
  if(!isset($_SESSION['id_admin'])){
  header("Location: admin_login.php");
  
  exit;
}

require 'functions.php';

$id = $_GET['id'];

if (hapusUser($id) > 0) {
    echo "
        <script>
            alert('user berhasil dihapus');
            document.location.href = 'admin_userdetails.php'
        </script>
        ";
} else {
    echo "
        <script>
            alert('user gagal dihapus');
            document.location.href = 'admin_userdetails.php'
        </script>
    ";
}


 ?>