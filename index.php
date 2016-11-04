<?php
ini_set('memory_limit', '5024M');
session_start();

	include 'conf/database.php';
	$modul = isset($_GET['mod']) ? $_GET['mod'] : null;

	$tongsik = ["kota","kategori","tempat","menu","fasilitas","index"];

		if(empty($_SESSION['namaPengurus']) && in_array($modul, $tongsik)){
			header("location:login");
		}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tongsik</title>
	<script src="js/jquery.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBEhEeu3hILtxyefBn1r5YOV-6c6YYaaog"></script>
	<script src="js/gmaps.js"></script>
	<link rel="stylesheet" href="conf/css/materialize.min.css">
	<link rel="stylesheet" href="conf/css/costum.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<style>
		#map{
			/*width: 400px;*/
			height: 400px;
		}
	</style>
</head>
<body class="grey lighten-4">
	
	<header class="content">
		<div class="navbar-fixed">
			<nav class="top-nav">
				<div class="nav-wrapper amber darken-4">
						<a href="#" data-activates="nav-mobile" class="button-collapse top-nav full">
							<i class="large material-icons">reorder</i>
						</a>
						<a href="/" class="brand-logo admin-panel">Admin Panel</a>
				</div>
				<ul id="nav-mobile" class="side-nav fixed">
					<li class="collection-header grey lighten-4 center-align">
						<div class="tongsik-logo">
							<img src="res/logo.png" alt="logo" class="responsive-img">
						</div>
						<h5 class="logo-tongsik">Wellcome</h5>
					</li>
					<li class="bold <?php 
							if ($modul == "index") {
								echo "active";
							}
					 ?>">
						<a href="?mod=">Dasboard</a>
					</li>
					<li class="bold <?php 
							if ($modul == "tempat") {
								echo "active";
							}
					 ?>">
						<a href="?mod=tempat">
							Tempat
						</a>
					</li>
					<li class="bold <?php 
							if ($modul == "kategori") {
								echo "active";
							}
					 ?>">
						<a href="?mod=kategori">
							Kategori
						</a>
					</li>
					<li class="bold <?php 
							if ($modul == "kota") {
								echo "active";
							}
					 ?>">
						<a href="?mod=kota">Kota</a>
					</li>
					<li class="bold">
						<a href="?mod=logout">logout</a>
					</li>
				</ul>
			</nav>
		</div>
	</header>
	
	<main class="content">
	<div class="row">
		<div class="col s12">
			<nav>
				<div class="nav-wrapper orange">
				<div class="col s12">
					<a href="/" class="breadcrumb">TONGSIK</a>
					<?php if (isset($_GET['mod'])): ?>	
						<a href="?mod=<?=$_GET['mod']?>" class="breadcrumb"><?=strtoupper($_GET['mod'])?></a>
						<?php if (isset($_GET['aksi'])): ?>
							<a href="" class="breadcrumb"><?=strtoupper($_GET['aksi'])?></a>
							<?php if (isset($_GET['nama'])): ?>
								<a href="" class="breadcrumb"><?=strtoupper($_GET['nama'])?></a>
							<?php endif ?>
						<?php endif ?>
					<?php endif ?>
				</div>
				</div>
			</nav>

			<?php

				if ($modul == "kota") {
					include 'Modul/Kota/index.php';
				}elseif ($modul == "kategori") {
					include 'Modul/Kategori/index.php';
				}elseif ($modul == "tempat") {
					include 'Modul/Tempat/index.php';
				}elseif ($modul == "menu") {
					include 'Modul/Menu/index.php';
				}elseif ($modul == "fasilitas") {
					include 'Modul/Fasilitas/index.php';
				}elseif ($modul == "index") {
					include 'Modul/Beranda/index.php';
				}elseif ($modul == "logout") {
					header("location:login/logout.php");
				}elseif ($modul == null) {
					header("location:?mod=index");
				}else{
					header("location:?mod=index");
				}

			?>
		</div>
	</div>
	</main>

<script src="conf/js/materialize.min.js"></script>
<script>
	$(document).ready(function(){
		$('.button-collapse').sideNav();
		$('select').material_select();
		$('.tooltipped').tooltip({delay: 50});
		$('.modal-trigger').leanModal();
		$('.carousel').carousel();
		$('.carousel-slider').slider({full_width:true});
		$('.materialboxed').materialbox();
	})
</script>
</body>
</html>