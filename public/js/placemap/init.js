$(document).ready(function(){

	window.userEmail = $("#session_email").val();

	//Options
	window.dbgMethodCalls = true;
	window.site_url = "http://localhost/placemap/";

	//Initialize api object
	window.api = new PlacemapApi();

	//Load the map stuff
	initializeMap();



	//audits = window.api.audit.list();


	//btnDebug click event: For Debugging
	$("#btnDebug").click(function(){	
		window.map.clearAuditMarkers();
		//var markerPos = map.marker.getPosition();
		//console.log(markerPos)

	});//end: btnDebug event click
	
	//btnMapReset click event: For reseting map position back to default
	$("#btnMapReset").click(function(){	
		
		window.map.resetMap();

		//clear the placeid
		location.hash = "";
	});//end: btnDebug event click

	$("#btnAddMarker").click(function(){
		if(window.dbgMethodCalls)
			console.log("btnAddMarker click event()");

		var center = window.map.draggablemarker.getPosition();
		lat = center.lat();
		lng = center.lng();
		window.api.markers.add({
			placeid: window.map.place.pk_placeid,
			//email: window.userEmail,
			lat: lat,
			lng: lng
		});

		window.map.loadPlace(window.map.place);
	});//end btnAddMarker()




    $( "#modalAddPlace" ).dialog({
      autoOpen: false,
      height: 300,
      width: 350,
      modal: true,
      buttons: {
        "Add Place": function() {
        	bValid = true;
        	//placenameval = placename.val();	
        	placename=$("#placename").val();
        	placedesc=$("#placedesc").val();
        	//console.log(placename);

        	if(placename.length==0){
        		bValid = false;
        	}
        	if(placedesc.length==0){
        		bValid = false;
        	}
          	if ( bValid ) {
           		position = window.map.draggablemarker.getPosition();
           		zoom = window.map.map.getZoom();
           		lat = position.lat();
           		lng = position.lng();
           		window.api.places.add({
           			placename: placename,
           			placedesc: placedesc,
           			lat: lat,
           			lng: lng,
           			zoom: zoom

           		});
            	$( this ).dialog( "close" );
            	
            }
         
        },//end add place button
        Cancel: function() {
          $( this ).dialog( "close" );
          window.map.resetMap();

        }
      },
      close: function() {
        	window.map.resetMap();
        	//allFields.val( "" ).removeClass( "ui-state-error" );
      }
    });
 
	$("#btnAddPlace").click(function(){
		 $( "#modalAddPlace" ).dialog( "open" );
	});
});

//initializeMap(): load the map script and determine if a place needs to be loaded
function initializeMap(){
	window.map = new googlemap();
	window.map.initialize();

	//get the placeid from the hash string in the url if there is one
	placeid = location.hash.substring(1);

	if(placeid!=""){//There is a placeid in the 

		//get the place data from the db
		place = window.api.places.getById(placeid);

		//load the place on the map
		window.map.loadPlace(place);

	}else{ //No placeid is set, load normal placemarkers
		window.map.loadPlaceMarkers();
	}
}