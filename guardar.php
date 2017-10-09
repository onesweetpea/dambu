<?php

include('conexion.php');
$categoria = $_POST['categoria'];
$titulo = $_POST['titulo'];
$contenido = $_POST['contenido'];
$imagen = $_POST['archivo'];
$fecha = date('Y-m-d H:i:s');

$li = $conn->query("SELECT * FROM categoria WHERE id = '$categoria'");
foreach ($li as $r){
    $opcion = $r['opcion'];
}

$res = $conn->query("INSERT receta (titulo, contenido, imagen, fecha, opcion, categoria) VALUES ('$titulo', '$contenido', '$imagen', '$fecha', '$opcion', '$categoria')");

//var_dump($res);

header("location: formulario.php");

?>