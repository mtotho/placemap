$(document).ready(function(){
	window.dbgMethodCalls = true;
	window.site_url = "http://localhost/placemap/";
	window.api = new PlacemapApi();
	window.map = new googlemap();
	map.initialize();
	map.loadPlaceMarkers();


	//status = api.places.add({
	//	placename: "test",
	//	lat: 40.36547932060214,
	//	lng: -74.94623649215697,
	//	zoom: 13
	//});
	
	//console.log(places);

	//btnDebug click event: For Debugging
	$("#btnDebug").click(function(){	
		window.map.clearAuditMarkers();
		//var markerPos = map.marker.getPosition();
		//console.log(markerPos)

	});//end: btnDebug event click


	//btnDebug click event: For Debugging
	$("#btnMapReset").click(function(){	
		
		window.map.resetMap();
	});//end: btnDebug event click

	$("#btnAddMarker").click(function(){
		if(window.dbgMethodCalls)
			console.log("btnAddMarker click event()");

		var center = window.map.draggablemarker.getPosition();
		lat = center.lat();
		lng = center.lng();
		window.api.markers.add({
			placeid: window.map.place.pk_placeid,
			lat: lat,
			lng: lng
		});

		window.map.loadPlace(window.map.place);
	});
});
