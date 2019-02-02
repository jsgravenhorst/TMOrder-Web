<?php
  session_start();
  error_reporting(E_ALL ^ E_NOTICE);
  
  if(isset($_POST["loguear"]))
      { 
        require_once("mod_conexion/db_funciones.php"); 
        $db = new DB_Funciones();
        
        $nick = $_POST['nick'];
        $password = $_POST['password'];
        
        $validausr = $db->validaUsuario($nick, $password);
        $mensaje = "";
        
        if( $validausr != false ) 
        {                                                                                                             
          for ( $i = 0; $i< sizeof($validausr); $i++ ) 
            {                                         
                $usuar    = $validausr[$i]['usuario'];
                $passw    = $validausr[$i]['passw'];
                $nombres  = $validausr[$i]['nombre_usuario'];
                $nombres  = $nombres." ".$validausr[$i]['apellido'];
                $id_usr   = $validausr[$i]['idusuario'];
            }
        }
              
        if($nick != null && $nick == $usuar && $password == $passw)
        {
          $_SESSION['usuario'] = $nick;
          $_SESSION['auth'] = "yes";
          $_SESSION['nom_usuario'] = $nombres;
          $_SESSION['tipo_usuario'] = $id_usr;
          header("location:views/panel.php");
        }else{
          $mensaje = 'Usuario o Contrase&ntilde;a Incorrectos';
        }
      }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>TMOrder</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  
      <style type="text/css">

        body {
            background-image: url(images/fondo.jpg);
            background-position: center center;	  
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }

    </style>
  
</head>

<body class="bg-light small">
  <div id='header'>
    <img src='images/bannerTMOrder.jpg'/>
  </div>
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header alert alert-info">Ingresar al Sistema</div>
      <div class="card-body">
          <?php
                if($mensaje!=""){
                    echo"
                    <div class='form-group'>
    					<div class='alert alert-danger'>$mensaje</div>
    				</div>
                    ";
                }
            ?>
        <form method='post' action='' name='login'>
          <div class="form-group">
            <label>Usuario</label>
              <input class="form-control form-control-sm" id="nick" name="nick" type="name" placeholder="Ingrese el usuario">
          </div>
          <div class="form-group">
            <label>Contrase&ntilde;a</label>
            <input class="form-control form-control-sm" id="password" name="password" type="password" placeholder="Ingrese la Contrase&ntilde;a">
          </div>
          <input type='submit' name='loguear' class="btn btn-info btn-block btn-sm"  value='Ingresar'>
        </form>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>
