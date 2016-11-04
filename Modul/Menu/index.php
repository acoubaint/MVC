<?php
include __DIR__.'/Model/menuModel.php';
include __DIR__.'/../Tempat/Model/tempatModel.php';
include __DIR__.'/Controller/menuController.php';

$menuModel = new menuModel($mysqli);
$tempatModel = new tempatModel($mysqli);
$menuController = new menuController($menuModel,$tempatModel);

$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : null;

$menuController->aksi($aksi);