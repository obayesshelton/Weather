<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0025)http://local.weather.com/ -->
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Weather App</title>
		
		<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7">

		<!-- iOS -->
		<link rel="apple-touch-icon-precomposed" href="http://local.weather.com/images/icon.png">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="http://local.weather.com/images/icon-ipad.png">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="http://local.weather.com/images/icon-retina-iphone.png"> 
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="http://local.weather.com/images/icon-retina-ipad.png"> 

		<link href="http://local.weather.com/images/splash.png" media="(device-width: 320px)" rel="apple-touch-startup-image">
		<link href="http://local.weather.com/images/splash-retina.png" media="(device-width: 320px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image">
		<link href="http://local.weather.com/images/splash-iphone5.png" media="(device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image">
		<link href="http://local.weather.com/images/splash-ipad.png" media="(device-width: 768px) and (orientation: portrait)" rel="apple-touch-startup-image">
		<link href="http://local.weather.com/images/apple-touch-startup-image-ipad-landscape.png" media="(device-width: 768px) and (orientation: landscape)" rel="apple-touch-startup-image">
		<link href="http://local.weather.com/images/apple-touch-startup-image-ipad-portrait-retina.png" media="(device-width: 1536px) and (orientation: portrait) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image">
		<link href="http://local.weather.com/images/apple-touch-startup-image-ipad-landscape-retina.png" media="(device-width: 1536px)  and (orientation: landscape) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image">

		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="transparent">
		<meta name="viewport" content="initial-scale = 1.0, user-scalable = no">

		<!--Stylesheets-->

		<link type="text/css" rel="stylesheet" href="./Weather App_files/core.css">
		<link type="text/css" rel="stylesheet" href="./Weather App_files/fonts.css">

		<!--Scripts-->  

		<script type="text/javascript" language="JavaScript" src="./Weather App_files/jquery-1.7.2.min.js" style=""></script>
		<script type="text/javascript" language="JavaScript" src="./Weather App_files/core.js"></script>
		<script type="text/javascript" language="JavaScript" src="./Weather App_files/swipe.min.js"></script>
		<script type="text/javascript" src="./Weather App_files/js">
      	</script><script src="./Weather App_files/main.js" type="text/javascript"></script>

	<script type="text/javascript" charset="UTF-8" src="./Weather App_files/{common,util,stats}.js"></script><script type="text/javascript" charset="UTF-8" src="./Weather App_files/AuthenticationService.Authenticate"></script></head>

	<body>
		<div id="today_weather_wrapper">
			<div id="today_weather" class="inner" onclick="more_info()">
				<div class="users_weather">
					<div id="users_weather_icon">R</div>
					<div id="users_temperature" class="">8.5 ℃</div>
					<div class="clear"></div>
				</div>
				<div id="users_location">Doncaster</div>
				<div id="todays_date">15 - 01 - 2014</div>
				<div id="more_info">
					<div class="content">
						<div class="stat conds middle">Calm </div>
						<div class="stat wind left">0 mph</div>

						<div class="stat prec right">0.16 in (4 mm)</div>
						<div class="clear"></div>
					</div>
				</div>
			
			</div>
		</div>
		<div id="previous_weather" class="fadeIn">
			<div class="inner">
				<ul>
                    					    <li><div class="w_year left bold">2005-01-15</div><div class="w_icon_small">A</div><div class="w_diff right">6 ℃</div><div class="clear"></div></li>
                    					    <li><div class="w_year left bold">2006-01-15</div><div class="w_icon_small">A</div><div class="w_diff right">5 ℃</div><div class="clear"></div></li>
                    					    <li><div class="w_year left bold">2007-01-15</div><div class="w_icon_small">A</div><div class="w_diff right">7 ℃</div><div class="clear"></div></li>
                    					    <li><div class="w_year left bold">2008-01-15</div><div class="w_icon_small">A</div><div class="w_diff right">8 ℃</div><div class="clear"></div></li>
                    					    <li><div class="w_year left bold">2009-01-15</div><div class="w_icon_small">A</div><div class="w_diff right">4 ℃</div><div class="clear"></div></li>
                    					    <li><div class="w_year left bold">2010-01-15</div><div class="w_icon_small">A</div><div class="w_diff right">2 ℃</div><div class="clear"></div></li>
                    					    <li><div class="w_year left bold">2011-01-15</div><div class="w_icon_small">A</div><div class="w_diff right">10 ℃</div><div class="clear"></div></li>
                    					    <li><div class="w_year left bold">2012-01-15</div><div class="w_icon_small">A</div><div class="w_diff right">0 ℃</div><div class="clear"></div></li>
                    					    <li><div class="w_year left bold">2013-01-15</div><div class="w_icon_small">A</div><div class="w_diff right">0 ℃</div><div class="clear"></div></li>
                    					    <li><div class="w_year left bold">2014-01-15</div><div class="w_icon_small">A</div><div class="w_diff right">8 ℃</div><div class="clear"></div></li>
                    				</ul>
			</div>
			</div>
	

</body></html>