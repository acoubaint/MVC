<?php
session_start();
if (isset($_SESSION['namaPengurus'])) {
	unset($_SESSION['namaPengurus']);
}
require_once '../conf/database.php';

if (isset($_POST)) {
	$namaPengurus = trim($_POST['username']);
	$passPengurus = trim($_POST['password']);

	// $password = md5($passPengurus);

		$stmt = $mysqli->prepare("select * from pengurus where nama=?");
		$stmt->bind_param('s',$namaPengurus);
		$stmt->execute();
		$stmt->bind_result($id,$nama,$kunci);
		$stmt->fetch();

		if ($kunci == $passPengurus) {
			echo "Berhasil";
			$_SESSION['namaPengurus'] = $nama;
		}else{
			echo "username atau password tidak benar";
		}
}

?>