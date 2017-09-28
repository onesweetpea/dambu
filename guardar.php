<?php

include('conexion.php');
$categoria = $_POST['categoria'];
$titulo = $_POST['titulo'];
$receta = $_POST['receta'];
//$imagen = $_FILE['archivo'];
$fecha = date('Y-m-d H:i:s');

//var_dump($titulo);
//var_dump(receta);

$res = $conn->query("INSERT receta (titulo, receta, imagen, fecha, categoria) VALUES ('$titulo', '$receta', '$imagen', '$fecha', '$categoria')");

//var_dump($res);

header("location: formulario.html");

?>