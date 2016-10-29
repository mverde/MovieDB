<!DOCTYPE html>
<html>
    <head>
        <title>Actor Info</title>
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

        <?php
            $q = $_GET['q'];
            $mysqli = new mysqli("localhost", "cs143", "", "CS143", 1438);
            if ($mysqli->connect_errno) {
                echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
            }

            $sql = "SELECT * FROM Actor WHERE id=$q";
            
            if ($result = $mysqli->query($sql)){
                }
                else{
                    echo "Problem with Query";
                }


            echo "<table class='table table-condensed table-hover'>
                <tr>
                <th>Name</th>
                <th>Movies</th>
                </tr>";
            while($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . $row['first'] . " " . $row['last'] ."</td>";
                
                $getfilms="SELECT title,id FROM Movie WHERE id IN(SELECT mid FROM MovieActor WHERE aid=" . $row['id'] .")";
                if ($result2 = $mysqli->query($getfilms)){
                    echo "<td>";
                    while($row2 = mysqli_fetch_array($result2)) {
                        echo "<li class='films'><a href='movieinfo.php?q=". $row2['id'] . "'>" . $row2['title'] . "</a></li>";
                    }
                    echo "</td>";
                }
                else{
                    echo "Problem with Query";
                }

                echo "</tr>";
            }
            echo "</table>";

            ?>

    </body>
</html>
