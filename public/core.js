	var hello = []	
	var tempHigh = 0
	var tempLow = 100
		$.getJSON("weather.json", function(data) {
       		weatherData = data;
       		for (var i = 1; i < weatherData.history.observations.length; i++) {
        		var temp = weatherData.history.observations[i].tempi;
        		var hour = weatherData.history.observations[i].date.hour;

        		highTemp(temp)
        		lowTemp(temp)
    			var test = []
       				test.push(hour , temp)
       				hello.push(test)
       				
   			 }
   			 graphData.push({'data':hello})
   			 $.plot($('#graph-lines'), graphData, {
    series: {
        points: {
            show: false,
            radius: 1,
            color: '#ffffff'
        },
        lines: {
            show: true,
            lineWidth: 3,
            fill: 0.1,
        },
        shadowSize: 0,
        color: 'rgba(255,255,255,0.8)'
    },
    grid: {
        color: 'red',
        borderColor: 'transparent',
        hoverable: true
    },
    xaxis: {
        tickColor: '#ffffff',
        tickDecimals: 0,
        show: true,
        tickLength:0,
        ticks: [ [3,'3 am'],[6, '6 am'], [9,'9 am'], [12,'12 pm'],[15, '3pm'], [18,'6pm'], [21,'9 pm']]

    },
    yaxis: {
        tickSize: 0,
        show: false
    }

});
$('.temp-high').html(tempHigh + '&deg;')
$('.temp-low').html(tempLow + '&deg;f')


function showTooltip(x, y, contents) {
    $('<div id="tooltip">' + contents + '</div>').css({
        top: y - 16,
        left: x + 20
    }).appendTo('body').fadeIn();
}
 
var previousPoint = null;
 
$('#graph-lines, #graph-bars').bind('plothover', function (event, pos, item) {
    if (item) {
        if (previousPoint != item.dataIndex) {
            previousPoint = item.dataIndex;
            $('#tooltip').remove();
            var x = item.datapoint[0],
                y = item.datapoint[1];
                showTooltip(item.pageX, item.pageY,  y + ' &deg;F');
        }

    } else {
        $('#tooltip').remove();
        previousPoint = null;
    }
});
		});


var graphData = [];







function highTemp(temp) {
	if (temp >= tempHigh) {
		tempHigh = temp
	} 
}


function lowTemp(temp) {
	if (temp <= tempLow) {
		tempLow = temp
	} 
}




$(document).ready(function() {
	
});
