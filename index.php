<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DB</title>
      <link href="db.css" rel="stylesheet" type="text/css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link href="https://fonts.googleapis.com/css?family=Encode+Sans+Expanded|Imprima" rel="stylesheet"> 
      <link href="images/logo.png" rel="shortcut icon" type="image/png">
      <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet" media="screen"> 
  </head>
  <body>
      <div id="header" class="container"> 
                  <nav class="navbar menu arriba" role="navigation">
                      <a href="index.php"><img src="images/logo.png" class="logo img-responsive pull-left"></a>
                      <div class="navbar-header">
                          <button type="button" class="navbar-toggle arriba fijo2" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                              <span class="sr-only">Desplegar navegación</span>
                              <span class="icon-bar" style="background-color: white;"></span>
                              <span class="icon-bar" style="background-color: white;"></span>
                              <span class="icon-bar" style="background-color: white;"></span>
                          </button>
                          </div>
                          <div class="collapse navbar-collapse navbar-ex1-collapse">
                           <ul class="nav navbar-nav pull-right">
                                  <li><a href="index.php">Inicio</a></li>
                                  <?php 
                                  include('conexion.php');
                                  $lis = $conn->query("SELECT * FROM opcion ");
                                  foreach ($lis as $r){
                                  ?>
                                  <li id="prueba" value="<?php echo $r['id'] ?>"><a href="recetas.php?id=<?php echo $r['id'] ?>" name="op" ><?php echo $r['nombre'];?></a></li>
                                   <li class="dropdown">
                                      <button class="dropdown-toggle" data-toggle="dropdown">
                                          <span class="caret"></span>
                                          </button>
                                      <ul class="dropdown-menu limpiar" role="menu">
                                         <?php 
                                      include('conexion.php');
                                      $a = $r['id'];
                                      $prueba = $conn->query("SELECT * FROM categoria WHERE opcion =  $a");
                                      foreach ($prueba as $p){
                                          ?>
                                          <li><a href="recetario.php?id=<?php echo $p['id'] ?>"><?php echo $p['nombre']; ?></a></li>
                                          <?php }?>
                                      </ul>
                                  </li>
                                  <?php }?>
                              </ul>
                              <form>
                                  <div class="form-group pull-right search" role="search">
                                      <input role="search" type="text" class="form-control " placeholder="Buscar" style="width: 450px;">
                                  </div>
                              </form>
                              <form>
                                  <div class="pull-right color search">
                                      <a title="Facebook" href="https://es-la.facebook.com/danny.boteo" target="_blank">
                                          <i class="fa fa-facebook-square icon-brand" style="font-size: 30px"></i>
                                      </a>
                                      <a title="Instagram" href="https://www.instagram.com/dambu_/" target="_blank">
                                          <i class="fa fa-instagram icon-brand" style="font-size: 30px"></i>
                                      </a>
                                      <a title="Pinterest" href="https://es.pinterest.com/Readerforever00/" target="_blank">
                                          <i class="fa fa-pinterest-square icon-brand" style="font-size: 30px"></i>
                                      </a>
                                      <a title="Twitter" href="" target="_blank"> 
                                          <i title="Twitter" class="fa fa-twitter-square icon-brand" style="font-size: 30px"></i>
                                      </a>
                                      <a title="Youtube" href="https://www.youtube.com/channel/UCv9wcOu4DyzNQNSh_QvQK9Q?view_as=subscriber" target="_blank"> 
                                          <i class="fa fa-youtube icon-brand" style="font-size: 30px"></i>
                                      </a>
                                  </div>
                              </form>
                      </div>
           </nav>
                   
              </div>
           
      <div style="background-color: white;">
          <h2 class="container subtitulos img-margin-inicio">Nuevas Recetas</h2>
          <div class="container opacity">
                   <?php 
//conexion
include('conexion.php');

//traer los datos de la base de datos
$res = $conn->query("SELECT * FROM receta WHERE opcion = 1 ORDER BY fecha DESC");
$a = 0;
foreach ($res as $r){
$a = $a + 1;
?>
              <div class="gallery_product col-md-4">
                  <a href="recetass.php?id=<?php echo $r['id'] ?>">
                    <img src="<?php echo $r['imagen'];?>" class="img-responsive">
                
                        <h4 class="h4-gallery"><?php echo $r['titulo']?><br><?php echo $r['fecha']; ?>
                            <span class="glyphicon glyphicon-chevron-right"></span>
                        </h4>
                  </a>
              </div>
                <?php
                if($a >= 6){
                    break;
                }
    //cierre del foreach
                      
}
             
?>
          </div>
          <h2 class="container subtitulos">Noticias Gastronómicas</h2>
          <div id="myCarousel" class="carousel slide container" data-ride="carousel">
              <ol class="carousel-indicators">
                  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                  <li data-target="#myCarousel" data-slide-to="1"></li>
                  <li data-target="#myCarousel" data-slide-to="2"></li>
              </ol>
              <div class="carousel-inner">
                  <?php 
                  include('conexion.php');
                  $res = $conn->query("SELECT * FROM receta WHERE opcion = 3 ORDER BY fecha DESC");
                  $a = 0;
                  foreach ($res as $r){
                      $a = $a + 1;
                     
                      if ($a == 1){
                  ?>
                   <div class="active item">
                       <img class="img-carrusel centro" src="<?php echo $r['imagen'];?>" alt="Feria Alimentaria">
                  </div>
                  <?php
                      }
                      else{
                          ?>
                  <div class="item">
                       <img class="img-carrusel centro" src="<?php echo $r['imagen'];?>" alt="Feria Alimentaria">
                  </div>
                  <?php
                      }
                      if($a >= 3){
                          break;
                      }
                  }
                  ?>
              </div>
              <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                  <span class="glyphicon glyphicon-menu-left"></span>
                  <span class="sr-only">Previous</span>
                  <a class="right carousel-control" href="#myCarousel" data-slide="next">
                      <span  class="glyphicon glyphicon-menu-right"></span>
                      <span class="sr-only">Next</span>
                  </a>
              </a>

      </div>
      <a href="recetas.php?id=3"><h2 class="container">Ver Más<span class="glyphicon glyphicon-chevron-right"></span></h2></a>
          <br>
          </div>
         <div id="footer" style="border-color: #5A5050;">
             <div>
            <form class="container" action="mailto:danny.boteo@gmail.com" method="post" enctype="text/plain"><br><br>
                <input class="pull-right" type="text" name="name" placeholder="Nombre" style="width: 165px"><br><br>
                <input class="pull-right" type="text" name="mail" placeholder="Correo" style="width: 165px"><br><br>
                <textarea class="pull-right" rows="auto" width="150px" placeholder="Comentario"></textarea><br><br><br>
                <input class=" pull-right" type="submit" value="Enviar" style="width: 80px;">
                <input class=" pull-right" type="reset" value="Borrar" style="width: 80px;">
                
            </form>
                 </div>
              </div>
          <div class="fijo">
            <a href="#header">    
                <i class="fa fa-chevron-circle-up icon" style="font-size: 50px"></i>
            </a>
        </div>

      <script src='js/java.js'></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> <!– Importante llamar antes a jQuery para que funcione bootstrap.min.js   –> 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script> <!– Llamamos al JavaScript  a través de CDN –>
  </body>
</html>  
