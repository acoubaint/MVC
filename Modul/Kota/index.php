<?php
include 'Model/kotaModel.php';
include 'Controller/kotaController.php';

$kotaModel = new kotaModel($mysqli);
$kotaController = new kotaController($kotaModel);

$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : null;

$kotaController->aksi($aksi);