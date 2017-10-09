<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DB</title>
      <link href="db.css" rel="stylesheet" type="text/css">
      <link href="formulario.css" rel="stylesheet" type="text/css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link href="https://fonts.googleapis.com/css?family=Encode+Sans+Expanded|Imprima" rel="stylesheet"> 
      <link href="images/logo.png" rel="shortcut icon" type="image/png">
      <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet" media="screen"> 
  </head>
  <body>
       <div id="header" class="container"> 
                  <nav class="navbar menu arriba" role="navigation">
                      <a href="index.html"><img src="images/logo.png" class="logo img-responsive pull-left"></a>
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
                                  <li><a href="recetas.php"><?php echo $r['nombre'];?></a></li>
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
                                      <input role="search" type="text" class="form-control " placeholder="Buscar">
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
<form class="container form" action="guardar.php" method="post" enctype="multipart/form-data">
            <div class="div" id="title">
                <label for="titulo">Título:</label>
                <input type="text" name="titulo">
            </div>
     <div class="div" id="content">
                <label for="contenido">Contenido:</label>
                <textarea name="contenido"></textarea>
            </div>
     <div class="div" id="option">
         <select name="categoria">
   <option selected value="0"> Elige una opción </option>
             <?php 
             include('conexion.php');
             $li = $conn->query("SELECT * FROM opcion");
             foreach ($li as $r){
             ?>
       <optgroup value="<?php echo $r['id']; ?>" label="<?php echo $r['nombre']; ?>"> 
           <?php 
              $a = $r['id'];
             
              $prueba = $conn->query("SELECT * FROM categoria WHERE opcion =  $a");
              foreach ($prueba as $p){
                  ?>
           <option value="<?php echo $p['id']; ?>"><?php echo $p['nombre']; ?></option> 
            <?php }?>
   </optgroup> 
              <?php }?>
</select>
    </div>
    <div class="div" id="img" class="col-md-6">
                <label>Subir imágen</label>
                <input type="file" name="archivo">
            </div>
         
                <div class="div" class="col-md-12 enviar">
                    <input type="submit" name="aceptar">
                </div>
          </form>
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