<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>RENDEZVOUS</title>
    <link href="css/main.css" rel="stylesheet" />
    <link href="css/portal.css" rel="stylesheet" />
    <link href="css/events.css" rel="stylesheet" />
    <link href="css/bootstrap.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Lato:100,200,400' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui-1.9.2.custom.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    
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
    
    
    <div class="container text-center alignvert">
    	<div class="row" style="margin-top:50px;">
            <div class="col-md-12 main-content">
            	<h1>Create Event</h1>
                <form class="geocode" action="addEvent.php" method="post">
            	<div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2 event-box">
					<label class="event-label" for="title">Event Title</label><br><br>
                    <input type="text" class="event-input-lg" name="title" id="title">
                </div>
                
                <div class="col-xs-8 col-sm-8 col-md-6 col-md-offset-2 col-lg-6 col-lg-offset-2 event-box">
					<label class="event-label" for="title">Street Address</label><br><br>
                    <input type="text" class="event-input" name="street_address" id="street_address">
                </div>
                <div class="col-xs-4 col-sm-4 col-md-2 col-lg-2 event-box">
					<label class="event-label" for="title">State</label><br><br>
                    <input type="text" class="event-input" name="state" id="state">
                </div>
                <div class="col-xs-8 col-sm-8 col-md-6 col-md-offset-2 col-lg-6 col-lg-offset-2 event-box">
					<label class="event-label" for="title">City</label><br><br>
                    <input type="text" class="event-input" name="city" id="city">
                </div>
                <div class="col-xs-4 col-sm-4 col-md-2 col-lg-2 event-box">
					<label class="event-label" for="title">Zip</label><br><br>
                    <input type="text" class="event-input" name="zip" id="zip">
                </div>
                
                <div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2 event-box">
					<label class="event-label" for="title">Description</label><br><br>
                    <input type="text" class="event-input-xl" name="description" id="description">
                </div>
                
                
                <div class="col-xs-6 col-sm-6 col-md-4 col-md-offset-2 col-lg-4 col-lg-offset-2 event-box">
					<label class="event-label" for="title">Hosts</label><br><br>
                    <input type="text" class="event-input" name="hosts" id="hosts">
                </div>
                <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4 event-box">
					<label class="event-label" for="title">Privacy</label><br><br>
                    <input type="text" class="event-input" name="privacy" id="privacy">
                </div>
                <div class="col-xs-6 col-sm-6 col-md-2 col-md-offset-4 col-lg-2 col-lg-offset-4">
                	<input type="submit" class="btn btn-border color-2 material-design" data-color="#8dc63f">Submit</button>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-2 col-lg-2">
                	<button class="btn btn-border color-4 material-design" type="reset" data-color="#004740">Reset</button>
                </div>
                </form>
            </div>
        </div>    

    </div> <!-- /container -->
    <div id="footer"></div>
    <script>

    window.open    = function(){};
    window.print   = function(){};
    // Support hover state for mobile.
    if (false) {
      window.ontouchstart = function(){};
    }

    function __linkClick(e) {
      parent.window.postMessage(this.href, '*');
    };

    function __bindToLinks() {
      var __links = document.querySelectorAll('a');
      for (var i = 0, l = __links.length; i < l; i++) {
        if ( __links[i].getAttribute('data-t') == '_blank' ) {
          __links[i].addEventListener('click', __linkClick, false);
        }
      }
    }

  
    var canvas = {},
    centerX = 0,
    centerY = 0,
    color = '',
    containers = document.getElementsByClassName('material-design')
    context = {},
    element = {},
    radius = 0,

    requestAnimFrame = function () {
      return (
        window.requestAnimationFrame       || 
        window.mozRequestAnimationFrame    || 
        window.oRequestAnimationFrame      || 
        window.msRequestAnimationFrame     || 
        function (callback) {
          window.setTimeout(callback, 1000 / 60);
        }
      );
    } (),

    init = function () {
      containers = Array.prototype.slice.call(containers);
      for (var i = 0; i < containers.length; i += 1) {
        canvas = document.createElement('canvas');
        canvas.addEventListener('click', press, false);
        containers[i].appendChild(canvas);
        canvas.style.width ='100%';
        canvas.style.height='100%';
        canvas.width  = canvas.offsetWidth;
        canvas.height = canvas.offsetHeight;
      }
    },

    press = function (event) {
      color = event.toElement.parentElement.dataset.color;
      element = event.toElement;
      context = element.getContext('2d');
      radius = 0;
      centerX = event.offsetX;
      centerY = event.offsetY;
      context.clearRect(0, 0, element.width, element.height);
      draw();
    },

    draw = function () {
      context.beginPath();
      context.arc(centerX, centerY, radius, 0, 2 * Math.PI, false);
      context.fillStyle = color;
      context.fill();
      radius += 2;
      if (radius < element.width) {
        requestAnimFrame(draw);
      }
    };

init();
    //@ sourceURL=pen.js
  </script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBRptWW7aycchkZU5Xa7MuJWtasSXtvH2Y"></script>
    <script>
		var geocoder;
		$(document).ready(function() {
			geocoder = new google.maps.Geocoder();
			$('form.geocode').submit(function(e) {
				//window.alert("working.");
				var that = this;
				var addr;
				var addrArray = [];
				var addrFields = ['street_address', 'city', 'state', 'zip'];
				var addrStreet = $('.geocode').find('input[name="street_address"]').val();
				var addrCity = $('.geocode').find('input[name="city"]').val();
				var addrState = $('.geocode').find('input[name="state"]').val();
				//window.alert(addrStreet);
				//window.alert("working2.");

				e.preventDefault();
				$(that).unbind('submit');
					
				var onSuccess = function(results, status) {
					if (status == google.maps.GeocoderStatus.OK) {
						result_lat = results[0].geometry.location.lat();
						result_lng = results[0].geometry.location.lng();
						$(that).prepend('<input type="hidden" name="latitude" value="' + result_lat + '">');
						$(that).prepend('<input type="hidden" name="longitude" value="' + result_lng + '">');
					}
					$(that).trigger('submit');
				}
				addr = addrStreet + ", " + addrCity + " " + addrState;
				geocoder.geocode({'address': addr}, onSuccess);
				
			});
		});
	</script>
</body>
</html>
