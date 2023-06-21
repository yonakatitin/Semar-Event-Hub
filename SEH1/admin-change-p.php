<?php 
session_start();

if (isset($_SESSION['id_admin'])) {

require 'functions.php';

if (isset($_POST['op']) && isset($_POST['np'])
    && isset($_POST['c_np'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$op = validate($_POST['op']);
	$np = validate($_POST['np']);
	$c_np = validate($_POST['c_np']);
    
    if(empty($op)){
      header("Location: admin-change-password.php?error=Old Password is required");
	  exit();
    }else if(empty($np)){
      header("Location: admin-change-password.php?error=New Password is required");
	  exit();
    }else if($np !== $c_np){
      header("Location: admin-change-password.php?error=The confirmation password  does not match");
	  exit();
    }else {
    	// hashing the password
    	$op = md5($op);
    	$np = md5($np);
        $id = $_SESSION['id_admin'];

        $sql = "SELECT password
                FROM admin_seh WHERE 
                id_admin='$id' AND password='$op'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) === 1){
        	
        	$sql_2 = "UPDATE admin_seh
        	          SET password='$np'
        	          WHERE id_admin='$id'";
        	mysqli_query($conn, $sql_2);
        	header("Location: admin-change-password.php?success=Your password has been changed successfully");
	        exit();

        }else {
        	header("Location: admin-change-password.php?error=Incorrect old password");
	        exit();
        }

    }

    
}else{
	header("Location: admin-change-password.php");
	exit();
}

}else{
     header("Location: admindashboard.php");
     exit();
}