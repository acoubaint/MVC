<?php
include __DIR__.'/Model/tempatModel.php';
include __DIR__.'/../Kategori/Model/kategoriModel.php';
include __DIR__.'/../Kota/Model/kotaModel.php';
include __DIR__.'/../Menu/Model/menuModel.php';
include __DIR__.'/../Fasilitas/Model/fasilitasModel.php';
include __DIR__.'/Controller/tempatController.php';

$tempatModel = new tempatModel($mysqli);
$kategoriModel = new kategoriModel($mysqli);
$kotaModel = new kotaModel($mysqli);
$menuModel = new menuModel($mysqli);
$fasilitasModel = new fasilitasModel($mysqli);
$tempatController = new tempatController([
	"tempat"=>$tempatModel,
	"kategori"=>$kategoriModel,
	"kota"=>$kotaModel,
	"menu"=>$menuModel,
	"fasilitas"=>$fasilitasModel
	]);

$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : null;

$tempatController->aksi($aksi);