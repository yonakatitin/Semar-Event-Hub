<?php 

$conn = mysqli_connect("localhost","root", "", "seh");
if (!$conn) {
    die("Gagal terhubung dengan database: " . mysqli_connect_error());
}

function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
}

function tambah($data) {
	global $conn;


	$nama_event = htmlspecialchars($data["nama_event"]);
	$tgl_event = htmlspecialchars($data["tgl_event"]);
	$lokasi_event = htmlspecialchars($data["lokasi_event"]);
	$deskripsi_event = htmlspecialchars($data["deskripsi_event"]);
	$kategori_event = htmlspecialchars($data["kategori_event"]);
	$cp = htmlspecialchars($data["cp"]);
	$regist_link = htmlspecialchars($data["regist_link"]);
	$tglakhir_event = htmlspecialchars($data["tglakhir_event"]);
	
	
	//upload gambar
	$image = upload();
	if (!$image) {
		return false;
	}

	$query = "INSERT INTO request
				VALUES
				('', '$nama_event', '$tgl_event', '$tglakhir_event', '$lokasi_event', '$deskripsi_event', '$kategori_event', '$cp', '$regist_link', '$image', 'requested', '$_SESSION[id_user]')";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function addEvent($data) {
	global $conn;

	$nama_event = htmlspecialchars($data["nama_event"]);
	$tgl_event = htmlspecialchars($data["tgl_event"]);
	$lokasi_event = htmlspecialchars($data["lokasi_event"]);
	$deskripsi_event = htmlspecialchars($data["deskripsi_event"]);
	$kategori_event = htmlspecialchars($data["kategori_event"]);
	$cp = htmlspecialchars($data["cp"]);
	$regist_link = htmlspecialchars($data["regist_link"]);
	$tglakhir_event = htmlspecialchars($data["tglakhir_event"]);
	
	//upload gambar
	$image = upload();
	if (!$image) {
		return false;
	}

	$query = "INSERT INTO event
				VALUES
				('', '$nama_event', '$tgl_event', '$tglakhir_event', '$lokasi_event', '$deskripsi_event', '$kategori_event', '$cp', '$regist_link', '$image')";
	mysqli_query($conn, $query);


	return mysqli_affected_rows($conn);
}

function upload() {
	$namaFile = $_FILES['image']['name'];
	$size = $_FILES['image']['size'];
	$error = $_FILES['image']['error'];
	$tmpName = $_FILES['image']['tmp_name'];

	//cek apakah tdk ada foto yg diup
	if ($error === 4) {
		echo "<script>
			alert('pilih gambar terlebih dahulu');
			</script>";
		return false;
	}

	//cek yg diup hrs foto
	$ekstensiValid = ['jpg', 'jpeg', 'png'];
	$ekstensiFoto = explode('.', $namaFile);
	$ekstensiFoto = strtolower(end($ekstensiFoto));
	if (!in_array($ekstensiFoto, $ekstensiValid)) {
		echo "<script>
			alert('yang anda upload bukan gambar');
			</script>";
	return false;
	}

	//cek ukuran terlaluu besar
	if ($size > 1000000) {
		echo "<script>
			alert('ukuran gambar terlalu besar');
			</script>";
	return false;
	}

	//lolos cek, up foto
	//generate nama baru
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiFoto;
	move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
	return $namaFileBaru;
}

function hapus($id) {
	global $conn;

	mysqli_query($conn, "DELETE FROM event WHERE id = $id");

	return mysqli_affected_rows($conn);
}

function hapusUser($id) {
	global $conn;

	mysqli_query($conn, "DELETE FROM user WHERE id_user = $id");

	return mysqli_affected_rows($conn);
}

function hapusAdmin($id) {
	global $conn;

	mysqli_query($conn, "DELETE FROM admin_seh WHERE id_admin = $id");

	return mysqli_affected_rows($conn);
}

function accept($id) {
	global $conn;

	mysqli_query($conn, "INSERT INTO event (nama_event, tgl_event, tglakhir_event, lokasi_event, deskripsi_event, kategori_event, cp,regist_link, image) 
		SELECT nama_event, tgl_event, tglakhir_event, lokasi_event, deskripsi_event, kategori_event, cp,regist_link, image FROM request WHERE id = $id");
	mysqli_query($conn, "UPDATE request SET status = 'accepted' WHERE id = $id");
	

	return mysqli_affected_rows($conn);
}

function reject($id) {
	global $conn;

	mysqli_query($conn, "INSERT INTO event (nama_event, tgl_event, tglakhir_event, lokasi_event, deskripsi_event, kategori_event, cp,regist_link, image) 
		SELECT nama_event, tgl_event, tglakhir_event, lokasi_event, deskripsi_event, kategori_event, cp,regist_link, image FROM request WHERE id = $id");
	mysqli_query($conn, "UPDATE request SET status = 'rejected' WHERE id = $id");
	

	return mysqli_affected_rows($conn);
}

function ubah($data) {
	global $conn;

	$id = $data["id"];
	$nama_event = htmlspecialchars($data["nama_event"]);
	$tgl_event = htmlspecialchars($data["tgl_event"]);
	$lokasi_event = htmlspecialchars($data["lokasi_event"]);
	$deskripsi_event = htmlspecialchars($data["deskripsi_event"]);
	$kategori_event = htmlspecialchars($data["kategori_event"]);
	$cp = htmlspecialchars($data["cp"]);
	$regist_link = htmlspecialchars($data["regist_link"]);
	$tglakhir_event = htmlspecialchars($data["tglakhir_event"]);
	$oldImage = htmlspecialchars($data["oldImage"]);

	//cek apakah user pilih image baru
	if ($_FILES['image']['error'] === 4) {
		$image = $oldImage;
	} else {
		$image = upload();
	}	

	$query = "UPDATE request SET
				nama_event = '$nama_event', 
				tgl_event = '$tgl_event', 
				tglakhir_event = '$tglakhir_event',
				lokasi_event = '$lokasi_event', 
				deskripsi_event = '$deskripsi_event',
				kategori_event = '$kategori_event',
				cp = '$cp',
				regist_link = '$regist_link',
				image = '$image'
			WHERE id = $id
			";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function cari($keyword) {
	$query = "SELECT * FROM event
				WHERE
			nama_event LIKE '%$keyword%' OR
			tgl_event LIKE '%$keyword%' OR 
			lokasi_event LIKE '%$keyword%'   
			";
	return query($query);
}

function cariUser($keyword) {
	$query = "SELECT * FROM user
				WHERE
			nama LIKE '%$keyword%' OR
			email LIKE '%$keyword%'   
			";
	return query($query);
}

function cariAdmin($keyword) {
	$query = "SELECT * FROM admin_seh
				WHERE
			nama LIKE '%$keyword%' OR
			email LIKE '%$keyword%'   
			";
	return query($query);
}


 ?>
 