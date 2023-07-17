<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Assistant:wght@500&family=Passions+Conflict&display=swap');
    </style>

    <script defer="" src="js/scriptsN.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4"></script>
    <title>Agritech</title>
</head>

<body class="wrapper">
    <header>
        <div class="logo">
            <a href="index.html" class="logo-link" title="logo"></a>
        </div>
        <div class="navigatin">
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                    <!-- <a class="nav-link" href="#">Navbar</a> -->
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="index.html">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Violation </a>
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
            <img src="images/profile.jpg" alt="logo picture" title="logo">
        </div>
    </header>
    <div class="main">
        <div class="side-menu">
            <!-- <a href="#">Home</a> -->
            <a href="#"><i class="fa fa-envelope-open-o" aria-hidden="true"></i> Messages</a>
            <a href="#"><i class="fa fa-folder-open" aria-hidden="true"></i>Open Cases</a>
            <a href="#"><i class="fa fa-user-o" aria-hidden="true"></i>Customers</a>
            <section class="userTool" aria-label="User Tools">
                <a href="#"><i class="fa fa-address-book-o" aria-hidden="true"></i>Contact us</a><br>
                <a href="#"><i class="fa fa-cog" aria-hidden="true"></i>Settings</a>
            </section>
        </div>
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
            aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Crop</li>
            </ol>
        </nav>
        <div class="newPenalty">
            <div class="newPenaltyH2">New Plot
                <p>Please fill out the form below to register a new plot</p>
            </div>
            <form action="http://se.shenkar.ac.il/students/2022-2023/web1/dev_229/newPlotData.php" method="post"
                enctype="multipart/form-data">

                <!-- First row -->
                <div class="row">
                    <div class="col-sm-4">
                        <label for="inputName" class="form-label">Plot Name</label>
                        <input type="text" class="form-control input-field" id="inputName" name="inputName"
                            placeholder="Enter plot name">
                    </div>
                    <div class="col-sm-6">
                        <label for="inputIrrigation" class="form-label">Irrigation System</label>
                        <select class="form-control input-field" id="inputIrrigation" name="inputIrrigation">
                            <option value="" disabled selected>Select irrigation system</option>
                            <option value="drip">Drip Irrigation</option>
                            <option value="sprinkler">Sprinkler System</option>
                            <option value="surface">Surface Irrigation</option>
                            <option value="subsurface">Subsurface Drip Irrigation</option>
                        </select>
                    </div>
                </div>
                <!-- Second row -->
                <div class="row">
                    <div class="col-sm-6">
                        <label for="inputGrain" class="form-label">Type of Grain</label>
                        <input type="text" class="form-control input-field" id="inputGrain" name="inputGrain"
                            placeholder="Enter type of grain">
                    </div>
                    <div class="col-sm-6">
                        <label for="inputAmount" class="form-label">Plot size</label>
                        <input type="number" class="form-control input-field" id="inputAmount" name="inputSize"
                            pattern="[1-9][0-9]{0,3}" title="Please enter a number between 1-9999" placeholder="#">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="exampleFormControlTextarea1"
                        rows="3" placeholder="More details..."></textarea>
                </div>
                <div class="newPenaltyButton">
                    <div id="BACK" class="col-md-6">
                        <button type="button" class="btn btn-primary"
                            onclick="window.location.href='index.html'">BACK</button>
                    </div>
                    <div id="SUBMIT" class="col-6 ms-auto">
                        <button type="submit" class="btn btn-primary" value="send">SUBMIT</button>
                    </div>
                </div>
            </form>


        </div>
    </div>

</body>

</html>