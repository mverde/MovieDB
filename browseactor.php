<!DOCTYPE html>
<html>
	<head>
		<title>Browse Actor </title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/app.css"> 
		 <script type="text/javascript" src="js/jquery.js"></script>
		 <script type="text/javascript" src="js/app.js"></script>
		 <script src="bootstrap/js/bootstrap.min.js"></script>
		 <script>
			function getResults(str) {

			  if (str=="") {
			    document.getElementById("txtHint").innerHTML="";
			    return;
			  } 
			  if (window.XMLHttpRequest) {
			    // code for IE7+, Firefox, Chrome, Opera, Safari
			    xmlhttp=new XMLHttpRequest();
			  } else { // code for IE6, IE5
			    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			  }
			  xmlhttp.onreadystatechange=function() {
			    if (this.readyState==4 && this.status==200) {
			    	console.log(this.responseText);
			      document.getElementById("results").innerHTML=this.responseText;
			    }
			  }
			  console.log("here");
			  xmlhttp.open("GET","searchbyletter.php?q="+str,true);
			  xmlhttp.send();
			}
		</script>
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
				<form>
					<select name="users" onchange="getResults(this.value)">
					<option value="">Select a Letter:</option>
					<option value="A">A</option>
					<option value="B">B</option>
					<option value="C">C</option>
					<option value="D">D</option>
					<option value="E">E</option>
					<option value="F">F</option>
					<option value="G">G</option>
					<option value="H">H</option>
					<option value="I">I</option>
					<option value="J">J</option>
					<option value="K">K</option>
					<option value="L">L</option>
					<option value="M">M</option>
					<option value="N">N</option>
					<option value="O">O</option>
					<option value="P">P</option>
					<option value="Q">Q</option>
					<option value="R">R</option>
					<option value="S">S</option>
					<option value="T">T</option>
					<option value="U">U</option>
					<option value="V">V</option>
					<option value="W">W</option>
					<option value="X">X</option>
					<option value="Y">Y</option>
					<option value="Z">Z</option>
					</select>
				</form>
			</div>
			<div class="show-results" id="results"></div>

		</div>
	</body>
</html>