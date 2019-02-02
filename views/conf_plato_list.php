<?php
	require_once("../mod_conexion/db_conexion.php");
	$db = new DB_CONEXION();
	$db->connect();

    require_once("../mod_conexion/db_funciones.php"); 
    $dbf = new DB_Funciones();
    $ConsultaPlatos    = $dbf->adminConsultaListPlatos();
?>

<div class="card mb-3">
        <div class="card-header alert alert-info">
          <i class="fa fa-table"></i> Listado de Platos</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nombre plato</th>
                  <th>Impuesto</th>
                  <th>Valor</th>
                  <th>Costo</th>
                  <th>Complemento</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                if( $ConsultaPlatos != false ) 
                    {                                                                                                                                                                                                 
                      for ( $i = 0; $i< sizeof($ConsultaPlatos ); $i++ ) 
                      {                                                                     
                        $idplato        = $ConsultaPlatos[$i]['idplato'];
                        $nombre         = $ConsultaPlatos[$i]['nombre_plato'];
                        $impuesto       = $ConsultaPlatos[$i]['impuesto'];
                        $valor          = $ConsultaPlatos[$i]['valor'];
                        $costo          = $ConsultaPlatos[$i]['costo'];
                        $complemento    = $ConsultaPlatos[$i]['totalComplementos'];
                        echo'<tr>
                                <td>'.$idplato.'</td>
                                <td>'.$nombre.'</td>
                                <td>'.$impuesto.'</td>
                                <td>'.$valor.'</td>
                                <td>'.$costo.'</td>
                                <td>'.$complemento.'</td>
                                <td>
                                    <div class="btn-group btn-actions">
                                        <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown">
                                            Acciones
                                        </button>
                                        <div class="dropdown-menu">
                                            <a href="javascript:actualizarPlato('.$idplato.')" class="btn btn-sm dropdown-item" >
                                                <i class="fa fa-edit"></i>Editar
                                            </a>
                                            <a href="javascript:eliminarListPlato('.$idplato.')" class="btn btn-sm confirm-user-delete dropdown-item">
                                                <i class="fa fa-trash-o"></i>Borrar
                                            </a>
                                        </div>
                                    </div><!-- .btn-group -->
                                </td>
                            </tr>';
                      }
                    }
                
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>