<!DOCTYPE html>
<html>
	<head>
		<title>MovieDB</title>

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
			        <li><a href="#">Actor A-Z</a></li>
			        <li><a href="#">Movie A-Z</a></li>
			      </ul>
			  </div>
     	 	</div>
		</nav>
		<br>
		<br>
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-3"></div>
				<div class="col-xs-6">
					<form>
						<div class="form-group">
							<label for="searchBarInput">Search</label>
							<div class="input-group">
								<input type="text" class="form-control" id="searchBarInput" placeholder="Actor, Movie">
								<div class="input-group-addon btn btn-primary">Submit</div>
							</div>
  						</div>
					</form>
				</div>
				<div class="col-xs-3"></div>
			</div>
		</div>
	</body>
</html>