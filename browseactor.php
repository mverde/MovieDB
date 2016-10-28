<!DOCTYPE html>
<html>
	<head>
		<title>Browse Actor </title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
		 <script src="bootstrap/js/bootstrap.min.js"></script>
		 <script type="text/javascript" src="js/jquery.js"></script>
	</head>
	<?php
	// Connect to server.
	$mysqli = new mysqli("localhost", "cs143", "", "CS143", 1438);
	if ($mysqli->connect_errno) {
		    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
		}
	?>
	<body>
		<nav class="navbar navbar-inverse navbar-static-top">
      		<div class="container-fluid">
        		<div class="navbar-header">
          			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            			<span class="sr-only">Toggle navigation</span>
            			<span class="icon-bar"></span>
            			<span class="icon-bar"></span>
            			<span class="icon-bar"></span>
          			</button>
          			<a class="navbar-brand" href="#">MovieDB</a>
        		</div>

        		<!-- Collect the nav links, forms, and other content for toggling -->
			    <div class="collapse navbar-collapse">
			      <ul class="nav navbar-nav">
			        <li class="active"><a href="index.php">Search <span class="sr-only">(current)</span></a></li>
			        <li><a href="#">Add</a></li>
			        <li><a href="browseactor.php">Actor A-Z</a></li>
			        <li><a href="browsemovie.php">Movie A-Z</a></li>
			      </ul>
			  </div>
     	 	</div>
		</nav>

		<div class="container">
			<div class="row">
			  	<div class="col-md-1"><a class="alphabet" href="#">A</a></div>
				<div class="col-md-1">B</div>
				<div class="col-md-1">C</div>
				<div class="col-md-1">D</div>
				<div class="col-md-1">E</div>
				<div class="col-md-1">F</div>
				<div class="col-md-1">G</div>
				<div class="col-md-1">H</div>
				<div class="col-md-1">I</div>
				<div class="col-md-1">J</div>
				<div class="col-md-1">K</div>
				<div class="col-md-1">L</div>
			</div>

			<div class="row">
			  	<div class="col-md-1">M</div>
				<div class="col-md-1">N</div>
				<div class="col-md-1">O</div>
				<div class="col-md-1">P</div>
				<div class="col-md-1">Q</div>
				<div class="col-md-1">R</div>
				<div class="col-md-1">S</div>
				<div class="col-md-1">T</div>
				<div class="col-md-1">U</div>
				<div class="col-md-1">V</div>
				<div class="col-md-1">W</div>
				<div class="col-md-1">X</div>
			</div>

			<div class="row">
			  	<div class="col-md-1">Y</div>
				<div class="col-md-1">Z</div>
				<div class="col-md-10 col-md-offset-2"></div>
			</div>
			<div class="show-results">
				<p>These r my results.</p>
			</div>

		</div>
	</body>
</html>