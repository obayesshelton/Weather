<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
					<div id="users_temperature">3&#8451;</div>
					<div class="clear"></div>
				</div>
				<div id="users_location">London</div>
				<div id="todays_date"><?php echo $date; ?></div>
				<div id="more_info">
					<div class="content">
						<div class="stat conds middle">Mostly Cloudy</div>
						<div class="stat wind left">26 km/h</div>
						
						<div class="stat prec right">5%</div>
						<div class="clear"></div>
					</div>
				</div>
			
			</div>
		</div>
		<div id="previous_weather" class="fadeIn">
			<div class="inner">
				<ul>
					<li><div class="w_year left bold">2012</div><div class="w_icon_small">A</div><div class="w_diff right">+ 2 &#8451;</div><div class="clear"></div></li>
					<li><div class="w_year left bold">2011</div><div class="w_icon_small">B</div><div class="w_diff right">- 5 &#8451;</div><div class="clear"></div></li>
					<li><div class="w_year left bold">2010</div><div class="w_icon_small">C</div><div class="w_diff right">+ 8 &#8451;</div><div class="clear"></div></li>
					<li><div class="w_year left bold">2009</div><div class="w_icon_small">D</div><div class="w_diff right">+ 12 &#8451;</div><div class="clear"></div></li>
					<li><div class="w_year left bold">2008</div><div class="w_icon_small">E</div><div class="w_diff right">- 10 &#8451;</div><div class="clear"></div></li>
					<li><div class="w_year left bold">2007</div><div class="w_icon_small">F</div><div class="w_diff right">+ 2 &#8451;</div><div class="clear"></div></li>
					<li><div class="w_year left bold">2006</div><div class="w_icon_small">G</div><div class="w_diff right">- 5 &#8451;</div><div class="clear"></div></li>
					<li><div class="w_year left bold">2005</div><div class="w_icon_small">H</div><div class="w_diff right">+ 8 &#8451;</div><div class="clear"></div></li>
					<li><div class="w_year left bold">2004</div><div class="w_icon_small">I</div><div class="w_diff right">+ 12 &#8451;</div><div class="clear"></div></li>
					<li><div class="w_year left bold">2003</div><div class="w_icon_small">J</div><div class="w_diff right">- 10 &#8451;</div><div class="clear"></div></li>
					<li><div class="w_year left bold">2002</div><div class="w_icon_small">K</div><div class="w_diff right">+ 2 &#8451;</div><div class="clear"></div></li>
					<li><div class="w_year left bold">2001</div><div class="w_icon_small">L</div><div class="w_diff right">- 5 &#8451;</div><div class="clear"></div></li>
					<li><div class="w_year left bold">2000</div><div class="w_icon_small">M</div><div class="w_diff right">+ 8 &#8451;</div><div class="clear"></div></li>
					<li><div class="w_year left bold">1999</div><div class="w_icon_small">N</div><div class="w_diff right">+ 12 &#8451;</div><div class="clear"></div></li>
					<li><div class="w_year left bold">1998</div><div class="w_icon_small">O</div><div class="w_diff right">- 10 &#8451;</div><div class="clear"></div></li>
					<li><div class="w_year left bold">1997</div><div class="w_icon_small">P</div><div class="w_diff right">+ 2 &#8451;</div><div class="clear"></div></li>
					<li><div class="w_year left bold">1996</div><div class="w_icon_small">Q</div><div class="w_diff right">- 5 &#8451;</div><div class="clear"></div></li>
					<li><div class="w_year left bold">1995</div><div class="w_icon_small">R</div><div class="w_diff right">+ 8 &#8451;</div><div class="clear"></div></li>
				</ul>
			</div>
			</div>
	</body>
</html>
