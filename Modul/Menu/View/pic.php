<?php 
	ini_set('memory_limit', '5024M');
	include __DIR__.'/../../../conf/database.php';

	$id= $_GET['id'];  // id yang gambarnya mo ditampilkakn

	$query = "select gambar,tipe_gambar from menu where id=?";
	$stmt = $mysqli->prepare($query);
	$stmt->bind_param('i',$id);
	$stmt->execute();
	$stmt->bind_result($content,$type);
	$stmt->fetch();
		header("Content-type: $type");   // parsing ke mime tipe
		echo $content;  
	?>