<!DOCTYPE html>
<html>
    <head>
        <title>Movie Info</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/app.css"> 
        <!-- Bootstrap core CSS -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
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

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse">
                  <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Search <span class="sr-only">(current)</span></a></li>
                    <li><a href="#">Add</a></li>
                    <li><a href="browseactor.php">Actor A-Z</a></li>
                    <li><a href="browsemovie.php">Movie A-Z</a></li>
                  </ul>
              </div>
            </div>
        </nav>
        <!-- Connect to db -->
        <?php
	        $mysqli = new mysqli("localhost", "cs143", "", "CS143", 1438);
	            if ($mysqli->connect_errno) {
	                echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	            }
	         $q = $_GET['q'];
	        ?>
        <div class="container">
        	<h1>
        		<?php 
        			$getTitle="SELECT title FROM Movie where id=$q"; 
        			if ($result = $mysqli->query($getTitle)){

			            while($row = mysqli_fetch_array($result)) {
			                echo $row['title'];
			   
			            }
			          }
	                else{
	                    echo "Problem with Query";
	                }
        		?>
        	</h1>
        	<div class="row">
        		<div class="col-md-6">
        		<h2>Actors</h2>
        			<ul class="actor-in-movie">
        				<?php
        					
        					$getActors = "SELECT first,last FROM Actor WHERE id IN(SELECT aid FROM MovieActor WHERE mid=$q)";

        					if ($result = $mysqli->query($getActors)){

					            while($row = mysqli_fetch_array($result)) {
					                echo "<li class='films'>" . $row['first'] . " " . $row['last'] . "</li>";
					   
					            }
					          }
			                else{
			                    echo "Problem with Query";
			                }
        				?>
        			</ul>
        		</div>

        		<div class="col-md-6">
        		<h2>Comments</h2>
        			<ul>
        				<?php
        					$q = $_GET['q'];
        					$getComments = "SELECT * FROM Review WHERE mid=$q";

        					if ($result = $mysqli->query($getComments)){

					            while($row = mysqli_fetch_array($result)) {
					                echo "<li class='comments'>" . $row['name'] . $row['time'] . $row['comment'] . " " . $row['rating'] . "</li>";
					   
					            }
					          }
			                else{
			                    echo "Problem with Query";
			                }
        				?>
        			</ul>
        		</div>

        	</div>
        	<div class="row">
    			<div class="col-md-12">
    				<h2> Add Comment </h2>

    				<form method="get" action="addcomment.php">
					    <div class="form-group">
					      <label for="name">Name</label>
					      <input type="text" class="form-control" name="name" id="name" placeholder="Enter name">
					    </div>
					    <div class="form-group">
					      <label for="rating">Rating</label>
					      <select name="rating" class="form-control" id="rating">
					      	<option value="1">1</option>
					      	<option value="2">2</option>
					      	<option value="3">3</option>
					      	<option value="4">4</option>
					      	<option value="5">5</option>
					      </select>
					    </div>
					    <div class="form-group">
		                  <textarea class="form-control" name="comment" rows="6"></textarea>
		                  </br> 
		                </div>
		                <div class="form-group hidden">
		                	<select name="movieid" class="form-control" id="movieid">
					      		<option selected="selected" value="<?php echo $q; ?>"><?php echo $q; ?></option>
					      	</select>
		                </div>
					    <button type="submit" class="btn btn-default">Add Comment!</button>
				  	</form>
    			</div>
        	</div>
            </div>
    </body>
</html>
