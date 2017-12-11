<div class="col-md-6 col-md-offset-3 text-right">
	<small>Campos obligatorios (*)</small>	
</div>

<div class="container content_frm_g">
<div class="col-md-6 col-md-offset-3 form_addEdit_g" id="">
<h3>Agregar Foto para Galería</h3>
<br>
<form action="galeria.php?op=add" enctype="multipart/form-data" role="form" id="myForm">

	<?php echo $msg_galeria; ?>

	  <div class="form-group">
	    <label for="galeria_titulo">Título de Foto *</label>
	    <input type="text" class="form-control" name="galeria_titulo" id="galeria_titulo" maxlength="12" required>
	  	<small>Max. Caracteres: 12</small>
	  </div>
	  <div class="form-group">
	    <label for="galeria_titulo_en">Título de Foto en inglés *</label>
	    <input type="text" class="form-control" name="galeria_titulo_en" id="galeria_titulo_en" maxlength="12">
	  	<small>Max. Caracteres: 12</small>
	  </div>


<!-- Aki imagen -->
	<div class="form-group">
	<label class="control-label">Seleccionar Imagen *</label>
	<input id="input-6" name="galeria_imagen" type="file" multiple class="file-loading" required>
	<br>
	<small>Peso Máximo 300 KB. Medidas recomendadas: <?php echo $info['m_galeria']['ancho']; ?> pixeles ancho x <?php echo $info['m_galeria']['alto']; ?> pixeles alto. </small>	
	<div id="msg-peso"></div>
	</div>
	<br>

	  <input type="hidden" name="frm_op" value="frm_add">

	<div class="text-center">
	  <button type="submit" id="btn_guardar" class="btn btn-default">Guardar</button>
	  <button type="button" class="btn btn-default" onclick="document.location='galeria.php'">Ir a Lista de Galerías</button>
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