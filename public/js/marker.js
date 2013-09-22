//PlaceMarker: This is the marker object that is added to the screen when the user clicks 'add marker'. Additionally, it also serves to load the archived markers for a specific map
function PlaceMarker(map,coords){
	
	var instance = this;
	this.markerId;
	this.coords=coords;
	this.map=map;
	this.marker;
	this.options;
	this.icon; //The icon that is used
	this.icons = {
			green_google: 'http://maps.google.com/mapfiles/ms/icons/green-dot.png',
			blue_google: 'http://maps.google.com/mapfiles/ms/icons/blue-dot.png',
			green: base_url+ 'public/images/marker_green.png',
			yellow_green: base_url+ 'public/images/marker_yellow-green.png',
			yellow_red: base_url+ 'public/images/marker_yellow-red.png',
			red: base_url + 'public/images/marker_red.png'
	};
	
	//setCoords(): Set coords 
	this.setCoords = function(coords)
	{
		this.coords = coords;
	}
	
	//setIcon(): Sets the icon
	this.setIcon = function(icon)
	{
		this.icon=icon;
	}
	
	this.setMarkerId = function(id)
	{
		this.markerId = id;
	}
	
	//bind(): Initiate action listeners
	this.bind = function(){
		
		//Click():
		google.maps.event.addListener(this.marker, 'click', function(event)
		{
			

		});
		
		//dblClick():
		google.maps.event.addListener(this.marker, 'dblclick', function(event)
		{
			
		});	
		
		
		
	}
	
	//place(): this method places the marker on the map 
	this.place = function()
	{
				
		this.options= {
			draggable:false,
			map: placemap.map,
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
	
	};
	
}
