<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!–Con esto garantizamos que se vea bien en dispositivos móviles–>
    <title>DB</title>
      <link href="db.css" rel="stylesheet" type="text/css">
       <link href="formulario2.css" rel="stylesheet" type="text/css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link href="https://fonts.googleapis.com/css?family=Encode+Sans+Expanded|Imprima" rel="stylesheet"> 
      <link href="images/logo.png" rel="shortcut icon" type="image/png">
      <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet" media="screen"> <!–Llamamos al archivo CSS a través de CDN –>
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
                                  <li><a href="tips.html">Tips</a></li>
                                  <li><a href="tecnicas.html">Técnicas</a></li>
                                  <li><a class="active1 " href="recetas.php">Recetas</a></li>
                                   <li class="dropdown">
                                      <button class="dropdown-toggle" data-toggle="dropdown">
                                          <span class="caret"></span>
                                          </button>
                                      <ul class="dropdown-menu limpiar" role="menu">
                                          <li><a href="#">Entremesés</a></li>
                                          <li><a href="#">Sopas</a></li>
                                          <li><a href="#">Pastas</a></li>
                                          <li><a href="#">Ensaladas</a></li>
                                          <li><a href="#">Carnes Rojas</a></li>
                                          <li><a href="categorias.php">Carnes blancas</a></li>
                                          <li><a href="#">Mariscos</a></li>
                                          <li><a href="#">Guarniciones</a></li>
                                          <li><a href="#">Postres</a></li>
                                      </ul>
                                  </li>
                                  <li><a href="noticias.html">Noticias</a></li>
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
                                      <a title="Instagram" href="https://www.instagram.com/chefboteo/" target="_blank">
                                          <i class="fa fa-instagram icon-brand" style="font-size: 30px"></i>
                                      </a>
                                      <a title="Pinterest" href="https://es.pinterest.com/Readerforever00/" target="_blank">
                                          <i class="fa fa-pinterest-square icon-brand" style="font-size: 30px"></i>
                                      </a>
                                      <a title="Twitter" href="" target="_blank"> 
                                          <i title="Twitter" class="fa fa-twitter-square icon-brand" style="font-size: 30px" ></i>
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
<?php 

include('conexion.php');

$id = $_GET['id'];

$res = $conn->query("SELECT * FROM receta WHERE id = $id");

foreach ($res as $r){
    
    ?>
        
      <h2 class="container subtitulos img-margin-inicio"><?php echo $r['titulo'];?></h2>
      <div class="container"> 
          <div class="col-md-12 div-procedimiento pull-left">
               <h2 class="subtitulos-in-pro">Procedimiento</h2>
              <p><?php echo $r['receta']; ?></p>
          </div>

      </div>
          <br>
          <?php
    //cierre del foreach
                      
}
             
?>
          <div class="container">
          <form class="col-md-6 pull-left" action="guardarc.php" method="post" enctype="multipart/form-data">
            <div class="div" id="nombre" style="margin: 10px 0px 20px 0px;">
                <input type="text" name="comentario" value="" style="width: 100%;" placeholder="Comentario">
                <input type="hidden" name="recta" value="<?php echo($id); ?>">
            </div>
              <div class="div" class="col-md-12 " id="enviar" style="margin: 30px 0px 60px;">
                <input type="submit" name="submit" value="Guardar Comentario">
            </div>
        </form>
<div class="col-md-6 pull-right">
                 <?php 
//conexion
include('conexion.php');
$a = 0;
$comentario = $conn->query("SELECT * FROM comentario WHERE receta = $id ORDER BY fecha DESC");
foreach ($comentario as $r){
$a = $a+1;
?>
          <div class="container centro" style="background-color: #daf1f0 !important; border-bottom-style: solid !important; border-width: 3px; margin-top: 4px; width: 100%; height: auto; border-color: #3EACA5;">
              <small><?php echo $r['fecha']; ?></small>
              <hr style="border-style: solid; border-width: 1px; border-color: #3EACA5;">
              <p><?php echo $r['comentario'] ?></p>
          </div><br>
                    <?php
    //cierre del foreach
   if($a >= 3){
       break;
   }                   
}
    
?>  
           </div>
          </div>

          </div>
       <div id="footer" class="container"><div class="col-md-9"></div>
              
            <form class="container" action="mailto:danny.boteo@gmail.com" method="post" enctype="text/plain"><br><br>
                <input class="pull-right" type="text" name="name" placeholder="Nombre" style="width: auto;"><br><br>
                <input class="pull-right" type="text" name="mail" placeholder="Correo" style="width: auto;"><br><br>
                <textarea class="pull-right" rows="auto" cols="auto" placeholder="Comentario"></textarea><br><br><br>
                <input class="pull-right" type="submit" value="Enviar">
                <input class="pull-right" type="reset" value="Borrar">
                
            </form>
              </div>
          <div class="fijo">
            <a href="#header">    
                <i class="fa fa-chevron-circle-up icon" style="font-size: 50px"></i>
            </a>
        </div>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> <!– Importante llamar antes a jQuery para que funcione bootstrap.min.js   –> 
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script> <!– Llamamos al JavaScript  a través de CDN –>
  </body>
</html>  