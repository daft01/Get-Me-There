var map, infoWindow;

var originLatLng, destinationLatLng;
var originName, dastinationName;

var originValid = false, destinationValid = false;

var directionsDisplay = new google.maps.DirectionsRenderer();
var directionsService = new google.maps.DirectionsService();

var destinationInput = document.getElementById('destination');
var destinationSearchBox = new google.maps.places.SearchBox(destinationInput);

var originInput = document.getElementById('origin');
var originSearchBox = new google.maps.places.SearchBox(originInput);

var markers = [];

var options = { 
    center: {lat: 37.791350, lng: -122.435883},
    zoom: 14,
    scrollwheel: false,
};

map = new google.maps.Map(document.getElementById('map'), options);
infoWindow = new google.maps.InfoWindow;
    
navigator.geolocation.getCurrentPosition(function (p) {

    originLatLng = { lat: p.coords.latitude, lng: p.coords.longitude};

    orginValid = true;
    infoWindow.setPosition(originLatLng);
    infoWindow.open(map);
    map.setCenter(originLatLng);
});
    
map.addListener('bounds_changed', function() {
    destinationSearchBox.setBounds(map.getBounds());
    originSearchBox.setBounds(map.getBounds());
});
    
originSearchBox.addListener("places_changed", function(){

    var places = originSearchBox.getPlaces();

    if(places.length == 0){
        originValid = true;
        return;
    }

    var bounds = new google.maps.LatLngBounds();

    var p = places[0]

    if(!p.geometry){
            originValid = false;
            return;
    }else{
        originValid = true;
    }

    originName = p.formatted_address;
    
    originLatLng = {lat: p.geometry.location.lat(), lng: p.geometry.location.lng()};

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
    checkRoute();
});
    
destinationSearchBox.addListener("places_changed", function(){
    var places = destinationSearchBox.getPlaces();

    if(places.length == 0){
        destinationValid = false;
        return;
    }

    markers.forEach(function(m){ m.setMap(null) }); 
    markers = [];

    var bounds = new google.maps.LatLngBounds();

    var p = places[0]

     if(!p.geometry){
        destinationValid = false;
        return;
     }else{
        destinationValid = true;
     }

    destinationName = p.formatted_address;

    destinationLatLng = {lat: p.geometry.location.lat(), lng: p.geometry.location.lng()};

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
    
    checkRoute();
});

function checkRoute(){
    
    console.log(destinationValid);

    if( !originValid || !destinationValid)
        return;

    map = new google.maps.Map(document.getElementById('map'), options);
    directionsDisplay.setMap(map);
    
    document.getElementById("DRIVING").innerHTML = "";
    document.getElementById("WALKING").innerHTML = "";
    document.getElementById("BICYCLING").innerHTML = "";
    document.getElementById("TRANSIT").innerHTML = "";
    
    tM = ['WALKING', 'DRIVING', 'BICYCLING', 'TRANSIT'];
    
    for(var i=0; i<tM.length; i++){
        setOption( tM[i] );
    }
    
    setRoutes('WALKING');
}

function optionClicked(option){
    setRoutes(option);
}

function setOption( option ){
    
    var request = {
        origin: originLatLng,
        destination: destinationLatLng,
        travelMode: option
    }
    
    directionsService.route(request, function(result, status){
        
        if(status == "OK"){
            
            var info = result["routes"][0]["legs"][0];

            console.log(info);
            
            var title = document.createElement('div');
            title.setAttribute("class", "optionTitle");
            title.innerHTML = option;
            document.getElementById(option).appendChild(title);
            
            var duration = document.createElement('div');
            duration.setAttribute("class", "optionDuration");
            duration.innerHTML = info["duration"]["text"];
            document.getElementById(option).appendChild(duration);
            
            var distance = document.createElement('div');
            distance.setAttribute("class", "optionDistance");
            distance.innerHTML = info["distance"]["text"]
            document.getElementById(option).appendChild(distance);
            
            var routeMap = document.createElement('div');
            routeMap.setAttribute("class", "routeMap");
            routeMap.innerHTML = "Map";
            document.getElementById(option).appendChild(routeMap);
        }
        else{
            console.log(option + " is fucked up");
        }
    });
}

function setRoutes(route){
    
    var request = {
        origin: originLatLng,
        destination: destinationLatLng,
        travelMode: route
    }
    
     directionsService.route(request, function(result, status){
         if(status == "OK"){
             directionsDisplay.setDirections(result);
         }
     });
}

function addTripClicked(){
    
    console.log("button clicked");
    
    if( !originValid || !destinationValid)
        alert("Locations not valid");
    
    var trip = document.createElement('div');
    trip.setAttribute("class", "trip");
    trip.setAttribute("onclick", "tripClicked(this.id)");
    trip.innerHTML = "<div class='tripLocation'> From: " + originName + "</div>" + 
                     "<div class='tripLocation'> To: " + destinationName + "</div>";
    
    document.getElementById("trips").appendChild(trip);
}
