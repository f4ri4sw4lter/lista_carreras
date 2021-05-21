<?php
include '../classes/gestorCarreras.php';

$gestor = new GestorCarreras();
$gestor->agregarCarrera();

header('Location: ../index.php');