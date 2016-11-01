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

        <?php
            $q = $_GET['q'];
            $mysqli = new mysqli("localhost", "cs143", "", "CS143", 1438);
            if ($mysqli->connect_errno) {
                echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
            }
            ?>

        <div class="container">
            <h1>
                <?php 
                  
                    $sql = "SELECT * FROM Actor WHERE id=$q";
                    if ($result = $mysqli->query($sql)){

                        while($row = mysqli_fetch_array($result)) {
                            echo $row['first'] . " " . $row['last'];
                            ?>
                            <li class="actor-info"> <?php echo $row['sex']; ?></li>
                            <li class="actor-info"> Born: <?php echo $row['dob']; ?></li>
                            <li class="actor-info"> 
                                <?php 
                                    if($row['dod'])
                                        echo "Died: " . $row['dod'];
                                    else
                                        echo "He's still kickin"; 
                                ?>
                            </li>
                            <?php
               
                        }
                      }
                    else{
                        echo "Problem with Query";
                    }
                ?>
            </h1>
            
                        <?php
                           
                            $getfilms="SELECT title,id FROM Movie WHERE id IN(SELECT mid FROM MovieActor WHERE aid=" . $q .")";

                            if ($result = $mysqli->query($getfilms)){
                                ?>
                                <div class="row">
                                <div class="col-md-12">
                                <h2>Films</h2>
                                    <ul>
                            <?php
                                while($row = mysqli_fetch_array($result)) {
                                    ?>
                     
                                    <li class="films">
                                        <a class="actors" href="movieinfo.php?q=<?php echo $row['id']; ?>"> <?php echo $row['title'];?></a>
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
            
        </div>

    </body>
</html>
