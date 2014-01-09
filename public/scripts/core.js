var more = true;

function portrait() {

var window_height = $(window).outerHeight()
var topper_height = $('#today_weather').outerHeight()
var work_with = window_height - topper_height
var li_height = ((work_with / 5) / 2) - 8
	$('ul li').css({paddingTop: li_height, paddingBottom: li_height})
}

function landscape() {

var window_height = $(window).outerHeight()
var work_with = window_height
var li_height = ((work_with / 5) / 2) - 11
	$('ul li').css({paddingTop: li_height, paddingBottom: li_height})
   

}

function tester() {
	if ($(window).outerWidth() <= 321) {
	portrait()
}

if ($(window).outerWidth() >= 322 && $(window).outerWidth() <= 568) {
	landscape()
}
}

function getWeather() {
	if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
        $.getJSON('http://ws.geonames.org/findNearByWeatherJSON?', {
            lat: position.coords.latitude,
            lng: position.coords.longitude
        }, function(result) {
            $('#users_temperature').html(result.weatherObservation.temperature + '&#8451;').addClass('fadeIn');
             $('#users_weather_icon').text('R').addClass('fadeIn');

        });
    });
}
}

function getLocation() {

    
//I'm not doing anything else, so just leave
    if(!navigator.geolocation) return;
    
    navigator.geolocation.getCurrentPosition(function(pos) {
        geocoder = new google.maps.Geocoder();
        var latlng = new google.maps.LatLng(pos.coords.latitude,pos.coords.longitude);
        geocoder.geocode({'latLng': latlng}, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                //Check result 0
                var result = results[0];
                //look for locality tag and administrative_area_level_1
                var city = "";
                var state = "";
                for(var i=0, len=result.address_components.length; i<len; i++) {
                    var ac = result.address_components[i];
                    if(ac.types.indexOf("locality") >= 0) city = ac.long_name;
                    if(ac.types.indexOf("administrative_area_level_1") >= 0) state = ac.long_name;
                }
                //only report if we got Good Stuff
                if(city != '' && state != '') {
                    $("#users_location").html(city+", "+state+"!");
                }
            } 
        });
    
    });

}

function more_info() {
    $('#more_info').animate({height: more ? '63px' : '0px'}, function() {
        $('.content').show().toggleClass('fadeInFast').css({opacity: more ? '0' : '1', display: more ? 'none' : 'block'})
    })
    more = !more
}





function get_date() {
	
	var date = Date.parse('today');
	
	$('#todays_date').text(date.toString('dddd, d MMMM, yyyy'));

}


 $(document).ready(function() { 


get_date();
tester(); 
getLocation();


 });

window.onresize = function(event) {

tester()

}

