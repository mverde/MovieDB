<!DOCTYPE html>
<html>
	<head>
		<title>MovieDB</title>

		<!-- Bootstrap core CSS -->
    	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    	<link href="css/add.css" rel="stylesheet">
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
          			<a class="navbar-brand" href="#">MovieDB</a>
        		</div>

			    <div class="collapse navbar-collapse">
			      <ul class="nav navbar-nav">
			        <li><a href="index.php">Search</a></li>
			        <li class="active"><a href="#">Add <span class="sr-only">(current)</span></a></li>
			      </ul>
			  </div>
     	 	</div>
		</nav>
		<!-- Connect to DB -->
		<?php
			$mysqli = new mysqli('localhost', 'cs143', '', 'CS143', 1438);
			if ($mysqli->connect_errno) {
    			echo "<font color='red'>Failed to connect to MySQL.</font>";
			} 
		?>
		<div class="container">
		    <ul class="nav nav-tabs">
		        <li class="nav active"><a href="#actor-or-director" data-toggle="tab">Actor/Director</a></li>
		        <li class="nav"><a href="#movie" data-toggle="tab">Movie</a></li>
		        <li class="nav"><a href="#actor-movie" data-toggle="tab">Actor to Movie</a></li>
		       	<li class="nav"><a href="#director-movie" data-toggle="tab">Director to Movie</a></li>
		    </ul>

		    <br>
		    <br>

		    <!-- Tab panes -->
		    <div class="row">
			    <div class="tab-content col-xs-9">
			        <div class="tab-pane active" id="actor-or-director">
			        	<ul class="nav nav-tabs">
					        <li class="nav active"><a href="#Actor" data-toggle="tab">Actor</a></li>
					        <li class="nav"><a href="#Director" data-toggle="tab">Director</a></li>
					    </ul>

					    <br>

					    <div class="tab-content">
					    	<div class="tab-pane active" id="Actor">
							    <form method="get" action="<?php echo $_SERVER['PHP_SELF'];?>">
									<div class="form-group">
										<label for="firstName">First Name</label>
										<input maxlength="20" type="text" class="form-control" id="firstName" name="firstName" placeholder="up to 20 characters">
			  						</div>
			  						<div class="form-group">
										<label for="lastName">Last Name</label>
										<input maxlength="20" type="text" class="form-control" id="lastName" name="lastName" placeholder="up to 20 characters">
			  						</div>
			  						<div class="form-group">
										<label for="sex">Sex</label>
										<input maxlength="6" type="text" class="form-control" id="sex" name="sex" placeholder="up to 6 characters">
			  						</div>
			  						<div class="form-group">
										<label for="dob">DOB</label>
										<input maxlength="10" type="text" class="form-control" id="dob" name="dob" placeholder="yyyy-mm-dd">
			  						</div>
			  						<div class="form-group">
										<label for="dod">DOD</label>
										<input maxlength="10" type="text" class="form-control" id="dod" name="dod" placeholder="yyyy-mm-dd, leave blank if still alive">
			  						</div>
			  						<button name="actorFormButton" type="submit" class="btn btn-default">Submit</button>
								</form>
					    	</div>
					    	<div class="tab-pane" id="Director">
							    <form method="get" action="<?php echo $_SERVER['PHP_SELF'];?>">
									<div class="form-group">
										<label for="firstName">First Name</label>
										<input maxlength="20" type="text" class="form-control" id="firstName" name="firstName" placeholder="up to 20 characters">
			  						</div>
			  						<div class="form-group">
										<label for="lastName">Last Name</label>
										<input maxlength="20" type="text" class="form-control" id="lastName" name="lastName" placeholder="up to 20 characters">
			  						</div>
			  						<div class="form-group">
										<label for="dob">DOB</label>
										<input maxlength="20" type="text" class="form-control" id="dob" name="dob" placeholder="yyyy-mm-dd">
			  						</div>
			  						<div class="form-group">
										<label for="dod">DOD</label>
										<input maxlength="20" type="text" class="form-control" id="dod" name="dod" placeholder="yyyy-mm-dd, leave blank if still alive">
			  						</div>
			  						<button name="directorFormButton" type="submit" class="btn btn-default">Submit</button>
								</form>
					    	</div>
					    </div>
			        </div>
			        <div class="tab-pane" id="movie">
			        	<form method="get" action="<?php echo $_SERVER['PHP_SELF'];?>">
	        				<div class="form-group">
								<label for="title">Title</label>
								<input maxlength="100" type="text" class="form-control" id="title" name="title" placeholder="up to 100 characters">
	  						</div>
	  						<div class="form-group">
								<label for="year">Year</label>
								<input maxlength="4" type="text" class="form-control" id="year" name="year" placeholder="yyyy">
	  						</div>
	  						<div class="form-group">
								<label for="rating">Rating</label>
								<select name="rating" class="form-control">
									<option value="g">G</option>
								  	<option value="pg">PG</option>
								  	<option value="pg13">PG-13</option>
								  	<option value="r">R</option>
								  	<option value="nc17">NC-17</option>
								</select>
	  						</div>
	  						<div class="form-group">
								<label for="company">Production Company</label>
								<input maxlength="50" type="text" class="form-control" id="company" name="company" placeholder="up to 50 characters">
	  						</div>
	  						 <div class="form-group">
								<label for="genres">Genres</label>
								<input type="text" class="form-control" id="genres" name="genres" placeholder="comma-separated, up to 20 characters each, leave blank if unknown">
	  						</div>
	  						<button name="movieFormButton" type="submit" class="btn btn-default">Submit</button>
  						</form>
			        </div>
			        <div class="tab-pane" id="actor-movie">
			        	<form method="get" action="<?php echo $_SERVER['PHP_SELF'];?>">
							<div class="form-group">
						      <label for="movietitle">Movie Title</label>
						      <select name="movietitle" class="form-control" id="movietitle">
						      	<?php
						      		$getFilms = "SELECT id,title FROM Movie ORDER BY title";
						      		if ($result = $mysqli->query($getFilms)){
						      			while($row = mysqli_fetch_array($result)) {
						      				?>
						      				<option value="<?php echo $row['id']; ?>"><?php echo $row['title']; ?></option>
						      				<?php
						      			}
						      		}

						      	?>
						      </select>
						    </div>
	  						<div class="form-group">
								<label for="actor">Actor</label>
								<select name="actor" class="form-control" id="actor">
						      	<?php
						      		$getActors = "SELECT id,first,last FROM Actor ORDER BY last";
						      		if ($result = $mysqli->query($getActors)){
						      			while($row = mysqli_fetch_array($result)) {
						      				?>
						      				<option value="<?php echo $row['id']; ?>"><?php echo $row['first'] . " " . $row['last']; ?></option>
						      				<?php
						      			}
						      		}

						      	?>
						      </select>
	  						</div>
	  						<div class="form-group">
								<label for="role">Role</label>
								<input maxlength="50" type="text" class="form-control" id="role" name="role" placeholder="50 characters max">
	  						</div>
	  						<button name="actorMovieButton" type="submit" class="btn btn-default">Submit</button>
						</form>
			        </div>
			        <div class="tab-pane" id="director-movie">
			        	<form method="get" action="<?php echo $_SERVER['PHP_SELF'];?>">
							<div class="form-group">
						      <label for="movietitle">Movie Title</label>
						      <select name="movietitle" class="form-control" id="movietitle">
						      	<?php
						      		$getFilms = "SELECT id,title FROM Movie";
						      		if ($result = $mysqli->query($getFilms)){
						      			while($row = mysqli_fetch_array($result)) {
						      				?>
						      				<option value="<?php echo $row['id']; ?>"><?php echo $row['title']; ?></option>
						      				<?php
						      			}
						      		}

						      	?>
						      </select>
						    </div>
	  						<div class="form-group">
								<label for="director">Director</label>
								<select name="director" class="form-control" id="director">
						      	<?php
						      		$getDirectors = "SELECT id,first,last FROM Director ORDER BY last";
						      		if ($result = $mysqli->query($getDirectors)){
						      			while($row = mysqli_fetch_array($result)) {
						      				?>
						      				<option value="<?php echo $row['id']; ?>"><?php echo $row['first'] . " " . $row['last']; ?></option>
						      				<?php
						      			}
						      		}

						      	?>
						      </select>
	  						</div>
	  						<button name="actorDirectorButton" type="submit" class="btn btn-default">Submit</button>
						</form>
			        </div>
			    </div>
			    <span class="col-xs-3"></span>
			</div>
		</div>

		<script src="js/jquery.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>

		<?php
			function valid_word($word) {
				return preg_match("/^\S+$/", $word);
			}
			function valid_phrase($phrase) {
				return preg_match("/^.+$/", $phrase);
			}
			function valid_date($date) {
				return preg_match("/^\d\d\d\d-\d\d-\d\d$/", $date);
			}
			function valid_year($year) {
				return preg_match("/^\d\d\d\d$/", $year);
			}
			function valid_genres($genres) {
				return preg_match("/^(\S{1,20}\,\s?)*(\S{1,20})$/", $genres);
			}

			if (!$mysqli->connect_errno) {
				if ($_SERVER['REQUEST_METHOD'] == 'GET') {
					if (isset($_GET['actorFormButton'])) {
						$firstName = $_GET['firstName'];
						$lastName = $_GET['lastName'];
						$sex = $_GET['sex'];
						$dob = $_GET['dob'];
						$dod = $_GET['dod'];

						if (valid_word($firstName) && valid_word($lastName) && valid_word($sex) && valid_date($dob) && (empty($dod) || valid_date($dod))) {
							$idResult = $mysqli->query("SELECT * FROM MaxPersonID;");
							$idTuple = $idResult->fetch_assoc();

							$nextPersonId = ((int) $idTuple['id']) + 1;
							$firstNameFinal = $mysqli->real_escape_string($firstName);
							$lastNameFinal = $mysqli->real_escape_string($lastName);
							$sexFinal = $mysqli->real_escape_string($sex);
							$dobFinal = $mysqli->real_escape_string($dob);
							$dodFinal = (empty($dod) ? "NULL" : $mysqli->real_escape_string($dod));
							$queryString = "INSERT INTO Actor (id, last, first, sex, dob, dod) VALUES (" . $nextPersonId . ", '" . $lastNameFinal . "', '" . $firstNameFinal . "', '" . $sexFinal . "', STR_TO_DATE('" . $dobFinal . "', '%Y-%m-%d'), STR_TO_DATE('" . $dodFinal . "', '%Y-%m-%d'));";
							echo $queryString;	
							if ($mysqli->query($queryString)) {
								if (!$mysqli->query("UPDATE MaxPersonID SET id=" . $nextPersonId . ";")) {
									echo "<font color='red'>Person id update failed.</font>";
								}
							} else {
								echo "<font color='red'>Tuple insertion failed.</font>";
							}
						} else {
							echo "<font color='red'>There was an error in your submission. Please follow all specified formats.</font>";
						}
					} else if (isset($_GET['directorFormButton'])) {
						$firstName = $_GET['firstName'];
						$lastName = $_GET['lastName'];
						$dob = $_GET['dob'];
						$dod = $_GET['dod'];

						if (valid_word($firstName) && valid_word($lastName) && valid_word($dob) && (empty($dod) || valid_date($dod))) {
							$idResult = $mysqli->query("SELECT * FROM MaxPersonID;");
							$idTuple = $idResult->fetch_assoc();

							$nextPersonId = ((int) $idTuple['id']) + 1;
							$firstNameFinal = $mysqli->real_escape_string($firstName);
							$lastNameFinal = $mysqli->real_escape_string($lastName);
							$dobFinal = $mysqli->real_escape_string($dob);
							$dodFinal = (empty($dod) ? "NULL" : $mysqli->real_escape_string($dod));
							$queryString = "INSERT INTO Director (id, last, first, dob, dod) VALUES (" . $nextPersonId . ", '" . $lastNameFinal . "', '" . $firstNameFinal . "', STR_TO_DATE('" . $dobFinal . "', '%Y-%m-%d'), STR_TO_DATE('" . $dodFinal . "', '%Y-%m-%d'));";
							echo $queryString;	
							if ($mysqli->query($queryString)) {
								if (!$mysqli->query("UPDATE MaxPersonID SET id=" . $nextPersonId . ";")) {
									echo "<font color='red'>Person id update failed.</font>";
								}
							} else {
								echo "<font color='red'>Tuple insertion failed.</font>";
							}
						} else {
							echo "<font color='red'>There was an error in your submission. Please follow all specified formats.</font>";
						}
					} else if (isset($_GET['movieFormButton'])) {
						$title = $_GET['title'];
						$year = $_GET['year'];
						$rating = $_GET['rating'];
						$company = $_GET['company'];
						$genres = $_GET['genres'];

						if (valid_phrase($title) && valid_year($year) && valid_phrase($company) && (empty($genres) || valid_genres($genres))) {
							/*$idResult = $mysqli->query("SELECT * FROM MaxMovieID;");
							$idTuple = $idResult->fetch_assoc();

							$nextMovieId = ((int) $idTuple['id']) + 1;
							$titleFinal = $mysqli->real_escape_string($title);
							$lastNameFinal = $mysqli->real_escape_string($lastName);
							$sexFinal = $mysqli->real_escape_string($sex);
							$dobFinal = $mysqli->real_escape_string($dob);
							$dodFinal = (empty($dod) ? "NULL" : $mysqli->real_escape_string($dod));
							$queryString = "INSERT INTO Actor (id, last, first, sex, dob, dod) VALUES (" . $nextMovieId . ", '" . $lastNameFinal . "', '" . $firstNameFinal . "', '" . $sexFinal . "', STR_TO_DATE('" . $dobFinal . "', '%Y-%m-%d'), STR_TO_DATE('" . $dodFinal . "', '%Y-%m-%d'));";
							echo $queryString;	
							if ($mysqli->query($queryString)) {
								if (!$mysqli->query("UPDATE MaxPersonID SET id=" . $nextMovieId . ";")) {
									echo "<font color='red'>Person id update failed.</font>";
								}
							} else {
								echo "<font color='red'>Tuple insertion failed.</font>";
							}*/
						} else {
							echo "<font color='red'>There was an error in your submission. Please follow all specified formats.</font>";
						}
					} else if(isset($_GET['actorMovieButton'])){
						$mid = (int)$_GET["movietitle"];
						$aid = (int)$_GET["actor"];
						$role = $_GET["role"];


						$addActorMovieRelation = "INSERT INTO MovieActor (mid,aid,role) VALUES ('$mid', '$aid', '$role')";
						if ($result = $mysqli->query($addActorMovieRelation)){
        				?>
        				<h3><span class="highlight">Successfully added.</span></h3>
			            <?php
			          }
	                else{
	                	?>
	                	<h3><span class="highlight">Problem adding to database.</span></h3>
	                	<?php
	                   }
					}else if(isset($_GET['actorDirectorButton'])){
						$mid = (int)$_GET["movietitle"];
						$did = (int)$_GET["director"];
						$addActorMovieRelation = "INSERT INTO MovieDirector (mid,did) VALUES ('$mid', '$did')";
						if ($result = $mysqli->query($addActorMovieRelation)){
        				?>
        				<h3><span class="highlight">Successfully added.</span></h3>
			            <?php
			          }
	                else{
	                	?>
	                	<h3><span class="highlight">Problem adding to database.</span></h3>
	                	<?php
	                   }
					}
 				}
 			}
		?>
	</body>
</html>