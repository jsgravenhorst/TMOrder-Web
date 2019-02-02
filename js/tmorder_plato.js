$(document).ready(function(){
    
    $("#categoria").change(function () {
           $("#categoria option:selected").each(function () {
            idcategoria = $(this).val();
            //nombrecategoria = $(this).text();
            //var variable1 = '<%= Session["Variable1"] %>';
            //Session["nombreCat"] = idcategoria;
            $("#categorianueva").val(idcategoria);
            $.post("../mod_aplicacion/tmorder_admin_subcat.php", { idcategoria: idcategoria }, function(data){
                $("#subCat").html(data);
            });            
        });
    });
    
    $("#categoriamod").change(function () {
           $("#categoriamod option:selected").each(function () {
            idcategoriamod = $(this).val();
            $.post("../mod_aplicacion/tmorder_admin_subcat.php", { idcategoria: idcategoriamod }, function(data){
                $("#subCatmod").html(data);
            });            
        });
    });
    
    $("#formulario").on("submit",function(event){
    	event.preventDefault(); //neutralizar el formulario
    	var cadena=$(this).serializeArray();  //trae todos los valores del html
    	//alert(cadena[4].value);
    	//console.log(cadena);
    	$.ajax({
    		url:"../mod_aplicacion/tmorder_admin_Plato_nuevo.php",
    		type:"post",
    		data:{nombre:cadena[0].value, categoria:cadena[2].value, subCat:cadena[3].value, valor:cadena[4].value,impuesto:cadena[5].value,costo:cadena[6].value,complemento:cadena[7].value, comanda:cadena[8].value, selgusto:cadena[9].value}
    		//beforeSend:function(){$("#mensaje").text("enviando...");}
    	}).done(function(data){
    	    if(data == "success"){
    	        alert("datos registrados satisfactoriamente");
    	        location.reload();
    	    }else{
    	        alert("Error al insertar");
    	        location.reload();
    	    }
    	});
    });
    
    $("#formularionuevacat").on("submit", function(event){
        event.preventDefault();
        var cadenaCat = $(this).serializeArray();
        $.ajax({
            url:"../mod_aplicacion/tmorder_admin_Categoria_nueva.php",
            type:"post",
            data:{tipocategoria:cadenaCat[0].value,nombre:cadenaCat[1].value}
        }).done(function(data){
            if(data == "success"){
                $("#respuesta").html("<div class='form-group'><div class='alert alert-success'>Categoria Creada satisfactoriamente</div></div>");
    	        location.reload();
            }else{
                $("#respuesta").html("<div class='form-group'><div class='alert alert-success'>Error al crear la Categoria</div></div>");
    	        location.reload();
            }
            
        });
    });
    
    $("#formularionuevasubcat").on("submit",function(event){
    	event.preventDefault(); //neutralizar el formulario
    	var cadenasubCat=$(this).serializeArray();  //trae todos los valores del html
    	$.ajax({
    		url:"../mod_aplicacion/tmorder_admin_SubCategoria_nueva.php",
    		type:"post",
    		data:{categorianueva:cadenasubCat[0].value,nombre:cadenasubCat[1].value}
    		//beforeSend:function(){$('#modal-container-modplato').modal('show');}
    	}).done(function(data){
    	    if(data == "success"){
    	        $("#respuestasubcat").html("<div class='form-group'><div class='alert alert-success'>Subcategoria Creada satisfactoriamente</div></div>");
    	        location.reload();
    	    }else{
    	        $("#respuestasubcat").html("<div class='form-group'><div class='alert alert-danger'>Error al crear Subcategoria</div></div>");
    	        location.reload();
    	    }
    	});
    });
    
    $("#formulariomodplato").on("submit",function(event){
        event.preventDefault();
        var cadenamodplato = $(this).serializeArray();
        $.ajax({
    		url:"../mod_aplicacion/tmorder_admin_Plato_mod.php",
    		type:"post",
    		data:{nombremod:cadenamodplato[0].value, idplatomod:cadenamodplato[1].value, categoriamod:cadenamodplato[2].value, subCatmod:cadenamodplato[3].value, valormod:cadenamodplato[4].value, impuestomod:cadenamodplato[5].value, costomod:cadenamodplato[6].value, complementomod:cadenamodplato[7].value, comandamod:cadenamodplato[8].value, selgustomod:cadenamodplato[9].value}
    		//beforeSend:function(){$("#mensaje").text("enviando...");}
    	}).done(function(data){
    	    if(data == "success"){
    	        alert("datos Actualizados satisfactoriamente");
    	        location.reload();
    	    }else{
    	        alert("Error al actualizar datos");
    	        location.reload();
    	    }
    	});
    });
    
});
        
    
    function cargarDatos() {
        
        $.post("../mod_aplicacion/tmorder_admin_cargar_listas.php",{lista:0},function(data){
            $("#tipocategoria").html(data);
        });
        
        $.post("../mod_aplicacion/tmorder_admin_cargar_listas.php",{lista:1},function(data){
            $("#categoria").html(data);
        });
        
        $.post("../mod_aplicacion/tmorder_admin_cargar_listas.php",{lista:2},function(data){
            $("#categoriamod").html(data);
            $("#categorianueva").html(data);
        });
        
        /*$.post("../mod_aplicacion/tmorder_admin_cargar_listas.php",{lista:3}, function(data){
            $("#subCatmod").html(data);
        });*/
        
        $.post("../mod_aplicacion/tmorder_admin_cargar_listas.php",{lista:4},function(data){
            $("#complemento").html(data);
            $("#complementomod").html(data);
        });
        
        $.post("../mod_aplicacion/tmorder_admin_cargar_listas.php",{lista:5}, function(data){
            $("#comanda").html(data);
            $("#comandamod").html(data);
        });
        
        $.post("../mod_aplicacion/tmorder_admin_cargar_listas.php",{lista:6}, function(data){
            $("#selgusto").html(data);
            $("#selgustomod").html(data);
        });
    }
        
    $(function() {
        //autocomplete
        $(".plato").autocomplete({
            source: "../mod_aplicacion/tmorder_admin_completa_Producto.php",
            minLength: 1,
            select: function(event, ui) {
    					event.preventDefault();
    					$('.plato').val(ui.item.descripcion);
    					$('#idplato').val(ui.item.idproducto);
    			     }
        });
    
    });
    
    function isNumber(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if ( (charCode > 31 && charCode < 48) || charCode > 57) {
            return false;
        }
        return true;
    }
    
    function actualizarPlato(idplato){
        
        $.post("../mod_aplicacion/tmorder_admin_Plato_carga.php", { idplato: idplato }, function(data){
				for (var i in data)
                {
                    datos = data[i];
                    $(".platomod").val(datos.nombre);
                    $("#idplatomod").val(datos.id);
                    $("#categoriamod").val(datos.idcategoria);
                    mostrarSubCat(datos.idcategoria, datos.idsubcategoria);
                    //$("#subCatmod").val(datos.idsubcategoria);
                    $("#valormod").val(datos.valor);
                    $("#impuestomod").val(datos.impuesto);
                    $("#comandamod").val(datos.idcomanda);
                    $("#costomod").val(datos.costo);
                    $("#complementomod").val(datos.complemento);
                    $("#selgustomod").val(datos.idgusto);
                }
			},'json');
		$('#modal-container-modplato').modal('show');
    }
    
    function mostrarSubCat(idcat, idsubcat){
		    $.post("../mod_aplicacion/tmorder_admin_subcat.php", { idcategoria: idcat }, function(data){
                        $("#subCatmod").html(data);
                        $("#subCatmod").val(idsubcat);
                    }); 
		}
    
    
    function eliminarListPlato(idplato){
        
        var result = confirm('Seguro desea eliminar el registro ? '+idplato);
            if(result) {
               $.post("../mod_aplicacion/tmorder_admin_Plato_eliminar.php",{idplato:idplato},function(data){
                    if(data == "success"){
                        alert("datos eliminados satisfactoriamente");
                        location.reload();
                    }else{
                        alert("Error al eliminar los datos");
                        location.reload();
                    }
                });
            }
        
    }