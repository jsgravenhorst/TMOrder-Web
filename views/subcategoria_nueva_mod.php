<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <form id="formularionuevasubcat" role="form" method='post'  action='' name='datos'>
                <div id="respuestasubcat"></div>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-12">
    						
                            <label for="ejemplo_email_1">Seleccione la Categor&iacute;a</label>
    						<select name='categorianueva' id='categorianueva' class="form-control form-control-sm">
    						 <option>Seleccione la subcategor&iacute;a</option>  
    						</select>
    					</div>

                        <div class="col-md-12">
                            <label for="ejemplo_email_1">Digite el nombre de la Sub Categoria</label>
                            <input name='nombre' id='nombre' type="text" class="form-control form-control-sm" onKeyUp="this.value=this.value.toUpperCase();" placeholder="Ingrese el nombre de la sub categoria">
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <button type="submit" class="btn btn-info btn-sm pull-right" >Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->