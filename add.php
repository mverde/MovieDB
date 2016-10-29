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
										<div class="input-group">
											<input type="text" class="form-control" id="firstName" name="firstName" placeholder="up to 20 characters">
										</div>
			  						</div>
			  						<div class="form-group">
										<label for="lastName">Last Name</label>
										<div class="input-group">
											<input type="text" class="form-control" id="lastName" name="lastName" placeholder="up to 20 characters">
										</div>
			  						</div>
			  						<div class="form-group">
										<label for="sex">Sex</label>
										<div class="input-group">
											<input type="text" class="form-control" id="sex" name="sex" placeholder="up to 6 characters">
										</div>
			  						</div>
			  						<div class="form-group">
										<label for="dob">DOB</label>
										<div class="input-group">
											<input type="text" class="form-control" id="dob" name="dob" placeholder="yyyy-mm-dd">
										</div>
			  						</div>
			  						<div class="form-group">
										<label for="dod">DOD</label>
										<div class="input-group">
											<input type="text" class="form-control" id="dod" name="dod" placeholder="yyyy-mm-dd">
										</div>
			  						</div>
			  						<button type="submit" class="btn btn-default">Submit</button>
								</form>
					    	</div>
					    	<div class="tab-pane" id="Director">
							    <form method="get" action="<?php echo $_SERVER['PHP_SELF'];?>">
									<div class="form-group">
										<label for="firstName">First Name</label>
										<div class="input-group">
											<input type="text" class="form-control" id="firstName" name="firstName" placeholder="up to 20 characters">
										</div>
			  						</div>
			  						<div class="form-group">
										<label for="lastName">Last Name</label>
										<div class="input-group">
											<input type="text" class="form-control" id="lastName" name="lastName" placeholder="up to 20 characters">
										</div>
			  						</div>
			  						<div class="form-group">
										<label for="dob">DOB</label>
										<div class="input-group">
											<input type="text" class="form-control" id="dob" name="dob" placeholder="yyyy-mm-dd">
										</div>
			  						</div>
			  						<div class="form-group">
										<label for="dod">DOD</label>
										<div class="input-group">
											<input type="text" class="form-control" id="dod" name="dod" placeholder="yyyy-mm-dd">
										</div>
			  						</div>
			  						<button type="submit" class="btn btn-default">Submit</button>
								</form>
					    	</div>
					    </div>
			        </div>
			        <div class="tab-pane" id="movie">
			        	<form method="get" action="<?php echo $_SERVER['PHP_SELF'];?>">
	        				<div class="form-group">
								<label for="title">Title</label>
								<div class="input-group">
									<input type="text" class="form-control" id="title" name="title" placeholder="up to 100 characters">
								</div>
	  						</div>
	  						<div class="form-group">
								<label for="year">Year</label>
								<div class="input-group">
									<input type="text" class="form-control" id="year" name="year" placeholder="yyyy">
								</div>
	  						</div>
	  						<div class="form-group">
								<label for="rating">Rating</label>
								<div class="input-group">
									<input type="text" class="form-control" id="rating" name="rating" placeholder="MPAA rating, up to 10 characters">
								</div>
	  						</div>
	  						<div class="form-group">
								<label for="company">Production Company</label>
								<div class="input-group">
									<input type="text" class="form-control" id="company" name="company" placeholder="up to 50 characters">
								</div>
	  						</div>
	  						 <div class="form-group">
								<label for="genres">Genres</label>
								<div class="input-group">
									<input type="text" class="form-control" id="genres" name="genres" placeholder="comma-separated, up to 20 characters each">
								</div>
	  						</div>
	  						<button type="submit" class="btn btn-default">Submit</button>
  						</form>
			        </div>
			        <div class="tab-pane" id="actor-movie">
			        </div>
			        <div class="tab-pane" id="director-movie">
			        </div>
			    </div>
			    <span class="col-xs-3"></span>
			</div>
		</div>

		<script src="js/jquery.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>