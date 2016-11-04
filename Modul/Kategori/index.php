<?php
include 'Model/kategoriModel.php';
include 'Controller/kategoriController.php';

$kategoriModel = new kategoriModel($mysqli);
$kategoriController = new kategoriController($kategoriModel);

$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : null;

$kategoriController->aksi($aksi);
$mysqli->close();