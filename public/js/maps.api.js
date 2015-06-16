var directionsDisplay;
var directionsService = new google.maps.DirectionsService();
var requestPosition; //this is called to setInterval and clearInterval
var recallNavCoordsInterval = 5000; //miliseconds
var posCollection = new Array(); //the positions collection array
var progress_marker; //will be deleted when prayer is over

//start prayer
$('#prayer_control').on('click', function(){
	
	if(!$(this).hasClass('praying')){
		//starts prayer and starts setInterval
		startPrayer();
		//add loading class
		$(this).addClass('praying');
		$(this).html('Stop praying');
	}
	else{
		//stops prayer
		clearInterval(requestPosition);
		//build the end marker
		
		var end = posCollection[(posCollection.length-1)];
		var end_splitted = end.split(",");
		var end_lat = parseFloat(end_splitted[0]);
		var end_lng = parseFloat(end_splitted[1]);
		
		var end_marker = new google.maps.Marker({
			position: new google.maps.LatLng(end_lat, end_lng),
			map: map,
			icon: 'http://maps.google.com/mapfiles/ms/icons/green-dot.png'
		});
		
		$(this).html('Prayer ended');
		$(this).addClass('gray-btn');
		$(this).removeClass('red-btn');
	}
	
})


//for initializing the map where user is located
if(navigator.geolocation) {
	navigator.geolocation.getCurrentPosition(function(position) {
      var pos = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
      map.setCenter(pos);
      map.setZoom(16);
      
      var infowindow = new google.maps.InfoWindow({
        map: map,
        position: pos,
        content: 'You are here! <br />Begin your prayer by pressing Start button'
      });
      
	})
}

var options = {
	zoom: 14,
	center: new google.maps.LatLng(46.768714, 23.584894),
	mapTypeControl: false,
	navigationControlOptions: {
		style: google.maps.NavigationControlStyle.SMALL
	},
	mapTypeId: google.maps.MapTypeId.ROAD,
	disableDefaultUI: true
};

var map = new google.maps.Map(document.getElementById("map-canvas"), options);



function calcRoute(start_coords, end_coords) {
var request = {
    origin:start_coords, 
    destination:end_coords,
    travelMode: google.maps.TravelMode.WALKING
};

    directionsService.route(request, function(response, status) 
	{
        if (status == google.maps.DirectionsStatus.OK)
        {
            console.log(response.routes[0]);
            
            var steps = response.routes[0].legs[0].steps;
            
            for(var step = 0; step < steps.length; step++)
            {
                polylineOptions = {
                        map: map,
                        strokeColor: "#FF0000",
                        strokeOpacity: 0.7, 
                        strokeWeight: 4,
                        path: steps[step].path
                }
            police = new google.maps.Polyline(polylineOptions);
            police.setMap(map);
            }
            
        }
        
    });

}


function registerPos(position){
	
	
	//Get the last position of the array
	var posCollectionLength = posCollection.length;

	//firstly add the start point and first position in the collection
	if(posCollectionLength == 0){
	posCollection.push(position.coords.latitude+', '+ position.coords.longitude);
	
	//build the START marker
	var start_marker = new google.maps.Marker({
		position: new google.maps.LatLng(position.coords.latitude, position.coords.longitude),
		map: map,
		title: 'Start',
		icon: 'http://maps.google.com/mapfiles/ms/icons/red-dot.png'
	});
	
	}

	//alert('you are here: '+position.coords.latitude+', '+ position.coords.longitude)
	
	//if last position of the collection is the same (IF USER DOESN'T MOVE)
	if(posCollection[(posCollectionLength-1)] == position.coords.latitude+', '+ position.coords.longitude){
		//then user is camping, do not add to collection	
		console.log('the user is camping')		
	}
	else{ 
		
		//else add the new position to the collection
		posCollection.push(position.coords.latitude+', '+ position.coords.longitude);
		
		posCollectionLength = posCollection.length; //update var before check it's real length
		
		if(posCollectionLength > 2){ //if we have at least two positions to draw between
		//starting point coords
		var start = posCollection[(posCollectionLength-2)];
		var start_splitted = start.split(",");
		var start_lat = parseFloat(start_splitted[0]);
		var start_lng = parseFloat(start_splitted[1]);
		
		//ending point coords
		var end = posCollection[(posCollectionLength-1)];
		var end_splitted = end.split(",");
		var end_lat = parseFloat(end_splitted[0]);
		var end_lng = parseFloat(end_splitted[1]);
		
		//draw the route from last two positions
		calcRoute(new google.maps.LatLng(start_lat,start_lng), new google.maps.LatLng(end_lat,end_lng));
		//recenter the map
		map.setCenter(new google.maps.LatLng(end_lat,end_lng));
		//build the RECENT_PROGRESS MARKER
		
		//check if marker already exists, just update the coords of it.
		if(progress_marker !== undefined){
			//alert('it says marker exists');
			progress_marker.setPosition(new google.maps.LatLng(end_lat, end_lng));
		}
		else{ //create the marker
			progress_marker = new google.maps.Marker({
				position: new google.maps.LatLng(end_lat, end_lng),
				map: map,
				icon: 'http://maps.google.com/mapfiles/ms/icons/yellow-dot.png'
			});
		}
		
		}
	}
		
	
}

function startPrayer(){
	requestPosition = window.setInterval(function(){
		if (navigator.geolocation) {
			navigator.geolocation.getCurrentPosition(registerPos);
		} else {
			alert('Geo Location is not supported. To use the application, you must enable Geo Location');
		}
	}, recallNavCoordsInterval);
}


