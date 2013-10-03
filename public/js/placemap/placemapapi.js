
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

	//places.delete(): add place to db
	this.delete = function(id){
		if(window.dbgMethodCalls)
			console.log("api.places.delete()");

		$.ajax({
			type: 'post',
			url: window.site_url + "api/places/delete",
			data:{"placeid":id},
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

	//places.getById(): returns the place data depending on the id 
	this.getById = function(id){
		if(window.dbgMethodCalls)
			console.log("api.places.getById(" + id + ")");

		var returndata;
		$.ajax({
			type: 'post',
			url: window.site_url + "api/places/getById",
			data:{"placeid":id},
			async:false,
			complete: function(data){

				returndata= jQuery.parseJSON(data.responseText);
				//console.log(returndata);
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
			async: false,
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

function audit(){

	//list(): lists available audits
	this.list = function(){
		if(window.dbgMethodCalls)
			console.log("api.audit.list()");

		var returndata;
		$.ajax({
			type: 'post',
			url: window.site_url + "api/audit/listaudits",
			async:false,
			complete: function(data){
				returndata= jQuery.parseJSON(data.responseText);
			}
		});	
		return returndata			
	}

	//audit->add(): Adds the specified audit information to the db.
	//Params: 
	//==name: This is the name of the audit
	//==desc: This is the description for the audit
	this.add = function(data){
		if(window.dbgMethodCalls)
			console.log("api.audit.add()");

		$.ajax({
			type: 'post',
			url: window.site_url + "api/audit/add",
			data:data,
			async:false,
			success: function(data){
				//console.log(data);
				if(data==1)
					return 1;
			}
		});			
	}//end add audit.add

	//audit->getResponseByMarkerid
	this.getResponseByMarkerid = function(data){
		if(window.dbgMethodCalls)
			console.log("api.audit.getResponsesByMarkerid()");

		var returndata;
		
		$.ajax({
			type: 'post',
			url: window.site_url + "api/audit/getResponseByMarkerid",
			data:data,
			async:false,
			complete: function(data){
				returndata= jQuery.parseJSON(data.responseText);
			}
		});		

		return returndata;	
	}

}//end audit class

function PlacemapApi(){
	if(window.dbgMethodCalls)
		console.log("API constructed");
	this.places = new places();
	this.markers = new markers();
	this.audit = new audit();
}
