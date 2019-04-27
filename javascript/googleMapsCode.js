var map, infoWindow;
var originLatitude = 0, originLongitute = 0, destinationLatitude = 0, destinationLongitute = 0;

function initMap() {

    document.getElementById("useCurrentLocation").checked = true;
    
    var options = {
        center: {lat: 37.791350, lng: -122.435883},
        zoom: 14,
        scrollwheel: false,
    };
    
    map = new google.maps.Map(document.getElementById('map'), options);
    infoWindow = new google.maps.InfoWindow;
    
    var m;
    
    navigator.geolocation.getCurrentPosition(function (p) {
            
        var position = { lat: p.coords.latitude, lng: p.coords.longitude};
        
        originLatitude = p.coords.latitude
                                             
		originLatitude = p.coords.latitude;
		originLongitute = p.coords.longitude;
		
		destinationLatitude = 0, destinationLongitute = 0;
		
        infoWindow.setPosition(position);
        infoWindow.setContent('Your location!');
        infoWindow.open(map);
        map.setCenter(position);
        
    });
    
    var destinationInput = document.getElementById('destination');
    var destinationSearchBox = new google.maps.places.SearchBox(destinationInput);
    
    var originInput = document.getElementById('origin');
    var originSearchBox = new google.maps.places.SearchBox(originInput);
    
    map.addListener('bounds_changed', function() {
        destinationSearchBox.setBounds(map.getBounds());
        originSearchBox.setBounds(map.getBounds());
    });

    var markers = [];
    
    originSearchBox.addListener("places_changed", function(){
        
        document.getElementById("useCurrentLocation").checked = false;
        
        var places = originSearchBox.getPlaces();
        
        if(places.length == 0)
            return;
            
        var bounds = new google.maps.LatLngBounds();
        
        var p = places[0]
        
        if(!p.geometry)
                return;
                
        markers.push(new google.maps.Marker({
            map: map,
            title: p.name,
            position: p.geometry.location
        }));
        
        if(p.geometry.viewport)
            bounds.union(p.geometry.viewport);
        else
            bounds.extend(p.geometry.location);
        
        
        map.fitBounds(bounds);
    });
    
    destinationSearchBox.addListener("places_changed", function(){
        var places = destinationSearchBox.getPlaces();
        
        if(places.length == 0)
            return;
            
        markers.forEach(function(m){ m.setMap(null) }); 
        markers = [];
        
        var bounds = new google.maps.LatLngBounds();
        
        var p = places[0]
        
        if(!p.geometry)
                return;
                
        markers.push(new google.maps.Marker({
            map: map,
            title: p.name,
            position: p.geometry.location
        }));
        
        if(p.geometry.viewport)
            bounds.union(p.geometry.viewport);
        else
            bounds.extend(p.geometry.location);
        
        
        map.fitBounds(bounds);
     });
     
     var directionsDisplay = new google.maps.DirectionsRenderer();
     var directionsService = new google.maps.DirectionsService();
}

function useCurrentLocationClicked(){
    if(document.getElementById("useCurrentLocation").checked){
        document.getElementById("origin").value = "";
    }
}
