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
</head>
<body id="background">
    <div class="container text-center alignvert">
    
    	<div class="row">
            <div class="col-md-12">
            	<div class="col-xs-6 col-xs-offset-3 col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3">
					<h1 class="rendevous_title">RENDEZVOUS</h1>
						<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        	<h1>Sign Up</h1>
                            <form action="accountCreate.php" method="post">
                                <div class="form-group">
                                    <input type="text" name="username" placeholder="Username" class="form-control">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="email" placeholder="Email" class="form-control">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" placeholder="Password" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-success">Create</button>
                            </form>
                        </div>

                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        	<h1>Log In</h1>
                            <form action="login.php" method="post">
                                <div class="form-group">
                                    <input type="text" placeholder="Username" class="form-control" name="username">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" placeholder="Password" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-success">Sign in</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
        
    	

    </div> <!-- /container -->
    <div id="footer"></div>
</body>
</html>