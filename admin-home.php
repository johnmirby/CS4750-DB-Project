<?php
     session_start();
     if(isset($_SESSION["login"])){
?>
		<html lang="en">
		  <head>
		    <meta charset="utf-8">
		    <meta http-equiv="X-UA-Compatible" content="IE=edge">
		    <meta name="viewport" content="width=device-width, initial-scale=1">
		    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		    <title>Magic the Gathering Card Tool</title>

		    <!-- Bootstrap -->
		    <link href="css/bootstrap.min.css" rel="stylesheet">
		    <link href="css/pages.css" rel="stylesheet">
		    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		    <!--[if lt IE 9]>
		      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		    <![endif]-->
		  </head>
		  <body>

		    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		    <!-- Include all compiled plugins (below), or include individual files as needed -->
		    <script src="js/bootstrap.min.js"></script>
		    <script src="scripts.js"></script>
		    <div class="container">
		      <div class="jumbotron">
		        <h1>MTG Card Tool</h1>
		      </div>
		      <ul class="nav nav-tabs nav-justified">
		        <li role="presentation"><a href="index.html">Home</a></li>
		        <li role="presentation" class="active"><a href="#">Admin</a></li>
		      </ul>
		    <section id="login">
		    <div class="container">
		      <h2>Admin Panel</h2>
		    	<div class="row">
		    	    <div class="col-xs-12">
		            	<div class="form-group">
							<label for="usr">Operation:</label>
							<select class="form-control" id="admin-op-select">
								<option value="0" selected></option>
								<option value="1">Insert Card</option>
								<option value="2">Update Card</option>
								<option value="3">Delete Card</option>
							</select>
							<label for="usr">Select Card:</label>
							<select class="form-control" id="admin-card-select">
								<option selected></option>
								<?php
								require "dbutilAdmin.php";
						        $db = DbUtil::loginConnection();
						        $stmt = $db->stmt_init();
						        if($stmt->prepare("select Card_Name from Card") or die(mysqli_error($db))) {
			                        $stmt->execute();
			                        $stmt->bind_result($Card_Name);
			                        while($stmt->fetch()) {
			                            echo "<option value=\"$Card_Name\">$Card_Name</option>";
			                        }
			                        $stmt->close();
		            			}
								?>
							</select>
						</div>	
		    		</div> <!-- /.col-xs-12 -->
		    	</div> <!-- /.row -->
		    </div> <!-- /.container -->
		    </section>
		    </div>
		  </body>

		</html>
<?php
     } else {
?>
		<html lang="en">
		  <head>
		    <meta charset="utf-8">
		    <meta http-equiv="X-UA-Compatible" content="IE=edge">
		    <meta name="viewport" content="width=device-width, initial-scale=1">
		    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		    <title>Magic the Gathering Card Tool</title>

		    <!-- Bootstrap -->
		    <link href="css/bootstrap.min.css" rel="stylesheet">
		    <link href="css/pages.css" rel="stylesheet">
		    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		    <!--[if lt IE 9]>
		      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		    <![endif]-->
		  </head>
		  <body>

		    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		    <!-- Include all compiled plugins (below), or include individual files as needed -->
		    <script src="js/bootstrap.min.js"></script>
		    <script src="scripts.js"></script>
		    <div class="container">
		      <div class="jumbotron">
		        <h1>MTG Card Tool</h1>
		      </div>
		      <ul class="nav nav-tabs nav-justified">
		        <li role="presentation"><a href="index.html">Home</a></li>
		        <li role="presentation" class="active"><a href="#">Admin</a></li>
		      </ul>
		    <section id="login">
		    <div class="container">
		      <h2>Login: </h2>
		    	<div class="row">
		    	    <div class="col-xs-12">
		            You must login with an admin account to access this page.
		    		</div> <!-- /.col-xs-12 -->
		    	</div> <!-- /.row -->
		    </div> <!-- /.container -->
		    </section>
		    </div>
		  </body>

		</html>
<?php
     }
?>
    