<?php

include('conexion.php');

$fecha = date('Y-m-d H:i:s');
$receta = $_POST['receta'];
$comentario = $_POST['comentario'];

$coment = $conn->query("INSERT comentario (receta, comentario, fecha) VALUES ('$receta', '$comentario', '$fecha')");

header("location: recetass.php?id=".$receta);

?>