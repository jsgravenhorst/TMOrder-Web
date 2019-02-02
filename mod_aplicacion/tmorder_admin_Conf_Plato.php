<?php
	require_once("../mod_conexion/db_conexion.php");
	$db = new DB_CONEXION();
	$db->connect();

	$paginaActual = $_GET['partida'];

    $nroProductos= mysqli_num_rows(mysqli_query($db->connect(),"SELECT * FROM plato"));
    $nroLotes = 10;
    $nroPaginas = ceil($nroProductos/$nroLotes);
    $lista = '';
    $tabla = '';

 if($paginaActual < 1){
 	$paginaActual = 1;
 }

    if($paginaActual > 1){
        $lista = $lista.'<li><a href="conf_plato.php?partida='.($paginaActual-1).'">Anterior</a></li>';
    }
    for($i=1; $i<=$nroPaginas; $i++){
        if($i == $paginaActual){
            $lista = $lista.'<li class="active"><a href="conf_plato.php?partida='.$i.'">'.$i.'</a></li>';
        }else{
            $lista = $lista.'<li><a href="conf_plato.php?partida='.$i.'">'.$i.'</a></li>';
        }
    }
    if($paginaActual < $nroPaginas){
        $lista = $lista.'<li><a href="conf_plato.php?partida='.($paginaActual+1).'">Siguiente</a></li>';
    }
  
  	if($paginaActual <= 1){
  		$limit = 0;
  	}else{
  		$limit = $nroLotes*($paginaActual-1);
  	}

  	$registro = mysqli_query($db->connect(),"SELECT * FROM plato LIMIT $limit, $nroLotes ");


  	$tabla = $tabla.'<table width="100%" align="center">
        <tr>
	           <!--<td align="left" height="30">
                <input name="producto" id="producto" type="text" class="producto form-control" placeholder="Digite el nombre del Plato" >
             </td>-->
		
             <td align="right" height="30">
                <a href="conf_plato_nuevo.php" style="text-decoration:none; color:#000;"><b>Adicionar Nuevo Plato </b><i class="fa fa-plus-square"></i></a>
             </td>
        </tr>
    </table>
    <table class="table table-striped table-condensed table-hover">
			            <tr>
			                <th width="40">Id</th>
			                <th width="80%">Descripci&oacute;n Plato</th>
			                <th width="40" align="right">Modificar</th>
			                <th width="40"align="right">Eliminar</th>
			            </tr>';
				
	while($registro2 = mysqli_fetch_assoc($registro)){
		$tabla = $tabla.'<tr>
					<td align="center" width="40">'.$registro2['idplato'].'</td>
					<td align="left" width="80%">'.$registro2['nombre_plato'].'</td>
					<td align="center" width="20" height="20"><a href="javascript:editarPlato('.$registro2['idplato'].');" class="glyphicon glyphicon-edit"></a></td>
					<td align="center" width="20" height="20"> <a href="javascript:eliminarPlato('.$registro2['idplato'].');" class="glyphicon glyphicon-remove-circle"></a></td>
				</tr>';		
	}
        

    $tabla = $tabla.'</table>';
    
    echo"
    
    <script type='text/javascript'>
        $(function() {

            //autocomplete
            $('.producto').autocomplete({
                source: '../mod_aplicacion/tmorder_admin_completaProducto.php',
                minLength: 1
            });           

        });
    </script>
    
    ";
?>