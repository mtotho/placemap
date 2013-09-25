function googlemap(){

	this.draggablemarker;
	this.map;
	this.placemarkers = new Array();
	this.auditmarkers = new Array();
	this.place = null;
	//this.api=api;

	this.initialize=function(){
		if(window.dbgMethodCalls){
			console.log("map.initialize");
		}
		
		//The center of the map coords
		var center = new google.maps.LatLng(39.62482981110736, -98.67670524215697);

		//Initial Map Options
		var mapOptions = {
		      center:center,
		      zoom: 4,
		      mapTypeId: google.maps.MapTypeId.HYBRID,
		      draggable:true,
		      zoomControl: true,
		      disableDoubleClickZoom:false   
		};

		//The map variable
		this.map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);


		//Create draggable map marker that will be used for various purposes
		this.draggablemarker  = new google.maps.Marker({
			draggable:true,
			map: this.map,
			position: center
			
		});

	};//end initialize

	//resetMap(): resets map to default view
	this.resetMap = function(){
		if(window.dbgMethodCalls)
			console.log("map.resetMap()");

		//clear auditmarkers
		this.clearAuditMarkers();

		this.place = null;

		//The center of the map coords
		var center = new google.maps.LatLng(39.62482981110736, -98.67670524215697);

		//Initial Map Options
		var mapOptions = {
		      center:center,
		      zoom: 4,
		      mapTypeId: google.maps.MapTypeId.HYBRID,
		      draggable:true,
		      zoomControl: true,
		      disableDoubleClickZoom:false   
		};

		this.map.setOptions(mapOptions);
		this.draggablemarker.setPosition(center);
		//Load place markers
		this.loadPlaceMarkers();

	}//end resetMap

	//loadPlaceMarkers(): Loads all the place markers
	this.loadPlaceMarkers = function(){
		if(window.dbgMethodCalls)
			console.log("map.loadPlaceMarkers");

		places = window.api.places.list();

		console.log(places);

		for(i=0;i<places.length; i++){
			place = places[i];

			placemarker = new PlaceMarker(this.map, place);
			placemarker.setIcon(placemarker.icons.blue_google);
			placemarker.place();

			this.placemarkers[i] = placemarker;

		}//end for
	};//end loadplaces

	//loadPlace(): centers the map on a place
	this.loadPlace = function(place){
		if(window.dbgMethodCalls)
			console.log("map.loadPlace()");
		
		this.place = place;
		
		var center = new google.maps.LatLng(place.fld_lat, place.fld_lng);

		//new map options
		var mapOptions = {
		      center:center,
		      zoom: parseInt(place.fld_zoom),
		      mapTypeId: google.maps.MapTypeId.HYBRID,
		      draggable:true,
		      zoomControl: true,
		      disableDoubleClickZoom:false   
		};

		this.map.setOptions(mapOptions);

		this.draggablemarker.setPosition(center);

		//load markers
		this.loadAuditMarkers(this.place.pk_placeid);
	}

	//loadAuditMarkers(): load the markers for a particular place
	this.loadAuditMarkers = function(placeid){
		if(window.dbgMethodCalls)
			console.log("map.loadAutiMarkers()");

		var markers = window.api.markers.load(placeid);
		//console.log(markers);

		for(i=0;i<markers.length; i++){
			console.log("Loading audit marker # " + i);
			markerData = markers[i];
			//console.log(markerData);

			//auditmarker = null;
			this.auditmarkers[i] = new auditmarker(this.map, markerData);
			this.auditmarkers[i].setIcon(placemarker.icons.green_google);
			this.auditmarkers[i].place();

		}//end for
	};

	//clearPlaceMarkers(): Clear all markers from the screen
	this.clearPlaceMarkers = function(){
		if(window.dbgMethodCalls)
			console.log("map.clearPlaceMarkers()");

		//loop through each marker and set the map to null
		for(i=0; i<this.placemarkers.length; i++){
			this.placemarkers[i].marker.setMap(null);
		}
		
		//reset the array markers
		this.placemarkers = new Array();

	};//end clearPlaceMarkers

	//clearAuditMarkers(): Clear all markers from the screen
	this.clearAuditMarkers = function(){
		if(window.dbgMethodCalls)
			console.log("map.clearAuditMarkers()");

		//loop through each marker and set the map to null
		for(i=0; i<this.auditmarkers.length; i++){
			this.auditmarkers[i].marker.setMap(null);
		}
		
		//reset the array markers
		this.auditmarkers = new Array();

	};//end clearPlaceMarkers

}//end map


