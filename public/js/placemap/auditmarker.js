function auditmarker(map, markerData){

	console.log(markerData);
	//this.place=place;
	this.placeid = markerData.fk_placeid;
	this.markerId;
	this.coords= new google.maps.LatLng(markerData.fld_lat, markerData.fld_lng);;
	this.map=map;
	this.marker;
	this.options;
	this.icon; //The icon that is used
	this.icons = {
			green_google: 'http://maps.google.com/mapfiles/ms/icons/green-dot.png',
			blue_google: 'http://maps.google.com/mapfiles/ms/icons/blue-dot.png'
			//green: base_url+ 'public/images/marker_green.png',
			//yellow_green: base_url+ 'public/images/marker_yellow-green.png',
			//yellow_red: base_url+ 'public/images/marker_yellow-red.png',
			//red: base_url + 'public/images/marker_red.png'
	};
	
	var instance = this;

	//setCoords(): Set coords 
	this.setCoords = function(coords)
	{
		this.coords = coords;
	};
	
	//setIcon(): Sets the icon
	this.setIcon = function(icon)
	{
		this.icon=icon;
	};
	
	this.setMarkerId = function(id)
	{
		this.markerId = id;
	};
	
	//bind(): Initiate action listeners
	this.bind = function(){
		
		//Click():
		google.maps.event.addListener(this.marker, 'click', function(event)
		{
			if(window.dbgMethodCalls)
				console.log(place.fld_placename + " auditmarker click event()");

			//clear the markers from the place map
			//window.map.clearPlaceMarkers();

			//Load the place on the map
			//window.map.loadPlace(place);

		});

		//dblClick():
		google.maps.event.addListener(this.marker, 'dblclick', function(event)
		{


		});	
	};//end bind()
	
	//place(): this method places the marker on the map 
	this.place = function()
	{
				
		this.options= {
			draggable:false,
			map: this.map,
			position: this.coords
		};
		
		this.marker = new google.maps.Marker(this.options);
		
		//Bind action listeners
		this.bind();
		
		//If the icon is not set, default to green. Otherwise, use the selected
		if(this.icon==null){
			this.marker.setIcon(this.icons.green);	
		}else{
			this.marker.setIcon(this.icon);
		}
	
	};//end place()
}