<?php 

include('conexion.php');

$id = $_GET['id'];

$res = $conn->query("SELECT * FROM receta WHERE id = $id");

foreach ($res as $r){
    
    ?>

<div style="border:1px solid #a9a9a9; padding:10px; margin: 5px 5px 10px 5px;">
    <h3><?php echo $r['titulo'];?></h3>
    <p><?php echo $r['receta'];?></p>
</div>

<?php 
    
}

?>
