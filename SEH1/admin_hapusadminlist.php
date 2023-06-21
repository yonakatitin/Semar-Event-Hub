<?php 
session_start();
  if(!isset($_SESSION['id_admin'])){
  header("Location: admin_login.php");
  
  exit;
}

require 'functions.php';

$id = $_GET['id'];

if (hapusAdmin($id) > 0) {
    echo "
        <script>
            alert('admin berhasil dihapus');
            document.location.href = 'admin_admindetails.php'
        </script>
        ";
} else {
    echo "
        <script>
            alert('admin gagal dihapus');
            document.location.href = 'admin_admindetails.php'
        </script>
    ";
}


 ?>