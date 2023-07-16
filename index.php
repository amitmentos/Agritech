<?php 
	include "config.php";
    $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    
    if(mysqli_connect_errno()) {
        die("DB connection failed: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")"
        );
    }
?>
<?php 
  session_start();
  if (!isset($_SESSION["user_id"]) || empty($_SESSION["user_id"])) {
    // Redirect the user to the login page
    header("Location: login.php");
    exit; // Make sure to include this to prevent further execution of the code
  }
	if (!empty($_SERVER['QUERY_STRING'])) {
		$cat = $_GET['category'];
	} else {
		$cat = 'All';
	}
  if( $_SESSION["user_type"]== 'insp'){
    $query 	= "SELECT * FROM tbl_229";
  }
  if($_SESSION["user_type"]== 'farmer'){
    $query = "SELECT * FROM tbl_229 WHERE user_id = '" . $_SESSION["user_id"] . "'";
  }
	if ($cat != 'All') {
		$query .= " ORDER by $cat";
	}
	$result = mysqli_query($connection, $query);
    if(!$result) {
        die("DB query failed.");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>    
    <link href="css/style.css" rel="stylesheet"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>@import url('https://fonts.googleapis.com/css2?family=Assistant:wght@500&family=Passions+Conflict&display=swap');</style>
    <script defer="" src="js/scripts.js"></script>  

    <title>Agritech</title>
</head>
<body class="wrapper">
    <header>
      <div class="profilePic">
        <img src="images/profile.jpg" alt="logo picture" title="logo">
    </div>
      <div class="logo">
        <a href="index.html" class="logo-link" title="logo"></a>
      </div> 
        <div class="navigatin">
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                  <!-- <a class="nav-link" href="#">Navbar</a> -->
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                      <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">Home</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Violation</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Panalties</a>
                      </li>
                    </ul>
                    <form class="d-flex " role="search">
                      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                      <button class="btn btn-outline-success " type="submit">Search</button>
                    </form>
                  </div>
                </div>
              </nav>
              
        </div>

    </header>
    <div class="main">
        <div class="side-menu">
            <!-- <a href="#">Home</a> -->
            <a href="#"><i class="fa fa-envelope-open-o" aria-hidden="true"></i> Messages</a>
            <a href="#"><i class="fa fa-folder-open" aria-hidden="true"></i>Open Cases</a>
            <a href="#"><i class="fa fa-user-o" aria-hidden="true"></i>Customers</a>
            <section class="userTool"><a href="#"><i class="fa fa-address-book-o" aria-hidden="true"></i>Contact us</a><br><a href="#"><i class="fa fa-cog" aria-hidden="true"></i>Settings</a></section>

        </div>
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
            </ol>
          </nav>
        <table class="table" id="myTable">
          <thead>
            <tr>
              <th scope="col"></th>
              <th scope="col">Date <button class="sort-button" data-column="date"><i class="fa fa-sort-amount-asc" aria-hidden="true"></i></button></th>
              <th scope="col">Name <button class="sort-button" data-column="name"><i class="fa fa-sort-amount-asc" aria-hidden="true"></i></button></th>
              <th class="responsive-cols" scope="col">AVG <button class="sort-button" data-column="avg"><i class="fa fa-sort-amount-asc" aria-hidden="true"></i></button></th>
              <th class="responsive-cols" scope="col">Level <button class="sort-button" data-column="avg"><i class="fa fa-sort-amount-asc" aria-hidden="true"></i></button></th>
              <th class="responsive-cols" scope="col">Crop Type<button class="sort-button" data-column="Crop_Type"><i class="fa fa-sort-amount-asc" aria-hidden="true"></i></button> </th>
              <th scope="col">Summary</th>
              <th scope="col">
                <button id="edit-button" class="btn btn-primary Edit">Edit</button>
              </th>
            </tr>
          </thead>
          <tbody>
            <?php
            		while($row = mysqli_fetch_assoc($result)) {
                  echo '<tr class="' . $row['level']. '">';
                  echo '<td>' . $row['plot_id'] . '</td>';
                  echo '<td>' . $row['date'] . '</td>';
                  echo '<td>' . $row['plot_name'] . '</td>';
                  echo '<td class="responsive-cols">' . $row['AVG'] . '</td>';
                  echo '<td class="responsive-cols">' . $row['level'] . '</td>';
                  echo '<td class="responsive-cols">' . $row['crop_type'] . '</td>';
                  echo '<td>' . $row['summary'] . '</td>';
                  echo '<td><a href="crop.html?cropId=' . $row['plot_id'] . '" class="btn btn-link Details">Details</a></td>';
                  echo '</tr>';
                }
            ?>     
          </tbody>
        </table>
    </div>
</body>
</html>