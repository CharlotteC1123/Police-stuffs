//set the center of the map
var mapCenter = new google.maps.LatLng(51.8642, -2.2382);
var geocoder = new google.maps.Geocoder();

function initialize() {
    //sets the center and zoom of the display
    var mapOptions = {
        zoom: 15,
        center: mapCenter
    };
    myMap = new google.maps.Map(document.getElementById("mapInput"), mapOptions);
    //create the marker 
    marker = new google.maps.Marker({
        map: myMap,
        //set it on the map
        position: mapCenter,
        //make it moveable
        draggable: true,
    });
}
//load the map to the page
google.maps.event.addDomListener(window, 'load', initialize);