<?php 
session_start();
  if(!isset($_SESSION['id_admin'])){
  header("Location: admin_login.php");
  
  exit;
}

require 'functions.php';

$id = $_GET['id'];

if (hapus($id) > 0) {
	echo "
		<script>
			alert('event berhasil dihapus');
			document.location.href = 'eventdetails.php'
		</script>
		";
} else {
	echo "
		<script>
			alert('event gagal dihapus');
			document.location.href = 'eventdetails.php'
		</script>
	";
}


 ?>