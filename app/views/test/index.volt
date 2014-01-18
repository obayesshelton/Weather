!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Weather App</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />

		<!-- iOS -->
		<link rel="apple-touch-icon-precomposed" href="images/icon.png" />
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/icon-ipad.png" />
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/icon-retina-iphone.png" /> 
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/icon-retina-ipad.png" /> 

		<link href="images/splash.png" media="(device-width: 320px)" rel="apple-touch-startup-image">
		<link href="images/splash-retina.png" media="(device-width: 320px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image">
		<link href="images/splash-iphone5.png" media="(device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image">
		<link href="images/splash-ipad.png" media="(device-width: 768px) and (orientation: portrait)" rel="apple-touch-startup-image">
		<link href="images/apple-touch-startup-image-ipad-landscape.png" media="(device-width: 768px) and (orientation: landscape)" rel="apple-touch-startup-image">
		<link href="images/apple-touch-startup-image-ipad-portrait-retina.png" media="(device-width: 1536px) and (orientation: portrait) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image">
		<link href="images/apple-touch-startup-image-ipad-landscape-retina.png" media="(device-width: 1536px)  and (orientation: landscape) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image">

		<meta name="apple-mobile-web-app-capable" content="yes" />
		<meta name="apple-mobile-web-app-status-bar-style" content="transparent" />
		<meta name = "viewport" content = "initial-scale = 1.0, user-scalable = no">

		<!--Stylesheets-->

		<link type="text/css" rel="stylesheet" href="css/core.css"  />
		<link type="text/css" rel="stylesheet" href="css/fonts.css"  />

		<!--Scripts-->  

		<script type="text/javascript" language="JavaScript" src="scripts/jquery-1.7.2.min.js"></script>
		<script type="text/javascript" language="JavaScript" src="scripts/core.js"></script>
		<script type="text/javascript" language="JavaScript" src="scripts/swipe.min.js"></script>
		<script type="text/javascript"
			src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC5_D4F4ozwIn1SO8taPKS8PGs02unAg2k&sensor=true">
      	</script>

	</head>

	<body>
		<div id="today_weather_wrapper">
			<div id="today_weather" class="inner"  onclick="more_info()">
				<div class="users_weather">
					<div id="users_weather_icon">R</div>
					<div id="users_temperature" class="">{{ today.current_observation.temp_c }} &#8451;</div>
					<div class="clear"></div>
				</div>
				<div id="users_location">{{ today.current_observation.display_location.city }}</div>
				<div id="todays_date">{{ date }}</div>
				<div id="more_info">
					<div class="content">
						<div class="stat conds middle">{{ today.current_observation.wind_string }} </div>
						<div class="stat wind left">{{ today.current_observation.wind_mph }} mph</div>

						<div class="stat prec right">{{ today.current_observation.precip_today_string }}</div>
						<div class="clear"></div>
					</div>
				</div>
			
			</div>
		</div>
		<div id="previous_weather" class="fadeIn">
			<div class="inner">
				<ul>
                    {% for history in historic %}
					    <li><div class="w_year left bold">{{ history.date }}</div><div class="w_icon_small">A</div><div class="w_diff right">{{ history.temp }} &#8451;</div><div class="clear"></div></li>
                    {% endfor %}
				</ul>
			</div>
			</div>
	</body>
</html>
