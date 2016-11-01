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

		<br>
		<br>
		<br>

		<div class="container-fluid">
			<div class="row">
				<span class="col-xs-3"></span>
				<div class="col-xs-6">
					<form method="get" action="<?php echo $_SERVER['PHP_SELF'];?>">
						<div class="form-group">
							<label for="searchBarInput">Search</label>
							<div class="input-group">
								<input type="text" class="form-control" id="searchBarInput" name="searchQuery" placeholder="Actors, Movie Titles, Keywords">
								<div class="input-group-addon"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></div>
							</div>
  						</div>
					</form>
				</div>
				<span class="col-xs-3"></span>
			</div>
		</div>

		<div class="container">
			<?php
			function movie_sort($a, $b) {
				return strcasecmp($a["title"], $b["title"]);
			}
			function actor_sort($a, $b) {
				return strcasecmp($a["first"], $b["first"]);
			}

			$mysqli = new mysqli("localhost", "cs143", "", "CS143", 1438);
			if ($mysqli->connect_errno) {
    			echo "<font color='red'>Failed to connect to MySQL.</font>";
			} else {
				if ($_SERVER["REQUEST_METHOD"] == "GET") {
	    			// collect value of input field
	    			$searchQuery = $_GET['searchQuery'];
	    
	    			if (!empty($searchQuery)) {
	    				$keyWords = array();
	    				$word = strtok($searchQuery, ' ');
	    				while ( $word !== false ) {
     						$keyWords[] = $word;
     						$word = strtok(' ');
 						}

	    				$movieSqlQuery = "SELECT * FROM Movie WHERE";
	    				$i = 0;
	    				foreach($keyWords as $keyWord)
			            {
			            	if ($i == 0) {
			            		$movieSqlQuery .= " title LIKE '%" . $keyWord . "%'";
			            		$i++;
			            	} else {
			            		$movieSqlQuery .= " AND title LIKE '%" . $keyWord . "%'";
			            	}
			            }
			            $movieSqlQuery = $movieSqlQuery . ";";
			            //echo $movieSqlQuery;

	    				$actorSqlQuery = "SELECT * FROM Actor WHERE";
	    				if (count($keyWords) === 1) {
	    					$actorSqlQuery .= " (first LIKE '%" . $keyWords[0] . "%') OR (last LIKE '%" . $keyWords[0] . "%');";
	    				} else if (count($keyWords) > 1) {
	    					$i = 0;
		    				foreach($keyWords as $keyWord)
				            {
				            	if ($i === 0) {
				            		$actorSqlQuery .= " (first LIKE '%" . $keyWord . "%'";
				            		$i += 1;
				            	} else {
				            		$actorSqlQuery .= " OR first LIKE '%" . $keyWord . "%'";
				            	}

				            }
				            $actorSqlQuery .= ") AND";

				            $i = 0;
		    				foreach($keyWords as $keyWord)
				            {
				            	if ($i === 0) {
				            		$actorSqlQuery .= " (last LIKE '%" . $keyWord . "%'";
				            		$i += 1;
				            	} else {
				            		$actorSqlQuery .= " OR last LIKE '%" . $keyWord . "%'";
				            	}

				            }
				            $actorSqlQuery .= ");";
	    				}
	    				//echo $actorSqlQuery;

	    				$movieResult = $mysqli->query($movieSqlQuery);
        				$movies = array();
        				while($tuple = $movieResult->fetch_assoc())
        				{
            				$movies[] = $tuple;
        				}
        				usort($movies, "movie_sort");

        				$actorResult = $mysqli->query($actorSqlQuery);
        				$actors = array();
        				while($tuple = $actorResult->fetch_assoc()) {
        					$actors[] = $tuple;
        				}
        				usort($actors, "actor_sort");

        				if (count($movies) > 0) {
	        				?>
	        				<h3>Movies</h3>
	        				<div class="row">
	        					<span class="col-xs-2"></span>
		        				<table class="col-xs-8 table table-condensed table-hover">
						            <tr class="no-hover">
						            	<th>Title</th>
						            	<th>Year</th>
						            </tr>
						            <?php
						                foreach($movies as $tuple)
						                {
						                    echo "<tr>";
						                  	echo "<td><a href='movieinfo.php?q=" . $tuple["id"] . "'>" . $tuple["title"] . "</a></td>";
						              		echo "<td>" . $tuple["year"] . "</td>";
						                    echo "</tr>";
						                }
						            ?>
						        </table>
						        <span class="col-xs-2"></span>
						    </div>
						    <?php
        				}

        				if (count($actors) > 0) {
        					?>
        					<h3>Actors</h3>
	        				<div class="row">
	        					<span class="col-xs-2"></span>
						        <table class="col-xs-8 table table-condensed table-hover">
						            <tr class="no-hover">
						            	<th>Name</th>
						            	<th>DOB</th>
						            	<th>DOD</th>
						            </tr>
						            <?php
						                foreach($actors as $tuple)
						                {
						                    echo "<tr>";
						                  	echo "<td><a href='actorinfo.php?q=" . $tuple["id"] . "'>" . $tuple["first"] . " " . $tuple ["last"] . "</a></td>";
						              		echo "<td>" . $tuple["dob"] . "</td>";
						              		echo "<td>" . (empty($tuple["dod"]) ? "N/A" : $tuple["dod"]) . "</td>";
						                    echo "</tr>";
						                }
						            ?>
						        </table>
						        <span class="col-xs-2"></span>
	        				</div>
					        <?php
        				}

        				if (count($movies) == 0 && count($actors) == 0) {
        					echo "<h4>Your search returned no results.</h4>";
        				}
	    			}
	    		} 
			}
			?>
		</div>
	</body>
</html>