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
  if(!empty($_GET["plotName"])){
    $plot_name = $_GET['plotName'];
    $plot_size = $_GET['plotSize'];
    $plot_id = $_GET['cropId'];
    $query = "UPDATE tbl_229
              SET plot_name = '$plot_name', plot_size = '$plot_size'
              WHERE plot_id = $plot_id;";
    
    $result = mysqli_query($connection, $query);
    if(!$result) {
        die("DB query failed.");
    }
  }
  if(!empty($_GET["cropId"])){
    $plot_id = $_GET["cropId"];
    $query = "SELECT * FROM tbl_229 WHERE plot_id = '$plot_id'";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($result);
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
    <script defer="" src="js/scriptsC.js"></script>  
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4"></script>
    <title>Agritech</title>
</head>
<body class="wrapper">
    <header>
      <div class="logo">
        <a href="index.php" class="logo-link"  title="logo"></a>
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
                        <a class="nav-link" aria-current="page" href="index.html">Home</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Violation</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Panalties</a>
                      </li>
                    </ul>
                    <form class="d-flex" role="search">
                      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                      <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                  </div>
                </div>
              </nav>
        </div>
        <div class="profilePic">
            <img <?php echo 'src=' . $_SESSION['user_img']. ''?> alt="logo picture" title="logo">
        </div>
    </header>
    <div class="main">
        <div class="side-menu">
            <a href="#"><i class="fa fa-envelope-open-o" aria-hidden="true"></i> Messages</a>
            <a href="#"><i class="fa fa-folder-open" aria-hidden="true"></i>Open Cases</a>
            <a href="#"><i class="fa fa-user-o" aria-hidden="true"></i>Customers</a>
            <section class="userTool"><a href="#"><i class="fa fa-address-book-o" aria-hidden="true"></i>Contact us</a><br><a href="#"><i class="fa fa-cog" aria-hidden="true"></i>Settings</a><br><a id="logout" href="login.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a></section>
        </div>
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html?prodId=1">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Crop</li>
            </ol>
        </nav>
        <div class="upper-main row ">
          <div class="col-12 col-sm-6 col-md-3">
              <a id="btn1" href="#" class="btn btn-primary btn-lg active upperGraphButtons" role="button" aria-pressed="true">USAGE EXCEPTIONS</a>
          </div>
          <div class="col-12 col-sm-6 col-md-3">
              <a id="btn2" href="#" class="btn btn-primary btn-lg active upperGraphButtons" role="button" aria-pressed="true">REPORTS</a>
          </div>
          <div class="col-12 col-sm-6 col-md-3">
              <a id="btn3" href="newPanelty.html?prodId=1" class="btn btn-primary btn-lg active upperGraphButtons" role="button" aria-pressed="true" >NEW PENALTY</a>
          </div>
          <div class="col-12 col-sm-6 col-md-3">
              <a id="btn4" href="#" class="btn btn-primary btn-lg active upperGraphButtons" role="button" aria-pressed="true" >CONTACTS</a>
          </div>
      </div>
      
      
        <div class="my-chart">
          <h2>Total Use</h2><h2>Plot Name:<span><?php echo $row["plot_name"]?></span></h2><h2>Pest Size: <span><?php echo $row["plot_size"]?></span></h2>
          <section>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Plot</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form action="#" method="GET" id="frm">
                        
                        <div class="form-outline mb-4">
                            <label class="form-label" for="form2Example1">Plot Name:</label>
                            <input type="text" class="form-control" name="plotName"  placeholder="name" required>
                        </div>
                        
                        <div class="form-outline mb-4">
                            <label class="form-label" for="form2Example2">Plot Size:</label>
                            <input type="number" class="form-control" name="plotSize" placeholder="size" required>
                        </div>
                    
                        <input type="text" name="cropId" <?php echo 'value="' . $row["plot_id"] . '"'; ?> hidden >
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </section>
            <div class="dropdown">
              <?php if($_SESSION["user_type"]== "farmer") {echo '
              <button id="modalBtn" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
              <i class="fa fa-pencil" aria-hidden="true"></i>
              </button>';}
              ?>
              <i class="fa fa-download" aria-hidden="true"></i>
              <button class="btn btn-secondary dropdown-toggle" type="button" id="timeRangeDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                All Times
              </button>
              <ul class="dropdown-menu" aria-labelledby="timeRangeDropdown">
                <li><a class="dropdown-item" href="#" data-time-range="All-Times">All Times</a></li>
                <li><a class="dropdown-item" href="#" data-time-range="months">Months</a></li>
                <li><a class="dropdown-item" href="#" data-time-range="days">Days</a></li>
              </ul>
            </div>
            <canvas id="myChart" class="hide-chart"></canvas>
            <canvas id="myChart2" class="hide-chart2"></canvas>
        </div>

    </div>
</body>


</html>