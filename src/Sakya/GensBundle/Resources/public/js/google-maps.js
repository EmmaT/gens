/**
/*	Google Maps API
/*
/*
/*=========================================================*/

if( typeof google != 'undefined' ){

	function initialize(){


	// Info Window 
	// config your own address detail here
	var contentString = '<div id="company-address">'+
	'<p>'+
	'101 West Street, '+
	'<br>'+
	'New York, <br>'+
	'NY 12345'+
	'</p>'+
	'</div>';
	

	var  mapCanvas   = document.getElementById('map_canvas');

	// 'Getting' HTML5 data-attributes using dataset	
	var datatitle    =  mapCanvas.dataset.title || '101 West Street, New York'; 
	var dataControls =  mapCanvas.dataset.showcontrols;
	var dataLat 	 =  mapCanvas.dataset.lat;
	var dataLng      =  mapCanvas.dataset.lng;
	var dataZoom     = parseInt( mapCanvas.dataset.zoom || 7);
	

	var latlng = new google.maps.LatLng( dataLat, dataLng );
  		
	var mapOptions = {
	  	zoom: dataZoom,
	  	visible: true,
	  	center: latlng, // Set center from the specified lat and lng
	    mapTypeControl: false,
	  	scrollwheel: false,
	  	paneControl: true,
	    zoomControl: true,
	    mapTypeControl: true,
	    scaleControl: true,
	    streetViewControl: true,
	    overviewMapControl: true,
	    rotateControl: true,
	  	mapTypeId: google.maps.MapTypeId.ROADMAP
	  };


	// Init
	var contactLocation = new google.maps.Map( mapCanvas , mapOptions);
	
	// Info Options
	var infoOpts = {
    	content : contentString,
    	disableAutoPan: false,
    	maxWidth: 0,
    	boxStyle: { 
        	background: "url('tipbox.gif') no-repeat",
        	opacity: 0.75,
        	width: "100px"
    	}
	}
	// Initialize infowindow
	var infowindow = new google.maps.InfoWindow(infoOpts);

	// Add a icon marker
	var marker = new google.maps.Marker({
      position: latlng,
      map: contactLocation,
      title: datatitle
  	});

	// Click Event
  	google.maps.event.addListener(marker, 'click', function() {
    	infowindow.open(contactLocation,marker);
  	});
	
  }
  // Initialize Google Maps API
  google.maps.event.addDomListener(window, 'load', initialize);
 }

