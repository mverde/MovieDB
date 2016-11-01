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
        <!-- Connect to db -->
        <?php
	        $mysqli = new mysqli("localhost", "cs143", "", "CS143", 1438);
	            if ($mysqli->connect_errno) {
	                echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	            }
	         $q = $_GET['q'];
	        ?>
        <div class="container">
        	<h1><span class="highlight">
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
        	</span></h1>
        	<div class="row">
        		<div class="col-md-6">
        		<h2><span class="highlight">Actors</span></h2>
        			<ul class="actor-in-movie">
        				<?php
        					
        					$getActors = "SELECT first,last,id FROM Actor WHERE id IN(SELECT aid FROM MovieActor WHERE mid=$q) ORDER BY last;";

        					if ($result = $mysqli->query($getActors)){

					            while($row = mysqli_fetch_array($result)) {
					                ?>
					                <li class='films'><a class="actors" href="actorinfo.php?q=<?php echo $row['id']; ?>"><?php echo $row['first'] . " " . $row['last']; ?> </a></li>
					   				<?php
					            }
					          }
			                else{
			                    echo "Problem with Query";
			                }
        				?>
        			</ul>
        		</div>

        		<div class="col-md-6">
        		<h2><span class="highlight">Comments</span></h2>
        			<ul>
        				<?php
        					$q = $_GET['q'];
        					$getComments = "SELECT * FROM Review WHERE mid=$q";

        					if ($result = $mysqli->query($getComments)){

					            while($row = mysqli_fetch_array($result)) {
					            	?>
					 
					                <li class="comments">
					                	<div class="comment-section">
					                		<div class="user-name col-sm-3"><p><?php echo $row['name']; ?></p></div>
					                		<div class="user-time col-sm-3"><p><?php echo $row['time']; ?><p></div>
					                		<div class="user-rating col-sm-1 col-sm-offset-5"><p><?php echo $row['rating']; ?></p></div>
					                		
					                	</div>
					                	<div class="user-comment col-sm-12">
					                		<p><?php echo $row['comment']; ?></p>
					                	</div>
					                </li>

					   				<?php
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
    				<h2><span class="highlight"> Add Comment</span> </h2>

    				<form method="get" action="addcomment.php">
					    <div class="form-group">
					      <label for="name">Name</label>
					      <input type="text" maxlength="20" class="form-control" name="name" id="name" placeholder="Enter name">
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
		                  <textarea maxlength="500" class="form-control" name="comment" rows="6"></textarea>
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
