<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>RENDEZVOUS</title>
    <link href="css/main.css" rel="stylesheet" />
    <link href="css/portal.css" rel="stylesheet" />
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
        	<h1 class="rendevous_title">RENDEZVOUS</h1>
            <div class="col-md-12">
            	<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 opt_box">
                	<h1><a href="createEvent.php">Create Event</a></h1>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 opt_box">
                	<h1><a href="eventPW.php">Enter Password</a></h1>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 opt_box">
                	<h1><a href="aroundme.php">Around Me</a></h1>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 opt_box">
                	<h1><a href="about.php">About Us</a></h1>
                </div>
            </div>
            
        </div>    

    </div> <!-- /container -->
    <div class="col-md-12 portal_splash_wrapper">
    	<div class="col-xs-6 col-xs-offset-3 col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3" id="portal_splash">
        	<h1>Let's Hang Out</h1>
            <p>Welcome to Rendezvous.</p>
        </div>
    </div>
    <div id="footer"></div>
</body>
</html>
