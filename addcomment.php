<!DOCTYPE html>
<html>
	<head>
		<title>MovieDB</title>

		<!-- Bootstrap core CSS -->
    	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    	<link href="css/index.css" rel="stylesheet">
	</head>
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
          			<a class="navbar-brand" href="index.php">MovieDB</a>
        		</div>

        		<!-- Collect the nav links, forms, and other content for toggling -->
			    <div class="collapse navbar-collapse">
			      <ul class="nav navbar-nav">
			        <li class="active"><a href="index.php">Search <span class="sr-only">(current)</span></a></li>
			        <li><a href="add.php">Add</a></li>
			      </ul>
			  </div>
     	 	</div>
		</nav>

		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12">
				
				<?php
					$mysqli = new mysqli("localhost", "cs143", "", "CS143", 1438);
		            if ($mysqli->connect_errno) {
		                echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
		            }else{


		         	$name = (string)$_POST["name"];
		         	$name = $mysqli->real_escape_string($name);
		         	$comment = (string)$_POST["comment"];
		         	$comment = $mysqli->real_escape_string($comment);
		         	$rating = (int)$_POST["rating"];
		         	$movieid = (int)$_POST["movieid"];
		         	$date = date('Y-m-d H:i:s');
		         	
		         	$addComment="INSERT INTO Review (name, time, mid, rating, comment) VALUES ('$name', '$date', '$movieid', '$rating', '$comment')";

        			if ($result = $mysqli->query($addComment)){
        				?>
        				<h1>THANK YOU ~<?php echo $_POST["name"]; ?>~</h1>
						</br>
						<h1>WE VALUE UR COMMENT OF ~<?php echo $_POST["comment"]; ?>~</h1>
						</br>
						<h1>ALSO THANK YOU FOR YOUR RATING OF ~<?php echo $_POST["rating"]; ?>~</h1>
						</br>
						<h1>THE TIME IS ~<?php echo date('Y-m-d H:i:s'); ?>~</h1>
						</br>
        				<h2><a href="movieinfo.php?q=<?php echo $_POST["movieid"]; ?>">CLICK HERE TO SEE YOUR COMMENT</a></h2>
			            <?php
			          }
	                else{
	                	?>
	                	<h2><a href="movieinfo.php?q=<?php echo $_POST["movieid"]; ?>">SORRY an error occured!</a></h2>
	                	<?php
	                   }
	                }
				?>
				</div>
			</div>
		</div>
	</body>
</html>