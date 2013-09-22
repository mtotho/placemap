function map(){

	this.marker;

	this.initialize=function(){

		//The center of the map coords
		var center = new google.maps.LatLng(40.36547932060214, -74.94623649215697);

		//Initial Map Options
		var mapOptions = {
		      center:center,
		      zoom: 15,
		      mapTypeId: google.maps.MapTypeId.HYBRID,
		      draggable:true,
		      zoomControl: true,
		      disableDoubleClickZoom:false   
		};

		//The map variable
		var map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);


		//Create draggable map marker that will be used for various purposes
		this.marker  = new google.maps.Marker({
			draggable:true,
			map: map,
			position: center
			
		});
		
	}//end initialize

}//end map

$(document).ready(function(){

	map = new map();
	map.initialize();

	//btnDebug click event: For Debugging
	$("#btnDebug").click(function(){	
		
		var markerPos = map.marker.getPosition();
		console.log(markerPos)

	});//end: btnDebug event click



});

