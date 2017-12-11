<div class="col-md-6 col-md-offset-3 text-right">
	<small>Campos obligatorios (*)</small>	
</div>

<div class="container content_frm_g">
<div class="col-md-6 col-md-offset-3 form_addEdit_g">
<h3>Agregar Producto</h3>
<br>
<form action="producto.php?op=add" enctype="multipart/form-data" data-toggle="validator" role="form" id="myForm">

	<?php echo $msg_producto;?>
	
	<div class="form-group">
		<label for="producto_categoria">Seleccionar Categoría *</label>
		<select class="form-control" name="producto_categoria" id="producto_categoria" required>
			<option value="">Seleccionar</option>
			<?php foreach ($rsProductoCategoria as $colc) { ?>
			<option value="<?php echo $colc['categoria_id']; ?>"><?php echo utf8_encode($colc['categoria_nombre']); ?></option>
			<?php } ?>
		</select>
	</div>

	<div class="form-group">
	  <label for="producto_nombre">Nombre de producto *</label>
	  <input type="text" class="form-control" name="producto_nombre" id="producto_nombre" maxlength="60" required>
		<small>Max. Caracteres: 60</small>
	</div>
	<div class="form-group">
	  <label for="producto_nombre_en">Nombre de producto en inglés *</label>
	  <input type="text" class="form-control" name="producto_nombre_en" id="producto_nombre_en" maxlength="60">
		<small>Max. Caracteres: 60</small>
	</div>

	<div class="form-group">
		<label for="producto_descripcion">Descripción de Producto *</label>
		<textarea name="producto_descripcion" id="producto_descripcion" cols="30" rows="10"></textarea>
	</div>

	<div class="form-group">
		<label for="producto_descripcion_en">Descripción de Producto en Inglés *</label>
		<textarea name="producto_descripcion_en" id="producto_descripcion_en" cols="30" rows="10"></textarea>
	</div>

	<br>
	<div class="form-group row file_pdf">
		<div class="col-md-6 arch1 text-center">
			<label class="control-label">Seleccionar PDF</label>
			<input id="input-4" name="producto_archivo" type="file" multiple class="file-loading">	
			<small>Peso Máximo 2 MB.</small>
			<div id="msg-peso1"></div>			
		</div>
		<div class="col-md-6 arch1 text-center">
			<label class="control-label">Seleccionar PDF en Inglés</label>
			<input id="input-4en" name="producto_archivo_en" type="file" multiple class="file-loading">
			<small>Peso Máximo 2 MB.</small>	
			<div id="msg-peso2"></div>		
		</div>
	</div>

<br><br>
<!-- Aki imagen -->
	<div class="form-group">
	<label class="control-label">Seleccionar Imagen *</label>
	<input id="input-6" name="producto_imagen" type="file" multiple class="file-loading" required>
	<br>
	<small>Peso Máximo 300 KB. Medidas recomendadas: <?php echo $info['m_producto']['ancho']; ?> pixeles ancho x <?php echo $info['m_producto']['alto']; ?> pixeles alto. </small>
	<div id="msg-peso"></div>
	</div>
	<br>
	  <input type="hidden" name="frm_op" value="frm_add">
	
	<div class="form-group text-center">
	  <button type="submit" class="btn btn-default">Guardar</button>
	  <button type="button" class="btn btn-default" onclick="document.location='producto.php'">Ir a Lista de Productos</button>		
	</div>
	</fieldset>
</form>	
</div>
</div>

<script>

$(document).on('ready', function() {
    $("#input-6,#input-ar6").fileinput({
        showUpload: false,
        maxFileCount: 2,
        language:'es',
        mainClass: "input-group-lg"
    });


    $("#input-4,#input-4en").fileinput({showCaption: false,showUpload: false,});


    $('#producto_descripcion').summernote({height: 200});
    $('#producto_descripcion_en').summernote({height: 200});
});




/*Validaciones PDF e Imagen (Peso)*/

$(document).ready(function(){
	$('#input-4').bind('change', function() {	    
		if(window.File && window.FileReader && window.FileList && window.Blob){

/* PDF ES */

			var filename1 = $("#input-4").val();
			var extension1 = filename1.replace(/^.*\./, '');

			if (extension1 == filename1) {
			    extension1 = '';
			} else {
			    extension1 = extension1.toLowerCase();
			}

			/* Valida Extension1 */
			if(extension1 != 'pdf') {
						document.getElementById('input-4').value='';
						document.getElementById('msg-peso1').innerHTML='<div class="alert alert-danger fade in"><strong>¡Aviso!</strong>Extension no permitida. Tiene que ser archivo: pdf</div>';
			}

			if(this.files[0].size  > 2000000){
				document.getElementById('input-4').value='';
			    document.getElementById('msg-peso1').innerHTML='<div class="alert alert-danger fade in"><strong>¡Aviso!</strong>El archivo pdf ha sobrepasado el límite de peso.</div>';
			      
			    }else{
			      document.getElementById('msg-peso1').innerHTML="";
			    }
		}else{
		// IE
		    var Fs = new ActiveXObject("Scripting.FileSystemObject");
		    var ruta = document.upload.file.value;
		    var archivo = Fs.getFile(ruta);
		    var size = archivo.size;
		    
			if(size  > 2000000){
				document.getElementById('input-4').value='';
			    document.getElementById('msg-peso1').innerHTML='<div class="alert alert-danger fade in"><strong>¡Aviso!</strong>El archivo pdf ha sobrepasado el límite de peso.</div>';   
		    }else{
		        document.getElementById('msg-peso1').innerHTML="";
		    }
		}
	 
	});



	$('#input-4en').bind('change', function() {	    
		if(window.File && window.FileReader && window.FileList && window.Blob){


/* PDF EN */

			var filename2 = $("#input-4en").val();
			var extension2 = filename2.replace(/^.*\./, '');

			if (extension2 == filename2) {
			    extension2 = '';
			} else {
			    extension2 = extension2.toLowerCase();
			}

			/* Valida Extension2 */
			if(extension2 != 'pdf') {
						document.getElementById('input-4en').value='';
						document.getElementById('msg-peso2').innerHTML='<div class="alert alert-danger fade in"><strong>¡Aviso!</strong>Extension no permitida. Tiene que ser archivo: pdf</div>';
			}


			if(this.files[0].size  > 2000000){
				document.getElementById('input-4en').value='';
			    document.getElementById('msg-peso2').innerHTML='<div class="alert alert-danger fade in"><strong>¡Aviso!</strong>El archivo pdf ha sobrepasado el límite de peso.</div>';
			      
			    }else{
			      document.getElementById('msg-peso2').innerHTML="";
			    }
		}else{
		// IE
		    var Fs = new ActiveXObject("Scripting.FileSystemObject");
		    var ruta = document.upload.file.value;
		    var archivo = Fs.getFile(ruta);
		    var size = archivo.size;
		    
			if(size  > 2000000){
				document.getElementById('input-4en').value='';
			    document.getElementById('msg-peso2').innerHTML='<div class="alert alert-danger fade in"><strong>¡Aviso!</strong>El archivo pdf ha sobrepasado el límite de peso.</div>';   
		    }else{
		        document.getElementById('msg-peso2').innerHTML="";
		    }
		}
	 
	});



	$('#input-6').bind('change', function() {
	    
	if(window.File && window.FileReader && window.FileList && window.Blob){

/* IMAGEN */

		var filename = $("#input-6").val();
		var extension = filename.replace(/^.*\./, '');

		if (extension == filename) {
		    extension = '';
		} else {
		    extension = extension.toLowerCase();
		}

		/* Valida Extension */
		if(extension != 'jpg') {
			if(extension != 'png') {
				if(extension != 'jpeg') {
					document.getElementById('input-6').value='';
					document.getElementById('msg-peso').innerHTML='<div class="alert alert-danger fade in"><strong>¡Aviso!</strong>Extension no permitida. Tiene que ser archivo: jpg, jpeg ó png</div>';
				}
			}
		}


		if(this.files[0].size  > 305000){
			document.getElementById('input-6').value='';
		    document.getElementById('msg-peso').innerHTML='<div class="alert alert-danger fade in"><strong>¡Aviso!</strong>La imagen ha sobrepasado el límite de peso.</div>';	      
	    }else{
	      document.getElementById('msg-peso').innerHTML="";
	    }
	}else{
	// IE
	    var Fs = new ActiveXObject("Scripting.FileSystemObject");
	    var ruta = document.upload.file.value;
	    var archivo = Fs.getFile(ruta);
	    var size = archivo.size;
	    
		if(size  > 305000){
			document.getElementById('input-6').value='';
		    document.getElementById('msg-peso').innerHTML='<div class="alert alert-danger fade in"><strong>¡Aviso!</strong>La imagen ha sobrepasado el límite de peso.</div>';   
	    }else{
	        document.getElementById('msg-peso').innerHTML="";
	    }
	}
	 
	});

});

</script>