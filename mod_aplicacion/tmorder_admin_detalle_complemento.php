<?php
  require_once("../mod_conexion/db_conexion.php");
  $db = new DB_CONEXION();
  $db->connect();

    //$idmesa = $_POST['idmesa'];
    $idmesa = 1;
    $tabla = '';

    $registro = mysqli_query($db->connect(),"SELECT idcomplemento, 
                                                    nombre_complemento
                                              FROM complemento
                                              WHERE idcomplemento = $idmesa");

    $tabla = $tabla.'<div class="panel panel-primary">
              <div class="panel-heading">Detalle de Pedidos</div>
              <div class="panel-body">
                <div class="row">
                  <table class="table table-striped table-condensed table-hover">
                                <tr>
                                    <th width="40">Id</th>
                                    <th width="70%">Nombre Complemento</th>
                                    <th width="40" align="right">Cantidad</th>
                                    <th width="40"align="right">Eliminar</th>
                                </tr>';
        
  while($registro2 = mysqli_fetch_assoc($registro)){
    $tabla = $tabla.'<tr>
          <td align="center" width="40">'.$registro2['idcomplemento'].'</td>
          <td align="left" width="70%">'.$registro2['nombre_complemento'].'</td>
          <td align="center" width="20" height="20">'.$registro2['idcomplemento'].'</td>
          <td align="center" width="20" height="20"> <a href="javascript:eliminarComplemento('.$registro2['idcomplemento'].');" class="glyphicon glyphicon-remove-circle"></a></td>
        </tr>';   
  }
        

    $tabla = $tabla.'</table>



            </div>
        </div>
    </div>
    ';
    echo"$tabla";
?>