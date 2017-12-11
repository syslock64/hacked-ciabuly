<div class="col-md-6 col-md-offset-3 text-right">
	<small>Campos obligatorios (*)</small>	
</div>

<div class="container content_frm_g">
<div class="col-md-6 col-md-offset-3 form_addEdit_g" id="">
<h3>Modificar Datos de Galería - <?php echo $colmg['galeria_titulo']; ?></h3>
<br>
<div class="content_img_actual">
	<div class="col-md-12 col-xs-12 img_actual">
		<div class="col-md-2 col-sm-2 col-xs-4">
			<img class="img-responsive" src="app/img/galeria/<?php echo $colmg['galeria_imagen']; ?>">
		</div>
		<div class="col-md-10 col-sm-10 col-xs-8">
			<p>Imagen Actual</p>
		</div>	
	</div>	
</div>	
<form action="galeria.php?op=edit" method="post" role="form" id="myForm" >
	  <div class="form-group">
	    <label for="galeria_titulo">Título de Foto *</label>
	    <input type="text" class="form-control" name="galeria_titulo" id="galeria_titulo" value="<?php echo $colmg['galeria_titulo']; ?>" maxlength="12" required>
	  	<small>Max. Caracteres: 12</small>
	  </div>
	  <div class="form-group">
	    <label for="galeria_titulo_en">Título de Foto en inglés *</label>
	    <input type="text" class="form-control" name="galeria_titulo_en" id="galeria_titulo_en" value="<?php echo $colmg['galeria_titulo_ingles']; ?>" maxlength="12">
	  	<small>Max. Caracteres: 12</small>
	  </div>


	  <div class="form-group">
	  	  <label class="control-label">Seleccionar Imagen *</label>
	  	  <input type="file" id="input-6" name="galeria_imagen" multiple class="file-loading"> 	
	  	  <br>
	  	  <small>Peso Máximo 300 KB. Medidas recomendadas: <?php echo $info['m_galeria']['ancho']; ?> pixeles ancho x <?php echo $info['m_galeria']['alto']; ?> pixeles alto. </small>
	  	  <div id="msg-peso"></div>
	  </div>
	  <br>

	  <input type="hidden" name="galeria_imagen_actual" value="<?php echo $colmg['galeria_imagen']; ?>">


	  <input type="hidden" name="gal" value="<?php echo $_GET['gal']; ?>">
	  <input type="hidden" name="frm_op" value="frm_edit">
		<?php
			echo $msg_galeria;
		?>
	<div class="text-center">	
	  <button type="submit" class="btn btn-default">Guardar</button>
	  <button type="button" class="btn btn-default" onclick="document.location='galeria.php'">Ir a Lista de Categrías</button>
	</div>
	</fieldset>
</form>	
</div>
</div>


<script>

$(document).on('ready', function() {
    $("#input-6").fileinput({
        showUpload: false,
        maxFileCount: 2,
        language:'es',
        mainClass: "input-group-lg"
    });
});


$(document).ready(function(){
$('#input-6').bind('change', function() {
    
if(window.File && window.FileReader && window.FileList && window.Blob){

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