<?php 
//conexion
include('conexion.php');
include('db.css');

//traer los datos de la base de datos
$res = $conn->query("SELECT * FROM receta ORDER BY fecha DESC");

foreach ($res as $r){


?>
 <div class="gallery_product col-md-4">
                  <a href="receta.html">
                    <img src="images/da.jpg" class="img-responsive">
                
                        <h4 class="h4-gallery"><?php echo $r['titulo']; ?>
                            <span class="glyphicon glyphicon-chevron-right"></span>
                        </h4>
                    
                  </a>
              </div>


<?php
    //cierre del foreach
    }
?>