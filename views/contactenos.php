<div class="section_home">
	
	<div id="gmap">
	    
	</div>
	<div id="cont_container" class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12">
	    <div id="cont_text_01" class="col-sm-6">
	    <p>
	        <span><b>Teléfono:</b></span> <br>
	        986 225 266 <br>
        </p>
	    <p>
            <span><b>Dirección:</b></span> <br>
	        Jr. Huánuco N°385, La Victoria - Lima <br>
	    </p>
        <p>
             <span><b>Correo:</b></span> <br>
             informes@ciabuly.com
	    </p>
	    </div>
	    <div id="cont_text_02" class="col-sm-6">
	        <p>Nombre</p>
	        <input type="text">
	        <p>Teléfono</p>
	        <input type="text">
	        <p>Correo</p>
	        <input type="text">
	        <p>Mensaje</p>
	        <textarea>
	            
	        </textarea>
	        <input id="send" type="submit" placeholder="Enviar">
	    </div>
	</div>
	
</div>
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyBWTqbyGQEG91zL0IeVEuPi3ZTGvji0TE8">
</script>
<script type="text/javascript">
	init = function() {
	var addMarker, map, mapElement, mapOptions, myLatlng;
	myLatlng = new google.maps.LatLng(-12.064717, -77.021015);
	mapOptions = {
	zoom: 17,
	center: myLatlng,
	scrollwheel: false,
	panControl: false,
	zoomControl: false,
	mapTypeControl: false,
	scaleControl: false,
	streetViewControl: false,
	overviewMapControl: false
	};
	mapElement = document.getElementById('gmap');
	map = new google.maps.Map(mapElement, mapOptions);
	addMarker = function() {
	var marker;
	marker = new google.maps.Marker({
	map: map,
	position: myLatlng,
	draggable: false,
	title: 'Template CCL',
	icon: 'app/img/contactenos/icono.png'
	});
	};
	google.maps.event.addDomListener(window, 'resize', function() {
	map.setCenter(myLatlng);
	});
	addMarker();
	};
	google.maps.event.addDomListener(window, 'load', init);
</script>