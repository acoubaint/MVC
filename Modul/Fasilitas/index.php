<?php
include __DIR__.'/Model/fasilitasModel.php';
include __DIR__.'/Controller/fasilitasController.php';

$fasilitasModel = new fasilitasModel($mysqli);
$fasilitasController = new fasilitasController($fasilitasModel);

$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : null;

$fasilitasController->aksi($aksi);