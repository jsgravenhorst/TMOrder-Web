<?php
    if (isset($_GET['term'])){
    	# conectare la base de datos
        $con=@mysqli_connect("localhost", "tachinav_jmillan", "jmillan", "tachinav_bd_tmorder");
    	
    $return_arr = array();
    /* Si la conexi贸n a la base de datos , ejecuta instrucci贸n SQL. */
    if ($con)
    {
    	$fetch = mysqli_query($con,"SELECT * FROM producto where descripcion like '%" . mysqli_real_escape_string($con,($_GET['term'])) . "%' LIMIT 0 ,50"); 
    	
    	/* Recuperar y almacenar en conjunto los resultados de la consulta.*/
    	while ($row = mysqli_fetch_array($fetch)) {
    		$id_producto=$row['idproducto'];
    		$row_array['value'] = $row['descripcion'];
    		$row_array['idproducto']=$row['idproducto'];
    		$row_array['descripcion']=$row['descripcion'];
    		array_push($return_arr,$row_array);
        }
    }
    
    /* Cierra la conexi贸n. */
    mysqli_close($con);
    
    /* Codifica el resultado del array en JSON. */
    echo json_encode($return_arr);
    
    }
?>