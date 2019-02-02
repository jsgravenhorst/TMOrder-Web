<?php
  require_once("../mod_conexion/db_conexion.php");
  $db = new DB_CONEXION();
  $db->connect();

  $idmesa = $_POST['idmesa'];
    $tabla = '';

    $registro = mysqli_query($db->connect(),"SELECT p.plato_idplato,
                                                    p.idpedidoMesa,
                                                    r.descripcion
                                              FROM pedidomesa p, producto r
                                              WHERE r.idproducto = p.plato_idplato
                                              AND p.asignacion_mesa_idmesa = $idmesa");

    $tabla = $tabla.'<div class="panel panel-primary">
              <div class="panel-heading">Detalle de Pedidos</div>
              <div class="panel-body">
                <div class="row">
                  <table class="table table-striped table-condensed table-hover">
                                <tr>
                                    <th width="40">Id</th>
                                    <th width="80%">Descripci&oacute;n Usuario</th>
                                    <th width="40" align="right">Modificar</th>
                                    <th width="40"align="right">Eliminar</th>
                                </tr>';
        
  while($registro2 = mysqli_fetch_assoc($registro)){
    $tabla = $tabla.'<tr>
          <td align="center" width="40">'.$registro2['idpedidoMesa'].'</td>
          <td align="left" width="80%">'.$registro2['descripcion'].'</td>
          <td align="center" width="20" height="20"><a href="usuarios_mod.php?var='.$registro2['plato_idplato'].'" class="glyphicon glyphicon-edit"></a></td>
          <td align="center" width="20" height="20"> <a href="javascript:eliminarUsuario('.$registro2['plato_idplato'].');" class="glyphicon glyphicon-remove-circle"></a></td>
        </tr>';   
  }
        

    $tabla = $tabla.'</table>

                <div class="col-md-12">
                  <button type="submit" class="btn btn-primary" style="float:right;">Confirmar Pedido</button>
                </div>

            </div>
        </div>
    </div>
    ';
    echo"$tabla";
?>