<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script src="jquery.flot.min.js"></script>
<script src="jquery.flot.resize.min.js"></script>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
<meta name = "viewport" content = "initial-scale = 1.0, user-scalable = no">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">



<style>

body {
    margin: 0;
    padding: 0;
font-family: 'Open Sans', sans-serif;
font-weight: 300;
    text-transform: uppercase;
 background-color: #F17370;
 color: #ffffff;
 -webkit-font-smoothing: antialiased;
   text-align: center;
}


.graph-container,
.graph-container div,
.graph-container a,
.graph-container span {
    margin: 0;
    padding: 0;
}

#graph-wrapper {
    position: absolute;
   bottom: 0px;
   right: 0;
   left:0 ;
   z-index: 2;
   overflow: hidden;


}

.graph-container, #tooltip, .graph-info a {
    
}

/* Graph Container */
.graph-container {
    height: 150px;
    margin-top: 13px;
   
}
 
.graph-container > div {
    position: absolute;
    width: 100%;
    height: 100%;
    padding: 0;
    margin: 0;
    cursor: pointer;


}


/* Color Circles */
.graph-info a:before {
    position: absolute;
    display: block;
    content: '';
    width: 5px;
    height: 5px;
    top: 13px;
    left: 13px;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
       cursor: pointer;
      color: red;
}
 


/* Clear Floats */
.graph-info:before, .graph-info:after,
.graph-container:before, .graph-container:after {
    content: '';
    display: block;
    clear: both;
}

#tooltip, .graph-info a {


    font-size: 12px;
    line-height: 20px;
     cursor: pointer;

}
 
.tickLabel {
    font-weight: bold;
    font-size: 12px;
    color: #666;

}

.yAxis .tickLabel:first-child,
.yAxis .tickLabel:last-child { display: none; } 

#tooltip {
    position: absolute;
    display: none;
    padding: 5px 10px;
    color: #ffffff;
    border-radius: 3px;
    background: #62BDD9;
    z-index: 3;
}

.inner {
    padding-top: 60px;
}

h1 , h2, h3{
    font-weight: 200;
    letter-spacing: 2px;
    font-family: 'Open Sans', sans-serif;
}

</style>
</head>
<body>
<div id="overlay"></div>
<div class="inner">
<h3>doncaster, uk</h3>
<h1>8&deg;c</h1>
<h3>15 - JAN - 2014</h3>

<!-- <p>whoooo <span class="temp">2</span> &deg;c <div classwarmer than <div class="year"></div></p> -->
<div id="graph-wrapper">
    
 
    <div class="graph-container">
        <div id="graph-lines"></div>
    </div>
</div>
</div>
<script>
var graphData = [{
        // Visits
        data: [ [2008, 0],[2009, 4] ,[2010, 8],[2011, 7],[2012, 5], [2013, 6],[2014, 0] ],
        color: 'rgba(255,255,255,0.2)'
    }
];

$.plot($('#graph-lines'), graphData, {
    series: {
        points: {
            show: true,
            radius: 6
        },
        lines: {
            show: true,
            lineWidth: 2,
            fill: 0.05
        },
        shadowSize: 0
    },
    grid: {
        color: 'red',
        borderColor: 'transparent',
        hoverable: true
    },
    xaxis: {
        tickColor: 'transparent',
        tickDecimals: 0,
        show: false
    },
    yaxis: {
        tickSize: 0,
        show: false
    }
});

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
                // showTooltip(item.pageX, item.pageY, x + ' - '+ y + ' &deg;c');
                 $('.inner h3').eq(1).text('15 - JAN - ' + x)   
                $('.inner h1').html(y+ ' &deg;c')  
                $('.inner h1').html(y+ ' &deg;c')  
        }

    } else {
        $('#tooltip').remove();
        $('.inner h3').eq(1).text('15 - JAN - 2014') 
        $('.inner h1').html('8.5 &deg;c')   
        previousPoint = null;
    }
});
</script>
</body>
</html>
