<?php require("common.php"); 
    // At the top of the page we check to see whether the user is logged in or not 
    if(empty($_SESSION['user'])) 
    { 
        // If they are not, we redirect them to the login page. 
        header("Location: backdoor.php"); 
        // Remember that this die statement is absolutely critical.  Without it, 
        // people can view your members-only content without logging in. 
        die("Redirecting to backdoor.php"); 
    } 
    $query = " 
        SELECT 
			street_address,
			state,
			city,
			zip,
			latitude,
			longitude 
		FROM events 
    "; 
	/*
	$query_params = array( 
            ':projID' => $_GET['id'] 
        ); 
    */ 
    try 
    { 
        // These two statements run the query against your database table. 
        $stmt = $db->prepare($query); 
		//$stmt->bindParam(':projID', $_GET['id'], PDO::PARAM_STR, 12);
        $stmt->execute(); 
    } 
    catch(PDOException $ex) 
    { 
        // Note: On a production website, you should not output $ex->getMessage(). 
        // It may provide an attacker with helpful information about your code.  
        die("Failed to run query: " . $ex->getMessage()); 
    } 
    // Finally, we can retrieve all of the found rows into an array using fetchAll 
    $rows = $stmt->fetchAll();
?> 
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>RENDEZVOUS</title>
    <link href="css/main.css" rel="stylesheet" />
    <link href="css/bootstrap.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Lato:100,400' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui-1.9.2.custom.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
    <script type="text/javascript">
      
	  <?php //foreach($rows as $row):?>
	  		//var myLatlng = new google.maps.LatLng(<?php //echo htmlentities($row['latitude'], ENT_QUOTES, 'UTF-8');?>,<?php //echo htmlentities($row['longitude'], ENT_QUOTES, 'UTF-8');?>)
			//window.alert("<?php //echo htmlentities($row['latitude'], ENT_QUOTES, 'UTF-8');?>");
			//window.alert(myLatlng);
			//var marker = new google.maps.Marker({
				//map: map,
				//position: myLatlng,
				//icon:redIcon
			//});
		<?php //endforeach; ?>

	  
		function initialize() {
			var map;
	  		var redIcon = "http://www.google.com/intl/en_us/mapfiles/ms/micons/red-dot.png";
			var mapOptions = {
				zoom: 17
			};
		
			map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
		
		  // Try HTML5 geolocation
			if(navigator.geolocation) {
				navigator.geolocation.getCurrentPosition(function(position) {
					var pos = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
					var infowindow = new google.maps.InfoWindow({
						map: map,
						position: pos,
						content: 'Location found using HTML5.'
					});
					<?php foreach($rows as $row):?>
						var myLatlng = new google.maps.LatLng(<?php echo htmlentities($row['latitude'], ENT_QUOTES, 'UTF-8');?>,<?php echo htmlentities($row['longitude'], ENT_QUOTES, 'UTF-8');?>)
						//window.alert("<?php //echo htmlentities($row['latitude'], ENT_QUOTES, 'UTF-8');?>");
						//window.alert(myLatlng);
						var marker = new google.maps.Marker({
							map: map,
							position: myLatlng,
							icon:redIcon
						});
					<?php endforeach; ?>
					map.setCenter(pos);
					
					}, function() {
				  		handleNoGeolocation(true);
				});
			} 
			else {
				// Browser doesn't support Geolocation
				handleNoGeolocation(false);
			  }
		}
		
		function handleNoGeolocation(errorFlag) {
		  if (errorFlag) {
			var content = 'Error: The Geolocation service failed.';
		  } else {
			var content = 'Error: Your browser doesn\'t support geolocation.';
		  }
		
		  var options = {
			map: map,
			position: new google.maps.LatLng(60, 105),
			content: content
		  };
		
		  var infowindow = new google.maps.InfoWindow(options);
		  map.setCenter(options.position);
		  
		}
		
		google.maps.event.addDomListener(window, 'load', initialize);

    </script>
    <style type="text/css">
      html { height: 100% }
      body { height: 100%; margin: 0; padding: 0 }
      #map-canvas { height: 100% }
	  #panel { margin-top:100px; position:absolute; z-index:999; }
    </style>
</head>
<body id="background">
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand rendevous-nav-title" href="portal.php"><img src="images/rendevous_logo_18.png" class="sm-logo"> RENDEZVOUS</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
    <!--div id="panel">
      <input id="address" type="textbox" value="Starkville, MS">
      <input type="button" value="Geocode" onclick="codeAddress()">
    </div-->
    <div id="map-canvas"></div>
    <div id="footer"></div>
</body>
</html>