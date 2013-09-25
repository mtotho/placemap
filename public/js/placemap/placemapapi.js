
function places(){

	//places.add(): add place to db
	this.add = function(data){
		if(window.dbgMethodCalls)
			console.log("api.places.add()");

		$.ajax({
			type: 'post',
			url: window.site_url + "api/places/add",
			data:data,
			success: function(data){
				//console.log(data);
				if(data==1)
					return 1;
			}
		});	
	}//end add function

	//places.list(): list places from db 
	this.list = function(){
		if(window.dbgMethodCalls)
			console.log("api.places.list()");

		var returndata;
		$.ajax({
			type: 'post',
			url: window.site_url + "api/places/listplaces",
			async:false,
			complete: function(data){
				returndata= jQuery.parseJSON(data.responseText);
			}
		});	
		return returndata	
	}//end list function

}//end class places

function markers(){

	//add(): add marker to db
	this.add = function(data){
		if(window.dbgMethodCalls)
			console.log("api.markers.add()");

		$.ajax({
			type: 'post',
			url: window.site_url + "api/markers/add",
			data:data,
			success: function(data){
				//console.log(data);
				if(data==1)
					return 1;
			}
		});	
	}//end add()

	//places.list(): list places from db 
	this.load = function(placeid){
		if(window.dbgMethodCalls)
			console.log("api.markers.load(" + placeid+ ")");

		var returndata;
		$.ajax({
			type: 'post',
			url: window.site_url + "api/markers/load",
			data:{"placeid":placeid},
			async:false,
			complete: function(data){
				//console.log(data.responseText);
				returndata= jQuery.parseJSON(data.responseText);
			}
		});	
		return returndata	
	}//end list function	
}//end markers class

function PlacemapApi(){
	if(window.dbgMethodCalls)
		console.log("API constructed");
	this.places = new places();
	this.markers = new markers();
}
